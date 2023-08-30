<div id="my-page-content">
    <div class="container">
        <div class="head-content">
            <div class="row row-aligns">
                <div class="col-md-6 order-2 order-md-1">
                    <div class="head-txt">
                        <h2 class="h1">{{ __("main_trans.title1") }} <span class="co-purple">{{ __("main_trans.title2")
                                }}</span></h2>
                        <p>{{ __("main_trans.title3") }}</p>
                        <div class="head-buttons">
                            <a class="bttn btn-purple" data-turbo="false" href="{{ URL('letsStart') }}">
                                {{ __('main_trans.Get Started') }}
                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                            <a class="bttn btn-empty" href="https://www.youtube.com/watch?v=afj3WB44lko" data-lity>{{
                                __('main_trans.Watch Video') }} <i class='bx bx-right-arrow'></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 order-1 order-md-2">
                    <div class="head-img">
                        <img class="img-fluid" src="{{ asset('assets/img/saudi-arabia.svg') }}" alt="Hotan Template">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Content -->

    <!-- Background Shape-->
    <div class="background-shapes">
        <div class="box1"></div>
        <div class="box2"></div>
        <div class="box3"></div>
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="heart1"><i class='bx bx-message-square'></i></div>
        <div class="heart2"><i class='bx bx-heart'></i></div>
        <div class="circle2"></div>
    </div>
    </header>
    <!-- End Header -->

    <!-- Start Services -->
    <section id="services" class="services mt-5">
        <div class="container">
            <div class="services-box">
                <div class="section-title">
                    <span>{{ __('home_trans.RELIABLE AND EFFICIENT DELIVERY SERVICES') }}</span>
                    <h3>{{ __('home_trans.All in one place') }} <br> {{ __('home_trans.powered by technology') }}</h3>
                </div>
                <div class="services-inner">
                    <div class="row row-aligns">
                        <div class="col-lg-4 col-md-12">
                            <div class="side-service left">

                                <div class="service-item">
                                    <div class="plus-icon" style="bottom: 30%;">
                                        <i class='bx bx-code-block'></i>
                                    </div>
                                    <div class="service-txt">
                                        <h5 class="mb-3">{{ __('home_trans.MT1') }}</h5>
                                        <p>{{ __('home_trans.DT1') }}</p>
                                    </div>
                                </div>

                                <div class="service-item">
                                    <div class="plus-icon">
                                        <i class='bx bx-donate-heart'></i>
                                    </div>
                                    <div class="service-txt">
                                        <h5 class="mb-3">{{ __('home_trans.MT2') }}</h5>
                                        <p>{{ __('home_trans.DT2') }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="service-box center">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="side-service right">
                                <div class="service-item">
                                    <div class="plus-icon">
                                        <i class='bx bx-pencil'></i>
                                    </div>
                                    <div class="service-txt">
                                        <h5 class="mb-3">{{ __('home_trans.MT3') }}</h5>
                                        <p>{{ __('home_trans.DT3') }}</p>
                                    </div>
                                </div>
                                <div class="service-item">
                                    <div class="plus-icon">
                                        <i class='bx bx-help-circle'></i>
                                    </div>
                                    <div class="service-txt">
                                        <h5 class="mb-3">{{ __('home_trans.MT4') }}</h5>
                                        <p>{{ __('home_trans.DT4') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services -->

    <!-- Start Catalog -->
    <section id="portfolio" class="portfolio p-0 m-0">
        <div class="container">
            <div class="trial">
                <div class="container">
                    <h4 style="color:#4b3da7">{{ __('home_trans.projramming Projects') }}</h4>
                </div>
            </div>
            &nbsp;

            <div>
                <div class="row no-gutter">
                    @foreach ($ready_projects as $project)
                    <div class="item prj-{{$project->department->id}} col-md-4 col-12 mb-4" style="max-height: 400px">
                        <div class="post-item">
                            <div class="post-img">
                                <img class="img-fluid" mu-open mu-link="{{ route('project', $project->id) }}" style="border-radius: 16px; cursor: pointer; width:100%;
                                    height:200px;
                                    object-fit:cover;
                                    object-position:50% 50%;"
                                    src="{{ $project->image }}" alt>
                            </div>

                            <div class="post-txt">
                                <div class="">
                                    <a class="post-title" href="{{ route('project', $project->id) }}">{{ $project->name }}</a>
                                    @if ($project->isOffered())
                                    <a id="offered-badge" class="post-title badge text-light bg-danger font-weight-bolder">{{ucwords(__('store_trans.offered'))}}!</a>
                                    @endif
                                </div>
                                <ul class="list-unstyled post-details">
                                    <li></li>
                                    <li>{{ $project->created_at->diffForHumans() }}</li>
                                    <li>{{ $project->likes->count() }} {{ __('main_trans.Likes')}}</li>
                                </ul>
                                <p>{{ Str::limit($project->description, 100, '...') }}</p>
                                <div class="footer-post">
                                    <div class="tags">
                                        @if ($project->isOffered())
                                        <a href="{{ route('project', $project->id) }}">
                                            <s>{{ $project->original_price }}</s> {{ $project->price }} {{ __('home_trans.SAR') }}
                                        </a>
                                        @else
                                        <a href="{{ route('project', $project->id) }}">
                                            {{ $project->price }} {{ __('home_trans.SAR') }}
                                        </a>
                                        @endif
                                    </div>

                                    @auth
                                    <div class="action-post" wire:key='divLike'>
                                        <a onclick="topbar.show()" style="cursor: pointer" wire:click="toggleLike({{$project}})">
                                            @if($project->liked())
                                            <i class="bx bxs-heart loveProject"></i>
                                            @else
                                            <i class="bx bx-heart loveProject"></i>
                                            @endif
                                        </a>
                                    </div>
                                    @else
                                    <div class="action-post">
                                        <a href="{{route('login')}}">
                                            <i class="bx bx-heart loveProject"></i>
                                        </a>
                                    </div>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- {{$ready_projects->links()}} --}}

            </div>


            &nbsp;
            <div class="container" style="text-align: center;">
                <a class="bttn btn-purple" href="{{ route('store') }}">{{ __('home_trans.more Details') }}
                    <i class='bx bx-left-arrow-alt'></i></a>
            </div>
        </div>

    </section>
    <!-- End Catalog -->


    <!-- Start Random Post -->
    <section id="random-post" class="random-post">
        <div class="container">
            <div class="first-post">
                <div class="row row-aligns">
                    <div class="col-md-6">
                        <div class="post-img">
                            <img class="img-fluid" src="{{ asset('assets/img/undraw_mobile_development_8gyo.svg') }}"
                                alt="Hotan Template">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="post-txt">
                            <span class="top-ico co-purple"><i class='bx bx-transfer-alt'></i></span>
                            <span class="dots">
                                <i class="dot dot1"></i>
                                <i class="dot dot2"></i>
                                <i class="dot dot3"></i>
                            </span>
                            <span class="label label-purple">{{ __('home_trans.The bright feature') }}</span>
                            <h4 class="co-purple">{{ __('home_trans.brightlg') }}</h4>
                            <p>{{ __('home_trans.brightsm') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="second-post">
                <div class="row row-aligns">
                    <div class="col-md-6 order-2 order-md-1">
                        <div class="post-txt">
                            <span class="top-ico co-purple"><i class='bx bx-like'></i></span>
                            <span class="label label-purple">{{ __('home_trans.The bright feature') }}</span>
                            <h4 class="co-purple">{{ __('home_trans.brightlg2') }}</h4>
                            <p>{{ __('home_trans.brightsm2') }}</p>
                            <span class="dots">
                                <i class="dot dot1"></i>
                                <i class="dot dot2"></i>
                                <i class="dot dot3"></i>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6 order-1 order-md-2">
                        <div class="post-img">
                            <img class="img-fluid" src="{{ asset('assets/img/undraw_unDraw_1000_gty8.svg') }}"
                                alt="Hotan Template">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Random Post -->

    <section id="trial" class="trial">
        <div class="container">
            <h4>{{ __('home_trans.goal') }}</h4>
            <p>{{ __('home_trans.goalDes') }}</p>
            <div class="line-sepa"></div>
            <div class="row">
                <div class="col-md-4">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="bx bx-wrench"></i>
                        </div>
                        <span class="counter-value">{{ \App\Models\Project::whereHas('state', function ($q) {
                            return $q->where('color', '!=', 'success');
                        })->count() }}</span>
                        <h3>{{ __('home_trans.shap1') }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter active">
                        <div class="counter-icon">
                            <i class="bx bxs-star-half"></i>
                        </div>
                        <span class="counter-value">{{ \App\Models\Partner::count() }}</span>
                        <h3>{{ __('home_trans.shap2') }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class="bx bx-check-double"></i>
                        </div>
                        <span class="counter-value">{{ \App\Models\Project::whereHas('state', function ($q) {
                            return $q->where('color', 'success');
                        })->count() }}</span>
                        <h3>{{ __('home_trans.shap3') }}</h3>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-4">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class='bx bx-group'></i>
                        </div>
                        <span class="counter-value">{{ \App\Models\User::count() }}</span>
                        <h3>{{ __('home_trans.shap4') }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter active">
                        <div class="counter-icon">
                            <i class='bx bx-briefcase-alt'></i>
                        </div>
                        <span class="counter-value">{{ \App\Models\Project::count() }}</span>
                        <h3>{{ __('home_trans.shap5') }}</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter">
                        <div class="counter-icon">
                            <i class='bx bx-like'></i>
                        </div>
                        <span class="counter-value">{{ \App\Models\Subscriber::count() }}</span>
                        <h3>{{ __('home_trans.shap6') }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Try Our Trial -->
    <section id="trial" class="trial">
        <div class="container">
            <h4>{{ __('home_trans.headt') }}</h4>
            <p>{{ __('home_trans.headb') }}</p>
            <div class="line-sepa"></div>
            <h3><span>693</span> {{ __('home_trans.headdes') }}</h3>
            @if (auth()->check())
            <a class="bttn btn-purple" href="{{ route('myProfile') }}">
                {{ __('home_trans.button') }}
                <i class='bx bx-right-arrow-alt'></i>
            </a>
            @else
            <a class="bttn btn-purple" href="{{ route('login') }}">
                {{ __('home_trans.button2') }}
                <i class='bx bx-right-arrow-alt'></i>
            </a>
            @endif
            <img class="img-fluid" src="{{ asset('assets/img/undraw_landscape_mode_53ej.svg') }}" alt="Hotan Template">
        </div>
    </section>
    <!-- End Try Our Trial -->

    <!-- Start Working -->
    <section id="start-working pt-5" class="start-working">
        <div class="overlay"></div>
        <div class="container">
            <div class="row row-aligns">
                <div class="col-lg-7">
                    <div class="video-place">
                        <a href="https://www.youtube.com/watch?v=4RynX087iBA" data-lity>
                            <i class='bx bx-right-arrow'></i>
                        </a>
                        <img width="640" height="360" class="img-fluid lazyload"
                            src="https://www.ektml.com/static/img/home/global.svg" loading="lazy" alt="Ektml Platform">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="video-txt">
                        <span>{{ __('home_trans.Why_Us') }}</span>
                        <h3>{{ __('home_trans.headtitle') }}</h3>
                        <p>{{ __('home_trans.headdes2') }}</p>
                        <ul class="list-unstyled">
                            <div class="row">
                                <div class="col-md-6">
                                    <li><i class='bx bx-bulb'></i> {{ __('home_trans.title1')}}</li>
                                    <li><i class='bx bx-vector'></i> {{ __('home_trans.title2')}}</li>
                                    <li class="active"><i class='bx bx-rocket'></i> {{ __('home_trans.title3')}}</li>
                                </div>
                                <div class="col-md-6">
                                    <li><i class='bx bx-check-double'></i> {{ __('home_trans.title4')}}</li>
                                    <li><i class='bx bx-collection'></i> {{ __('home_trans.title5')}}</li>
                                    <li><i class='bx bx-support'></i> {{ __('home_trans.title6')}}</li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Working -->


    <section id="clients" class="clients pb-md-5 pb-0">
        <div class="container">
            <h5>{{ __('home_trans.clientH')}}</h5>
            <div class="">
                <div class="row">

                    <!-- Slider main container -->
                    <div class="swiper rounded">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper rounded">
                            @foreach ($partners as $partner)
                                <div class="swiper-slide rounded p-2">
                                    @if ($partner->link)
                                        <a href="{{ $partner->link }}">
                                            <img src="{{ $partner->image }}" alt="avatar" loading="lazy"
                                                class="grey-animate lazyload rounded" width="100%" height="100%" style="object-fit: cover">
                                        </a>
                                    @else
                                        <img src="{{ $partner->image }}" alt="avatar" loading="lazy"
                                            class="grey-animate lazyload rounded" width="100%" height="100%" style="object-fit: cover">
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Download App -->
    <section id="download" class="download parallax my-5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="txt-phone">
                        <i class='bx bx-cloud-download'></i>
                        <h3>{{ __('home_trans.download')}}</h3>
                        <p>{{ __('home_trans.downloadb') }}</p>
                        <div class="download-bttn">
                            <a href="#" class="play-store">
                                <i class='bx bxl-play-store'></i>
                                <div class="txt-btn">
                                    <span>{{ __('home_trans.Soon On') }}</span>
                                    <span>{{ __('home_trans.Google Play') }}</span>
                                </div>
                            </a>
                            <a href="#" class="apple-store">
                                <i class='bx bxl-apple'></i>
                                <div class="txt-btn">
                                    <span>{{ __('home_trans.Soon On') }}</span>
                                    <span>{{ __('home_trans.Apple Store') }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="img-phone">
                        <img class="img-fluid lazyload" src="https://www.ektml.com/static/img/our_app.webp"
                            loading="lazy" alt="Ektml mobile application">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Download App -->

    <!-- Start Blog -->
    <section id="blog" class="blog mt-5">
        <div class="container">
            <div class="main-title">
                <h3>{{ __('home_trans.Last News') }}</h3>
                <p>{{ __('home_trans.Newsb') }}</p>
            </div>

            <div class="row">
                @foreach ($news as $new)
                <!-- Start Post Item -->
                <div class="col-md-6 mt-3">
                    <div class="post-item">
                        <div class="post-img">
                            <img class="img-fluid lazyload" src="{{$new->image}}" loading="lazy"
                                alt="{{$new->title}}">
                        </div>
                        <div class="post-txt">
                            <a class="post-title" href="{{route('news.show', $new->slug)}}">{{$new->title}}</a>
                            <ul class="list-unstyled post-details">
                                <li>{{$new->user->full_name}}</li>
                                <li>{{$new->created_at->diffForHumans()}}</li>
                            </ul>
                            <p>{{Str::limit($new->body, 100, '...')}}</p>
                            <div class="footer-post">
                                <div class="tags">
                                    <a href="{{route('news.show', $new->slug)}}">{{ __('home_trans.read') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Post Item -->
                @endforeach
            </div>

            <div class="text-center mt-3">
                <a href="{{route('news.index')}}" style="cursor: pointer" class="bttn btn-purple text-light">
                    {{__('home_trans.more Details')}}
                </a>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <section id="random-post mt-4" class="random-post my-4">
        <div class="container">
            <div class="main-title">
                <h3>{{ __('home_trans.CEO word') }}</h3>
            </div>
            <div class="first-post">
                <div class="row row-aligns">
                    <div class="col-md-4">
                        <div class="post-img">
                            <img width="640" height="360" class="img-fluid"
                                src="https://www.ektml.com/static/img/home/ceo_image.svg" alt="Ektml Platform">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="post-txt">
                            <span class="dots">
                                <i class="dot dot1"></i>
                                <i class="dot dot2"></i>
                                <i class="dot dot3"></i>
                            </span>
                            <h4 class="co-purple">{{ __('home_trans.Ahmed')}}</h4>
                            <span class="label label-purple mt-3">{{ __('home_trans.ceodes') }}</span>
                            <p class="mt-3">{{ __('home_trans.ceodes2') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Contact Us -->
    <section id="contact-us" class="contact-us">
        <div class="map-area" id="contacts">
        </div>
        <div class="form-area">
            <div class="form-inner">
                <!-- Background Shape-->
                <div class="background-shapes">
                    <div class="box1"></div>
                    <div class="box2"></div>
                    <div class="box3"></div>
                    <div class="dot1"></div>
                    <div class="dot2"></div>
                    <div class="heart1"><i class='bx bx-message-square'></i></div>
                    <div class="heart2"><i class='bx bx-heart'></i></div>
                    <div class="circle2"></div>
                </div>
                <div class="container">
                    <div class="form-box">
                        <div class="main-title">
                            <h3>{{ __('home_trans.Get In Touch') }}</h3>
                            <p>{{ __('home_trans.Please feel free to contact us') }}</p>
                        </div>


                        {{-- contact-us form --}}
                        @component('layouts.components.messages.success')
                        @endcomponent

                        <form wire:submit.prevent='contact'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input type="text" wire:model="contact.name"
                                                class="floating-label-field floating-label-field--s3" id="field-1"
                                                placeholder="Full Name">
                                            <label for="field-1" class="floating-label">{{
                                                __('home_trans.Name')}}</label>
                                            @error('contact.name')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input type="text" wire:model="contact.phone"
                                                class="floating-label-field floating-label-field--s3" id="field-4"
                                                placeholder="Phone Number">
                                            <label for="field-4" class="floating-label">{{
                                                __('home_trans.Phone')}}</label>
                                            @error('contact.phone')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div><!-- .floating-label-wrap -->
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input type="email" wire:model="contact.email"
                                                class="floating-label-field floating-label-field--s3" id="field-2"
                                                placeholder="E-Mail Address">
                                            <label for="field-2" class="floating-label">{{
                                                __('home_trans.Email')}}</label>
                                            @error('contact.email')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div><!-- .floating-label-wrap -->
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <textarea wire:model="contact.message"
                                                class="floating-label-field floating-label-field--s3" id="field-5"
                                                placeholder="Your Message"></textarea>
                                            <label for="field-5" class="floating-label">{{
                                                __('home_trans.Message')}}</label>
                                            @error('contact.message')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-buttons">
                                        <button type="submit" class="btn bttn btn-purple">{{ __('home_trans.Submit')
                                            }}</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
