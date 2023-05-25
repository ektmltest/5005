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
                    @error('url')
                        <h3 class="text-center">{{$message}}</h3>
                    @else
                        <h3>Reset your password</h3>
                        @error('credentials')
                            <div class="alert alert-danger mt-3">
                                {{$message}}
                            </div>
                        @enderror
                        @error('email')
                            <div class="alert alert-danger mt-3">
                                {{__('errors.url_error') . ': ' . $message}}
                            </div>
                        @enderror
                        <form wire:submit.prevent='submit' id="forgetPasswordForm" data-parsley-errors-container="#validerrors" novalidate="">
                            <div class="row">
                                <input type="hidden" name="reCAPTCHA" value="">
                                <input type="hidden" name="email" value="{{$email}}">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input wire:model='password' type="password" autocomplete="on" class="floating-label-field floating-label-field--s3"
                                                id="field-1" name="password" placeholder="{{ucwords(__('register_trans.register.input.password'))}}" required=""
                                                data-parsley-required-message="الرجاء التأكد من حقل البريد الإلكتروني"
                                                data-parsley-error-message="الرجاء التأكد من حقل البريد الإلكتروني">
                                            <label for="field-1" class="floating-label">{{ucwords(__('register_trans.register.input.password'))}}</label>
                                            @error('password')
                                                <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div><!-- .floating-label-wrap -->
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <div class="floating-label-wrap">
                                            <input wire:model='password_confirmation' type="password" class="floating-label-field floating-label-field--s3" id="field-2"
                                                name="password_confirmation" placeholder="{{ucwords(__('register_trans.register.input.confirm_password'))}}" required="" data-parsley-minlength="8"
                                                data-parsley-required-message="الرجاء التأكد من حقل كلمة المرور">
                                            <label for="field-2" class="floating-label">{{ucwords(__('register_trans.register.input.confirm_password'))}}</label>
                                            @error('password_confirmation')
                                                <span class="text-danger">* {{$message}}</span>
                                            @enderror
                                        </div><!-- .floating-label-wrap -->
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="form-buttons">
                                        <button type="submit" class="btn bttn btn-purple">{{ucwords(__('login_trans.login'))}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @enderror
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
            console.log('test');
            topbar.show();
        });

        $(window).on('loaded', () => {
            topbar.hide();
        });
    </script>
</section>
