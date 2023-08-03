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
                                                <h5 class="card-title">
                                                    {{ __('profile_trans.Your wallet') }}
                                                    <a class="balance mx-1">{{$user->balance}}</a>
                                                    {{ __('profile_trans.Saudi Riyal') }}
                                                </h5>
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
                            <form wire:submit.prevent='update'
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
                                <h5 style="color: #4b3da7;"><i class="bx bx-edit mb-4"></i> {{ __('profile_trans.Profile Picture') }}
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

                                <form wire:submit.prevent='charge'>

                                    <p style="color: #34d8be;">{{ __('profile_trans.smalltitle') }}</p>
                                    <div class="row">
                                        @foreach ($bank_cards as $bank_card)
                                        <div class="col-6">
                                            <div class="card text-purple mb-3" onclick="this.children[0].children[1].children[0].click()" style="cursor: pointer">
                                                <div class="card-header">
                                                    <span>{{$bank_card->bank_name}}</span>
                                                    <span style="float: left"><input type="radio" name="bank_card_id" wire:model="charge.bank_card_id" value="{{$bank_card->id}}"></span>
                                                </div>
                                                <div class="card-body">
                                                    <div>{{ __("profile_trans.Account Holder's Name") }} : {{$bank_card->bank_card_owner}}</div>
                                                    <div>{{ __('profile_trans.IBan') }} : {{$bank_card->iban}}</div>
                                                    <div>{{ __('profile_trans.account number') }} : {{$bank_card->account_number}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @error('charge.bank_card_id')
                                            <div class="text-danger">* {{$message}}</div>
                                        @enderror
                                    </div>
                                    <p style="color: #34d8be;">{{ __('profile_trans.smalltitle2') }}</p>
                                    <div class="row">
                                        <div class="col-12 justify-content-center">
                                            <div class="floating-label-wrap">
                                                <input type="number" class="floating-label-field floating-label-field--s3"
                                                    id="reCost" min='0' wire:model='charge.amount' />
                                                <label for="reCost" class="floating-label">{{ __('profile_trans.Money to recharge') }}</label>
                                            </div>
                                            @error('charge.amount')
                                                <div class="text-danger">* {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 justify-content-center mt-4">
                                            <div class="floating-label-wrap">
                                                <input type="file" id="fileImg"
                                                    class="floating-label-field floating-label-field--s3" wire:model='charge.file'>
                                                <label for="fileImg" class="floating-label">{{ __('profile_trans.Add a bank transfer photo') }}</label>
                                            </div>
                                            @error('charge.file')
                                                <div class="text-danger">* {{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row justify-content-center my-3">
                                        <div class="col-xl-12">
                                            <div class="form-buttons">
                                                <input style="padding-right: 2.5rem; padding-left: 2.5rem;" onclick="topbar.show()"
                                                    type="submit" value="{{ __('profile_trans.Request recharge') }}">
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    @elseif ($status == 'withdraw')

                    <div class="col-lg-8" id="reqWith">
                        <div>
                            {{-- navs begin --}}
                            <ul class="nav nav-tabs" style="" role="tablist">
                                <li role="presentation" class="active">
                                    <a style="cursor: pointer" onclick="topbar.show()" wire:click='changeWithdrawalStatus("withdrawal")'
                                        class="{{$withdrawal_status == 'withdrawal' ? 'text-primary' : ''}}">
                                        <i class="bx bx-money"></i> {{ __('profile_trans.Withdraw')}}</a>
                                </li>

                                <li role="presentation" class="mx-3">
                                    <a style="cursor: pointer" onclick="topbar.show()" wire:click='changeWithdrawalStatus("bank-cards")'
                                        class="{{$withdrawal_status == 'bank-cards' ? 'text-primary' : ''}}">
                                        <i class="bx bx-credit-card"></i> {{ __('profile_trans.my bank cards')}}</a>
                                </li>

                                <li role="presentation" class="mx-3">
                                    <a style="cursor: pointer" onclick="topbar.show()" wire:click='changeWithdrawalStatus("history")'
                                        class="{{$withdrawal_status == 'history' ? 'text-primary' : ''}}">
                                        <i class="bx bx-clipboard"></i> {{ __('profile_trans.History')}}</a>
                                </li>
                            </ul>
                            {{-- navs end --}}

                            {{-- content begin --}}
                            <div class="tab-content my-4">

                                @if ($withdrawal_status == 'withdrawal')
                                    {{-- withdraw action form begin --}}
                                    <div role="tabpanel" class="tab-pane active" id="withdraw">
                                        <form wire:submit.prevent='withdraw'>
                                            <div class="row">
                                                <div class="col-12 justify-content-center mt-4">
                                                    <div class="floating-label-wrap">
                                                        <select type="text" class="floating-label-field floating-label-field--s3"
                                                            wire:model='withdrawal.user_bank_card_id'>
                                                        @if ($user_bank_cards->isEmpty())
                                                            <option disabled>-- {{__('profile_trans.please add bank card')}} --</option>
                                                        @else
                                                            <option value="">-- {{__('messages.select something')}} --</option>
                                                            @foreach ($user_bank_cards as $bank_card)
                                                                <option value="{{$bank_card->id}}">{{$bank_card->bank_name}} - {{$bank_card->iban}}</option>
                                                            @endforeach
                                                        @endif
                                                        </select>
                                                        <label for="bank" class="floating-label">{{
                                                            __('profile_trans.IBan')}}</label>
                                                    </div>

                                                    @error('withdrawal.user_bank_card_id')
                                                        <div class="text-danger">* {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 justify-content-center mt-4">
                                                    <div class="floating-label-wrap">
                                                        <input type="number" wire:model='withdrawal.amount'
                                                            class="floating-label-field floating-label-field--s3">
                                                        <label for="balance" class="floating-label">{{ __('profile_trans.Amount to be withdrawn')}}</label>
                                                    </div>

                                                    @error('withdrawal.amount')
                                                        <div class="text-danger">* {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-sm-12 text-secondary">
                                                    <div class="form-buttons">
                                                        <input style="padding-right: 2.5rem; padding-left: 2.5rem;"
                                                            onclick="topbar.show()" type="submit" req-with value="{{ __('profile_trans.Withdraw') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- withdraw action form end --}}
                                @elseif ($withdrawal_status == 'bank-cards')
                                    {{-- bank card begin --}}
                                    <div role="tabpanel" class="tab-pane active" id="bank-cards">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{__('profile_trans.OWNER NAME')}}</th>
                                                    <th>{{__('profile_trans.BANK NAME')}}</th>
                                                    <th>{{strtoupper(__('profile_trans.IBan'))}} <i class="bx bx-copy"></i></th>
                                                    {{-- <th>ACTIONS</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($user_bank_cards as $bank_card)
                                                    <tr>
                                                        <td>{{\Str::limit($bank_card->owner_name, 20, '...')}}</td>
                                                        <td>{{\Str::limit($bank_card->bank_name, 20, '...')}}</td>
                                                        <td class="copy-clipboard" style="cursor: pointer">{{ \Str::limit($bank_card->iban, 20, '...') }} <span class="d-none">{{$bank_card->iban}}</span></td>
                                                        {{-- <td><button data-toggle="tooltip" data-placement="top" title="{{__('dashboard_trans.DELETE')}}" class="btn btn-danger p-0 pl-2 pr-2 pt-1"><i class="bx bx-trash"></i></button></td> --}}
                                                    </tr>
                                                @empty
                                                    <tr><td colspan="3" class="text-center">{{__('profile_trans.please add bank card')}}</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        {{$user_bank_cards->links()}}

                                        <form wire:submit.prevent='addUserBankCard'>
                                            <div class="row mt-3">
                                                <div class="col-12 justify-content-center">
                                                    <div class="floating-label-wrap">
                                                        <input type="text" class="floating-label-field floating-label-field--s3"
                                                            wire:model='user_bank_card.owner_name'>
                                                        <label for="name" class="floating-label">{{
                                                            __('profile_trans.Name')}}</label>
                                                    </div>
                                                    @error('user_bank_card.owner_name')
                                                        <div class="text-danger">* {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 justify-content-center mt-4">
                                                    <div class="floating-label-wrap">
                                                        <input type="text" class="floating-label-field floating-label-field--s3"
                                                            wire:model='user_bank_card.bank_name'>
                                                        <label for="bank" class="floating-label">{{ __('profile_trans.Bank name')}}</label>
                                                    </div>
                                                    @error('user_bank_card.bank_name')
                                                        <div class="text-danger">* {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 justify-content-center mt-4">
                                                    <div class="floating-label-wrap">
                                                        <input type="text" class="floating-label-field floating-label-field--s3"
                                                            wire:model='user_bank_card.iban'>
                                                        <label for="bank" class="floating-label">{{
                                                            __('profile_trans.IBan')}}</label>
                                                    </div>
                                                    @error('user_bank_card.iban')
                                                        <div class="text-danger">* {{$message}}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-12 text-secondary">
                                                    <div class="form-buttons">
                                                        <input style="padding-right: 2.5rem; padding-left: 2.5rem;"
                                                            onclick="topbar.show()" type="submit" value="{{ __('dashboard_trans.ADD') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- bank card end --}}
                                @else
                                    {{-- history begin --}}
                                    <div role="tabpanel" class="tab-pane active" id="history">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{strtoupper(__('dashboard_trans.STATUS'))}}</th>
                                                    <th>{{strtoupper(__('profile_trans.Amount to be withdrawn'))}}</th>
                                                    <th>{{strtoupper(__('profile_trans.IBan'))}} <i class="bx bx-copy"></i></th>
                                                    <th>{{__('dashboard_trans.ACTIONS')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse (auth()->user()->withdrawals()->paginate(5) as $withdrawal)
                                                    <tr>
                                                        <td><span class="text-light badge bg-{{$withdrawal->state == 'pending' ? 'warning' : ($withdrawal->state == 'accepted' ? 'success' : 'danger')}}">{{__("dashboard_trans.$withdrawal->state")}}</span></td>
                                                        <td>{{$withdrawal->invoice_amount}} {{__('home_trans.SAR')}}</td>
                                                        <td class="copy-clipboard" style="cursor: pointer">{{ \Str::limit($withdrawal->userBankCard->iban, 20, '...') }} <span class="d-none">{{$withdrawal->userBankCard->iban}}</span></td>

                                                        @if ($withdrawal->state == 'pending')

                                                        <td><button onclick="topbar.show()" wire:click='revert({{$withdrawal->id}})' class="bttn btn-purple border-0 p-2 m-0">{{__('dashboard_trans.revert')}}</button></td>

                                                        @else

                                                        <td>{{__('dashboard_trans.NO ACTIONS')}}</td>

                                                        @endif

                                                    </tr>
                                                @empty
                                                    <tr><td colspan="3" class="text-center">{{__('profile_trans.no transactions yet')}}</td></tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- history begin --}}
                                @endif

                            </div>
                            {{-- content end --}}
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

    @if (session()->has('error'))
    <script>
        $.notify("{{ session('error') }}", 'error');
    </script>
    @endif
</section>
