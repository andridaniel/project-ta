<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormAkunAdminController extends Controller
{
    public function index()
    {
        return view('pages.pagesadmin.formakunadmin');
    }
}
