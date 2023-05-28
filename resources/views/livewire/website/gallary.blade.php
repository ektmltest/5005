{{-- <section id="portfolio" class="portfolio">
    <div class="container">
        <div class="list-control">
            <ul class="list-unstyled">
                <li class="active" data-filter="*">{{ __('main_trans.All') }}</li>
                @foreach ($categories as $category)
                <li data-filter=".{{$category->key}}">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>


        <div id="portfolio-grid" class="row no-gutter">
            <!-- Start Item -->
            <div class="item photography col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary1') }}" target="_blank" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" target="_blank" src="{{ asset('assets/img/gallary1') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item graphics col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary2.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary2.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item webdesign col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary3.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary3.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item photography col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary4.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary4.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item logo col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary5.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary5.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary6') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary6') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item webdesign col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary7.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary7.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item logo col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary8.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary8.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary9.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary9.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item graphics col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary10.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary10.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->
            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary11') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary11') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary12.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary12.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary13.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary13.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary14.png') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary14.png') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary15') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary15') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

            <!-- Start Item -->
            <div class="item advertising col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="zoom-gallery">
                    <a href="{{ asset('assets/img/gallary16') }}" class="item-wrap">
                        <i class='bx bx-search-alt'></i>
                        <img class="img-fluid" src="{{ asset('assets/img/gallary16') }}">
                    </a>
                </div>
            </div>
            <!-- End Item -->

        </div>
    </div>
</section>
<!-- End Portfolio --> --}}

<!-- Start Portfolio -->
<section id="portfolio" class="portfolio">
    @php
        $gallaryProjectRepository = new App\Repositories\GallaryProjectRepository;
        $gallaryProjectTypeRepository = new App\Repositories\GallaryProjectTypeRepository;
        $categories = $gallaryProjectTypeRepository->getAllTypes();
        $projects = $gallaryProjectRepository->getAllProjects(num: 10);
    @endphp

    <div class="container">
        <div class="list-control">
            <ul class="list-unstyled">
                <li class="active" data-filter="*">{{ __('main_trans.All') }}</li>
                @foreach ($categories as $category)
                <li data-filter=".{{$category->key}}">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
        <div id="portfolio-grid" class="row no-gutter">
            {{-- * without pagination --}}
            @foreach ($categories as $category)
                @foreach ($category->galleryProjects as $project)

                    <!-- Start Item -->
                    <div class="item {{$category->key}} col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                        <div class="zoom-gallery">
                            <a href="{{$project->image}}" class="item-wrap">
                                <i class='bx bx-search-alt'></i>
                                <img class="img-fluid" src="{{$project->image}}">
                            </a>
                        </div>
                    </div>
                    <!-- End Item -->

                @endforeach
            @endforeach
            {{-- * end without pagination --}}

            {{-- * with pagination --}}
            {{-- @foreach ($projects as $project)
                <!-- Start Item -->
                <div class="item {{$project->type->key}} col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <div class="zoom-gallery">
                        <a href="{{$project->image}}" class="item-wrap">
                            <i class='bx bx-search-alt'></i>
                            <img class="img-fluid" src="{{$project->image}}">
                        </a>
                    </div>
                </div>
                <!-- End Item -->
            @endforeach --}}
            {{-- * end with pagination --}}
        </div>
        {{-- * with pagination --}}
        {{-- {{$projects->links()}} --}}
        {{-- * end with pagination --}}
    </div>
</section>
<!-- End Portfolio -->
