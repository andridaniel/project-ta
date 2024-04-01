<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
        // $role_user = auth()->user()->load("Role")->Role->nama;

        // return view('pages.dashboard', [
        //     "role_user" => $role_user
        // ]);
    }
}
