<section id="projectsSection" class="faqs-pp">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 mt-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <p class="text-center" style="font-weight: 500;">{{ __('myprojects_trans.The projects') }}</p>
                        <ul class="list-unstyled" id="projectsStatus">
                            <li onclick="topbar.show()" wire:click='switchState()' style="cursor: pointer" class="@if(!$currentState) active @endif">
                                <a role="button">
                                    <i class='bx bxs-grid'></i>
                                    {{__('myprojects_trans.My projects')}}
                                </a>
                            </li>
                            @foreach ($projectStates as $state)
                            <li onclick="topbar.show()" wire:click='switchState({{$state}})'
                                class="@if($currentState && $state->id == $currentState->id) active @endif" style="cursor: pointer">
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

                    @if (count($projectsToDisplay))
                    @foreach ($projectsToDisplay as $project)
                    <a href="{{route('myProjects.show', $project->id)}}" data-turbo="false" class="job-post">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5">
                                <div class="job-title">
                                    <h5>{{$project->name}}</h5>
                                    <span class="job-id">
                                        @foreach ($project->categories as $category)
                                        <span class="badge badge-info">{{$category->name}}</span>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <div class="job-category">
                                    <span>{{$project->department()->name}}</span>
                                </div>
                                <div class="job-title">
                                    <span class="job-id"><span
                                            class="badge text-light badge-secondary">{{$project->state->name}}</span></span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="job-location">
                                    <i class="bx bx-alarm-add"></i>
                                    <span>{{date('M d Y, H:i a', strtotime($project->created_at))}}</span>
                                </div>
                                <div class="job-location">
                                    <i class="bx bx-alarm"></i>
                                    <span>{{date('M d Y, H:i a', strtotime($project->updated_at))}}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                    @else
                    <div class="job-post text-center" style="color: #4b3da7;">
                        <h6>لا توجد مشاريع في هذه الحالة</h6>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
</section>
