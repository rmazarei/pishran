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

    public function getData()
    {
    	$response = Http::post('http://chart.pishrun.ir/api/login', [
    		'email'		=> 'a@b.com',
    		'password'	=> 'test@test'
    	]);
    	return $response;
    }
}
