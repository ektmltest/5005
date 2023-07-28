<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="list-control">
            <ul class="list-unstyled" style="flex-wrap: wrap">
                <li onclick="topbar.show()" class="@if($active == 0) active @endif" wire:click='activate(0)'>{{ __('store_trans.All') }}</li>
                @foreach ($categories as $category)
                <li onclick="topbar.show()" class="@if($active == $category->id) active @endif" wire:click='activate({{$category->id}})'>{{$category->name}}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <div id="portfolio-grid" class="row no-gutter">
                @foreach ($projects as $project)
                <!-- Start Item -->
                <div class="item col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
                    <div class="zoom-gallery">
                        <a href="{{$project->image}}" class="item-wrap">
                            <i class='bx bx-search-alt'></i>
                            <img class="img-fluid" src="{{$project->image}}">
                        </a>
                    </div>
                </div>
                <!-- End Item -->
                @endforeach
            </div>

            @if ($projects->count() < $max_count)
            <div class="text-center mt-3">
                <a onclick="topbar.show()" style="cursor: pointer" class="bttn btn-purple text-light" wire:click='loadMore'>
                    {{__('main_trans.load more')}}
                </a>
            </div>
            @endif
        </div>

    </div>
</section>
