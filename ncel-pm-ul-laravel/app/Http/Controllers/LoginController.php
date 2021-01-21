<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \SoapClient;


class LoginController extends Controller
{
    /*
     * show pages
     * */
    public function index()
    {
        return view('layout.login-master');
    }


    /*
     * show pages
     * */
    public function login(Request $request)
    {
        //return $request;
        ini_set("soap.wsdl_cache_enabled", "0");
        ini_set('error_reporting', E_ALL); //uncomment to debug
        ini_set('display_errors', True);  //uncomment to debug

        $user_id = '00000000000000000000000000000001';
        $password = '12345678';

        $client = new SoapClient('http://127.0.0.1:81/sysworkflow/en/green/services/wsdl2');
        $params = array(array('userid'=>$user_id, 'password'=>$password));
        $result = $client->__SoapCall('login', $params);

        WSLogin('admin', $pass, 'http://localhost/sysworkflow/en/green/services/wsdl');

        dd($result);
    }


    public function dashboard()
    {
        return view('backend.home');
    }


}
