<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends HomeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(array('auth', 'teacher'));
    }
}
