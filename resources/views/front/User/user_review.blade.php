@extends('front.user.user_layout')
@section('container')
<div class="row">
    <div class="col-lg-12">
        <div id="client_myreview" class="my_dashboard_review mt30">
            <div class="review_content">
                <h4>Visitor Reviews</h4>
        @foreach($review as $data)
                <div class="media pb30 mt30 bb1">
                    <img class="mr-3" src="{{asset('profile/image/'.$data->profile)}}" width="100" height="120"  style="border-radius:50%;" alt="Review image">
                    <div class="media-body">
                        <h5 class="review_title mt-0">{{$data->username}} <span class="text-thm">{{$data->firstname}}</span>
                        </h5>
                        <a class="review_date" href="#">{{$data->added_on}}</a>
                        <p class="para">Beautiful home, very picturesque and close to everything in jtree! A little warm
                            for a hot weekend, but would love to come back during the cooler seasons! Lorem ipsum dolor
                            sit amet, consectetur adipisicing elit. Accusantium voluptates eum, velit recusandae,
                            ducimus earum aperiam commodi error officia optio aut et quae nam nostrum!</p>
                    </div>
                </div>
             @endforeach  
            </div>
        </div>
    </div>
</div>
@endsection