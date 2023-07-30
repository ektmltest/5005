<div class="container">
    <div class="box-inner">
        <div class="box-content">
            <div class="page-title">
                <h2 class="h1">{{$header_title}}</h2>
                <p>{{$header_content}}</p>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">{{ucwords(__('headers.home'))}}</a></li>
                    @foreach ($links as $title => $link)
                        <li class="breadcrumb-item"><a href="{{$link}}">{{$title}}</a></li>
                    @endforeach
                    <li class="breadcrumb-item active" aria-current="page">{{$header_title}}</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
