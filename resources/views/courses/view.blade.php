@extends("layouts.user")

@section("css")
    <style>
        .container-frame {
            position: relative;
            overflow: hidden;
            width: 100%;
            padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        /* Then style the iframe to fit in the container div with full height and width */
        .responsive-iframe {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section("content")
    <!-- ============================ Course Detail ================================== -->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">

                    <div class="ed_view_box style_2">
                        <div class="ed_author">
                            <div class="ed_author_box">
                                <h4>Course Content</h4>
                            </div>
                        </div>

                        <div class="ed_view_price pl-4">
                            <div class="edu_wraper" style="padding: 1rem!important;">
                                @foreach($course->modules as $key => $mod)
                                    <div class="card">
                                        <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0 accordion_title">
                                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}" class="d-block position-relative collapsed text-dark collapsible-link py-2">
                                                    {{$mod->name}}
                                                </a>
                                            </h6>
                                        </div>

                                        @if($mod->sections()->count() > 0)
                                            <div id="collapse{{$key}}" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                                                <div class="card-body pl-3 pr-3">
                                                    <ul class="lectures_lists">
                                                        <li class="">
                                                            <a href="{{route('course.details.module.intro', ['id'=>$course->id, 'slug_course'=>$course->slug, 'module' => $mod->slug])}}">
                                                                <div class="lectures_lists_title">
                                                                    <i class="ti-control-play"></i>Intro
                                                                </div>
                                                            </a>
                                                        </li>
                                                        @foreach($mod->sections as $k => $section)
                                                            <li class="">
                                                                <a href="{{route('course.details.module.section', ['id'=>$course->id, 'slug_course'=>$course->slug, 'module' => $mod->slug, 'section' => $section->slug])}}">
                                                                    <div class="lectures_lists_title"><i class="ti-control-play"></i>{{$section->title}}</div>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                        <li class="">
                                                            <a href="{{route('course.details.module.worksheet', ['id'=>$course->id, 'slug_course'=>$course->slug, 'module' => $mod->slug, 'worksheet' => "td"])}}">
                                                                <div class="lectures_lists_title"><i class="ti-control-play"></i>TD Worksheet</div>
                                                            </a>
                                                        </li>
                                                        <li class="">
                                                            <a href="{{route('course.details.module.worksheet', ['id'=>$course->id, 'slug_course'=>$course->slug, 'module' => $mod->slug, 'worksheet' => "tp"])}}">
                                                                <div class="lectures_lists_title"><i class="ti-control-play"></i>TP Worksheet</div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8">

                    <!-- Overview -->
                    @if($type == "intro")
                    <div class="edu_wraper">
                        <h4 class="edu_title">{!! $module->name !!}</h4>
                        <video fullscreen controls="controls"  src="{{$module->intro}}"></video>
                    </div>
                    @elseif($type=="section")
                    <div class="edu_wraper">
                        <h4 class="edu_title">{!! $module->name !!}</h4>
                        <h4 class="edu_title">{!! $section->title !!}</h4>
                        <p>{!! $section->content !!}</p>
                    </div>
                    @elseif(in_array($type, ['tp', 'td']))
                        <div class="edu_wraper">
                            <h4 class="edu_title">{!! $module->name !!}</h4>
                        </div>

                        <div class="container-frame">
                            <embed class="responsive-iframe" src="{{$module->$type}}#toolbar=0">
                        </div>
                    @else
                    <div class="edu_wraper">
                        <h4 class="edu_title">Course Overview</h4>
                        <p>{!! $course->description !!}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
@endsection
