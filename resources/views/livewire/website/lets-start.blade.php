<section class="pricing-table">
    <div class="container">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
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
                        <button class="btn bttn btn-purple" wire:click='departmentCategories({{$department->id}})'>
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
                <div class="text-center">
                    <span class="text-muted">اختر فئة</span>
                    {{-- <span id="categoriesSelected">
                        <span class="badge badge-info">صور انفو جرافيك</span>
                    </span> --}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-md-4 m-auto">
                        <div class="counter @if(isset($categoryHasClass[$category->id])) active @endif" role="button"
                            wire:click='toggleActive({{$category->id}})'>
                            <div class="counter-icon">
                                <i class="{{$category->icon}}"></i>
                            </div>
                            <div class="price-value">
                                <span class="text-muted">تبدأ من</span>
                                <h6>{{$category->start_price}} <small>ريال</small></h6>
                            </div>
                            <h3>{{$category->name}}</h3>
                        </div>
                    </div>
                    @endforeach

                    <div class="col-md-12 text-center">
                        <div class="question-action mt-5">
                            <button class="btn bttn btn-info" wire:click='displayForm()'>
                                إختيار الفئات<i class="bx bx-left-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @elseif ($showForm)
        <div class="row justify-content-center">
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
                                                    maxlength="100" placeholder="إسم المشروع">
                                                <label for="field-1" class="floating-label">إسم المشروع</label>
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
                                                    placeholder="تفاصيل المشروع"></textarea>
                                                <label for="field-1" class="floating-label">تفاصيل المشروع</label>
                                            </div>
                                            @error('project.description')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="col-sm-12">
                                            <label for="inputAttachments">المرفقات:</label>
                                        </div>
                                    </div>

                                    <div id="attachments">
                                        @for ($i = 0; $i < $noFiles; $i++) <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <div class="floating-label-wrap">
                                                    <input wire:model='files.{{$i}}' type="file"
                                                        class="floating-label-field floating-label-field--s3"
                                                        id="attachInput{{$i}}" />
                                                    <label for="attachInput{{$i}}"
                                                        class="floating-label">{{ucwords(__('tickets_trans.attachment'))}}</label>
                                                </div>
                                            </div>
                                            @error('files')
                                            <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                    </div>
                                    @endfor

                                    <div class="form-group col-md-4">
                                        <div class="floating-label-wrap">
                                            <div class="form-buttons">
                                                <input wire:click='addBtn' type="button"
                                                    value="{{ucwords(__('tickets_trans.add attachment'))}}"
                                                    id="addAttachBtn">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 text-center">
                                    <div class="question-action">
                                        <button class="btn bttn btn-info" type="submit">
                                            إرسال الطلب <i class="bx bx-left-arrow-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
