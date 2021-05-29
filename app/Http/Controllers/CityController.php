<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state=DB::table('states')->where(['status'=>1])->get();
        $city=DB::table('cities')
            ->join('states','cities.state_id','states.id')
            ->select('cities.id','states.sname','cities.cname','cities.status')
            ->where(['cities.status'=>1])
            ->get();
            // echo"<pre>";
            // print_r($city);
            // die();
            
        return view('admin.city',compact('city','state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $notification = array(
            'message' => 'Post created successfully!',
            'alert-type' => 'success'
        );
        
        $city=new City;
        $city->state_id=$request->state_id; 
        $city->cname=$request->cname;
        $city->save();
        
        return response()->json($city);
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
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        
        $city =City::find($request->id);
        $city->state_id=$request->state_id;
        $city->cname=$request->cname;
        $city->save();
        return response()->json($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function getCityById(City $city,$id)
    {
        $city=City::find($id);
        return response()->json($city);   
    }
    public function destroy(City $city,$id)
    {
        $city=City::find($id);
        $city->delete();
        return response()->json(['success'=>"Record has been Delete"]);
    }
    public function ChangeStatus(Request $request)
    {
        $city = City::find($request->id);
        $city->status = $request->status;
        $city->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
