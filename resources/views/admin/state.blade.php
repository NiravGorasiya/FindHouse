@extends('admin.layout')
@section('title')
state
@endsection
@section('container')
<div class="col-lg-12" >
    <div class="my_dashboard_review mb40">
    <div class="breadcrumb_content style2">
        <button type="submit" class="breadcrumb_title btn btn-secondary" style="float:right"  data-toggle="modal" data-target="#StateModel">Add New State</button>
    </div>
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="users-table" class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</tH>
                            <th>country Name</th> 
                            <th>State Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($state as $list)
                    <tbody>
                        <tr id="id{{$list->id}}">
                             <td>{{$list->id}}</td>
                             <td>{{$list->country_name}}</td>
                             <td>{{$list->sname}}</td>
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
<div class="modal fade" id="StateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Add New State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="stateform" method="post" name="myform" onsubmit="return validate()">
               @csrf
               <div class="from-group">
                    <label for="firtname">Country Name</label>
                    <select id="country_id" name="country_id" class="form-control">
                    <option value="">Select Country Name</option>
                     @foreach($country as $list)
                       <option value="{{$list->id}}">{{$list->country_name}}</option>
                     @endforeach  
                    </select>
               <sapn id="country" class="text-danger"></sapn><br>
                    
               </div>
               <div class="from-group">
                    <label for="firtname">State Name</label>
                    <input type="text"  name="sname"  class="form-control">
               <sapn id="state" class="text-danger"></sapn><br>
               </div><br>

               <button type="submit" class="btn btn-success">Submit</button>
           </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="StateEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Add New State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="stateEditform">
               @csrf
               <input type="hidden" name="id" id="id"/>
               <div class="from-group">
                    <label for="firtname">Country Name</label>
                    <select id="country" name="country_id" class="form-control">
                    <option value="">Select Country Name</option>
                     @foreach($country as $list)
                       <option value="{{$list->id}}">{{$list->country_name}}</option>
                     @endforeach  
                    </select>
               </div>
               <div class="from-group">
                    <label for="firtname">State Name</label>
                    <input type="text"  name="sname" id="sname" class="form-control">
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
 $('#stateform').submit(function(e){
     e.preventDefault();
    var country_id=$("#country_id").val();
     var sname=$("input[name=sname]").val();     
     var _token=$("input[name=_token]").val();
     $.ajax({
         url:"{{route('add.state')}}",
         type:"POST",
         data:{
            country_id:country_id,
            sname:sname,
             _token:_token
         },
         success:function(response){
          $("#StateModel").modal("toggle");
          $("#stateform")[0].reset();
            $("#users-table").load(location.href + " #users-table");          
         },       
         error: function(e){
            $("#error").text(e.responseText);
             console.log("THis is error",e);
          toastr.success("state insert");

         } 
     
     });
 });
 function destroy(id)
    {
           if(confirm("Do you really  want to delete this record?"))
           {
               $.ajax({
                   url:'/State/Delete/'+id,
                   type:'DELETE',
                   data:{
                       _token:$("input[name=_token]").val()

                   },
                   success:function(response){
                      $('#id'+id).remove();
                  toastr.success("State Delete");

                   }
               })
           }
    }
    function changeStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/StateChangeStatus`,
        type: 'GET',
        data: {
            _token: _token,
            id: id,
            status: status 
        },
        success: function (data) {
          console.log(data.success)
          toastr.success("status update");

        }
    });
}
 
function edit(id)
 {
  
     $.get('/State/Edit/'+id,function(state){
       
        $("#id").val(state.id);
         $("#sname").val(state.sname);
         $("#country").val(state.country_id);
         $("#StateEditModel").modal("toggle");
     });
 }     
 $('#stateEditform').submit(function(e){
   e.preventDefault();
   var id= $('#id').val();
   var country= $('#country').val();
   var sname= $('#sname').val();
   var _token =$("input[name=_token]").val();
   $.ajax({
        url:"{{route('state.update')}}",
        type:'PUT',
        data:{
          id:id,
          country_id:country,
          sname:sname,
          _token:_token
        },
        success:function(response){
          $('#id'+response.id + 'td:nth-child(1)').text(response.country_id);  
          $('#id'+response.id + 'td:nth-child(2)').text(response.sname);
          $("#StateEditModel").modal("toggle");
          $("#stateEditform")[0].reset();
          $("#users-table").load(location.href + " #users-table"); 
          toastr.success("state update");

        }
   });

 }); 
 function validate(){  
    var country_id=document.myform.country_id.value;
    var sname=document.myform.sname.value;
         
if (country_id==null || country_id==""){  
        document.getElementById("country").innerHTML="Please select any";  
        return false; 
    }
    else{  
        document.getElementById("country").innerHTML="";
    }  
    if (sname==null || sname==""){  
        document.getElementById("state").innerHTML="Please Enter  state name";  
        return false; 
    }
    else{  
        document.getElementById("state").innerHTML="";
    }  
}
 
 </script>

 @endsection