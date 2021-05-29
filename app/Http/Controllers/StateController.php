<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $country=DB::table('countries')->where(['status'=>1])->get();
        
        $state=DB::table('countries')
        ->join('states','countries.id','states.country_id')
        ->select('states.sname','countries.country_name','states.status','states.id')
        ->where(['states.status'=>1])
        ->get();
    //     echo"<pre>";
    //     print_r($state);
    //    die();
                      return view('admin.state',compact('state','country'));
                    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $state=new State;
        $state->sname=$request->sname;
        $state->country_id=$request->country_id;
        $state->save();
        return response()->json($state);
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
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    
    public function getStateById(State $state,$id)
    {
        
        // $country_data=DB::table('countries')->select('id','country_name')->where(['status'=>1])->get();
        // return view('admin.state',compact('country_data'));
        $state=State::find($id);
        return response()->json($state);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $state =State::find($request->id);
        $state->country_id=$request->country_id;
        $state->sname=$request->sname;
        $state->save();
        return response()->json($state);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state,$id)
    {
        $state=State::find($id);
        $state->delete();
        return response()->json(['success'=>"Record has been Delete"]);
    }
    public function ChangeStatus(Request $request)
    {
        $state = State::find($request->id);
        $state->status = $request->status;
        $state->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
