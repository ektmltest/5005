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

                            <form wire:submit.prevent="addDeparment">
                                <div>
                                    @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="name_ar">
                                            @error("name_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="name_en">
                                            @error('name_en') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.PRICE') }}</label>
                                            <input type="text" class="form-control" wire:model="icon">
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.TAX') }}</label>
                                            <input type="text" class="form-control" wire:model="icon">
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.DEPARTMENT') }}</label>
                                            <select name="dept_id" class="form-control" id="" style="cursor: pointer">
                                                @foreach ($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.Addons') }}</label>
                                            <div class="form-control p-0 border-0">
                                                <select class="js-example-basic-multiple w-100" class="js-example-basic-multiple" name="addons[]" multiple="multiple" id="" style="cursor: pointer">
                                                    @foreach ($addons as $addon)
                                                    <option value="{{$addon->id}}">{{$addon->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.DEPARTMENT') }}</label>
                                            <select name="dept_id" class="form-control" id="" style="cursor: pointer">
                                                @foreach ($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.TAX') }}</label>
                                            <input type="text" class="form-control" wire:model="icon">
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">{{ __('dashboard_trans.LINK') }}</label>
                                        <input type="text" class="form-control" wire:model="icon">
                                        @error('icon') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC TAGS') }}</label>
                                            <div class="form-control p-0 border-0">
                                                <select name="" class="w-100 js-example-tags" multiple="multiple" id="" style="cursor: pointer">
                                                </select>
                                            </div>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH TAGS') }}</label>
                                            <div class="form-control p-0 border-0">
                                                <select name="" class="w-100 js-example-tags" multiple="multiple" id="" style="cursor: pointer">
                                                </select>
                                            </div>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC FACILITIES') }}</label>
                                            <div class="form-control p-0 border-0">
                                                <select name="" class="w-100 js-example-tags" multiple="multiple" id="" style="cursor: pointer">
                                                </select>
                                            </div>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH FACILITIES') }}</label>
                                            <div class="form-control p-0 border-0">
                                                <select name="" class="w-100 js-example-tags" multiple="multiple" id="" style="cursor: pointer">
                                                </select>
                                            </div>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.TAX') }}</label>
                                            <textarea type="text" class="form-control" rows="5" wire:model="icon"></textarea>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.TAX') }}</label>
                                            <textarea type="text" class="form-control" rows="5" wire:model="icon"></textarea>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">{{ __('dashboard_trans.TAX') }}</label>
                                        <textarea type="text" class="form-control description" wire:model="icon"></textarea>
                                        @error('icon') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">{{ __('dashboard_trans.TAX') }}</label>
                                        <textarea type="text" class="form-control description" wire:model="icon"></textarea>
                                        @error('icon') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info form-control">{{
                                    __('dashboard_trans.Add Section') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @push('custom-scripts')
        <script>
            $(document).ready(function() {
                $('.js-example-basic-multiple').select2();
                $('.js-example-tags').select2({
                    tags: true
                });

                tinymce.init({
                    selector: 'textarea.description',
                    height: 500,
                    plugins: "image fullscreen table",
                    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | indent outdent',
                    images_file_types: 'svg,webp,png,gif,jpg,jpeg,',
                    file_picker_types: 'file image media',
                });

                // $('textarea.description').tinymce({
                //     height: 500,
                //     // toolbar: 'image',
                // });
            });
        </script>
    @endpush

</div>
