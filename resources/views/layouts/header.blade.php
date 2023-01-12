<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="mobile-only-brand pull-left">
        <div class="nav-header pull-left">
            <div class="logo-wrap">
                <a href="index.html">
                    {{-- <img class="brand-img" src="../img/logo.png" alt="brand"/> --}}
                    <span class="brand-text">ERP</span>
                </a>
            </div>
        </div>	
        <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
        <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
        <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
        <form id="search_form" role="search" class="top-nav-search collapse pull-left">
            <div class="input-group">
                <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
                <span class="input-group-btn">
                <button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
                </span>
            </div>
        </form>
    </div>
    <div id="mobile_only_nav" class="mobile-only-nav pull-right">
        <ul class="nav navbar-right top-nav pull-right">
        <li>
            {{-- <a href="#"><i class="zmdi zmdi-power"></i><span>Log Out</span></a> --}}
            <a style="color: red;" class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"><i class="fa-solid fa-power-off logoutcolor"></i></i> Log out
                {{-- <samp class="profile" style="color:rgb(255, 255, 255);font-family: Georgia, serif;">ERP</samp> --}}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
        {{-- <li class="nav-item nav-profile dropdown">
            <a style="color: red;" class="nav-link" href="#" data-bs-toggle="dropdown" id="profileDropdown"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"><i class="fa-solid fa-power-off logoutcolor"></i></i> Log out
                {{-- <samp class="profile" style="color:rgb(255, 255, 255);font-family: Georgia, serif;">ERP</samp> --}}
            {{-- </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
           
        </li> --}} 

        </ul>
    </div>	
</nav>