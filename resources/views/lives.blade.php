@extends("layouts.home")

@section("content")
    <!-- ============================ Page Title Start================================== -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Available Lives</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lives</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Full Width Lives  ================================== -->
    <section class="pt-0">
        <div class="container">

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- /Row -->

                    <div class="row">
                        <!-- Cource Grid -->

                        @foreach(getStudentLives() as $live)
                            <div class="m-2 col-lg-4 col-md-6">
                                <div class="education_block_grid style_2">

                                    <div class="education_block_thumb">
                                        <a href="#"><img src="{{asset('assets/img/course-1.jpg')}}" class="img-fluid" alt=""></a>
                                    </div>

                                    <div class="education_block_body">
                                        <h4 class="bl-title">{{ $live->titre }}</h4>
                                        <hr>
                                        <h6 class="">{{ $live->ue->code . " - " . $live->ue->name }}</h6>
                                        <hr>
                                        <h5>Date: {{ date("d M Y H:i", $live->date_debut) }}</h5>
                                    </div>

                                    <div class="education_block_footer">
                                        <div class="education_block_author">
                                            <div class="path-img"><a href="javascript:void(0);"><img src="{{asset('assets/img/user-1.jpg')}}" class="img-fluid" alt=""></a></div>
                                            <h5><a href="javascript:void(0);">{{ $live->user->name }}</a></h5>
                                        </div>
                                    </div>

                                    <div class="p-3" style="border-top: 1px solid #f0f1f5;">
                                        <div class="row justify-content-around">
                                            <a href="{{route('user.lives.assist', ['live_code'=>$live->uuid])}}" data-id="{{$live->id}}" class="btn btn-outline-theme">Join Live</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <!-- Cource Grid -->
                    </div>

                    <!-- Pagination -->
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                                    <ul class="pagination p-center">--}}
{{--                                        <li class="page-item">--}}
{{--                                            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                                <span class="ti-arrow-left"></span>--}}
{{--                                                <span class="sr-only">Previous</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                        <li class="page-item active"><a class="page-link" href="#">3</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">...</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">18</a></li>--}}
{{--                                        <li class="page-item">--}}
{{--                                            <a class="page-link" href="#" aria-label="Next">--}}
{{--                                                <span class="ti-arrow-right"></span>--}}
{{--                                                <span class="sr-only">Next</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

            </div>
            <!-- Row -->

        </div>
    </section>
    <!-- ============================ Full Width Lives End ================================== -->
@endsection
