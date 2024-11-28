<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

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
    
       
        $request_regis_request = $client->post( $cek_penduduk, [
            'nik'     => 'nik'
            
        ]);
    
        $response_register = $request_regis_request->getBody()->getContents();
        $obj_register = json_decode($response_register, TRUE);
        
        return response()->json($obj_register);
    }


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nik' => ['required', 'numeric', 'digits_between:16,16', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'provinsi' => ['required', 'string'],
            'kabKot' => ['required', 'string'],
            'noKontak' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'nik' => $data['nik'],
            'name' => $data['name'],
            'alamat' => $data['alamat'],
            'provinsi' => $data['provinsi'],
            'kabKot' => $data['kabKot'],
            'noKontak' => $data['noKontak'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('pengunjung');

        return $user;
    }
}
