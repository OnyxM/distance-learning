@extends("layouts.teacher")

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
    <form action="{{route('course.edit', ['uuid_course' => $course->uuid])}}" method="POST" enctype="multipart/form-data">
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
                                    <label>Course Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept=".jpg, .jpeg, .png">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Course Title <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title') ?? $course->title}}" placeholder="Course Title" required name="title">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Course Price <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{old('price') ?? $course->price}}" placeholder="Ex. 25000" name="price" required>
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-12">
                                    <label>About Course <sup class="text-danger">*</sup></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" required>{!! old('description') ?? $course->description !!}</textarea>
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
                                            <option value="{{$cat->id}}" @if($cat->id == (old('category') ?? $course->category->id) ) selected @endif>{{$cat->name}}</option>
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
                <a href="{{route('course.index')}}" class="btn text-danger mr-4">Discard Changes</a>

                <button class="btn btn-theme" type="submit">Update Course</button>
            </div>
        </div>
    </form>




    <!-- Row -->
    <hr>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-8 pb-4">
            <button class="btn btn-warning col-md-12" data-toggle="modal" data-target="#deleteCourseModal">Delete Course</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="POST" action="{{route('course.delete')}}" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Course ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="course" value="{{$course->uuid}}" required>
                    <p>Do you want to delete this course ?</p>
                    <p>
                        <span class="text-danger">This action is irreversible. You should seriously consider before doing that.</span>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Discard</button>
                    <button type="submit" class="btn btn-primary">Delete the course</button>
                </div>
            </form>
        </div>
    </div>
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

    <script>
        $(document).on('click', "#deleteCourse", function(evt){
            evt.preventDefault();


        });
    </script>
@endsection
