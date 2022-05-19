@extends("layouts.user", ['container' => true])

@section("content")
    <!-- ============================ Page Title Start================================== -->
    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">

                    <div class="property_video">
                        <div class="thumb">
                            <img class="pro_img img-fluid w100" src="{{$course->photo}}" alt="7.jpg">
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="ed_detail_wrap">
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ucwords($course->title)}}</h2>
                            <ul>
                                <li><i class="ti-user"></i>{{$course->participants()->count()}} Student Enrolled</li>
                            </ul>
                        </div>
                        <div class="ed_header_short">
                            <p>{!! $course->substr_description !!}</p>
                        </div>

                        <div class="ed_rate_info">
                            <div class="star_info">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="review_counter">
                                <strong class="high">4.7</strong> 3572 Reviews
                            </div>
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
                        <p>{!! $course->substr_description !!}</p>
                    </div>

                    <div class="edu_wraper">
                        <h4 class="edu_title">Course Circullum</h4>
                        <div id="accordionExample" class="accordion shadow circullum">
                            @foreach($course->modules as $key => $module)
                                <div class="card">
                                    <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                        <h6 class="mb-0 accordion_title">
                                            <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}" class="d-block position-relative collapsed text-dark collapsible-link py-2">
                                                {{$module->name}}
                                            </a>
                                        </h6>
                                    </div>

                                    @if($module->sections()->count() > 0)
                                    <div id="collapse{{$key}}" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                                        <div class="card-body pl-3 pr-3">
                                            <ul class="lectures_lists">
                                                @foreach($module->sections as $k => $section)
                                                    <li class="unview">
                                                        <div class="lectures_lists_title"><i class="ti-control-play"></i>{{$section->title}}</div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Reviews -->

                    @if($course->participants()->wherePivot('comment', '!=', null)->count() != 0)
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Reviews</h3>
                        </div>

                        @foreach($course->participants as $p)
                        @if(!is_null($p->pivot->comment ))
                        <div class="reviews-comments-wrap">
                            <!-- reviews-comments-item -->
                            <div class="reviews-comments-item">
                                <div class="review-comments-avatar">
                                    <img src="{{asset('assets/img/user-1.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="reviews-comments-item-text">
                                    <h4>
                                        <a href="#">{{ $p->name }}</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>{{ date('d M Y', $p->pivot->registration_date) }}</span></h4>

                                    <div class="clearfix"></div>
                                    <p>{{ $p->pivot->comment }}</p>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif

                @if(in_array(auth()->user()->id, $course->participants()->pluck('user_id')->toArray())
                        && is_null($course->participants()->where('user_id',auth()->user()->id)->first()->pivot->comment))
                <!-- Submit Reviews -->
                <div class="edu_wraper">
                    <h4 class="edu_title">Say something about this course</h4>
                    <div class="review-form-box form-submit">
                        <form action="{{route('course.submit_review', ['id'=>$course->id, 'slug_course'=>$course->slug])}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control" type="text" placeholder="Your Name" value="{{auth()->user()->name}}" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="email" placeholder="Your Email" value="{{auth()->user()->email}}" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label>Review</label>
                                        <textarea class="form-control ht-140" placeholder="Review" name="review" required></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-theme">Submit Review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">
                    <div class="ed_view_box style_2">

                        <div class="ed_author">
                            <div class="ed_author_thumb">
                                <img class="img-fluid" src="{{asset('assets/img/user-5.jpg')}}" alt="7.jpg">
                            </div>
                            <div class="ed_author_box">
                                <h4>{{$course->user->name}}</h4>
                            </div>
                        </div>

                        <div class="ed_view_price pl-4">
                            <span>Acctual Price</span>
                            @if($course->price != 0)
                            <h2 class="theme-cl">{{number_format($course->price). " XAF"}}</h2>
                            @else
                                <h2 class="theme-cl">FREE</h2>
                            @endif
                        </div>
                        <div class="ed_view_link">
                            @if(!in_array(auth()->user()->id, $course->participants()->pluck('user_id')->toArray()))
                                <a href="{{route('course.enroll', ['id'=>$course->id, 'slug_course'=>$course->slug])}}" class="btn btn-theme enroll-btn">Enroll Now<i class="ti-angle-right"></i></a>
                            @else
                                <a href="{{route('course.enroll', ['id'=>$course->id, 'slug_course'=>$course->slug])}}" class="btn btn-theme enroll-btn">Continue <i class="ti-angle-right"></i></a>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
@endsection
