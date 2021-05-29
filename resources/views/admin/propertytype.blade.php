@extends('admin.layout')
@section('title')
property type
@endsection
@section('container')
<div class="col-lg-12" >
    <div class="my_dashboard_review mb40">
        <div class="property_table">
            <div class="table-responsive mt0">
                <table id="users-table" class="table">
                    <thead class="thead-light">
                        <tr>
                            <th >Id</tH>
                            <th>City Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach($propertyType as $list)
                    <tbody>
                        <tr id="id{{$list->id}}">
                             <td>{{$list->id}}</td>
                             <td>{{$list->property_name}}</td>
                             <td>{{$list->description}}</td>
                            <td>
                                  <ul class="view_edit_delete_list mb0">
				    	               <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="javascript:void(0)" onclick="edit({{$list->id}})"><span class="flaticon-edit"></span></a></li>
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
<div class="modal fade" id="PropertyTypeEditmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="register">Add New City</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form id="PropertyTypeEditform" method="post">
               @csrf
               <input type="hidden" name="id" id="id"/>
               <div class="from-group">
                    <label for="firtname">Property Name</label>
                    <input type="text"  name="property_name"  id="property_name" class="form-control">
               </div>
               <div class="from-group">
                    <label for="firtname">City Name</label>
                    <input type="text"  name="description"  id="description" class="form-control">
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
function edit(id)
 {
  
     $.get('/Propertype/Edit/'+id,function($propertyType){
         $("#id").val($propertyType.id);
         $("#property_name").val($propertyType.property_name);
         $("#description").val($propertyType.description);
         $("#PropertyTypeEditmodel").modal("toggle");
         
     });
 }     
 
 $('#PropertyTypeEditform').submit(function(e){
   e.preventDefault();
   var id= $('#id').val();
   var property_name= $('#property_name').val();
   var description= $('#description').val();
   var _token =$("input[name=_token]").val();
   $.ajax({
        url:"{{route('propertytype.update')}}",
        type:'PUT',
        data:{
          id:id,
          property_name:property_name,
          description:description,
          _token:_token
        },
        success:function(response){
          $('#id'+response.id + 'td:nth-child(1)').text(response.property_name);  
          $('#id'+response.id + 'td:nth-child(2)').text(response.description);
          $("#PropertyTypeEditmodel").modal("toggle");
          $("#PropertyTypeEditform")[0].reset();
          $("#users-table").load(location.href + " #users-table");  
        }
   });

 });  
    </script>
 @endsection   