@extends("layouts.teacher")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Course Style 1 For Student -->
            <div class="dashboard_container">
                <div class="dashboard_container_header">
                    <div class="dashboard_fl_1">
                        <h4>All Courses</h4>
                    </div>
                    <div class="dashboard_fl_2">
                        <ul class="mb0">
                            <li class="list-inline-item"></li>
                            <li class="list-inline-item">
                                <form class="form-inline my-2 my-lg-0">
                                    <input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
                                    <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard_container_body">
                    @foreach($courses as $course)
                        <div class="dashboard_single_course">
                            <div class="dashboard_single_course_thumb">
                                <img src="{{$course->photo}}" class="img-fluid" alt="" />
                                <div class="dashboard_action">
                                    <a href="{{route('course.edit', ['uuid_course' => $course->uuid])}}" class="btn btn-ect">Edit</a>
                                    <a href="#" class="btn btn-ect">View</a>
                                </div>
                            </div>
                            <div class="dashboard_single_course_caption">
                                <div class="dashboard_single_course_head">
                                    <div class="dashboard_single_course_head_flex">
{{--                                        <span class="dashboard_instructor">Adam Wilson</span>--}}
                                        <h4 class="dashboard_course_title">{{ucwords($course->title)}}</h4>
                                        <div class="dashboard_rats">
                                            <div class="dashboard_rating">
                                                <i class="ti-star filled"></i>
                                                <i class="ti-star filled"></i>
                                                <i class="ti-star filled"></i>
                                                <i class="ti-star filled"></i>
                                                <i class="ti-star"></i>
                                            </div>
                                            <span>(40 Reviews)</span>
                                        </div>
                                    </div>
                                    <div class="dc_head_right">
                                        @if($course->price== 0)
                                        <h4 class="dc_price_rate theme-cl">FREE</h4>
                                        @else
                                            <h4 class="dc_price_rate theme-cl">{{ number_format($course->price) . " FCFA" }}</h4>
                                        @endif
                                    </div>
                                </div>
                                <div class="dashboard_single_course_des">
                                    <p>{!! substr($course->description, 0, 200) !!} ...</p>
                                </div>
                                <div class="dashboard_single_course_progress">
                                    <div class="dashboard_single_course_progress_1">
                                        <label>82% Completed</label>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="dashboard_single_course_progress_2">
                                        <ul class="m-0">
                                            <li class="list-inline-item"><i class="ti-user mr-1"></i>4512 Enrolled</li>
                                            <li class="list-inline-item"><i class="ti-comment-alt mr-1"></i>112 Comments</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->
@endsection
