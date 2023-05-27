@foreach (\App\Models\ReadyProject::take(3)->get() as $project)
<div class="item prj-3 col-md-4 mb-4">
    <div class="post-item">
        <div class="post-img">
            <img class="img-fluid" mu-open mu-link="/prj/1" style="border-radius: 16px; cursor: pointer;"
                src="{{ asset('assets/img/'.$project->image) }}" alt>
        </div>

        <div class="post-txt">
            <a class="post-title" href="{{ route('project', $project->id) }}">{{ $project->name }}</a>
            <ul class="list-unstyled post-details">
                <li></li>
                <li>{{ $project->created_at }}</li>
                <li>9 Liked</li>
            </ul>
            <p>{{ $project->description }}</p>
            <div class="footer-post">
                <div class="tags">
                    <a href="{{ route('project', $project->id) }}">
                        {{ $project->price }} {{ __('home_trans.SAR') }}
                    </a>
                </div>
                <div class="action-post">
                    <a href="{{ route('like', $project->id) }}"><i class="bx bx-heart loveProject" mu-notlogged="" mu-id="1"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
