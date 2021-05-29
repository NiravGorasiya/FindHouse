@extends('admin.layout')
@section('title')
City
@endsection
@section('container')
<div class="col-lg-12" >
    <div class="my_dashboard_review mb40">
    <div class="breadcrumb_content style2">
        <button type="submit" class="breadcrumb_title btn btn-secondary" style="float:right"  data-toggle="modal" data-target="#Citymodel">Add New City</button>
    </div>
    
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="users-table" class="table">
                    <thead class="thead-light">
                        <tr>
                            <th >Id</tH>
                            <th>State Name</th>
                            <th>City Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($city as $list)
                    <tbody>
                        <tr id="id{{$list->id}}">
                             <td>{{$list->id}}</td>
                             <td>{{$list->sname}}</td>
                             <td>{{$list->cname}}</td>
                             <td>
                             <label class="switch">
                              <input type="checkbox" id="user-{{$list->id}}" onclick="changeStatus(event.target, {{ $list->id }})" {{ $list->status ? 'checked' : '' }}>
                              <span class="slider round"></span>
                            </label>
                            </td>
                            <td>
                                  <ul class="view_edit_delete_list mb0">
				    	               <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="javascript:void(0)" onclick="edit({{$list->id}})"><span class="flaticon-edit"></span></a></li>
								        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a href="javascript:void(0)" onclick="destroy({{$list->id}})"><span class="flaticon-garbage"></span></a></li>
						    	</ul>         
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div class="mbp_pagination">
                <ul class="page_navigation">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span
                                class="flaticon-left-arrow"></span> Prev</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Citymodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Add New City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="cityform" method="post" name="myform" onsubmit="return validate()">
               @csrf
               <div class="from-group">
                    <label for="firtname">State Name</label>
                    <select id="state_id" class="form-control">
                    <option value="">Select Country Name</option>
                     @foreach($state as $list)
                       <option value="{{$list->id}}">{{$list->sname}}</option>
                     @endforeach  
                    </select>
               <sapn id="state" class="text-danger"></sapn><br>

               </div>
               <div class="from-group">
                    <label for="firtname">City Name</label>
                    <input type="text"  name="cname"  class="form-control">
               <sapn id="city" class="text-danger"></sapn><br>

               </div><br>
               <button type="submit" class="btn btn-success">Submit</button>
           </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="CityEditmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Add New City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="cityEditform" method="post">
               @csrf
               <input type="hidden" name="id" id="id"/>
               <div class="from-group">
                    <label for="firtname">State Name</label>
                    
                    <select id="state" name="state_id" class="form-control">
                    <option value="">Select State Name</option>
                     @foreach($state as $list)
                       <option value="{{$list->id}}">{{$list->sname}}</option>
                     @endforeach  
                    </select>
               </div>
               <div class="from-group">
                    <label for="firtname">City Name</label>
                    <input type="text"  name="cname"  id="cname" class="form-control">
               </div><br>
               <button type="submit" class="btn btn-success">Submit</button>
           </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom')
<script>
 $('#cityform').submit(function(e){
   e.preventDefault();
    var state_id=$("#state_id").val();
     var cname=$("input[name=cname]").val();     
     var _token=$("input[name=_token]").val();
     $.ajax({
         url:"{{route('add.city')}}",
         type:"POST",
         data:{
            state_id:state_id,
            cname:cname,
             _token:_token
         },
         success:function(response){
          $("#Citymodel").modal("toggle");
          $("#cityform")[0].reset();
            $("#users-table").load(location.href + " #users-table");          
         },       
         error: function(e){
            $("#error").text(e.responseText);
             console.log("THis is error",e);
         } 
     
     });
 });
 function destroy(id)
    {
           if(confirm("Do you really  want to delete this record?"))
           {
               $.ajax({
                   url:'/City/Delete/'+id,
                   type:'DELETE',
                   data:{
                       _token:$("input[name=_token]").val()

                   },
                   success:function(response){
                      $('#id'+id).remove();
                      toastr.success("city delete");
                   }
               })
           }
    }
    function changeStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/CityChangeStatus`,
        type: 'GET',
        data: {
            _token: _token,
            id: id,
            status: status 
        },
        success: function (data) {
          toastr.success("status update");
          console.log(data.success)
        }
    });
}
function edit(id)
 {
  
     $.get('/City/Edit/'+id,function(city){
       console.log(city);
         $("#id").val(city.id);
         $("#cname").val(city.cname);
         $("#state").val(city.state_id);
         $("#CityEditmodel").modal("toggle");
     });
 }     
 $('#cityEditform').submit(function(e){
   e.preventDefault();
   var id= $('#id').val();
   var state= $('#state').val();
   var cname= $('#cname').val();
   
   var _token =$("input[name=_token]").val();
   $.ajax({
        url:"{{route('city.update')}}",
        type:'PUT',
        data:{
          id:id,
          state_id:state,
          cname:cname,
          _token:_token
        },
        success:function(response){
          $('#id'+response.id + 'td:nth-child(1)').text(response.state_id);  
          $('#id'+response.id + 'td:nth-child(2)').text(response.cname);
          $("#CityEditmodel").modal("toggle");
          $("#cityEditform")[0].reset();
          $("#users-table").load(location.href + " #users-table");  
          toastr.success("city update");
        }
   });

 });  
 function validate(){  
    var state_id=document.myform.state_id.value;
    var cname=document.myform.cname.value;
         
if (state_id==null || state_id==""){  
        document.getElementById("state").innerHTML="Please select any";  
        return false; 
    }
    else{  
        document.getElementById("state").innerHTML="";
    }  
    if (cname==null || cname==""){  
        document.getElementById("city").innerHTML="Please Enter  city name";  
        return false; 
    }
    else{  
        document.getElementById("city").innerHTML="";
    }  
}
 
 </script>
 <script>
 @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
 </script>

 @endsection