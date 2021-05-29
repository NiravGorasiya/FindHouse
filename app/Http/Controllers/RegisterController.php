<?php

namespace App\Http\Controllers;

use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Crypt;
use Mail;
use Socialite;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data=['name'=>"Nirav",'data'=>"Hello world"];
       $user['to']='niravgorasiya10@gmail.com';  
        Mail::send('email', $data, function ($message) use($user){
            $message->to($user['to']);
            $message->subject('Hello');
        });
    }

  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function show(Register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function edit(Register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Register  $register
     * @return \Illuminate\Http\Response
     */
    public function destroy(Register $register)
    {
        //
    }
    public function register(Request $request)
    {
        $valid=Validator::make($request->all(),[
              "user"=>'required',
              "username"=>'required', 
              "email"=>'required|email|unique:registers,email',
              "password"=>'required',
              "mobile"=>'required|numeric|digits:10'        
        ]);

        if(!$valid->passes()){
            return response()->json(['status' =>'error','error'=>$valid->errors()->toArray()]);
        }
        else{ 
            $rand_id=rand(111111111,999999999);
            $arr=[
                "user"=>$request->user,
                "username"=>$request->username,
                "email"=>$request->email,
                "password"=>Crypt::encrypt($request->password),
                "mobile"=>$request->mobile,
                "is_verify"=>0,
                "rand_id"=>$rand_id,
                "created_at"=>date('Y-m-d h:i:s'),
                "updated_at"=>date('Y-m-d h:i:s')
            ];
            $query=DB::table('registers')->insert($arr);
            if($query){
                
                $data=['username'=>$request->username,'rand_id'=>$rand_id];
                $user['to']=$request->email;
                Mail::send('email_verification',$data,function($messages) use ($user){
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification');
                });


                return response()->json(['status'=>'success','msg'=>"please check your email id for verification"]);
            }
        }

    }
    public function email_verification(Request $request,$id)
    {
        $result=DB::table('registers')  
            ->where(['rand_id'=>$id])
            ->where(['is_verify'=>0])
            ->get(); 
         
         if(isset($result[0]))
         {
             DB::table('registers')
             ->where(['id'=>$result[0]->id])
             ->update(['is_verify'=>1,'rand_id'=>'']);
          return view('verification');
         }else
         {
          return redirect('/'); 
         }
    }    
    public function login(Request $request)
    {
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
         $result=DB::table('registers')
                    ->where(['email'=>$request->string_login_email]) 
                    ->first();
            if(isset($result)){
                $db_pwd=Crypt::decrypt($result->password);
                 $status=$result->status;
                 $is_verify=$result->is_verify;
               
                //  if($is_verify==0){
                //     return response()->json(['status'=>"error",'msg'=>'Please verify your email id']); 
                // }
                // if($status==0){
                //     return response()->json(['status'=>"error",'msg'=>'Your account has been deactivated']); 
                // }
                
                    if($db_pwd==$request->str_login_password){
                        if($request->rememberme===null){
                            setcookie('login_email',$request->string_login_email,
                            100);
                            setcookie('login_pwd',$request->str_login_password,
                            100);
                        }else
                        {
                           setcookie('login_email',$request->string_login_email,
                           time()+60*60*24*365);
                           setcookie('login_pwd',$request->str_login_password,
                           time()+60*60*24*365);
                        }
                        $request->session()->put('FRONT_USER_LOGIN','true');
                        $request->session()->put('FRONT_USER_ID',$result->id);
                        $request->session()->put('FRONT_USER_USERNAME',$result->username);
                        $request->session()->put('FRONT_USER_EMAIL',$result->email);
                        $request->session()->put('USER_TYPE',$result->user);
                        // dd($request->session());
                        $status="success";
                        $msg="";
                        }else{
                        $status="error";
                        $msg="Please enter valid password";
                    }
           }else{
                $status="error";
                $msg="Please enter valid email id";
            }    
        return response()->json(['status'=>$status,
        'msg'=>$msg]);
    
    }
    public function forgot_password(Request $request){
        $result=DB::table('registers')
        ->where(['email'=>$request->str_forgot_email])
        ->get();                    
        $rand_id=rand(111111111,999999999);

        if(isset($result[0])){
            DB::table('registers')
            ->where(['email'=>$request->str_forgot_email])
            ->update(['is_forgot_password'=>1,'rand_id'=>$rand_id]);
        
            $data=['username'=>$result[0]->username,'rand_id'=>$rand_id];
            $user['to']=$request->str_forgot_email;
            Mail::send('front/forgot_password',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject("forgot password");
            });
           
            return response()->json(['status'=>'success','msg'=>'Please check your email if for password']);
        }else{
            return response()->json(['status'=>'error','msg'=>'Email Id not register']);
        }

    }
   
    public function forgot_password_change(Request $request,$id)
    {
        $result=DB::table('registers')  
            ->where(['rand_id'=>$id])
            ->where(['is_forgot_password'=>1])
            ->get();
        if(isset($result[0])){
            $request->session()->put('FORGOT_PASSWORD_USER_ID',$result[0]->id);
             
            return view('front.forgot_password_change');
        }else{
            return redirect('/');
        }
    }
   
    public function forgot_password_change_process(Request $request)
    {              
        DB::table('registers')  
            ->where(['id'=>$request->session()->get('FORGOT_PASSWORD_USER_ID')])

            ->update(
                [
                    'is_forgot_password'=>0,
                    'password'=>Crypt::encrypt($request->password)   ,
                    'rand_id'=>''
                ]
            ); 
        return response()->json(['status'=>'success','msg'=>'Password changed']);     
    }


    public function test(Request $request)
    {     
        $id = session()->get('FRONT_USER_FACEBOOK_EMAIL');
        print_r($id);
       
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
  
            $user = Socialite::driver('google')->user();
   
            $finduser = User::where('google_id', $user->id)->first();
   
            if($finduser){
   
                Auth::login($finduser);
  
                 return redirect('/home');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id
                ]);
  
                Auth::login($newUser);
   
                return redirect()->back();
            }
  
        } catch (Exception $e) {
            return redirect('auth/google');
        }
    }
      
    public function fbbutton()
    {
        return view('fb');
    }
    public function fbsubmit()
    {
        return Socialite::driver('facebook')->redirect();  
    }
    Public function fbres(Request $request)
    {
        
        $fbUser = Socialite::driver('facebook')->stateless()->user();
        $finduser = Register::where('facebookId', $fbUser->id)->first();
        if(!$finduser){
            $register=new Register;
            $register->facebookId=$fbUser->id;
            $register->email=$fbUser->email;
            $register->save();
        }
        $request->session()->put('FRONT_USER_FACEBOOK_EMAIL',$fbUser->id);
        return redirect('/');


    }
  
}
