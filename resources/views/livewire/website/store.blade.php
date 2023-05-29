<section id="portfolio" class="portfolio">
<div class="container">
<div class="list-control">
    <ul class="list-unstyled">
        <li class="active" data-filter="*">{{ __('store_trans.All') }}</li>
        <li data-filter=".prj-3" class="">{{ __('store_trans.Business Projects') }}</li>
        <li data-filter=".prj-5" class="">{{ __('store_trans.Management Projects') }}</li>
    </ul>
</div>

<livewire:website.like />

</div>
</section>



<script>
var getlang = 'ar';
var timeout

$("[mu-open]").on("click", function(e) {
const link = $(this)?.attr("mu-link")
if (!link) return
window.location.href = link
})

$(".loveProject").on("click", function(e) {
e.preventDefault()
const projectId = $(this)?.attr("mu-id")
if (!projectId) return
if ($(this)?.attr('mu-notlogged') === "true") {
    return Swal.fire({
        icon: 'error',
        title: getlang == 'en' ? 'You have to be logged in first' : 'يجب عليك تسجيل الدخول للإعجاب'
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
            console.log(response)
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
