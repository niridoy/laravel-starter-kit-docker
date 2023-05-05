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
                <a class="{{ (request()->routeIs('Dashboard')) ? 'active' : '' }}" href="{{route('Dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="{{ (request()->routeIs('slot-datas.index')) ? 'active' : '' }}" href="{{route('slot-datas.index')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Slot Data</span>
                </a>
            </li>

            <li>
                <a class="{{ (request()->routeIs('vehicle-logs.index')) ? 'active' : '' }}" href="{{route('vehicle-logs.index')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Vehicle Log</span>
                </a>
            </li>

            <li class="heading">Management</li>
            <li>
                <a class="{{ (request()->routeIs('slots*')) ? 'active' : '' }}" href="{{ route('slots.index')}}"><i class="sidebar-item-icon fa fa-list"></i>
                    <span class="nav-label">Slot</span>
                </a>
            </li>
              <li>
                <a class="{{ (request()->routeIs('projects*')) ? 'active' : '' }}" href="{{ route('projects.index')}}"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Project</span>
                </a>
            </li>
            <li>
                <a class="{{ (request()->routeIs('users*')) ? 'active' : '' }}" href="{{ route('users.index')}}"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">User</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
