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
                                <form class="form" action="{{ route('courses.filter') }}" method="POST">
                                    @csrf
                                    <div class="form-inline addons mb-3">
                                        <h4 class="side_title">Course name</h4>
                                        <input class="form-control" type="text" placeholder="Search Courses" aria-label="Search" name="filter_name" value="{{$filter_name}}">
{{--                                        <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>--}}
                                    </div>

                                    <h4 class="side_title">Course categories</h4>
                                    <ul class="no-ul-list mb-3">
                                        @foreach($categories as $cat => $category)
                                            <li>
                                                <input id='{{"a-$cat"}}' class="checkbox-custom" name="filter_category[]" @if(in_array($category->id, $filter_cat)) checked @endif type="checkbox" value="{{$category->id}}">
                                                <label for='{{"a-$cat"}}' class="checkbox-custom-label">{{ucwords($category->name)}} ({{$category->courses()->count()}})</label>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <h4 class="side_title">Price</h4>
                                    <ul class="no-ul-list mb-3">
                                        <li>
                                            <input id="a-10" class="checkbox-custom" name="filter_price" value="-1" @if($filter_price=='-1') checked @endif type="radio">
                                            <label for="a-10" class="checkbox-custom-label">All ({{\App\Models\Course::count()}})</label>
                                        </li>
                                        <li>
                                            <input id="a-11" class="checkbox-custom" name="filter_price" value="0" @if($filter_price=='0') checked @endif type="radio">
                                            <label for="a-11" class="checkbox-custom-label">Free ({{\App\Models\Course::where('price',0)->count()}})</label>
                                        </li>
                                        <li>
                                            <input id="a-12" class="checkbox-custom" name="filter_price" value="1" @if($filter_price=='1') checked @endif type="radio">
                                            <label for="a-12" class="checkbox-custom-label"><= 25,000 XAF (...)</label>
                                        </li>
                                        <li>
                                            <input id="a-13" class="checkbox-custom" name="filter_price" value="2" @if($filter_price=='2') checked @endif type="radio">
                                            <label for="a-13" class="checkbox-custom-label">>= 25,000 XAF (...)</label>
                                        </li>
                                    </ul>


                                    <input class="btn btn-theme full-width mb-2" value="Filter Result" type="submit" required>
                                </form>
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
                            We found <strong>{{$total_courses}}</strong> courses for you
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
{{--                                    <a href="course-detail.html"><img src="{{$course->photo}}" class="img-fluid" alt=""></a>--}}
                                        <div class="cources_price">{{number_format($course->price)}} XAF</div>
                                        <div class="education_ratting">{{$course->category->name}}</div>
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
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <ul class="pagination p-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span class="ti-arrow-left"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">18</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span class="ti-arrow-right"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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
        function openNav() {
            document.getElementById("filter-sidebar").style.width = "320px";
        }

        function closeNav() {
            document.getElementById("filter-sidebar").style.width = "0";
        }
    </script>
@endsection
