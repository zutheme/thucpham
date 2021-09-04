<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\files;
use File;

class CKEditorController extends Controller
{
    public function uploadDataULR(){

        $input = json_decode(file_get_contents('php://input'),true);

        $base64_string = $input['file'];
        $dir = 'uploads/';

        $data = explode( ',', $base64_string );

        $mimeString = $data[0];

        $mimeString = explode( ':', $mimeString);

        $mimeString = explode( ';', $mimeString[1]);

        $extension =  explode( '/', $mimeString[0]);

        $data1 = $data[1];
        $decoded = base64_decode($data1);

        $typefile = $extension[1];
        $path = base_path($dir . date('Y') . '/'.date('m').'/'.date('d').'/');
        $path_relative = $dir . date('Y') . '/'.date('m').'/'.date('d').'/';       
        if(!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }   
        $filename = date('Ymd').'_'.time().'_'.uniqid().'.'.$typefile;

        $ab_urlfile = $path.$filename;
        $urlfile = $path_relative.$filename;   
        //$str_param = $urlfile.','.$filename.','.$typefile;
        $name_origin = '';
        try {
            file_put_contents( $ab_urlfile , $decoded);
            $insert_file = DB::select('call InsertfileProcedure(?,?,?,?)',array($urlfile, $name_origin, $filename,$typefile));
            $idfile = json_decode(json_encode($insert_file), true);
            //$file = new Files(['urlfile'=> $urlfile,'name_origin'=> '','namefile'=> $filename,'typefile'=>$typefile]);
            //$file->save();
            $url = asset($urlfile); 
            return response()->json(array('url' => $url), 200);
        }catch (\Illuminate\Database\QueryException $ex) {
            $errors = new MessageBag(['error' => $ex->getMessage()]);
            return response()->json(array('success' => true,'msgerror'=>$ex), 200);
        }
       
         return response()->json(array('success' => true, 'pathfile' => $urlfile, 'param'=>$str_param), 200);
        
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(public_path('images'), $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }
}
