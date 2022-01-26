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

    <form action="#" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" class="form-control" required name="image" accept=".jpg, .jpeg, .png">
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Course Title <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" placeholder="Course Title" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Course Price <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control" placeholder="Ex. 199.10" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>About Course <sup class="text-danger">*</sup></label>
                                    <textarea class="form-control" placeholder="Description" required></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Category <sup class="text-danger">*</sup></label>
                                    <select name="category" id="category" class="form-control" required>
                                        <option value="">Choose category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- Basic info -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="" id="course_content"></div>

                <div class="form-group col-md-12">
                    <a href="javascript:void(0);" class="btn add-items" onclick="addSection()"><i
                            class="fa fa-plus-circle"></i>Add Section</a>
                    <a id="removeSection" href="javascript:void(0);" class="d-none btn-link text-danger"
                       onclick="removeSection()"><i class="fa fa-minus-circle"></i>Remove Last Section</a>
                </div>
            </div>
        </div>
        <!-- /Row -->

        <div class="row">
            <div class="form-group col-lg-12 col-md-12">
                <button class="btn btn-theme" type="submit">Save Course</button>
            </div>
        </div>
    </form>
@endsection

@section("js")
    <script>
        $(document).ready(function () {
            stockage.nbre_sections = 0;

            addSection(); // On ajoute la première section obligatoire
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
                '                <input type="text" class="form-control" placeholder="Section Title" required>\n' +
                '            </div>\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>Section content(Presentation, PDF or Video) <sup class="text-danger">*</sup></label>\n' +
                '                <div class="row">\n' +
                '                    <div class="form-group col-md-12">\n' +
                '                        <input type="file" accept=".pdf,.pptx,.mp4" class="form-control" placeholder="PDF Document" required>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div>\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>TD Worksheet (<span class="text-danger">pdf only</span>)</label>\n' +
                '                <input type="text" class="form-control" placeholder="TD worksheet" accept=".pdf" >\n' +
                '            </div>\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>TP Worksheet (<span class="text-danger">pdf only</span>)</label>\n' +
                '                <input type="text" class="form-control" placeholder="TP worksheet" accept=".pdf" >\n' +
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
                content.removeChild(content.lastChild);
                stockage.nbre_sections = stockage.nbre_sections - 1;
            }
            if (stockage.nbre_sections == 1) {
                $("#removeSection").addClass("d-none");
            }
        }
    </script>
@endsection
