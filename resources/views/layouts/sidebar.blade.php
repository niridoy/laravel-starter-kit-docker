<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('./assets/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">Bond</div><small>{{Auth::user()->name}}</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="{{ (request()->routeIs('dashboard')) ? 'active' : '' }}" href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="{{ (request()->routeIs('items.index')) ? 'active' : '' }}" href="{{route('items.index')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Slot Data</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
