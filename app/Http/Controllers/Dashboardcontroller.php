<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\DB;

class Dashboardcontroller extends Controller
{
    public function dashboard(Admin $admin)
    {
        $country=DB::table('countries')->count();
        $state=DB::table('states')->count();
        $city=DB::table('cities')->count();
        $property=DB::table('properties')->count();
        return view('admin.dashboard',compact('country','state','city','property'));
    }
}
