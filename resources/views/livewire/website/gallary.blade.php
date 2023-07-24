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
            <ul class="list-unstyled" style="flex-wrap: wrap">
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
