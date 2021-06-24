@extends('admin.layout')
@section('container')
<div class="col-lg-12">
    <div class="my_dashboard_review mb40">
        <div class="property_table">
            <div class="table-responsive mt0">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Amout</th>
                            <th scope="col">Payment Method</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach($order as $data)
                       @csrf
                        <tr>
                            <td>{{$data->username}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->mobile}}</td>
                            <td>{{$data->amount}}</td>
                            <td>{{$data->payment_method}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            
        </div>
    </div>
</div>
@endsection
@section('custom')
<script>
function destroy(id)
    {
           if(confirm("Do you really  want to delete this record?"))
           {
               $.ajax({
                   url:'/Property/Delete/'+id,
                   type:'DELETE',
                   data:{
                       _token:$("input[name=_token]").val()

                   },
                   success:function(response){
                      $('#id'+id).remove();
                   }
               })
           }
    }
    function changeStatus(_this, id) {
    var status = $(_this).prop('checked') == true ? 1 : 0;
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: `/propertyChangeStatus`,
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
    </script>
@endsection

