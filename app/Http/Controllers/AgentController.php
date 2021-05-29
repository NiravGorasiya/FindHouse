<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Register;
use App\Property;
use App\Country;
use App\State;
use App\City;
use App\Wishlist;
use App\PropertyCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=session()->get('FRONT_USER_ID');
        $Register=Register::find($data);
        return view('front.agent.Agent_profile',compact('Register'));
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
    public function dashboard()
    {
        $data=session()->get('FRONT_USER_ID');
        $Register=Register::find($data);
        $property=DB::table('properties')->where('agent_id',$data)->count();
        $totalreview=DB::table('reviews')->count();
        $review=DB::table('reviews')->where('user_id',$data)->count();
        $favorite=DB::table('whishlist')->where('user_id',$data)->count();
        return view('front.agent.agent_dashboard',compact('Register','property','review','totalreview','favorite'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           
        $id = session()->get('FRONT_USER_ID');
        $property =new property;
        $property->agent_id=$id;
        $property->type=$request->type;
        $property->name=$request->name;
        $property->description=$request->description;
        $property->price=$request->price;
        $property->rooms=$request->rooms;
        $property->country=$request->country;
        $property->state=$request->state;
        $property->city=$request->city;
        $property->address=$request->address;
        $property->size_prefix=$request->size_prefix;
        $property->area_size=$request->area_size;
        $property->bedrooms=$request->bedrooms;   
        $property->bathrooms=$request->bathrooms;   
        $property->garages=$request->garages;   
        $property->amenities = implode(',',$request->amenities); 
        $property->year_built=$request->year_built;    
        $property->p_description=$request->p_description;  
        $property->p_bedrooms=$request->p_bedrooms;
        $property->p_bathrooms=$request->p_bathrooms;
        $property->p_postfix=$request->p_postfix;
        $property->p_price=$request->p_price;
        $property->p_size=$request->p_size;
        $property->video_url=$request->video_url; 

        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/',$filename);
            $property->file=$filename;
        }
        
        $file=$request->file('image');
        $product_img='';
        for($i=0;$i<sizeof($file);$i++)
        {
        	if($file[$i])
			{
				$destinationPath = public_path() . '/images/product/';
				$filename = $file[$i]->getClientOriginalName();
				$upload_success = $file[$i]->move($destinationPath,$filename);
				$product_img.=$filename.',';
			}
		   
        }
        $product_img=rtrim($product_img,',');
        $property->image = $product_img;
        $property->save();
        return redirect('agent/property/display');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Agent $agent)
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
        $Register->instagram=$request->instagram;
        $Register->about=$request->about;
        $Register->save();    
        return redirect('/agent/profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $wdddcccagent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent,$id)
    {
        $property=Property::find($id);
       $propertytype=DB::table('property_types')->where(['status'=>1])->get();
       $propertyCategory=DB::table('property_categories')->where(['status'=>1])->get();
       $country_data=DB::table('countries')->select('id','country_name')->where(['status'=>1])->get();
       $state_data=DB::table('states')->select('id','sname')->where(['status'=>1])->get();
       $city_data=DB::table('cities')->select('id','cname')->where(['status'=>1])->get();
       $ptype=DB::table('property_categories')->where(['status'=>1])->get();
       $propertyAmenities = explode(',',$property->amenities);
       return view('front.agent.Agent_property_edit',compact('property','propertytype','propertyCategory' ,'propertyAmenities','country_data',
       'state_data','city_data','ptype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent,$id)
    {
        $data = session()->get('FRONT_USER_ID');
        // print_r($data);
        // die();
        $property=Property::find($id);
        $property->agent_id=$data;
        $property->type=$request->type;
        $property->name=$request->name;
        $property->description=$request->description;
        $property->price=$request->price;
        $property->rooms=$request->rooms;
        $property->country=$request->country;
        $property->state=$request->state;
        $property->city=$request->city;
        $property->address=$request->address;
        $property->size_prefix=$request->size_prefix;
        $property->area_size=$request->area_size;
        $property->bedrooms=$request->bedrooms;   
        $property->bathrooms=$request->bathrooms;   
        $property->garages=$request->garages;   
        $property->amenities = implode(',',$request->amenities); 
        $property->year_built=$request->year_built; 
        $property->video_url=$request->video_url; 
        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->move('storage/',$filename);
            $property->file=$filename;
        }
        $property->p_description=$request->p_description;  
        $property->p_bedrooms=$request->p_bedrooms;
        $property->p_bathrooms=$request->p_bathrooms;
        $property->p_postfix=$request->p_postfix;
        $property->p_price=$request->p_price;
        $property->p_size=$request->p_size;
        
        $file=$request->file('image');
        $product_img='';
        for($i=0;$i<sizeof($file);$i++)
        {
        	if($file[$i])
			{
				$destinationPath = public_path() . '/images/product/';
				$filename = $file[$i]->getClientOriginalName();
				$upload_success = $file[$i]->move($destinationPath,$filename);
				$product_img.=$filename.',';
			}
		   
        }
        $product_img=rtrim($product_img,',');
        $property->image = $product_img;
        $property->save();
        return redirect('agent/property/display');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wishlist=Wishlist::find($id);
        $wishlist->delete();
        return response()->json(['success'=>"Record has been Delete"]);
    }
    Public function agentproperty()
    {
        $propertytype=DB::table('property_types')->where(['status'=>1])->get();
        $country=DB::table('countries')->where(['status'=>1])->get();
        $ptype=DB::table('property_categories')->where(['status'=>1])->get();
        return view ('front.agent.Agent_property_add',compact('propertytype','country','ptype'));
    }
    public function display()
    {
        $id=session()->get('FRONT_USER_ID');
        $property=DB::table('properties')
        ->join('property_types','property_types.id','properties.type')
        ->join('property_categories','property_categories.id','properties.name')
        ->select('property_types.property_name','properties.*','property_categories.property_category')
       ->where(['properties.status'=>1,'agent_id'=>$id])
       ->get();
        return view ('front.agent.Agent_propertyview',compact('property'));
    }
    Public function reviewdetails(){
        $id=session()->get('FRONT_USER_ID');
        $review=DB::table('reviews')
                ->join('registers','registers.id','reviews.user_id')
                ->select('registers.*','reviews.*')
                ->where('reviews.user_id',$id)
                ->get();
        return view('front.agent.agent_review',compact('review'));
    }
    Public function agentwishlist(){
        $id=session()->get('FRONT_USER_ID');
        $wishlist=DB::table('whishlist')
                ->join('properties','properties.id','whishlist.property_id')
                ->select('properties.*','whishlist.*')
                ->where('whishlist.user_id',$id)
                ->paginate(1);
             //  dd($wishlist);
        return view('front.agent.agent_wishlist',compact('wishlist'));
    }
}
     