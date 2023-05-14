<!-- Start Header Content -->
<div class="container">
    <div class="box-inner">
        <div class="box-content">
            <div class="page-title">
                <h2 class="h1">{{$header_title}}</h2>
                <p>{{$header_content}}</p>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">{{ucwords(__('headers.about.home'))}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$header_title}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- End Header Content -->
