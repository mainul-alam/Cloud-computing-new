<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Post;

class EmployerController extends Controller
{
    public function index(){

        $user_id = Auth::user()->id;
        Log::debug($user_id);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:8001/api/jobs/$user_id");
        $jobs = json_decode($response->getBody());
        Log::debug($jobs);
        return view('employer.home')->with('jobs', $jobs);
    }

    public function form()
    {

         return view('employer.createJob');     

    }



    public function create(Request $request)
    {

        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('POST', "http://localhost:8001/api/new_job", [
            'json' =>  [
                'title' => $request->input('title'),
                'responsibility' => $request->input('responsibility'),
                'requirements' => $request->input('requirements'),
                'user_id' => Auth::user()->id,
            ]
        ]);

        return redirect('/employer');
    }


    public function show($id)
    {
        $job_id = $id;
        Log::debug($job_id);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:8001/api/job/$job_id");
        $job_details = json_decode($response->getBody());
        Log::debug($job_details);


        return view('employer.job_details')->with('job_details', $job_details);
    }

    public function showAllJobs()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:8001/api/jobs");
        $all_jobs = json_decode($response->getBody());
        Log::debug($all_jobs);

       
        return view('employer.all_jobs')->with('all_jobs', $all_jobs);
    }


    public function edit($id)
    {
        $job_id = $id;
        Log::debug($job_id);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:8001/api/job/$job_id");
        $job_details = json_decode($response->getBody());
        Log::debug($job_details);

        return view('employer.editJob')->with('job_details', $job_details);
    }

  
    public function update(Request $request, $id)
    { 
        $job_id = $id;
        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('PUT', "http://localhost:8001/api/update_jobs/$job_id", [
            'json' =>  [
                'title' => $request->input('title'),
                'responsibility' => $request->input('responsibility'),
                'requirements' => $request->input('requirements'),
                'user_id' => Auth::user()->id,
            ]
        ]);

        return redirect('/employer');

    }


    public function destroy($id)
    {
    
    }





}


