<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{
                                        __('dashboard_trans.Catalog') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Add Project') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('dashboard_trans.Add Project') }}</h4>

                            <form wire:submit.prevent="submit">

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC NAME') }}</label>
                                            <input dir="ltr" type="text" class="form-control"
                                                wire:model="project.name_ar">
                                            @error("project.name_ar") <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH NAME') }}</label>
                                            <input dir="ltr" type="text" class="form-control"
                                                wire:model="project.name_en">
                                            @error('project.name_en') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.PRICE') }}</label>
                                            <input dir="ltr" type="number" class="form-control"
                                                wire:model="project.price">
                                            @error('project.price') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.TAX') }}</label>
                                            <input dir="ltr" type="number" class="form-control"
                                                wire:model="project.tax">
                                            @error('project.tax') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.DEPARTMENT') }}</label>
                                            <select class="form-control" id="" style="cursor: pointer"
                                                wire:model='project.dept_id'>
                                                @foreach ($departments as $department)
                                                <option value="{{$department->id}}" @if($loop->first) selected
                                                    @endif>{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('project.dept_id') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.Addons') }}</label>
                                            <div class="form-control p-0 border-0">
                                                <select wire:ignore class="js-example-basic-multiple w-100"
                                                    class="js-example-basic-multiple" name="addons_ids"
                                                    multiple="multiple" id="" style="cursor: pointer">
                                                    @foreach ($addons as $addon)
                                                    <option value="{{$addon->id}}">{{$addon->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('addons_ids') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.LINK') }}</label>
                                            <input dir="ltr" type="text" class="form-control" wire:model="project.link">
                                            @error('project.link') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.FACILITIES') }}</label>
                                            <div class="form-control p-0 border-0">
                                                <select wire:ignore class="js-example-basic-multiple w-100"
                                                    name="facilities_ids" multiple="multiple" id=""
                                                    style="cursor: pointer">
                                                    @foreach ($facilities as $facility)
                                                    <option value="{{$facility->id}}">{{$facility->description}}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('facilities_ids') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">{{ __('dashboard_trans.TAGS') }}</label>
                                        <div class="form-control p-0 border-0">
                                            <select wire:ignore name="tags_ids" class="w-100 js-example-basic-multiple"
                                                multiple="multiple" id="" style="cursor: pointer">
                                                @foreach ($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('tags_ids') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC SHORT DESCRITPION')
                                                }}</label>
                                            <textarea type="text" class="form-control" rows="5"
                                                wire:model="project.short_desc_ar"></textarea>
                                            @error('project.short_desc_ar') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH SHORT DESCRITPION')
                                                }}</label>
                                            <textarea type="text" class="form-control" rows="5"
                                                wire:model="project.short_desc_en"></textarea>
                                            @error('project.short_desc_en') <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4" wire:ignore>
                                    <div class="mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">{{ __('dashboard_trans.ARABIC DESCRITPION') }}</label>
                                        <textarea type="text" class="form-control description" id="desc_ar"></textarea>
                                    </div>
                                </div>
                                <span class="error">
                                    @error('desc_ar') {{ $message }} @enderror
                                </span>

                                <div class="row mt-4" wire:ignore>
                                    <div class="mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">{{ __('dashboard_trans.ENGLISH DESCRITPION')
                                            }}</label>
                                        <textarea type="text" class="form-control description" id="desc_en"></textarea>
                                    </div>
                                </div>
                                <span class="error">
                                    @error('desc_en') {{ $message }} @enderror
                                </span>

                                <div class="row mt-4">
                                    <div class="col-lg-6 mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">
                                            {{ __('dashboard_trans.ADD PHOTO') }}
                                        </label>
                                        <input class="form-control" oninput="topbar.show();" type="file" wire:model='image' />
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div id="profile-image-spinner" wire:loading class="spinner-border spinner-border-sm text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                <button wire:loading.attr='disabled' type="submit" class="btn btn-info">{{
                                    __('dashboard_trans.ADD') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- <input type="hidden" id="test" wire:model='project.test'> --}}

    @push('custom-scripts')
    <script>
        $(document).ready(function() {
                $('.js-example-basic-multiple').select2();

                tinymce.init({
                    selector: 'textarea.description',
                    height: 500,
                    plugins: "image fullscreen table textcolor fontsize",
                    toolbar: 'undo redo | blocks | bold italic | forecolor backcolor | fontselect fontsizeselect | alignleft aligncenter alignright alignjustify | indent outdent',
                    images_file_types: 'svg,webp,png,gif,jpg,jpeg,',
                    file_picker_types: 'file image media',
                    setup: (editor) => {
                        editor.on('init change', function () {
                            editor.save();
                        });
                        editor.on('change', (e) => {
                            // console.log(editor.id);
                            Livewire.emit('dataChanged', editor.id, editor.getContent());
                        });
                    }
                });

                $('.js-example-basic-multiple').each((i, elem) => {
                    $(elem).on('change', function (e) {
                        var data = $($('.js-example-basic-multiple')[i]).select2("val");
                        // document.getElementById('test').value = data;
                        // console.log(document.getElementById('test').value);
                        Livewire.emit('dataChanged', $('.js-example-basic-multiple')[i].getAttribute('name'), data);

                        // document.cookie = $('.js-example-basic-multiple')[i].getAttribute('name') + " = " + data;
                        // {{extract($_COOKIE)}}

                        // $.ajax({
                        //     url: window.location.href + "?" + $('.js-example-basic-multiple')[i].getAttribute('name') + '=' + data,
                        //     success: () => {;}
                        // });
                        // @this.set($('.js-example-basic-multiple')[i].getAttribute('name'), data);
                    });
                });

                window.addEventListener('myevent', () => {
                    $('.js-example-basic-multiple').select2();
                });
            });
    </script>
    @endpush

    @if (session()->has('message'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{app()->getLocale() == "en" ? "Done" : "تم"}}',
                text: "{{ session('message') }}",
            }).then((result) => {
                if (result.isConfirmed || result.isDismissed) {
                    window.location = window.location.href.split("?")[0];
                }
            })
        </script>
    @endif

    {{-- @php
    if(!empty(request()->all())) {
    $data = request()->all();
    foreach($data as $key => $val) {
    $data[$key] = explode(',', $val);
    }
    extract($data);
    }
    @endphp --}}

</div>
