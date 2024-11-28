<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Database\Eloquent\Collection;

class NikController extends Controller
{
    //
    public function cekNik($nik){
        $client = new \GuzzleHttp\Client();

        $url = 'https://apidoc.bukittinggikota.go.id/sbh/public/api/';
    
        // $data = [
        //     "nik"=> $nik,
        //     "user_id"=> "asrar",
        //     "password"=> "asrar123"
        // ];
    
        $token_regis = [
            "secret"=> '29d14df25cf02d6bd797babc194df021'
        ];
        $requestAPI_token = $client->post( $url.'get-token', [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => json_encode($token_regis)
        ]);
    
        $response_token = $requestAPI_token->getBody()->getContents();
        $obj_token = json_decode($response_token, TRUE);
    
        // return($obj_token['data']['access_token']);
       
        $request_regis_request = $client->post( $url.'cek_penduduk', 

            [
                'form_params' => [
                    'nik' => $nik
                ],
                'headers' => [
                    'Authorization'=> 'Bearer '. $obj_token['data']['access_token']
                ]
             ]);
    
        $response_register = $request_regis_request->getBody()->getContents();
        $obj_register = json_decode($response_register, TRUE);
        
        return response()->json($obj_register);
    }
}
