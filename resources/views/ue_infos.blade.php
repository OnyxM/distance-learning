@extends("layouts.home")

@section("content")

    <!-- ============================ Page Title Start================================== -->
    <div class="ed_detail_head">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5">

                    <div class="property_video">
                        <div class="thumb">
                            <img class="pro_img img-fluid w100" src="{{ $ue->photo }}" alt="{{ $ue->name }}">
                        </div>
                    </div>

                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="ed_detail_wrap">
                        <ul class="cources_facts_list">
                            <li class="facts-1"><a href="{{ route('fields.info', ['field' => $field->slug]) }}">{{ $ue->semester->level->field->name }}</a></li>
                            <li class="facts-5"><a href="{{ route('levels.info', ['field' => $field->slug, 'level' => $level->slug]) }}">{{ $ue->semester->level->name }}</a></li>
                            <li class="facts-4">{{ $ue->semester->name }}</li>
                        </ul>
                        <div class="ed_header_caption">
                            <h2 class="ed_title">{{ $ue->name }}</h2>
                            <ul>
                                <li><i class="ti-user"></i>502 Student Enrolled</li>
                            </ul>
                        </div>
                        <div class="ed_header_short">
                            <p>{!! $ue->description !!}</p>
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
                            @foreach($ue->chapters as $chap)
                                <div class="card">
                                    <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                        <h6 class="mb-0 accordion_title row">
                                            <a href="#" class="d-block position-relative text-dark py-2">{{ $chap->name }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                @if($ue->comments()->count() > 0)
                    <!-- Reviews -->
                    <div class="list-single-main-item fl-wrap">
                        <div class="list-single-main-item-title fl-wrap">
                            <h3>Item Reviews</h3>
                        </div>
                        <div class="">
                            @foreach($ue->comments as $user)
                            <!-- reviews-comments-item -->
                            <div class="mb-4">
                                <div class="reviews-comments-item-text">
                                    <h5>
                                        <strong>{{ $user->name }}</strong>
                                        <span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>{{ $user->pivot->created_at }}</span>
                                    </h5>

                                    <div class="clearfix"></div>
                                    <p>{{ $user->pivot->comment }}</p>
                                </div>
                            </div>
                            <!--reviews-comments-item end-->
                            @endforeach
                        </div>
                    </div>
                @endif

                    @php
                        $user_classes = [];
                    @endphp
                    @auth <?php $user_classes = auth()->user()->classes()->pluck('levels.id')->toArray(); ?> @endauth

                    @if(in_array($level->id, $user_classes))
                    <!-- Submit Reviews -->
                    @if(!in_array(auth()->user()->id, $ue->comments()->pluck('user_id')->toArray()))
                    <div class="edu_wraper">
                        <h4 class="edu_title">Submit Reviews</h4>
                        <div class="review-form-box form-submit">
                            <form method="post" action="{{ route('ue.post_comment') }}" id="postComment">
                                @csrf
                                <input type="hidden" name="ue" value="{{ $ue->code }}" required>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" type="text" placeholder="Your Name" value="{{ auth()->user()->name }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" placeholder="Your Email" value="{{ auth()->user()->email }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Review</label>
                                            <textarea class="form-control ht-140" placeholder="Review" name="review" required></textarea>
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
                    @endif
                    @endif

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">

                    <div class="ed_view_box style_2">

                        <div class="ed_author">
                            <div class="ed_author_thumb">
                                <img class="img-fluid" src="{{ @$ue->teachers[0]->user->photo }}" alt="7.jpg">
                            </div>
                            <div class="ed_author_box">
                                <h4>{{ @$ue->teachers[0]->user->name }}</h4>
                            </div>
                        </div>

                        @if(!in_array($level->id, $user_classes))
                        <div class="ed_view_price pl-4 text-center">
                            <span>Acctual Price</span>
                            <h2 class="theme-cl">{{ number_format($ue->semester->level->pension) }} XAF</h2>
                        </div>
                            <div class="ed_view_link">
                                <form action="{{ route('field.attend') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="field" value="{{ $field->slug }}" required>
                                    <input type="hidden" name="level" value="{{ $level->slug }}" required>
                                    @auth
                                        <button data-toggle="modal" data-target="#payForLevel" type="button" class="btn btn-theme enroll-btn">Enroll Class Now<i class="ti-angle-right"></i></button>
                                    @else
                                        <a href="{{route('login')}}" class="btn btn-theme enroll-btn">Enroll Class Now<i class="ti-angle-right"></i></a>
                                    @endif
                                </form>
                            </div>
                        @else
                            <div class="ed_view_price pl-4 text-center">
                                <span>Acctual Price</span>
                                <h2 class="">{{ number_format($ue->semester->level->pension) }} XAF</h2>
                            </div>
                            <div class="ed_view_link">
                                <a href="{{ route('class.follow_course', ['ue'=>$ue->code]) }}" class="btn btn-theme enroll-btn">Follow Course<i class="ti-angle-right"></i></a>
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
@endsection

@section("js")
    @include("layouts.payment")
@endsection
