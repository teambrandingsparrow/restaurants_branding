
<?php
$current_page = 'Sale';
?>
@extends('layouts.app')
@section('css')

    <style>
        .dataTables_info,
        .dt-button,
        #datable_1_previous,
        #datable_1_next {
            color: black !important;
        }

        .dataTables_info {
            margin-top: 1.8% !important;
        }

        #datable_1_paginate>span>a {
            color: black !important;
            padding:7px 12px;
        }

        .dataTables_filter>label {
            color: black !important
        }
        th span{
            font-size: 12px;
            display: inline-block;
        }
        td p span{
            display: inline-block;
        }
        .pagination li a{
            color: black;
        }
        .pagination .page-item .page-link{
            color: black;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button{
            padding: 0;
        }
        li.paginate_button:hover{
            background: none;
            border: none;
        }
        .itemNames{
            min-width: 45%;
        }
        .itemPrices{
            min-width:10%;
            margin-right:30px;
        }
        .itemQuntites{
            min-width:10%;
            margin-right: 7%;
        }
       .netTotals{
        min-width:5%;
       }
       .taxTotals,
       .grossTotal{
        text-align: center;
       }
       .mainHead th{
        color: #3f51b5 !important;
    font-weight: 600 !important;
       }
       .nettolCalss{
        font-size: 20px;
        text-align: right;
        padding: 18px 33px;
        display: flex;
        justify-content: end;
        align-items: center;
        color: #3f51b5;
       }
       .nettolCalss span{
        font-size: 25px;
        padding-left: 10px;
        font-weight: 600;
        color: #383838;
       }
    </style>
@endsection
<?php
$title = 'Sale List |';
?>
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Item list</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <form method="get" class="form-horizontal">
                                    @csrf
                                   
                                    <div style="max-width: 40%;"><label>Date From</label>

                                        <div style="margin-left: 3px;"><input type="date" required  class="form-control datStart"
                                            name="fromDate" value=""
                                       onchange="">
                                   </div>
                                   
                                    </div><br>
                                    <div style="display: none;"><label >Date To</label>
                                        <div style="margin-left: 3px;" ><input type="date" required name="toDate" value="" class="form-control"
                                            onchange="" >
                                    </div>
                                    </div><br>
                                   
                                   
                                   
                                </form>
                                <table id="datable_1" class="table table-hover display  pb-30" >
                                    <thead>
                                        <tr class="mainHead">
                                            <th style="width: 20px;">SL No:</th>
                                           
                                            <th>Sale number</th>
                                            <th>Sale Date</th>
                                            <th style="text-align: center;min-width:360px">Product Details</th>
                                            <th>Tax Total</th>
                                            <th>Gross Total</th>
                                           
                                        </tr>
                                        <tr>
                                            <th> </th>
                                          
                                            <th></th>
                                            
                                            <th></th>
                                            <th style="color: #383838;
                                            font-weight: 400;"><span style="float: left;min-width: 45%;" >Product Name</span><span style="min-width: 10%;margin-right:30px;">Price</span><span style="min-width: 5%;">QTY</span><span style="min-width: 23%;text-align:right;">Net Total</span>  </th>
                                            <th></th>
                                            <th></th>
                                        </tr>
    
                                    </thead>
     
                                    <tbody class="dataTree">
                                    
                                        @php
                                            $cnt = 1;
                                        @endphp
                                        @if (count($data) > 0)
                                        @php
                                        $TotCONT = 1;
                                        @endphp
                                            @foreach ($data as $sales)
                                                <tr class="asingleSle">
                                                    <td style="width: 20px;">{{ $cnt++ }}</td>
                                                    <!-- @if (Auth::user()->usertype == 1)
                                                        <td>{{ $sales->name }}</td>
                                                    @endif -->
                                                    <td class="invNum">{{ $sales->invoice }}</td>
                                                    <td class="creatdAt">{{ $sales->created_at }}</td>
                             
                                                    <td>
                                                        @foreach ($sales->product as $item)
                                                            <p>
                                                                <span class="itemNames" >{{ $item->itemname }}</span>
                                                                <span class="itemPrices" >{{ $item->price }}</span>
                                                                <span class="itemQuntites" >{{ $item->qty }}</span>
                                                                <span class="netTotals" >{{ $item->nettotal }}</span><br>
                                                            </p>
                                                        @endforeach
                                                    </td>
                                                    <td class="taxTotals">{{ $sales->taxtotal }}</td>
                                                    <td class="grossTotal">{{ $sales->grosstotal }}
                                                    </td>

                                                </tr>
                                                @php
                                                $TotCONT += $sales->grosstotal
                                                @endphp
                                                @endforeach
                                                <input type="text" name="" value="{{$TotCONT}}" class="totalNetHidd" style="display:none !important">
                                           
                                        @else
                                            <tr>
                                                <td colspan="8">No Data</td>
                                            </tr>
                                        @endif
                                       
                                    </tbody>
                                
                                    
                                </table>
                          
                            <p class="nettolCalss"> Net Total:<span class="totalNetGross"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
    </div>
@endsection
@section('script')

    <script>
        function getNetCount(){
            var tcount = 0;
            $('.asingleSle').each(function(){
                tcount += parseFloat($('.grossTotal').html());
            })
            $('.totalNetGross').html(tcount);
            }

   $('.datStart').on('change', function(){
    var datatable = $('#datable_1').DataTable();
 
    var strDate = $(this).val();
            $.ajax({              
            url: 'getItemSelected/'+strDate,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                datatable.clear().draw();
                if(response){
                    console.log(response);
                    var cnt = 1;
                    $.each(response, function(index,value){
                        var dateChang =  moment(value.created_at).format('MMMM Do YYYY')

                        var records = '<tr class="asingleSle"><td>'+cnt+'</td><td>'+value.invoice+'</td><td class="createdDate">'+dateChang+'</td>';
                        records += '<td>';
                        $.each(value.product, function(index,value){
                            records += '<p><span class="itemNames">'+value.itemname+'</span><span class="itemPrices">'+value.price+'</span><span class="itemQuntites">'+value.qty+'</span><span class="netTotals">'+value.nettotal+'</span></p>';
                        });
                        records += '</td>';
                        records += '<td class="taxTotals">'+value.taxtotal+'</td><td class="grossTotal">'+value.grosstotal+'</td></tr>';
                        $('.dataTree').append(records);
                        cnt++;
                    });
                    getNetCount();
                    $('.odd').hide();
                }
            }
            });  
   });

   $(document).ready(function(){
            $('.totalNetGross').html($('.totalNetHidd').val())
        });
        // $(document).ready(function() {
          
        //     $('#datable_1').DataTable({
        //         dom: 'Bfrtip',
        //         buttons: [{
        //                 extend: 'excelHtml5',
        //                 text: '<i style="color:green" class="fa fa-file-excel-o"></i>',
        //                 titleAttr: 'Excel',
        //             },
        //             {
        //                 extend: 'pdfHtml5',
        //                 text: '<i style="color:red" class="fa fa-file-pdf-o"></i>',
        //                 titleAttr: 'PDF'
        //             }
        //         ]
        //     });
        // });
    </script>
@endsection
