<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Register;
use App\Wishlist;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function dashboard()
    {
        $id=session()->get('FRONT_USER_ID');
        $register=Register::find($id);         
        return view("front.User.user_dashboard",compact('register'));   
    }
    public function edit()
    {
        $id=session()->get('FRONT_USER_ID');
        $register=Register::find($id);
        return view('front.user.user_profile',compact('register'));
    }
    public function update(Request $request)
    {
           
        $id = session()->get('FRONT_USER_ID');
        $Register =Register::find($id);
        if($request->file('profile')){
            $file=$request->file('profile');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->profile->move('profile/image',$filename);
            $Register->profile=$filename;
        }
        $Register->firstname=$request->firstname;
        $Register->lastname=$request->lastname;
        $Register->language=$request->language;
        $Register->country_id=$request->country_id;
        $Register->state_id=$request->state_id;
        $Register->city_id=$request->city_id;
        $Register->facebook=$request->facebook;
        
        $Register->about=$request->about;
        $Register->save();    
        return redirect('/user/profile');
    }
  
    public function userwishlist(){
        $id=session()->get('FRONT_USER_ID');
        $wishlist=DB::table('whishlist')
                ->join('properties','properties.id','whishlist.property_id')
                ->select('properties.*','whishlist.*')
                ->where('whishlist.user_id',$id)
                ->paginate(1);
             //  dd($wishlist);
        return view('front.user.user_wishlist',compact('wishlist'));
    }              
    public function destroy($id){  
        $wishlist=Wishlist::find($id);
        $wishlist->delete();
        return response()->json(['success'=>"Record has been Delete"]);
    }
    public function userreview(){
        $id=session()->get('FRONT_USER_ID');
        $review=DB::table('reviews')
                ->join('registers','registers.id','reviews.user_id')
                ->select('registers.*','reviews.*')
                ->where('reviews.user_id',$id)
                ->get();
        return view('front.user.user_review',compact('review'));
    }
}
