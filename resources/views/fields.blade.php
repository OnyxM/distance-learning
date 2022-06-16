@extends("layouts.home")

@section("content")
    <!-- ============================ Page Title Start================================== -->
    <section class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="breadcrumbs-wrap">
                        <h1 class="breadcrumb-title">Available Fields</h1>
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
{{--                        <div class="show-hide-sidebar">--}}

{{--                            <!-- Find New Property -->--}}
{{--                            <div class="sidebar-widgets">--}}

{{--                                <!-- Search Form -->--}}
{{--                                <form class="form" action="{{ route('courses.filter') }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <div class="form-inline addons mb-3">--}}
{{--                                        <h4 class="side_title">Course name</h4>--}}
{{--                                        <input class="form-control" type="text" placeholder="Search Courses" aria-label="Search" name="filter_name" value="{{$filter_name}}">--}}
{{--                                        <button class="btn my-2 my-sm-0" type="submit"><i class="ti-search"></i></button>--}}
{{--                                    </div>--}}

{{--                                    <h4 class="side_title">Course categories</h4>--}}
{{--                                    <ul class="no-ul-list mb-3">--}}
{{--                                        @foreach($categories as $cat => $category)--}}
{{--                                            <li>--}}
{{--                                                <input id='{{"a-$cat"}}' class="checkbox-custom" name="filter_category[]" @if(in_array($category->id, $filter_cat)) checked @endif type="checkbox" value="{{$category->id}}">--}}
{{--                                                <label for='{{"a-$cat"}}' class="checkbox-custom-label">{{ucwords($category->name)}} ({{$category->courses()->count()}})</label>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}

{{--                                    <h4 class="side_title">Price</h4>--}}
{{--                                    <ul class="no-ul-list mb-3">--}}
{{--                                        <li>--}}
{{--                                            <input id="a-10" class="checkbox-custom" name="filter_price" value="-1" @if($filter_price=='-1') checked @endif type="radio">--}}
{{--                                            <label for="a-10" class="checkbox-custom-label">All ({{\App\Models\Course::count()}})</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="a-11" class="checkbox-custom" name="filter_price" value="0" @if($filter_price=='0') checked @endif type="radio">--}}
{{--                                            <label for="a-11" class="checkbox-custom-label">Free ({{\App\Models\Course::where('price',0)->count()}})</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="a-12" class="checkbox-custom" name="filter_price" value="1" @if($filter_price=='1') checked @endif type="radio">--}}
{{--                                            <label for="a-12" class="checkbox-custom-label"><= 25,000 XAF (...)</label>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <input id="a-13" class="checkbox-custom" name="filter_price" value="2" @if($filter_price=='2') checked @endif type="radio">--}}
{{--                                            <label for="a-13" class="checkbox-custom-label">>= 25,000 XAF (...)</label>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}


{{--                                    <input class="btn btn-theme full-width mb-2" value="Filter Result" type="submit" required>--}}
{{--                                </form>--}}
{{--                            </div>--}}

{{--                        </div>--}}
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- /Row -->

{{--                    <div class="row">--}}
{{--                        <!-- Cource Grid -->--}}
{{--                        @foreach($fields as $field)--}}
{{--                            <div class="col-lg-4 col-md-6">--}}
{{--                                <div class="education_block_grid">--}}

{{--                                    <div class="education_block_thumb">--}}
{{--                                        <a href="#"><img src="{{$field->photo}}" class="img-fluid" alt=""></a>--}}
{{--                                    <a href="course-detail.html"><img src="{{$field->photo}}" class="img-fluid" alt=""></a>--}}
{{--                                        <div class="cources_price">{{number_format($field->price)}} XAF</div>--}}
{{--                                    </div>--}}

{{--                                    <div class="education_block_body">--}}
{{--                                        <h4 class="bl-title">--}}
{{--                                            <a href="{{route('course.details', ['id'=>$field->id, 'slug_course'=>$field->slug])}}">{{ucwords($field->name)}}</a>--}}
{{--                                        </h4>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                        <!-- Cource Grid -->--}}
{{--                    </div>--}}

                    <div class="container">
                        <div class="trips_wrap">
                            <div class="row m-0">
                                @foreach($fields as $field)
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="trips">
                                            <div class="trips_icons">
                                                <i class="ti-video-camera"></i>
                                            </div>
                                            <div class="trips_detail">
                                                <h4><a href="{{route('fields.info', ['field' => $field->slug])}}">{{ $field->name }}</a></h4>
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
