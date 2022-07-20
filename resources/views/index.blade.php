@extends("layouts.home")

@section("content")
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="image-cover hero_banner hero-inner-2 shadow rlt" style="background:url('{{asset("assets/img/banner-2.jpg")}}') no-repeat;" data-overlay="7">
        <div class="elix_img_box">
            <img src="{{asset('assets/img/preet-o.html')}}" class="img-fluid" alt="" />
        </div>
        <div class="container">

            <div class="hero-caption small_wd mb-5">
                <h1 class="big-header-capt cl_2 mb-0">Learn on your schedule</h1>
                <p>Study any topic, anytime. Explore thousands of courses for the lowest price ever!</p>
            </div>
            <!-- Type -->
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="banner-search shadow_high">
                        <div class="search_hero_wrapping">
                            <form class="row" action="{{route('ues.search')}}#featured_courses" method="post">
                                @csrf

                                <div class="col-lg-10 col-md-5 col-sm-12 br-right">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Keyword" name="name" value="{{ $filter_ues }}" required/>
                                            <img src="{{ asset('assets/img/search.svg') }}" class="search-icon" alt="" />
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="col-lg-5 col-md-4 col-sm-12 small-pad">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="input-with-icon">--}}
{{--                                            <select id="c-category" class="form-control">--}}
{{--                                                <option value="">&nbsp;</option>--}}
{{--                                                <option value="1">Web Designing</option>--}}
{{--                                                <option value="2">Business</option>--}}
{{--                                                <option value="3">Accounting</option>--}}
{{--                                                <option value="3">Development</option>--}}
{{--                                                <option value="3">Art & Culture</option>--}}
{{--                                            </select>--}}
{{--                                            <img src="assets/img/pin.svg" class="search-icon" alt="" />--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="col-lg-2 col-md-3 col-sm-12 pl-0">
                                    <div class="form-group none">
                                        <button type="submit" class="btn search-btn full-width">Search</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Featured Courses Start ================================== -->

    <section class="min-sec" id="featured_courses">
    @if(count($recent_courses) > 0)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="sec-heading2">
                        <div class="sec-left">
                            @if($filter_ues == "")
                            <h3>Featured Courses</h3>
                            @else
                                <h3>We found {{ count($recent_courses) }} result(s) with <strong>{{ $filter_ues }}</strong></h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                    <div class="arrow_slide three_slide arrow_middle">
                    @foreach($recent_courses as $ue)
                        @php $ue = \App\Models\Ue::find($ue->id) @endphp
                        <!-- Single Slide -->
                            <div class="singles_items">
                                <div class="education_block_grid style_2">
                                    <div class="education_block_thumb n-shadow">
                                        <a href="{{route('ue.info', ['field' => @$ue->semester->level->field->slug, 'level' => @$ue->semester->level->slug, 'ue' => $ue->code])}}"><img src="{{$ue->photo}}" class="img-fluid" alt=""></a>
                                        <div class="cources_price">{{ number_format(@$ue->semester->level->pension)." XAF" }}</div>
                                    </div>

                                    <div class="education_block_body">
                                        <h3 class="bl-title">{{ strtoupper($ue->code)." - ".$ue->name}}</h3>
                                        <h6 class="text-secondary">{{ $ue->semester->level->field->name." ".$ue->semester->level->name }}</h6>
                                    </div>

                                    <div class="education_block_footer">
                                        <div class="education_block_author">
                                            <h5>{{ @$ue->teachers[0]->fullname }}</h5>
                                        </div>
                                        <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>{{ $ue->chapters()->count(). " lectures" }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Slide -->
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="">
                        <div class="text-center">
                            <h3>We found no results with <strong>{{ $filter_ues }}</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </section>
    <!-- ============================ Featured Courcses End ================================== -->
@endsection
