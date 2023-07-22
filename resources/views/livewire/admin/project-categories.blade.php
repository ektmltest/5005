<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{
                                        __('dashboard_trans.PROJECTS SYSTEM') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('dashboard_trans.PROJECTS CATEGORIES') }}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div><!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card checkout-order-summary">

                        <div class="table-responsive mb-2">
                            <table class="table table-centered table-nowrap mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('dashboard_trans.ARABIC NAME') }}</th>
                                        <th>{{ __('dashboard_trans.ENGLISH NAME') }}</th>
                                        <th>{{ __('dashboard_trans.BELONGS TO') }}</th>
                                        <th>{{ __('dashboard_trans.START PRICE') }}</th>
                                        <th>{{ __('dashboard_trans.ACTION') }}</th>
                                    </tr>
                                </thead>

                                @foreach ($categories as $category)
                                <tbody>
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->nameLocale('ar') }}</td>
                                        <td>{{ $category->nameLocale('en') }}</td>
                                        <td>{{ $category->department->name }}</td>
                                        <td>{{ round($category->start_price, 2) }}</td>

                                        <td>
                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.SHOW')}}">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#show_category{{$category->id}}"><i
                                                        class="fa fa-eye"></i></button>
                                            </div>

                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.EDIT')}}">
                                                <button type="button" class="btn btn-primary btn-sm"
                                                    wire:click="updateMode({{ $category->id }})"><i
                                                        class="fa fa-edit"></i></button>
                                            </div>

                                            <div class="d-inline-block" data-bs-toggle="tooltip" data-placement="top"
                                                title="{{__('dashboard_trans.DELETE')}}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="deleteMode({{ $category->id }})"><i
                                                        class="fa fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- show -->
                                <div class="modal fade p-0" id="show_category{{ $category->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
                                    <div class="modal-dialog p-0">
                                        <div class="modal-content card border-0">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{
                                                    __('dashboard_trans.SHOW') . " Category: $category->id" }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="topbar.show()" wire:click='resetAction'
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.ARABIC NAME') }}</label>
                                                        <div class="pt-3 pb-3">{{$category->nameLocale('ar')}}</div>
                                                    </div>

                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.ENGLISH NAME') }}</label>
                                                        <div class="pt-3 pb-3">{{$category->nameLocale('en')}}</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.BELONGS TO') . ' ' . __('dashboard_trans.DEPARTMENT') }}</label>
                                                        <div class="pt-3 pb-3">{{$category->department->name}}</div>
                                                    </div>

                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.START PRICE') }}</label>
                                                        <div class="pt-3 pb-3">{{$category->start_price}}</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{ __('dashboard_trans.ICON') }} <i class="bx bx-{{$category->icon}}"></i></label>
                                                        <div class="pt-3 pb-3">{{$category->icon}}</div>
                                                    </div>

                                                    <div class="col-lg-6 mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{ __('dashboard_trans.ICON UNICODE') }}</label>
                                                        <div class="pt-3 pb-3">{{$category->unicode}}</div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.COLOR') }}</label>
                                                        <div class="pt-3 pb-3"><span class="badge bg-{{$category->color}}">{{$category->color}}</span></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label for="message-text" class="text-primary col-form-label">{{
                                                            __('dashboard_trans.CREATED AT') }}</label>
                                                        <div class="pt-3 pb-3">{{Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $category->created_at)->format('D d, M, Y g:i A')}}</div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer p-0">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal" onclick="topbar.show()" wire:click='resetAction'>{{
                                                        __('dashboard_trans.Cancel')
                                                        }}</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- edit -->
                                <div class="modal fade" id="edit_category{{$category->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self
                                    data-bs-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ __('dashboard_trans.Edit Category') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="topbar.show()" wire:click='resetAction'
                                                    aria-label="Close"></button>
                                            </div>

                                            <form wire:submit.prevent="editCategory({{$category->id}})">
                                                <div class="modal-body">
                                                    @if ($errors->any())
                                                    <div class="alert">
                                                        <ul class="m-0 p-0 text-danger">
                                                            @foreach ($errors->getMessages() as $key => $error)
                                                            @foreach ($error as $err)
                                                            <li>{{$key}}: {{$err}}</li>
                                                            @endforeach
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <div class="mb-3">
                                                        <label for="recipient-name" class="col-form-label">{{
                                                            __('dashboard_trans.Name Ar') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$category->id}}.name_ar"
                                                            id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Name En') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$category->id}}.name_en"
                                                            id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Icon') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$category->id}}.icon"
                                                            id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.ICON UNICODE') }}</label>
                                                        <input type="text" class="form-control"
                                                            wire:model="data.{{$category->id}}.unicode"
                                                            id="recipient-name">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.COLOR') }}</label>
                                                        <select wire:model="data.{{$category->id}}.color"
                                                            class="form-control">
                                                            <option value="none">-- {{__('dashboard_trans.COLOR')}} --</option>
                                                            @foreach (config('globals.colors') as $color)
                                                            <option value="{{$color}}">{{$color}}</option>
                                                            @endforeach
                                                        </select>
                                                        @foreach (config('globals.colors') as $color)
                                                        <span class="badge bg-{{$color}}">{{$color}}</span>
                                                        @endforeach
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.START PRICE') }}</label>
                                                        <input type="number" class="form-control"
                                                            wire:model="data.{{$category->id}}.price"
                                                            id="recipient-name" step="any">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="message-text" class="col-form-label">{{
                                                            __('dashboard_trans.Project Department') }}</label>
                                                        <select wire:model="data.{{$category->id}}.dept_id"
                                                            class="form-control">
                                                            <option value="none">-- {{__('dashboard_trans.DEPARTMENT')}} --</option>
                                                            @foreach ($departments as $department)
                                                            <option value="{{ $department->id }}">{{
                                                                $department->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal" onclick="topbar.show()" wire:click='resetAction'>{{ __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button onclick="topbar.show()" type="submit" class="btn btn-primary">{{
                                                            __('dashboard_trans.Edit') }}</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>


                                <!-- delete -->
                                <div class="modal fade" id="delete_category{{$category->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self
                                    data-bs-backdrop="static">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    {{ __('dashboard_trans.Delete Category') }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="topbar.show()" wire:click='resetAction'
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form wire:submit.prevent="deleteCategory({{$category->id}})">
                                                    <div class="mb-3 text-center">
                                                        <input type="text" class="form-control hidden" value=""
                                                            id="recipient-name">
                                                        <h4 class="text-danger">
                                                            {{ __('dashboard_trans.QuesDele') }}</h4>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal" onclick="topbar.show()" wire:click='resetAction'>{{ __('dashboard_trans.Cancel')
                                                            }}</button>
                                                        <button onclick="topbar.show()" type="submit" class="btn btn-danger">{{
                                                            __('dashboard_trans.Delete') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </table>
                        </div>
                        {{ $categories->links() }}

                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ __('dashboard_trans.Add Category') }}</h4>

                            <form wire:submit.prevent="addCategory">
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ARABIC NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="store.name_ar">
                                            @error('store.name_ar')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ENGLISH NAME') }}</label>
                                            <input type="text" class="form-control" wire:model="store.name_en">
                                            @error('store.name_en')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.ICON') }}</label>
                                            <input type="text" class="form-control" wire:model="store.icon">
                                            @error('store.icon')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3 mt-3 mt-lg-0">
                                            <label class="form-label">{{ __('dashboard_trans.ICON UNICODE') }}</label>
                                            <input type="text" class="form-control" wire:model="store.unicode">
                                            @error('store.unicode')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.START PRICE') }}</label>
                                            <input type="number" step="any" class="form-control" wire:model="store.price">
                                            @error('store.price')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="message-text" class="form-label">{{
                                                __('dashboard_trans.DEPARTMENT') }}</label>
                                            <select wire:model="store.dept_id"
                                                class="form-control">
                                                <option value="none">-- {{__('dashboard_trans.DEPARTMENT')}} --</option>
                                                @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{
                                                    $department->name }}</option>
                                                @endforeach
                                            </select>

                                            @error('store.dept_id')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('dashboard_trans.COLOR') }}</label>
                                            <select wire:model="store.color"
                                                class="form-control">
                                                <option value="none">-- {{__('dashboard_trans.COLOR')}} --</option>
                                                @foreach (config('globals.colors') as $color)
                                                <option value="{{$color}}">{{$color}}</option>
                                                @endforeach
                                            </select>
                                            @foreach (config('globals.colors') as $color)
                                            <span class="badge bg-{{$color}}">{{$color}}</span>
                                            @endforeach

                                            @error('store.color')
                                            <br>
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div class="w-50 mb-3 mt-3 mt-lg-0">
                                            <button type="submit" class="btn btn-success form-control">{{
                                                __('dashboard_trans.ADD') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- end row -->

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
                // TODO:
                // $('.modal .show').modal('hide');
                // console.log($('.modal .show'));
                // window.livewire.emit('resetAction');
            })
    </script>
    @endif

    @push('custom-scripts')
    <script>
        window.addEventListener('updateMode', (e) => {
            $('#edit_category'+e.detail.id).modal('show');
        })

        window.addEventListener('deleteMode', (e) => {
            $('#delete_category'+e.detail.id).modal('show');
        })
    </script>
    @endpush
</div> <!-- container-fluid -->
