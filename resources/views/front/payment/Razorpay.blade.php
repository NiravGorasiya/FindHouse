<!DOCTYPE html>
<html>
<head>
    <title>Razorpay</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>    
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Error!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('error') !!}
            @if($message = Session::get('success'))
                <div class="alert alert-info alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <strong>Success!</strong> {{ $message }}
                </div>
            @endif
            {!! Session::forget('success') !!}
            <div class="panel panel-default" style="margin-top: 30px;">
                
                <div class="panel-heading">
                    <h2>Pay With Razorpay</h2>

                <!-- <div class="panel-body text-center"> -->
                    <form action="{!!route('payment')!!}" method="POST" >                        
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ env('RAZOR_KEY') }}"
                                data-amount="{{($result->total_field_name)}}"
                                data-buttontext="{{($result->total_field_name)}} pay"
                                data-name="Websolutionstuff"
                                data-description="Payment"
                                data-image="https://websolutionstuff.com/frontTheme/assets/images/logo.png"
                                data-prefill.name="name"
                                data-prefill.email="email"
                                data-theme.color="#3371FF">
                        </script>
                        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>