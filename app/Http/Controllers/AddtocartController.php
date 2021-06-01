<?php

namespace App\Http\Controllers;

use App\Addtocart;
use App\Property;
use Illuminate\Http\Request;
use Stripe;
use Session;
use DB;
use App\Payment;
use Srmklive\PayPal\Services\ExpressCheckout;


class AddtocartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=session()->get('FRONT_USER_ID');
        $property=DB::table('addtocarts')
               ->join('properties','addtocarts.property_id','properties.id')
               ->join('registers','addtocarts.user_id','registers.id')
               
               ->select('addtocarts.*','properties.price','properties.image','properties.name')
               ->where(['user_id'=>$id])
                ->get();  
               
        $result = DB::table('addtocarts')
                ->join('properties','addtocarts.property_id','properties.id')
                ->select(DB::raw('SUM(properties.price) as total_field_name'))
                ->where('addtocarts.user_id',$id)
                ->first();
            //  dd($result);   
     return view('front.Add_to_cart',compact('property','result'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {        
        $input_data=$request->all();
        $payment_method=$input_data['payment'];
        if($payment_method=='stripe')
        {
            return redirect('/stripe');
        }else
        {
            return redirect('/paypal');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $notification = array(
                'message' => 'Post created successfully!',
                'alert-type' => 'success'
            );
            
    
            $property_id=$request->property_id;   
            $user_id=session()->get('FRONT_USER_ID');
            if($user_id){
                if(Addtocart::where('user_id',$user_id)->where('property_id',$property_id)->exists())
                {
                    return response()->json(['status'=>'property is already add  to addtocart']);
                }
                else
                {
                    $wishlist =new Addtocart();
                    $uid=$request->session()->get('FRONT_USER_ID');
                    $wishlist->user_id=$uid;
                    $wishlist->property_id=$request->property_id;
                    $wishlist->save();
                    return response()->json(['status'=>'property  add cart']);
    
                }
            } else {
                return response()->json(['status'=>'Please login']);
            }
            
        }   //
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Addtocart  $addtocart
     * @return \Illuminate\Http\Response
     */
    public function show(Addtocart $addtocart)
    {
        $id=session()->get('FRONT_USER_ID');
        $result = DB::table('addtocarts')
        ->join('properties','addtocarts.property_id','properties.id')
        ->select(DB::raw('SUM(properties.price) as total_field_name'))
        ->where('addtocarts.user_id',$id)
        ->first();
        return view('front.checkout',compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Addtocart  $addtocart
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Addtocart  $addtocart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addtocart $addtocart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Addtocart  $addtocart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Addtocart $addtocart)
    {
        //
    }
   
   
    public function stripePost(Request $request)
    {
        
    }
    public function charge(Request $request)
    {
        if ($request->input('stripeToken')) {
  
            $gateway = Omnipay::create('Stripe');
            $gateway->setApiKey(env('STRIPE_SECRET_KEY'));
           
            $token = $request->input('stripeToken');
           
            $response = $gateway->purchase([
                'amount' => $request->input('amount'),
                'currency' => env('STRIPE_CURRENCY'),
                'token' => $token,
            ])->send();
           
            if ($response->isSuccessful()) {
                // payment was successful: insert transaction data into the database
                $arr_payment_data = $response->getData();
                  
                $isPaymentExist = Payment::where('payment_id', $arr_payment_data['id'])->first();
           
                if(!$isPaymentExist)
                {
                    $payment = new Payment;
                    $payment->payment_id = $arr_payment_data['id'];
                    $payment->payer_email = $request->input('email');
                    $payment->amount = $arr_payment_data['amount']/100;
                    $payment->currency = env('STRIPE_CURRENCY');
                    $payment->payment_status = $arr_payment_data['status'];
                    $payment->save();
                }
  
                return "Payment is successful. Your payment id is: ". $arr_payment_data['id'];
            } else {
                // payment failed: display message to customer
                return $response->getMessage();
            }
        }
    }
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
    public function paypal()
    {
        $register=DB::table('registers')->first();
        $id=session()->get('FRONT_USER_ID');
        
        $result = DB::table('addtocarts')
                ->join('properties','addtocarts.property_id','properties.id')
                ->select(DB::raw('SUM(properties.price) as total_field_name'))
                ->where('addtocarts.user_id',$id)
                ->first();

         return view('front.paypal',compact('register','result'));
    }
    
    public function handlePayment()
    {
        $product = [];
        $product['items'] = [
            [
                'name' => 'Nike Joyride 2',
                'price' => 112,
                'desc'  => 'Running shoes for Men',
                'qty' => 2
            ]
        ];
  
        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = 224;
  
        $paypalModule = new ExpressCheckout;
  
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);
        print_r($res);
        echo "Hello";
        // return redirect($res['paypal_link']);
    }
    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }
  
        dd('Error occured!');
    }
}
