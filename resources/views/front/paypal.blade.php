
    <div class="container">
        <h3 class="text-center">YOUR ORDER HAS BEEN PLACED</h3>
        <p class="text-center">Your order number is <b></b> and total payment is <b>$ {{$result->total_field_name}}</b> </p>
        <p class="text-center">Please make payment by clicking on below Payment Button</p>

        <div class="text-center">
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="henglayshops@gmail.com">
            <input type="hidden" name="item_name" value="Buyer ({{$register->username}})">
            <input type="hidden" name="amount" value="{{$result->total_field_name}}">
            <input type="hidden" name="currency_code" value="INR">
            <input type="image" name="submit"
                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                   alt="PayPal - The safer, easier way to pay online">
        </form>
        </div>
    </div>
    <div style="margin-bottom: 20px;"></div>