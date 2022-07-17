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
                        <p>{!! $level->description !!}</p>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-4">

                    <div class="ed_view_box style_2">
                        @php
                            $user_classes = [];

                            if(auth()->user()){
                                $user_classes = auth()->user()->classes()->pluck('levels.id')->toArray();
                            }
                        @endphp

                        @if(!in_array($level->id, $user_classes))
                            <div class="ed_view_price pl-4 text-center">
                                <span>Acctual Price</span>
                                <h2 class="theme-cl">{{ number_format($level->pension) }} XAF</h2>
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

                                <div class="modal fade" id="payForLevel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <form class="modal-content" action="{{ route('init-payment') }}" method="POST" id="placePaymentForm">
                                            @csrf
                                            <input type="hidden" name="field" value="{{$field->id}}" required>
                                            <input type="hidden" name="level" value="{{$level->id}}" required>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Make Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <h3>{{ $field->name. " - ". $level->name }}</h3>
                                                    <label>You are about to pay <strong>{{ number_format($level->pension) }} XAF</strong> to attend this class</label><br>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phone Number <sup class="text-danger">*</sup></label>
                                                    <input type="text" class="form-control" name="phone" required value="" placeholder="678955362">
                                                </div>
                                            </div>
                                            <div class="error-container text-center" id="info-container">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis dolor eligendi impedit, omnis praesentium sit. Animi, consequatur dignissimos eaque fuga libero magnam mollitia nesciunt quasi, quod sequi veritatis, voluptatum.</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Pay</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="ed_view_price pl-4 text-center">
                                <span>Actual Price</span>
                                <h2 class="">{{ number_format($level->pension) }} XAF</h2>
                            </div>
                            <div class="ed_view_link">
                                <a href="#lessons" class="btn btn-theme enroll-btn">View Lessons<i class="ti-angle-right"></i></a>
                            </div>
                        @endif
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
{{--            <div class="row">--}}
{{--                <div class="col-md-12 col-lg-12">--}}
{{--                    <div id="filter-sidebar" class="filter-sidebar">--}}
{{--                        <div class="filt-head">--}}
{{--                            <h4 class="filt-first">Advance Options</h4>--}}
{{--                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close <i class="ti-close"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="container">
                        <div class="trips_wrap">
                            <div class="row m-0">
                                @foreach($level->semesters as $sem)
                                    <div class="row m-1 col-12 justify-content-center">
                                        <h6 class="text-muted">{{ $sem->name }}</h6>
                                    </div>
                                    <div class="row">
                                        @foreach($sem->ues()->orderBy('code', 'asc')->get() as $ue)
                                            <div class="col-lg-3 col-md-3 col-sm-6">
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
                                    </div>
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

@section("js")
    <script>
        $(document).on('submit', "#placePaymentForm", function(evt){
            evt.preventDefault();

            let fa = $(this),
                infoContainer = $("#info-container");

            infoContainer.removeClass("text-danger"); infoContainer.removeClass("text-success"); infoContainer.empty();

            infoContainer.html(loader);

            $.ajax({
                type: 'post',
                url: fa.attr('action'),
                data: fa.serialize(),
                datatype: 'json',
                statusCode: {
                    422: function(e){
                        infoContainer.empty();
                        let errors = e.responseJSON.message;

                        infoContainer.addClass("text-danger");
                        infoContainer.html(errors);

                    },
                    200: function(response){
                        infoContainer.empty();
                        infoContainer.addClass("text-success");
                        infoContainer.html(response.message);

                        yourFunction(response.paymentId);
                    },
                }
            });
        });

        function yourFunction(paymentId){

            $.ajax({
                type: 'post',
                url: "{{ route('check-payment') }}",
                data: "payment_id="+paymentId,
                datatype: 'json',
                statusCode: {
                    200: function(response){
                        console.log(response);
                    },
                }
            });

            setTimeout(yourFunction(paymentId), 5000);
        }
    </script>
@endsection
