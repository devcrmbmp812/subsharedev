@extends('layouts.guest')
@section('title', 'Pricing')



@section('content')


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
        <div class="inner-blog-content">
            <div class="panel-body table-responsive">
                <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                    <table class="table dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 363px;">plan</th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 167px;">price</th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 235px;">quantity</th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 108px;">total</th>
                        </tr>
                        </thead>

                        <tbody>
                        <form method="POST" id="form_checkout" action="{{url('/checkout')}}">
                          {{csrf_field()}}

                        <tr role="row" class="odd">
                            <td class="sorting_1"><h2>{{$check->title}}</h2></td>
                            <td>
                                <p >{{$check->amount}}</p>
                            </td>
                            <td>
                                <div class="input-group">
                                      <span class="input-group-btn">
                                          <button type="button" id="minus_quantity" class="btn btn-default btn-number"  data-type="minus" data-field="quant[1]">
                                              <span class="glyphicon glyphicon-minus"></span>
                                          </button>
                                      </span>
                                    <input type="text" name="quantity" id="quantity" class="form-control input-number" value="1" min="1" max="10">
                                    <span class="input-group-btn">
                                          <button type="button" id="plus_quantity" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                              <span class="glyphicon glyphicon-plus"></span>
                                          </button>
                                      </span>
                                </div>
                            </td>
                            <td>
                                <span style="display: inline-flex;">$<p style="margin-top: -4px;margin-left: 5px;" id="amount">{{$check->amount}}</p></span>
                            </td>
                            <input type="hidden" id="oamount" name="oamount" value="{{$check->amount}}">
                            <input type="hidden" id="package_id" name="package_id" value="{{$pid}}">
                        </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="button" id="proceed_btn" class="proceed-btn">Proceed</button>
        </div>
    </div>
    <script>
        $(document).ready(function () {
           $("#plus_quantity").click(function () {
               var amount = $("#oamount").val();
               var quantity = $("#quantity").val();
               quantity = parseInt(quantity) + 1;
               if(quantity < 11) {
                   $('#amount').html(quantity * parseFloat(amount));
                   $('#quantity').val(quantity);
               }
           });
            $("#minus_quantity").click(function () {
                var amount = $("#oamount").val();
                var quantity = $("#quantity").val();
                quantity = parseInt(quantity) - 1;
                if(quantity > 0 ) {
                    $('#amount').html(quantity * parseFloat(amount));
                    $('#quantity').val(quantity);
                }
            });
            $("#proceed_btn").click(function () {
               $("#form_checkout").submit();
            });

        });
    </script>
</section>
<!--Content Ends -->
@endsection