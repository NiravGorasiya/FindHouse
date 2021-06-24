<?php

namespace App\Http\Controllers;

use App\Property;
use App\Country;
use App\State;
use App\City;
use App\PropertyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $propertytype=DB::table('property_types')->where(['status'=>1])->get();
        $country=DB::table('countries')->where(['status'=>1])->get();
        $ptype=DB::table('property_categories')->where(['status'=>1])->get();
        return view('admin.property_add',compact('propertytype','country','ptype'));

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
    public function getcountry(Request $request)
    {
     
        $state=State::where('country_id',$request->country_id)->get();
        echo "<option value=''>SELECT </option>";
        foreach($state as $cname) {
          echo "<option value='$cname->id'>$cname->sname</option>";
        }
    }
    
    public function getcity(Request $request)
    {
     
        $city=City::where('state_id',$request->state_id)->get();
        echo "<option value=''>SELECT</option>";
        foreach($city as $name) {
          echo "<option value='$name->id'>$name->cname</option>";
        }
    }

    public function gettypename(Request $request)
    {
        $propertycategory=PropertyCategory::where('propertytype_id',$request->propertytype_id)->get();
        echo "<option value=''>SELECT </option>";
        foreach($propertycategory as $pname) {
          echo "<option value='$pname->id'>$pname->property_category</option>";
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
           
        $id = session()->get('ADMIN_ID');


        $property =new property;
        $property->admin_id=$id;
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
        return redirect('/admin/list/property');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        $property=DB::table('properties')
                 ->join('property_types','property_types.id','properties.type')
                 ->join('property_categories','property_categories.id','properties.name')
                 ->select('property_types.property_name','properties.*','property_categories.property_category')
                ->where(['properties.status'=>1])
                ->paginate(1);
                
                

        return view('admin.property',compact('property'));
    }

    public function listview(Property $property,$id)
    {
        
        $propertyview=Property::find($id);
        return view('admin.propertyview',compact('propertyview'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property,$id)
    {
       $property=Property::find($id);
       $propertytype=DB::table('property_types')->where(['status'=>1])->get();
       $propertyCategory=DB::table('property_categories')->where(['status'=>1])->get();
       $country_data=DB::table('countries')->select('id','country_name')->where(['status'=>1])->get();
       $state_data=DB::table('states')->select('id','sname')->where(['status'=>1])->get();
       $city_data=DB::table('cities')->select('id','cname')->where(['status'=>1])->get();
       $ptype=DB::table('property_categories')->where(['status'=>1])->get();
       $propertyAmenities = explode(',',$property->amenities);
       return view('admin.property_edit',compact('property','propertytype','propertyCategory' ,'propertyAmenities','country_data',
       'state_data','city_data','ptype'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property,$id)
    {
        $input = $request->all();
  
        $property=Property::find($id);
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
        
      if(  $file=$request->file('image')){
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
    }else
      {
        unset($input['image']);
      }  
        $property->save();
        return redirect('/admin/list/property');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property,$id)
    {
        $property=Property::find($id);
        $property->delete();
        return response()->json(['success'=>"Record has been Delete"]);
    }   
    public function ChangeStatus(Request $request)
    {
        $property = Property::find($request->id);
        $property->status = $request->status;
        $property->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
