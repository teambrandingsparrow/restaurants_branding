<?php
$month = date('m');
$day = date('d');
$year = date('Y');
$today = $year . '-' . $month . '-' . $day;
?>
<!DOCTYPE html>
<html lang="en" class="_md"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  

  <title>Erp</title>
  <meta name="description" content="#">
  <meta name="author" content="#">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/base.css" type="text/css">
  <link rel="stylesheet" href="css/components.css" type="text/css">
  <link rel="stylesheet" href="css/extra_components.css" type="text/css">
  <link rel="stylesheet" href="css/default.css" type="text/css">
  <link rel="stylesheet" href="css/common.css" type="text/css">
  <link rel="stylesheet" href="css/custom.css" type="text/css">
  <link rel="stylesheet" href="css/extra_styles.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




</head>

  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  <![endif]-->
</head>

<body data-new-gr-c-s-check-loaded="14.1086.0" data-gr-ext-installed="" style="overflow-y: hidden;">
    {{-- <form method="POST" action="{{url('SaleStore')}}"> --}}
  <div class="mfp-wrap mfp-3d-unfold ps_popup_wrap mfp-ready" tabindex="-1" style="overflow: hidden auto; z-index: 1099;">
    <div class="mfp-container mfp-s-ready mfp-inline-holder">
       
      <div class="mfp-content">
      
        <div id="ps_popup" class="component popup ps_popup mfp-with-anim" style="top: 0px; left: 0px;"> 
          <div class="popup_head">
            <i class="fa-solid fa-file-invoice" style="margin-right: 2%"></i> Create (Sale Bill)</div> 
          <div class="popup_body"> 
            <form class="sp_popup_form" autocomplete="off" novalidate="" >
              <div class="fields">
               
             
              <div class="component datefield _type1 _sm2 _comp_inline _mgrt_1em _mgbt_05em _w8em filled">   
                    <div class="dtpck_innr"> 
                      <label class="dtpckr_label" for="#">Date</label> 
                 
                       <input id="dob" type="date"class="cmp_ip dtpckr_ip"  name="date" value="{{$today}}" required="" autocomplete="dob">
                    </div>   
              </div><br><br>
              <div class="component datefield _type1 _sm2 _comp_inline _mgrt_1em _mgbt_05em _w8em filled">   
                <div class="dtpck_innr"> 
                  <label class="dtpckr_label" for="#">Invoice Number</label> 
             
                   <input id="dob" type="text"class="cmp_ip dtpckr_ip" name="number"
                   max="1000"value="{{ $number }}" readonly type="text"
                   placeholder="Enter Invoice Number">
                </div>   
          </div><br><br>
              {{-- <div class="component inputbox _type1 _sm2 _comp_inline _mgrt_1em _mgbt_05em _w12em  filled"> 
                <input id="dob" type="text"class="cmp_ip dtpckr_ip" name="suppliername" type="text"
                value="{{ old('suppliername') }}" placeholder="Enter Customer Name">
                 <h3 class="cmp_label ipbx_label">Customer Name</h3>  
            </div> --}}
            <div class="component datefield _type1 _sm2 _comp_inline _mgrt_1em _mgbt_05em _w8em filled">   
                <div class="dtpck_innr"> 
                  <label class="dtpckr_label" for="#">Customer Name</label> 
             
                   <input id="dob" type="text"class="cmp_ip dtpckr_ip" name="suppliername" type="text"
                   value="{{ old('suppliername') }}" placeholder="Enter Customer Name">
                </div>   
          </div><br><br>
          
            
               </div>
            
           </form>
           <div style="display: flex;width:100%;">
              <div class="component inputsheet item_puritemsheet item_ip_sheet _type1 focused" style="border:solid  #7c9d9f;border-width:thin;">  
                {{-- <h2 style="border: none;height: 50px;background-color:#f4f4f4;font-size:1.7rem;top:10%;margin-top:2%;letter-spacing: .2rem;">Source(Consumption)</h2> --}}
                    <span class="ips_status"></span> 
                    <div class="ips_container"style="padding:0%;"> 
                      <ul class="table_head_ul"> 
                      
                        {{-- <li class="item_puritemsheet_tbl_citem_code _citem_code"style="width:10%;important">Item Code</li>  --}}
                        <li class="item_puritemsheet_tbl_citem_name _citem_name"style="width:30%;important">Item Description</li> 
                     
                        <li class="item_puritemsheet_tbl_cunit_name _cunit_name"style="width:20%;important">Quantity</li> 
                        <li class="item_puritemsheet_tbl_cquantity _cquantity"style="width:20%;important">Individual Price</li> 
                        <li class="item_puritemsheet_tbl_crate _crate"style="width:10%;important">Tax Rate</li> 
                       
                        <li class="item_puritemsheet_tbl_camount _camount"style="width:20%;important">Net Amount</li>  
                      </ul> 
                      <div class="table_listcnt item_puritemsheet" tabindex="-1" style="height: 500px; width:800px;; overflow-y: auto;"> 
                        <ul class="table_list item_puritemsheet">
                          <li class="tl_li"> 
                            <ul class="table_list_ul"> 
                              
                               
                             
                             

                              <li class="item_puritemsheet_tbl_citem_name _citem_name " data-key="item_name"style="width:30%;important">
                                <div class="component selectbox _sm _type3 ">   
                                 
                                  <select  class="slbx_sl prds"  onchange="getStock(this)" required
                                  name="productName[]" autocomplete="off">
                                    <option value="">Select</option>
                                    @foreach ($item as $Row)
                                        <option value="{{ $Row->id }}">{{ $Row->itemname  }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </li> 
                            

                             
                             


                              <li class="item_puritemsheet_tbl_cunit_name _cunit_name " data-key="unit_name"style="width:20%;important">
                                <div class="component inputbox _sm _type2 _ralign">   
                                    <input  autocapitalize="none" autocomplete="off" autocorrect="off" spellcheck="false" aria-haspopup="false" aria-autocomplete="list" class="cmp_ip ipbx_ip qty" tabindex="" name="quantities[]" min="1" required
                                    type="number" placeholder="Quantity">
                                    
                                  </div>
                              </li> 

                              <li class="item_puritemsheet_tbl_cquantity _cquantity " data-key="quantity"style="width:20%;important">
                                <div class="component inputbox _sm _type2 _ralign">   
                                  <input  autocapitalize="none" autocomplete="off" autocorrect="off" spellcheck="false" aria-haspopup="false" aria-autocomplete="list" class="cmp_ip ipbx_ip cst" tabindex=""name="price_id[]" onchange="GetItem(this)"
                                  type="number" placeholder="Price">
                                  
                                </div>
                              </li>  

                              <li class="item_puritemsheet_tbl_crate _crate " data-key="rate"style="width:10%;important">
                                <div class="component inputbox _sm _type2 _ralign">   
                                  <input type="text" autocapitalize="none" autocomplete="off" autocorrect="off" spellcheck="false" aria-haspopup="false" aria-autocomplete="list" class="cmp_ip ipbx_ip tax" tabindex="" name="tax_id[]" onchange="GetItem(this)"
                                  type="number" placeholder="Tax"> 
                         
                                </div>
                              </li>


                             
                              <li class="item_puritemsheet_tbl_camount _camount " data-key="amount"style="width:20%;important">
                                <div class="component inputbox _sm _type2 _ralign">   
                                  <input type="text" autocapitalize="none" autocomplete="off" autocorrect="off" spellcheck="false" aria-haspopup="false" aria-autocomplete="list" class="cmp_ip ipbx_ip" tabindex="" name="" id="el_id_57" value="" placeholder="Net Amount"> 
                                
                                </div>
                              </li>  

                            </ul> 
                            {{-- <div class="col-md-2">
                                    <label class="col-form-label"> Product Name <span
                                            style="color: red;">*</span></label>
                                    <select class="form-control2 prds" onchange="getStock(this)" required
                                        name="productName[]">
                                        <option value="">Select</option>
                                        @foreach ($item as $Row)
                                            <option value="{{ $Row->id }}">{{ $Row->itemname  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Quantity <span
                                            style="color: red;">*</span></label>
                                    <input class="form-control qty" name="quantities[]" min="1" required
                                        type="number" placeholder="Quantity">
                                </div>
                               
                                <div class="col-md-2">
                                    <label class="col-form-label"> Price <span
                                            style="color: red;">*</span></label>
                                    <input class="form-control cst" name="price_id[]" onchange="GetItem(this)"
                                        type="number" placeholder="Price">

                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"> Tax Rate <span
                                            style="color: red;">*</span></label>
                                    <input class="form-control tax" name="tax_id[]" onchange="GetItem(this)"
                                        type="number" placeholder="Price">
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">image</label><br>
                                    <img class="img" name="img[]"style="width:45px;height:45px;" onchange="GetItem(this)">
                                </div>
                                 --}}
                          </li>
                        </ul> 
                      </div> 
                      <style>  
         
            
          .item_puritemsheet_tbl_citem_code { width:7.41% } 
            
          .item_puritemsheet_tbl_citem_name { width:25% } 
            
         
            
          .item_puritemsheet_tbl_cunit_name { width:8% } 
            
          .item_puritemsheet_tbl_cquantity { width:7.41% } 
            
          .item_puritemsheet_tbl_crate { width:7.41% } 
            
         
            
          .item_puritemsheet_tbl_camount { width:10% } 
            </style> </div> </div>
          
             <div class="component inputsheet item_puritemsheet item_ip_sheet _type1 focused"style="border:solid  #7c9d9f;border-width:thin;"> 

                <span class="ips_status"></span> 
                <div class="ips_container"style="padding:0%;"> 
                 
                  <div class="table_listcnt item_puritemsheet" tabindex="-1" style="height: 385.45px; width:800px; overflow-y: auto;"> 
                    <ul class="table_list item_puritemsheet">
                      <li class="tl_li"> 
                        <ul class="table_list_ul"> 
                         
                          @foreach ($items as $item)
                         
                         
                       <img  src="{{$item->file_path}}"> &nbsp;
                        {{$item->itemname}}
                        
                          
                           @endforeach
                          
                         
                        </ul> 
                      </li>
                    </ul> 
                  </div> 
                  <style>  

        
      .item_puritemsheet_tbl_citem_code { width:7.41% } 
        
      .item_puritemsheet_tbl_citem_name { width:25% } 
        
     
        
      .item_puritemsheet_tbl_cunit_name { width:8% } 
        
      .item_puritemsheet_tbl_cquantity { width:7.41% } 
        
      .item_puritemsheet_tbl_crate { width:7.41% } 
        
     
        
      .item_puritemsheet_tbl_camount { width:10% } 
        </style> </div> </div>
        
           </div>
           
            
         
               <a href="/home"><button title="Close (Esc)" type="button" class="mfp-close">×</button> </a>
                </div>
   
              </div>
          
            </div>
          </div>
      
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
                        $(e).parent().parent().find('.qty').val(data.qty);
                        $(e).parent().parent().find('.cst').val(data.salesPrice);
                        $(e).parent().parent().find('.tax').val(data.taxs);
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
</body>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration>
</html>