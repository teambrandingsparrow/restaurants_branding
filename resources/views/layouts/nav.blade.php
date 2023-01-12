<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
      <br>
        <li>
            <a href="{{url('home')}}" class="active"    data-target="#dashboard_dr"><div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="pull-right"></div><div class="clearfix"></div></a>
            
        </li>
        <li>
            <a  href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_1"><div class="pull-left"><i class="fa fa-qrcode mr-20"></i><span class="right-nav-text">Billing</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="dashboard_1" class="collapse collapse-level-1">
                <li>
                    <a href="{{url('addsale')}}">Add Sale</a>
                </li>
                <li>
                    <a href="{{ url('salelist') }}"> Sale List</a>
                </li>
            </ul>
        </li>
        @if(Auth::user()->usertype ==1)
        <li>
            <a  href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard_2"><div class="pull-left"><i class="fa fa-cutlery mr-20"></i><span class="right-nav-text">Item</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
            <ul id="dashboard_2" class="collapse collapse-level-1">
                <li>
                    <a href="{{ url('Additem') }}">Additem</a>
                </li>
                <li>
                    <a href="{{ url('Itemlist') }}"> Item list</a>
                </li>
                <li>
                    <a href="{{ url('Addquantitytype') }}"> Add Quantity Type</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</div>