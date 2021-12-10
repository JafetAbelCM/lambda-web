<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class CurrentStudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Me/Index');
    }
}
