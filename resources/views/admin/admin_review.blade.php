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
                            <th scope="col">Rating</th>
                            <th scope="col">Review</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                     @foreach($review as $data)
                       @csrf
                        <tr>
                            <td>{{$data->username}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->rating}}</td>
                            <td>{{$data->review}}</td>
                            <td>
                            <input data-id="{{$data->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $data->status ? 'checked' : '' }}>
                            </td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>

 $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
@endsection

