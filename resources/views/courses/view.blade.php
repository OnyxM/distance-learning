@extends("layouts.user", ['container' => true])

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="row justify-content-center mb-4">
                        <strong class="h4"><u>{{ strtoupper($ue->code) . " : " . $ue->name }}</u></strong>
                    </div>
                    <div class=" style_2">
{{--                        <div class="ed_author">--}}
{{--                            <div class="ed_author_box">--}}
{{--                                <h4>Course Content</h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="ed_view_price pl-4" style="overflow-y: auto;max-height: 100vh;">
                            <div class="edu_wraper" style="padding: 1rem!important;">
                                @foreach($ue->chapters as $chap)
                                    <div class="card">
                                        <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0">
                                                <a class="d-block position-relative py-2 @if($chapter->id==$chap->id) text-danger @endif" href="{{route('class.follow_course', ['ue' =>$ue->code, 'chapter'=>$chap->id])}}">
                                                    {{$chap->name}}
                                                </a>
                                                @if($chapter->id==$chap->id)
                                                    <ul>
                                                        @if(!is_null($chapter->td))
                                                            <li>
                                                                <a class="ml-4 d-block position-relative py-2 @if(isset($resource) && $resource=="td") text-danger @endif" href="{{route('class.follow_course.resource', ['ue' =>$ue->code, 'chapter'=>$chap->id, 'resource' => "td"])}}">
                                                                    Tutorial File (TD)
                                                                </a>
                                                            </li>
                                                        @endif
                                                        @if(!is_null($chapter->tp))
                                                            <li>
                                                                <a class="ml-4 d-block position-relative py-2 @if(isset($resource) && $resource=="tp") text-danger @endif" href="{{route('class.follow_course.resource', ['ue' =>$ue->code, 'chapter'=>$chap->id, 'resource' => "tp"])}}">
                                                                    Practical Work File (TP)
                                                                </a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                @endif
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-8">

{{--                    <!-- Overview -->--}}
{{--                    <div class="edu_wraper">--}}
{{--                        <h4 class="edu_title row">--}}
{{--                            <span class="text-left col-md-6">{!! $chapter->name !!}</span>--}}
{{--                        </h4>--}}
{{--                    </div>--}}

                    @if(!is_null($chapter))
                    <div class="container-frame">
                        @if(!isset($resource) || !in_array($resource, ['td', 'tp']))
                        <embed class="responsive-iframe" src="{{ asset($chapter->document) }}">
                        @else
                        <embed class="responsive-iframe" src="{{ asset($chapter->$resource) }}">
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
@endsection
