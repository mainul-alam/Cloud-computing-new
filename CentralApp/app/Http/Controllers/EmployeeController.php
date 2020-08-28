<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;





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

    public function showAllCvs()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:5000/cv");
        $all_cvs = json_decode($response->getBody(),true);
        Log::debug($all_cvs);
       
        return view('employee.all_cvs')->with('all_cvs', $all_cvs);
    }


    public function show($id)
    {
        $job_id = $id;
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:8001/api/job/$job_id");
        $job_details = json_decode($response->getBody());



        return view('employee.job_details')->with('job_details', $job_details);
    }


    public function cvform(Request $request)
    {

        return view('employee.createCv');
    }


    public function create(Request $request)
    {

        $client = new \GuzzleHttp\Client();
        
        $response = $client->request('POST', "http://localhost:5000/cv", [
            'json' =>  [
                'name' => $request->input('name'),
                'university' => $request->input('university'),
                'degree' => $request->input('degree'),
                'user_id' => Auth::user()->id,
            ]
        ]);

        return redirect('/employee/all_cvs');
    }

    public function cvShow($id)
    {
        $cv_id = $id;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://localhost:5000/cv/$cv_id");
        $cv_details = json_decode($response->getBody());

        return view('employee.cv_details')->with('cv_details',$cv_details);
    }

    public function destroy($id)
    {
        $cv_id = $id;
        $client = new \GuzzleHttp\Client();

        $response = $client->request('DELETE', "http://localhost:5000/cv/$cv_id");

        return redirect('/employee/all_cvs');

    }






}
