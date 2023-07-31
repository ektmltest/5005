<section id="faqs-pp" class="faqs-pp">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <aside class="aside-bar">
                    <div class="faq-control">
                        <ul class="list-unstyled">
                            @foreach ($types as $type)
                            <li>
                                <a href="#{{$type->key}}">
                                    <i class='{{$type->icon}}'></i>
                                    {{$type->name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="col-xl-9 col-lg-8">
                <div class="faq-question">
                    @foreach ($types as $type)
                    <div id="{{$type->key}}" class="accordion-box">
                        <h4>
                            <span>
                                <i class='{{$type->icon}}'></i>
                                {{$type->name}}
                            </span>
                        </h4>
                        <div id="accordion" class="accordion-faq">
                            @foreach ($type->qas as $qa)

                            @php $unique_id = $type->id . '-' . $qa->id @endphp

                            <div class="card">
                                <div class="card-header" id="heading{{$unique_id}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapse{{$unique_id}}" aria-expanded="false"
                                            aria-controls="collapse{{$unique_id}}">
                                            {{$qa->question}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{$unique_id}}" class="collapse" aria-labelledby="heading{{$unique_id}}"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <p>{{$qa->answer}}</p>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
