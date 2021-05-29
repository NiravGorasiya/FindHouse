<?php

namespace App\Http\Controllers;

use App\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyCategory=DB::table('property_categories')
                        ->join('property_types','property_categories.propertytype_id','property_types.id')
                        ->select('property_categories.id','property_categories.property_category','property_types.property_name','property_categories.status')
                        ->get();
        $propertytype=DB::table('property_types')->where(['status'=>1])->get();
        return view('admin.property_category',compact('propertyCategory','propertytype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
          $propertyCategory=new  PropertyCategory;
          $propertyCategory->propertytype_id=$request->propertytype_id;
          $propertyCategory->property_category=$request->property_category;
          $propertyCategory->save();
          return response()->json($propertyCategory);
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
    public function getPropertypeById(PropertyCategory $propertyCategory,$id)
    {
        $propertyCategory=PropertyCategory ::find($id);
        return response()->json($propertyCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyCategory  $propertyCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyCategory $propertyCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyCategory  $propertyCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyCategory $propertyCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyCategory  $propertyCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyCategory $propertyCategory)
    {
        $propertyCategory =PropertyCategory::find($request->id);
        $propertyCategory->propertytype_id=$request->propertytype_id;
        $propertyCategory->property_category=$request->property_category;
        $propertyCategory->save();
        return response()->json($propertyCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyCategory  $propertyCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyCategory $propertyCategory,$id)
    {
        $propertyCategory=PropertyCategory::find($id);
        $propertyCategory->delete();
        return response()->json(['success'=>"Record has been Delete"]);
    }
    public function userChangeStatus(Request $request)
    {
        $PropertyCategory = PropertyCategory::find($request->id);
        $PropertyCategory->status = $request->status;
        $PropertyCategory->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
