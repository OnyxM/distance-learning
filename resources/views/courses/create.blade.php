@extends("layouts.user")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <form action="{{route('course.create')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="dashboard_container">
                    <div class="dashboard_container_header">
                        <div class="dashboard_fl_1">
                            <h4>Course Details</h4>
                        </div>
                    </div>
                    <div class="dashboard_container_body p-4">
                        <!-- Basic info -->
                        <div class="submit-section">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Course Image <sup class="text-danger">*</sup></label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" required name="image" accept=".jpg, .jpeg, .png">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Course Title <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="Course Title" required name="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Course Price <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}" placeholder="Ex. 25000" name="price" required>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label>About Course <sup class="text-danger">*</sup></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" required>{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Category <sup class="text-danger">*</sup></label>
                                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="">Choose category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" @if($cat->id == old('category')) selected @endif>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Basic info -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

{{--        <!-- Row -->--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 col-md-12 col-sm-12">--}}
{{--                <div class="" id="course_content"></div>--}}

{{--                <div class="form-group col-md-12">--}}
{{--                    <a href="javascript:void(0);" class="btn add-items" onclick="addSection()"><i class="fa fa-plus-circle"></i>Add Section</a>--}}
{{--                    <a id="removeSection" href="javascript:void(0);" class="d-none btn-link text-danger" onclick="removeSection()"><i class="fa fa-minus-circle"></i>Remove Last Section</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /Row -->--}}

        <div class="row">
            <div class="form-group col-lg-12 col-md-12 text-right">
                <button class="btn btn-theme" type="submit">Create Course</button>
            </div>
        </div>
    </form>
@endsection

@section("js")

    <script src="{{asset('assets/js/dropzone.js')}}"></script>

    <!-- Date Booking Script -->
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/daterangepicker.js')}}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>

    <script>
        // Course Expire and Start Daterange Script
        $(function () {
            $('input[name="edu-expire"]').daterangepicker({
                singleDatePicker: true,
            });
            $('input[name="edu-expire"]').val('');
            $('input[name="edu-expire"]').attr("placeholder", "Course Expire");
        });
        $(function () {
            $('input[name="edu-start"]').daterangepicker({
                singleDatePicker: true,

            });
            $('input[name="start"]').val('');
            $('input[name="start"]').attr("placeholder", "Course Start");
        });
    </script>
@endsection
