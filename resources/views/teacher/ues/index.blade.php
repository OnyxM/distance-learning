@extends("layouts.teacher")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Courses</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Course Style 1 For Student -->
            <div class="dashboard_container">
                <div class="dashboard_container_header">
                    <div class="dashboard_fl_1"></div>
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
                    @if(empty($ues))
                        <div class="dashboard_single_course text-center">
                            <div class="dashboard_single_course_caption text-danger">
                                You have not been assigned any courses at this time. Please come back later or contact the administration
                            </div>
                        </div>
                    @else
                    @foreach($ues as $ue)
                        <div class="dashboard_single_course">
                            <div class="dashboard_single_course_thumb">
                                <img src="{{ $ue->photo }}" class="img-fluid" alt="" />
                                <div class="dashboard_action">
                                    <a href="{{ route('teacher.ue.edit', ['ue_code' => strtolower($ue->code)]) }}" class="btn btn-ect">Edit</a>
                                    <a href="{{ route('ue.info', ['field'=>$ue->semester->level->field->slug, 'level'=>$ue->semester->level->slug, 'ue' => strtolower($ue->code)]) }}" class="btn btn-ect" target="_blank" rel="noopener">View</a>
{{--                                    <a href="{{ route('teacher.ue.details', ['ue_code' => strtolower($ue->code)]) }}" class="btn btn-ect" target="_blank" rel="noopener">View</a>--}}
                                </div>
                            </div>
                            <div class="dashboard_single_course_caption">
                                <div class="dashboard_single_course_head">
                                    <div class="dashboard_single_course_head_flex">
                                        <span class="dashboard_instructor">{{ $ue->semester->level->field->name." ".$ue->semester->level->slug }}</span>
                                        <h4 class="dashboard_course_title">{{ $ue->name }}</h4>
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
                                        {{--                                    <h4 class="dc_price_rate theme-cl">$129.00</h4>--}}
                                    </div>
                                </div>
                                <div class="dashboard_single_course_des">
                                    <p>{!! $ue->description !!}</p>
                                </div>
                                <div class="dashboard_single_course_progress">
{{--                                    <div class="dashboard_single_course_progress_1">--}}
{{--                                        <label>82% Completed</label>--}}
{{--                                        <div class="progress">--}}
{{--                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
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
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
