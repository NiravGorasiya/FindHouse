@extends('front.agent.Agent_layout')
@section('container')
<div class="col-lg-12">
    <div class="my_dashboard_review mb40">
        <div class="property_table">
            <div class="table-responsive mt0">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach($property as $pname)
                       @csrf
                        <tr id="id{{$pname->id}}">
                            <th scope="row">
                            @if ($pname->image != "")
                                 <?PHP
                                   $img=explode(',', $pname->image);
                                ?>
                                <div class="feat_property list favorite_page style2">
                                    <div class="thumb">
                                        <img class="img-whp" src="{{asset('images/product/'.$img[0])}}" alt="fp1.jpg">
                                        <div class="thmb_cntnt">
                                            <ul class="tag mb0">
                                                <li class="list-inline-item dn"></li>
                                                <li class="list-inline-item"><a href="#">{{$pname->property_name}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <div class="tc_content">
                                            <h4>{{$pname->property_category}}</h4>
                                            <p><span class="flaticon-placeholder"></span>{{$pname->address}}</p>
                                            <a class="fp_price text-thm" href="#">${{$pname->price}}<small>/mo</small></a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </th>
                            <td>{{$pname->property_category}}</td>
                            <td>
                            
                                <ul class="view_edit_delete_list mb0">
                                <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="view">
                                        <a href="{{url('admin/listview/property/'.$pname->id)}}" ><span class="flaticon-view"></span></a></li>
                                   
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Edit"><a href="{{url('agent/property/update/'.$pname->id)}}"><span class="flaticon-edit"></span></a></li>
                                        <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <a href="javascript:void(0)" onclick="destroy({{$pname->id}})"><span class="flaticon-garbage"></span></a></li>
                                </ul>
                            
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item"><a class="page-link" href="#">29</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><span class="flaticon-right-arrow"></span></a>
                    </li>
                </ul>
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
    </script>
@endsection

