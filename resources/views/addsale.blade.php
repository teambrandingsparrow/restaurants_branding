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
@section('head')
    {{-- <link rel="shortcut icon" href="img/"> --}}

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="dist/css/custom_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        /* rosahn changes */
        #tbody td {
            text-align: center;
        }

        #tbody input {
            padding: 5px 8px;
            border: .5px solid #909090;
            max-width: 53px;
            background: #ffffff;
            border-radius: 5px;
        }

        #tbody th {
            font-size: 15px;
            font-weight: 600;
            text-transform: capitalize;
        }

        #tbody tr {
            background: #f0f0f0;
        }

        .cusCard {
            padding: 7px;
            min-width: 139px;
            border-radius: 7px;
            cursor: pointer;
            text-align: center;
            margin: 5px auto;
            transition: .2s ease;
        }

        .cusCard:hover {
            transform: translateY(-8px);
        }

        .cusCard p.title {
            margin: 10px auto 5px auto;
            font-size: 14px;
            font-weight: 500;
            border-top: 1px solid #b8b8b8;
            width: 100%;
            text-transform: capitalize;
            padding-top: 5px;
        }

        .tableWidth {
            max-width: 700px;
        }

        .cusCard span.price {
            font-size: 13px;
            display: flex;
            width: 100%;
            padding: 2px;
            align-items: center;
            justify-content: space-between
        }

        svg.deletClass {
            cursor: pointer;
        }

        .cusButt {
            float: right;
            margin: 10px 5px;
            text-transform: capitalize
        }

        .cliLogo {
            max-width: 130px;
            margin: 9px auto;
            display: none;
        }
        img.itemImag{
            height: 100px;
            width: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .reload{
            cursor: pointer;
            stroke: #2196f3;
            margin: auto 5px;
            display: none;
            transform: scale(.85);
        }
        .demo input{
            border-radius: 5px;
            border: 1px solid #b8b8b8;
            width: 200px;
            padding: 2px;
        }
        .overflDiv{
            height: 90vh;
            overflow-y: auto;
        }

        @media print {
            nav {
                display: none !important;
            }

            #profileDropdown {
                display: none !important;
            }

            .cardsHide,
            .totalDetails,
            .hideDiv,
            .navbar {
                display: none !important;
            }

            .tableWidth {
                max-width: 400px;
            }

            .printTable {
                display: block !important;
            }

            .cliLogo {
                display: block;
            }

            th {
                text-align: center;
            }

            td {
                font-size: 14px;
            }

            #tbody input {
                border: none;
            }

        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
          
            <div class="row mt-5">
                <div class="col-lg-6">
                    <form action="{{url('addsaleStore')}}"method="post">
                        @csrf
                      <div class="demo">
                        <label><strong>Invoice Number:</strong></label>
                        <input type="text" value="{{$number}}" name="invoice">
                   
                        {{-- <label><strong>Date:</strong></label>
                        <input type="date" name="date" value="{{$today}}"> --}}

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
                                        <th class="hideDiv">Price</th>
                                        <th class="hideDiv" hidden></th>
                                        <th class="hideDiv">Net Total</th>
                                        <th class="hideDiv">Action</th>
                                        
                                        {{-- <th >demo</th> --}}
                                    </tr>
                                </thead>
                                @php
                                    $cnt = 1;
                                @endphp
                                <tbody id="tbody">
                                    {{-- <tr id="tb"> --}}
                                        {{-- <td style="vertical-align: top;important;">{{$cnt++}}</td>
                  <td><select  class="form-control2 prds" onchange="getStock(this)" required
                    name="productName[]" style="border:none;background-color:  var(--bs-table-bg);width:100px;">
                    <option value="">Select</option>
                    @foreach ($item as $Row)
                        <option value="{{ $Row->id }}">{{ $Row->itemname  }}</option>
                    @endforeach
                </select></td>
                  <td> <input style="border:none;background-color: var(--bs-table-bg);width:100px;" class="form-control qty" name="quantities[]" min="1" required
                    type="number" placeholder="Qty" id="qty"></td>
                  <td><input style="border:none;background-color:  var(--bs-table-bg);width:100px;" class="form-control cst" name="price_id[]" 
                    type="number" placeholder="Price" id="price"></td>
                  <td><input style="border:none;background-color:  var(--bs-table-bg);width:100px;" class="form-control tax" name="tax_id[]" 
                    type="number" placeholder="Tax" id="tax" ></td>
                  <td><input style="border:none;background-color:  var(--bs-table-bg);width:100px;" class="form-control tamt" name="total[]" 
                    type="number" placeholder="Total" id="total"></td> --}}

                                    {{-- </tr> --}}
                                    {{-- <tr hidden id="rr"> --}}
                                    {{-- <td style="vertical-align: top;important;">{{$cnt++}}</td>
                  <td><select  class="form-control2 prds" onchange="getStock(this)" required
                    name="productName[]" style="border:none;background-color:  var(--bs-table-bg);width:100px;">
                    <option value="">Select</option>
                    @foreach ($item as $Row)
                        <option value="{{ $Row->id }}">{{ $Row->itemname  }}</option>
                    @endforeach
                </select></td>
                  <td> <input style="border:none;background-color: var(--bs-table-bg);width:100px;" class="form-control qty" name="quantities[]" min="1" required
                    type="number" placeholder="Qty" id="qty"></td>
                  <td><input style="border:none;background-color:  var(--bs-table-bg);width:100px;" class="form-control cst" name="price_id[]" 
                    type="number" placeholder="Price" id="price"></td>
                  <td><input style="border:none;background-color:  var(--bs-table-bg);width:100px;" class="form-control tax" name="tax_id[]" 
                    type="number" placeholder="Tax" id="tax" ></td>
                  <td><input style="border:none;background-color:  var(--bs-table-bg);width:100px;" class="form-control tamt" name="total[]" 
                    type="number" placeholder="Total" id="total"></td> --}}


                                    {{-- </tr> --}}



                                </tbody>
                            </table>
                        </div>
                        <div style="margin: 20px 10px 10px 10px" class="totalDetails">
                            <div class="d-flex mb-2" style="align-items: center;justify-content:end;">
                                <label class="bolder" for="">Tax Total:</label>
                                <div class="ms-2">
                                    <input type="text" class="form-control" name="taxtotal" id="grosstotalTax" readonly value="0">
                                </div>

                            </div>
                            <div class="d-flex mb-3" style="align-items: center;justify-content:end;">
                                <label for="" class="bolder">Gross Total:</label>
                                <div class="ms-2 d-flex align-items-center">
                                    <div class="reload">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"/><polyline points="23 20 23 14 17 14"/><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"/></svg>
                                    </div>
                                    <input type="text" class="form-control" name="grosstotal" id="grosstotal" readonly value="0">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#" ><button type="reset" style="border:none;padding:5px;"class="btn btn-sm cusButt btn-danger">Cancel</button></a>
                                <a href="#" ><button type="submit" style="border:none;padding:5px;"class="btn cusButt btn-sm btn-success">Submit</button></a>
                                <a href="#" class="btn btn-sm cusButt btn-info" onclick="window.print()">Kot
                                    submit</a>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-lg-6 cardsHide">

                    <div class="row overflDiv">
                        
                        @foreach ($items as $item)
                            <div data-itemname-id={{$item->id}} data-itemname={{ $item->itemname }} data-price={{ $item->price }}
                                data-tax={{ $item->taxrate }} class="col-lg-4 col-xl-3 col-sm-6 storeitem">
                                <div class="card cusCard">
                                    <div class="card-body b-0 m-0 p-0">
                                        <img class="itemImag" src="{{ $item->file_path }}" alt="" class="img">
                                    </div>
                                    <p class="title">
                                        {{ $item->itemname }}
                                    </p>
                                    <span class="price">Price: <b>₹{{ $item->price }}</b></span>
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
                    // $(e).parent().parent().find('.qty').val(data.qty);
                    $(e).parent().parent().find('.cst').val(data.salesPrice);
                    $(e).parent().parent().find('.tax').val(data.taxs);
                    // $(e).parent().parent().find('.tamt').val(data.total);

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

    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script type = "text/JavaScript" src = " https://MomentJS.com/downloads/moment.js"></script>
    {{-- <script src="plugins/jquery-ui/jquery-ui.min.js"></script> --}}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    {{-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}


    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <script>
        $('#price, #qty').keyup(function() {
            var price = parseFloat($('#price').val());
            var qty = parseFloat($('#qty').val());

            $('#total').val(price * qty);

        });
        $(document).ready(function() {
          
           
            // relaod
            $('.reload').on('click', function(){
                var gCount = 0;
                    var numCount  = $('.trClasses').length;
                    // alert(numCount)
                    // alert(numCount);
                    for(i=1;i<=numCount;i++){
                        // alert(numCount)
                        gCount = gCount + parseFloat($('.nettotalitem' + i + '').html());
             
                    }
                    numCount = 0;

                    var curCount = parseFloat($('#grosstotal').val());
                    $('#grosstotal').val( gCount);
            })
            var count = 0;
            $('.storeitem').on('click', function() {
                count++;
                var item = $(this).attr('data-itemname');
                var itemId = $(this).attr('data-itemname-id');
                var price = $(this).attr('data-price');
                var tax = $(this).attr('data-tax');
                $('#tbody').append('<tr class="trClasses"><td class="hideDiv">' + count + '</td>'+
                    '<td class="todayDate"hidden></td><td>' + item +'<input type="text" name="item[]" hidden value="'+itemId+'"></td>'+
                    '<td><input  type="number" name="qty[]" value="1" min="1" class="qntyitem" data-count="' + count +
                    '" /></td><td class="priceitem' + count + ' hideDiv">' + price +
                    '<input type="text" name="price[]" hidden value="'+price+'"></td><td hidden class="taxRate' + count + ' hideDiv">' + tax +
                    '%</td><td class="nettotalitem' + count + ' hideDiv">' + price +
                    '<input type="text" hidden name="nettotalitem[]" value="'+ price +'"></td><td class="hideDiv"><svg data-taxcount="' + count + '" class="deletClass' +
                    count +
                    '" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg></td></tr>'
                    );

                    // date
                    $('.todayDate').html(moment().format("DD/MM/YYYY"));

                // Tax total 
                var tax = $('.taxRate' + count + '').html();
                tax = parseFloat(tax);
                var cTax = $('#grosstotalTax').val();
                cTax = parseFloat(cTax);
                var tTax = tax + cTax;
                $('#grosstotalTax').val(tTax);

                // calculate tax
                // var Tprice = parseFloat($('.priceitem' + count + '').html());
                // var taxAm = parseFloat($('.taxRate' + count + '').html());
                // var perc = '';
                // perc = ((Tprice * taxAm) / 100);
                // var getTot = parseFloat($('.nettotalitem' + count + '').html());
                // $('.nettotalitem' + count + '').html(getTot + perc);
                // alert(perc);


                // Gross total
                var netT = $('.nettotalitem' + count + '').html();
                netT = parseFloat(netT);
                var gTot = $('#grosstotal').val();
                gTot = parseFloat(gTot);
                var totGross = netT + gTot;
                $('#grosstotal').val(totGross);

                // delete icon
                $('.deletClass' + count + '').on('click', function(e) {
                    var Acount = $(this).attr('data-taxcount');

                    var curTax = $('.taxRate' + Acount + '').html();
                    curTax = parseInt(curTax);

                    var curTotal = $('.nettotalitem' + Acount + '').html();
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
                })

                $('.qntyitem').on('change', function() {
                    $('.reload').show();
                    var qnty = parseFloat($(this).val());

                    var count = $(this).attr('data-count');
                    
                    var price = parseFloat($('.priceitem' + count + '').html());
                   
                    // var taxGet = parseFloat($('.taxRate' + count + '').html());
                    // var percTAX = '';
                    // percTAX = ((price * taxGet) / 100);

                    // var tAmtax = price + percTAX;
                    var total = qnty * price;
                    $('.nettotalitem' + count + '').html(total);
               
                   
                    // var curNetTot =  $('#grosstotal').val();
                    // curNetTot = parseFloat(curNetTot) + price;
                    // $('#grosstotal').val(curNetTot);
                   

                    //  alert(qnty);
                })
            })
        });
    </script>
@endsection
