<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country=Country::all();
        return view('admin.country',compact('country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $country=new Country;
        $country->country_name=$request->country_name;
        $country->save();
        return response()->json($country);
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
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }
    public function getCountryById(country $country,$id)
    {
        $country=Country::find($id);
        return response()->json($country);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $country =country::find($request->id);
        $country->country_name=$request->country_name;
        $country->save();
        return response()->json($country);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country,$id)
    {
        $country=Country::find($id);
        $country->delete();
        return response()->json(['success'=>"Record has been Delete"]);
    }
    public function ChangeStatus(Request $request)
    {
        $country = Country::find($request->id);
        $country->status = $request->status;
        $country->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
