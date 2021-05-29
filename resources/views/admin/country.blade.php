@extends('admin.layout')
@section('title')
Country
@endsection
@section('container')
<div class="col-lg-12">
    <div class="my_dashboard_review mb40">
        <div class="breadcrumb_content style2">
            <button type="submit" class="breadcrumb_title btn btn-secondary" style="float:right" data-toggle="modal"
                data-target="#CountryModel">Add New Country</button>
        </div>
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="users-table" class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</tH>
                            <th>Country Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($country as $list)
                    <tbody>
                        <tr id="id{{$list->id}}">
                            <td>{{$list->id}}</td>
                            <td>{{$list->country_name}}</td>
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
<div class="modal fade" id="CountryModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Add New Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="Countryform" name="myform" onsubmit="return validate()" method="post">
               @csrf
               <input type="hidden" name="id" id="id"/>
               <div class="from-group">
                    <label for="firtname">Country Name</label>
                    <input type="text"  name="country_name"  class="form-control">
               <sapn id="country" class="text-danger"></sapn><br>

               </div><br>
               <button type="submit" class="btn btn-success">Submit</button>
           </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="CountryEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Update Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="CountryEditform"  method="post">
               @csrf
               <div class="from-group">
                    <label for="firtname">Country Name</label>
                    <input type="text"  name="country_name"  id="country_name" class="form-control">
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
 $('#Countryform').submit(function(e){
     e.preventDefault();
     
     var country_name=$("input[name=country_name]").val();
     var _token=$("input[name=_token]").val();
     $.ajax({
         url:"{{route('add.country')}}",
         type:"POST",
         data:{
          country_name:country_name,
             _token:_token
         },
         success:function(response){
          $("#CountryModel").modal("toggle");
          $("#Countryform")[0].reset();
          toastr.success("country insert");
            $("#users-table").load(location.href + " #users-table");     
            toastr.success("country insert");
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
                   url:'/Country/Delete/'+id,
                   type:'DELETE',
                   data:{
                       _token:$("input[name=_token]").val()

                   },
                   success:function(response){
                      $('#id'+id).remove();
                      toastr.success("country delete");
                   }
               })
           }
    }

    function changeStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/CountryChangeStatus`,
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
  
     $.get('/Country/Edit/'+id,function(country){
         $("#id").val(country.id);
         $("#country_name").val(country.country_name);
         $("#CountryEditModel").modal("toggle");
     });
 }
 $('#CountryEditform').submit(function(e){
   e.preventDefault();
   var id= $('#id').val();
   var country_name= $('#country_name').val();
   var _token =$("input[name=_token]").val();
   $.ajax({
        url:"{{route('country.update')}}",
        type:'PUT',
        data:{
          id:id,
          country_name:country_name	,
          _token:_token
        },
        success:function(response){
          $('#id'+response.id + 'td:nth-child(1)').text(response.country_name);
          $("#CountryEditModel").modal("toggle");
          $("#CountryEditform")[0].reset();
          toastr.success("country update");
          $("#users-table").load(location.href + " #users-table");  
          
        }
   });
 });       
 </script>
 <script>
function validate(){  
    var country_name=document.myform.country_name.value;
   
         
if (country_name==null || country_name==""){  
        document.getElementById("country").innerHTML="Please Enter country";  
        return false; 
    }
    else{  
        document.getElementById("country").innerHTML="";
    }  
   
}
</script>

@endsection 
