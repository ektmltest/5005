<section id="pricing-table" class="pricing-table">
    <div class="container">
        <div class="section-pricing">
            <h3>{{ __('request_project_trans.bodyTitle')}}</h3>
            <p>{{ __('request_project_trans.bodysTitle')}}</p>
        </div>
        <div class="row">
            @foreach ($departments as $department)
            <!-- Start Price Item -->
            <div class="col-md-4">
                <div class="price-item">
                    <div class="table-ico">
                        <i class='{{$department->icon}}'></i>
                    </div>
                    <h4>{{$department->name}}</h4>
                    <div class="price-value">
                        <span>{{ __('request_project_trans.des1') . ' ' . $department->name }}</span>
                    </div>
                    <div class="price-details">
                        <ul class="list-unstyled">
                            @foreach ($department->categories as $category)
                            <li class="co-green"><i class="{{$category->icon}}"></i>{{$category->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="price-btn">
                        <a class="bttn btn-purple" href="#">
                            {{ __('request_project_trans.Choose the section') }}
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Price Item -->
            @endforeach

        </div>
    </div>
</section>
