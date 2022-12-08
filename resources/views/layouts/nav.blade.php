<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item @if ($current_page == 'Dashboard') active @endif">
            <a class="nav-link" href="{{ url('home') }}">
                <i class="ti-home menu-icon"><i class="fa-solid fa-house"></i></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
       

        <li class="nav-item @if ($current_page == 'Sale') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#user3" aria-expanded="false"
                aria-controls="form-elements">
                <i class="ti-clipboard menu-icon"><i class="fas fa-shopping-bag"></i></i>
                <span class="menu-title">Billing</span>
                <i class="menu-arrow"><i class="fa-solid fa-chevron-down"></i></i>
            </a>
            <div class="collapse" id="user3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('addsale') }}">Add </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('salelist') }}">Sales List</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('salereport') }}">Sales Reports</a>
                    </li> --}}

                </ul>
            </div>
        </li>
       
        <li class="nav-item @if ($current_page == 'Item') active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#Item-elements" aria-expanded="false"
                aria-controls="form-elements">
                <i class="ti-clipboard menu-icon"><i class="fas fa-cubes"></i></i>
                <span class="menu-title">Item</span>
                <i class="menu-arrow"><i class="fa-solid fa-chevron-down"></i></i>
            </a>
            <div class="collapse" id="Item-elements">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Additem') }}">Additem</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Itemlist') }}">Item list</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('Addquantitytype') }}">Add Quantity Type</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ url('Quantitytypelist') }}">Quantity Type List</a>
                    </li> --}}

                </ul>
            </div>
        </li>
        
    </ul>
</nav>
