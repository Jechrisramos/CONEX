<!-- SIDEBAR -->

<div id="pagesidebar" class="col-sm-2 col-md-4 col-lg-1">
    <div class="row">
        <div class="col-lg-12">
        
        <ul id="sidebar-nav" class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link flex" href="/dashboard"><i class="fas fa-chart-bar fa-2x"></i>&nbsp;<span>Dashboard</span></a>
            
            </li>
        @auth
            <li class="nav-item">
                <a class="nav-link flex" href="/tickets"><i class="fas fa-ticket-alt fa-2x"></i> <span>My Tickets</span></a>
            </li>

            
                @if(Auth::user()->role_id == 1 | Auth::user()->role_id == 2 | Auth::user()->role_id == 3 | Auth::user()->role_id == 4)
                    <li class="nav-item">
                        <a class="nav-link flex" href="/users"><i class="fas fa-users fa-2x"></i> <span>Users</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link flex" href="/avatars"><i class="fas fa-images fa-2x"></i> <span>Avatars</span></a>
                    </li>
                @endif
            @endauth
        </ul>
        </div><!--endofcol-->
    </div><!--endofrow-->
</div><!--endofcol-->
