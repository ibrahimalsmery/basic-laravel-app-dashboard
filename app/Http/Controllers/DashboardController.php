<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard_page()
    {

        return $this
            ->page_title("Dashboard")
            ->breadcrumb_link("Dashboard", route('dashboard.index'))
            ->view('dashboard.dashboard');
    }
}
