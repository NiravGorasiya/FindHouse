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
    <form method="post" action="{{url('admin/property/update/'.$property->id)}}" method="post" runat="server" enctype="multipart/form-data">
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
                            <option data-tokens="type1" value="{{$list->id}}" {{$property->type == $list->id  ? 'selected' : ''}}>{{$list->property_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-12">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>State</label>
                        <select class="selectpicker" name="name" id="property_id" data-width="100%">
                           @foreach($propertyCategory as $pcategory)
                            <option value="{{$pcategory->id}}" {{$property->name == $pcategory->id ? 'selected' : ''}}>{{$pcategory->property_category}}</option>
                           @endforeach 
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="my_profile_setting_textarea">
                        <label for="propertyDescription">Description</label>
                        <textarea class="form-control" id="propertyDescription" name="description"
                            rows="3">{{$property->description}}</textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="my_profile_setting_input form-group">
                        <label for="formGroupExamplePrice">Price</label>
                        <input type="text" class="form-control" name="price" value="{{$property->price}}"
                            id="formGroupExamplePrice">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>Rooms</label>
                        <select class="selectpicker" data-live-search="true" name="rooms" data-width="100%">
                            <option data-tokens="Status1">1</option>
                            <option data-tokens="Status2">2</option>
                            <option data-tokens="Status3">3</option>
                            <option data-tokens="Status4">4</option>
                            <option data-tokens="Status5">5</option>
                            <option data-tokens="Status6">Other</option>
                        </select>
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
                        <label>State</label>
                        <select class="selectpicker" name="country" id="country_id" data-live-search="true"
                            data-width="100%">
                            <option data-tokens="Turkey">Select Country</option>
                            @foreach($country_data as $country)
                            <option value="{{$country->id}}" <?php echo ($property->country == $country->id)?'selected':''?>>{{$country->country_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>State select</label>
                        <select class="selectpicker" name="state" id="state_id" data-width="100%">
                        @foreach($state_data as $state)
                            <option value="{{$state->id}}" <?php echo ($property->state == $state->id)?'selected':''?>>{{$state->sname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="my_profile_setting_input ui_kit_select_search form-group">
                        <label>State</label>
                        <select class="selectpicker" name="city" id="city_id" data-width="100%">
                            @foreach($city_data as $city)
                            <option value="{{$city->id}}" <?php echo ($property->city == $city->id)?'selected':''?>>{{$city->cname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="my_profile_setting_input form-group">
                        <label for="propertyAddress">Address</label>
                        <input type="text" class="form-control" value="{{$property->address}}" name="address"
                            id="propertyAddress">
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
                        <input type="text" class="form-control" value="{{$property->area_size}}" name="area_size"
                            id="propertyASize">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="sizePrefix">Size Prefix</label>
                        <input type="text" class="form-control" value="{{$property->size_prefix}}" name="size_prefix"
                            id="sizePrefix">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="bedRooms">Bedrooms</label>
                        <input type="text" name="bedrooms" value="{{$property->bedrooms}}" class="form-control"
                            id="bedRooms">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="bathRooms">Bathrooms</label>
                        <input type="text" name="bathrooms" value="{{$property->bedrooms}}" class="form-control"
                            id="bathRooms">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="garages">Garages</label>
                        <input type="text" name="garages" value="{{$property->garages}}" class="form-control"
                            id="garages">
                    </div>
                </div>

                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="yearBuild">Year Built</label>
                        <input type="text" name="year_built" value="{{$property->year_built}}" class="form-control"
                            id="yearBuild">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="yearBuild">Video Url</label>
                        <input type="text" name="video_url" class="form-control" value="{{$property->video_url}}"id="yearBuild">
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
                                    name="amenities[]" id="customCheck1"
                                    <?php echo in_array('Air Conditioning',$propertyAmenities)?"checked":"" ?>>
                                <label class="custom-control-label" for="customCheck1">Air Conditioning</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Lawn" name="amenities[]"
                                    id="customCheck2" <?php echo in_array('Lawn',$propertyAmenities)?"checked":"" ?>>
                                <label class="custom-control-label" for="customCheck2">Lawn</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Swimming Pool"
                                    name="amenities[]" id="customCheck3"
                                    <?php echo in_array('Swimming Pool',$propertyAmenities)?"checked":"" ?>>
                                <label class="custom-control-label" for="customCheck3">Swimming Pool</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Barbeque" name="amenities[]"
                                    id="customCheck4" <?php echo in_array('Barbeque',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck4">Barbeque</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Microwave" name="amenities[]"
                                    id="customCheck5"
                                    <?php echo in_array('Microwave',$propertyAmenities)?"checked":""?>>
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
                                    id="customCheck6" <?php echo in_array('TV Cable',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck6">TV Cable</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Dryer" name="amenities[]"
                                    id="customCheck7" <?php echo in_array('Dryer',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck7">Dryer</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Outdoor Shower"
                                    name="amenities[]" id="customCheck8"
                                    <?php echo in_array('Outdoor Shower',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Washer" name="amenities[]"
                                    id="customCheck9" <?php echo in_array('Washer',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck9">Washer</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Gym" name="amenities[]"
                                    id="customCheck10" <?php echo in_array('Gym',$propertyAmenities)?"checked":""?>>
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
                                    name="amenities[]" id="customCheck11"
                                    <?php echo in_array('Refrigerator',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck11">Refrigerator</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="WiFi" name="amenities[]"
                                    id="customCheck12" <?php echo in_array('WiFi',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck12">WiFi</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Laundry" name="amenities[]"
                                    id="customCheck13" <?php echo in_array('Laundry',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck13">Laundry</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Sauna" name="amenities[]"
                                    id="customCheck14" <?php echo in_array('Sauna',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck14">Sauna</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="Window Coverings"
                                    name="amenities[]" id="customCheck15"
                                    <?php echo in_array('Window Coverings',$propertyAmenities)?"checked":""?>>
                                <label class="custom-control-label" for="customCheck15">Window Coverings</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="my_dashboard_review mt30">
            <div class="row">
                <div class="col-xl-12">
                    <div class="my_profile_setting_input form-group">
                        <label for="planDsecription">Plan Description</label>
                        <input type="text" class="form-control" value="{{$property->p_description}}"
                            name="p_description" id="planDsecription">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planBedrooms">Plan Bedrooms</label>
                        <input type="text" class="form-control" value="{{$property->p_bedrooms}}" name="p_bedrooms"
                            id="planBedrooms">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planBathrooms">Plan Bathrooms</label>
                        <input type="text" class="form-control" value="{{$property->p_bedrooms}}" name="p_bathrooms"
                            id="planBathrooms">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planPostfix">Price Postfix</label>
                        <input type="text" class="form-control" value="{{$property->p_postfix}}" name="p_postfix"
                            id="planPostfix">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planPrice">Plan Price</label>
                        <input type="text" class="form-control" value="{{$property->p_price}}" name="p_price"
                            id="planPrice">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4">
                    <div class="my_profile_setting_input form-group">
                        <label for="planSize">Plan Size</label>
                        <input type="text" class="form-control" value="{{$property->p_size}}" name="p_size"
                            id="planSize" required>
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
                  
                        <!--  -->
                        @foreach(explode(',',$property->image) as $images)
                        <div class="col-sm-3 col-3 mdimgUp">
                        <div class="imagePreview " style="background-image: url({{ asset('images/product/'.$images)}})" id="blah" ></div>
                                <!-- <img src="{{ asset('images/product/'.$images)}}" /> -->
                        <label class="btn btn-primary">
                            Upload<input name="image[]" accept="image/*" type="file" class="uploadFile img"  onchange="readURL(this);"  id="imgInp" value="Upload Photo"
                                style="width: 0px;height: 0px;overflow: hidden;" >
                        </label>
                        </div><!-- col-2 -->
                        @endforeach
                       
                        
                    <i class="fa fa-plus imgAdd"></i>
                </div><!-- row -->
            </div><!-- container -->
        </div>

        <div class="my_dashboard_review mt30">
            <div class="row">
                <div class="col-xl-12">
                    <div class="my_profile_setting_input">
                        <center><button class="btn btn2 " style="text-align:center;" type="submit">ADD
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
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection