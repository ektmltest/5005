<h3>{{ucwords(__('login_trans.login.header'))}}</h3>
<div id="validerrors" class="alert alert-danger" style="display:none;"></div>
<form wire:submit.prevent='login' name="signinForm" data-parsley-errors-container="#validerrors" novalidate="">
    <div class="row">
        <input type="hidden" name="reCAPTCHA" value="">
        <div class="col-xl-12">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input wire:model='email' type="email" autocomplete="on" class="floating-label-field floating-label-field--s3"
                        id="field-1" name="email" placeholder="{{ucwords(__('login_trans.login.input1'))}}" required=""
                        data-parsley-required-message="الرجاء التأكد من حقل البريد الإلكتروني"
                        data-parsley-error-message="الرجاء التأكد من حقل البريد الإلكتروني">
                    <label for="field-1" class="floating-label">{{ucwords(__('login_trans.login.input1'))}}</label>
                    @error('email')
                        <span class="text-danger">* {{$message}}</span>
                    @enderror
                </div><!-- .floating-label-wrap -->
            </div>
        </div>
        <div class="col-xl-12">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input wire:model='password' type="password" class="floating-label-field floating-label-field--s3" id="field-2"
                        name="password" placeholder="{{ucwords(__('login_trans.login.input2'))}}" required="" data-parsley-minlength="8"
                        data-parsley-required-message="الرجاء التأكد من حقل كلمة المرور">
                    <label for="field-2" class="floating-label">{{ucwords(__('login_trans.login.input2'))}}</label>
                    @error('password')
                        <span class="text-danger">* {{$message}}</span>
                    @enderror
                </div><!-- .floating-label-wrap -->
            </div>
        </div>
        <div class="col-xl-12">
            <div class="checkbox-group">
                <input wire:model='rememberme' type="checkbox" id="box-3" name="rememberme" value="" data-parsley-multiple="rememberme">
                <label for="box-3">{{ucwords(__('login_trans.login.rememberme'))}}</label>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="form-buttons">
                <a href="forgetPassword">{{ucwords(__('login_trans.login.forgetpass'))}}</a>
                <button type="submit" class="btn bttn btn-purple">{{ucwords(__('login_trans.login'))}}</button>
            </div>
        </div>
    </div>
</form>
<div class="account-link">
    {{ucwords(__('login_trans.login.notHaveAccount'))}} <a href="{{route('register')}}">{{ucwords(__('login_trans.login.createAccount'))}}</a>
</div>
