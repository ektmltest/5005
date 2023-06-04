<section id="projectsSection" class="faqs-pp">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 mt-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <p class="text-center" style="font-weight: 500;">{{ __('myprojects_trans.The projects') }}</p>
                        <ul class="list-unstyled" id="projectsStatus">
                            @foreach ($projectStates as $state)
                            <li wire:click='switchState({{$state}})' class="@if($state->id == $currentState->id) active @endif" id="0">
                                <a role="button">
                                    <i class='{{$state->icon}}'></i>
                                    {{ $state->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="col-xl-9 col-lg-4">
                <div class="vacan-posts">
                    @foreach ($currentState->projects as $project)
                        <a href="#">
                            <div class="job-post text-center" style="color: #4b3da7;">
                                <h6>
                                    <div class="email-list-item email-list-item--unread">
                                        <a class="email-list-detail">
                                            <div>
                                                <p class="msg text-center">
                                                    {{ __('myprojects_trans.there is no Projects in this status') }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </h6>
                            </div>
                        </a>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

</section>
