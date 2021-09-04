<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Helpers\GoogleSheet;
use Google_Client;
use Google_Service_Sheets;
use Exception;
use Log;

use Carbon\Carbon;
use App\func_global;
use Illuminate\Support\Facades\DB;

class GoogleApiConsoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //$signature=google:sheet_api
    protected $signature = 'google:sheet_api_console';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getGoogleClient()
    {
        $client = new Google_Client();
        $client->setApplicationName('Google Sheets API PHP Quickstart');
        $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
        $client->setAuthConfig(config_path('credentials.json'));
        $client->setAccessType('offline');

        $tokenPath = storage_path('app/token.json');
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        if ($client->isAccessTokenExpired()) {
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }

            if (!file_exists(dirname($tokenPath))) {
                mkdir(dirname($tokenPath), 0700, true);
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }

        return $client;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    
    public function handle(Request $request, $input)
    {
        $spreadsheetId ='1SO0kxbPNERLWzqUtxvWsgD2uGhKubs0dRH_U1S4BJ6s';
        if(isset($input['option'])){
            $_option = $input['option'];
            if(isset($_option['spreadsheetid'])){
                $spreadsheetId = $_option['spreadsheetid'];
            }
            if(isset($_option['formspread']) && $_option['formspread'] == 0){
                return $this->handle_grabcall($request, $input);
            }
        }
        return $this->handle_sheet($request, $input);
    }
    public function handle_sheet(Request $request, $input)
    {
        //Log::debug('start update sheet 1 data');
        $client = $this->getGoogleClient();
        $service = new Google_Service_Sheets($client);
        //$spreadsheetId = env('GOOGLE_SHEET_ID');
        $spreadsheetId ='1TDYOs2qLBzLAgc2SooGAMDfNgrw6OLdrf-rUQQWiXZM';
        $range = 'Sheet1!A2:D';
        $ip = $request->ip();
        $current_date_time = Carbon::now()->toDateTimeString();
        if(isset($input['option']) && isset($_option['spreadsheetid'])){
            $_option = $input['option'];
            $spreadsheetId = $_option['spreadsheetid'];
        }
        $_ticket = $input['data'];
        $phone = $_ticket['phone'];
        $time = $_ticket['time'];
        $url = $_ticket['url'];
        $note = $_ticket['note'];
        $branch = $_ticket['branch']; 
        $fullname = $_ticket['name'];
        $sex = $_ticket['sex'];
        //return array('phone' => $_ticket['phone'],'time' => $_ticket['time'],'url' => $_ticket['url'],'note' => $_ticket['note'], 'branch' => $_ticket['branch'],'fullname' => $_ticket['name'], 'sex' => $_ticket['sex'],'ip'=>$ip);
       
        // get values
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();

        // update/add values
        $data = [
            [
                $current_date_time,
                $fullname,
                $phone,
                $time,
                $branch,
                $sex,
                $ip,
                $note,
                $url,
                'Chua goi',
            ],
        ];
        
        $requestBody = new \Google_Service_Sheets_ValueRange([
            'values' => $data
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];
        //$service->spreadsheets_values->update($spreadsheetId, $range, $requestBody, $params);
        try{
            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, $params);
            $updated = $result->getUpdates()->getUpdatedCells();
            //echo "SUCCESS \n";
            //Log::debug('update sheet 1 data success');
            return array('error'=>0,'result'=>$updated );
        }catch (Exception $ex) {
           $msg = $ex->getMessage();
           return array('error'=>1,'result'=>$msg);
        }
    }
    public function handle_grabcall(Request $request, $input)
    {
        $spreadsheetId ='1SO0kxbPNERLWzqUtxvWsgD2uGhKubs0dRH_U1S4BJ6s';
        if(isset($input['option'])){
            $_option = $input['option'];
            if(isset($_option['spreadsheetid'])){
                $spreadsheetId = $_option['spreadsheetid'];
            }
        }
        //Log::debug('start update sheet 1 data');
        $client = $this->getGoogleClient();
        $service = new Google_Service_Sheets($client);
        //$spreadsheetId = env('GOOGLE_SHEET_ID');
        $range = 'Sheet1!A2:D';
        $current_date_time = Carbon::now()->toDateTimeString();
        $_ticket = $input['data'];
        $ip = $_ticket['ip'];
        $phone = $_ticket['phone'];
        $time = $_ticket['time'];
        $url = $_ticket['url'];
        // $ip = '127.0.0.1';
        // $phone = '0967655819';
        // $time = '2021-04-28';
        // $url = 'test';
        $carrier = '';
        if(isset($_ticket['type'])){
            $carrier = $_ticket['type'];
        }
        $facebookName = '';
        if(isset($_ticket['facebookName'])){
            $facebookName = $_ticket['facebookName'];
        }
        $facebookUid = '';
        if(isset($_ticket['facebookUid'])){
            $facebookUid = $_ticket['facebookUid'];
        }
        $fullname = $facebookName;
        if(isset($_ticket['facebookUid'])){
            $facebookUid = $_ticket['facebookUid'];
        }
        $message = '';
        // get values
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();

        // update/add values
        $data = [
            [
                $current_date_time,
                $fullname,
                $phone,
                '',
                $carrier,
                $facebookUid,
                '',
                '',
                '',
                $ip,
                $url,
                'Chua goi',
            ],
        ];
        
        $requestBody = new \Google_Service_Sheets_ValueRange([
            'values' => $data
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        //$service->spreadsheets_values->update($spreadsheetId, $range, $requestBody, $params);
        try{
            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, $params);
            $updated = $result->getUpdates()->getUpdatedCells();
            //echo "SUCCESS \n";
            //Log::debug('update sheet 1 data success');
            return $updated;
        }catch (Exception $ex) {
           $msg = $ex->getMessage();
           return $msg;
        }
    }
}
