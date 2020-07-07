<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show dashboard
     * @return View
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
