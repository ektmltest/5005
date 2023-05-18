<nav class="navbar navbar-expand-lg navbar-light fixed-top">
<div class="container">
<a class="navbar-brand" href="{{route('home')}}">
    <img src="{{ asset('assets/img/logo_ektml.webp') }}" alt="Hotan Template" title="Hotan" style="width: 90px !important">
</a>

<button class="navbar-toggler" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>


<div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">{{ucwords(__('nav.home_page'))}}</a>
        </li>
        <li class="nav-item dropdown js-dropdown-links">
            <a class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ucwords(__('nav.options'))}}
            </a>
            <div class="dropdown-menu" >
                <a class="dropdown-item dropdown-link" href="{{route('tickets')}}">
                    <div class="link-ico">
                        <i class='bx bx-message-detail'></i>
                        <span class="title">{{ucwords(__('nav.options.tickets_system'))}}</span>
                    </div>
                </a>
                <a class="dropdown-item dropdown-link" href="{{ route('letsStart') }}">
                    <div class="link-ico">
                        <i class='bx bx-book-add'></i>
                        <span class="title">{{ucwords(__('nav.options.project_request'))}}</span>
                    </div>
                </a>
                <a class="dropdown-item dropdown-link" href="{{ route('myProjects') }}">
                    <div class="link-ico">
                        <i class='bx bx-spreadsheet'></i>
                        <span class="title">{{ucwords(__('nav.options.my_projects'))}}</span>
                    </div>
                </a>
                <span class="bg-gray hover-state js-hover-state"></span>
            </div>
        </li>

        <li class="nav-item dropdown js-dropdown-links">
            <a class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ucwords(__('nav.platforms'))}}
            </a>
            <div class="dropdown-menu" >
                <a class="dropdown-item dropdown-link" href="#">
                    <div class="link-ico">
                        <i class='bx bx-game'></i>
                        <span class="title">{{ucwords(__('nav.platforms.pgxpo'))}}</span>
                    </div>
                </a>
                <a class="dropdown-item dropdown-link" href="#">
                    <div class="link-ico">
                        <i class='bx bx-detail'></i>
                        <span class="title">{{ucwords(__('nav.platforms.forbit'))}}</span>
                    </div>
                </a>
                <a class="dropdown-item dropdown-link" href="#">
                    <div class="link-ico">
                        <i class='bx bx-data'></i>
                        <span class="title">{{ucwords(__('nav.platforms.rqoom'))}}</span>
                    </div>
                </a>
                <a class="dropdown-item dropdown-link" href="#">
                    <div class="link-ico">
                        <i class='bx bx-pointer'></i>
                        <span class="title">{{ucwords(__('nav.platforms.nqrat'))}}</span>
                    </div>
                </a>
                <span class="bg-gray hover-state js-hover-state"></span>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('store') }}">{{ucwords(__('nav.store'))}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gallary') }}">{{ucwords(__('nav.gallery'))}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('faq')}}">{{ucwords(__('nav.faq'))}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('about')}}">{{ucwords(__('nav.about'))}}</a>
        </li>
    </ul>

    <ul class="navbar-nav nav-buttons ml-auto list-unstyled">
        <li class="nav-item dropdown js-dropdown-links">
            <a class="nav-link dropdown-toggle" href="#" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ ucwords(__('nav.lang')) }}
            </a>

            <div class="dropdown-menu" >
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item dropdown-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <div class="link-ico">
                            <span class='flag-icon flag-icon-{{$localeCode == 'en' ? 'us' : 'sa'}}'></span>
                            <span class="title">{{ $properties['native'] }}</span>
                        </div>
                    </a>
                @endforeach
                <span class="bg-gray hover-state js-hover-state"></span>
            </div>
        </li>

    @if(auth()->user())
        <li class="nav-item nav-trial item dropdown js-dropdown-links">
            <a class="nav-link dropdown-toggle" id="clientoptions" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item dropdown-link" href="{{ route('myProfile') }}">
                    <div class="link-ico">
                        <i class='bx bx-user-circle'></i>
                        <span class="title">{{ __('main_trans.Your Profile') }}</span>
                    </div>
                </a>
                    <a class="dropdown-item dropdown-link" href="#">
                    <div class="link-ico">
                        <i class='bx bx-power-off'></i>
                        <span class="title">{{ __('main_trans.Sign Out') }}</span>
                    </div>
                </a>
                <span class="bg-gray hover-state js-hover-state"></span>
            </div>
        </li>
    @else
        <li class="nav-item nav-trial">
            <a class="nav-link" href="#">{{ __('main_trans.Free Trial') }}</a>
        </li>
    @endif
    </ul>
</div>
</div>
</nav>

