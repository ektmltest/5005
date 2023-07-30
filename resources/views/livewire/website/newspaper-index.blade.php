<section class="blog">
    <div class="container">

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

        @if ($news->count() < $max_count)
        <div class="text-center mt-3">
            <a onclick="topbar.show()" style="cursor: pointer" class="bttn btn-purple text-light" wire:click='loadMore'>
                {{__('main_trans.load more')}}
            </a>
        </div>
        @endif
    </div>
</section>
