<section id="portfolio" class="portfolio">
<div class="container">
<div class="list-control">
    <ul class="list-unstyled">
        <li class="active" data-filter="*">{{ __('store_trans.All') }}</li>
        <li data-filter=".prj-3" class="">{{ __('store_trans.Business Projects') }}</li>
        <li data-filter=".prj-5" class="">{{ __('store_trans.Management Projects') }}</li>
    </ul>
</div>


<div id="portfolio-grid" class="row no-gutter">

@foreach (App\Models\ReadyProject::get() as $project)
    <div class="item prj-5 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/15" style="border-radius: 16px; cursor: pointer;" src="https://www.ektml.com/catalog/image/15" alt>
            </div>

            <div class="post-txt">
                <a class="post-title" href="{{ route('project', $project->id) }}">{{ $project->name }}</a>

                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>{{ $project->created_at }}</li>
                    <li>1 إعجاب</li>
                </ul>
                <p>{{ $project->description }}</p>

                <div class="footer-post">
                    <div class="tags">
                        <a href="/prj/15">{{ $project->price }} {{ __('home_trans.SAR') }}</a>
                    </div>
                    <div class="action-post">
                        <a href="{{ route('like') }}"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="{{ $project->id }}"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endforeach

</div>
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
