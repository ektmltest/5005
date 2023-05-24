<section id="signup" class="signup parallax">
    @if (Session::has('done'))
        <div id="alert" class="w-100" style="position: absolute; z-index: 99999; text-align: center; top: 65px">
            <div class="alert alert-success m-auto w-50">
                {{Session::get('done')}}
            </div>
        </div>

        <script>
            setTimeout(() => {
                var alert = document.getElementById('alert');
                alert.style.display = 'none';
            }, 3000);
        </script>
    @endif

    <div class="overlay"></div>
    <div class="container">
        <div class="row row-aligns">
            <div class="col-xl-3 col-lg-3 col-md-3">
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="signup-form">
                    <h3>Reset your password</h3>
                    <form wire:submit.prevent='submit' id="forgetPasswordForm" name="forgotPassword">
                        <div class="row">
                            <input type="hidden" name="reCAPTCHA" value="">
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <div class="floating-label-wrap">
                                        <input wire:model='email' type="email" autocomplete="on"
                                            class="floating-label-field floating-label-field--s3" id="field-1"
                                            name="email" placeholder="{{ucwords(__('login_trans.login.input1'))}}">
                                        <label for="field-3" class="floating-label">{{ucwords(__('login_trans.login.input1'))}}</label>
                                        @error('email')
                                            <span class="text-danger">* {{$message}}</span>
                                        @enderror
                                    </div><!-- .floating-label-wrap -->
                                </div>
                            </div>
                            <div class="col-xl-3"></div>
                            <div class="col-xl-8">
                                <button type="submit" class="btn bttn btn-purple">Submit a reset link</button>
                            </div>

                            {{-- <script wire:loading>
                                topbar.show();
                            </script> --}}

                            {{-- <script>
                                var srcShow = document.getElementById('src-show')
                                if (!srcShow)
                                    topbar.hide();
                            </script> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Background Shape-->
        <div class="background-shapes">
            <div class="box1"></div>
            <div class="box2"></div>
            <div class="box3"></div>
            <div class="dot1"></div>
            <div class="dot2"></div>
            <div class="heart1"><i class="bx bx-message-square"></i></div>
            <div class="heart2"><i class="bx bx-heart"></i></div>
            <div class="circle2"></div>
        </div>
    </div>

    <script>
        $('#forgetPasswordForm').on('submit', () => {
            topbar.show();
        });

        $(window).on('loaded', () => {
            topbar.hide();
        });
    </script>
</section>
