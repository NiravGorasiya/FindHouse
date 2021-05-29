<?php

namespace App\Http\Controllers;

use App\Wishlist;
use App\Register;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        

        $property_id=$request->property_id;   
        $user_id=session()->get('FRONT_USER_ID');
        if($user_id){
            if(Wishlist::where('user_id',$user_id)->where('property_id',$property_id)->exists())
            {
                return response()->json(['status'=>'property is already add  to wishlist']);
            }
            else
            {
                $wishlist =new Wishlist();
                $uid=$request->session()->get('FRONT_USER_ID');
                $wishlist->user_id=$uid;
                $wishlist->property_id=$request->property_id;
                $wishlist->save();
                return response()->json(['status'=>'property  add  to wishlist']);

            }
        } else {
            return response()->json(['status'=>'Please login']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
