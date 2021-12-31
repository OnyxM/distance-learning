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
                        <div class="sec-right">
                            <ul class="nav nav-tabs side-cates">
                                <li class="nav-item">
                                    <a class="nav-link active" href="javascript:void(0);">Design</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0);">Development</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0);">Business</a>
                                </li>
                                <li class="nav-item" href="javascript:void(0);">
                                    <a class="nav-link" href="javascript:void(0);">Accounting</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                    <div class="arrow_slide three_slide arrow_middle">

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="assets/img/co-1.jpg" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$520</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">Tableau For Beginners: Get CA Certified, Grow Your Career</a></h4>
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
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="assets/img/co-2.jpg" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$349</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">The Complete Business Plan Course (Includes 50 Templates)</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>9882 Views</li>
                                        <li><i class="ti-time mr-2"></i>6h 30min</li>
                                        <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-2.jpg" class="img-fluid" alt=""></a></div>
                                        <h5><a href="instructor-detail.html">Shruti Hasan</a></h5>
                                    </div>
                                    <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>26 lectures</div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="assets/img/co-3.jpg" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$545</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">An Entire MBA In 1 Course:Award Winning Business School Prof</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>5893 Views</li>
                                        <li><i class="ti-time mr-2"></i>5h 15min</li>
                                        <li><i class="ti-star text-warning mr-2"></i>4.7 Reviews</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-3.jpg" class="img-fluid" alt=""></a></div>
                                        <h5><a href="instructor-detail.html">Adam Viknoi</a></h5>
                                    </div>
                                    <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>52 lectures</div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="assets/img/co-4.jpg" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$420</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">The Complete Financial Analyst Course 2020</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>8582 Views</li>
                                        <li><i class="ti-time mr-2"></i>4h 59min</li>
                                        <li><i class="ti-star text-warning mr-2"></i>4.6 Reviews</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-4.jpg" class="img-fluid" alt=""></a></div>
                                        <h5><a href="instructor-detail.html">Shilpa Shekh</a></h5>
                                    </div>
                                    <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>43 lectures</div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="assets/img/co-5.jpg" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$429</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">PMP Exam Prep Seminar - PMBOK Guide 6</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>9857 Views</li>
                                        <li><i class="ti-time mr-2"></i>7h 45min</li>
                                        <li><i class="ti-star text-warning mr-2"></i>4.9 Reviews</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-5.jpg" class="img-fluid" alt=""></a></div>
                                        <h5><a href="instructor-detail.html">Shaurya Preet</a></h5>
                                    </div>
                                    <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>32 lectures</div>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="assets/img/co-6.jpg" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$249</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">Tableau 2020 A-Z:Hands-On Tableau Training For Data Science!</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>6852 Views</li>
                                        <li><i class="ti-time mr-2"></i>2h 30min</li>
                                        <li><i class="ti-star text-warning mr-2"></i>4.8 Reviews</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-6.jpg" class="img-fluid" alt=""></a></div>
                                        <h5><a href="instructor-detail.html">Preeti Bhartiya</a></h5>
                                    </div>
                                    <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>48 lectures</div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="education_block_grid style_2">
                                <div class="education_block_thumb n-shadow">
                                    <a href="course-detail.html"><img src="assets/img/co-7.jpg" class="img-fluid" alt=""></a>
                                    <div class="cources_price">$329</div>
                                </div>

                                <div class="education_block_body">
                                    <h4 class="bl-title"><a href="course-detail.html">The Complete Financial Analyst Training & Investing Course</a></h4>
                                </div>

                                <div class="cources_info_style3">
                                    <ul>
                                        <li><i class="ti-eye mr-2"></i>8852 Views</li>
                                        <li><i class="ti-time mr-2"></i>3h 20min</li>
                                        <li><i class="ti-star text-warning mr-2"></i>4.9 Reviews</li>
                                    </ul>
                                </div>

                                <div class="education_block_footer">
                                    <div class="education_block_author">
                                        <div class="path-img"><a href="instructor-detail.html"><img src="assets/img/user-7.jpg" class="img-fluid" alt=""></a></div>
                                        <h5><a href="instructor-detail.html">Jasvinder Bhartiya</a></h5>
                                    </div>
                                    <div class="foot_lecture"><i class="ti-control-skip-forward mr-2"></i>42 lectures</div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Featured Courcses End ================================== -->

    <!-- ============================ Featured Category Start ================================== -->
    <section class="bg-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="sec-heading2">
                        <div class="sec-left">
                            <h3>Got & Popular Categories</h3>
                        </div>
                        <div class="sec-right">
                            <a href="javascript:void(0);" class="btn-br-more">Browse More</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                    <div class="arrow_slide three_slide-dots arrow_middle">

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url('{{asset("assets/img/course-7.jpg")}}');"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Finance & Accounting</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url(assets/img/course-8.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Gym & Lifestyle</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url(assets/img/course-9.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Health & Fitness</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url(assets/img/course-10.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Software & Development</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Single Slide -->
                        <div class="singles_items">
                            <div class="edu_cat">
                                <div class="pic">
                                    <a class="pic-main" href="#" style="background-image:url(assets/img/course-11.jpg);"></a>
                                </div>
                                <div class="edu_data">
                                    <h4 class="title"><a href="#">Business Development</a></h4>
                                    <ul class="meta">
                                        <li class="video"><i class="ti-video-clapper"></i>23 Videos</li>
                                        <li class="lessions"><i class="ti-book"></i>54 Lessions</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Featured Category End ================================== -->

    <!-- ========================== Articles Section =============================== -->
    <section class="min-sec">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading-flex">
                        <h2 class="pl-2">Recent Articles</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Article -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="articles_grid_style">
                        <div class="articles_grid_thumb">
                            <a href="blog-detail.html"><img src="assets/img/b-1.jpg" class="img-fluid" alt="" /></a>
                        </div>

                        <div class="articles_grid_caption">
                            <h4>The National Minimum wage is an important part</h4>
                            <div class="articles_grid_author">
                                <div class="articles_grid_author_img"><img src="assets/img/user-1.jpg" class="img-fluid" alt="" /></div>
                                <h4>Adam Willsone</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Article -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="articles_grid_style">
                        <div class="articles_grid_thumb">
                            <a href="blog-detail.html"><img src="assets/img/b-2.jpg" class="img-fluid" alt="" /></a>
                        </div>

                        <div class="articles_grid_caption">
                            <h4>The National Minimum wage is an important part</h4>
                            <div class="articles_grid_author">
                                <div class="articles_grid_author_img"><img src="assets/img/user-2.jpg" class="img-fluid" alt="" /></div>
                                <h4>Rikki Sen</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Article -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="articles_grid_style">
                        <div class="articles_grid_thumb">
                            <a href="blog-detail.html"><img src="assets/img/b-3.jpg" class="img-fluid" alt="" /></a>
                        </div>

                        <div class="articles_grid_caption">
                            <h4>The National Minimum wage is an important part</h4>
                            <div class="articles_grid_author">
                                <div class="articles_grid_author_img"><img src="assets/img/user-3.jpg" class="img-fluid" alt="" /></div>
                                <h4>Daniel Wikjones</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ========================== Articles Section =============================== -->
@endsection
