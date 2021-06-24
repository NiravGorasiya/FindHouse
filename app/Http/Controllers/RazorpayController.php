<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Addtocart;
use App\Register;
use DB;
use Razorpay\Api\Api;
use Session;
use Redirect;

class RazorpayController extends Controller
{
    public function razorpay(Request $request)
    {   
        
        $id=session()->get('FRONT_USER_ID');  
        $result = DB::table('addtocarts')
        ->join('properties','addtocarts.property_id','properties.id')
        ->select(DB::raw('SUM(properties.price) as total_field_name'))
        ->where('addtocarts.user_id',$id)
        ->where('addtocarts.status',1)
        ->first();        
        return view('front.payment.Razorpay',compact('result'));
    }

    public function payment(Request $request)
    {        
        $input = $request->all();     
           
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
    
        $payment_id= $payment['id'];
        $payment_method=$payment['method'];
        $payment_email=$payment['email'];
        $payment_contact=$payment['contact'];

        $id=session()->get('FRONT_USER_ID');  
        $result = DB::table('addtocarts')
        ->join('properties','addtocarts.property_id','properties.id')
        ->select(DB::raw('SUM(properties.price) as total_field_name'))
        ->where('addtocarts.user_id',$id)
        ->where('addtocarts.status',1)
        ->first();            


        $user_pay = new Payment();
        $user_pay->payment_id = $payment_id;
        $user_pay->user_id = $id;
        $user_pay->payment_method = "RAZOR PAY";
        $user_pay->razorpay_method=$payment_method;
        $user_pay->razorpay_email=$payment_email;
        $user_pay->razorpay_contact=$payment_contact;
        $user_pay->amount = $result->total_field_name;
        $user_pay->save();

        $addtocart = Addtocart::find($id);
        $addtocart->status = "2";
        $addtocart->save();    

        if(count($input)  && !empty($input['razorpay_payment_id'])) 
        {
            try 
            {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } 
            catch (\Exception $e) 
            {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }            
        }
        
        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }
}
 

