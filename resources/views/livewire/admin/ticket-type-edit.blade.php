<!-- edit -->
<div class="modal fade" id="edit_ticket_type{{ $ticket_type->id }}" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{
                    __('dashboard_trans.Edit') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="editTicketType">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">{{
                            __('dashboard_trans.Name Ar') }}</label>
                        <input type="text" class="form-control" wire:model="data.name_ar" value="{{
                            $ticket_type->nameLocale('ar') }}" id="recipient-name">
                        @error('data.name_ar') <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">{{
                            __('dashboard_trans.Name En') }}</label>
                        <input type="text" class="form-control" wire:model="data.name_en" value="{{
                            $ticket_type->nameLocale('en') }}" id="recipient-name">
                        @error('data.name_en') <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('dashboard_trans.Cancel')
                            }}</button>
                        <button type="submit" class="btn btn-primary">{{
                            __('dashboard_trans.Edit') }}</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
        window.addEventListener('openModal', event => {
        $('#edit_ticket_type{{ $ticket_type->id }}').modal('show');
        //alert('parameter: ' + event.detail.someParameter);
        })
    </script>
</div>
