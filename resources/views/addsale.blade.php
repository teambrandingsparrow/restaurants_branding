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
 <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- Tempusdominus Bbootstrap 4 -->
 <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
 <!-- iCheck -->
 <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
 <!-- JQVMap -->
 <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
 <!-- Theme style -->
 <link rel="stylesheet" href="dist/css/adminlte.min.css">
 <link rel="stylesheet" href="dist/css/custom_style.css">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 <!-- Daterange picker -->
 <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
 <!-- summernote -->
 <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
 <!-- Google Font: Source Sans Pro -->
 <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
@endsection
@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-5 col-lg-5">
        <div class="card" style="width: 700px">
          <div class="card-body p-0">
            <table class="table table-bordered ">
              <thead>
                <tr>
                  <th style="width: 10px">Sl</th>
                  <th>Item Name</th>
                  <th>Qty</th>
                  <th >Price</th>
                  <th >Tax</th>
                  <th >Net Total</th>
                  <th >demo</th>
                </tr>
              </thead>
              @php
              $cnt = 1;
          @endphp
              <tbody>
                <tr id="tb">
                  <td style="vertical-align: top;important;">{{$cnt++}}</td>
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
                    type="number" placeholder="Total" id="total"></td>
                    <td>
                        <button
                        id="btn"type="button"style="background-color:black;border-radius:10px;margin-top:38%"
                        class="btn btn-primary">+</button>
                    </td>
                </tr>
                <tr hidden id="rr">
                  <td style="vertical-align: top;important;">{{$cnt++}}</td>
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
                    type="number" placeholder="Total" id="total"></td>

                    <td>
                         <button onclick="remove(this)"
                        type="button"style="background-color:black;border-radius:10px;margin-top:38%"
                        class="btn btn-primary">-</button></td>
                </tr>
                
                
               
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <div class="row">
             
              <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                <label for="">Tax Total</label>
              
              </div>
              <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                <div class="input-group input-group-sm mb-1">
                  <input type="text" class="form-control" id="grosstotal"  readonly value="0">
                </div>
              
              </div>
            </div>
            <div class="row">
             
                <div class="col-4 col-sm-4 col-md-4 col-lg-4">
                  <label for="">Gross Total</label>
                
                </div>
                <div class="col-8 col-sm-8 col-md-8 col-lg-8">
                  <div class="input-group input-group-sm mb-1">
                    <input type="text" class="form-control" id="grosstotal"  readonly value="0">
                  </div>
                
                </div>
              </div>
            <div class="text-center">
              <a href="#" class="btn btn-sm btn-info">submit</a>
              <a href="#" class="btn btn-sm btn-danger">Cancel</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-7 col-lg-7" >
       
        <div class="row"style="margin-left: 70px;importantant">
          @foreach ($items as $item)
          <div class="col-6 col-sm-6 col-md-3 col-lg-3 mt-2">
          
            <div class="card p-0 m-0" >
              <div class="card-body p-0 m-0 b-0">
                <img src="{{$item->file_path}}" alt=""   class="img">
              </div>
              <div class="title">
                {{$item->itemname}}
              </div>
              <div class="card-footer cf">
                <div class="row">
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6">
                    <span class="price"> ₹{{$item->price}}</span>
                  </div>
                  <div class="col-6 col-sm-6 col-md-6 col-lg-6 text-right">
                    <a href="#" class="btn-sm btn btn-info">
                      <i class="fa fa-cart-plus" aria-hidden="true"></i>
                    </a>
                  </div>
                </div>
              </div>
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
                var row = $("#rr").clone().appendTo("#tb");
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
                                                         
                    $(e).parent().parent().find('.img').attr("src",data.img);
                   
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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <script>
      $('#price, #qty').keyup(function(){
   var price = parseFloat($('#price').val());
   var qty = parseFloat($('#qty').val());
   
   $('#total').val(price * qty );
 
});
 
   </script>
@endsection
