<?php
$current_page = 'Sale';
?>
<?php
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;

?>
@extends('layouts.app')
@section('css')
<style>
    .overflDiv{
    background-color: white!important;
    width: 100%;
}
.reload svg{
    width: 30px;
}
.reload{
    cursor: pointer;
    text-align: right;
    stroke: #2196f3;
    transform: scale(.85);
    margin: auto 0 0 auto;
    height: 43px;
}
.price{
    color: #3f51b5;
}
.cusCard{
    min-height: 185px;
}
.cusCard p.title{
    margin: 0px auto 0 auto;
    line-height: 17px;
}
.cusCard span.price{
    justify-content: center;
    font-weight: 600;
}
.cusCard p.title{
    border-top: 0;
}
.page-wrapper{
    padding-right: 0;
    padding-left: 0;
}
</style>

@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
          
            <div class="row mt-5">
                <div class="col-lg-6">
                    <form class="addsaleForm" action="{{url('addsaleStore')}}"method="post">
                        @csrf
                      <div class="demo">
                        <label><strong>Invoice Number:</strong></label>
                        <input type="text" value="{{$number}}" name="invoice">
                   
                        <label class="todatecls"><strong>Date:</strong><p></p></label>
                        <label class="toTimecls"><strong>Time:</strong><p></p></label>
                  
                      </div>
                    <div class="card tableWidth">
                       
                        <img class="cliLogo" src="{{ asset('image/citySpice-LOGO.jpeg') }}" alt="">
                        <div class="card-body printTable p-0">
                            <table class="table-bordered table">
                                <thead>

                                    <tr>
                                        <th style="width: 10px" class="hideDiv">Sl</th>
                                        {{-- <th class="hideDiv">Date</th> --}}
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th >Price</th>
                                        <th >Net Total</th>
                                        <th class="hideDiv" style="width: 90px;text-align:center;">Tax</th>
                                        <th class="hideDiv">Action</th>
                                        
                                        {{-- <th >demo</th> --}}
                                    </tr>
                                </thead>
                                @php
                                    $cnt = 1;
                                @endphp
                                <tbody id="tbody">
                                    

                                </tbody>
                            </table>
                        </div>
                        <div style="margin: 20px 10px 10px 10px" class="totalDetails">
                            {{-- <div class="reload">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"/></svg>
                            </div> --}}
                            <div class="d-flex mb-2" style="align-items: center;justify-content:end;">
                                
                                <div class="ms-2">
                                    <div class="form-group">
                                        <label class="bolder" for="">Tax Total:</label>
                                        <input type="text" class="form-control" name="taxtotal" id="grosstotalTax" readonly value="0">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="d-flex mb-3" style="align-items: center;justify-content:end;">
                                <label for="" class="bolder">Gross Total:</label>
                                <div class="ms-2">

                                    <input type="text" class="form-control" name="grosstotal" id="grosstotal" readonly value="0">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#" ><button type="reset" style="border:none;padding:5px;"class="btn btn-sm cusButt btn-danger clearAlll">Cancel</button></a>
                                <a href="#" ><button type="button" style="border:none;padding:5px;"class="btn cusButt btn-sm btn-success mainSubmit">Submit</button></a>
                                <a href="#" class="btn btn-sm cusButt btn-info kotSub" style="border:none;padding:5px;">Kot
                                    submit</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-lg-6 cardsHide">

                    <div class="row overflDiv">
                        
                        @foreach ($items as $item)
                            <div data-itemname-id="{{$item->id}}" data-itemname="{{ $item->itemname }}" data-price="{{ $item->price }}"
                                data-tax="{{ $item->taxrate }}" class="col-lg-4 col-xl-3 col-sm-6 storeitem">
                                <div class="card cusCard">
                                    <div class="card-body b-0 m-0 p-0">
                                        <img class="itemImag" src="{{ $item->file_path }}" alt="" class="img">
                                    </div>
                                    <p class="title">
                                        {{ $item->itemname }}
                                    </p>
                                    <span class="price"><b>₹{{ $item->price }}</b></span>
                                </div>
                            </div>
                        @endforeach
                 
                    </div>
                </div>
            </div>
           
        </div>
        </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
           

            $("#btn").click(function() {
                $(".prds option").each(function(i) {
                    if ($(this).is(':selected') && $(this).val() != '') {
                        $("#prds option[value='" + $(this).val() + "']").attr('disabled', true);
                    }
                });
                var row = $("#rr").clone().insertAfter("#tb");
                row.removeAttr('hidden');
                row.find('select').attr('required', true);
                row.find('input').attr('required', true);
            });
            $('.remove').click(function() {
                console.log($(this))
                $(this).parent().remove();
            })
        });

        function getStock(e) {
            $.ajax({
                url: "stock_count/" + $(e).val(),
                success: function(result) {
                    $(e).parent().parent().find(".qty").attr({
                        "max": result,
                        "min": 0
                    });
                }
            });
            $.ajax({
                url: "getItem/" + $(e).val(),
                success: function(result) {
                    var data = JSON.parse(result);
                    $(e).parent().parent().find('.prds').val(data.item);
                    $(e).parent().parent().find('.cst').val(data.salesPrice);
                    $(e).parent().parent().find('.tax').val(data.taxs);
                    $(e).parent().parent().find('.img').attr("src", data.img);
                }
            });
        }

        function getproduct(e) {
            $.ajax({
                url: "getProduct/" + $(e).val(),
                success: function(result) {
                    var data = JSON.parse(result);
                    $('#InvoiceNumber').val(data.number)
                    $('.prds').empty();
                    $('.prds').append(data.product)
                }
            });
        }

        function remove(e) {
            $(e).parent().parent().remove();
            console.log(e);
        }
    </script>
    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();
            var maxDate = year + '-' + month + '-' + day;
            $('#datepicker').attr('max', maxDate);
        });
    </script>


    {{-- <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script> --}}
    <script>
        $('#price, #qty').keyup(function() {
            var price = parseFloat($('#price').val());
            var qty = parseFloat($('#qty').val());

            $('#total').val(price * qty);

        });
        $(document).ready(function() {

        // getcount
        function getCount(){
            var cnt = 1;
           $('.trClasses').each(function(){
            $(this).find('.slnotd').html(cnt);
            cnt++;
           });
        }
           
            // relaod
  
            // $('.reload').on('click', function(){
              
            // })
            var count = 0;
            $('.storeitem').on('click', function() {
                count++;
                var item = $(this).attr('data-itemname');
                var itemId = $(this).attr('data-itemname-id');
                var price = $(this).attr('data-price');
                var tax = $(this).attr('data-tax');
                $('#tbody').append('<tr class="trClasses"><td class="hideDiv slnotd">' + count + '</td>'+
                    '<td class="todayDate"hidden></td><td>' + item +'<input type="text" name="item[]" hidden value="'+itemId+'"></td>'+
                    '<td><input  type="number" name="qty[]" value="1" min="1" class="qntyitem" data-count="' + count +
                    '" /></td><td class="priceitem' + count + '">' + price +
                    '<input type="text" name="price[]" hidden value="'+price+'"></td><td class="netItem nettotalitem' + count + '">' + price +
                    '<input type="text" hidden name="nettotalitem[]" value="'+ price +'"></td><td class="netTaxx taxRate' + count + ' hideDiv"></td><td class="hideDiv"><svg data-taxcount="' + count + '" class="deletClass' +
                    count +
                    '" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg></td></tr>'
                    );

                    // date
                    $('.todayDate').html(moment().format("DD/MM/YYYY"));


                // calculate tax
                var Tprice = parseFloat($('.nettotalitem' + count + '').html());
                // alert(Tprice)
                var perc = '';
                perc = ((Tprice * tax) / 100);
                $('.taxRate' + count + '').html(perc);

                // Gross total
                var netT = parseFloat($('.nettotalitem' + count + '').html());
                var gTot = parseFloat($('#grosstotal').val());
                var totGross = netT + gTot;
                $('#grosstotal').val(totGross);

                // Gross tax
                var singleTax = parseFloat($('.taxRate' + count + '').html());
                var gtaxTot = parseFloat($('#grosstotalTax').val());
                var totGrossTax = singleTax + gtaxTot;
                $('#grosstotalTax').val(totGrossTax);
                getCount();

                // delete icon
                $('.deletClass' + count + '').on('click', function(e) {
                    var Acount = $(this).attr('data-taxcount');

                    var curTax = $('.taxRate' + Acount + '').html();
                    curTax = parseInt(curTax);

                    var curTotal = $('.nettotalitem' + Acount + '').find('input').val();
                    curTotal = parseInt(curTotal);

                    var curTaxVal = $('#grosstotalTax').val();
                    curTaxVal = parseFloat(curTaxVal);

                    var curVal = $('#grosstotal').val();
                    curVal = parseFloat(curVal);

                    var nowTot = curVal - curTotal;
                    nowTot = parseInt(nowTot);

                    var nowTotTax = curTaxVal - curTax;
                    nowTotTax = parseInt(nowTotTax);

                    $('#grosstotal').val(nowTot);
                    $('#grosstotalTax').val(nowTotTax);

                    $(this).parent().parent().remove();
                    getCount();
                    // reload();
                })

                $('.qntyitem').on('change', function() {
                    var qnty = parseFloat($(this).val());

                    var count = $(this).attr('data-count');
                    
                    var price = parseFloat($('.priceitem' + count + '').html());
                    var total = qnty * price;
                    $('.nettotalitem' + count + '').html('<input type="text" hidden name="nettotalitem[]" value="'+total+'">'+ total);
                    var getTax = ((total * 5) / 100);
                    $('.taxRate' + count + '').html(getTax);
                    getCount();
                    reload();
                })
            })
            // clear all
            $('.clearAlll').on('click',function(){
                $('.trClasses').remove();

            })
            //print
            $('.kotSub').on('click', function(){
                if ( $('#tbody').children().length > 0 ) {
                    $('.toTimecls p').html(moment());
                    window.print();
                }
                else{
                    alert("Please add Products");
                }
              
            })
            $('.mainSubmit').on('click', function(){
                
                if ( $('#tbody').children().length > 0 ) {
                    window.print();
                    $('.addsaleForm').submit();
                }
                else{
                    alert("Please add Products");
                }
                
            })
           
        });
        function reload(){
                var gCount = 0;
                var tCount = 0;
                    // var numCount  = $('.trClasses').length;
                    // alert(numCount)
                    $('.trClasses').each(function(){
                        gCount = gCount + parseFloat($(this).find('.netItem').find('input').val());
                        tCount = tCount + parseFloat($(this).find('.netTaxx').html());
                    })
                    // for(i=1;i<=numCount;i++){
                        
                    // }
                    // numCount = 0;
                    var curCount = parseFloat($('#grosstotal').val());
                    $('#grosstotal').val( gCount);

                    var curTaxCount = parseFloat($('#grosstotalTax').val());
                    $('#grosstotalTax').val( tCount);
            }
    </script>
@endsection
