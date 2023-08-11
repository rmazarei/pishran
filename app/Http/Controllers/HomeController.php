<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function getData(Request $request)
    {
    	$response = Http::post('http://chart.pishrun.ir/api/login', [
    		'email'		=> 'a@b.com',
    		'password'	=> 'test@test'
    	]);
    	if(!$response['token']){
    		return response()->json([
    			'status'	=> 0,
    			'message'	=> 'Error getting token'
    		], 403);
    	}

    	$token = $response['token'];
    	
    	$since 	= $request->date_from ? $request->date_from : strtotime("-1 week");
    	$to 	= $request->date_to ? $request->date_to : time();
    	
    	$data = Http::withHeaders([
		    'bearer_token' => $token,
		])->get('http://chart.pishrun.ir/api/log/read',[
			'since'			=> 1691353800,
			'to'			=> 1691699399,
			'device_serial'	=> 62101200
		]);
    	return $data;
    }
}
