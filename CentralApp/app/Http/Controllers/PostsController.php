<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Post;



class PostsController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $client = new \GuzzleHttp\Client(['base_uri' => 'http://phprestfulapi/api']);
        

        // $response = $client->request('POST', '/new_job', [
        //     'form_params' => [
        //         'title' => $request->input('title'),
        //         'title' => $request->input('requirements'),
        //         'requirements' => $request->input('responsibility'),
        //     ]
        // ]);ß

        $client = new \GuzzleHttp\Client();
        

        $response = $client->request('POST', 'http://localhost:8001/api/new_job', [
            'json' =>  [
                'title' => $request->input('title'),
                'responsibility' => $request->input('responsibility'),
                'requirements' => $request->input('requirements'),
                'user_id' => Auth::user()->id,
            ]
        ]);

      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
