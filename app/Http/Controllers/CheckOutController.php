<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CheckOutController extends Controller
{
  public function index(){
    $user_login=DB::table('registers')->first();
    return view('front.payment.checkout',compact('user_login'));
  }   
}
