@extends("layouts.home")

@section("content")
    <!-- ============================ Page Title Start================================== -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Available Levels of {{ $field->name }}</h1>
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
                                @foreach($field->levels as $level)
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="trips">
                                            <div class="trips_icons">
                                                <i class="ti-video-camera"></i>
                                            </div>
                                            <div class="trips_detail">
                                                <h4><a href="{{route('levels.info', ['field' => $field->slug, 'level' => $level->slug])}}">{{ $level->name }}</a></h4>
                                            </div>
                                        </div>
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
