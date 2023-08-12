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
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC TITLE') }}</label>
                                            <input dir="ltr" type="text" class="form-control" wire:model="new.title_ar">
                                            @error("new.title_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH TITLE') }}</label>
                                            <input dir="ltr" type="text" class="form-control" wire:model="new.title_en">
                                            @error('new.title_en') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.SLUG') }}</label>
                                            <input dir="ltr" type="text" class="form-control" wire:model="new.slug">
                                            @error('new.slug') <span class="error">{{ $message }}</span> @enderror
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
                                        <label class="form-label">{{ __('dashboard_trans.ENGLISH DESCRITPION') }}</label>
                                        <textarea type="text" class="form-control description" id="desc_en"></textarea>
                                    </div>
                                </div>
                                <span class="error">
                                    @error('desc_en') {{ $message }} @enderror
                                </span>

                                <div class="row mt-4">
                                    <div class="col-lg-6 mb-3 mt-3 mt-lg-0">
                                        <label class="form-label">{{ __('dashboard_trans.ADD PHOTO') }}</label>
                                        <input class="form-control" type="file" wire:model='image' />
                                        @error('image') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info">{{
                                    __('dashboard_trans.ADD') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- <input type="hidden" id="test" wire:model='test'> --}}

    @push('custom-scripts')
    <script>
        $(document).ready(function() {
                tinymce.init({
                    selector: 'textarea.description',
                    height: 500,
                    plugins: "image fullscreen table textcolor",
                    toolbar: 'undo redo | blocks | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | indent outdent',
                    images_file_types: 'svg,webp,png,gif,jpg,jpeg,',
                    file_picker_types: 'file image media',
                    setup: (editor) => {
                        editor.on('change', function () {
                            editor.save();
                        });
                        editor.on('init', function (e) {
                            editor.save();
                            if (editor.id == 'desc_ar')
                                editor.setContent(`{!! $complex_data['desc_ar'] !!}`);
                            else if (editor.id == 'desc_en')
                                editor.setContent(`{!! $complex_data['desc_en'] !!}`);
                        });
                        editor.on('change', (e) => {
                            // console.log(editor.id);
                            Livewire.emit('dataChanged', editor.id, editor.getContent());
                        });
                    }
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

    @if (session()->has('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{app()->getLocale() == "en" ? "Error" : "خطأ"}}',
                text: "{{ session('error') }}",
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
