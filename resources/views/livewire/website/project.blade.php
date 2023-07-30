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
                            <h5 class="mb-3" style="justify-content: space-between;">
                                {{ __('project_trans.Project Price') }}
                                <span class="pCost">{{ $project->price }} {{ __('project_trans.SAR') }}</span>
                            </h5>

                            <div class="[mu-features]" style="margin-bottom: 15px;">
                                <p style="margin: 0px 0px 7px 0px !important;"><i class="bx bx-check"></i>{{
                                    __('project_trans.Free installation') }}</p>
                                <p style="margin: 0px 0px 7px 0px !important;"><i class="bx bx-check"></i>{{
                                    __('project_trans.Free domain') }}</p>
                                <p style="margin: 0px 0px 7px 0px !important;"><i class="bx bx-check"></i>{{
                                    __('project_trans.One month technical support') }}</p>
                            </div>

                            <h5>{{ __('project_trans.Plugins')}}</h5>
                            <div style="list-style-type: none;">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" mu-addon mu-cost="400" type="checkbox"
                                            id="addons" mu-id="1">
                                        <label class="form-check-label" for="addons">
                                            {{ __('project_trans.Maintenance and cyber security contract') }} (400) / {{
                                            __('project_trans.Monthly') }}
                                        </label>
                                    </div>
                                </li>
                            </div>

                            <div style="list-style-type: none;">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" mu-addon mu-cost="200" type="checkbox"
                                            id="addons2" mu-id="2">
                                        <label class="form-check-label" for="addons2">
                                            {{ __('project_trans.Auto coupons') }} (200) / {{
                                            __('project_trans.Monthly') }}
                                        </label>
                                    </div>
                                </li>
                            </div>

                            <a href="#" class="btn btn-block btn-icon btn-success mt-4 buyProject" mu-id="3"
                                style="text-align: center;" mu-notlogged="true">{{ __('project_trans.Buy Project') }}<i
                                    class="bx bx-cart-alt"></i></a>
                        </div>
                    </div>

                    <div class="sidebox sidebox-style">
                        <h5><i class="bx bx-share-alt"></i>{{ __('project_trans.Affiliate Marketing') }}</h5>
                        <div class="sidebox-inner txt-widget">
                            <p style="color: #4b3da7;margin: 0px 0px 15px 0px !important;">
                                <i class="bx bxs-dollar-circle" style="font-size: large;"></i>
                                {{ __('project_trans.Your commission is') }} ( {{ $project->price * 15/100 }} {{
                                __('project_trans.SAR') }}) {{ __('project_trans.per purchase') }}
                            </p>
                            <a class="bttn btn-purple createProjectPromo" mu-id="3" mu-notlogged="true" href>{{
                                __("project_trans.Create promo url") }}<i class="bx bx-money"></i>
                            </a>
                        </div>
                    </div>

                    <div class="sidebox sidebox-style gallery-container">
                        <h5><i class="bx bx-images"></i>معرض المشاريع</h5>
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

                    <div style="width: 40%;">
                        <a href="https://demo.ektml.com/4" target="_blank"
                            class="btn btn-block btn-icon btn-purple mt-4 justify-content-center"><i
                                class="bx bx-show"></i> عرض المثال</a>
                    </div>

                    <div class="post-txt">
                        <a class="post-title" href="#">{{ $project->name }}</a>
                        <ul class="list-unstyled post-details">
                            <li></li>
                            <li>{{ $project->created_at->diffForHumans() }}</li>
                            <li>{{ $project->likes->count() }} {{__('main_trans.Likes')}}</li>
                        </ul>

                        {!! $project->body !!}

                        <div class="footer-post">
                            <div class="tags">
                                <a href="#">{{ __('project_trans.coupon') }}</a>
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
</section>
