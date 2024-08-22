<div id="sidebar" class="app-sidebar">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-profile">
                <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                    <div class="menu-profile-cover with-shadow"></div>
                    <div class="menu-profile-image">
                        <img src="{{ asset('assets/img/user/user-13.jpg') }}" alt="" />
                    </div>
                    <div class="menu-profile-info">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="menu-caret ms-auto"></div>
                        </div>
                        <small class="text-capitalize">{{ Auth::user()->getRoleNames()->first() }}</small>
                    </div>
                </a>
            </div>
            <div id="appSidebarProfileMenu" class="collapse">
                <div class="menu-item pt-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-cog"></i></div>
                        <div class="menu-text">Settings</div>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                        <div class="menu-text"> Send Feedback</div>
                    </a>
                </div>
                <div class="menu-item pb-5px">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                        <div class="menu-text"> Helps</div>
                    </a>
                </div>
                <div class="menu-divider m-0"></div>
            </div>

            <div class="menu-header">Navigation</div>
            @can('dashboard-access')
            <div class="menu-item {{ (request()->segment(1) == 'dashboard') ? 'active' : '' }}">
                <a href="{{ route('apps.dashboard') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-square-full"></i>
                    </div>
                    <div class="menu-text">Dashboard</div>
                </a>
            </div>
            @endcan

            @can('pre-register-access')
            <div class="menu-item has-sub {{ (request()->segment(1) == 'pre-register') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-file-alt"></i>
                    </div>
                    <div class="menu-text">Pre-Register</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->segment(2) == 'selling-vendor') ? 'active' : '' }}">
                        <a href="{{ route('apps.preregister.sellingvendor') }}" class="menu-link">
                            <div class="menu-text">Selling Vendor</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'hobby-activity') ? 'active' : '' }}">
                        <a href="{{ route('apps.preregister.hobbyactivity') }}" class="menu-link">
                            <div class="menu-text">Hobby Activity</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'hobby-showoff') ? 'active' : '' }}">
                        <a href="{{ route('apps.preregister.hobbyshowoff') }}" class="menu-link">
                            <div class="menu-text">Hobby Show Off</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'sponsorship') ? 'active' : '' }}">
                        <a href="{{ route('apps.preregister.sponsorship') }}" class="menu-link">
                            <div class="menu-text">Sponsorship</div>
                        </a>
                    </div>
                </div>
            </div>
            @endcan

            @can('visitor')
            <div class="menu-header">Visitor</div>
            @can('ticket-access')
            <div class="menu-item {{ (request()->segment(1) == 'ticket-visitor') ? 'active' : '' }} {{ (request()->segment(1) == 'shopee-visitor') ? 'active' : '' }}">
                <a href="{{ route('apps.ticket-visitor.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="menu-text">Ticket Visitor</div>
                </a>
            </div>
            @endcan
            @endcan

            <div class="menu-header">Exhibition</div>
            @can('agent-access')
            <div class="menu-item {{ (request()->segment(1) == 'agent') ? 'active' : '' }}">
                <a href="{{ route('apps.agent.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="menu-text">Agents</div>
                </a>
            </div>
            @endcan
            @can('vendor-access')
            <div class="menu-item {{ (request()->segment(1) == 'vendors') ? 'active' : '' }}">
                <a href="{{ route('apps.vendors.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="menu-text">Vendors</div>
                </a>
            </div>
            @endcan
            @can('booth-booked-access')
            <div class="menu-item {{ (request()->segment(1) == 'booth-booked') ? 'active' : '' }}">
                <a href="{{ route('apps.booth-booked.index') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <div class="menu-text">Booth Booked</div>
                </a>
            </div>
            @endcan

            @can('exhibition-access')
            <div class="menu-item has-sub {{ (request()->segment(1) == 'exhibition') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">Exhibition</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    @can('hall-access')
                    <div class="menu-item {{ (request()->segment(2) == 'hall') ? 'active' : '' }}">
                        <a href="{{ route('apps.exhibition.hall.index') }}" class="menu-link">
                            <div class="menu-text">Hall </div>
                            <div class="menu-badge">Step 1</div>
                        </a>
                    </div>
                    @endcan
                    @can('zone-access')
                    <div class="menu-item {{ (request()->segment(2) == 'section') ? 'active' : '' }}">
                        <a href="{{ route('apps.exhibition.section.index') }}" class="menu-link">
                            <div class="menu-text">Zone</div>
                             <div class="menu-badge">Step 2</div>
                        </a>
                    </div>
                    @endcan
                    @can('booth-number-access')
                    <div class="menu-item {{ (request()->segment(2) == 'booth-number') ? 'active' : '' }} {{ (request()->segment(2) == 'batch-booth-edit') ? 'active' : '' }}">
                        <a href="{{ route('apps.exhibition.booth-number.index') }}" class="menu-link">
                            <div class="menu-text">Booth Number </div>
                            <div class="menu-badge">Step 3</div>
                        </a>
                    </div>
                    @endcan
                    @can('booth-access')
                    <div class="menu-item {{ (request()->segment(2) == 'booth') ? 'active' : '' }}">
                        <a href="{{ route('apps.exhibition.booth.index') }}" class="menu-link">
                            <div class="menu-text">Booth </div>
                            <div class="menu-badge">Step 4</div>
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            @endcan

            @can('mhx-cup-access')
            <div class="menu-item has-sub {{ (request()->segment(1) == 'mhx-cup') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-car-side"></i>
                    </div>
                    <div class="menu-text">MHX CUP 2023</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->segment(2) == 'register') ? 'active' : '' }}"><a href="{{ route('apps.mhx-cup.register.index') }}" class="menu-link"><div class="menu-text">Racer Registered</div></a></div>
                </div>
            </div>
            @endcan
            @can('mhx-cup-access')
            <div class="menu-header">Event</div>

            <div class="menu-item has-sub {{ (request()->segment(1) == 'event-mhx-cup') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">MHX CUP 2023</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item {{ (request()->segment(2) == 'categories') ? 'active' : '' }}">
                        <a href="{{ route('apps.event-mhx-cup.categories.index') }}" class="menu-link">
                            <div class="menu-text">Category</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'tracks') ? 'active' : '' }}">
                        <a href="{{ route('apps.event-mhx-cup.tracks.index') }}" class="menu-link">
                            <div class="menu-text">Tracks</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'racers') ? 'active' : '' }}">
                        <a href="{{ route('apps.event-mhx-cup.racers.index') }}" class="menu-link">
                            <div class="menu-text">Racers</div>
                        </a>
                    </div>
                    <div class="menu-item has-sub {{ (request()->segment(2) == 'screening-round') ? 'active' : '' }}">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Screening Round</div>
                            <div class="menu-caret"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item {{ (request()->segment(3) == 'races') ? 'active' : '' }}">
                                <a href="{{ route('apps.event-mhx-cup.races.index') }}" class="menu-link">
                                    <div class="menu-text">Races</div>
                                </a>
                            </div>
                            <div class="menu-item {{ (request()->segment(3) == 'results') ? 'active' : '' }}">
                                <a href="{{ route('apps.event-mhx-cup.results.index') }}" class="menu-link">
                                    <div class="menu-text">Result</div>
                                </a>
                            </div>
                            <div class="menu-item {{ (request()->segment(3) == 'board') ? 'active' : '' }}">
                                <a href="{{ route('apps.event-mhx-cup.board.index') }}" class="menu-link">
                                    <div class="menu-text">Score Board</div>
                                </a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            @endcan
            @can('system-access')
            <div class="menu-header">Systems</div>

            @can('acl-access')
            <div class="menu-item has-sub {{ (request()->segment(1) == 'acl') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">A.C.L</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    @can('permission-access')
                    <div class="menu-item {{ (request()->segment(2) == 'permissions') ? 'active' : '' }}">
                        <a href="{{ route('apps.acl.permissions.index') }}" class="menu-link">
                            <div class="menu-text">Permissions</div>
                        </a>
                    </div>
                    @endcan
                    @can('role-access')
                    <div class="menu-item {{ (request()->segment(2) == 'roles') ? 'active' : '' }}">
                        <a href="{{ route('apps.acl.roles.index') }}" class="menu-link">
                            <div class="menu-text">Roles</div>
                        </a>
                    </div>
                    @endcan
                    @can('user-access')
                    <div class="menu-item {{ (request()->segment(2) == 'users') ? 'active' : '' }}">
                        <a href="{{ route('apps.acl.users.index') }}" class="menu-link">
                            <div class="menu-text">Users</div>
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            @endcan
            @can('billplz-access')
            <div class="menu-item has-sub {{ (request()->segment(1) == 'billplz') ? 'active' : '' }}">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-money-bill"></i>
                    </div>
                    <div class="menu-text">BillPlz</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    {{--<div class="menu-item {{ (request()->segment(2) == 'debug-form') ? 'active' : '' }}">
                        <a href="{{ route('apps.billplz.debug') }}" class="menu-link">
                            <div class="menu-text">Debug Form</div>
                        </a>
                    </div>--}}
                    <div class="menu-item {{ (request()->segment(2) == 'status') ? 'active' : '' }}">
                        <a href="{{ route('apps.billplz.status.index') }}" class="menu-link">
                            <div class="menu-text">Status</div>
                        </a>
                    </div>
                    <div class="menu-item {{ (request()->segment(2) == 'webhook') ? 'active' : '' }}">
                        <a href="{{ route('apps.billplz.webhook.index') }}" class="menu-link">
                            <div class="menu-text">Webhook</div>
                        </a>
                    </div>
                </div>
            </div>
            @endcan
            @can('route-access')
            <div class="menu-item {{ (request()->segment(1) == 'route') ? 'active' : '' }}">
                <a href="{{ route('apps.route') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-link"></i>
                    </div>
                    <div class="menu-text">Route list</div>
                </a>
            </div>
            @endcan
            @can('log-access')
            <div class="menu-item {{ (request()->segment(1) == 'logs') ? 'active' : '' }}">
                <a href="{{ route('apps.logs') }}" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-history"></i>
                    </div>
                    <div class="menu-text">Logs</div>
                </a>
            </div>
            @endcan
            @can('apps-log-access')
            <div class="menu-item {{ (request()->segment(1) == 'apps-logs') ? 'active' : '' }}">
                <a href="{{ url('apps-logs') }}" class="menu-link" target="_blank">
                    <div class="menu-icon">
                        <i class="fa fa-history"></i>
                    </div>
                    <div class="menu-text">Apps Logs</div>
                </a>
            </div>
            @endcan

            @endcan

            {{--<div class="menu-item has-sub">
                <a href="javascript:;" class="menu-link">
                    <div class="menu-icon">
                        <i class="fa fa-align-left"></i>
                    </div>
                    <div class="menu-text">Menu Level</div>
                    <div class="menu-caret"></div>
                </a>
                <div class="menu-submenu">
                    <div class="menu-item has-sub">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-text">Menu 1.1</div>
                            <div class="menu-caret"></div>
                        </a>
                        <div class="menu-submenu">
                            <div class="menu-item has-sub">
                                <a href="javascript:;" class="menu-link">
                                    <div class="menu-text">Menu 2.1</div>
                                    <div class="menu-caret"></div>
                                </a>
                                <div class="menu-submenu">
                                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 3.1</div></a></div>
                                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 3.2</div></a></div>
                                </div>
                            </div>
                            <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 2.2</div></a></div>
                            <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 2.3</div></a></div>
                        </div>
                    </div>
                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 1.2</div></a></div>
                    <div class="menu-item"><a href="javascript:;" class="menu-link"><div class="menu-text">Menu 1.3</div></a></div>
                </div>
            </div>--}}

            <div class="menu-item d-flex">
                <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
            </div>

        </div>

    </div>

</div>
<div class="app-sidebar-bg"></div>
<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
