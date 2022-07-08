@extends("layouts.user")

@section("content")

    <!-- Row -->
    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap widget-1">
                <div class="dashboard_stats_wrap_content"><h4>{{ auth()->user()->classes->count() }}</h4> <span>My Classes</span></div>
                <div class="dashboard_stats_wrap-icon"><i class="ti-location-pin"></i></div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="dashboard_stats_wrap widget-2">
                <?php
                    $courses_count = 0;
                    foreach (auth()->user()->classes as $class) {
                        foreach ($class->ues as $ue) $courses_count++;
                    }
                ?>
                <div class="dashboard_stats_wrap_content"><h4>{{ $courses_count }}</h4> <span>My Courses</span></div>
                <div class="dashboard_stats_wrap-icon"><i class="ti-pie-chart"></i></div>
            </div>
        </div>

    </div>
    <!-- /Row -->

    <!-- Row -->
    <div class="row">

        <div class="col-lg-8 col-md-12 col-sm-12">
            <div class="row">

                @foreach(auth()->user()->classes as $level)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="course_overlay_cat">
                        <div class="course_overlay_cat_thumb">
                            <a href="{{ route('levels.info', ['field'=>$level->field->slug, 'level'=>$level->slug]) }}" target="_blank" rel="noopener" tabindex="0"><img src="{{ asset('assets/img/course-1.jpg') }}" class="img-fluid" alt=""></a>
                        </div>
                        <div class="course_overlay_cat_caption">
                            <div class="llp-left">
                                <h4><a href="#">{{ ucwords($level->field->name. " ". $level->name) }}</a></h4>
                                <span>{{ $level->ues->count() }} UE(s)</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

{{--        <div class="col-lg-4 col-md-12 col-sm-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">--}}
{{--                    <h6>Notifications</h6>--}}
{{--                </div>--}}
{{--                <div class="ground-list ground-hover-list">--}}
{{--                    <div class="ground ground-list-single">--}}
{{--                        <a href="#">--}}
{{--                            <div class="btn-circle-40 btn-success"><i class="ti-calendar"></i></div>--}}
{{--                        </a>--}}

{{--                        <div class="ground-content">--}}
{{--                            <h6><a href="#">Maryam Amiri</a></h6>--}}
{{--                            <small class="text-fade">Check New Admin Dashboard..</small>--}}
{{--                            <span class="small">Just Now</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="ground ground-list-single">--}}
{{--                        <a href="#">--}}
{{--                            <div class="btn-circle-40 btn-danger"><i class="ti-calendar"></i></div>--}}
{{--                        </a>--}}

{{--                        <div class="ground-content">--}}
{{--                            <h6><a href="#">Maryam Amiri</a></h6>--}}
{{--                            <small class="text-fade">You can Customize..</small>--}}
{{--                            <span class="small">02 Min Ago</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="ground ground-list-single">--}}
{{--                        <a href="#">--}}
{{--                            <div class="btn-circle-40 btn-info"><i class="ti-calendar"></i></div>--}}
{{--                        </a>--}}

{{--                        <div class="ground-content">--}}
{{--                            <h6><a href="#">Maryam Amiri</a></h6>--}}
{{--                            <small class="text-fade">Need Responsive Business Tem...</small>--}}
{{--                            <span class="small">10 Min Ago</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="ground ground-list-single">--}}
{{--                        <a href="#">--}}
{{--                            <div class="btn-circle-40 btn-warning"><i class="ti-calendar"></i></div>--}}
{{--                        </a>--}}

{{--                        <div class="ground-content">--}}
{{--                            <h6><a href="#">Maryam Amiri</a></h6>--}}
{{--                            <small class="text-fade">Next Meeting on Tuesday..</small>--}}
{{--                            <span class="small">15 Min Ago</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
    <!-- /Row -->
@endsection
