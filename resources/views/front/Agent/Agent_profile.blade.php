@extends('front.Agent.Agent_layout')
@section('container')
<div class="col-lg-12 mb10">
    <div class="breadcrumb_content style2">
        <h2 class="breadcrumb_title">My Profile</h2>
        <p>We are glad to see you again!</p>
    </div>
</div>
<div class="col-lg-12">
    <div class="my_dashboard_review">
        <div class="row">
            <div class="col-xl-2">
                <h4>Profile Information</h4>
            </div>
            <div class="col-xl-10">
                <form action="{{route('/agent/profile/add')}}" name="myform" onsubmit="return validate()" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                    <div class="col-lg-12">
                            <div class="wrap-custom-file" >
                                <input type="file" name="profile" id="image1" onchange="readURL(this);" accept=".gif, .jpg, .png" />
                                <label for="image1" id="imageasa1">
                                    <span><i class="flaticon-download" id="image1"></i> Upload Photo </span>
                                </label>
                                <img src="{{asset('profile/image/'.$Register->profile)}}"  id="blah"  width="260" height="253">
                            </div>
                            <p>*minimum 260px x 260px</p>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput1">Username</label>
                                <input type="text" class="form-control" id="formGroupExampleInput1"  value="{{$Register->username}}">
                                <sapn id="uname" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleEmail">Email</label>
                                <input type="email" class="form-control" id="formGroupExampleEmail"  value="{{$Register->email}}" placeholder="">
                                <sapn id="email" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput3">First Name</label>
                                <input type="text" class="form-control" name="firstname" value="{{$Register->firstname}}">
                                <sapn id="fname" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput4">Last Name</label>
                                <input type="text" class="form-control" name="lastname" value="{{$Register->lastname}}" id="formGroupExampleInput4">
                                <sapn id="lname" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput8">Phone</label>
                                <input type="text" class="form-control"  value="{{$Register->mobile}}" id="mobile">
                                <sapn id="contact" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput11">Language</label>
                                <input type="text" class="form-control" name="language" value="{{$Register->language}}" id="language">
                                <sapn id="langua" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput8">Country</label>
                                <input type="text" class="form-control" name="country_id" value="{{$Register->country_id}}"id="country_id">
                                <sapn id="country" class="text-danger"></sapn>
                                
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput8">State</label>
                                <input type="text" class="form-control" name="state_id" value="{{$Register->state_id}}" id="state_id">
                                <sapn id="state" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput8">City</label>
                                <input type="text" class="form-control" name="city_id" value="{{$Register->city_id}}" id="city_id">
                                <sapn id="city" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="my_profile_setting_input form-group">
                                <label for="formGroupExampleInput11">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{$Register->facebook}}" id="formGroupExampleInput11">
                                <sapn id="fbook" class="text-danger"></sapn>
                            </div>
                        </div>
                      
                        <div class="col-xl-12">
                            <div class="my_profile_setting_textarea">
                                <label for="exampleFormControlTextarea1">About me</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="about" rows="3">{{$Register->about}}</textarea>
                                <sapn id="descript" class="text-danger"></sapn>
                            </div>
                        </div>
                        <div class="col-xl-12 text-right">
                            <div class="my_profile_setting_input">
                                <button class="btn btn1">View Public Profile</button>
                                <button class="btn btn2">Update Profile</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_js')
<script>
function nirav(){
   alert('jug');
}

function validate(){  
    
 var firstname=document.myform.firstname.value;
 var lastname=document.myform.lastname.value;
 var mobile=document.myform.mobile.value;
 var language=document.myform.language.value;
 var country_id=document.myform.country_id.value;
 var state_id=document.myform.state_id.value;
 var city_id=document.myform.city_id.value;
 var facebook=document.myform.facebook.value;
 var about=document.myform.about.value;
   
    if (firstname==null ||firstname ==""){  
    document.getElementById("fname").innerHTML="Please Enter firstname.";  
    return false; 
    }
    else{  
        document.getElementById("fname").innerHTML=""; 
  
    }   
    if (lastname==null ||lastname ==""){  
    document.getElementById("lname").innerHTML="Please Enter lastname.";  
    return false; 
    }
    else{  
    document.getElementById("lname").innerHTML="";
    }
    if (mobile==null || mobile==""){  
        document.getElementById("contact").innerHTML=" please Enter value.";  
        return false; 
    }else if (isNaN(mobile)){
    document.getElementById("contact").innerHTML="please enter only digite.";
    return false; 
    }else if (mobile.length != 10){
    document.getElementById("contact").innerHTML="please enter only  10 digite.";
    return false; 
    }
    else{  
        document.getElementById("contact").innerHTML="";
    }    
    if (language==null ||language ==""){  
    document.getElementById("langua").innerHTML="Please Enter language.";  
    return false; 
    }
    else{  
    document.getElementById("langua").innerHTML="";
    }   
    if (country_id==null ||country_id ==""){  
    document.getElementById("country").innerHTML="Please Enter country.";  
    return false; 
    }
    else{  
    document.getElementById("country").innerHTML="";
    } 
    if (state_id==null ||state_id ==""){  
    document.getElementById("state").innerHTML="Please Enter state.";  
    return false; 
    }
    else{  
    document.getElementById("state").innerHTML="";
    } 
    if (city_id==null ||city_id ==""){  
    document.getElementById("city").innerHTML="Please Enter city.";  
    return false; 
    }
    else{  
    document.getElementById("city").innerHTML="";
    } 
    if (facebook==null ||facebook ==""){  
    document.getElementById("fbook").innerHTML="Please Enter facebook Name.";  
    return false; 
    }
    else{  
    document.getElementById("fbook").innerHTML="";
    } 
    
    if (about==null ||about ==""){  
    document.getElementById("descript").innerHTML="Please Enter instagram Name.";  
    return false; 
    }
    else{  
    document.getElementById("descript").innerHTML="";
    } 

}  
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

@endsection