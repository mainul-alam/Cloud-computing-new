<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function index(){
        return view('employer.home');
    }

    public function newJob(){
        return view('employer.createJob');
    }
}


