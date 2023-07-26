<section id="blog-pp" class="blog-pp single-pp">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <!-- Start Post -->
                <div class="post-item">
                    <div class="post-img">
                        <img class="img-fluid" src="{{$new->image}}" alt="Not found">
                    </div>
                    <div class="post-txt">
                        <a class="post-title" href="">{{ $new->title }}</a>
                        <ul class="list-unstyled post-details">
                            <li>{{ $new->user->full_name }}</li>
                            <li>{{ $new->created_at->diffForHumans() }}</li>
                        </ul>
                        {!! $new->body !!}
                    </div>
                    <div class="pagi-post">
                        @if ($previous)
                        <a role="button" style="cursor: pointer" onclick="topbar.show()" wire:click='goToPrevious' class="prev-post">
                            <p><i class="bx bx-right-arrow"></i> {{__('main_trans.PREVIOUS')}}</p>
                            <h6>{{ $previous->title }}</h6>
                        </a>
                        @else
                        <a class="prev-post">
                            <p class="text-secondary"><i class="bx bx-right-arrow"></i> {{__('main_trans.PREVIOUS')}}</p>
                        </a>
                        @endif


                        @if ($next)
                        <a role="button" style="cursor: pointer" onclick="topbar.show()" wire:click='goToNext' class="next-post">
                            <p>{{__('main_trans.NEXT')}} <i class="bx bx-left-arrow"></i> </p>
                            <h6>{{ $next->title }}</h6>
                        </a>
                        @else
                        <a class="next-post text-secondary">
                            <p>{{__('main_trans.NEXT')}} <i class="bx bx-left-arrow"></i> </p>
                        </a>
                        @endif
                    </div>
                    <!-- Comments -->


                </div>
                <!-- End Post -->
            </div>
        </div>
    </div>

    @push('custom-scripts')
    <script>
        window.addEventListener('uri:changed', function (e) {
            var slug = e.detail.new_slug;
            window.history.pushState({}, '', slug);
        });
    </script>
    @endpush
</section>
