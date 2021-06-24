@extends('admin.layout')
@section('container')
<link rel="stylesheet" type="text/css" href="{{ asset('asset_admin/css/multi_image.css') }}">
<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">Add New Property</h2>
        <p>We are glad to see you again!</p>
    </div>
</div>

<div class="col-lg-12">
    <form method="post" action="{{route('admin/property/add')}}" name="myform" onsubmit="return validate()" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="my_dashboard_review">
            <div class="row">
            
                <div class="col-lg-12 col-xl-12">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>Select Type</label>
                        <select class="selectpicker" id="propertytype_id" name="type" data-live-search="true"
                            data-width="100%">
                            <option data-tokens="type1" value="">Select type</option>
                            @foreach($propertytype as $list)
                            <option data-tokens="type1" value="{{$list->id}}">{{$list->property_name}}</option>
                            @endforeach
                        </select>
                        <sapn id="propertytype" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>State</label>
                        <select class="selectpicker" name="name" id="property_id" data-width="100%">
                            <option value="">select name</option>
                        </select>
                        <sapn id="property" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my_profile_setting_textarea">
                        <label for="propertyDescription">Description</label>
                        <textarea class="form-control"  name="description" rows="3"></textarea>
                        <sapn id="descript" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="my_profile_setting_input form-group">
                        <label for="formGroupExamplePrice">Price</label>
                        <input type="text" class="form-control"  name="price" id="price" >   
                        <sapn id="prize" class="text-danger"></sapn>

                    </div>
                </div>
                
                <div class="col-lg-6 col-xl-6">
                    <div class="my_profile_setting_input form-group">
                        <label for="formGroupExamplePrice">Rooms</label>
                        <input type="text" class="form-control" name="rooms">
                        <sapn id="room" class="text-danger"></sapn>
                    </div>
                </div>

            </div>
        </div>
        <div class="my_dashboard_review mt30">
            <h4 class="mb30">Location</h4>
            <div class="row">
                @csrf
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>country</label>
                        <select class="selectpicker" name="country" id="country_id" data-width="100%">
                            <option data-tokens="Turkey">Select Country</option>
                            @foreach($country as $list)
                            <option value="{{$list->id}}">{{$list->country_name}}</option>
                            @endforeach
                        </select>
                        <sapn id="countryid" class="text-danger font-weight-bold"></sapn>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>State</label>
                        <select class="selectpicker" name="state" id="state_id" data-width="100%">
                            <option value="">select State</option>
                        </select>
                        <sapn id="stateid" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>city</label>
                        <select class="selectpicker" name="city" id="city_id" data-width="100%">
                            <option value="">select City</option>
                        </select>
                        <sapn id="cityid" class="text-danger"></sapn>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="my_profile_setting_input form-group">
                        <label for="propertyAddress">Address</label>
                        <input type="text" class="form-control" name="address" id="propertyAddress">
                        <sapn id="addr" class="text-danger"></sapn>
                    </div>
                </div>
            </div>
        </div>
        <div class="my_dashboard_review mt30">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb30">Detailed Information</h4>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="propertyASize">Area Size</label>
                        <input type="text" class="form-control" name="area_size" id="propertyASize">
                        <sapn id="ASize" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="sizePrefix">Size Prefix</label>
                        <input type="text" class="form-control" name="size_prefix" id="sizePrefix">
                        <sapn id="Sizep" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="bedRooms">Bedrooms</label>
                        <input type="text" name="bedrooms" class="form-control" id="bedRooms">
                        <sapn id="brooms" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="bathRooms">Bathrooms</label>
                        <input type="text" name="bathrooms" class="form-control" id="bathRooms">
                        <sapn id="bath" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="garages">Garages</label>
                        <input type="text" name="garages" class="form-control" id="garages">
                        <sapn id="gara" class="text-danger"></sapn>
                    </div>
                </div>

                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="yearBuild">Year Built</label>
                        <input type="text" name="year_built" class="form-control" id="yearBuild">
                        <sapn id="year" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="yearBuild">Video Url</label>
                        <input type="text" name="video_url" class="form-control" id="yearBuild">
                        <sapn id="year" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="yearBuild">Document</label>
                        <input type="file" name="file" class="form-control" id="yearBuild">
                        <sapn id="year" class="text-danger"></sapn>
                    </div>
                </div>
                <div class="col-xl-12">
                    <h4>Amenities</h4>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
                    <ul class="ui_kit_checkbox selectable-list">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Air Conditioning"
                                    name="amenities[]" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Lawn" name="amenities[]"
                                    id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Lawn</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Swimming Pool"
                                    name="amenities[]" id="customCheck3">
                                <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Barbeque" name="amenities[]"
                                    id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">Barbeque</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Microwave" name="amenities[]"
                                    id="customCheck5">
                                <label class="custom-control-label" for="customCheck5">Microwave</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
                    <ul class="ui_kit_checkbox selectable-list">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="TV Cable" name="amenities[]"
                                    id="customCheck6">
                                <label class="custom-control-label" for="customCheck6">TV Cable</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Dryer" name="amenities[]"
                                    id="customCheck7">
                                <label class="custom-control-label" for="customCheck7">Dryer</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Outdoor Shower"
                                    name="amenities[]" id="customCheck8">
                                <label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Washer" name="amenities[]"
                                    id="customCheck9">
                                <label class="custom-control-label" for="customCheck9">Washer</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Gym" name="amenities[]"
                                    id="customCheck10">
                                <label class="custom-control-label" for="customCheck10">Gym</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-2">
                    <ul class="ui_kit_checkbox selectable-list">
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Refrigerator"
                                    name="amenities[]" id="customCheck11">
                                <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="WiFi" name="amenities[]"
                                    id="customCheck12">
                                <label class="custom-control-label" for="customCheck12">WiFi</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Laundry" name="amenities[]"
                                    id="customCheck13">
                                <label class="custom-control-label" for="customCheck13">Laundry</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Sauna" name="amenities[]"
                                    id="customCheck14">
                                <label class="custom-control-label" for="customCheck14">Sauna</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Window Coverings"
                                    name="amenities[]" id="customCheck15">
                                <label class="custom-control-label" for="customCheck15">Window Coverings</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        <div style="visibility:hidden; color:red; " id="chk_option_error">
Please select at least one option.
</div>
        </div>
        <div class="my_dashboard_review mt30">
            <div class="row">
                <div class="col-xl-12">
                    <div class="my_profile_setting_input form-group">
                        <label for="planDsecription">Plan Description</label>
                        <input type="text" class="form-control" name="p_description" id="planDsecription">
                        <sapn id="pDsecription" class="text-danger font-weight-bold"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planBedrooms">Plan Bedrooms</label>
                        <input type="text" class="form-control" name="p_bedrooms" id="planBedrooms">
                        <sapn id="pBedrooms" class="text-danger font-weight-bold"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planBathrooms">Plan Bathrooms</label>
                        <input type="text" class="form-control" name="p_bathrooms" id="planBathrooms">
                        <sapn id="pBathrooms" class="text-danger font-weight-bold"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planPostfix">Price Postfix</label>
                        <input type="text" class="form-control" name="p_postfix" id="planPostfix">
                        <sapn id="pPostfix" class="text-danger font-weight-bold"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planPrice">Plan Price</label>
                        <input type="text" class="form-control" name="p_price" id="planPrice">
                        <sapn id="pPrice" class="text-danger font-weight-bold"></sapn>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planSize">Plan Size</label>
                        <input type="text" class="form-control" name="p_size" id="planSize">
                        <sapn id="pSize" class="text-danger font-weight-bold"></sapn>
                    </div>
                </div>
              
            </div>
        </div>
        <div class="my_dashboard_review mt30">
            <h4 class="form-header text-uppercase" style="border-top: 1px solid rgba(0, 0, 0, 0.1);">
                <i class="fa fa-wpforms"></i>
                Images
            </h4>
            <div class="container">
                <div class="form-group row">
                    <div class="col-sm-3 imgUp">
                        <div class="imagePreview "></div>
                        <label class="btn btn-primary">
                            Upload<input name="image[]" type="file" class="uploadFile img" value="Upload Photo"
                                style="width: 0px;height: 0px;overflow: hidden;">
                        </label>
                    </div><!-- col-2 -->
                    <i class="fa fa-plus imgAdd"></i>
                </div><!-- row -->
            </div><!-- container -->
        </div>

        <div class="my_dashboard_review mt30">
            <div class="row">
                <div class="col-xl-12">
                    <div class="my_profile_setting_input">
                        <center><button class="btn btn2 " style="text-align:center;" id="button" type="submit">ADD
                                Property</button></center>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('custom')
<script>
$(document).ready(function() {
    $('#country_id').change(function() {
        console.log($(this).val());
        var semId = $(this).val();
        if (semId == "") {
            return false;
        }
        $.ajax({
            type: "GET",
            url: "{{url('admin/getcountry')}}",
            data: {
                country_id: semId
            },
            success: function(response) {
                $('#state_id').html(response).selectpicker('refresh');
            }
        })

    });
});
$(document).ready(function() {
    $('#state_id').change(function() {
        console.log($(this).val());
        var cId = $(this).val();
        if (cId == "") {
            return false;
        }
        $.ajax({
            type: "GET",
            url: "{{url('admin/getcity')}}",
            data: {
                state_id: cId
            },
            success: function(response) {
                $('#city_id').html(response).selectpicker('refresh');
            }
        })

    });
});
$(document).ready(function() {
    $('#propertytype_id').change(function() {
        console.log($(this).val());
        var tId = $(this).val();
        if (tId == "") {
            return false;
        }
        $.ajax({
            type: "GET",
            url: "{{url('admin/gettypename')}}",
            data: {
                propertytype_id: tId
            },
            success: function(response) {
                $('#property_id').html(response).selectpicker('refresh');
            }
        })

    });
});

function validate(){  
    var type=document.myform.type.value;
    var name=document.myform.name.value;
    var description=document.myform.description.value;
    var price=document.myform.price.value;
    var rooms=document.myform.rooms.value;
    var state=document.myform.state.value;
    var city=document.myform.city.value;
    var address=document.myform.address.value;
     var  area_size=document.myform.  area_size.value;
     var  size_prefix=document.myform.  size_prefix.value;
     var  bedrooms=document.myform.  bedrooms.value;
     var  bathrooms=document.myform.  bathrooms.value;
     var  garages=document.myform.  garages.value;
     var  year_built=document.myform.  year_built.value;
    var  planDsecription=document.myform.  planDsecription.value;
     var  planBedrooms=document.myform.  planBedrooms.value;
     var  p_bathrooms=document.myform.  p_bathrooms.value;
     var  planPostfix=document.myform.  planPostfix.value;
     var  planPrice=document.myform.  planPrice.value;
     var  planSize=document.myform.  planSize.value;
     
      
if (type==null || type==""){  
        document.getElementById("propertytype").innerHTML="Please select any";  
        return false; 
    }
    else{  
        document.getElementById("propertytype").innerHTML="";
    }  
if (name==null || name==""){  
        document.getElementById("property").innerHTML="Please select any";  
        return false; 
     }
    else{  
        document.getElementById("property").innerHTML="";
    }      
if (description==null || description==""){  
        document.getElementById("descript").innerHTML="Please description fill ";  
        return false; 
     }
    else{  
        document.getElementById("descript").innerHTML="";
    }      
if (price==null || price==""){  
        document.getElementById("prize").innerHTML=" please Enter value";  
        return false; 
    }else if (isNaN(price)){
    document.getElementById("prize").innerHTML="please enter only digite";
    return false; 
    }
    else{  
        document.getElementById("prize").innerHTML="";
    }  
if (rooms==null || rooms==""){  
         document.getElementById("room").innerHTML=" please Enter  value";  
        return false; 
    }else if (isNaN(rooms)){
    document.getElementById("room").innerHTML="please enter only digite";
    return false; 
    }
    else{  
        document.getElementById("room").innerHTML="";
    }    
 
if (state==null || state==""){  
        document.getElementById("stateid").innerHTML="Please select any";  
        return false; 
    }
    else{  
        document.getElementById("stateid").innerHTML="";
    }           
if (city==null || city==""){  
        document.getElementById("cityid").innerHTML="Please select any";  
        return false; 
    }
    else{  
        document.getElementById("cityid").innerHTML="";
    }
if (address==null || address==""){  
    document.getElementById("addr").innerHTML="Please Enter any value";  
    return false; 
    }
else{  
    document.getElementById("addr").innerHTML="";
}   
if (area_size==null ||area_size ==""){  
    document.getElementById("ASize").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("ASize").innerHTML="";
    }
if (size_prefix==null ||size_prefix ==""){  
    document.getElementById("Sizep").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("Sizep").innerHTML="";
    }    
if (bedrooms==null ||bedrooms ==""){  
    document.getElementById("brooms").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("brooms").innerHTML="";
    }
if (bathrooms==null ||bathrooms ==""){  
    document.getElementById("bath").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("bath").innerHTML="";
    }                
if (garages==null || garages==""){  
    document.getElementById("gara").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("gara").innerHTML="";
    }

if (year_built==null || year_built==""){  
        document.getElementById("year").innerHTML=" please Enter value";  
        return false; 
    }else if (isNaN(year_built)){
    document.getElementById("year").innerHTML="please enter only digite";
    return false; 
    }else if (year_built.length != 4){
    document.getElementById("year").innerHTML="please enter only  4 digite";
    return false; 
    }
    else{  
        document.getElementById("year").innerHTML="";
    }  
if (planDsecription==null ||planDsecription ==""){  
    document.getElementById("pDsecription").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("pDsecription").innerHTML="";
    }
if (planBedrooms==null ||planBedrooms ==""){  
    document.getElementById("pBedrooms").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("pBedrooms").innerHTML="";
    }    
if (p_bathrooms==null ||p_bathrooms ==""){  
    document.getElementById("pBathrooms").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("pBathrooms").innerHTML="";
    }
if (planPostfix==null ||planPostfix ==""){  
    document.getElementById("pPostfix").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("pPostfix").innerHTML="";
    }                
if (planPrice==null || planPrice==""){  
    document.getElementById("pPrice").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("pPrice").innerHTML="";
    }
if (planSize==null ||planSize ==""){  
    document.getElementById("pSize").innerHTML="Please Enter any value";  
    return false; 
    }
    else{  
    document.getElementById("pSize").innerHTML="";
    }                                
}  

 function validate()
{
    var form_data = new FormData(document.querySelector("form"));
    if(!form_data.has("amenities[]"))
    {
        document.getElementById("chk_option_error").style.visibility = "visible";
    }
    else
    {
        document.getElementById("chk_option_error").style.visibility = "hidden";
    }
    return false;
}


</script>
@endsection