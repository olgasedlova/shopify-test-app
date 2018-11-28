<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
Use Illuminate\Http\Request; 

class AppController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(Request $request){

    	// print_r($_SERVER['SERVER_ADDR']);

    	// echo  $ip=  Request::getClientIp();
      // echo   $data = Location::get($ip);

    	echo $ip = $request->ip();

// echo "die";

// die();
    	$arr_ip = geoip()->getLocation('124.253.84.65');

    	dd($arr_ip);
    }
}
