<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends HomeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(array('auth', 'student'));
    }
}
