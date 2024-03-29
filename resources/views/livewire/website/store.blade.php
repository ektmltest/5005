<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="list-control">
            <ul class="list-unstyled" style="flex-wrap: wrap">
                <li onclick="topbar.show()" class="@if($active == 0) active @endif" wire:click='activate(0)'>{{
                    __('store_trans.All') }}</li>
                @foreach ($departments as $department)
                <li onclick="topbar.show()" class="@if($active == $department->id) active @endif"
                    wire:click='activate({{$department->id}})'>{{$department->name}}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <div class="row no-gutter">
                @foreach ($ready_projects as $project)
                <div class="item prj-{{$project->department->id}} col-md-4 col-12 mb-4" style="max-height: 400px">
                    <div class="post-item">
                        <div class="post-img">
                            <img class="img-fluid"
                                mu-open
                                mu-link="{{ $this->prepareProjectRoute($project->id) }}"
                                style="border-radius: 16px; cursor: pointer; width:100%;
                                    height:200px;
                                    object-fit:cover;
                                    object-position:50% 50%;"
                                src="{{ $project->image }}" alt>
                        </div>

                        <div class="post-txt">
                            <div class="">
                                <a class="post-title"
                                    href="{{ $this->prepareProjectRoute($project->id) }}">
                                    {{ $project->name }}
                                </a>
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
                                    <a href="{{ $this->prepareProjectRoute($project->id) }}">
                                        <s>{{ $project->original_price }}</s> {{ $project->price }} {{ __('home_trans.SAR') }}
                                    </a>
                                    @else
                                    <a href="{{ $this->prepareProjectRoute($project->id) }}">
                                        {{ $project->price }} {{ __('home_trans.SAR') }}
                                    </a>
                                    @endif
                                </div>

                                @auth
                                <div class="action-post" wire:key='divLike'>
                                    <a onclick="topbar.show()" style="cursor: pointer"
                                        wire:click="toggleLike({{$project}})">
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

            @if ($ready_projects->count() < $max_count) <div class="text-center mt-3">
                <a onclick="topbar.show()" style="cursor: pointer" class="bttn btn-purple text-light"
                    wire:click='loadMore'>
                    {{__('main_trans.load more')}}
                </a>
        </div>
        @endif
    </div>

    </div>
</section>
