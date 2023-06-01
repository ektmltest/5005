<div class="main-content">
<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
<div class="page-title-box d-flex align-items-center justify-content-between">
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('dashboard_trans.PROJECTS SYSTEM') }}</a></li>
            <li class="breadcrumb-item active">{{ __('dashboard_trans.Projects sections') }}
            </li>
        </ol>
    </div>
</div>
</div>
</div><!-- end page title -->

<div class="row">
<div class="col-xl-12">
<div class="card checkout-order-summary">


    <div class="table-responsive">
        <table class="table table-centered table-nowrap mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('dashboard_trans.ARABIC NAME') }}</th>
                    <th>{{ __('dashboard_trans.ENGLISH NAME') }}</th>
                    <th>{{ __('dashboard_trans.ICON') }}</th>
                    <th>{{ __('dashboard_trans.ACTION') }}</th>
                </tr>
            </thead>

            @foreach(\App\Models\ProjectCategory::all() as $category)
                <tbody>
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->nameLocale('ar') }}</td>
                        <td>{{ $category->nameLocale('en') }}</td>
                        <td>{{ $category->icon }}</i></td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" data-id="{{ $category->id }}"
                                data-name="{{ $category->name }}" data-bs-toggle="modal" data-bs-target="#edit_category{{ $category->id }}">{{ __('dashboard_trans.Edit') }}</button>

                            <button type="button" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#delete_category{{$category->id}}">{{ __('dashboard_trans.Delete') }}</button>
                        </td>
                    </tr>
                </tbody>

<!-- edit -->
<div class="modal fade" id="edit_category{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard_trans.Edit Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:click.prevent="editCategory({{$category->id}})">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">{{ __('dashboard_trans.Name Ar') }}</label>
                        <input type="text" class="form-control" name="name" value={{ $category->nameLocale('ar') }} id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">{{ __('dashboard_trans.Name En') }}</label>
                        <input type="text" class="form-control" name="name" value={{ $category->nameLocale('en') }} id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">{{ __('dashboard_trans.Icon') }}</label>
                        <input type="text" class="form-control" name="icon" value={{ $category->icon }} id="recipient-name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('dashboard_trans.Edit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- delete -->
<div class="modal fade" id="delete_category{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard_trans.Delete Category') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="deleteCategory({{$category->id}})">
                    <div class="mb-3 text-center">
                        <input type="text" class="form-control hidden" value={{ $category->id }} id="recipient-name">
                        <h4 class="text-danger">{{ __('dashboard_trans.QuesDele') }}</h3>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel') }}</button>
                            <button type="submit" class="btn btn-danger">{{ __('dashboard_trans.Delete') }}</button>
                        </div>
                    </form>
        </div>
    </div>
</div>

                @endforeach
        </table>
    </div>


</div>
</div>

</div>
</div>
</div><!-- end row -->

</div> <!-- container-fluid -->

