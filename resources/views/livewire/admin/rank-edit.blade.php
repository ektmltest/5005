<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{
                                        __('dashboard_trans.PUBLIC SYSTEMS') }}</a></li>
                                <li class="breadcrumb-item"><a class="text-primary" href="{{route('ranks.index')}}">{{ __('dashboard_trans.Roles management') }}</a>
                                </li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.Edit') }}
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
                            <h4 class="card-title">{{ __('dashboard_trans.Edit') }}</h4>

                            <form wire:submit.prevent="submit">

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC NAME') }}</label>
                                            <input dir="ltr" type="text" class="form-control" wire:model="data.name_ar">
                                            @error("data.name_ar") <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH NAME') }}</label>
                                            <input dir="ltr" type="text" class="form-control" wire:model="data.name_en">
                                            @error('data.name_en') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.PRIORITY') }}</label>
                                            <input dir="ltr" type="number" class="form-control" wire:model="data.priority">
                                            @error('data.priority') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.TYPE') }}</label>
                                            <select wire:model='data.type' class="form-control">
                                                <option value="none">-- {{__('dashboard_trans.TYPE')}} --</option>
                                                @foreach ($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('data.type') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <a href="{{ route('ranks.permissions', $rank->id) }}" class="text-danger">{{__('dashboard_trans.edit permissions')}}</a>
                                </div>

                                <button type="submit" class="btn btn-info">{{
                                    __('dashboard_trans.EDIT') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

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

</div>
