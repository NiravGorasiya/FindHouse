@extends('admin.layout')
@section('title')
Property type
@endsection
@section('container')
<div class="col-lg-12" >
    <div class="my_dashboard_review mb40">
    <div class="breadcrumb_content style2">
        <button type="submit" class="breadcrumb_title btn btn-secondary" style="float:right"  data-toggle="modal" data-target="#PropertytypeModel">Add New Property</button>
    </div>
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="users-table" class="table">
                    <thead class="thead-light">
                        <tr>
                            <th >Id</tH>
                            <th>Property Name</th>
                            <th>Property type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($propertyCategory as $list)
                    <tbody>
                        <tr id="id{{$list->id}}">
                             <td>{{$list->id}}</td>
                             <td>{{$list->property_category}}</td>

                             <td>{{$list->property_name}}</td>
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
<div class="modal fade" id="PropertytypeModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Add New Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="form"name="myform" onsubmit="return validate()">
               @csrf
               <div class="from-group">
                    <label for="firtname">Property type</label>
                    <select  id="propertytype_id" name="pcategory" class="form-control">
                    <option value="">Select property Name</option>
                     @foreach($propertytype as $list)
                       <option value="{{$list->id}}">{{$list->property_name}}</option>
                     @endforeach  
                    </select>
               <sapn id="propertycate" class="text-danger"></sapn><br>

               </div>
               <div class="from-group">
                    <label for="firtname">Property Name</label>
                    <input type="text"  name="property_category" id="name" class="form-control">
               <sapn id="propertyname" class="text-danger"></sapn><br>

               </div>
              <br>
               <button type="submit" class="btn btn-success">Submit</button>
           </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="PropertytypeEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=""> update Property</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="propertytypeEditform"  method="post">
               @csrf
               <input type="hidden" name="id" id="id"/>
               <div class="from-group">
                    <label for="firtname">Property type</label>
                    <select  id="propertytype" class="form-control">
                    <option value="">Select Country Name</option>
                     @foreach($propertytype as $list)
                       <option value="{{$list->id}}">{{$list->property_name}}</option>
                     @endforeach  
                    </select>
               </div>
               <div class="from-group">
                    <label>Property Category</label>
                    <input type="text" name="property_category" id="property_category" class="form-control">
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
 $('#form').submit(function(e){
     e.preventDefault();
      var propertytype_id=$("#propertytype_id").val();
      var property_category=$("input[name=property_category]").val();
     var _token=$("input[name=_token]").val();
     $.ajax({
         url:"{{route('add.propertytype')}}",
         type:"POST",
         data:{
          propertytype_id:propertytype_id,
          property_category:property_category,
             _token:_token
         },
         success:function(response){
          $("#PropertytypeModel").modal("toggle");
          $("#form")[0].reset();
            $("#users-table").load(location.href + " #users-table"); 
            toastr.success("city Add");         
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
                   url:'/Propertytype/Delete/'+id,
                   type:'DELETE',
                   data:{
                       _token:$("input[name=_token]").val()

                   },
                   success:function(response){
                      $('#id'+id).remove();
                      toastr.success("Property category delete");
                   }
               })
           }
    }

function edit(id)
 {
  
     $.get('/Propertytype/Edit/'+id,function(propertytype){
         $("#id").val(propertytype.id);
         $("#property_category").val(propertytype.property_category);
         $("#PropertytypeEditModel").modal("toggle");
     });
 }     
 $('#propertytypeEditform').submit(function(e){
   e.preventDefault();
   var id= $('#id').val();
   var propertytype= $('#propertytype').val();
   var property_category= $('#property_category').val();
   var _token =$("input[name=_token]").val();
   $.ajax({
        url:"{{route('propertytypecategory.update')}}",
        type:'PUT',
        data:{
          id:id,
          propertytype_id:propertytype,
          property_category:property_category,
          _token:_token
        },
        success:function(response){
          $('#id'+response.id + 'td:nth-child(1)').text(response.propertytype_id);  
          $('#id'+response.id + 'td:nth-child(2)').text(response.property_category);
          $("#PropertytypeEditModel").modal("toggle");
          $("#propertytypeEditform")[0].reset();
          $("#users-table").load(location.href + " #users-table"); 
          toastr.success("Property category update"); 
        }
   });

 });  
  function changeStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/userChangeStatus`,
        type: 'GET',
        data: {
            _token: _token,
            id: id,
            status: status 
        },
        success: function (data) {
          console.log(data.success);
          toastr.success("status update");
        }
    });
}
</script>
<script>
function validate(){  
    var pcategory=document.myform.pcategory.value;
    var name=document.myform.name.value;
         
if (pcategory==null || pcategory==""){  
        document.getElementById("propertycate").innerHTML="Please select any";  
        return false; 
    }
    else{  
        document.getElementById("propertycate").innerHTML="";
    }  
    if (name==null || name==""){  
        document.getElementById("propertyname").innerHTML="Please Enter propertyname";  
        return false; 
    }
    else{  
        document.getElementById("propertyname").innerHTML="";
    }  
}
</script>
@endsection


