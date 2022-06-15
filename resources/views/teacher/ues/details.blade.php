@extends("layouts.teacher")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('teacher.ues')}}">My Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $ue->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <!-- ============================ Page Title Start================================== -->
    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">

                    <div class="property_video">
                        <div class="thumb">
                            <img class="pro_img img-fluid w100" src="{{ $ue->photo }}" alt="7.jpg">
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="ed_detail_wrap">
                        <ul class="cources_facts_list">
                            <li class="facts-1">{{ $ue->semester->level->field->name }}</li>
                            <li class="facts-5">{{ $ue->semester->level->name }}</li>
                            <li class="facts-4">{{ $ue->semester->name }}</li>
                        </ul>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ $ue->name }}</h2>
                            <ul>
{{--                                <li><i class="ti-calendar"></i>10 - 20 weeks</li>--}}
{{--                                <li><i class="ti-control-forward"></i>102 Lectures</li>--}}
                                <li><i class="ti-user"></i>502 Student Enrolled</li>
                            </ul>
                        </div>
                        <div class="ed_header_short">
                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore. veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
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
                        <h4 class="edu_title">Course Overview</h4>
                        <p>{!! $ue->description !!}</p>
                    </div>

                    <div class="edu_wraper">
                        <h4 class="edu_title">Course Circullum</h4>
                        <div id="accordionExample" class="accordion shadow circullum">

                            <!-- Part 1 -->
                            <div class="card">
                                <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">Part 01: How To Learn Web Designing Step by Step</a></h6>
                                </div>
                                <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                                    <div class="card-body pl-3 pr-3">
                                        <ul class="lectures_lists">
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Part 2 -->
                            <div class="card">
                                <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 02: Learn Web Designing in Basic Level</a></h6>
                                </div>
                                <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                                    <div class="card-body pl-3 pr-3">
                                        <ul class="lectures_lists">
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Part 3 -->
                            <div class="card">
                                <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 03: Learn Web Designing in Advance Level</a></h6>
                                </div>
                                <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                                    <div class="card-body pl-3 pr-3">
                                        <ul class="lectures_lists">
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Part 04 -->
                            <div class="card">
                                <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                    <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 04: How To Become Succes in Designing & Development?</a></h6>
                                </div>
                                <div id="collapseThree" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
                                    <div class="card-body pl-3 pr-3">
                                        <ul class="lectures_lists">
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                            <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                            <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Item Reviews -  <span> 3 </span></h3>
                        </div>
                        <div class="reviews-comments-wrap">
                            <!-- reviews-comments-item -->
                            <div class="reviews-comments-item">
                                <div class="review-comments-avatar">
                                    <img src="assets/img/user-1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="reviews-comments-item-text">
                                    <h4><a href="#">Josaph Manrty</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>27 Oct 2019</span></h4>

                                    <div class="listing-rating high" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><span class="review-count">4.9</span> </div>
                                    <div class="clearfix"></div>
                                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                                    <div class="pull-left reviews-reaction">
                                        <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                        <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                        <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                    </div>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->

                            <!-- reviews-comments-item -->
                            <div class="reviews-comments-item">
                                <div class="review-comments-avatar">
                                    <img src="assets/img/user-2.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="reviews-comments-item-text">
                                    <h4><a href="#">Rita Chawla</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>2 Nov May 2019</span></h4>

                                    <div class="listing-rating mid" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i><span class="review-count">3.7</span> </div>
                                    <div class="clearfix"></div>
                                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                                    <div class="pull-left reviews-reaction">
                                        <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                        <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                        <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                    </div>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->

                            <!-- reviews-comments-item -->
                            <div class="reviews-comments-item">
                                <div class="review-comments-avatar">
                                    <img src="assets/img/user-3.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="reviews-comments-item-text">
                                    <h4><a href="#">Adam Wilsom</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>10 Nov 2019</span></h4>

                                    <div class="listing-rating good" data-starrating2="5"><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i> <span class="review-count">4.2</span> </div>
                                    <div class="clearfix"></div>
                                    <p>" Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus sollicitudin mauris. "</p>
                                    <div class="pull-left reviews-reaction">
                                        <a href="#" class="comment-like active"><i class="ti-thumb-up"></i> 12</a>
                                        <a href="#" class="comment-dislike active"><i class="ti-thumb-down"></i> 1</a>
                                        <a href="#" class="comment-love active"><i class="ti-heart"></i> 07</a>
                                    </div>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->

                        </div>
                    </div>

                    <!-- Submit Reviews -->
                    <div class="edu_wraper">
                        <h4 class="edu_title">Submit Reviews</h4>
                        <div class="review-form-box form-submit">
                            <form>
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="Your Name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" placeholder="Your Email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Review</label>
                                            <textarea class="form-control ht-140" placeholder="Review"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-theme">Submit Review</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">

                    <div class="ed_view_box style_2">

                        <div class="ed_author">
                            <div class="ed_author_thumb">
                                <img class="img-fluid" src="{{ $ue->teachers[0]->user->photo }}" alt="7.jpg">
                            </div>
                            <div class="ed_author_box">
                                <h4>{{ $ue->teachers[0]->user->name }}</h4>
                            </div>
                        </div>

                        <div class="ed_view_price pl-4">
                            <span>Acctual Price</span>
                            <h2 class="theme-cl">{{ number_format($ue->semester->level->pension) }} XAF</h2>
                        </div>
{{--                        <div class="ed_view_features pl-4">--}}
{{--                            <span>Course Features</span>--}}
{{--                            <ul>--}}
{{--                                <li><i class="ti-angle-right"></i>Fully Programming</li>--}}
{{--                                <li><i class="ti-angle-right"></i>Help Code to Code</li>--}}
{{--                                <li><i class="ti-angle-right"></i>Free Trial 7 Days</li>--}}
{{--                                <li><i class="ti-angle-right"></i>Unlimited Videos</li>--}}
{{--                                <li><i class="ti-angle-right"></i>24x7 Support</li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <div class="ed_view_link">
                            <a href="#" class="btn btn-theme enroll-btn">Enroll Class Now<i class="ti-angle-right"></i></a>
                        </div>

                    </div>

{{--                    <div class="edu_wraper">--}}
{{--                        <h4 class="edu_title">Course Features</h4>--}}
{{--                        <ul class="edu_list right">--}}
{{--                            <li><i class="ti-user"></i>Student Enrolled:<strong>1740</strong></li>--}}
{{--                            <li><i class="ti-files"></i>lectures:<strong>10</strong></li>--}}
{{--                            <li><i class="ti-game"></i>Quizzes:<strong>4</strong></li>--}}
{{--                            <li><i class="ti-time"></i>Duration:<strong>60 hours</strong></li>--}}
{{--                            <li><i class="ti-tag"></i>Skill Level:<strong>Beginner</strong></li>--}}
{{--                            <li><i class="ti-flag-alt"></i>Language:<strong>English</strong></li>--}}
{{--                            <li><i class="ti-shine"></i>Assessment:<strong>Yes</strong></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
@endsection
