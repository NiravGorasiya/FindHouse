<?php

namespace App\Http\Controllers;
use Stripe;
use Session;
use DB;
use App\Payment;
use Illuminate\Http\Request;

class StripeController extends Controller
{
   
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $id=session()->get('FRONT_USER_ID');
        
        $result = DB::table('addtocarts')
                ->join('properties','addtocarts.property_id','properties.id')
                ->select(DB::raw('SUM(properties.price) as total_field_name'))
                ->where('addtocarts.user_id',$id)
                ->first();
        Stripe\Charge::create ([
                "amount" => $result->total_field_name *100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
        $id=session()->get('FRONT_USER_ID');
        $payment = new Payment;
        $payment->payment_name=$request->payment_name;
        $payment->user_id=$id;
        $payment->payment_method = "STRIPE";
        $payment->card_number=$request->card_number;
        $payment->card_cvc=$request->card_cvc;
        $payment->expirmonth=$request->expirmonth;
        $payment->expireyear=$request->expireyear;
        $payment->currency =env('STRIPE_CURRENCY');
        $payment->amount = $result->total_field_name;
        $payment->save();
        Session::flash('success', 'Payment has been successfully processed.');
          
        return redirect('/');
    }
}
