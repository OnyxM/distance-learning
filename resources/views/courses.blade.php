@extends("layouts.home")

@section("content")
    <!-- ============================ Page Title Start================================== -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Available Courses</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Find Courses</li>
                            </ol>
                        </nav>
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
                        <div class="show-hide-sidebar">

                            <!-- Find New Property -->
                            <div class="sidebar-widgets">

                                <!-- Search Form -->
                                <form class="form-inline addons mb-3">
                                    <input class="form-control" type="search" placeholder="Search Courses" aria-label="Search">
                                    <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>
                                </form>

                                <h4 class="side_title">Course categories</h4>
                                <ul class="no-ul-list mb-3">
                                    @foreach($categories as $cat => $category)
                                        <li>
                                            <input id='{{"a-$cat"}}' class="checkbox-custom" name="filter_category[]" type="checkbox" value="{{$category->id}}">
                                            <label for='{{"a-$cat"}}' class="checkbox-custom-label">{{ucwords($category->name)}} ({{$category->courses()->count()}})</label>
                                        </li>
                                    @endforeach
                                </ul>

                                <h4 class="side_title">Instructors</h4>
                                <ul class="no-ul-list mb-3">
                                    <li>
                                        <input id='{{"b-1"}}' class="checkbox-custom" name="fiilter_instructor" type="checkbox" value="">
                                        <label for='{{"b-1"}}' class="checkbox-custom-label">Keny White (4)</label>
                                    </li>
                                </ul>

                                <h4 class="side_title">Price</h4>
                                <ul class="no-ul-list mb-3">
                                    <li>
                                        <input id="a-10" class="checkbox-custom" name="a-10" type="checkbox">
                                        <label for="a-10" class="checkbox-custom-label">All ({{\App\Models\Course::count()}})</label>
                                    </li>
                                    <li>
                                        <input id="a-11" class="checkbox-custom" name="a-11" type="checkbox">
                                        <label for="a-11" class="checkbox-custom-label">Free ({{\App\Models\Course::where('price',0)->count()}})</label>
                                    </li>
                                    <li>
                                        <input id="a-12" class="checkbox-custom" name="a-12" type="checkbox">
                                        <label for="a-12" class="checkbox-custom-label"><= 25,000 XAF (...)</label>
                                    </li>
                                    <li>
                                        <input id="a-12" class="checkbox-custom" name="a-12" type="checkbox">
                                        <label for="a-12" class="checkbox-custom-label">>= 25,000 XAF (...)</label>
                                    </li>
                                </ul>

                                <button class="btn btn-theme full-width mb-2">Filter Result</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Row -->
                    <div class="row align-items-center mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            We found <strong>142</strong> courses for you
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 ordering">
                            <div class="filter_wraps">
                                <div class="dl">
                                    <div id="main2">
                                        <a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2">Show Filter<span><i class="fas fa-arrow-alt-circle-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->

                    <div class="row">
                        <!-- Cource Grid -->
                        @foreach($courses as $course)
                            <div class="col-lg-4 col-md-6">
                                <div class="education_block_grid">

                                    <div class="education_block_thumb">
                                        <a href="course-detail.html"><img src="{{$course->photo}}" class="img-fluid" alt=""></a>
{{--                                        <a href="course-detail.html"><img src="{{$course->photo}}" class="img-fluid" alt=""></a>--}}
                                        <div class="cources_price">{{$course->price}} XAF</div>
{{--                                        <div class="education_ratting"><i class="fa fa-star"></i>4.8 (62)</div>--}}
                                    </div>

                                    <div class="education_block_body">
                                        <h4 class="bl-title">
                                            <a href="{{route('course.details', ['id'=>$course->id, 'slug_course'=>$course->slug])}}">{{ucwords($course->title)}}</a>
                                        </h4>
                                    </div>

                                    <div class="education_block_footer">
                                        <div class="education_block_author">
                                            <div class="path-img"><a href="javascript:void(0);"><img src="{{$course->photo}}" class="img-fluid" alt=""></a></div>
                                            <h5><a href="javascript:void(0);">{{$course->user->name}}</a></h5>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <!-- Cource Grid -->

                        <!-- Pagination -->
                        <div class="row mx-auto">
                            {!! $courses->links() !!}
                        </div>
                        <!-- Pagination -->
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
        function openNav() {
            document.getElementById("filter-sidebar").style.width = "320px";
        }

        function closeNav() {
            document.getElementById("filter-sidebar").style.width = "0";
        }
    </script>
@endsection
