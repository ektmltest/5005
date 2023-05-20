<h3>Register now</h3>
<div id="validerrors" class="alert alert-danger" style="display:none;"></div>
<form action="signup/register" name="registerForm" data-parsley-errors-container="#validerrors" novalidate="">
    <div class="row">
        <input type="hidden" name="reCAPTCHA" value="">
        <div class="col-xl-6 col-lg-6">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3" id="field-1"
                        name="firstName" placeholder="First Name" required=""
                        data-parsley-required-message="Please check the First Name field">
                    <label for="field-1" class="floating-label">First Name</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3" id="field-2"
                        name="lastName" placeholder="Last Name" required=""
                        data-parsley-required-message="Please check the last name field">
                    <label for="field-2" class="floating-label">Last Name</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>




        <div class="col-xl-9 col-lg-8 col-8">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="number" class="floating-label-field floating-label-field--s3" id="field-6"
                        pattern="\d*" name="phone"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                        placeholder="501611608" required=""
                        data-parsley-required-message="Please write the mobile number" maxlength="9">
                    <label for="field-2" class="floating-label">Phone Number</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-3 col-4">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <select name="country-code" id="inputState" class="form-control floating-label-field--s3" style="
                                              text-align: left;
                                              border-color: #b8bfca;
                                              padding-right: 5px;
                                              padding-left: 8px; ">
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
                    <input type="email" class="floating-label-field floating-label-field--s3" id="field-3" name="email"
                        placeholder="E-mail" required="" data-parsley-required-message="Please check the E-mail field"
                        data-parsley-error-message="Please check the E-mail field">
                    <label for="field-3" class="floating-label">E-mail</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>
        <div class="col-xl-12">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="password" class="floating-label-field floating-label-field--s3" id="field-4"
                        name="password" placeholder="Password" required="" data-parsley-minlength="8"
                        data-parsley-required-message="Please check the Password field">
                    <label for="field-4" class="floating-label">Password</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>
        <div class="col-xl-12">
            <div class="form-group">
                <div class="floating-label-wrap">
                    <input type="password" class="floating-label-field floating-label-field--s3" id="field-5"
                        name="confirmPassword" placeholder="Confirm Password" data-parsley-equalto="#field-4"
                        required="" data-parsley-required-message="Please check the password confirmation field">
                    <label for="field-5" class="floating-label">Confirm Password</label>
                </div><!-- .floating-label-wrap -->
            </div>
        </div>
        <div class="col-xl-12">
            <div class="checkbox-group">
                <input type="checkbox" id="iAgree" required="" data-parsley-required-message="Please agree to the terms"
                    data-parsley-multiple="iAgree">
                <label for="iAgree">I have read <a href="#"> Terms and conditions</a></label>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="form-buttons">
                <button type="submit" class="btn bttn btn-purple">Create my account</button>
            </div>
        </div>
    </div>
</form>
<div class="account-link">
    Do you have an account?<a href="signin"> Sign in</a>
</div>
