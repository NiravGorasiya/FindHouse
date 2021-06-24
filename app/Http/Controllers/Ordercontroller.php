<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class Ordercontroller extends Controller
{
    public function index()
    {
        $order=DB::table('payments')
            ->join('registers','registers.id','=','payments.user_id')
            ->select('payments.*','registers.email','registers.mobile','registers.username')
            ->get();
        return view('admin.order',compact('order'));
         
    }
}
