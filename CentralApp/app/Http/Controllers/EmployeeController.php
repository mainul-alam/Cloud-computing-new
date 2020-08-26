<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.home');
    }



    public function showAllJobs()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:8001/api/jobs");
        $all_jobs = json_decode($response->getBody());

       
        return view('employee.all_jobs')->with('all_jobs', $all_jobs);
    }



    public function show($id)
    {
        $job_id = $id;
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:8001/api/job/$job_id");
        $job_details = json_decode($response->getBody());



        return view('employee.job_details')->with('job_details', $job_details);
    }


    public function form()
    {

        return view('employee.createCv');    

    }


}
