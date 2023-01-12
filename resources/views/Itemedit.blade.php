

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>ERP</title>
	<meta name="description" content="Grandin is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Grandin Admin, Grandinadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	
	<!-- Data table CSS -->
	<link href="../vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Toast CSS -->
	<link href="../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="../dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-5-active pimary-color-pink">
		<!-- Top Menu Items -->
        @include('layouts.header')
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
        @include('layouts.nav')
		<!-- /Left Sidebar Menu -->
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid pt-25">
				<!-- Row -->
                <div class="content-wrapper">
                    <div class="row grid-margin">
                        <div class="col-12">
                            <div class="panel" style="padding: 20px">
                                <h4 class="panel-title">Update Items</h4>
                                <div class="panel-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ url('ItemUpdate/'.$item->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- @if (Auth::user()->usertype == 1)
                                            <div class="form-group row">
                                                <div class="col-lg-3">
                                                    <label class="col-form-label">Select Branch
                                                        <span style="color: red;">*</span>
                                                    </label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <select class="form-control2" required name="user">
                                                        <option value="">Select Branch</option>
                                                        @foreach ($users as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif --}}
                                        <div class="form-group row">
                                           
                                                <label class="col-form-label"> Item Code<span style="color: red;">*</span></label>
                                          
                                           
                                                <input class="form-control" name="itemcode" type="text"
                                                value="{{$item->itemcode}}"placeholder="Enter Item Code">
                                          
                                        </div>
                                        <div class="form-group row">
                                           
                                                <label class="col-form-label"> Item Name <span style="color: red;">*</span></label>
                                           
                                                <input class="form-control" name="itemname" type="text"
                                                    value="{{$item->itemname}}"placeholder="Enter Item Name">
                                         
                                        </div>
                                        <div class="form-group row">
                                         
                                                <label class="col-form-label"> Quantity Type <span style="color: red;">*</span>
                                                </label>
                                         
                                                <select class="form-control" required name="quantitytype">
                                                    <option value=""> Please Select</option>
                                                    @foreach ($qtytype as $Row)
                                                        <option @if ($item->quantitytype == $Row->id) selected @endif value="{{ $Row->id }}">{{ $Row->quantityTypes }}</option>
                                                    @endforeach
                                                </select>
                                         
                                        </div>
                                       
                                        <div class="form-group row">
                                        
                                                <label class="col-form-label"> Quantity  <span style="color: red;">*</span></label>
                                        
                                           
                                                <input class="form-control" name="quantity"id="qty_1" type="text"
                                                value="{{$item->quantity}}"placeholder="Enter Quantity">
                                           
                                        </div>
                                        <div class="form-group row">
                                         
                                                <label class="col-form-label"> Price <span style="color: red;">*</span></label>
                                          
                                         
                                                <input class="form-control" name="price"id="price_1" type="text"
                                                value="{{$item->price}}"placeholder="Enter Price ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                     
                                                <label class="col-form-label"> Tax Rate <span style="color: red;">*</span></label>
                                          
                                                <input class="form-control" name="taxrate" type="text"
                                                value="{{$item->taxrate}}"placeholder="Enter Tax Rate">
                                            </div>
                                    
                                        <div class="form-group row">
                                        
                                                <label class="col-form-label"> Image <span style="color: red;">*</span></label>
                                   
                                                <input class="form-control" name="file" type="file"
                                                   placeholder="Upload image" value="{{$item->file_path}}"  style="background-color:none;important">
                                                   <img src="{{ $item->file_path }}" alt="" style="width:50px;height:50px;"
                                                   srcset="">
                                            </div>
                                            {{-- <div class="form-group row">
                                                <div class="col-lg-3">
                                                    <label class="col-form-label">Total Amount <span style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <input class="form-control" id="total_1"  name="totalamount" type="text"
                                                    value="{{$item->totalamount}}"placeholder="Total Amount">
                                                </div>
                                            </div> --}}
                                        </div>
                                      <button type="submit"style="background-color:black;border-radius:10px;"
                                                class="btn btn-primary">Update</button>
                                          
                                     
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            
            
                </div>
				<!-- /Row -->
				
			</div>
			
			<!-- Footer -->
			@include('layouts.footer')
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    <!-- jQuery -->
    <script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
	<!-- Data table JavaScript -->
	<script src="../vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="../dist/js/jquery.slimscroll.js"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="../vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="../vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="../dist/js/simpleweather-data.js"></script>
	
	<!-- EChartJS JavaScript -->
	<script src="../vendors/bower_components/echarts/dist/echarts-en.min.js"></script>
	<script src="../vendors/echarts-liquidfill.min.js"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="../vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="../vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="../dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="../vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="../vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Toast JavaScript -->
	<script src="../vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
	
	<!-- Piety JavaScript -->
	<script src="../vendors/bower_components/peity/jquery.peity.min.js"></script>
	<script src="../dist/js/peity-data.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="../vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Init JavaScript -->
	<script src="../dist/js/init.js"></script>
	<script src="../dist/js/dashboard6-data.js"></script>
</body>

</html>
