<section id="services" class="single-job inner-services">
    <div class="container">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{$user->avatar}}" pImg alt="..."
                                        class="rounded-circle p-1 bg-purple pic1web pic1" height="110" width="110" style="object-fit: cover">
                                    <div class="mt-3">
                                        <h4>{{$user->full_name}}</h4>
                                        <p class="text-{{$user->rank->type->color}} mb-1">
                                            {{$user->rank->name}}
                                        </p>
                                        <a class="bttn btn-purple createPromoCode mt-2" href>
                                            {{ __('profile_trans.Create Promotion Url') }} <i class="bx bx-wallet"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="list-group">
                                    <a onclick="topbar.show()" wire:click='changeStatus("statistics")' style="cursor: pointer" mu-tab mu-target="#stats" mu-active
                                        class="list-group-item list-group-item-action"><i class="bx bx-stats"></i>
                                        {{ __('profile_trans.statistics') }}</a>

                                    <a onclick="topbar.show()" wire:click='changeStatus("edit")' style="cursor: pointer" mu-tab mu-target="#editProf"
                                        class="list-group-item list-group-item-action"><i class="bx bx-edit"></i>
                                        {{ __('profile_trans.Edit profile') }}</a>

                                    <a onclick="topbar.show()" wire:click='changeStatus("picture")' style="cursor: pointer" mu-tab mu-target="#profilePic"
                                        class="list-group-item list-group-item-action"><i
                                            class="bx bxs-photo-album"></i>
                                        {{ __('profile_trans.Profile Picture') }}</a>

                                    <a onclick="topbar.show()" wire:click='changeStatus("change-password")' style="cursor: pointer" mu-tab mu-target="#changePasswordSection"
                                        class="list-group-item list-group-item-action"><i class="bx bx-lock"></i>
                                        {{ __('profile_trans.Change Password') }}</a>

                                    <a onclick="topbar.show()" wire:click='changeStatus("recharge")' style="cursor: pointer" mu-tab mu-target="#reChargeMenu"
                                        class="list-group-item list-group-item-action"><i class="bx bx-credit-card"></i>
                                        {{ __('profile_trans.Balance recharge') }}</a>

                                    <a onclick="topbar.show()" wire:click='changeStatus("withdraw")' style="cursor: pointer" mu-tab mu-target="#reqWith"
                                        class="list-group-item list-group-item-action"><i class="bx bx-money"></i>
                                        {{ __('profile_trans.Balance withdrawal request') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($status == 'statistics')
                    <div class="col-lg-8" id="stats">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-md-0">
                                        <div class="card text-black bg-purple mb-3">
                                            <div class="card-header">{{ __('profile_trans.Balance') }}</div>
                                            <div class="card-body">
                                                <h5 class="card-title">{{ __('profile_trans.Your wallet') }} <a
                                                        class="balance mx-1" my-money>{{$user->balance}}</a>
                                                    {{ __('profile_trans.Saudi Riyal') }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card text-white bg-secondary mb-3">
                                            <div class="card-header">{{ __('profile_trans.Your Clients') }}</div>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    0 {{ __('profile_trans.Clients registered by you') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 mb-3 mb-md-0">
                                        <div class="card text-black bg-purple mb-3">
                                            <div class="card-header">{{ __('profile_trans.Your views') }}</div>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    {{$user->visits}} {{ __('profile_trans.visits') }}</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="card text-white bg-secondary mb-3">
                                            <div class="card-header">{{ __('profile_trans.Your Purchases') }}</div>
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    0 {{ __('profile_trans.Buyer') }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @elseif ($status == 'edit')

                    <div class="col-lg-8" id="editProf">
                        <div class="card">
                            <form wire:submit.prevent='update' mu-updateProfile
                                name='changeData'>
                                <div class="card-body">
                                    <h5 style="color: #4b3da7;"><i class="bx bx-edit mb-4"></i> {{
                                        __('profile_trans.Edit profile') }} </h5>
                                    <div class="row mb-4">
                                        <div class="col-sm-12 input-box">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="firstName" firstName name="firstName" wire:model='profile.fname'>
                                                <label for="firstName" class="floating-label">{{ __('profile_trans.First Name') }}</label>
                                                @error("profile.fname") <span class="text-danger error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-12 input-box">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="lastName" name="lastName" lastName wire:model='profile.lname'>
                                                <label for="lastName" class="floating-label">{{ __('profile_trans.Last Name') }}</label>
                                                @error("profile.lname") <span class="text-danger error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-12 input-box">
                                            <div class="floating-label-wrap">

                                                <div class="row justify-content-around">
                                                    <select class="floating-label-field floating-label-field--s3 col-2" wire:model='profile.country_code'>
                                                        <option value="+966">966+</option>
                                                        <option value="+971">971+</option>
                                                        <option value="+968">968+</option>
                                                        <option value="+965">965+</option>
                                                        <option value="+974">974+</option>
                                                        <option value="+973">973+</option>
                                                        <option value="+970">970+</option>
                                                        <option value="+20">20+</option>
                                                        <option value="+962">962+</option>
                                                    </select>
                                                    <input type="text" class="floating-label-field floating-label-field--s3 col-9"
                                                        id="phoneNumber" name="phoneNumber" phoneNumber wire:model='profile.phone'>
                                                    <label for="phoneNumber" class="floating-label">{{
                                                        __('profile_trans.Phone Number') }}</label>
                                                </div>
                                                @error("profile.country_code") <span class="text-danger error">{{ $message }}</span> @enderror
                                                @error("profile.phone") <span class="text-danger error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-secondary">
                                            <div class="form-buttons">
                                                <input onclick="topbar.show()" style="padding-right: 2.5rem; padding-left: 2.5rem;"
                                                    type="submit" value="{{ __('profile_trans.Change') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @elseif ($status == 'picture')

                    <div class="col-lg-8" id="profilePic">

                        <div class="card">
                            <div class="card-body">
                                <h5 style="color: #4b3da7;"><i class="bx bx-edit mb-4"></i> {{ __('profile_trans.Profile
                                    Picture') }}
                                </h5>
                                <form wire:submit.prevent='uploadImage' pImfForm >
                                    <div class="row mb-4">
                                        <div class="col-sm-12 input-box">
                                            <div class="floating-label-wrap">
                                                <input wire:model='uploads.file' type="file" name="file" pImgInput
                                                    class="floating-label-field floating-label-field--s3">
                                                <label for="fileImg" class="floating-label">{{ __('profile_trans.Image')
                                                    }}</label>
                                                @error('uploads.file')
                                                <span class="text-danger error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center my-3">
                                        <div class="col-xl-12">
                                            <div class="form-buttons">
                                                <input onclick="topbar.show()" style="padding-right: 2.5rem; padding-left: 2.5rem;"
                                                    type="submit" value="{{ __('profile_trans.Save Changes') }}">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @elseif ($status == 'change-password')

                    <div class="col-lg-8" id="changePasswordSection">
                        <div class="card">
                            <form wire:submit.prevent="updatePassword">
                                <div class="card-body">
                                    <h5 style="color: #4b3da7;"><i class="bx bx-lock mb-4"></i>
                                        {{ __('profile_trans.Change Password') }}
                                    </h5>
                                    <div class="row mb-4">
                                        <div class="col-sm-12 input-box">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="oldPassword" wire:model='password.old'>
                                                <label for="oldPassword" class="floating-label">{{ __('profile_trans.Old Password') }}</label>
                                                @error('password.old')
                                                    <span class="text-danger error">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-12 input-box">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="newPassword" wire:model='password.new'>
                                                <label for="newPassword" class="floating-label">{{ __('profile_trans.New Password') }}</label>
                                                @error('password.new')
                                                    <span class="text-danger error">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-sm-12 input-box">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="newPasswordConfirm" wire:model='password.new_confirmation'>
                                                <label for="newPasswordConfirm" class="floating-label">{{
                                                    __('profile_trans.Confirm the new password') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 text-secondary">
                                            <div class="form-buttons">
                                                <input onclick="topbar.show()" style="padding-right: 2.5rem; padding-left: 2.5rem;"
                                                    type="submit" value="{{ __('profile_trans.Change') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @elseif ($status == 'recharge')

                    <div class="col-lg-8" id="reChargeMenu">

                        <div class="card">
                            <div class="card-body">
                                <h5 style="color: #4b3da7;"><i class='bx bx-credit-card mb-4'></i>
                                    {{ __('profile_trans.Recharge money') }}
                                </h5>
                                <p style="color: #34d8be;">{{ __('profile_trans.smalltitle') }}</p>
                                <div class="row">
                                    {{-- <div class="col-sm-6 mb-3 mb-md-0">
                                        <div class="card text-purple mb-3">
                                            <div class="card-header">{{ __('profile_trans.Al Rajhi Bank') }}</div>
                                            <div class="card-body">
                                                <div>{{ __("profile_trans.Account Holder's Name") }} : {{
                                                    __('profile_trans.name') }}</div>
                                                <div>{{ __('profile_trans.IBan') }} : SA4380000246608016064127</div>
                                                <div>{{ __('profile_trans.account number') }} : 246608016064127</div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    @foreach ($bank_cards as $bank_card)
                                    <div class="col-6">
                                        <div class="card text-purple mb-3">
                                            <div class="card-header">{{$bank_card->bank_name}}</div>
                                            <div class="card-body">
                                                <div>{{ __("profile_trans.Account Holder's Name") }} : {{$bank_card->bank_card_owner}}</div>
                                                <div>{{ __('profile_trans.IBan') }} : {{$bank_card->iban}}</div>
                                                <div>{{ __('profile_trans.account number') }} : {{$bank_card->account_number}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <p style="color: #34d8be;">{{ __('profile_trans.smalltitle2') }}</p>
                                <div class="row">
                                    <div class="col-12 justify-content-center">
                                        <div class="floating-label-wrap">
                                            <input type="number" class="floating-label-field floating-label-field--s3"
                                                id="reCost" name="reCost" value="0" />
                                            <label for="reCost" class="floating-label">{{ __('profile_trans.Money to
                                                recharge') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 justify-content-center mt-4">
                                        <div class="floating-label-wrap">
                                            <input type="file" onchange="set7wala(this)"
                                                class="floating-label-field floating-label-field--s3">
                                            <label for="fileImg" class="floating-label">{{ __('profile_trans.Add a bank
                                                transfer photo') }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center my-3">
                                    <div class="col-xl-12">
                                        <div class="form-buttons">
                                            <input req-recharge style="padding-right: 2.5rem; padding-left: 2.5rem;"
                                                type="submit" value="{{ __('profile_trans.Request recharge') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @elseif ($status == 'withdraw')

                    <div class="col-lg-8" id="reqWith">
                        <div>
                            <ul class="nav nav-tabs" style="" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#withdraw" aria-controls="withraw" role="tab" data-toggle="tab"
                                        aria-expanded="true">
                                        <i class="bx bx-money"></i> {{ __('profile_trans.Withdraw')}}</a>
                                </li>

                                <li role="presentation" class="mx-3">
                                    <a href="#history" aria-controls="history" role="tab" data-toggle="tab"
                                        aria-expanded="false">
                                        <i class="bx bx-clipboard"></i> {{ __('profile_trans.History')}}</a>
                                </li>
                            </ul>
                            <div class="tab-content my-4">
                                <div role="tabpanel" class="tab-pane active" id="withdraw">
                                    <div class="row">
                                        <div class="col-12 justify-content-center">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="name" name="name">
                                                <label for="name" class="floating-label">{{
                                                    __('profile_trans.Name')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 justify-content-center mt-4">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="bank" name="bank">
                                                <label for="bank" class="floating-label">{{ __('profile_trans.Bank
                                                    name')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 justify-content-center mt-4">
                                            <div class="floating-label-wrap">
                                                <input type="number"
                                                    class="floating-label-field floating-label-field--s3" id="balance"
                                                    name="money">
                                                <label for="balance" class="floating-label">{{ __('profile_trans.Amount
                                                    to be withdrawn')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 justify-content-center mt-4">
                                            <div class="floating-label-wrap">
                                                <input type="text" class="floating-label-field floating-label-field--s3"
                                                    id="iban" name="iban">
                                                <label for="bank" class="floating-label">{{
                                                    __('profile_trans.IBan')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-12 text-secondary">
                                            <div class="form-buttons">
                                                <input style="padding-right: 2.5rem; padding-left: 2.5rem;"
                                                    type="submit" req-with value="{{ __('profile_trans.Withdraw') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" style="overflow: hidden;" class="tab-pane" id="history">
                                    <table class="col-md-12 table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Status</th>
                                                <th>Amount to be withdrawn</th>
                                                <th>Name</th>
                                                <th>Bank</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
    <script>
        $.notify("{{ session('message') }}", 'success');
    </script>
    @endif
</section>
