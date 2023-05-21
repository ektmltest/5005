<h3>{{ucwords(__('register_trans.register.header'))}}</h3>
<div id="validerrors" class="alert alert-danger" style="display:none;"></div>

<form wire:submit="register">
    <div class="row">
        {{-- <input type="hidden" name="reCAPTCHA" value=""> --}}

        <div class="col-xl-6 col-lg-6">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3" id="field-1"
                        name="fname" wire:model="fname" placeholder="{{ucwords(__('register_trans.register.input.fname'))}}" required=""
                        data-parsley-required-message="Please check the first name field">
                        @error('fname') <span class="error">{{ $message }}</span> @enderror
                        <label for="field-1" class="floating-label">{{ucwords(__('register_trans.register.input.fname'))}}</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>

        <div class="col-xl-6 col-lg-6">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3" id="field-2"
                        name="lastName" wire:model="lastName" placeholder="{{ucwords(__('register_trans.register.input.lname'))}}" required=""
                        data-parsley-required-message="Please check the last name field">
                        @error('lastName') <span class="error">{{ $message }}</span> @enderror
                        <label for="field-2" class="floating-label">{{ucwords(__('register_trans.register.input.lname'))}}</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>

        <div class="col-xl-9 col-lg-8 col-8">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="string" class="floating-label-field floating-label-field--s3" id="field-6"
                        pattern="\d*" name="phone" wire:model="phone"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="501611608" required=""
                        data-parsley-required-message="Please write the mobile number" maxlength="9">
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                        <label for="field-2" class="floating-label">{{ucwords(__('register_trans.register.input.phone'))}}</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-sm-3 col-4">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <select name="country-code" id="inputState" class="form-control floating-label-field--s3" style="text-align: left; border-color: #b8bfca; padding-right: 5px; padding-left: 8px; ">
                        <option selected="" value="+966">966+</option>
                        <option value="+971">971+</option>
                        <option value="+968">968+</option>
                        <option value="+965">965+</option>
                        <option value="+974">974+</option>
                        <option value="+973">973+</option>
                        <option value="+970">970+</option>
                        <option value="+20">20+</option>
                        <option value="+962">962+</option>
                    </select>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>

        <div class="col-xl-12">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="email" class="floating-label-field floating-label-field--s3" id="field-3" name="email" wire:model="email"
                        placeholder="{{ucwords(__('register_trans.register.input.email'))}}" required="" data-parsley-required-message="Please check the E-mail field"
                        data-parsley-error-message="Please check the E-mail field">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                        <label for="field-3" class="floating-label">{{ucwords(__('register_trans.register.input.email'))}}</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>

        <div class="col-xl-12">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="password" class="floating-label-field floating-label-field--s3" id="field-4"
                        name="password" wire:model="password" placeholder="{{ucwords(__('register_trans.register.input.password'))}}" required="" data-parsley-minlength="8"
                        data-parsley-required-message="Please check the Password field">
                        @error('password') <span class="error">{{ $message }}</span> @enderror
                        <label for="field-4" class="floating-label">{{ucwords(__('register_trans.register.input.password'))}}</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>

        <div class="col-xl-12">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="password" class="floating-label-field floating-label-field--s3" id="field-5"
                        name="confirmPassword" wire:model="confirmPassword" placeholder="{{ucwords(__('register_trans.register.input.confirm_password'))}}" data-parsley-equalto="#field-4"
                        required="" data-parsley-required-message="Please check the password confirmation field">
                        @error('confirmPassword') <span class="error">{{ $message }}</span> @enderror
                        <label for="field-5" class="floating-label">{{ucwords(__('register_trans.register.input.confirm_password'))}}</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>

        <div class="col-xl-12">
            <div class="checkbox-group">
                <input type="checkbox" name="agree" wire:model="agree" id="iAgree" required="" data-parsley-required-message="Please agree to the terms"
                    data-parsley-multiple="iAgree">
                    @error('agree') <span class="error">{{ $message }}</span> @enderror
                    <label for="iAgree">{{__('register_trans.register.haveread')}} <a href="#"> {{__('register_trans.register.policy')}}</a></label>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="form-buttons">
                <button type="submit" class="btn bttn btn-purple">{{__('register_trans.register')}}</button>
            </div>
        </div>
    </div>
</form>

<div class="account-link">
    {{__('register_trans.register.haveAccount')}}<a href="{{route('login')}}"> {{__('register_trans.register.signin')}}</a>
</div>
