<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Review;
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
    public function review(){
        $review=DB::table('reviews')
                ->join('registers','registers.id','reviews.user_id')
                ->select('reviews.*','registers.username','registers.email')
                ->get();
               // dd($review);
         return view('admin.admin_review',compact('review'));
    }
    public function ChangeStatus(Request $request)
    {
        $city = Review::find($request->id);
        $city->status = $request->status;
        $city->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
