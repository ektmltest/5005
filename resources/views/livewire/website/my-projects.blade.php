<div>

<section id="projectsSection" class="faqs-pp">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 mt-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <p class="text-center" style="font-weight: 500;">{{ __('myprojects_trans.The projects') }}</p>
                        <ul class="list-unstyled" id="projectsStatus">
                            <li class="active" id="0"><a href="javascript:;"><i
                                        class='bx bxs-grid'></i>{{ __('myprojects_trans.My projects') }}</a></li>
                            <li id="1"><a href="javascript:;"><i
                                        class='bx bx-alarm'></i>{{ __('myprojects_trans.Await') }}</a></li>
                            <li id="6"><a href="javascript:;"><i
                                        class='bx bx-check'></i>{{ __('myprojects_trans.Accepted') }}</a></li>
                            <li id="7"><a href="javascript:;"><i
                                        class='bx bx-money'></i>{{ __('myprojects_trans.Awaiting payment') }}</a></li>
                            <li id="2"><a href="javascript:;"><i
                                        class='bx bx-edit'></i>{{ __('myprojects_trans.Under implementation') }}</a>
                            </li>
                            <li id="3"><a href="javascript:;"><i
                                        class='bx bx-check-double'></i>{{ __('myprojects_trans.Completed') }}</a></li>
                            <li id="4"><a href="javascript:;"><i
                                        class='bx bx-package'></i>{{ __('myprojects_trans.Delivered') }}</a></li>
                            <li id="5"><a href="javascript:;"><i
                                        class='bx bx-task-x'></i>{{ __('myprojects_trans.Canceled') }}</a></li>
                            <li id="8"><a href="javascript:;"><i
                                        class='bx bx-x-circle'></i>{{ __('myprojects_trans.Rejected') }}</a></li>
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="col-xl-9 col-lg-4">
                <div class="vacan-posts" id="projects">
                    <div class="job-post text-center" style="color: #4b3da7;">
                        <h6>
                            <div class="email-list-item email-list-item--unread">
                                <a class="email-list-detail">
                                    <div>
                                        <p class="msg text-center">
                                            {{ __('myprojects_trans.there is no Projects in this status') }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section>
<!-- End Contact Us -->
<section id="question" class="question">
    <div class="container">
        <div class="row row-aligns">
            <div class="col-lg-8">
                <div class="question-txt">
                    <h3><span>663</span> {{ __('main_trans.User has used') }} <br>
                        {{ __('main_trans.Our services successfullly.') }}</h3>
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

<!-- Start Back To Top-->
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
    dataToCheck.forEach(function(thingToCheck) {
        if (loc[3] == thingToCheck) {
            if (loc[4] && loc[3] !== dataToCheck[0]) {
                var thelocx = window.location.pathname;
                dontKnow = window.location.origin + "/" + thelocx.split('/')[1] + "/" + thelocx.split('/')[2];
            } else {
                dontKnow = window.location.origin + "/" + window.location.pathname.split('/')[1];
            }
            $("#clientoptions").addClass('co-purple-imp');
            $("#menuItems li [href='" + dontKnow + "']").addClass('co-purple-imp');
            dontKnow = '';
        }
    });
    $("#menuItems li [href='" + window.location + "']").addClass('co-purple-imp');
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
<script>
    const translate = {
        "added": "You have added",
        "toprojectcategories": "To your project categories",
        "areyousure": "Are you sure?",
        "norevert": "You won't be able to revert this!",
        "yesCloseTheTicket": "Yes, Close the Ticket",
        "cancel": "Cancel",
        "ticketcategory": "Please choose a ticket type",
        "ticketsubject": "Please write the Ticket subject",
        "ticketcontent": "Please write the Ticket content",
        "yesdeletethepost": "Yes, delete",
        "edit": "Edit",
        "rateTheProject": "Select a rate",
        "attachMessageWithRate": "Attach a letter with the rate",
        "writeMessageHere": "Write your message here",
        "sendRate": "Rate",
        "sweetAlertBtnJS": "Okay",
        "dataAlreadySaved": "This data is already saved",
        "name_ar": "Arabic name",
        "name_en": "English name",
        "icon": "Icon",
        "priceStartFrom": "Prices start from"
    };
    const token = $("meta[name=token]").attr("content");
</script>
<script>
    const google_site_key = "6LegyqUaAAAAAP1kX1yUg2_iEi2GoSQObBkp0Vo2";
</script>
{{-- <script src="https://www.ektml.com/static/js/core.js"></script> --}}
<script src="https://www.ektml.com/static/js/pages/projects.js"></script>

</div>
