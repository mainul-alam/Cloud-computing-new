<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class EmployerController extends Controller
{
    public function index(){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:8001/api/jobs/2');
        $jobs = $response->getBody();
        Log::debug($jobs);
        return view('employer.home')->with('jobs', $jobs);
    }

    public function newJob(){
        return view('employer.createJob');
    }
}


