<div class="vertical-menu">

    <div class="navbar-brand-box">
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/img/logo_ektml.webp') }}" alt="" height="20">
            </span>

            <span class="logo-lg">
                <img src="{{ asset('assets/img/logo_ektml.webp') }}" alt="" height="22">
            </span>
        </a>

        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/img/logo_ektml.webp') }}" alt="" height="20">
            </span>

            <span class="logo-lg">
                <img src="{{ asset('assets/img/logo_ektml.webp') }}" alt="" height="22">
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

                @if (auth()->user()->hasPermission('manage-projects'))
                <li>
                    <a href="{{ route('staffProjects') }}" class="waves-effect">
                        <i class="uil-calender"></i>
                        <span>{{ __('dashboard_trans.Projects management') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-projects-sections'))
                <li>
                    <a href="{{ route('staffProjectSections') }}" class="waves-effect">
                        <i class="fa fa-solid fa-bars"></i>
                        <span>{{ __('dashboard_trans.Projects sections') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-projects-categories'))
                <li>
                    <a href="{{ route('staffProjectCategories') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-puzzle-piece"></i>
                        <span>{{ __('dashboard_trans.Projects categories') }}</span>
                    </a>
                </li>
                @endif


                <li class="menu-title text-primary">{{ __('dashboard_trans.CATALOG MANAGMENT') }}</li>
                @if (auth()->user()->hasPermission('manage-catalog-projects'))
                <li>
                    <a href="{{ route('readyProjects') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-pen-nib"></i>
                        <span>{{ __('dashboard_trans.Manage Projects') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('create-catalog-projects'))
                <li>
                    <a href="{{ route('readyProjects.create') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-plus"></i>
                        <span>{{ __('dashboard_trans.Add Project') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-catalog-projects-categories'))
                <li>
                    <a href="{{ route('readyProjects.departments') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-folder-plus"></i>
                        <span>{{ __('dashboard_trans.Store Catogries') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-catalog-addons'))
                <li>
                    <a href="{{ route('readyProjects.addons') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-gift"></i>
                        <span>{{ __('dashboard_trans.Addons') }}</span>
                    </a>
                </li>
                @endif


                <li class="menu-title text-primary">{{ __('dashboard_trans.WITHDRAWS') }}</li>
                @if (auth()->user()->hasPermission('manage-withdrawals'))
                <li>
                    <a href="{{ route('transactions.withdrawals') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-comments-dollar"></i>
                        <span>{{ __('dashboard_trans.Withdraws') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-charges'))
                <li>
                    <a href="{{ route('transactions.charges') }}" class=" waves-effect">
                        <i class="fas fa-money-check-alt"></i>
                        <span>{{ __('dashboard_trans.Charges') }}</span>
                    </a>
                </li>
                @endif


                <li class="menu-title text-primary">{{ __('dashboard_trans.TICKET SYSTEM') }}</li>
                @if (auth()->user()->hasPermission('manage-tickets'))
                <li>
                    <a href="{{ route('tickets.index') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-clipboard-list"></i>
                        <span>{{ __('dashboard_trans.Tickets Management') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-tickets-types'))
                <li>
                    <a href="{{ route('tickets.types') }}" class=" waves-effect">
                        <i class="fas fa-ticket-alt"></i>
                        <span>{{ __('dashboard_trans.Ticket Categories') }}</span>
                    </a>
                </li>
                @endif

                <li class="menu-title text-primary">{{ __('dashboard_trans.POSTS SYSTEM') }}</li>
                @if (auth()->user()->hasPermission('manage-posts'))
                <li>
                    <a href="{{route('posts.manage')}}" class=" waves-effect">
                        <i class="fa fa-solid fa-print"></i>
                        <span>{{ __('dashboard_trans.Posts List') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('create-posts'))
                <li>
                    <a href="{{route('posts.create')}}" class=" waves-effect">
                        <i class="fa fa-solid fa-marker"></i>
                        <span>{{ __('dashboard_trans.Add a new post') }}</span>
                    </a>
                </li>
                @endif


                <li class="menu-title text-primary">{{ __('dashboard_trans.PUBLIC SYSTEMS') }}</li>
                @if (auth()->user()->hasPermission('manage-users'))
                <li>
                    <a href="{{route('users.index')}}" class=" waves-effect">
                        <i class="fa fa-solid fa-user-shield"></i>
                        <span>{{ __('dashboard_trans.Users Management') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-translations'))
                <li>
                    <a href="{{ \App\Helpers\Url::getUrl('admin/translations')}} " class=" waves-effect">
                        <i class="fa fa-solid fa-book"></i>
                        <span>{{ __('dashboard_trans.Translation System') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-ranks'))
                <li>
                    <a href="{{ route('ranks.index') }}" class=" waves-effect">
                        <i class="fa fa-solid fa-globe"></i>
                        <span>{{ __('dashboard_trans.Roles management') }}</span>
                    </a>
                </li>
                @endif

                <li class="menu-title text-primary">{{ __('dashboard_trans.AFFILIATE SYSTEM') }}</li>
                @if (auth()->user()->hasPermission('affiliate-manage-users'))
                <li>
                    <a href="{{route('admin.affiliate.users')}}" class=" waves-effect">
                        <i class="fa fa-solid fa-user-shield"></i>
                        <span>{{ __('dashboard_trans.Users Management') }}</span>
                    </a>
                </li>
                @endif

                <li class="menu-title text-primary">{{ __('dashboard_trans.SITE DETAILS') }}</li>
                @if (auth()->user()->hasPermission('manage-settings'))
                <li>
                    <a href="file-manager.html" class=" waves-effect">
                        <i class="fa fa-solid fa-wrench"></i>
                        <span>{{ __('dashboard_trans.Site settings') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-gallery-types'))
                <li>
                    <a href="{{ route('gallery.types') }}" class=" waves-effect">
                        <i class="fas fa-folder-open"></i>
                        <span>{{ __('dashboard_trans.Our work sections') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-gallery'))
                <li>
                    <a href="{{ route('gallery.index') }}" class=" waves-effect">
                        <i class="fas fa-images"></i>
                        <span>{{ __('dashboard_trans.Our work') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-qas-types'))
                <li>
                    <a href="{{ route('qas.types') }}" class=" waves-effect">
                        <i class="fas fa-project-diagram"></i>
                        <span>{{ __('dashboard_trans.FAQ sections') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-qas'))
                <li>
                    <a href="{{ route('qas.index') }}" class="waves-effect">
                        <i class="fas fa-question-circle"></i>
                        <span>{{ __('dashboard_trans.FAQ') }}</span>
                    </a>
                </li>
                @endif

                @if (auth()->user()->hasPermission('manage-platforms'))
                <li>
                    <a href="{{ route('platforms.index') }}" class=" waves-effect">
                        <i class="fab fa-ioxhost"></i>
                        <span>{{ __('dashboard_trans.Our platforms') }}</span>
                    </a>
                </li>
                @endif

            </ul>
        </div>
    </div>
</div>
