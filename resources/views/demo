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
            margin: auto;
            transition: .2s ease;
        }

        .cusCard:hover {
            transform: translateY(-12px);
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
                    <div class="card tableWidth">
                        <img class="cliLogo" src="{{ asset('image/citySpice-LOGO.jpeg') }}" alt="">
                        <div class="card-body printTable p-0">
                            <table class="table-bordered table">
                                <thead>

                                    <tr>
                                        <th style="width: 10px" class="hideDiv">Sl</th>
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th class="hideDiv">Price</th>
                                        <th class="hideDiv">Tax</th>
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
                                    <input type="text" class="form-control" id="grosstotalTax" readonly value="0">
                                </div>

                            </div>
                            <div class="d-flex mb-3" style="align-items: center;justify-content:end;">
                                <label for="" class="bolder">Gross Total:</label>
                                <div class="ms-2">
                                    <input type="text" class="form-control" id="grosstotal" readonly value="0">
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="#" class="btn btn-sm cusButt btn-danger">Cancel</a>
                                <a href="#" class="btn cusButt btn-sm btn-success">Submit</a>
                                <a href="#" class="btn btn-sm cusButt btn-info" onclick="window.print()">Kot
                                    submit</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 cardsHide">

                    <div class="row">
                        @foreach ($items as $item)
                            <div data-itemname={{ $item->itemname }} data-price={{ $item->price }}
                                data-tax={{ $item->taxrate }} class="col-6 col-sm-6 col-md-3 col-lg-3 storeitem">
                                <div class="card cusCard">
                                    <div class="card-body b-0 m-0 p-0">
                                        <img src="{{ $item->file_path }}" alt="" style="width: 100px; height:100px;" class="img">
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
            var count = 0;
            $('.storeitem').on('click', function() {
                count++;
                var item = $(this).attr('data-itemname');
                var price = $(this).attr('data-price');
                var tax = $(this).attr('data-tax');
                $('#tbody').append('<tr><td class="hideDiv">' + count + '</td><td>' + item +
                    '</td><td><input type="number" value="1" class="qntyitem" data-count="' + count +
                    '" /></td><td class="priceitem' + count + ' hideDiv">' + price +
                    '</td><td class="taxRate' + count + ' hideDiv">' + tax +
                    '%</td><td class="nettotalitem' + count + ' hideDiv">' + price +
                    '</td><td class="hideDiv"><svg data-taxcount="' + count + '" class="deletClass' +
                    count +
                    '" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg></td></tr>'
                    );

                // Tax total 
                var tax = $('.taxRate' + count + '').html();
                tax = parseFloat(tax);
                var cTax = $('#grosstotalTax').val();
                cTax = parseFloat(cTax);
                var tTax = tax + cTax;
                $('#grosstotalTax').val(tTax);

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

                $('.qntyitem').on('keyup', function() {
                    var qnty = $(this).val();
                    qnty = parseFloat(qnty);
                    var count = $(this).attr('data-count');
                    var price = $('.priceitem' + count + '').html();
                    price = parseFloat(price);
                    alert(qnty);
                    var total = qnty * price;
                    $('.nettotalitem' + count + '').html(total);

                    var curNetTot =  $('#grosstotal').val();
                    curNetTot = parseFloat(curNetTot) + price;
                    $('#grosstotal').val(curNetTot);
                   

                    //  alert(qnty);
                })
            })
        });
    </script>
@endsection
