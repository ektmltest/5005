<div class="vertical-menu">

<div class="navbar-brand-box">
    <a href="{{ route('dashboard') }}" class="logo logo-dark">
        <span class="logo-sm">
            <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('dashboard/assets/images/logo-dark.png') }}" alt="" height="20">
        </span>
    </a>

    <a href="{{ route('dashboard') }}" class="logo logo-light">
        <span class="logo-sm">
            <img src="{{ asset('dashboard/assets/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ asset('dashboard/assets/images/logo-light.png') }}" alt="" height="20">
        </span>
    </a>
</div>

<button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
    <i class="fa fa-fw fa-bars"></i>
</button>

<div data-simplebar class="sidebar-menu-scroll">
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title text-primary">{{ __('dashboard_trans.MAIN OPTIONS') }}</li>
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="uil-home-alt"></i>
                    <span>{{ __('dashboard_trans.Home') }}</span>
                </a>
            </li>

            <li class="menu-title text-primary">{{ __('dashboard_trans.PROJECTS SYSTEM') }}</li>
            <li>
                <a href="{{ route('staffProjects') }}" class="waves-effect">
                    <i class="uil-calender"></i>
                    <span>{{ __('dashboard_trans.Projects management') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('staffProjectSections') }}" class="waves-effect">
                    <i class="fa fa-solid fa-bars"></i>
                    <span>{{ __('dashboard_trans.Projects sections') }}</span>
                </a>
            </li>

            <li>
                <a href="{{ route('staffProjectCategories') }}" class=" waves-effect">
                    <i class="fa fa-solid fa-puzzle-piece"></i>
                    <span>{{ __('dashboard_trans.Projects categories') }}</span>
                </a>
            </li>


            <li class="menu-title text-primary">{{ __('dashboard_trans.CATALOG MANAGMENT') }}</li>
            <li>
                <a href="{{ route('readyProjects') }}" class=" waves-effect">
                    <i class="fa fa-solid fa-pen-nib"></i>
                    <span>{{ __('dashboard_trans.Manage Projects') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-plus"></i>
                    <span>{{ __('dashboard_trans.Add Project') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-folder-plus"></i>
                    <span>{{ __('dashboard_trans.Store Catogries') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-gift"></i>
                    <span>{{ __('dashboard_trans.Addons') }}</span>
                </a>
            </li>


            <li class="menu-title text-primary">{{ __('dashboard_trans.WITHDRAWS') }}</li>
            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-comments-dollar"></i>
                    <span>{{ __('dashboard_trans.Withdraws') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fas fa-money-check-alt"></i>
                    <span>{{ __('dashboard_trans.Charges') }}</span>
                </a>
            </li>


            <li class="menu-title text-primary">{{ __('dashboard_trans.TICKET SYSTEM') }}</li>
            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-clipboard-list"></i>
                    <span>{{ __('dashboard_trans.Tickets Management') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fas fa-ticket-alt"></i>
                    <span>{{ __('dashboard_trans.Ticket Categories') }}</span>
                </a>
            </li>


            <li class="menu-title text-primary">{{ __('dashboard_trans.POSTS SYSTEM') }}</li>
            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-print"></i>
                    <span>{{ __('dashboard_trans.Posts List') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-marker"></i>
                    <span>{{ __('dashboard_trans.Add a new post') }}</span>
                </a>
            </li>


            <li class="menu-title text-primary">{{ __('dashboard_trans.PUBLIC SYSTEMS') }}</li>
            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-user-shield"></i>
                    <span>{{ __('dashboard_trans.Users Management') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-book"></i>
                    <span>{{ __('dashboard_trans.Translation System') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-globe"></i>
                    <span>{{ __('dashboard_trans.Roles management') }}</span>
                </a>
            </li>


            <li class="menu-title text-primary">{{ __('dashboard_trans.SITE DETAILS') }}</li>
            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-wrench"></i>
                    <span>{{ __('dashboard_trans.Site settings') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fas fa-folder-open"></i>
                    <span>{{ __('dashboard_trans.Our work sections') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fas fa-images"></i>
                    <span>{{ __('dashboard_trans.Our work') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fas fa-project-diagram"></i>
                    <span>{{ __('dashboard_trans.FAQ sections') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fas fa-question-circle"></i>
                    <span>{{ __('dashboard_trans.FAQ') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fab fa-ioxhost"></i>
                    <span>{{ __('dashboard_trans.Our platforms') }}</span>
                </a>
            </li>

        </ul>
    </div>
</div>
</div>
