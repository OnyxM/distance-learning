@extends("layouts.home")

@section("content")
    <!-- ============================ Page Title Start================================== -->
    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">

                    <div class="property_video">
                        <div class="thumb">
                            @php $r = "assets/img/edu_".rand(1,2).".png"; @endphp
                            <img class="pro_img img-fluid w100" src="{{ asset($r) }}" alt="{{ $level->name }}">
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="ed_detail_wrap">
                        <ul class="cources_facts_list">
                            <li class="facts-1"><a href="{{ route('fields.info', ['field' => $field->slug]) }}">{{ $field->name }}</a></li>
                            <li class="facts-5">{{ $level->name }}</li>
                        </ul>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ $level->name }}</h2>
                            <ul>
                                <li><i class="ti-user"></i>502 Student Enrolled</li>
                            </ul>
                        </div>
                        <div class="ed_header_short">
                            <p>{!! $level->description !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Course Detail ================================== -->
    <section class="bg-light">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-md-8">

                    <!-- Overview -->
                    <div class="edu_wraper">
                        <h4 class="edu_title">Class Overview</h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                        <h6>Requirements</h6>
                        <ul class="lists-3">
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                        </ul>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">

                    <div class="ed_view_box style_2">
                        <div class="ed_view_price pl-4 text-center">
                            <span>Acctual Price</span>
                            <h2 class="theme-cl">{{ number_format($level->pension) }} XAF</h2>
                        </div>

                        <div class="ed_view_link">
                            @if(!in_array($level->id, auth()->user()->classes()->pluck('levels.id')->toArray()))
                            <form action="{{ route('field.attend') }}" method="POST">
                                @csrf
                                <input type="hidden" name="field" value="{{ $field->slug }}" required>
                                <input type="hidden" name="level" value="{{ $level->slug }}" required>
                                <button type="submit" class="btn btn-theme enroll-btn">Enroll Class Now<i class="ti-angle-right"></i></button>
                            </form>
                            @else
                                <a href="#lessons" class="btn btn-theme enroll-btn">View Lessons<i class="ti-angle-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================ Page Title Start================================== -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title" id="lessons">Courses in {{ $level->name }} of {{ $field->name }}</h1>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Full Width Courses  ================================== -->
    <section class="pt-0">
        <div class="container">
            <!-- Onclick Sidebar -->
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div id="filter-sidebar" class="filter-sidebar">
                        <div class="filt-head">
                            <h4 class="filt-first">Advance Options</h4>
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close <i class="ti-close"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="container">
                        <div class="trips_wrap">
                            <div class="row m-0">
                                @foreach($level->semesters as $sem)
                                @foreach($sem->ues as $ue)
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="trips">
                                            <div class="trips_icons">
                                                <i class="ti-video-camera"></i>
                                            </div>
                                            <div class="trips_detail">
                                                <h4><a href="{{route('ue.info', ['field' => $field->slug, 'level' => $level->slug, 'ue' => $ue->code])}}">{{ $ue->name }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Row -->

        </div>
    </section>
    <!-- ============================ Full Width Courses End ================================== -->
@endsection
