<section id="blog-pp" class="blog-pp single-pp">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-sm-12 order-2 order-lg-1">
                <div class="blog-sidebar">

                    <div class="sidebox social-share">
                        <div class="row no-gutters">
                            <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                                <a target="_blank" href="{{$socials->where('key', 'facebook')->first()->link}}" class="bg-fb">
                                    <div class="name-icon">
                                        <i class="bx bxl-facebook"></i>
                                        <span>{{ __('project_trans.Facebook') }}</span>
                                    </div>
                                    <span class="count">235 +</span>
                                </a>
                            </div>

                            <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                                <a target="_blank" href="{{$socials->where('key', 'twitter')->first()->link}}" class="bg-tw">
                                    <div class="name-icon">
                                        <i class="bx bxl-twitter"></i>
                                        <span>{{ __('project_trans.Twitter') }}</span>
                                    </div>
                                    <span class="count">255 +</span>
                                </a>
                            </div>

                            <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                                <a target="_blank" href="{{$socials->where('key', 'instagram')->first()->link}}" class="bg-insta">
                                    <div class="name-icon">
                                        <i class="bx bxl-instagram"></i>
                                        <span>{{ __('project_trans.Instagram') }}</span>
                                    </div>
                                    <span class="count">878 +</span>
                                </a>
                            </div>

                            <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                                <a target="_blank" href="{{$socials->where('key', 'telegram')->first()->link}}" class="bg-linked">
                                    <div class="name-icon">
                                        <i class="bx bxl-telegram"></i>
                                        <span>{{ __('project_trans.Telegram') }}</span>
                                    </div>
                                    <span class="count">332 +</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="sidebox sidebox-style">
                        <h5><i class="bx bx-cart-alt"></i>{{ __('project_trans.Buy Project') }}</h5>
                        <div class="sidebox-inner newsletter">
                            @if ($project->isOffered())
                            <div class="mb-3">
                                <h5 class="text-danger">
                                    {{ __('project_trans.Project Price Without Offers') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" style="transform: scaleX(-1); fill: #dc3545" height="0.75em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M350 334.5c3.8 8.8 2 19-4.6 26l-136 144c-4.5 4.8-10.8 7.5-17.4 7.5s-12.9-2.7-17.4-7.5l-136-144c-6.6-7-8.4-17.2-4.6-26s12.5-14.5 22-14.5h88l0-192c0-17.7-14.3-32-32-32H32C14.3 96 0 81.7 0 64V32C0 14.3 14.3 0 32 0l80 0c70.7 0 128 57.3 128 128l0 192h88c9.6 0 18.2 5.7 22 14.5z"/></svg>
                                </h5>

                                <h5 class="text-danger">
                                    <s class="pCost">{{ $project->original_price }} {{ __('project_trans.SAR') }}</s>
                                </h5>
                            </div>
                            @endif

                            @if (request()->route('token'))
                            <div class="mb-3">
                                <h5 class="text-danger">
                                    {{ __('project_trans.Project Price Without Coupon') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" style="transform: scaleX(-1); fill: #dc3545" height="0.75em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M350 334.5c3.8 8.8 2 19-4.6 26l-136 144c-4.5 4.8-10.8 7.5-17.4 7.5s-12.9-2.7-17.4-7.5l-136-144c-6.6-7-8.4-17.2-4.6-26s12.5-14.5 22-14.5h88l0-192c0-17.7-14.3-32-32-32H32C14.3 96 0 81.7 0 64V32C0 14.3 14.3 0 32 0l80 0c70.7 0 128 57.3 128 128l0 192h88c9.6 0 18.2 5.7 22 14.5z"/></svg>
                                </h5>

                                <h5 class="text-danger">
                                    <s class="pCost">{{ $project->price }} {{ __('project_trans.SAR') }}</s>
                                </h5>
                            </div>
                            @endif

                            <div class="mb-3">
                                <h5>
                                    {{ __('project_trans.Project Price') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" style="transform: scaleX(-1); fill: #4b3da7;" height="0.75em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M350 334.5c3.8 8.8 2 19-4.6 26l-136 144c-4.5 4.8-10.8 7.5-17.4 7.5s-12.9-2.7-17.4-7.5l-136-144c-6.6-7-8.4-17.2-4.6-26s12.5-14.5 22-14.5h88l0-192c0-17.7-14.3-32-32-32H32C14.3 96 0 81.7 0 64V32C0 14.3 14.3 0 32 0l80 0c70.7 0 128 57.3 128 128l0 192h88c9.6 0 18.2 5.7 22 14.5z"/></svg>
                                    <div id="profile-image-spinner" wire:loading wire:target='checkAddon' class="spinner-border spinner-border-sm text-primary" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </h5>

                                <h5>
                                    <span class="pCost">{{ $price }} {{ __('project_trans.SAR') }}</span>
                                </h5>
                            </div>

                            <div class="[mu-features]" style="margin-bottom: 15px;">
                                @forelse ($project->facilities as $facility)
                                <p style="margin: 0px 0px 7px 0px !important;">
                                    <i class="bx bx-check"></i>
                                    {{$facility->description}}
                                </p>
                                @empty
                                <p style="margin: 0px 0px 7px 0px !important;">
                                    {{__('project_trans.no facilities for this project')}}
                                </p>
                                @endforelse
                            </div>

                            <h5>{{ __('project_trans.Plugins')}}</h5>

                            <form autocomplete="off">
                            @foreach ($project->addons as $addon)
                            <div style="list-style-type: none;">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            id="addons-{{$addon->id}}"
                                            onclick="topbar.show();"
                                            wire:change='checkAddon({{$addon->id}})'>
                                        <label class="form-check-label" for="addons-{{$addon->id}}">
                                            {{$addon->name}} ({{$addon->price}}) / {{$addon->type->name}}
                                        </label>
                                    </div>
                                </li>
                            </div>
                            @endforeach
                            </form>

                            <a id="buy-btn"
                                wire:loading.class='disabled'
                                class="text-light btn btn-block btn-icon btn-success mt-4 text-center">
                                {{ __('project_trans.Buy Project') }}
                                <i class="bx bx-cart-alt"></i>
                            </a>

                            <input type="hidden"
                                id="actual-buy-btn"
                                wire:click='buy'>
                        </div>
                    </div>

                    @auth
                    @if (auth()->user()->isMarketer())
                    <div class="sidebox sidebox-style">
                        <h5><i class="bx bx-share-alt"></i>{{ __('project_trans.Affiliate Marketing') }}</h5>
                        <div class="sidebox-inner txt-widget">
                            <p style="color: #4b3da7;margin: 0px 0px 15px 0px !important;">
                                <i class="bx bxs-dollar-circle" style="font-size: large;"></i>
                                {{ __('project_trans.Your commission is') }} ( {{ $project->marketing_commission }} {{
                                __('project_trans.SAR') }}) {{ __('project_trans.per purchase') }}
                            </p>

                            @if (auth()->user()->hasPromotionToken())
                            <div class="copy-clipboard p-0 d-inline-block btn">
                                <span class="d-none">
                                    {{route('affiliate.project', [auth()->user()->promotion_token, $project->id])}}
                                </span>
                                {{__('profile_trans.click to copy promotion url')}}
                                <i class="bx bx-clipboard btn btn-light rounded-circle p-1"></i>
                            </div>
                            @else
                            <a class="bttn btn-purple createPromoCode mt-2 text-light btn" onclick="topbar.show()" wire:click='createPromotionToken'>
                                {{ __('profile_trans.Create Promotion Url') }} <i class="bx bx-wallet"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endauth

                    <div class="sidebox sidebox-style gallery-container">
                        <h5><i class="bx bx-images"></i>{{__('project_trans.Projects Gallery')}}</h5>
                        <div class="sidebox-inner gallery">
                            <div class="gallery-feed">
                                @foreach($galleries as $gallary)
                                <a href="{{ $gallary->image }}" target="_blank" class="">
                                    <i class="bx bx-search-alt"></i>
                                    <img style="object-fit: cover" src="{{ $gallary->image }}" alt="Business Blog">
                                </a>
                                @endforeach
                            </div>

                            <div class="text-center">
                                <a class="bttn btn-purple" href="{{route('gallary')}}">{{__('home_trans.more Details')}}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-8 col-sm-12 order-1 order-lg-2">
                <div class="post-item">
                    <div class="post-img mb-4">
                        <img class="img-fluid" src="{{ $project->image }}" alt="">
                    </div>

                    <div style="width: 40%;" class="mb-3">
                        <a href="{{ $project->link }}" target="_blank"
                            class="bttn btn-block btn-icon btn-purple mt-4 justify-content-center"><i
                                class="bx bx-show"></i> {{ucwords(__('project_trans.show example'))}}</a>
                    </div>

                    <div class="post-txt">
                        <a class="post-title" href="#">{{ $project->name }}</a>
                        @if ($project->isOffered())
                        <span id="offered-badge" class="post-title badge text-light bg-danger font-weight-bolder">{{ucwords(__('store_trans.offered'))}}!</span>
                        @endif
                        <ul class="list-unstyled post-details mt-2">
                            <li></li>
                            <li>{{ $project->created_at->diffForHumans() }}</li>
                            <li>{{ $project->likes->count() }} {{__('main_trans.Likes')}}</li>
                        </ul>

                        <div class="mb-3 mt-3">
                            {!! $project->body !!}
                        </div>

                        <div class="footer-post">
                            <div class="tags">
                                @foreach ($project->tags as $tag)
                                <a>{{$tag->name}}</a>
                                @endforeach
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

                    <div class="pagi-post">
                        <a @if($previous) href="{{route('project', $previous)}}" @endif class="prev-post">
                            <p @if(!$previous) class='text-secondary' @endif>
                                <i class="bx bx-right-arrow"></i>
                                {{ __('project_trans.PREVIOUS PROJECT') }}
                            </p>
                        </a>
                        <a @if($next) href="{{route('project', $next)}}" @endif class="next-post">
                            <p @if(!$next) class='text-secondary' @endif>
                                {{ __('project_trans.NEXT PROJECT') }}
                                <i class="bx bx-left-arrow"></i>
                            </p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('buy-btn').addEventListener('click', () => {
            Swal.fire({
                title: "{{ucwords(__('messages.are you sure?'))}}",
                showCancelButton: true,
                confirmButtonText: "{{ucwords(__('messages.yes'))}}",
                cancelButtonText: "{{ucwords(__('messages.no'))}}",
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    topbar.show();
                    document.getElementById('actual-buy-btn').click();
                }
            })
        });
    </script>
</section>
