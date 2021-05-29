@extends('front.user.user_layout')
@section('container')
<div class="col-lg-4 col-xl-4 mb10">
    <div class="breadcrumb_content style2 mb30-991">
        <h2 class="breadcrumb_title">My Favorites</h2>
        <p>We are glad to see you again!</p>
    </div>
</div>
<div class="col-lg-8 col-xl-8">
    <div class="candidate_revew_select style2 text-right mb30-991">
        <ul class="mb0">
            <li class="list-inline-item">
                <div class="candidate_revew_search_box course fn-520">
                    <form class="form-inline my-2">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search Courses"
                            aria-label="Search">
                        <button class="btn my-2 my-sm-0" type="submit"><span
                                class="flaticon-magnifying-glass"></span></button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="col-lg-12">
    <div class="my_dashboard_review mb40">
        <div class="favorite_item_list">
            @foreach($wishlist as $data)
            @if ($data->image != "")
            <?PHP
                                   $img=explode(',', $data->image);
                                ?>
            <div class="feat_property list favorite_page style2">
                <div class="thumb">
                    <img class="img-whp" src="{{asset('images/product/'.$img[0])}}" alt="fp1.jpg">
                    <div class="thmb_cntnt">
                        <ul class="tag mb0">
                            <li class="list-inline-item dn"></li>
                            <li class="list-inline-item"><a href="{{url('property/details/'.$data->property_id)}}">sell</a></li>
                        </ul>
                    </div>
                </div>
            
                <div class="details">
                    <div class="tc_content">
                        <h4>Renovated Apartment</h4>
                        <p><span class="flaticon-placeholder"></span>{{$data->address}}</p>
                        <a class="fp_price text-thm" href="{{url('property/details/'.$data->property_id)}}">{{$data->price}}<small>/mo</small></a>
                    </div>
                </div>
                <ul class="view_edit_delete_list mb0 mt35">
                @csrf
                    <li class="list-inline-item" data-toggle="tooltip" data-placement="top" title="Delete"><a
                            href="javascript:void(0)" onclick="destroy({{$data->id}})"><span class="flaticon-garbage"></span></a></li>
                </ul>
            </div>
            @endif   
            @endforeach
            <div class="d-flex justify-content-center">
            {!! $wishlist->links() !!}
            </div>   
        </div>
    </div>
</div>
@endsection
@section('custom_js')
<script>
function destroy(id)
    {
           if(confirm("Do you really  want to delete this record?"))
           {
               $.ajax({
                   url:'/User/wishlist/Delete/'+id,
                   type:'DELETE',
                   data:{
                       _token:$("input[name=_token]").val()

                   },
                   success:function(response){
                      $('#id'+id).remove();
                  toastr.success("property Delete");

                   }
               })
           }
    }
</script> 
@endsection