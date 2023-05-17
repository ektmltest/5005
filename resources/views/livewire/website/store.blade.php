@extends('layouts.app')

@section('title', ucwords(__('main_trans.app_name')) . ' - ' . ucwords(__('pages.store')))

@section('content')

@component('layouts.components.rtl-links-css')
@endcomponent

@include('layouts.header', [
    'header' => True,
    'header_head' => ucwords(__('headers.store.header')),
    'header_body' => ucwords(__('headers.store.body')),
])



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
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/1"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/1" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/1">{{ __('store_trans.Business Projects') }}</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/04/20</li>
                    <li>9 {{ __('store_trans.likes') }}</li>
                </ul>
                <p>إمتلك موقع لنشر الأخبار والمقالات العامه , وإكسب المال ...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/1">950 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="1"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/2"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/2" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/2">مشروع كوبونات الخصم</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/04/22</li>
                    <li>9 إعجاب</li>
                </ul>
                <p>موقع متخصص لعرض كوبونات خصم اي متجر الكتروني ويمكنك اضا...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/2">1300 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="2"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/3"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/3" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/3">موقع حجوزات الفنادق</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/04/23</li>
                    <li>4 إعجاب</li>
                </ul>
                <p>مشروع مثل موقع المسافر و بوكينق لحجز الفنادق...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/3">1700 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="3"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/4"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/4" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/4">مشروع الدورات التدريبية</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/04/26</li>
                    <li>6 إعجاب</li>
                </ul>
                <p>موقع لعرض وبيع الدورات التدريبيه وكذلك إكتساب عموله من ...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/4">1500 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="4"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/5"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/5" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/5">مشروع سكربت قرآن للجميع</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/04/27</li>
                    <li>5 إعجاب</li>
                </ul>
                <p>إمتلك موقع قرآن كريم كاملا مع التفسير و الإستماع بالإضا...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/5">450 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="5"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/6"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/6" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/6">مشروع حراج</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/05/01</li>
                    <li>5 إعجاب</li>
                </ul>
                <p>امتلك موقع مثل موقع حراج المشهور , بتصميم وميزات أحدث...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/6">1450 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="6"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/7"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/7" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/7">مشروع قص الروابط</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/05/07</li>
                    <li>5 إعجاب</li>
                </ul>
                <p>يمكنك في هذا المشروع جمع مسوقين بالعمولة للعمل معك وكسب...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/7">1690 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="7"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/8"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/8" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/8">مشروع متجر متعدد التجار</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/05/17</li>
                    <li>3 إعجاب</li>
                </ul>
                <p>امتلك موقع وتطبيق مثل ( علي اكسبريس ) الشهير , بحيث يمك...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/8">2800 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="8"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/9"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/9" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/9">مشروع مزاد</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/06/08</li>
                    <li>4 إعجاب</li>
                </ul>
                <p>امتلك مشروع يساعد التجار والشركات من جميع أنحاء العالم ...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/9">1780 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="9"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/10"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/10" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/10">الخدمات الألكترونية</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/06/15</li>
                    <li>4 إعجاب</li>
                </ul>
                <p>يمكنك في هذا المشروع تقديم خدماتك الالكترونية او التسوي...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/10">1450 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="10"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/11"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/11" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/11">مشروع رسالة مجهول</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/06/26</li>
                    <li>4 إعجاب</li>
                </ul>
                <p>مشروع رسالة مجهول حيث تمكن الزائر من كتابة رسالة مجهولة...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/11">1690 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="11"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/12"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/12" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/12">مشروع عقارات</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2022/07/10</li>
                    <li>3 إعجاب</li>
                </ul>
                <p>مشروع اعلانات العقارات...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/12">2900 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="12"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/13"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/13" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/13">مشروع منصة الوظائف</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2023/01/07</li>
                    <li>2 إعجاب</li>
                </ul>
                <p>هذا المشروع هو عبارة عن منصة تجمع بين الباحثين عن العمل...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/13">990 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="13"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-3 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/14"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/14" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/14">مشروع رفع الملفات</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2023/01/25</li>
                    <li>1 إعجاب</li>
                </ul>
                <p>المشروع عبارة عن موقع رفع ملفات
<br />
<br />زي موقع me...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/14">850 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="14"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="item prj-5 col-md-4 mb-4">
        <div class="post-item">
            <div class="post-img">
                <img class="img-fluid" mu-open mu-link="/prj/15"
                    style="border-radius: 16px; cursor: pointer;"
                    src="https://www.ektml.com/catalog/image/15" alt>
            </div>
            <div class="post-txt">
                <a class="post-title" href="/prj/15">مشروع إدارة الشركات والمشاريع</a>
                <ul class="list-unstyled post-details">
                    <li></li>
                    <li>2023/05/06</li>
                    <li>1 إعجاب</li>
                </ul>
                <p>مشروع يساعدك على ادارة وتنظيم نشاطك التجاري وطاقم عملك ...</p>
                <div class="footer-post">
                                                <div class="tags">
                                                        <a href="/prj/15">950 ريال</a>
                                                    </div>
                                                <div class="action-post">
                                                        <a href="#"><i class="bx bx-heart loveProject"
                                mu-notlogged=""
                                mu-id="15"></i></a>
                                                    </div>
                </div>
            </div>
        </div>
    </div>
            </div>
</div>
</section>
{{--
<!--<section id="blog-pp portfolio" class="blog-pp portfolio">
<div class="container">
<div class="list-control">
    <ul class="list-unstyled">
        <li class="active" data-filter="*">الكل</li>
        <li>المشاريع الربحية</li><li>المشاريع الإدارية</li>            </ul>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/1" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/1">المقالات الربحية</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/04/20</li>
                        <li>9 إعجاب</li>
                    </ul>
                    <p><h5><span style="color:#843fa1;">فكرة المشروع :</span></h5>
<h5><span style="color:#843fa1;"><br /></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">بسم الله الرحمن الرحيم<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">أولا لو حاب تلخص على نفسك قراءة فكرة المشروع اللي مكتوبة تحت تقدر تتابع هذا الفيديو :</span><br /><a href="https://youtu.be/JF2m3XwwAO4"><span style="font-size:14px;font-weight:400;">https://youtu.be/JF2m3XwwAO4</span></a></span></h5>
<p><strong><span style="color:#34d8be;">والآن نشرح المشروع بالتفصيل :</span></strong></p>
<p>في هذا المشروع راح يصير عندك موقع الكتروني تنزل فيه مقالات بشكل عام<br />مثلا : موقع اعلانات الوظائف<br />(مع العلم مب شرط اعلانات وظائف تقدر تخليه اي شي في يعجبك، هذا مجرد مثال لتتضح الفكرة للجميع) <br />يصير تنشر في موقعك اخبار او مقالات عن وظائف جديدة لجلب الزوار وراح نركب لك على الموقع اضافة بحيث ان الموقع حقك يجيب مقالات اتوماتيك من المواقع الثانيه يعني مايحتاج تدور على اخر اعلانات الوظايف اللي تنزل وتقعد تكتبها ومع العلم ان الطريقه هذي قانونيه.  او مثلا موقع اخبار الرياضه او مقالات عامه او اخبار عامه الخ... <br />او حتى ممكن كلها .</p>
<h4 class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.5rem;color:#212529;font-family:'SST Arabic';"><span style="font-weight:bolder;"><span style="color:#34d8be;font-size:10pt;">كيف راح تكسب من المشروع ؟ :</span></span></h4>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">بعد برمجة موقعك يتم ربطه مع احد شركات الإعلانات مثل Google Adsens المعروفة عالميا بعد الربط بمجرد انه اي زائر يخش موقعك يشوف اي خبر أو مقالة مباشره راح تجيك انت ارباح ولو ضغط على اي اعلان طالع قدامه من اعلانات قوقل راح تجيك ارباح اكثر علما انه اسعار الاعلانات تتغير وليست ثابته. مثلا فيه اعلانات اذ الواحد ضغط عليها واحد بس راح تاخذ 0,60 سنت دولار يعني 1،85 ريال تقريبا ونفس الاعلان هذا اذ محد ضغط عليه بس مجرد انه خش موقعك فقط وظهر له الإعلان راح تاخذ 0،06 سنت دولار .<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">مثال :<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">لو خش موقعك يوميا 3 الف زائر وكلهم ماضغطو على اي اعلان , كم راح يكون مكسبك؟<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">( 0،06 سنت في 3 الف ) = 180 دولار يوميا / يعني 675 ريال سعودي يوميا <br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">هذا لو محد ضغط على الاعلان من الـ 3 الف زائر اللي راح يخشون موقعك يوميا عشان بس يشوفون اخبار الوظايف<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">يعني هذي اقل احتماليه فما بالك لو انت اضفت اقسام ثانيه غير اعلانات الوظايف وناس ضغطو على الاعلانات<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">وايضا كان سعرها اكثر من 0،06 راح يكون ربحك اكثر من 675 ريال يوميا بإذن الله , هذا طبعا غير انه اذ كلموك اشخاص او شركات بنفسهم يبون يعلنون داخل موقعك وانت تركب لكهم الإعلان يدويا من لوحة التحكم هذي عندك بكيفك وانت اللي تحدد السعر. <br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">في البدايات راح تتعب شوي عشان بس تنشر موقعك يعني النشر هو اللي بيتعبك لو انت ماودك تدفع عشان تنشر موقعك عند مشاهير بعد فتره هو بينتشر لحاله بنتائج البحث في قوقل ولو نشرته وجاك عدد كبير ف خلاص كذا مو ناقصك اي شي تسويه لأنه اصلا راح نسوي لك طريقه حلوه بالبرمجه ويصير موقعك يجيب الاخبار اوتوماتيك من المواقع الثانيه زي ماشرحنا فوق , وانت طبعا لازم تسوي حسابات في منصات التواصل الإجتماعي عشان يصير عندك جمهور ثابت ويتابعونك اول بأول اذ نزلت اي خبر تكون ضامن انه راح خش زوار لموقعك وانت طبعا ماراح تنزل خبر واحد بس في اليوم !!! اكيد راح تنزل اقل شي 30 خبر (اقل احتمال) وبكذا يكون خش موقعك تقريبا 5500 واحد يوميا. <br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">كم الخسائر؟  بإذن الله ماراح تخسر ليه؟!!! <br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">لأنه راح نسوي لك الموقع مع الاضافات مع شروحات فيديو جاهزة شرحنا لك فيها كيف تدير موقعك بالكامل مع تصميم شعار الموقع كلها ب 950 ريال فقط لمره واحده , بس لازم تحط في الحسبان انك راح تدفع 50 ريال شهريا من الشهر القادم سعر قيمة السيرفر اللي راح يشتغل عليه موقعك وهذا شي اساسي لأي موقع .</span></span></p>
<h5><span style="color:#843fa1;">الميزات :</span></h5>
<p style="text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">* امكانية ربط الموقع مع حسابات التواصل لنشر المقالات اليها تلقائيا .<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">* لوحة تحكم كامله وسهلة الإستخدام ويمكن استخدامها من اي جهاز.<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">* يتم سحب المقالات من مختلف المواقع الى موقعك بدون عناء .<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">* خدمة SEO جاهزة ويمكن الإطلاع عليها من لوحة التحكم .<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">* امكانية اضافة وتعديل وحذف الأقسام داخل الموقع .<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">* الموقع متناسق مع جميع الأجهزة وسهل الإستخدام .<br /></span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;">* امكانية تغيير لون الموقع كاملا بضغطة زر .</span></span></p>
<h5 style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;color:#212529;font-family:'SST Arabic';text-align:right;"><span style="color:#843fa1;">تجارب العملاء السابقين :</span></h5>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;font-weight:400;color:#718096;font-family:'SST Arabic';text-align:right;">بعض المواقع الناجحة لعملائنا  (الذين قاموا بشراء نفس المشروع)<br /><a style="color:#007bff;" href="https://wa3k.com/">wa3k.com</a><br /><a style="color:#007bff;" href="https://saudispeed.net/">saudispeed.net</a><br /><a style="color:#007bff;" href="https://al-shumukh.com/">al-shumukh.com</a><br /><a style="color:#007bff;" href="https://eop1.com/">eop1.com</a><br /><a style="color:#007bff;" href="https://eop1.com/">dliljob.com</a><br /><a style="color:#007bff;" href="https://e-comc.com/"> e-comc.com</a><br /><a style="color:#007bff;" href="https://e-comc.com/">saam-a.com</a><br /><a style="color:#007bff;" href="https://e-comc.com/">a8laam.com</a></p>
<h4 class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.5rem;color:#212529;font-family:'SST Arabic';"><span style="color:#843fa1;">الخدمات المجانية :</span></h4>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">* دومين مجاني لمدة سنة<br />* سيرفر مجاني لمدة شهر<br />* دعم فني مستمر / عبر الوآتساب</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )<br />والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي <br />لازم تحط في الحسبان انك راح تدفع :<br />* 50 ريال شهريا ( للسيرفر )<br />* 80 ريال سنويا ( للدومين )</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا كـ دعم منا لتبدأ مشروعك بأقل التكاليف الممكنة .</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;"><span style="color:#34d8be;">والله ولي التوفيق</span></p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="1"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/2" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/2">مشروع كوبونات الخصم</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/04/22</li>
                        <li>9 إعجاب</li>
                    </ul>
                    <p><h4 class="MsoNormal" dir="rtl" style="text-align:center;"><span style="color:#34d8be;">بسم الله الرحمن الرحيم</span></h4>
<h2 class="MsoNormal" dir="rtl"><span style="color:#843fa1;font-size:14pt;">فكرة المشروع :</span></h2>
<p style="text-align:right;"> </p>
<p style="text-align:right;">هذا المشروع هو موقع لنشر كوبونات الخصم للمتاجر والشركات المختلفة على الإنترنت. يتيح الموقع للمستخدمين البحث عن الخصومات والعروض الترويجية المختلفة واستخدامها بسهولة. ويمكن لأي شخص الاستفادة من هذا الموقع بشرائه والبدء في تجارته الإلكترونية</p>
<h4 class="MsoNormal" dir="rtl"><strong><span style="color:#34d8be;font-size:10pt;">والآن نشرح المشروع بالتفصيل :</span></strong></h4>
<p class="MsoNormal" dir="rtl">مشروع كوبونات الخصم هو موقع إلكتروني مع تطبيق للهواتف الذكية يهدف إلى توفير أفضل العروض الترويجية والخصومات للمستخدمين الذين يتسوقون عبر الإنترنت. يعتبر المشروع فريدًا من نوعه حيث يجمع بين العديد من المتاجر الإلكترونية والشركات في مكان واحد، وهو يستهدف جميع أصحاب الاهتمامات والميزانيات.<br />طريقة عمل المشروع بسيطة وسهلة. يمكن للمتاجر والشركات التي تود تقديم خصوماتها وعروضها، الاتصال بك وإضافة عروضهم إلى الموقع بكل سهولة. او يمكنك اضافتها بنفسك بدون الحاجة الى انتظار الاتصال بهم وذلك بجلب الكوبونات من مجموعة مصادر متحدثه بإستمرار والتي سنرسلها لك بعد شرائك لهذا المشروع .<br />يستطيع المستخدمون الوصول إلى العروض المضافة بسهولة، حيث يمكنهم البحث عن العروض المناسبة لهم من خلال استخدام خيارات البحث المختلفة المتاحة في الموقع. بمجرد العثور على العرض الذي يريدونه، يمكنهم الحصول على الرمز الترويجي أو الكوبون الذي يمكنهم استخدامه للحصول على الخصم عند شراء المنتجات المختارة.<br />يوفر المشروع فوائد عديدة، فهو يمكن أصحاب الأعمال من زيادة حركة مبيعاتهم عن طريق جذب عملاء جدد، وتحسين تجربة التسوق لعملائهم الحاليين. بالإضافة إلى ذلك، يمكن للمستخدمين توفير المال عند شراء المنتجات التي يحتاجونها، وهو ما يساعد في جعل التسوق عبر الإنترنت أكثر متعة واقتصادية.<br />باختصار، يعد مشروعك فرصة لا يمكن تفويتها لبدء تجارة إلكترونية ناجحة ومربحة. فهو يوفر الكثير من الوقت والجهد في البحث عن العروض الترويجية والخصومات عبر الإنترنت، ويسهل عملية الشراء للمستخدمين، ويساعدهم على توفير المال عند شراء المنتجات المفضلة لديهم.<br />وأخيرًا، إذا كنت ترغب في بيع مشروعك في المستقبل، فإنه يمكنك أن تستفيد من الأرباح المتحققة وتبيع الموقع بمبلغ أعلى بكثير من تكلفة شرائه.</p>
<h4 class="MsoNormal" dir="rtl"><strong><span style="color:#34d8be;font-size:10pt;">كيف راح تكسب من المشروع ؟ :</span></strong></h4>
<p class="MsoNormal" dir="rtl">بعد برمجة موقعك الإلكتروني، يمكنك ربطه بشركات الإعلانات مثل Google AdSense التي تعتبر واحدة من أشهر شركات الإعلانات على مستوى العالم. بمجرد الربط، يمكنك الحصول على أرباح من خلال إعلانات الشركة التي تظهر على موقعك. وعندما يتم النقر على أي إعلان موجود على موقعك، ستحصل على أرباح أكبر. تتغير أسعار الإعلانات باستمرار، فمثلاً يمكن أن تتحصل على 0.60 سنت دولار (1.85 ريال تقريباً) إذا قام أحد بالنقر على الإعلان، بينما تحصل على 0.06 سنت دولار إذا مرر أحدهم فقط بموقعك وظهر الإعلان لديه.<br />من المثال يمكن معرفة كم ستحصل من الأرباح في حالة عدم النقر على أي إعلان، فلو كان عدد زوار موقعك يومياً 3000 شخص ولم ينقر أي شخص على أي إعلان، فستحصل على 180 دولار يومياً (675 ريال سعودي تقريباً). وهذا الرقم يمثل الحد الأدنى، وقد تحصل على أرباح أكبر إذا تم النقر على الإعلانات أو إذا تم إضافة قسم جديد على موقعك. بالإضافة إلى ذلك، يمكنك جذب الإعلانات من خلال تواصلك مع الشركات المهتمة بالإعلانات، وتقديم خدمات الإعلانات المدفوعة.<br />في البداية، ستحتاج إلى بذل بعض الجهود في الترويج لموقعك لتزيد من عدد الزيارات. ومن ثم، يمكن لموقعك أن يترشح للظهور في نتائج البحث في محركات البحث</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">الميزات:</span></h4>
<p class="MsoNormal" dir="rtl">* إمكانية إضافة اقسام رئيسية وأقسام فرعية وحذفها بكل سهولة لتظيم الكوبونات مثال:<br />    قسم (الطعام والشراب) ويحتوي على كوبونات المطاعم فقط.<br />* إضافة كوبونات خاصة بالمتاجر,المطاعم.<br />* التحكم في نصوص الموقع بالكامل والتعديل عليها بكل سهولة.<br />* بضغطة زر واحدة يمكنك تحويل الموقع إلى وضع الصيانة وبالتالي لا يمكن لأي مستخدم زيارة الموقع إلا صاحب المشروع فقط.<br />* التعديل على الوان الموقع الرئيسية.<br />* إمكانية ربط الموقع مع حسابات التواصل لنشر المقالات اليها تلقائيا.<br />* لوحة تحكم كامله وسهلة الاستخدام ويمكن استخدامها من اي جهاز.<br />* الموقع متناسق مع جميع الأجهزة وسهل الإستخدام.</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">تجارب العملاء :</span></h4>
<p class="MsoNormal" dir="rtl">بعض المواقع الناجحة لعملائنا ( الذين قاموا بشراء نفس هذا المشروع )<br /><a href="https://59myat.com"><span style="color:#007bff;">59myat.com<br /></span></a><a href="https://code-te8.com"><span style="color:#007bff;">code-te8.com</span></a></p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">الخدمات المجانية :</span></h4>
<p class="MsoNormal" dir="rtl">* دومين مجاني لمدة سنة</p>
<p class="MsoNormal" dir="rtl">* سيرفر مجاني لمدة شهر</p>
<p class="MsoNormal" dir="rtl">* دعم فني مستمر / عبر الوآتساب</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">المتطلبات :</span></h4>
<p class="MsoNormal" dir="rtl">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )<br />والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي <br />لازم تحط في الحسبان انك راح تدفع :<br />* 50 ريال شهريا ( للسيرفر )<br />* 80 ريال سنويا ( للدومين )</p>
<p class="MsoNormal" dir="rtl">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا كـ دعم منا لتبدأ مشروعك بأقل التكاليف الممكنة .</p>
<p class="MsoNormal" dir="rtl"><span style="color:#34d8be;">والله ولي التوفيق</span></p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="2"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/3" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/3">موقع حجوزات الفنادق</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/04/23</li>
                        <li>4 إعجاب</li>
                    </ul>
                    <p><p style="margin-top:0px;margin-bottom:1rem;font-size:14px;font-weight:400;color:#718096;font-family:'SST Arabic';text-align:right;">بسم الله الرحمن الرحيم </p>
<h5 style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;color:#212529;font-family:'SST Arabic';text-align:right;"><span style="color:#843fa1;">فكرة المشروع :</span></h5>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;font-weight:400;color:#718096;font-family:'SST Arabic';text-align:right;"><span style="font-weight:bolder;"><span style="color:#34d8be;">والآن نشرح المشروع بالتفصيل :</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">في هذا المشروع راح نسوي لك موقع بإذن الله تقدر عن طريقه تعرض غرف وفنادق للإيجار زي موقع المسافر والناس ، تقدر تخش موقعك و تستأجر الغرف منه</span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;"> </span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">ومب شرط انت اللي تنزل عروض الغرف او الفنادق في الموقع</span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;"> </span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">يقدر اي شخص يسجل في الموقع كـ صاحب املاك</span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;"> </span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">وينزل عروضه في الموقع ويحط سعر الغرفة</span></span></p>
<h4 class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.5rem;color:#212529;font-family:'SST Arabic';"> </h4>
<h4 class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.5rem;color:#212529;font-family:'SST Arabic';"><span style="font-weight:bolder;"><span style="color:#34d8be;font-size:10pt;">كيف راح تكسب من المشروع ؟ </span></span></h4>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">الموقع راح يضيف على سعر الغرفة اللي ضافها صاحب الأملاك عمولتك انت كصاحب للموقع بشكل اوتوماتيك</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">يعني لو انت مثلا حطيت عمولتك 30٪</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">وواحد من أصحاب الأملاك نزل عرض غرفة بسعر 400 ريال</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">راح يطلع السعر للناس </span></span><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">460 ريال </span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">الـ 400 حق صاحب الأملاك و الـ 60 حقك انت</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">.وتقدر تحط اي نسبه تعجبك مب شرط نفس اللي ذكرته، هذا كان مثال للتوضيح فقط.</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">الان اي شخص حجز فندق ودفع المبلغ كامل اللي هو 460 ريال راح يوصلك انت صاحب الموقع، وراح يطلع في الملف الشخصي حق صاحب الفندق ان رصيده هو 400 ريال</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">وعنده خانه في الملف الشخصي مكتوب فيها طلب سحب الرصيد اذ ضغط عليه بيطلع له مربع مكتوب فيه اكتب حسابك البنكي ومربع مكتوب فيه الرصيد الذي ترغب في سحبه</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">اذ سجل هالبيانات وضغط على موافق، راح يجيك الطلب في لوحة تحكم موقعك، وأنت تحول له فلوسه</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">وبعد التحويل تضغط موافقه وخلاص رصيده في ملفه الشخصي راح يرجع يتصفر من جديد</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">او بحسب المبلغ اللي طلب منك تحوله له</span></span></p>
<p style="margin-top:0px;margin-bottom:1rem;text-align:right;"><span style="color:#718096;font-family:'SST Arabic';"><span style="font-size:14px;font-weight:400;">وبالنسبه لإجرائات انهاء عملية الحجز وتأكيدها انت مالك اي علاقة فيها، أنت مجرد وسيط ثالث بين صاحب الفندق والمستأجر وتاخذ عمولتك اذ اي احد استأجر غرفة او ايا كان عن طريق موقعك</span></span></p>
<h5 style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;color:#212529;font-family:'SST Arabic';text-align:right;"><span style="color:#843fa1;">الميزات :</span></h5>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">* لوحة تحكم كامله وسهلة الإستخدام ويمكن استخدامها من اي جهاز.</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">* خدمة SEO جاهزة ويمكن الإطلاع عليها من لوحة التحكم .</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">* امكانية اضافة وتعديل وحذف الأقسام داخل الموقع .</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">* الموقع متناسق مع جميع الأجهزة وسهل الإستخدام .</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;">* امكانية تغيير لون الموقع كاملا بضغطة زر .</p>
<h4 class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.5rem;color:#212529;font-family:'SST Arabic';"><span style="color:#843fa1;">الخدمات المجانية :</span></h4>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';">* دومين مجاني لمدة سنة</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';">* سيرفر مجاني لمدة شهر</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';">* دعم فني مستمر / عبر الوآتساب</p>
<h4 class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.5rem;color:#212529;font-family:'SST Arabic';"><span style="color:#843fa1;">المتطلبات :</span></h4>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';">لا بد لأي موقع في العالم أن يكون مرفوع على ( سيرفرات )، وهذه السيرفرات يتم استئجارها شهريا بالإضافة إلى رابط الموقع (الدومين)</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';">وأسعار إيجارهم كالآتي :</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';">50 ريال شهريا ل (السيرفر)</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';">80 ريال سنويا ل (الدومين)<br />وأول سنة وأول شهر نقدمها لك خدمة مجانية من غير أي مقابل</p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';"> </p>
<p class="MsoNormal" dir="rtl" style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';"><span style="color:#34d8be;">والله ولي التوفيق</span></p>
<p> </p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="3"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/4" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/4">مشروع الدورات التدريبية</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/04/26</li>
                        <li>6 إعجاب</li>
                    </ul>
                    <p><h2><span style="color:#843fa1;font-size:12pt;">فكرة المشروع :</span></h2>
<h4><span style="font-size:10pt;color:#718096;">في هذا المشروع راح نسوي لك موقع بإذن الله تقدر عن طريقه تعرض دورات تعليمية وتبيعها و اي شخص يخش ويشتري احد هذه الدورات ويحول لك الفلوس راح يقدر يتابع الدورة ومب شرط انت اللي تنزل الدورات في الموقع يقدر اي شخص يسجل في الموقع كـ مقدم دورات وينزل دورات في الموقع ويحط سعر الدورة</span></h4>
<h2><span style="font-size:12pt;color:#34d8be;">كيف راح تكسب من المشروع ؟ :</span></h2>
<h4><span style="font-size:10pt;color:#718096;">عن طريق شراء الدورات من الطلاب او المستخدميين طبعا تقدر من خلال الموقع تحط عمولتك 30% </span></h4>
<h4><span style="font-size:10pt;color:#718096;">وواحد من مقدمين الدورات نزل دورة بسعر 400 ريال راح يطلع السعر للناس 460 ريال الـ 400 حق مقدم الدورات و الـ 60 حقك انت وتقدر تحط اي نسبه تعجبك مب شرط نفس اللي ذكرته، هذا كان مثال للتوضيح فقط. الان اي شخص اشترك في احد الدورات ودفع الفلوس، المبلغ كامل اللي هو 460 ريال راح يوصلك انت صاحب الموقع، وراح يطلع في الملف الشخصي حق مقدم الدوره ان رصيده هو 400 ريال وعنده خانه في الملف الشخصي مكتوب فيها طلب سحب الرصيد اذ ضغط عليه بيطلع له مربع مكتوب فيه اكتب حسابك البنكي ومربع مكتوب فيه الرصيد الذي ترغب في سحبه اذ سجل هالبيانات وضغط على موافق، راح يجيك الطلب في لوحة تحكم موقعك، وأنت تحول له فلوسه وبعد التحويل تضغط موافقه وخلاص رصيده في ملفه الشخصي راح يرجع يتصفر من جديد او بحسب المبلغ اللي طلب منك تحوله له</span></h4>
<h4> </h4>
<h2><span style="font-size:12pt;color:#34d8be;">الميزات :</span></h2>
<h4><span style="font-size:10pt;color:#718096;">* اضافة تصنيفات كثيرة لتنظيم الموقع والدورات</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* بتاخذ ارباح من كل دورة يتم بيعها من خلال الموقع.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* تصميم عصري ومميز يجذب الناس لموقعك.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* يوجد صفحة لتحليل احصائيات الربح.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* تقدر من لوحة التحكم تشوف جميع التعليقات الخاصة بالدورات والتعديل عليها.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* التحكم والتعديل بجميع انواع الحسابات.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* صفحة تقدر من خلالها تشوف تذاكر الشكاوي والاقتراحات و المشاكل المرسلة من قبل المستخدميين والرد عليهم من خلال لوحة التحكم.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* صفحة مدونة تقدر تضيف فيها مواضيع ومقالات.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* صفحة من خلالها تتقدر تتحكم في نصوص الموقع والتعديل عليها بكل سهولة.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* وايضا تقدر تشوف جميع عمليات الشراء,بجميع التفاصيل,الي تمت من خلال موقعك .</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* اضافة اكواد خصم وتقدر تخلي الكود فعال لمدة معينة مثلا 10 ايام.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* اضافات حسابات التواصل الاجتماعي.</span></h4>
<h4> </h4>
<h4><span style="font-size:12pt;color:#34d8be;">تجارب العملاء :</span></h4>
<h4><span style="font-size:10pt;color:#007bff;">t-afawq.com</span></h4>
<h4> </h4>
<h4><span style="font-size:12pt;color:#34d8be;">الخدمات المجانيه :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* دومين مجاني لمدة سنه</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* سيرفر مجاني لمدة شهر</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* دعم فني مستمر / عبر الوآتساب</span></h4>
<h4> </h4>
<h4><span style="font-size:12pt;color:#34d8be;">المتطلبات :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</span></h4>
<h4><span style="font-size:10pt;color:#718096;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </span></h4>
<h4><span style="font-size:10pt;color:#718096;">لازم تحط في الحسبان انك راح تدفع :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* 50 ريال شهريا ( للسيرفر )</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* 80 ريال سنويا ( للدومين )</span></h4>
<h4><span style="font-size:10pt;color:#718096;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا</span></h4>
<h4> </h4>
<h4><span style="font-size:10pt;color:#34d8be;">والله ولي التوفي</span></h4></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="4"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/5" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/5">مشروع سكربت قرآن للجميع</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/04/27</li>
                        <li>5 إعجاب</li>
                    </ul>
                    <p><p>بسم الله والحمدلله والصلاة والسلام على رسول الله</p>
<p>من نعم الله علينا أن يسر لنا العمل في برمجيات تنفعنا في الدارين بإذن الله</p>
<p>هذا هو سكربت القرآن الكريم للجميع الإصدار 4.8 بحلة جديدة وميزات كثيرة وتقنيات جديدة</p>
<p>السكربت مر بالكثير من المراحل والتطويرات حتى وصلنا لهذا الإصدار وجدير بالذكر أن التطويرات كانت على مدى ثمانية سنوات وبفضل الله عز وجل لاقى السكربت استحسان الكثير من أصحاب المواقع وانتشر انتشارا واسعا.</p>
<p>كانت النسخ السابقة يتم طرحها للزوار مجانا فور الإنتهاء منها وتجهيزها ولكن هذه النسحة نعتذر للأحباب زوار الموقع وأصحاب المواقع عن طرحها مجانا وستكون بسعر رمزي لمن أراد الاستفادة من السكربت وتركيبه بموقعه</p>
<p>والسبب في ذلك هو لعلنا نغطي تكاليف الموقع وتكاليف الجهد والوقت المبذول في التطوير للسكربت والله المستعان</p>
<p> </p>
<h4>ميزات السكربت</h4>
<p>القرآن الكريم كاملا مقروء ومسموع</p>
<p>القرآن الكريم مقسم آية آية مع إمكانية سماع الآية لوحدها أو السورة كاملة</p>
<p>إمكانية الاستماع للسورة بصوت الكثير من القراء</p>
<p>إمكانية التنقل بين السور والآيات وتغيير القاريء بكل سهولة</p>
<p>حاصية تتبع مسار الرابط ما يعرف بالـ breadcrumb</p>
<p>إمكانية مشاركة السورة أو آية أو تفسير وخلافها</p>
<p>يحتوى على عدة تفاسير</p>
<p>يحتوى على الكثير من ترجمات معاني القرآن الكريم</p>
<p>يحتوي على أكثر من 10000 كتاب موزعة على لغات الكتب</p>
<p>سهل الاستخدام وسريع التصفح</p>
<p>متوافق مع جميع الشاشات</p>
<p> </p>
<h4>الميزات الجديدة</h4>
<p>إضافة ميزة Open Graph Meta Tags لترتيب البيانات وعرضها في مواقع التواصل الإجتماعي ومحركات البحث</p>
<p>إضافة ميزة canonical</p>
<p>إضافة ميزة schema الخاصة بتنظيم البيانات</p>
<p>استخدام bootstrap الإصدار الأحدث</p>
<p>استخدام fontawesome الإصدار الأحدث</p>
<p>تحسين SEO السكربت</p>
<p>تغيير الثيم</p>
<p>إضافة واجة تطبيقات JSON API بالإمكان ربط السكربت بتطبيقات الهواتف الذكية</p>
<p>تحسن أداء السكربت من حيث السرعة والاستجابة</p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="5"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/6" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/6">مشروع حراج</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/05/01</li>
                        <li>5 إعجاب</li>
                    </ul>
                    <p><h4><span style="font-size:14pt;color:#843fa1;">فكرة المشروع :</span></h4>
<h4><span style="color:#718096;font-size:10pt;">في هذا المشروع سيكون لديك موقع مثل موقع ( حراج ) المشهور ولكن بتصميم أحدث وميزات أكثر .</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* موقع حراج هو عبارة عن موقع يتمكن الناس فيه من نشر إعلانات, كـ بيع شيئ ما جديد او مستعمل او عرض خدمات او عرض طلبات الخ ... ويدفع الناشر عمولة لصاحب الموقع بعد كل عملية بيع عن طريق الإعلان ويتم تحديد قيمة العموله من صاحب الموقع .</span></h4>
<p> </p>
<h4><span style="font-size:14pt;color:#34d8be;">كيف راح تكسب من المشروع ؟ :</span></h4>
<h4><span style="color:#95a5a6;font-size:10pt;">#  عن طريق انشاء حزم للمستخدمين بمعنى اي شخص يسجل في موقعك ما راح يقدر ينشر اي اعلان الا بعد ما يختار حزمة على سبيل المثال تقدر تسوي 3 حزم بموقعك</span></h4>
<h4><span style="color:#7e8c8d;font-size:10pt;">* الحزمة الاولى تكون مجانية وتتيح للمستخدم اضافة صورة واحدة فقط في الاعلان ومدة الاعلان تكون 7 ايام فقط.</span></h4>
<h4><span style="color:#7e8c8d;font-size:10pt;">* الحزمة الثانية تكون بسعر انت تختاره مثلا 50 ريال تتيح للمستخدم اضافة 5 صور في الاعلان ويظهر على الاعلان ايقونة اعلان مميز ويتم ارشفة الاعلان بشكل افضل من الاعلان الخاص بالحزمة الثانية.</span></h4>
<h4><span style="color:#718096;font-size:10pt;">تقدر تضيف حزم وكل حزمة لها خصائص ومميزات.</span></h4>
<h4><span style="color:#95a5a6;font-size:10pt;"># الطريقة الثانية انك تضيف اعلانات جوجل في موقعك .</span></h4>
<h4> </h4>
<h4><span style="color:#34d8be;font-size:14pt;">الميزات :</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* نظام اعلانات الوظايف , حيث ستتمكن الشركات من نشر اعلان وظيفي ويمكن للمستخديم التقديم على الوظيفه من خلال الموقع .</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* نظام الدول المتعدده , حيث يدعم الموقع جميع دول العالم ولكل زائر تظهر له الإعلانات التي تخص الدوله التي يعيش بها ويمكنك اتاحة/إخفاء الدول التي ترغب بها .</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* يدعم أكثر من لغة .</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* إمكانية فتح اقسام جديدة لامحدوده .</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* تقدر تعدل على جميع صفحات الموقع بالمحتوى او اضافة صفحة جديدة.</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* تقدر تشوف كل التعلقات من لوحة التحكم.</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* التحكم والتعديل على تصميم الموقع من لوحة التحكم.</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* اضافة بوابات الدفع مثل باي بال,التحويل البنكي,الدفع بالبطاقة.</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* الموقع متعدد العملات.</span></h4>
<h4> </h4>
<h4><span style="color:#34d8be;font-size:14pt;">تجارب العملاء :</span></h4>
<h4><span style="color:#007bff;font-size:10pt;">m3rodat.com</span></h4>
<h4> </h4>
<h4><span style="color:#34d8be;font-size:14pt;">الخدمات المجانيه :</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* دومين مجاني لمدة سنه</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* سيرفر مجاني لمدة شهر</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* دعم فني مستمر / عبر الوآتساب</span></h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;">المتطلبات :</span></h4>
<h4><span style="color:#718096;font-size:10pt;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</span></h4>
<h4><span style="color:#718096;font-size:10pt;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </span></h4>
<h4><span style="color:#718096;font-size:10pt;">لازم تحط في الحسبان انك راح تدفع :</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* 50 ريال شهريا ( للسيرفر )</span></h4>
<h4><span style="color:#718096;font-size:10pt;">* 80 ريال سنويا ( للدومين )</span></h4>
<h4><span style="color:#718096;font-size:10pt;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا</span></h4>
<h4> </h4>
<h4><span style="color:#843fa1;font-size:14pt;">والله ولي التوفي</span></h4></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="6"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/7" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/7">مشروع قص الروابط</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/05/07</li>
                        <li>5 إعجاب</li>
                    </ul>
                    <p><h3><span style="font-size:14pt;color:#843fa1;">فكرة المشروع :</span></h3>
<h4><span style="color:#718096;font-size:10pt;">راح يكون عندك موقع تقدر الناس تسجل فيه وبعد تسجيلهم يقدرون يستخدمون خدمة تقصير الروابط لأي رابط موقع وينشرونه في المواقع والمنتديات او قنواتهم في اليوتيوب بعد دخول الزوار للرابط القصير , انت صاحب الموقع راح تجيك ارباح من جميع الزيارات اللي خشت على الروابط ليش ؟ لأنه لما خش الزائر على الرابط القصير راح يضطر ينتظر 10 ثواني على بال مايتحول للرابط الأصلي الذي تم تقصيره والوقت اللي اخذه الزائر وهو داخل موقعك راح تطلع له اعلانات من قوقل ادسنس وفلوس الإعلانات هذي كلها تروح لحسابك انت ياصاحب الموقع وانت تاخذ حقك منها وتقسم الباقي على العملاء اللي يسخدمون موقعك وبكذا انت استفدت وافدت غيرك.</span></h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;"> شرح كتابي عن المشروع بمثال:</span></h4>
<h4><span style="font-size:10pt;color:#718096;">لنفرض ان رابط موقعك هو Ytj.com وانا عميل سجلت في موقعك وبعد التسجيل دخلت لصفحة تقصير الروابط وعندي الرابط هذا ابي اسوي له تقصير : youtube.com/c/AA بعد التقصير راح يصير الرابط كذا : Ytj.com/T6G3 الان انا اروح انشر الرابط بعد التقصير وليس الرابط قبل التقصير و أي زائر يخش على الرابط راح تفتح له صفحة موقعك وتحتوي على مربعات فيها اعلانات من شركة قوقل ادسنس وتحت فيه زر مكتوب فيه ( فتح الرابط ) , اذ ضغط عليه الزائر راح يوديه على الرابط الأصلي ولكن ماراح يقدر يضغط عليه الا بعد مرور 10 ثواني يحددها صاحب الموقع وبكذا صاحب الموقع كسب ارباح , لأنه يوم خش الزائر وطلعت له المربعات اللي فيها اعلانات خلاص كذا انحسب له ربح وانا ربحي آخذه من صاحب الموقع مثلا : 5 دولار لكل الف زائر يفتح الرابط والموقع راح يحسبها بشكل اوتوماتيك , لو خش الرابط الف زائر كذا رصيدي في الموقع راح يصير 5 دولار وطبعا صاحب الموقع ماراح يدفعها لي من جيبه هو اصلا كسب اكثر منها مثل : 20 دولار لصاحب الموقع 15 دولار و لي انا 5 دولار.</span></h4>
<h4> </h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;">نقطة مهمة في المشروع:</span></h4>
<h4><span style="font-size:10pt;color:#718096;">اسعار الإعلانات في قوقل ادسنس وباقي الشركات تتغير وليست ثابته مثلا لو كان سعر الإعلانات اليوم هو ( 10 دولار لكل الف زائر ) لازم صاحب الموقع يروح ويعدل السعر لعملائه ويخليها مثلا 2 دولار لكل الف زائر بحيث لو احد العملاء خش رابطه 5 الف زائر حق صاحب الموقع هو : 40 دولار وحقي العميل هو : 10 دولار ولو فكرت انه راح يكون الموضوع متعب بالنسبه لك كل يوم تخش وتغير اسعار الإعلانات عادي ممكن تثبت اسعار الإعلانات وتخليها مثلا : 0.5 دولار لكل الف زائر , وترا هالنسبه تعتبر كويسه جدا للمسوقين لأن اللي راح يستخدمون موقعك عادة مشاهير او ناس عاديين بس انهم ينشرون الروابط بشكل جنوني ويقدرون يجيبون فوق الـ 100 الف زائر بكل سهولة.</span></h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;">كيف راح تكسب من المشروع ؟ :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">طبعا مثل ما هو موضح بالتفصيل فوق طريقة الربح بتكون عن طريق اعلانات جوجل.</span></h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;">الميزات :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* تصميم عصري ومميز يجذب الناس لموقعك.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* التحكم والتعديل بجميع انواع الحسابات.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* تقدر تشوف الزوار المتصليين بموقعك</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* متعدد اللغات.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* التحكم في نص الموقع بالكامل. </span></h4>
<h4><span style="font-size:10pt;color:#718096;">* الاطلاع على جميع طلبات سحب الفلوس من المستخدمين.</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* صفحة لعرض جميع احصائيات موقعك.</span></h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;">تجارب العملاء :</span></h4>
<h4><span style="font-size:12pt;color:#007bff;">c0li.com</span></h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;">الخدمات المجانيه :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* دومين مجاني لمدة سنه</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* سيرفر مجاني لمدة شهر</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* دعم فني مستمر / عبر الوآتساب</span></h4>
<h4> </h4>
<h4><span style="font-size:14pt;color:#34d8be;">المتطلبات :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</span></h4>
<h4><span style="font-size:10pt;color:#718096;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </span></h4>
<h4><span style="font-size:10pt;color:#718096;">لازم تحط في الحسبان انك راح تدفع :</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* 50 ريال شهريا ( للسيرفر )</span></h4>
<h4><span style="font-size:10pt;color:#718096;">* 80 ريال سنويا ( للدومين )</span></h4>
<h4><span style="font-size:10pt;color:#718096;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا</span></h4>
<h4> </h4>
<h4><span style="font-size:12pt;color:#843fa1;">والله ولي التوفي</span></h4></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="7"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/8" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/8">مشروع متجر متعدد التجار</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/05/17</li>
                        <li>3 إعجاب</li>
                    </ul>
                    <p><h4 style="text-align:center;"><span style="color:#34d8be;font-size:12pt;">بسم الله الرحمن الرحيم </span></h4>
<h3 style="text-align:right;"><strong><span style="color:#843fa1;font-size:12pt;">فكرة المشروع :</span></strong></h3>
<p><span style="font-size:12pt;"><span style="color:#34d8be;"><span style="color:#718096;">( aliexpress و Amazon )  المشروع هذا زي موقع</span> </span><span style="color:#718096;"> <br /></span></span><span style="font-size:10pt;color:#718096;">هو عبارة عن متجر الكتروني يضم داخله متاجر متعددة يعني بختصار انت راح تكون الوسيط الثالث بين البائع والمشتري وتاخذ عمولتك بعد كل عملية بيع والمنتجات اللي تنزل في المتجر مب منتجاتك بعد افتتاح موقعك , يقدر اي مورد او صاحب بضاعه يقدم طلب انه يصير بائع في موقعك ويرسل بياناته المطلوبه عن طريق الموقع وبعدها راح يجيك الطلب على لوحة تحكم موقعك وانت لك الحرية توافق او ترفض . بعد موافقتك على الطلب , بكذا راح يقدر المورد ينزل منتجات في موقعك والموقع راح يضيف عمولتك على المنتجات بشكل تلقائي.  </span></p>
<h3 style="text-align:right;"><span style="color:#34d8be;font-size:12pt;">كيف راح تكسب من المشروع ؟:</span></h3>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">طريقة الربح من المشروع من خلال النسبة الي يحطها صاحب المشروع من كل عملية بيع مثلا: <br />( انت حطيت عمولتك 50% ) الآن لو المورد عرض منتج سعره 400 ريال موقعك راح يعرضه للزوار بـ : 600 ريال بشكل اوتو ماتيك وأي احد يشتري المنتج المورد راح ياخذ 400 ريال وانت راح تاخذ 200 ريال وطبعا التحويل كله راح يكون على حسابك البنكي انت ومتى ماطلب المورد تحول له فلوسه تحولها له مباشره وبعد ماتحول الفلوس للمورد رصيده في الموقع راح يرجع .</span></h4>
<h3 style="text-align:right;"><span style="color:#843fa1;font-size:12pt;">الميزات :</span></h3>
<h4 style="text-align:right;"><span style="font-size:12pt;color:#718096;">* <span style="font-size:10pt;">تقدر تضيف او تعدل على جميع المنتجات بكل سهولة.</span></span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* تقدر تضيف فئات للمنتجات وتعين عمولتك على كل فئة يعني مثلا: تقدر تخلي المنتجات التابعة للفئة الملابس<br />تكون 15 % وفئة الادوات المنزلية 10 % على سبيل المثال.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* اضافة علامات تجارية لتسهيل البحث للمستخدمين وبنفس الوقت ترتيب للمنتجات في الموقع.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* تقدر تشوف جميع التعليقات لكل منتج من لوحة التحكم.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* وايضا تقدر تشوف جميع الطلبات,الطلبات المستردة ,الي تمت من خلال موقعك .</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* التحكم في نسبة عمولتك من كل عملية شراء.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* صفحة مدونة تقدر تضيف فيها مواضيع ومقالات.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* التعديل على جميع النصوص الموجودة بالموقع.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* تقدر بضغطة زر تخلي الموقع في وضع الصيانة بحيث ما احد يقدر يدخل على المواقع الا صاحب المشروع.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* اضافات حسابات التواصل الاجتماعي من خلال لوحة التحكم.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* تقدر تظهر او تعدل على العملات وعلى حسب العملة يظهر سعر المنتج مثال:ريال سعودي,دولار,يورو,الخ...</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* تقدر تظهر او تعدل على العملات</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* متعدد اللغات.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* ذكر ميزات لوحة التحكم ( مثل : سهلة الإستخدام , تعمل على اي جهاز , امكانية تغيير لون الموقع منها )</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">على شكل نقاط مرتبه </span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* اضافة نسبة ضريبة القيمة المضافة.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* تقارير بحسب بيع المنتجات,مخزون المنتجات,قائمة المنتجات المفضلة,عمليات بحث المستخدم.</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* صفحة تقدر من خلالها تشوف تذاكر الشكاوي والاقتراحات و المشاكل المرسلة من قبل المستخدميين والرد عليهم من خلال لوحة التحكم.</span></h4>
<h3 style="text-align:right;"><span style="font-size:12pt;color:#843fa1;">تجارب العملاء :</span></h3>
<p><a href="https://aswwq.net"><span style="color:#007bff;font-size:12pt;">aswwq.net</span></a></p>
<p><a href="lel-one.com"><span style="color:#007bff;font-size:12pt;">lel-one.com</span></a></p>
<h3 style="text-align:right;"><span style="color:#843fa1;font-size:12pt;">الخدمات المجانيه :</span></h3>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* دومين مجاني لمدة سنه</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* سيرفر مجاني لمدة شهر</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* دعم فني مستمر / عبر الوآتساب</span></h4>
<h3 style="text-align:right;"><span style="color:#843fa1;font-size:12pt;">المتطلبات :</span></h3>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">لازم تحط في الحسبان انك راح تدفع :</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* 100 ريال شهريا ( للسيرفر )</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">* 80 ريال سنويا ( للدومين )</span></h4>
<h4 style="text-align:right;"><span style="font-size:10pt;color:#718096;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا</span></h4>
<h3 style="text-align:right;"> </h3>
<h4 style="text-align:right;"><span style="font-size:12pt;color:#843fa1;">والله ولي التوفي</span></h4></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="8"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/9" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/9">مشروع مزاد</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/06/08</li>
                        <li>4 إعجاب</li>
                    </ul>
                    <p><h4>فكرة المشروع :<br /><br /></h4>
<p>في هذا المشروع راح يصير عندك موقع انت تملكه</p>
<p>يقدر اي احد عنده حاجه يبغا يبيعها يخش ويسجل في الموقع</p>
<p>ويفتح مزاد جديد للحاجه اللي يبي يبيعها</p>
<p>والناس تسجل في الموقع ويخشون المزاد ويبدأون المزايده</p>
<p>وطبعا صاحب المنتج يقدر يحدد وقت معين يبدأ فيه المزاد وينتهي بشكل اوتوماتيك</p>
<p>والمشتري اللي فاز بالمزاد يحول الفلوس لك انت صاحب الموقع مب للبائع</p>
<p>وانت تاخذ عمولتك منها وتحول الباقي الى البائع</p>
<p>المشروع بسيط وغير معقد وسهل الاستخدام</p>
<p>وفيه كثير ميزات</p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="9"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/10" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/10">الخدمات الألكترونية</a>
                    <ul class="list-unstyled post-details">
                        <li>Ahmed naji</li>
                        <li>2022/06/15</li>
                        <li>4 إعجاب</li>
                    </ul>
                    <p><h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:14pt;"><span style="color:#843fa1;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">فكرة المشروع</span></span><span style="color:#843fa1;"> :</span></span></h3>
<h3 style="text-align:justify;"><span style="font-size:14pt;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span dir="rtl" lang="ar-sa" style="font-size:10pt;color:#718096;" xml:lang="ar-sa">* في هذا المشروع راح نسوي لك موقع باذن الله تقدر عن طريقه تعرض الخدمات الي تقدمها بمقابل مادي مثلا: خدمات تسويق او خدمات الكترونية, كتابة مقالات,ترجمة مقالات,تقديم خدمات برمجية.</span></h3>
<p style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></p>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span dir="rtl" lang="ar-sa" style="font-size:10pt;color:#718096;" xml:lang="ar-sa">* على سبيل المثال منصة اكتمل هي موقع يقدم خدمات.</span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<p style="text-align:justify;"><span style="font-size:10pt;"> </span></p>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:14pt;color:#34d8be;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">كيف راح تكسب من المشروع ؟</span> :</span></h3>
<h3 style="text-align:justify;"><span style="font-size:14pt;color:#34d8be;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">طريقة الربح من هذا المشروع عن طريق عرض خدماتك لناس بمقابل مادي.</span></span></h3>
<p style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></p>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:14pt;color:#34d8be;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">الميزات</span> :</span></h3>
<h3 style="text-align:justify;"><span style="font-size:14pt;color:#34d8be;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">* ايقونة واتساب في الصفحة الرئيسية توجه الشخص على الواتس الخاص بمشروعك.</span></span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span dir="rtl" lang="ar-sa" style="font-size:10pt;color:#718096;" xml:lang="ar-sa">* يحتوي الموقع على مدونة تقدر من خلالها تضيف المواضيع المهمة الي تشرح اكثر عن خدماتك.</span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span dir="rtl" lang="ar-sa" style="font-size:10pt;color:#718096;" xml:lang="ar-sa">* تستطيع معرفة عدد الزوار وبالاضافة الي بلد الزائر ومعرفة عدد الصفحات الي قام بالدخول عليها.</span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">* تستطيع التحكم في كافة الصفحات الخاصة بالموقع والتعديل عليها</span><span lang="ar-sa" xml:lang="ar-sa"> <span dir="rtl">.</span></span></span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span dir="rtl" lang="ar-sa" style="font-size:10pt;color:#718096;" xml:lang="ar-sa">*يوجد ايضا رسم بياني ونصي لتحليلات الزوار الخاصة بالموقع مثال: حسب التاريخ, الدولة,المدينة.</span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span dir="rtl" lang="ar-sa" style="font-size:10pt;color:#718096;" xml:lang="ar-sa">*صفحة أخبارنا تقدر من خلالها تضيف احدث الاخبار الخاصة بخدماتك.</span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;">* <span dir="rtl" lang="ar-sa" xml:lang="ar-sa">تصميم عصري ومميز يجذب الناس لموقعك</span>.</span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span dir="rtl" lang="ar-sa" style="font-size:10pt;color:#718096;" xml:lang="ar-sa">* متعدد اللغات.</span></h3>
<p class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"> </p>
<p style="text-align:justify;"><span style="font-size:10pt;"> </span></p>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:14pt;color:#34d8be;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">الخدمات المجانيه</span> :</span></h3>
<h3 style="text-align:justify;"><span style="font-size:14pt;color:#34d8be;"> </span></h3>
<h3><span style="font-size:10pt;color:#718096;">* <span dir="rtl" lang="ar-sa" xml:lang="ar-sa">دومين مجاني لمدة سنه</span></span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;">* <span dir="rtl" lang="ar-sa" xml:lang="ar-sa">سيرفر مجاني لمدة شهر</span></span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;">* <span dir="rtl" lang="ar-sa" xml:lang="ar-sa">دعم فني مستمر / عبر الوآتساب</span></span></h3>
<p style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></p>
<p class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></p>
<p style="text-align:justify;"><span style="font-size:10pt;"> </span></p>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:14pt;color:#34d8be;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">المتطلبات</span> :</span></h3>
<h3 style="text-align:justify;"><span style="font-size:14pt;color:#34d8be;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</span></span></h3>
<p style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></p>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي</span> </span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">لازم تحط في الحسبان انك راح تدفع</span> :</span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;">* <span dir="rtl" lang="ar-sa" xml:lang="ar-sa">50</span><span lang="ar-sa" xml:lang="ar-sa"> <span dir="rtl">ريال شهريا ( للسيرفر )</span></span></span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;">* <span dir="rtl" lang="ar-sa" xml:lang="ar-sa">80</span><span lang="ar-sa" xml:lang="ar-sa"> <span dir="rtl">ريال سنويا ( للدومين )</span></span></span></h3>
<h3 style="text-align:justify;"><span style="font-size:10pt;color:#718096;"> </span></h3>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;color:#718096;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا</span></span></h3>
<p style="text-align:justify;"><span style="font-size:10pt;"> </span></p>
<p class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:10pt;"> </span></p>
<p style="text-align:justify;"><span style="font-size:10pt;"> </span></p>
<h3 class="MsoNormal" style="margin-bottom:10pt;line-height:115%;text-align:justify;"><span style="font-size:14pt;color:#843fa1;"><span dir="rtl" lang="ar-sa" xml:lang="ar-sa">والله ولي التوفي</span></span></h3></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="10"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/11" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/11">مشروع رسالة مجهول</a>
                    <ul class="list-unstyled post-details">
                        <li>Ahmed naji</li>
                        <li>2022/06/26</li>
                        <li>4 إعجاب</li>
                    </ul>
                    <p><h3><span style="font-size:12pt;color:#843fa1;">فكرة المشروع :</span></h3>
<h5><span style="font-size:10pt;color:#718096;">الموقع يتيح للمستخدم طرح اي سؤال بالملف الشخصي الخاص به ويتيح للمستخدميين الاخريين الاجابة على سؤاله على سبيل المثال يمكن لشخص كتابة سؤال معين وارساله الى اصدقائه وكل صديق يجاوب برايه الشخصي مع عدم معرفة هوية الشخص الذي قام بالرد على السؤال.</span></h5>
<h5><span style="font-size:10pt;color:#718096;">رابط الملف الشخصي على سبيل المثال بيكون كذا: </span></h5>
<h5><span style="font-size:10pt;color:#007bff;">anonymous.ektml.com/ahmed </span></h5>
<h3><span style="font-size:12pt;color:#34d8be;">كيف راح تكسب من المشروع ؟ :</span></h3>
<h5><span style="font-size:10pt;color:#718096;">من خلال اضافة اعلانات قوقل في الموقع </span></h5>
<h5><span style="font-size:10pt;color:#718096;"> اسعار الإعلانات في قوقل ادسنس وباقي الشركات تتغير وليست ثابته.</span></h5>
<h3><span style="font-size:12pt;color:#34d8be;">الميزات :</span></h3>
<h5><span style="font-size:10pt;color:#718096;">* متعدد اللغات.</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* مشاهدة جميع الرسائل والتحكم بها.</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* التحكم والتعديل بجميع انواع الحسابات.</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* التحكم في نص الموقع بالكامل.</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* اضافات حسابات التواصل الاجتماعي.</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* احصائيات لاجمالي المستخدمين,اجمالي الرسائل,اكثر شخص يتلقى رسائل الخ...</span></h5>
<h5><span style="font-size:12pt;color:#34d8be;">الخدمات المجانيه :</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* دومين مجاني لمدة سنه</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* سيرفر مجاني لمدة شهر</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* دعم فني مستمر / عبر الوآتساب</span></h5>
<h5> </h5>
<h3><span style="font-size:12pt;color:#34d8be;">المتطلبات :</span></h3>
<h5><span style="font-size:10pt;color:#718096;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</span></h5>
<h5><span style="font-size:10pt;color:#718096;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </span></h5>
<h5><span style="font-size:10pt;color:#718096;">لازم تحط في الحسبان انك راح تدفع :</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* 50 ريال شهريا ( للسيرفر )</span></h5>
<h5><span style="font-size:10pt;color:#718096;">* 80 ريال سنويا ( للدومين )</span></h5>
<h5><span style="font-size:10pt;color:#718096;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا</span></h5>
<h5> </h5>
<h4><span style="font-size:12pt;color:#843fa1;">والله ولي التوفي</span></h4></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="11"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/12" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/12">مشروع عقارات</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2022/07/10</li>
                        <li>3 إعجاب</li>
                    </ul>
                    <p><h3><span style="color:#843fa1;font-size:12pt;">فكرة المشروع :</span></h3>
<p><span style="font-size:10pt;">في هذا المشروع راح نسوي لك موقع تقدر عن طريقه تعرض عقارات للبيع او للايجار طبعا اي شخص يقدر يسجل في موقعك ويعرض العقار </span></p>
<h3><span style="font-size:12pt;color:#34d8be;">كيف راح تكسب من المشروع ؟ :</span></h3>
<p><span style="font-size:13.3333px;">* عن طريق اضافة حزمة للعضوية يعني لما شخص يحب يعرض عقار في موقعك لازم يشترك بالحزمة بمبلغ انت تحدده وتقدر تخلي المعلن مثلا يكون له حد معين من الاعلانات في الحزمة او اعلان يكون له وقت معين بعدد الايام تخلي الاعلان يظهر في الصفحة الرئيسية او فقط يظهر في عن طريق البحث وتقدر مثلا تسوي حزمة بسعر اغلى وتخلي الاعلان يظهر عليه كاعلان متميز,عاجل يمديك تتحكم في طريقة عرض الاعلانات لكل حزمة</span></p>
<p><span style="font-size:13.3333px;">* </span><span style="font-size:13.3333px;">فيه طريقة ثانية تقدر تزود فيها المكسب وهيا اضافات اعلانات جوجل :Google Ads.</span></p>
<h3><span style="font-size:12pt;color:#34d8be;">الميزات :</span></h3>
<p><span style="font-size:10pt;">* مشاهدة كافات الاعلانات والتعديل عليها.</span></p>
<p><span style="font-size:10pt;">* اضافة اقسام لتنظيم الاعلانات.</span></p>
<p><span style="font-size:10pt;">* مشاهدة جميع التقيمات والتحكم بها.</span></p>
<p><span style="font-size:10pt;">* بالاضافة لمشاهدة جميع المحادثات .</span></p>
<p><span style="font-size:10pt;">* التحكم في ايميل الموقع مثال:</span></p>
<p><span style="font-size:10pt;">لما شخص يسجل بالموقع عن طريق الايميل بعد ما يسجل راح توصله رسالة تفعيل تقدر تعدل على محتوى الرسالة بالكامل عن طريق لوحة التحكم, </span></p>
<p><span style="font-size:10pt;">نسيت كلمة المرور,تفاصيل حساب المستخدم البريد الإلكتروني,الابلاغ....الخ.</span></p>
<p><span style="font-size:10pt;">* لوحة تحكم كامله وسهلة الإستخدام ويمكن استخدامها من اي جهاز.</span></p>
<p><span style="font-size:10pt;">* الموقع متناسق مع جميع الأجهزة وسهل الإستخدام .</span></p>
<p><span style="font-size:10pt;">* التحكم والتعديل بجميع انواع الحسابات.</span></p>
<p><span style="font-size:10pt;">* صفحة مدونة تقدر تضيف فيها مواضيع ومقالات.</span></p>
<p><span style="font-size:10pt;">* متعدد اللغات.</span></p>
<p><span style="font-size:10pt;">* متعدد العملات.</span></p>
<p><span style="font-size:10pt;">* اضافات حسابات التواصل الاجتماعي.</span></p>
<p><span style="font-size:10pt;">* التحكم والتعديل بجميع انواع الحسابات.</span></p>
<p><span style="font-size:10pt;">* تفعيل بوابات الدفع باي بال,مدى</span></p>
<p><span style="font-size:10pt;">* يتم اضافة روابط المواقع الناجحه التي سبق لها شراء المشروع</span></p>
<p><span style="font-size:10pt;">* اضافة لغة جديدة او التعديل على نص اللغة في الموقع.</span></p>
<p><span style="font-size:10pt;">* تفعيل الاعلانات في جميع انحاء العالم يعني مو شرط الناس تعلن في السعودية فقط تقدر تفعل اي بلد.</span></p>
<p><span style="font-size:10pt;">* التحكم في نص الموقع بالكامل.</span></p>
<p><span style="font-size:10pt;">* تقدر تتطلع على جميع المعاملات من لوحة التحكم.</span></p>
<p><span style="font-size:10pt;">* اماكنية التسجيل في الموقع عن طريق حسابات التواصل الاجتماعي.</span></p>
<p><span style="font-size:10pt;">الخدمات المجانيه :</span></p>
<p><span style="font-size:10pt;">* دومين مجاني لمدة سنه</span></p>
<p><span style="font-size:10pt;">* سيرفر مجاني لمدة شهر</span></p>
<p><span style="font-size:10pt;">* دعم فني مستمر / عبر الوآتساب</span></p>
<p> </p>
<h3><span style="font-size:12pt;color:#34d8be;">المتطلبات :</span></h3>
<p><span style="font-size:10pt;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</span></p>
<p><span style="font-size:10pt;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </span></p>
<p><span style="font-size:10pt;">لازم تحط في الحسبان انك راح تدفع :</span></p>
<p><span style="font-size:10pt;">* 50 ريال شهريا ( للسيرفر )</span></p>
<p><span style="font-size:10pt;">* 80 ريال سنويا ( للدومين )</span></p>
<p><span style="font-size:10pt;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا</span></p>
<p> </p>
<h3><span style="font-size:12pt;color:#34d8be;">والله ولي التوفي</span></h3></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="12"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/13" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/13">مشروع منصة الوظائف</a>
                    <ul class="list-unstyled post-details">
                        <li>المهندس احمد شراحيلي</li>
                        <li>2023/01/07</li>
                        <li>2 إعجاب</li>
                    </ul>
                    <p><h4 class="MsoNormal" dir="rtl" style="text-align:center;"><span style="color:#34d8be;">بسم الله الرحمن الرحيم</span></h4>
<h2 class="MsoNormal" dir="rtl"><span style="color:#843fa1;font-size:14pt;">فكرة المشروع :</span></h2>
<p style="text-align:right;">هذا المشروع هو عبارة عن منصة تجمع بين الباحثين عن العمل و اصحاب الأعمال وسوف يكون دورك انت<br /> كـ صاحب للمشروع هو الوسيط الثالث بينهما .</p>
<h4 class="MsoNormal" dir="rtl"><strong><span style="color:#34d8be;font-size:10pt;">والآن نشرح المشروع بالتفصيل :</span></strong></h4>
<p style="text-align:right;">في هذا المشروع راح يكون عندك موقع تحت تصرفك بالكامل,يقدر يسجل فيه اصحاب الأعمال او المعلنين عن الوظائف ونشر وظائف في الموقع بمقابل مادي او مجانا حسب اختيار صاحب الموقع وبعد ذلك يقدر يسجل فيه اي باحث عن عمل ويسجل بياناته ومهاراته بالإضافة الى رفع سيرته الذاتيه في البروفايل الخاص فيه, ويقدم طلب على الوظائف اللي تناسبه,والطلب راح يوصل للمعلن عن الوظيفه ويقدر المعلن عن الوظيفه عرض جميع المتقدمين والمقارنه فيما بينهم والرفض او الموافقة على التقديم ويتم الاتفاق فيما بينهم بعد ذلك .</p>
<h4 class="MsoNormal" dir="rtl"><strong><span style="color:#34d8be;font-size:10pt;">كيف راح تكسب من المشروع ؟ :</span></strong></h4>
<p style="text-align:right;">قبل اي شي لازم تعرف انه بعد شرائك لهذا المشروع راح يكون تحت تصرفك بالكامل يعني بكره لو تحب تضيف عليه تعديلات برمجية بأفكار جديده للربح من الموقع سواء من طرفنا او من طرف اي مبرمج آخر , مافيه اي مشكلة ولكن ايضا احنا راح نسلمك المشروع مع خاصة للربح منه من خلال دراستنا للسوق,وايضا راح نعطيك فكره ثانيه واللي راح نتكلم عنها بعد مانشرح لك عن الخاصية.<br />خاصية الربح من المشروع تتلخص في انه اي احد يسجل في موقعك كـ معلن عن وظيفه يقدر يدفع لك اشتراك شهري مقابل الإعلانات اللي راح ينزلها , وطبعا انت تقدر تحط الأسعار باللي تشوفه مناسب , مثال :<br />الباقة الإفتراضية: 1 اعلان مجانا<br />الباقة البرونزيه: 5 اعلانات مقابل 20 ريال شهريا<br />الباقة الفضية: 15 اعلان مقابل 60 ريال شهريا<br />الباقة الذهبية: 30 اعلان مقابل 150 ريال شهريا<br /> طبعا هذي مجرد امثله فقط وانت من لوحة التحكم تقدر تعدل وتضيف الأسعار اللي تعجبك باللإضافة الى مسميات الباقات .</p>
<p style="text-align:right;">الطريقة الثانية للربح :</p>
<p style="text-align:right;">طبعا كلنا نعرف شركة قوقل ادسنس واللي مايعرفها هي عباره عن خدمة توفرها شركة قوقل لأصحاب المواقع، تتيح لهم الربح من مواقعهم من خلال عرض اعلانات في مواقعهم بشكل اوتوماتيك.<br />بعد مايتم ربط موقعك مع خدمة قوقل ادسنس الان اذ خش اي زائر لموقعك راح تكسب منه مباشرة <br />وأيضا اذ ضغط على اي اعلان من الإعلانات الظاهره أمامه في موقعك راح تكسب أكثر<br />فـلنفترض كان اسعار الاعلانات اليوم هو :<br />40 دولار لكل الف زائر و 0.25 سنت لكل نقرة على الاعلان<br />وانت خش موقعك اليوم 4 الف زائر و 1 الف زائر ضغطوا على الإعلانات اللي ظاهره في موقعك<br />راح يكون صافي ربحك ليوم واحد فقط هو: 160 دولار حق ال 4 الف زائر و 250 دولار حق ال 1000 نقره<br />المجموع : 410 دولار ( 1538 ريال) وفلوسك  راح تتجمع في حسابك على قوقل ادسنس وتقدر تسحبها عن طريق :<br />* تحويل بنكي<br />* ويسترن يونيون ( للي ماعنده حساب بنكي )<br />وطبعا هذا مجرد مثال للتوضيح فقط، لأن اسعار الاعلانات ليست ثاتبه وتتغير بين فتره وفتره يعني ممكن تطلع اكثر او اقل .</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">الميزات:</span></h4>
<p style="text-align:right;">* لوحة تحكم كاملة لأصحاب الأعمال والمعلنين عن الوظائف</p>
<p style="text-align:right;">* بروفايل ورابط مخصص لكل عضو بتصميم مميز وجذاب</p>
<p style="text-align:right;">* نظام سيو جاهز ومحسن مع نظام سايت ماب اوتوماتيك</p>
<p style="text-align:right;">* تصميم متجاوب ومتناسق مع جميع الأجهزة والهواتف</p>
<p style="text-align:right;">* الموقع يدعم اكثر من لغة ويمكن اضافة لغات جديدة </p>
<p style="text-align:right;">* لوحة تحكم كاملة وسهلة الإستخدام لصاحب الموقع</p>
<p style="text-align:right;">* قسم مخصص لنشر المقالات وآخر الأخبار</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">تجارب العملاء السابقين :</span></h4>
<p style="text-align:right;">هذا المشروع جديد ولم يتم شرائه من قبل اي عميل حتى الآن , لذا لايوجد تجارب سابقه .</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">الخدمات المجانيه :</span></h4>
<p style="text-align:right;">* دومين مجاني لمدة سنه</p>
<p style="text-align:right;">* سيرفر مجاني لمدة شهر</p>
<p style="text-align:right;">* دعم فني مستمر / عبر الوآتساب</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">المتطلبات :</span></h4>
<p style="text-align:right;">لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</p>
<p style="text-align:right;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </p>
<p style="text-align:right;">لازم تحط في الحسبان انك راح تدفع :</p>
<p style="text-align:right;">* 50 ريال شهريا ( للسيرفر )</p>
<p style="text-align:right;">* 80 ريال سنويا ( للدومين )</p>
<p style="text-align:right;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا<br /><br /></p>
<p style="text-align:right;">والله ولي التوفيق</p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="13"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/14" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/14">مشروع رفع الملفات</a>
                    <ul class="list-unstyled post-details">
                        <li>Ahmed naji</li>
                        <li>2023/01/25</li>
                        <li>1 إعجاب</li>
                    </ul>
                    <p><h4 class="MsoNormal" dir="rtl" style="text-align:center;"><span style="color:#34d8be;">بسم الله الرحمن الرحيم</span></h4>
<h2 class="MsoNormal" dir="rtl"><span style="color:#843fa1;font-size:14pt;">فكرة المشروع :</span></h2>
<p style="text-align:right;"><span style="font-size:medium;"><span style="font-weight:400;">المشروع عبارة عن موقع رفع ملفات زي موقع mediafire.</span></span></p>
<h4 class="MsoNormal" dir="rtl"><strong><span style="color:#34d8be;font-size:10pt;">والآن نشرح المشروع بالتفصيل :</span></strong></h4>
<p style="text-align:right;"><span style="font-size:medium;"><span style="font-weight:400;">في هذا المشروع راح يكون عندك موقع يقدر اي شخص يسجل فيه ويرفع ملفاته الخاصة بحيث يقدر يوصل لملفاته باي وقت بدون ما يحتاج يخزن الملفات على USB او hard disk . ويقدر انه يرسل الملفات لاي شخص عن طريق رابط ويمكن ايضا ارسال الرابط مباشرة الى ايميل الشخص</span></span></p>
<h4 class="MsoNormal" dir="rtl"><strong><span style="color:#34d8be;font-size:10pt;">كيف راح تكسب من المشروع ؟ :</span></strong></h4>
<p style="text-align:right;"><span style="font-size:medium;"><span style="font-weight:400;">الطريقة الاولى لربع من المشروع وهيا عبارة عن خطط اسعار تقدر تضيفها للمستخدمين بحيث ان الشخص اول ما يسجل بالموقع لازم يشتري خطة من الخطط مثال:</span></span></p>
<p style="text-align:right;"> </p>
<p style="text-align:right;"><span style="font-size:medium;"><span style="font-weight:400;"> الخطة المجانية : تتيح للمستخدم رفع ملفات بحجم 1 جيجا فقط </span></span></p>
<p style="text-align:right;">* الملفات راح تكون متاحة بالحساب لمدة 3 ايام فقط وبعدين راح تمسح بشكل تلقائي</p>
<p style="text-align:right;">* لا يمكن اضافة كلمة مرور الى الملفات</p>
<p style="text-align:right;">الخطة الاساسية : رفع ملفات تصل بحجم 10 جيجا</p>
<p style="text-align:right;">*الملفات متاحة لمدة  7 أيام</p>
<p style="text-align:right;">* يمكن اضافة كلمة مرور للملفات</p>
<p style="text-align:right;">طبعا تقدر تضيف الخطط بالشكل الي تبغاه</p>
<p style="text-align:right;"> </p>
<p style="text-align:right;">الطريقة الثانية للربح :</p>
<p style="text-align:right;">طبعا كلنا نعرف شركة قوقل ادسنس واللي مايعرفها هي عباره عن خدمة توفرها شركة قوقل لأصحاب المواقع، تتيح لهم الربح من مواقعهم من خلال عرض اعلانات في مواقعهم بشكل اوتوماتيك.<br />بعد مايتم ربط موقعك مع خدمة قوقل ادسنس الان اذ خش اي زائر لموقعك راح تكسب منه مباشرة <br />وأيضا اذ ضغط على اي اعلان من الإعلانات الظاهره أمامه في موقعك راح تكسب أكثر<br />فـلنفترض كان اسعار الاعلانات اليوم هو :<br />40 دولار لكل الف زائر و 0.25 سنت لكل نقرة على الاعلان<br />وانت خش موقعك اليوم 4 الف زائر و 1 الف زائر ضغطوا على الإعلانات اللي ظاهره في موقعك<br />راح يكون صافي ربحك ليوم واحد فقط هو: 160 دولار حق ال 4 الف زائر و 250 دولار حق ال 1000 نقره<br />المجموع : 410 دولار ( 1538 ريال) وفلوسك  راح تتجمع في حسابك على قوقل ادسنس وتقدر تسحبها عن طريق :<br />* تحويل بنكي<br />* ويسترن يونيون ( للي ماعنده حساب بنكي )<br />وطبعا هذا مجرد مثال للتوضيح فقط، لأن اسعار الاعلانات ليست ثاتبه وتتغير بين فتره وفتره يعني ممكن تطلع اكثر او اقل .</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">الميزات:</span></h4>
<p style="text-align:right;">* لوحة تحكم كاملة وسهلة الإستخدام لصاحب الموقع</p>
<p style="text-align:right;">* قسم مخصص لنشر المقالات </p>
<p style="text-align:right;">* نظام سيو جاهز ومحسن مع نظام سايت ماب اوتوماتيك</p>
<p style="text-align:right;">* صفحة لاظهار جميع المعاملات والمبالغ الى وصتلك</p>
<p style="text-align:right;">* اضافة كوبونات خصم لسعر الخطط</p>
<p style="text-align:right;">* بروفايل ورابط مخصص لكل عضو بتصميم مميز وجذاب</p>
<p style="text-align:right;">* التحكم والتعديل بجميع انواع الحسابات.</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">تجارب العملاء السابقين :</span></h4>
<p style="text-align:right;">هذا المشروع جديد ولم يتم شرائه من قبل اي عميل حتى الآن , لذا لايوجد تجارب سابقه .</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">الخدمات المجانيه :</span></h4>
<p style="text-align:right;">* دومين مجاني لمدة سنه</p>
<p style="text-align:right;">* سيرفر مجاني لمدة شهر</p>
<p style="text-align:right;">* دعم فني مستمر / عبر الوآتساب</p>
<h4 class="MsoNormal" dir="rtl"><span style="color:#843fa1;">المتطلبات :</span></h4>
<p style="text-align:right;">لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</p>
<p style="text-align:right;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافه الى رابط الموقع ( الدومين ) , ف بالتالي </p>
<p style="text-align:right;">لازم تحط في الحسبان انك راح تدفع :</p>
<p style="text-align:right;">* 50 ريال شهريا ( للسيرفر )</p>
<p style="text-align:right;">* 80 ريال سنويا ( للدومين )</p>
<p style="text-align:right;">وطبعا اول سنه و اول شهر راح تكون مجانيه من عندنا<br /><br /></p>
<p style="text-align:right;">والله ولي التوفيق</p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="14"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-md-6">
            <div class="post-item">
                <div class="post-img">
                    <img class="img-fluid" src="https://www.ektml.com/catalog/image/15" alt>
                </div>
                <div class="post-txt">
                    <a class="post-title" href="/prj/15">مشروع إدارة الشركات والمشاريع</a>
                    <ul class="list-unstyled post-details">
                        <li>ابراهيم شعبان</li>
                        <li>2023/05/06</li>
                        <li>1 إعجاب</li>
                    </ul>
                    <p><h4 class="MsoNormal" dir="rtl" style="text-align:center;"><span style="color:#34d8be;">بسم الله الرحمن الرحيم</span></h4>
<h2 class="MsoNormal" dir="rtl"><span style="color:#843fa1;font-size:14pt;">فكرة المشروع :</span></h2>
<h4 class="MsoNormal" dir="rtl"><strong><span style="color:#34d8be;font-size:10pt;">والآن نشرح المشروع بالتفصيل :</span></strong></h4>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">مشروع يساعدك على ادارة وتنظيم نشاطك التجاري وطاقم عملك , بالإضافة الى تسهيل خدمة عملائك , ومتابعة تقدم نشاطك التجاري للتأكد من نجاحه</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;"><br /><span style="font-size:14pt;"><strong><span style="color:#843fa1;">الميزات :</span></strong></span></p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;"><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* يدعم جميع اللغات .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* يدعم جميع العملات .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* يمكن للعملاء دفع الفواتير عن طريق السيستم من بوابات دفع متعددة .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام تسجيل دخول/خروج الموظفين .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام انشاء إعلانات او احداث للموظفين .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام انشاء وادارة مشاريع الشركة ومشاريع العملاء .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام ارسال ومتابعة المهمات الى فريق العمل .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام ابرام العقود والتوقيع الإلكتروني .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام متابعة فواتير العملاء والتذكير الشهري .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام احصائيات متقدمه لمتابعة تقدم نمو نشاطك التجاري .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* تقارير شهرية مفصله عن المصاريف والدخل والموظفين .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام دردشه مباشرة كـ واتساب , بين الموظفين او مع العملاء .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* نظام متطور لرفع وتخزين الملفات .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* رسائل اوتوماتيك على البريد الإلكتروني عند انشاء مهمه,مشروع, حدث جديد .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* ميزة ارسال رسائل جماعية مجانا الى ايميلات العملاء .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* ميزة انشاء اهداف للشركة وتتبع وصول الهدف الى ان يتم تحقيقه .</span><br style="color:#475569;font-family:Cairo, sans-serif;font-size:13.5px;background-color:#ffffff;" /><span style="font-family:Cairo, sans-serif;font-size:12pt;background-color:#ffffff;">* ميزة اخفاء اسماء الموظفين عند تواصلهم مع العميل .</span></p>
<h5 style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;color:#212529;font-family:'SST Arabic';text-align:right;"><span style="color:#843fa1;">تجارب العملاء السابقين :</span></h5>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">عذرا لا يمكننا عرض تجارب عملائنا حفاظا على خصوصيتهم</p>
<h5 style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;color:#212529;font-family:'SST Arabic';text-align:right;"><span style="color:#843fa1;">الخدمات المجانية :</span></h5>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">* دومين مجاني لمدة سنة</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">* سيرفر مجاني لمدة شهر</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">* دعم فني مستمر / عبر الوآتساب</p>
<h5 style="margin-top:0px;margin-bottom:0.5rem;font-weight:500;line-height:1.2;font-size:1.25rem;color:#212529;font-family:'SST Arabic';text-align:right;"><span style="color:#843fa1;">المتطلبات :</span></h5>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">زي ماشرحنا فكرة المشروع فوق , لازم تعرف انه اي موقع في العالم يكون شغال على ( سيرفرات )</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">والسيرفرات هذي يتم إستئجارها شهريا بالإضافة الى رابط الموقع ( الدومين ) , ف بالتالي </p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">لازم تحط في الحسبان انك راح تدفع :</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">* 50 ريال شهريا ( للسيرفر )</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">* 80 ريال سنويا ( للدومين )</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">وطبعا اول سنة و اول شهر راح تكون مجانية من عندنا</p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;"> </p>
<p style="margin-top:0px;margin-bottom:1rem;font-size:14px;color:#718096;font-family:'SST Arabic';text-align:right;">والله ولي التوفيق</p></p>
                    <div class="footer-post">
                        <div class="tags">
                            <a href="#">موبايل</a>
                        </div>
                        <div class="action-post">
                                                                    <a href="#"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="15"></i></a>
                                                            </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
</div>
</section>--> --}}


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
                    <i class='bx bx-left-arrow-alt'></i>
                </a>
            </div>
        </div>
    </div>
</div>
</section>

@component('layouts.components.rtl-links-js')
@endcomponent

@endsection
