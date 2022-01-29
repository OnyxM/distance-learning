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

    <form action="{{route('course.updateContent', ['uuid_course' => $course->uuid])}}" method="POST" enctype="multipart/form-data" id="createContentForm">
    @csrf
    <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="dashboard_container">
                    <div class="dashboard_container_header">
                        <div class="dashboard_fl_1">
                            <h4>Course Content</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="" id="course_content">
                    @foreach($parts as $key => $part)<div class="dashboard_container section" id="{{"section".$key+1}}">
                            <div class="dashboard_container_header">
                                <div class="dashboard_fl_1">
                                    <h4>Section {{$key+1}}</h4>
                                </div>
                            </div>
                            <div class="dashboard_container_body p-4">
                                <!-- Basic info -->
                                <div class="submit-section">
                                    <input type="hidden" name="ref_part[]" value="{{$part->uuid}}" required>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label>Title <sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" value="{{old('part_title[$key]')??$part->title}}" placeholder="Section Title" name="part_title[]" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Section content(Presentation, PDF or Video) <sup class="text-danger">*</sup></label>
                                            <div class="row">
                                                <div class="form-group col-md-12">
{{--                                                    <input type="file" name="uploadfile" id="img" style="display:none;"/>--}}
{{--                                                    <label for="img">Click me to upload image</label>--}}
                                                    <input type="file" value="file.png" accept=".pdf,.pptx,.mp4" class="form-control" placeholder="PDF Document" name="part_content[]" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>TD Worksheet (<span class="text-danger">pdf only</span>)</label>
                                            <input type="text" class="form-control" placeholder="TD worksheet" accept=".pdf"  name="part_td[]">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>TP Worksheet (<span class="text-danger">pdf only</span>)</label>
                                            <input type="text" class="form-control" placeholder="TP worksheet" accept=".pdf"  name="part_tp[]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>@endforeach</div>

                <div class="form-group col-md-12">
                    <a href="javascript:void(0);" class="btn add-items" onclick="addSection()"><i class="fa fa-plus-circle"></i>Add Section</a>
                    <a id="removeSection" href="javascript:void(0);" class="@if($parts->count() == 1) d-none @endif btn-link text-danger" onclick="removeSection()"><i class="fa fa-minus-circle"></i>Remove Last Section</a>
                </div>
            </div>
        </div>
        <!-- /Row -->

        <div class="row">
            <div class="form-group col-lg-12 col-md-12 text-right">
                <button class="btn btn-theme" type="submit">Create Course</button>
            </div>
        </div>
    </form>
@endsection

@section("js")
    <script>
        $(document).ready(function () {
            var parts = {{$parts->count()}};
            stockage.nbre_sections = parts;
        })

        function getNewSectionTemplate() {
            stockage.nbre_sections++;
            var id = stockage.nbre_sections; // get the n° of the section to be created

            return '<div class="dashboard_container section" id="section' + id + '">\n' +
                '<div class="dashboard_container_header">\n' +
                '    <div class="dashboard_fl_1">\n' +
                '        <h4>Section ' + id + '</h4>\n' +
                '    </div>\n' +
                '</div>\n' +
                '<div class="dashboard_container_body p-4">\n' +
                '    <!-- Basic info -->\n' +
                '    <div class="submit-section">\n' +
                '        <div class="form-row">\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>Title <sup class="text-danger">*</sup></label>\n' +
                '                <input type="text" class="form-control" placeholder="Section Title" name="part_title[]" required>\n' +
                '            </div>\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>Section content(Presentation, PDF or Video) <sup class="text-danger">*</sup></label>\n' +
                '                <div class="row">\n' +
                '                    <div class="form-group col-md-12">\n' +
                '                        <input type="file" accept=".pdf,.pptx,.mp4" class="form-control" placeholder="PDF Document" name="part_content[]" required>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>TD Worksheet (<span class="text-danger">pdf only</span>)</label>\n' +
                '                <input type="text" class="form-control" placeholder="TD worksheet" accept=".pdf"  name="part_td[]">\n' +
                '            </div>\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>TP Worksheet (<span class="text-danger">pdf only</span>)</label>\n' +
                '                <input type="text" class="form-control" placeholder="TP worksheet" accept=".pdf"  name="part_tp[]">\n' +
                '            </div>\n' +
                '        </div>\n' +
                '    </div>\n' +
                '</div>\n' +
                '</div>';
        }
    </script>

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
        function addSection() {
            let course_content = $("#course_content"),
                child_template = getNewSectionTemplate();

            course_content.append(child_template);

            if (stockage.nbre_sections > 1) {
                $("#removeSection").removeClass("d-none");
            }
        }

        function removeSection() {
            if (stockage.nbre_sections > 1) {
                var content = document.getElementById("course_content");

                console.log(content.lastChild);
                if(content.lastChild === "\n"){
                    content.removeChild(content.lastChild);
                }
                content.removeChild(content.lastChild);
                stockage.nbre_sections = stockage.nbre_sections - 1;
            }
            if (stockage.nbre_sections == 1) {
                $("#removeSection").addClass("d-none");
            }
        }
    </script>
@endsection
