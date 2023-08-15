<section class="pricing-table">
    <div class="container">
        @component('layouts.components.messages.success')
        @endcomponent

        @if ($showDepartments)
        <div class="section-pricing">
            <h3>{{ __('request_project_trans.bodyTitle')}}</h3>
            <p>{{ __('request_project_trans.bodysTitle')}}</p>
        </div>
        <div class="row justify-content-center">
            @foreach ($departments as $department)
            <!-- Start Price Item -->
            <div class="col-md-4 mb-3">
                <div class="price-item active">
                    <div class="table-ico">
                        <i class='{{$department->icon}}'></i>
                    </div>
                    <h4>{{$department->name}}</h4>
                    <div class="price-value">
                        <span>{{ $department->name . ' ' . __('request_project_trans.des1') }}</span>
                    </div>
                    <div class="price-details">
                        <ul class="list-unstyled">
                            @foreach ($department->categories as $category)
                            <li class="co-green"><i class="{{$category->icon}}"></i>{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="price-btn">
                        <button class="btn bttn btn-purple" onclick="topbar.show()" wire:click='departmentCategories({{$department->id}})'>
                            {{ __('request_project_trans.Choose the section') }}
                        </button>
                    </div>
                </div>
            </div>
            <!-- End Price Item -->
            @endforeach
        </div>
        @elseif ($showCategories)
        <div class="section-pricing">
            <h3>{{ __('request_project_trans.bodyTitle')}}</h3>
            <p>{{ __('request_project_trans.bodysTitle')}}</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
                <button onclick="topbar.show()" class="btn gobackbtn bttn text-dark border" wire:click='displayBack(true, false, false)'>
                    <i class="bx bx-right-arrow-alt"></i> {{strtoupper(__('translation_trans.btn - back'))}}
                </button>
                <div class="text-center">
                    <span class="text-muted">{{ucwords(__('dashboard_trans.categories'))}}:</span>
                    <span id="categoriesSelected">
                        @foreach ($categoryNames as $name)
                        <span class="badge badge-info">{{$name}}</span>
                        @endforeach
                    </span>
                    @error('selectCategory')
                    <div class="text-danger">
                        * {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4 m-auto">
                        <div onclick="topbar.show()" class="counter @if(isset($categoryActive[$category->id])) active @endif" role="button"
                            wire:click='toggleActive({{$category->id}}, "{{$category->name}}")' style="cursor: pointer;">
                            <div class="counter-icon">
                                <i class="{{$category->icon}}"></i>
                            </div>
                            <div class="price-value">
                                <span class="text-muted">{{ucwords(__('dashboard_trans.START PRICE'))}}</span>
                                <h6>{{$category->start_price}} <small>{{__('home_trans.SAR')}}</small></h6>
                            </div>
                            <h3>{{$category->name}}</h3>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-md-12 text-center">
                        <div class="question-action mt-5">
                            <button class="btn bttn btn-info" onclick="topbar.show()" wire:click='displayForm()'>
                                {{__('main_trans.NEXT')}}<i class="bx bx-left-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif ($showForm)
        <div class="row justify-content-center">
            <div class="col-md-12 mb-3">
                <button class="btn gobackbtn bttn text-dark border" onclick="topbar.show()" wire:click='displayBack(false, true, false)'>
                    <i class="bx bx-right-arrow-alt"></i> {{strtoupper(__('translation_trans.btn - back'))}}
                </button>
            </div>
            <div class="col-md-8">
                <div class="container">
                    <div class="form-inner">
                        <div class="form-side">
                            <div class="section-pricing">
                                <h3>{{ __('request_project_trans.bodyTitle')}}</h3>
                                <p>{{ __('request_project_trans.bodysTitle')}}</p>
                            </div>
                            <form wire:submit.prevent='submit'>
                                <div class="row">
                                    <div class="col-xl-12 col-md-6">
                                        <div class="form-group">
                                            <div class="floating-label-wrap">
                                                <input wire:model='project.name' type="text"
                                                    class="floating-label-field floating-label-field--s3"
                                                    maxlength="100" placeholder="{{ucwords(__('myprojects_trans.project name'))}}">
                                                <label for="field-1" class="floating-label">{{ucwords(__('myprojects_trans.project name'))}}</label>
                                            </div><!-- .floating-label-wrap -->
                                            @error('project.name')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group">
                                            <div class="floating-label-wrap">
                                                <textarea wire:model='project.description'
                                                    class="floating-label-field floating-label-field--s3" rows="15"
                                                    placeholder="{{ucwords(__('myprojects_trans.project details'))}}"></textarea>
                                                <label for="field-1" class="floating-label">{{ucwords(__('myprojects_trans.project details'))}}</label>
                                            </div>
                                            @error('project.description')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="col-sm-12">
                                            <label for="inputAttachments">{{__('myprojects_trans.attachments')}}:</label>
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        @for ($i = 0; $i < $noFiles; $i++)
                                            <div class="form-group col-xl-12 mt-5">
                                                <div class="floating-label-wrap">
                                                    <input wire:model='files.{{$i}}' type="file"
                                                        class="floating-label-field floating-label-field--s3"
                                                        id="attachInput{{$i}}" />
                                                    <label for="attachInput{{$i}}"
                                                        class="floating-label">{{ucwords(__('tickets_trans.attachment'))}}</label>
                                                </div>
                                            </div>
                                            @error("files.$i")
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        @endfor
                                    </div>

                                    <div class="form-group col-md-4">
                                        <div class="floating-label-wrap">
                                            <div class="form-buttons">
                                                <input onclick="topbar.show()" wire:click='addBtn' type="button"
                                                    value="{{ucwords(__('tickets_trans.add attachment'))}}"
                                                    id="addAttachBtn">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 text-center">
                                        <div class="question-action">
                                            <button onclick="topbar.show()" class="btn bttn btn-info" type="submit">
                                                {{__('home_trans.Submit')}} <i class="bx bx-left-arrow-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        Something Went Wrong
        @endif
    </div>
</section>
