{% extends 'base.html' %}
{% load crispy_forms_tags %}
{% block content %}
    <div class="container-fluid p-5 shipping-container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <a href="{% url 'homepage' %}"><button class="btn btn-primary mb-5 text-capitalize"><-- continue shopping</button></a>
                </div>
            </div>
           <div class="row justify-content-center">
               <p class="text-capitalize main-title">checkout here</p>
           </div>
           {% for product in objects %}
           <div class="row  justify-content-center">
               <div class="col-8 p-3 checkoutitems">
                    <div class="jumbotron">
                        <div class="item-block mb-2 display-5">
                            <p class="mr-2">{{product.quantity}}</p>
                            <div class="mr-2"><span aria-hidden="true">&times;</span></div>
                            <p class="text-capitalize">{{product.product.name}}</p>
                        </div>
                        <hr>
                        <h6 class="per-item-price text-capitalize ">per item price  ₹{{product.product.price}}</h6>
                    </div>
                </div>
                <div class="col col-2 p-3">
                    <div class="jumbotron total-price-per-product">
                        <h6>₹{{product.get_per_product_total}}</h6>
                    </div>
                </div>
           </div>
           {% endfor %}
           <!-- total items -->
           <div class="row mt-2 justify-content-center">
               <div class="col-8 p-3">
                    <div class="jumbotron">
                        <h6 class="text-capitalize" style="color: red;">total is ---></h6>
                    </div>
               </div>
               <div class="col-2 p-3">
                    <div class="jumbotron total-price">
                        <h6 style="color: red;">₹{{order.get_total_order_price}}</h6>
                    </div>
               </div>
           </div>
           <hr style="background-color:white;" class="mb-5">
           <!-- about addresses  -->
           <div class="row justify-content-center mt-2 mb-2">
               <div class="col-10">
                   <h3 class="text-center">recent address</h3>
               </div>
           </div>
           <div class="row justify-content-center mb-4">
               {% for instance in forms %}
               <div class="col-5 p-3">
                    <div class="jumbotron">
                        <address class="lead">
                           
                        </address>
                        <a href="{% url 'update-shippingform' instance.id %}"><button class="btn btn-primary mb-3 mb-sm-0">Update</button></a>
                        <a href="{% url 'delete-shippingform' instance.id %}"><button class="btn btn-danger">Delete</button></a>
                    </div>
               </div>
               {% endfor %}
           </div>
           <!-- form-for-shipping-details -->
           <div class="row justify-content-center form-container">
                <div class="col-10 border p-3" style="border-radius: 20px;">
                    <form id="form">
                        {% csrf_token %}
                            <div class="myrow">
                            <div class="col-50">
                              <h3 class="text-center mb-2">Shipping Details</h3>
                              {{ form.fullname|as_crispy_field }}
                              {{ form.contactno|as_crispy_field }}
                              {{ form.email|as_crispy_field }}
                              {{ form.address|as_crispy_field }}
                              {{ form.city|as_crispy_field }}
                              <div class="myrow">
                                <div class="col-50">
                                    {{ form.state|as_crispy_field }}
                                </div>
                                <div class="col-50">
                                    {{ form.zipcode|as_crispy_field }}
                                </div>
                              </div>
                            </div>
                        </div>
                          <button type="submit" class="btn btn-primary text-capitalize" id="form-button" style="width: 100%;">submit</button>
                    </form>
                </div>
           </div>
            <div class="row justify-content-center mt-3 mb-5 d-none" id="payment-info">
                <div class="col-10 border p-3" style="border-radius: 20px;">
                    <div class="myrow">
                        <div class="col-50">
                            <h3 class="text-center mb-3 mt-2">Payment Options</h3>
                            <hr>
                        </div>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=ASpn5eelCrlLwyotejtkRGdZXmKQACdVKDR1l4OZ3KjljRiByuBNaFW5OlOx8cx06QIxsNdGsekw-mzJ&disable-funding=credit,card"></script>
    <script>
        var price = '';
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({
            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: price,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                   submitformdata();
                });
            }
        });  
            </script>