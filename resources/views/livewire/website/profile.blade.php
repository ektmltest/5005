@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.profile')))

@section('content')
@component('layouts.components.rtl-links-css')
@endcomponent

@include('layouts.header', [
    'header' => True,
    'header_head' => ucwords(__('headers.profile.header')),
    'header_body' => ucwords(__('headers.profile.body')),
])


<section id="services" class="single-job inner-services">
<div class="container">
<div class="container">
<div class="main-body">
<div class="row">
<div class="col-lg-4">
<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
            <img src="https://www.ektml.com/avatar/user/723" pImg alt="Omar"
                class="rounded-circle p-1 bg-purple pic1web pic1" width="110">
            <div class="mt-3">
                <h4>Omar elgohary</h4>
                <p class="text-secondary mb-1">
                    User
                </p>
                    <a class="btn btn-purple createPromoCode" href>
                    {{ __('profile_trans.Create Promotion Url') }} <i class="bx bx-wallet"></i>
                </a>
            </div>
        </div>
        <hr class="my-4">
        <div class="list-group">
            <a href="#" mu-tab mu-target="#stats" mu-active
                class="list-group-item list-group-item-action"><i class="bx bx-stats"></i>
                {{ __('profile_trans.statistics') }}</a>

            <a href="#" mu-tab mu-target="#editProf"
                class="list-group-item list-group-item-action"><i class="bx bx-edit"></i>
                {{ __('profile_trans.Edit profile') }}</a>

            <a href="#" mu-tab mu-target="#profilePic"
                class="list-group-item list-group-item-action"><i
                    class="bx bxs-photo-album"></i>
                {{ __('profile_trans.Profile Picture') }}</a>

            <a href="#" mu-tab mu-target="#changePasswordSection"
                class="list-group-item list-group-item-action"><i class="bx bx-lock"></i>
                {{ __('profile_trans.Change Password') }}</a>

            <a href="#" mu-tab mu-target="#reChargeMenu"
                class="list-group-item list-group-item-action"><i class="bx bx-credit-card"></i>
                {{ __('profile_trans.Balance recharge') }}</a>

            <a href="#" mu-tab mu-target="#reqWith"
                class="list-group-item list-group-item-action"><i class="bx bx-money"></i>
                {{ __('profile_trans.Balance withdrawal request') }}</a>
        </div>
    </div>
</div>
</div>

<div class="col-lg-8" id="stats">
    <div class="card">
        <div class="card-body">
            <div class="row">
    <div class="col-sm-6 mb-3 mb-md-0">
        <div class="card text-black bg-purple mb-3">
            <div class="card-header">{{ __('profile_trans.Balance') }}</div>
            <div class="card-body">
                <h5 class="card-title">{{ __('profile_trans.Your wallet') }} <a class="balance mx-1" my-money>0</a>
                    {{ __('profile_trans.Saudi Riyal') }}</h5>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card text-white bg-secondary mb-3">
            <div class="card-header">{{ __('profile_trans.Your Clients') }}</div>
            <div class="card-body">
                <h5 class="card-title">
                    0     {{ __('profile_trans.Clients registered by you') }}</h5>
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
                    0 {{ __('profile_trans.Visitor') }}</h5>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card text-white bg-secondary mb-3">
            <div class="card-header">{{ __('profile_trans.Your Purchases') }}</div>
            <div class="card-body">
                <h5 class="card-title">
                    0  {{ __('profile_trans.Buyer') }}</h5>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<div class="col-lg-8" id="editProf" style="display: none;">
<div class="card">
<form action="https://www.ektml.com/profile/changeData" mu-updateProfile method="POST"
    name='changeData'>
    <div class="card-body">
        <h5 style="color: #4b3da7;"><i class="bx bx-edit mb-4"></i> Edit profile                                    </h5>
        <div class="row mb-4">
            <div class="col-sm-12 input-box">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="firstName" firstName name="firstName"
                        value="Omar">
                    <label for="firstName"
                        class="floating-label">First Name</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 input-box">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="lastName" name="lastName" lastName
                        value="elgohary">
                    <label for="lastName"
                        class="floating-label">Last Name</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 input-box">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="phoneNumber" name="phoneNumber" phoneNumber
                        value="+20115651366">
                    <label for="phoneNumber"
                        class="floating-label">Phone Number</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-secondary">
                <div class="form-buttons">
                    <input style="padding-right: 2.5rem; padding-left: 2.5rem;"
                        type="submit" value="Change">
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
<div class="col-lg-8" id="profilePic" style="display: none;">

<div class="card">
<div class="card-body">
    <h5 style="color: #4b3da7;"><i class="bx bx-edit mb-4"></i> Profile Picture                                </h5>
    <form action="https://www.ektml.com/profile/avatar" pImfForm method="POST">
        <div class="row mb-4">
            <div class="col-sm-12 input-box">
                <div class="floating-label-wrap">
                    <input type="file" name="file" pImgInput
                        onchange="setProfileImage(this)"
                        class="floating-label-field floating-label-field--s3">
                    <label for="fileImg" class="floating-label">Image</label>
                </div>
            </div>
        </div>

        <div class="row justify-content-center my-3">
            <div class="col-xl-12">
                <div class="form-buttons">
                    <input style="padding-right: 2.5rem; padding-left: 2.5rem;"
                        type="submit"
                        value="Save Changes">
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
<div class="col-lg-8" id="reChargeMenu" style="display: none;">

<div class="card">
<div class="card-body">
    <h5 style="color: #4b3da7;"><i class='bx bx-credit-card mb-4'></i>
        Recharge money                                </h5>
        <p style="color: #34d8be;">اولا : قم بتحويل المال الى أحد الحسابات التالية</p>
    <div class="row">
        <div class="col-sm-6 mb-3 mb-md-0">
            <div class="card text-purple mb-3">
                <div class="card-header">Al Rajhi Bank</div>
                <div class="card-body">
                    <div>Account Holder's Name : أحمد يحي شراحيلي</div>
                    <div>IBan : SA4380000246608016064127</div>
                    <div>account number : 246608016064127</div>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card text-purple mb-3">
                <div class="card-header">Bank Al Bilad</div>
                <div class="card-body">
                    <div>Account Holder's Name : أحمد يحي شراحيلي</div>
                    <div>IBan : SA2915000434121839970005</div>
                    <div>account number : 434121839970005</div>
                </div>
            </div>
        </div>
    </div>
    <p style="color: #34d8be;">ثانيا : قم بكتابة المبلغ الذي تم تحويله ورفع صورة من الحواله</p>
    <div class="row">
        <div class="col-12 justify-content-center">
            <div class="floating-label-wrap">
                <input type="number" class="floating-label-field floating-label-field--s3"
                    id="reCost" name="reCost" value="0" />
                <label for="reCost" class="floating-label">Money to recharge</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 justify-content-center mt-4">
            <div class="floating-label-wrap">
                <input type="file" onchange="set7wala(this)"
                    class="floating-label-field floating-label-field--s3">
                <label for="fileImg"
                    class="floating-label">Add a bank transfer photo</label>
            </div>
        </div>
    </div>

    <div class="row justify-content-center my-3">
        <div class="col-xl-12">
            <div class="form-buttons">
                <input req-recharge style="padding-right: 2.5rem; padding-left: 2.5rem;"
                    type="submit"
                    value="Request recharge">
            </div>
        </div>
    </div>
</div>
</div>
</div>


<div class="col-lg-8" id="changePasswordSection" style="display: none;">
<div class="card">
<form action="https://www.ektml.com/profile/passwordChange" method="POST" name='passwordChange'>
    <div class="card-body">
        <h5 style="color: #4b3da7;"><i class="bx bx-lock mb-4"></i>
            Change Password                                    </h5>
        <div class="row mb-4">
            <div class="col-sm-12 input-box">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="oldPassword" name="oldPassword"
                        value="">
                    <label for="oldPassword"
                        class="floating-label">Old Password</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 input-box">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="newPassword" name="newPassword"
                        value="">
                    <label for="newPassword"
                        class="floating-label">New Password</label>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 input-box">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="newPasswordConfirm" name="newPasswordConfirm"
                        value="">
                    <label for="newPasswordConfirm"
                        class="floating-label">Confirm the new password</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 text-secondary">
                <div class="form-buttons">
                    <input style="padding-right: 2.5rem; padding-left: 2.5rem;"
                        type="submit" value="Change">
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>

<div class="col-lg-8" id="reqWith" style="display: none;">

<div>
<ul class="nav nav-tabs" style="" role="tablist">
    <li role="presentation" class="active">
        <a href="#withdraw" aria-controls="withraw" role="tab" data-toggle="tab"
            aria-expanded="true">
            <i class="bx bx-money"></i> Withdraw</a>
    </li>

    <li role="presentation" class="mx-3">
        <a href="#history" aria-controls="history" role="tab" data-toggle="tab"
            aria-expanded="false">
            <i class="bx bx-clipboard"></i> History</a>
    </li>
</ul>
<div class="tab-content my-4">
    <div role="tabpanel" class="tab-pane active" id="withdraw">
        <div class="row">
            <div class="col-12 justify-content-center">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="name" name="name">
                    <label for="name" class="floating-label">Name</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 justify-content-center mt-4">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="bank" name="bank">
                    <label for="bank"
                        class="floating-label">Bank name</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 justify-content-center mt-4">
                <div class="floating-label-wrap">
                    <input type="number"
                        class="floating-label-field floating-label-field--s3" id="balance"
                        name="money">
                    <label for="balance"
                        class="floating-label">Amount to be withdrawn</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 justify-content-center mt-4">
                <div class="floating-label-wrap">
                    <input type="text" class="floating-label-field floating-label-field--s3"
                        id="iban" name="iban">
                    <label for="bank" class="floating-label">IBan</label>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12 text-secondary">
                <div class="form-buttons">
                    <input style="padding-right: 2.5rem; padding-left: 2.5rem;"
                        type="submit" req-with value="سحب">
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
</div>
</div>
</div>
</div>
</section>

<section id="question" class="question">
    <div class="container">
        <div class="row row-aligns">
            <div class="col-lg-8">
                <div class="question-txt">
                    <h3><span>663</span> {{ __('main_trans.User has used') }} <br> {{ __('main_trans.Our services successfullly.') }}</h3>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="question-action">
                    <a class="bttn btn-purple" href="https://www.ektml.com/projects/create">
                        {{ __('main_trans.Start with us now!') }}
                        <i class='bx bx-right-arrow-alt'></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="scroll-top"><i class='bx bxs-chevron-up'></i></div>
<!-- End Back To Top-->
<!-- JS Files -->
<script src="https://www.ektml.com/static/js/plugins.js"></script>
<!-- Modernizer Script for old Browsers -->
<script src="https://www.ektml.com/static/js/modernizr-2.6.2.min.js"></script>
<script>
    let loc = window.location;
    loc = loc.href.split('/');
    const dataToCheck = ['tickets', 'projects'];
    const dontKnow = '';
    dataToCheck.forEach(function(thingToCheck){
        if(loc[3] == thingToCheck){
            if(loc[4] && loc[3] !== dataToCheck[0]){
                var thelocx = window.location.pathname;
                dontKnow = window.location.origin + "/" +thelocx.split('/')[1] +"/"+thelocx.split('/')[2] ;
            } else {
            dontKnow = window.location.origin + "/" +window.location.pathname.split('/')[1];
            }
            $("#clientoptions").addClass('co-purple-imp');
            $("#menuItems li [href='"+dontKnow+"']").addClass('co-purple-imp');
            dontKnow = '';
        }
    });
    $("#menuItems li [href='"+window.location+"']").addClass('co-purple-imp');
    if ('loading' in HTMLImageElement.prototype) {
        const images = document.querySelectorAll('img[loading="lazy"]');
        images.forEach(img => {
        img.src = img.dataset.src;
        });
    } else {
        // Dynamically import the LazySizes library
        const script = document.createElement('script');
        script.src =
        'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.1.2/lazysizes.min.js';
        document.body.appendChild(script);
    }
</script>
<!-- Core JS -->
<script>const translate = {"added":"You have added","toprojectcategories":"To your project categories","areyousure":"Are you sure?","norevert":"You won't be able to revert this!","yesCloseTheTicket":"Yes, Close the Ticket","cancel":"Cancel","ticketcategory":"Please choose a ticket type","ticketsubject":"Please write the Ticket subject","ticketcontent":"Please write the Ticket content","yesdeletethepost":"Yes, delete","edit":"Edit","rateTheProject":"Select a rate","attachMessageWithRate":"Attach a letter with the rate","writeMessageHere":"Write your message here","sendRate":"Rate","sweetAlertBtnJS":"Okay","dataAlreadySaved":"This data is already saved","name_ar":"Arabic name","name_en":"English name","icon":"Icon","priceStartFrom":"Prices start from"}; const token = $("meta[name=token]").attr("content");</script>    <script> const google_site_key = "6LegyqUaAAAAAP1kX1yUg2_iEi2GoSQObBkp0Vo2";</script>
<script src="https://www.ektml.com/static/js/core.js"></script>
<script src="https://www.ektml.com/static/js/pages/profile.js"></script>

</body>
</html>

<script>
    var _7wala
    var reqCh
    var timeout
    var pImg = null
    var titi

function set7wala(e) {
    _7wala = e?.files?. [0]
}

function setProfileImage(e) {
    pImg = e?.files?. [0]
}

function open7walaFile() {
    $(".7walaImg")?.click()
}

$("[pImfForm]").submit(async function(e) {
    e.preventDefault()
    $this = $(this)
    clearTimeout(titi)

titi = setTimeout(async () => {
    try {
        const body = new FormData()
        body.append("token", $("meta[name=token]").attr("content"))
        body.append("file", pImg)
        const _w = await fetch('/profile/avatar', {
            method: "POST",
            body
        })
        const response = await _w.json()
        Toast.fire({
            icon: response.type,
            title: response.message
        })
        if (response?.type == "success") {
            $("[pImg]").attr("src", response.newavatar).fadeIn(2000)
        }
        pImg = null
        $("[pImgInput]").val("")
    } catch {}
}, 601);
})

$(document).ready(() => {
    window.location.hash && $(`[mu-tab][mu-target='${window.location.hash}']`).click()
})

$("[req-recharge]").on("click", async function(e) {
    e.preventDefault()
    clearTimeout(reqCh)
    reqCh = setTimeout(async () => {
        var body = new FormData()
        body.append("cost", $("[name='reCost']")?.val() || 0)
        body.append("img", _7wala)
        const w = await fetch(`/profile/recharge`, {
            method: "POST",
            body
        })
    const json = await w.json()
    Swal.fire({
        icon: json.type,
        text: json.message
    })
    $("[name='reCost']")?.val(0)
}, 500);
})

$("[req-with]").on("click", async function() {
    const cost = $("[name='money']")?.val() || ''
    const name = $("[name='name']")?.val() || ''
    const bank = $("[name='bank']")?.val() || ''
    const iban = $("[name='iban']")?.val() || ''
    var body = new FormData()
    body.append("cost", cost)
    body.append("name", name)
    body.append("bank", bank)
    body.append("iban", iban)
    const w = await fetch('/profile/requestWithdraw', {
        method: "POST",
        body
})
const json = await w.json()
Swal.fire({
    icon: json.type,
    text: json.message
})
json?.type === "success" && $("[my-money]").text(`${json.num}`)
    $("[name='iban']").val('')
    $("[name='bank']").val('')
    $("[name='money']").val('')
    $("[name='name']").val('')
})

const deviceType = () => {
const ua = navigator.userAgent;
if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
    return "tablet";
} else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/
    .test(ua)) {
    return "mobile";
}
return "desktop";
};

$("[mu-tab]").on("click", function(e) {
e.preventDefault()
const $this = $(this)
const _target = $this.attr("mu-target")
const _isActive = $this.attr("mu-active") !== undefined
if (_target === undefined || _isActive) return
const _getActive = $("[mu-active]")
const _activeTarget = $(_getActive.attr("mu-target"))
_activeTarget.css("display", "none")
_activeTarget.css("opacity", "0")
_activeTarget.css("visibility", "visible")
$(_target).removeAttr("style")
_getActive.removeAttr("mu-active")
$this.attr("mu-active", "")

$('html, body').animate({
    scrollTop: $(_target).offset().top - 120
}, 'slow');
})

$(".createPromoCode").on("click", async function(e) {
e.preventDefault()
clearTimeout(timeout)

timeout = setTimeout(async () => {
    const d = await fetch('/profile/createPromoCode', {
        method: 'POST'
    })
    const json = await d.json()
    Toast.fire({
        icon: json.type,
        text: json.message
    })
    if (json?.type === "success") {
        setTimeout(() => {
            window.location.reload()
        }, 400);
    }
}, 750);
})
</script>
@component('layouts.components.rtl-links-js')
@endcomponent
@endsection
