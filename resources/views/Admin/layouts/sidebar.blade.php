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

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title text-primary">{{ __('dashboard_trans.MAIN OPTIONS') }}</li>
            <li>
                <a href="index.html">
                    <i class="uil-home-alt"></i>
                    <span>{{ __('dashboard_trans.Home') }}</span>
                </a>
            </li>

            <li class="menu-title text-primary">{{ __('dashboard_trans.PROJECTS SYSTEM') }}</li>
            <li>
                <a href="calendar.html" class="waves-effect">
                    <i class="uil-calender"></i>
                    <span>{{ __('dashboard_trans.Projects management') }}</span>
                </a>
            </li>

            <li>
                <a href="chat.html" class=" waves-effect">
                    <i class="fa fa-solid fa-bars"></i>
                    <span>{{ __('dashboard_trans.Projects sections') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-puzzle-piece"></i>
                    <span>{{ __('dashboard_trans.Projects categories') }}</span>
                </a>
            </li>


            <li class="menu-title text-primary">{{ __('dashboard_trans.CATALOG MANAGMENT') }}</li>
            <li>
                <a href="file-manager.html" class=" waves-effect">
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
                    <i class="fa fa-duotone fa-rectangle-history-circle-plus"></i>
                    <span>{{ __('dashboard_trans.Store Catogries') }}</span>
                </a>
            </li>

            <li>
                <a href="file-manager.html" class=" waves-effect">
                    <i class="fa fa-solid fa-puzzle-piece"></i>
                    <span>{{ __('dashboard_trans.Addons') }}</span>
                </a>
            </li>






            <li class="menu-title">Components</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-flask"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="ui-alerts.html">Alerts</a></li>
                    <li><a href="ui-buttons.html">Buttons</a></li>
                    <li><a href="ui-cards.html">Cards</a></li>
                    <li><a href="ui-carousel.html">Carousel</a></li>
                    <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                    <li><a href="ui-grid.html">Grid</a></li>
                    <li><a href="ui-images.html">Images</a></li>
                    <li><a href="ui-lightbox.html">Lightbox</a></li>
                    <li><a href="ui-modals.html">Modals</a></li>
                    <li><a href="ui-offcanvas.html">Offcanvas</a></li>
                    <li><a href="ui-rangeslider.html">Range Slider</a></li>
                    <li><a href="ui-session-timeout.html">Session Timeout</a></li>
                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                    <li><a href="ui-placeholders.html">Placeholders</a></li>
                    <li><a href="ui-sweet-alert.html">Sweet-Alert</a></li>
                    <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                    <li><a href="ui-typography.html">Typography</a></li>
                    <li><a href="ui-utilities.html">Utilities<span class="badge rounded-pill bg-success float-end">New</span></a></li>
                    <li><a href="ui-toasts.html">Toasts</a></li>
                    <li><a href="ui-video.html">Video</a></li>
                    <li><a href="ui-general.html">General</a></li>
                    <li><a href="ui-colors.html">Colors</a></li>
                    <li><a href="ui-rating.html">Rating</a></li>
                    <li><a href="ui-notifications.html">Notifications</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <i class="uil-shutter-alt"></i>
                    <span class="badge rounded-pill bg-info float-end">9</span>
                    <span>Forms</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="form-elements.html">Basic Elements</a></li>
                    <li><a href="form-validation.html">Validation</a></li>
                    <li><a href="form-advanced.html">Advanced Plugins</a></li>
                    <li><a href="form-editors.html">Editors</a></li>
                    <li><a href="form-uploads.html">File Upload</a></li>
                    <li><a href="form-xeditable.html">Xeditable</a></li>
                    <li><a href="form-repeater.html">Repeater</a></li>
                    <li><a href="form-wizard.html">Wizard</a></li>
                    <li><a href="form-mask.html">Mask</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-list-ul"></i>
                    <span>Tables</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="tables-basic.html">Bootstrap Basic</a></li>
                    <li><a href="tables-datatable.html">Datatables</a></li>
                    <li><a href="tables-responsive.html">Responsive</a></li>
                    <li><a href="tables-editable.html">Editable</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-chart"></i>
                    <span>Charts</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="charts-apex.html">Apex</a></li>
                    <li><a href="charts-chartjs.html">Chartjs</a></li>
                    <li><a href="charts-flot.html">Flot</a></li>
                    <li><a href="charts-knob.html">Jquery Knob</a></li>
                    <li><a href="charts-sparkline.html">Sparkline</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-streering"></i>
                    <span>Icons</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="icons-unicons.html">Unicons</a></li>
                    <li><a href="icons-boxicons.html">Boxicons</a></li>
                    <li><a href="icons-materialdesign.html">Material Design</a></li>
                    <li><a href="icons-dripicons.html">Dripicons</a></li>
                    <li><a href="icons-fontawesome.html">Font Awesome</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-location-point"></i>
                    <span>Maps</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="maps-google.html">Google</a></li>
                    <li><a href="maps-vector.html">Vector</a></li>
                    <li><a href="maps-leaflet.html">Leaflet</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="uil-share-alt"></i>
                    <span>Multi Level</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);">Level 1.1</a></li>
                    <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);">Level 2.1</a></li>
                            <li><a href="javascript: void(0);">Level 2.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->
