<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Job;

class ApiController extends Controller
{
    
    public function getAllJobs()
    {
        $job = Job::get()->toJson(JSON_PRETTY_PRINT);
        return response($job, 200);
    }

    public function getOneJob($id)
    {
        if (Job::where('id', $id)->exists()) {
            $job = Job::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($job, 200);
          } else {
            return response()->json([
              "message" => "Job not found"
            ], 404);
          }
    }
    
    public function createNewJob(Request $request)
    {
        $job = new Job;         
        $job->title = $request->title;
        $job->responsibility = $request->responsibility;
        $job->requirements = $request->requirements;
        $job->save();

        return response()->json([
            "message" => "Successfully created new job !"
        ], 201);
    }       

   
   
    public function updateJob(Request $request, $id)
    {
        if (Job::where('id', $id)->exists()) {
            $job = Job::find($id);
    
            $job->title = is_null($request->title) ? $job->title : $request->title;
            $job->requirements = is_null($request->requirements) ? $job->requirements : $request->requirements;
            $job->responsibility = is_null($request->responsibility) ? $job->responsibility : $request->responsibility;
            $job->save();
    
            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Job not found"
            ], 404);
          } 
    }

   
    public function deleteJob($id)
    {
        if(Job::where('id', $id)->exists()) {
            $Job = Job::find($id);
            $Job->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Job not found"
            ], 404);
          }
    }
}
