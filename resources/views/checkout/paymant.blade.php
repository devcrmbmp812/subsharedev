@extends('layouts.guest')

@section('title', 'Pricing')







@section('content')

    <div id="loadd">

        <div id="loader"></div>

    </div>

    <style>

        /* Center the loader */

        #loadd{

            position: fixed;

            top: 0;

            bottom: 0;

            content: "";

            background: rgb(239, 243, 246);

            height: 120%;

            width: 100%;

            z-index: 5;

            right: 0;

            left: 0;

            opacity: 0.8;

            display:none;

        }

        #loader {

            position: fixed;

            left: 50%;

            top: 60%;

            z-index: 1;

            width: 150px;

            height: 150px;

            margin: -75px 0 0 -75px;

            border: 20px solid #fff;

            border-radius: 50%;

            border-top: 20px solid #2ae281;

            width: 120px;

            height: 120px;

            -webkit-animation: spin 2s linear infinite;

            animation: spin 2s linear infinite;

            background-color: #333;

        }



        @-webkit-keyframes spin {

            0% { -webkit-transform: rotate(0deg); }

            100% { -webkit-transform: rotate(360deg); }

        }



        @keyframes spin {

            0% { transform: rotate(0deg); }

            100% { transform: rotate(360deg); }

        }



        /* Add animation to "page content" */

        .animate-bottom {

            position: relative;

            -webkit-animation-name: animatebottom;

            -webkit-animation-duration: 1s;

            animation-name: animatebottom;

            animation-duration: 1s

        }



        @-webkit-keyframes animatebottom {

            from { bottom:-100px; opacity:0 }

            to { bottom:0px; opacity:1 }

        }



        @keyframes animatebottom {

            from{ bottom:-100px; opacity:0 }

            to{ bottom:0; opacity:1 }

        }



        #myDiv {

            display: none;

            text-align: center;

        }

    </style>

    <div class="black-banner-div">

        <div class="container">

            <div class="banner-heading">

                <h1>Checkout</h1>

            </div>

        </div>

        <!--inner-banner Ends -->

    </div>

    <!--container Ends -->

    <!--banner Ends -->

    <section class="checkout-content-area">

        <div class="container">

<style>

    .stripe-button-el{

        background: #2fdf86; border-radius: 45px !important; padding: 10px;

    }

    .stripe-button-el span{

        background: transparent; border: 0px; display: block; min-height: 30px; border-radius: 45px !important;

    }

</style>









            <div class="crediet-content">

                <div id="success_tag">



                </div>

                <div class="crediet-div">

                    <div class="checkout-top-area" style="padding: 10px; display: inline-flex;">

                        <button type="button" class="card-div">Credit card</button>

                        <h2> <div id="paypal-button-container"></div></h2>

                    </div>

                    <form method="POST" id="input_forms_data" action="javascript:;">



                        {{csrf_field()}}

                    <div class="crediet-area">

                        <div class="crediet-box-one">

                            <div class="row">

                                <div class="col-md-8"></div>

                                <div class="col-md-4">

                                    <div class="cvv-div">

                                        <button type="button">cvv</button>

                                        <p>Сode on the back of your credit card</p>

                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="crediet-box-two" name="ccform">

                            <form>

                                <div class="row">

                                    <div class="col-md-9">

                              <!-- <input type="text" name="card_no" class="form-control" placeholder="Card Number" pattern="\d*" maxlength="16" required> -->
                              <input type="text" name="card_no" class="form-control" placeholder="Card Number" maxlength="16" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>

                                        <div class="dob">

                                            <input type="text" name="month" class="form-control" placeholder="Month" required maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>

                                            <input type="text" name="year" class="form-control" placeholder="Year" required maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>

                                        </div>

                                    </div>

                                    <div class="col-md-3">

                                        <div class="master-div">

                                            <img src="assets/img/master-card.png">

                                            <img src="assets/img/visa.png">

                                        </div>

                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-12">

                                        <input type="text" class="form-control" name="cvv_no" placeholder="CVV" maxlength="3" onkeypress="return event.charCode >= 48 && event.charCode <= 57" required>

                                        <input type="hidden" class="form-control" name="amount" value="{{$amount}}">

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </form>

                    <button type="button" id="btn_stripe" class="buy-btn" onclick="return validate_creditcardnumber();">Buy Now</button>

                    {{--<form action="{{url('/savestripe')}}" method="POST" style="margin-top: 20px;">--}}

                        {{--<script--}}

                                {{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}

                                {{--data-key="pk_test_ZXtjDC1HyjEnkaMWP4y9UkRt"--}}

                                {{--data-amount="{{$amount}}"--}}

                                {{--data-name="Subshare"--}}

                                {{--data-description="Pay through Stripe"--}}

                                {{--data-image="https://cdn.shopify.com/s/files/1/2442/4503/files/about-stripe.png"--}}

                                {{--data-locale="auto">--}}

                        {{--</script>--}}

                        {{--{{csrf_field()}}--}}

                    {{--</form>--}}

                    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

                    <style>

                        .paypal-button-text{

                            display:none !important;

                        }

                    </style>

                </div>

            </div>

        </div>

        <script>

            $(document).ready(function () {

                   paypal.Button.render({

                       // Set your environment
                       env: 'sandbox', // sandbox | production
                       // Specify the style of the button

                       style: {

                           label: 'buynow',

                           fundingicons: false, // optional

                           branding: true, // optional

                           size: 'small', // small | medium | large | responsive

                           shape: 'pill', // pill | rect

                           color: 'silver'   // gold | blue | silve | black

                       },

                       // PayPal Client IDs - replace with your own

                       // Create a PayPal app: https://developer.paypal.com/developer/applications/create



                       client: {

                           sandbox: 'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',

                           production: 'Aegj0n9uWlpgyE9AodQpCivJsYK0DOpLKJfB5H_4RdTYnnueqh2ZszaM6ZosUy5BocngUlgy8DdBCjKV'

                       },

                       // Wait for the PayPal button to be clicked



                       payment: function (data, actions) {

                           return actions.payment.create({

                               transactions: [

                                   {

                                       amount: {total: '{{$amount}}', currency: 'USD'}

                                   }

                               ]

                           });

                       },

                       // Wait for the payment to be authorized by the customer



                       onAuthorize: function (data, actions) {

                           return actions.payment.execute().then(function () {

                               $("#loadd").show();

                               $.ajaxSetup({

                                   headers: {

                                       'X-CSRF-TOKEN': '{{csrf_token()}}'

                                   }

                               });

                               $.ajax({

                                   type: 'post',

                                   url: '{{url("\paypalpay")}}',

                                   data: {'amount':'{{$amount}}'},

                                   success: function (data) {

                                       $("#loadd").hide();

                                       $("#success_tag").html(data);

                                   }

                               });

                           });

                       }



                   }, '#paypal-button-container');



                   $("#btn_stripe").click(function () {

                       $("#loadd").show();

                       $.ajaxSetup({

                           headers: {

                               'X-CSRF-TOKEN': '{{csrf_token()}}'

                           }

                       });

                       $.ajax({

                           type: 'post',

                           url: '{{url("\stripepay")}}',

                           data: $("#input_forms_data").serialize(),

                           success: function (data) {

                               $("#loadd").hide();

                               $("#success_tag").html(data);

                           }

                       });

                   });



            });

        </script>

    </section>

    <!--Content Ends -->

@endsection