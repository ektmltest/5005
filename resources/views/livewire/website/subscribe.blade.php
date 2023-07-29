<div class="foot-box newsletter">
    <h4>{{ __('main_trans.News')}}</h4>
    <p>{{ __('main_trans.small') }}</p>
    <form wire:submit.prevent='submit' autocomplete="off" action="#">
        <div class="input-box">
            <div class="floating-label-wrap">
                <input wire:model='email' type="email" class="floating-label-field floating-label-field--s3"
                    id="field-6" placeholder="Subscribe">
                <label for="field-6" class="floating-label">{{ __('main_trans.E-Mail Address')}}</label>
                <button onclick="topbar.show()" type="submit"><i class='bx bx-send'></i></button>
            </div>

            @error('email')
                <small class="text-danger">* {{$message}}</small>
            @enderror
        </div>
    </form>

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
