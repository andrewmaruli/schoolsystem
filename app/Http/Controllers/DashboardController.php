<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('admin')) {
            return view('dashboard');
        } elseif (Auth::user()->hasRole('student')) {
            return view('studentdash');
        } elseif (Auth::user()->hasRole('parent')) {
            return view('parentdash');
        }
    }

    public function myprofile() 
    {
        return view('myprofile');
    }

    public function achievement() 
    {
        return view('achievement');
    }
    public function users() 
    {
        return view('users');
    }
}
