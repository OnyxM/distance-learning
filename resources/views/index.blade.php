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
                            <div class="row">

                                <div class="col-lg-5 col-md-5 col-sm-12 br-right">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" placeholder="Keyword" />
                                            <img src="assets/img/search.svg" class="search-icon" alt="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-4 col-sm-12 small-pad">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="c-category" class="form-control">
                                                <option value="">&nbsp;</option>
                                                <option value="1">Web Designing</option>
                                                <option value="2">Business</option>
                                                <option value="3">Accounting</option>
                                                <option value="3">Development</option>
                                                <option value="3">Art & Culture</option>
                                            </select>
                                            <img src="assets/img/pin.svg" class="search-icon" alt="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-3 col-sm-12 pl-0">
                                    <div class="form-group none">
                                        <a href="#" class="btn search-btn full-width">Search</a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Trips Facts Start ================================== -->
    <section class="p-0 trips_top">
        <div class="container">
            <div class="trips_wrap">
                <div class="row m-0">

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="trips">
                            <div class="trips_icons">
                                <i class="ti-video-camera"></i>
                            </div>
                            <div class="trips_detail">
                                <h4>100,000 online courses</h4>
                                <p>Nor again is there anyone who loves or pursues or desires</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="trips">
                            <div class="trips_icons">
                                <i class="ti-medall"></i>
                            </div>
                            <div class="trips_detail">
                                <h4>Expert instruction</h4>
                                <p>Nam libero tempore, cum soluta and nobis est eligendi optio</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="trips none">
                            <div class="trips_icons">
                                <i class="ti-infinite"></i>
                            </div>
                            <div class="trips_detail">
                                <h4>Lifetime access</h4>
                                <p>These cases are perfectly simple and easy to distinguish</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Trips Facts Start ================================== -->

    <!-- ============================ Featured Courcses Start ================================== -->
    <section class="min-sec">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="sec-heading2">
                        <div class="sec-left">
                            <h3>Featured Courses</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                    <div class="arrow_slide three_slide arrow_middle">
                        @foreach($recent_courses as $rec_course)
                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="{{$rec_course->photo}}" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$520</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">{{ucwords($rec_course->title)}}</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>8682 Views</li>
                                        <li><i class="ti-time mr-2"></i>6h 40min</li>
                                        <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-1.jpg" class="img-fluid" alt=""></a></div>
                                        <h5><a href="instructor-detail.html">Robert Wilson</a></h5>
                                    </div>
                                    <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>54 lectures</div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Featured Courcses End ================================== -->
@endsection
