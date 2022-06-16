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
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <h6>Requirements</h6>
                        <ul class="lists-3">
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                            <li>At vero eos et accusamus et iusto odio dignissimos ducimus</li>
                        </ul>
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

                        @if(!in_array($level->id, auth()->user()->classes()->pluck('levels.id')->toArray()))
                        <div class="ed_view_price pl-4 text-center">
                            <span>Acctual Price</span>
                            <h2 class="theme-cl">{{ number_format($ue->semester->level->pension) }} XAF</h2>
                        </div>
                        <div class="ed_view_link">
                            <form action="{{ route('field.attend') }}" method="POST">
                                @csrf
                                <input type="hidden" name="field" value="{{ $field->slug }}" required>
                                <input type="hidden" name="level" value="{{ $level->slug }}" required>
                                <button type="submit" class="btn btn-theme enroll-btn">Enroll Class Now<i class="ti-angle-right"></i></button>
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
