@extends('layouts.admin')

@section('title','Transaction admin ')

@section('content')

    <aside class="right-side">

        <ol class="breadcrumb">

            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>

            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Transaction</li>

        </ol>

        <section class="content">

            <div class="row">

                <div class="col-lg-12 top-right-content">

                    <div class="res-subshare subshare-table-area">

                        <div class="subshare-stats-area">

                            <div class="row tab-heading-table">

                                <div class="inner-table-trans-heading">

                                    <div class="col-md-9">

                                        <h3>Transactions</h3>

                                    </div>

                                    <div class="col-md-3">

                                        <ul class="nav nav-tabs">

                                            <li class="active"><a data-toggle="tab" href="#all">All</a></li>

                                            <li><a data-toggle="tab" href="#pending">Pending</a></li>
                                            
                                            <li><a data-toggle="tab" href="#invoices">Invoices</a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                          <div class="tab-content">

                                <div id="all" class="tab-pane fade in active">

                                    <div class="panel panel-primary ">

                                        <div class="panel-body table-responsive">

                                            <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                                <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">

                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 116px;">DATE</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 558px;">INVOICE</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 99px;">PDF</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 176px;">CURRENCY</th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 146px;">AMOUNT</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach($AllTransactions as $transaction)

                                                                <tr role="row" class="even">

                                                                    <td class="sorting_1">

                                                                        <p>{{  $transaction->created_at->format('d.m.Y') }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <p class="color-trans-div">{{  $transaction->title }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <a target="_blank" href="{{url('admin/downloadPDF')}}/{{$transaction->id}}"><img src="{{url('assets/img/pdf.png')}}"></a>

                                                                    </td>

                                                                    <td>

                                                                        <p>{{  $transaction->currency }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <p class="color-trans-div">{{  $transaction->amount }}</p>

                                                                    </td>

                                                                </tr>

                                                        @endforeach

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div id="pending" class="tab-pane fade">

                                    <div class="panel panel-primary ">

                                        <div class="panel-body table-responsive">

                                            <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                                <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">

                                                    <thead>

                                                    <tr role="row">

                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 116px;">DATE</th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 558px;">INVOICE</th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 99px;">PDF</th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 176px;">CURRENCY</th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 146px;">AMOUNT</th>

                                                    </tr>

                                                    </thead>



                                                    <tbody>

                                                        @foreach($PendingTransactions as $pendingTransaction)

                                                                <tr role="row" class="even">

                                                                    <td class="sorting_1">

                                                                        <p>{{  $pendingTransaction->created_at->format('d.m.Y') }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <p class="color-trans-div">{{  $pendingTransaction->title }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <a target="_blank" href="{{url('admin/downloadPDF')}}/{{$pendingTransaction->id}}"><img src="{{url('assets/img/pdf.png')}}"></a>

                                                                    </td>

                                                                    <td>

                                                                        <p>{{  $pendingTransaction->currency }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <p class="color-trans-div">{{  $pendingTransaction->amount }}</p>

                                                                    </td>

                                                                </tr>

                                                        @endforeach

                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                </div>



<!-- invoices tab content -->
                                
                                
                                
                                  <div id="invoices" class="tab-pane fade">

                                    <div class="panel panel-primary ">

                                        <div class="panel-body table-responsive">

                                            <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">


@if( count($invoices) > 0 )
                                                <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">

                                                    <thead>

                                                    <tr role="row">

                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 116px;">DATE <i class="fa fa-angle-down" aria-hidden="true"></i></th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 558px;">INVOICE <i class="fa fa-angle-down" aria-hidden="true"></i></th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 99px;">PDF <i class="fa fa-angle-down" aria-hidden="true"></i></th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 176px;">CURRENCY <i class="fa fa-angle-down" aria-hidden="true"></i></th>

                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 146px;">AMOUNT <i class="fa fa-angle-down" aria-hidden="true"></i></th>

                                                    </tr>

                                                    </thead>



                                                    <tbody>
                            
                                                        @foreach($invoices as $invoice)

                                                                <tr role="row" class="even">

                                                                    <td class="sorting_1">

                                                                        <p>{{  $invoice->created_at->format('d.m.Y') }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <p class="color-trans-div">{{  $invoice->title }}</p>

                                                                    </td>

                                                                    <td>

                                                                       <a target="_blank" href="{{url('/downloadPDF')}}/{{$invoice->id}}"><img src="{{ url('assets/img/pdf.png') }}"></a>

                                                                    </td>

                                                                    <td>

                                                                        <p>{{ $invoice->currency }}</p>

                                                                    </td>

                                                                    <td>

                                                                        <p class="color-trans-div">{{  $invoice->amount }}</p>

                                                                    </td>

                                                                </tr>

                                                        @endforeach
                                                       
                                                       
                                                     



                                                    </tbody>

                                                </table>


                                @else
                                                            
                                                                        <p>No Invoice generated.</p>

                                                        
                                                        
                                                       @endif



                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>

                    </div>

                   {{ $AllTransactions->links() }}



                </div>

            </div>

        </section>

    </aside>

@endsection


@section('script')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

@endsection