<?php

namespace App\Console\Commands;

use App\Helpers\GoogleSheet;
use Illuminate\Http\Request;
use Illuminate\Console\Command;
use Google_Client;
use Google_Service_Sheets;
use Exception;
use Log;
//use TechAPI\Exception;
use TechAPI\Auth\AccessToken;
use TechAPI\Api\SendBrandnameOtp;
//use TechAPI\Exception as TechException;
use Carbon\Carbon;
use App\func_global;
use Illuminate\Support\Facades\DB;
class GoogleSheetApiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'google:sheet_api';

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

    /**
     * Execute the console command.
     *
     * @return int
     */
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
    public function handle(Request $request, $input)
    {
        Log::debug('start update sheet 1 data');
        $ip = $request->ip();
        $current_date_time = Carbon::now()->toDateTimeString();
        $_ticket = $input['ticket'];
        $fullname = $_ticket['username'];
        $phone = $_ticket['phone'];
        $url = $_ticket['ticket_subject'];
        $message = $_ticket['ticket_comment'];
        /*--------*/
        $client = $this->getGoogleClient();
        $service = new Google_Service_Sheets($client);
        $spreadsheetId = env('GOOGLE_SHEET_ID');
        $_option = $input['option'];
        if(isset($_option['spreadsheetid']) && !empty($_option['spreadsheetid'])){
            $spreadsheetId = $_option['spreadsheetid'];
        }
        $range = 'Sheet1!A2:D';

        // get values
        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $values = $response->getValues();

        // update/add values
        $data = [
            [
                $current_date_time,
                $fullname,
                $phone,
                $url,
                '',
                '',
                '',
                '',
                '',
                $ip,
                $message,
            ],
        ];
        $requestBody = new \Google_Service_Sheets_ValueRange([
            'values' => $data
        ]);

        $params = [
            'valueInputOption' => 'RAW'
        ];

        $result = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, $params);
        $updated = $result->getUpdates()->getUpdatedCells();
        return $updated;
        Log::debug('update sheet 1 data success');
    }
    // Khởi tạo các tham số của tin nhắn.
    public function sendsmsbrandnameopt($arrMessage)
    {
       /**
         * Code xử lý gửi tin nhắn qua API
         */
         
        // Khởi tạo các tham số của tin nhắn.
        // $arrMessage = array(
        //     'Phone'      => '0967735106',
        //     'BrandName'  => 'TICKMEDICAL',
        //     'Message'    => 'test otp'
        // );
        
        // Khởi tạo đối tượng API với các tham số phía trên.
        $apiSendBrandname = new SendBrandnameOtp($arrMessage);
            
        try
        {
            // Lấy đối tượng Authorization để thực thi API
            $oGrantType      = getTechAuthorization();
            
            // Thực thi API
            $arrResponse     = $oGrantType->execute($apiSendBrandname);
            
            // kiểm tra kết quả trả về có lỗi hay không
            if (! empty($arrResponse['error']))
            {
                // Xóa cache access token khi có lỗi xảy ra từ phía server
                AccessToken::getInstance()->clear();
                
                // quăng lỗi ra, và ghi log
                //throw new Exception($arrResponse['error_description'], $arrResponse['error']);
                return $arrResponse['error'];
            }
            return $arrResponse;
        }
        catch (\Exception $ex)
        {
            $error = array('code'=>$ex->getCode(),'desc'=>$ex->getMessage());
            return $error;
        }
    }   
    public function create_ticket_api(Request $request, $input){
        $_ticket = $input['ticket'];
        $_phone = $_ticket['phone'];
        $_username = $_ticket['username'];
        $json = json_encode([
            'ticket'  => [
                'ticket_subject' => $_ticket['ticket_subject'],
                'ticket_comment'    => $_ticket['ticket_comment'],
                'email' => $_ticket['email'],
                'phone'  =>  $_phone,
                'group_id'  => $_ticket['group_id'],
                'username'  => $_username,
                'ticket_priority'  => $_ticket['ticket_priority'],
                'custom_fields'  => $_ticket['custom_fields']
                ]
        ]);
        $result = $this->curlapi($json);
        //$result_curl = json_decode($result,true);
        return $result;
    }
    public function sendsmsbrandname(Request $request, $input){
        $_ticket = $input['ticket'];
        $_phone = $_ticket['phone'];
        $_username = $_ticket['username'];
        if(!isset($_username)){
          $_username = 'Anh/chi';
        }
        $mgs = 'Cam on _ten_khach da dang ky tu van thanh cong tai Phong Kham Tick Medical. Tro ly Bac Si se lien he ho tro cho Ban trong thoi gian som nhat. Chi tiet lien he Hotline: 0965858568, Website: https://tickmedical.vn/';
        $returnValue = preg_replace('/_ten_khach/i', $_username, $mgs);
        $arrMessage = array(
            'Phone'      => $_phone,
            'BrandName'  => 'TICKMEDICAL',
            'Message'    => $returnValue
        );
        return $this->sendsmsbrandnameopt($arrMessage);
    }
    public function curlapi($data){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.caresoft.vn/tickfulllife/api/v1/tickets",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>$data,
          CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer 6Ai6qoJoE10l3nU",
            "Content-Type: application/json"
          ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    } 

    
}
