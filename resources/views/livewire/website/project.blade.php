<section id="blog-pp" class="blog-pp single-pp">
<div class="container">
<div class="row">

<div class="col-lg-4 col-sm-12 order-2 order-lg-1">
    <div class="blog-sidebar">

        <div class="sidebox social-share">
            <div class="row no-gutters">
                <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                    <a target="_blank" href="https://facebook.com/ektml" class="bg-fb">
                        <div class="name-icon">
                            <i class="bx bxl-facebook"></i>
                            <span>{{ __('project_trans.Facebook') }}</span>
                        </div>
                        <span class="count">235 +</span>
                    </a>
                </div>

                <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                    <a target="_blank" href="https://www.twitter.com/ektml_sa" class="bg-tw">
                        <div class="name-icon">
                            <i class="bx bxl-twitter"></i>
                            <span>{{ __('project_trans.Twitter') }}</span>
                        </div>
                        <span class="count">255 +</span>
                    </a>
                </div>

                <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                    <a target="_blank" href="http://instagrm.com/ektml_sa" class="bg-insta">
                        <div class="name-icon">
                            <i class="bx bxl-instagram"></i>
                            <span>{{ __('project_trans.Instagram') }}</span>
                        </div>
                        <span class="count">878 +</span>
                    </a>
                </div>

                <div class="col-md-6 col-6 col-lg-12 col-xl-6">
                    <a target="_blank" href="https://t.me/ektml_sa" class="bg-linked">
                        <div class="name-icon">
                            <i class="bx bxl-telegram"></i>
                            <span>{{ __('project_trans.Telegram') }}</span>
                        </div>
                        <span class="count">332 +</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="sidebox sidebox-style">
            <h5><i class="bx bx-cart-alt"></i>{{ __('project_trans.Buy Project') }}</h5>
            <div class="sidebox-inner newsletter">
                <h5 class="mb-3" style="justify-content: space-between;">{{ __('project_trans.Project Price') }}
                    <span class="pCost">{{ $project->price }} {{ __('project_trans.SAR') }}</span>
                </h5>

                <div class="[mu-features]" style="margin-bottom: 15px;">
                    <p style="margin: 0px 0px 7px 0px !important;"><i class="bx bx-check"></i>{{ __('project_trans.Free installation') }}</p>
                    <p style="margin: 0px 0px 7px 0px !important;"><i class="bx bx-check"></i>{{ __('project_trans.Free domain') }}</p>
                    <p style="margin: 0px 0px 7px 0px !important;"><i class="bx bx-check"></i>{{ __('project_trans.One month technical support') }}</p>
                </div>

                <h5>{{ __('project_trans.Plugins')}}</h5>
                <div style="list-style-type: none;">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" mu-addon mu-cost="400" type="checkbox"
                                id="addons" mu-id="1">
                            <label class="form-check-label">
                                {{ __('project_trans.Maintenance and cyber security contract') }} (400) / {{ __('project_trans.Monthly') }}
                            </label>
                        </div>
                    </li>
                </div>

                <div style="list-style-type: none;">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" mu-addon mu-cost="200" type="checkbox"
                                id="addons" mu-id="2">
                            <label class="form-check-label">
                                {{ __('project_trans.Auto coupons') }} (200) / {{ __('project_trans.Monthly') }}
                            </label>
                        </div>
                    </li>
                </div>

                <a href="#" class="btn btn-block btn-icon btn-success mt-4 buyProject" mu-id="3" style="text-align: center;"mu-notlogged="true">{{ __('project_trans.Buy Project') }}<i class="bx bx-cart-alt"></i></a>
            </div>
        </div>

        <div class="sidebox sidebox-style">
            <h5><i class="bx bx-share-alt"></i>{{ __('project_trans.Affiliate Marketing') }}</h5>
            <div class="sidebox-inner txt-widget">
                <p style="color: #4b3da7;margin: 0px 0px 15px 0px !important;">
                    <i class="bx bxs-dollar-circle" style="font-size: large;"></i>
                    {{ __('project_trans.Your commission is') }} ( {{ $project->price * 15/100 }} {{ __('project_trans.SAR') }}) {{ __('project_trans.per purchase') }}
                </p>
                    <a class="bttn btn-purple createProjectPromo" mu-id="3" mu-notlogged="true" href>{{ __("project_trans.Create promo url") }}<i class="bx bx-money"></i>
                </a>
            </div>
        </div>

        <div class="sidebox sidebox-style gallery-container">
            <h5><i class="bx bx-images"></i>معرض المشاريع</h5>
            <div class="sidebox-inner gallery">
                <div class="gallery-feed">
                    @foreach(\App\Models\ReadyProject::select('image')->get() as $gallary)
                        <a href="{{ asset('assets/img/'.$gallary->image) }}" target="_blank"><i class="bx bx-search-alt"></i>
                            <img src="{{ asset('assets/img/'.$gallary->image) }}" alt="Business Blog">
                        </a><a href="/prj/2"><i class="bx bx-search-alt"></i>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

<div class="col-lg-8 col-sm-12 order-1 order-lg-2">
    <div class="post-item">
        <div class="post-img mb-4">
            <img class="img-fluid" src="{{ asset('assets/img/'.$project->image) }}" alt="">
        </div>

        <div style="width: 40%;">
            <a href="https://demo.ektml.com/4" target="_blank" class="btn btn-block btn-icon btn-purple mt-4 justify-content-center"><i class="bx bx-show"></i> عرض المثال</a>
        </div>

        <div class="post-txt">
            <a class="post-title" href="#">{{ $project->name }}</a>
            <ul class="list-unstyled post-details">
                <li></li>
                <li>{{ $project->created_at }}</li>
                <li>4 إعجاب</li>
            </ul>

    <p><p style="margin-top:0px;margin-bottom:1rem;font-size:14px;font-weight:400;color:#718096;font-family:'SST Arabic';text-align:right;">{{ __('project_trans.basmala') }}</p></p>
    <h5 style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;color:#212529;font-family:'SST Arabic';text-align:right;"><span style="color:#843fa1;">{{ __('project_trans.Project Idea') }}  :</span></h5>

    <p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">{{ $project->body }}</p>

        <div class="footer-post">
            <div class="tags">
                <a href="#">{{ __('project_trans.coupon') }}</a>
            </div>
            <div class="action-post">
                <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="true" mu-id="3"></i></a>
            </div>
        </div>
    </div>

    <div class="pagi-post">
        <a href="#" class="prev-post">
            <p><i class="bx bx-right-arrow"></i>
                {{ __('project_trans.PREVIOUS PROJECT') }}</p>
            <h6></h6>
        </a>
        <a href="#" class="next-post">
            <p><i class="bx bx-left-arrow"></i>
                {{ __('project_trans.NEXT PROJECT') }}</p>
            <h6></h6>
        </a>
    </div>
    </div>

</div>
</div>
</div>
</section>



<script>
const code_to_copy = '';

const currency = 'ريال سعودي';
const normalCost = 1300;
var addonsInCell = []
$("[mu-addon]").on("change", function() {
    const _id = $(this).attr("mu-id")
    if (!_id) return

    $(this)?.is(":checked") && !addonsInCell.includes(_id) && addonsInCell.push(_id) || removeOne(_id)
    refreshAddonsCost()
})

function refreshAddonsCost() {
    let newCost = normalCost
    $("[mu-addon]").each((i, el) => {
        const _id = $(el).attr("mu-id")
        if (_id && addonsInCell.includes(_id)) {
            newCost += parseInt($(el).attr("mu-cost"))
        }
    })
    $(".pCost").text(`${newCost} ${currency}`)
}

function removeOne(_id) {
    addonsInCell = addonsInCell.filter(d => d !== _id)
}

const Toast = Swal.mixin({
    toast: true,
    position: "bottom-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
})

var getlang = 'ar';
var timeout
var mux
var buy

async function revealPagi() {
    const a = await fetch(`https://www.ektml.com/catalog/pagi/2`)
    const data = await a.json()
    ///////// PREV!
    if (!(!data?.status || !data?.result?.prev?.length)) {
        const d = data?.result?.prev.reverse()[0]
        $(".prev-post").attr("href", `/prj/${d.id}`)
        $(".prev-post h6").text(d[`name_${getlang}`])
    } else {
        $(".prev-post").removeAttr("href")
        $(".prev-post h6").text(getlang == 'en' ? "not found" : "لا يوجد")
    }

    ///////// NEXT!
    if (!(!data?.status || !data?.result?.next?.length)) {
        const d = data?.result?.next.reverse()[0]
        $(".next-post").attr("href", `/prj/${d.id}`)
        $(".next-post h6").text(d[`name_${getlang}`])
    } else {
        $(".next-post").removeAttr("href")
        $(".next-post h6").text(getlang == 'en' ? "not found" : "لا يوجد")
    }

    ////////// RANDOM!
    $(".gallery-feed").html('')
    const random = data.result.random.filter(i => i.img != null)
    if (random.length) {
        for (let _ of random) {
            const x = $("<a>")
            x.attr("href", `/prj/${_.id}`)
            x.html(`<i class="bx bx-search-alt"></i>
            <img src="/catalog/image/${_.id}" alt="${_.name_en}">`)
            $(".gallery-feed").append(x)
        }
    } else {
        $(".gallery-container").remove()
    }
}
revealPagi()

$(".buyProject").on("click", function(e) {
    e.preventDefault()

    const projectId = $(this)?.attr("mu-id")
    if (!projectId) return
    if ($(this)?.attr('mu-notlogged') === "true") {
        return Swal.fire({
            icon: 'warning',
            title: getlang == 'en' ? 'You have to be logged in first' : 'يجب عليك تسجيل الدخول'
        })
    }

    clearTimeout(buy)
    const $this = $(this)

    buy = setTimeout(async () => {
        var body = new FormData()
        body.append('addons', addonsInCell.toJson())
        const a = await fetch(`/catalog/buy/${projectId}`, {
            method: 'POST',
            body
        })
        const data = await a.json()
        Swal.fire({
            icon: data.type,
            text: data.message,
            showCancelButton: true,
            confirmButtonText: getlang == 'en' ? "Recharge money" : "تعبئة الرصيد",
            cancelButtonText: getlang == 'en' ? "Close" : "إغلاق",
            confirmButtonColor: '#5c50b0',
            cancelButtonColor: '#d33'
        }).then(d => {
            d.isConfirmed && window.open('/profile#reChargeMenu', '_blank').focus()
        })
        if (data?.redirect) {
            setTimeout(() => {
                window.location.href = data.redirect
            }, 1750);
        }
    }, 801);
})

function copyToClipBoard(txt) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(txt).select();
    document.execCommand("copy");
    $temp.remove();
}

$(".copyPromoUrl").on("click", function(e) {
    const code = $(this).attr("mu-code")
    const subCode = $(this).attr("mu-subcode")
    if (!code || !subCode) return
    copyToClipBoard(`${window.location.origin}/p/${subCode}`)
    Toast.fire({
        icon: "success",
        text: getlang == 'en' ? "Copied!" : "تم النسخ"
    })
})

$(".createProjectPromo").on("click", async function(e) {
    e.preventDefault()

    const projectId = $(this)?.attr("mu-id")
    if (!projectId) return
    if ($(this)?.attr('mu-notlogged') === "true") {
        return Swal.fire({
            icon: 'warning',
            title: getlang == 'en' ? 'You have to be logged in first' : 'يجب عليك تسجيل الدخول'
        })
    }

    clearTimeout(mux)
    const $this = $(this)

    mux = setTimeout(async () => {
        const a = await fetch(`/catalog/createPromoProject/${projectId}`, {
            method: "POST"
        })
        const json = await a.json()
        Toast.fire({
            icon: json.type,
            text: json.message
        })
        if (json.type === "success") {
            $this.remove()
            setTimeout(() => {
                window.location.reload()
            }, 1000);
        }
    }, 350);
})

$(".loveProject").on("click", function(e) {
    e.preventDefault()
    const projectId = $(this)?.attr("mu-id")
    if (!projectId) return
    if ($(this)?.attr('mu-notlogged') === "true") {
        return Swal.fire({
            icon: 'warning',
            title: getlang == 'en' ? 'You have to be logged in first' : 'يجب عليك تسجيل الدخول'
        })
    }
    clearTimeout(timeout)

    timeout = setTimeout(() => {
        $.ajax({
            url: '/catalog/like',
            type: "POST",
            data: {
                projectId
            },
            success: (response) => {
                if (response?.status === true) {
                    if (response?.result === true) {
                        $(this).addClass("bxs-heart")
                        $(this).removeClass("bx-heart")
                    } else {
                        $(this).removeClass("bxs-heart")
                        $(this).addClass("bx-heart")
                    }
                }
            },
            error: () => {},
            beforeSend: () => {}
        })
    }, 750);
})
</script>
