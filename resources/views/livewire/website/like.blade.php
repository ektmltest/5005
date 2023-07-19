<div>
    <div id="portfolio-grid" class="row no-gutter">
        @foreach ($ready_projects as $project)
        <div class="item prj-{{$project->department->id}} col-md-4 col-12 mb-4" style="max-height: 400px">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" mu-open mu-link="/prj/1" style="border-radius: 16px; cursor: pointer; width:100%;
                    height:200px;
                    object-fit:cover;
                    object-position:50% 50%;"
                        src="{{ $project->image }}" alt>
                </div>

                <div class="post-txt">
                    <a class="post-title" href="{{ route('project', $project->id) }}">{{ $project->name }}</a>
                    <ul class="list-unstyled post-details">
                        <li></li>
                        <li>{{ $project->created_at->diffForHumans() }}</li>
                        <li>{{ $project->likes->count() }} {{ __('main_trans.Likes')}}</li>
                    </ul>
                    <p>{{ $project->description }}</p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="{{ route('project', $project->id) }}">
                                {{ $project->price }} {{ __('home_trans.SAR') }}
                            </a>
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
