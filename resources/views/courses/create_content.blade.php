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

    <form action="{{route('course.createContent', ['uuid_course' => $course->uuid])}}" method="POST" enctype="multipart/form-data" id="createContentForm">
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
                    <div class="dashboard_container section" id="section_1">
                        <div class="dashboard_container_header">
                            <div class="dashboard_fl_1">
                                <div class="h3">
                                    Module 1:
                                    <input type="text" class="form-control" placeholder="Chapter II: Phases of a pentest" name="title[]" required>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard_container_body p-4">
                            <div class="submit-section">
                                <div class="form-row">
                                    <label class="h4">Introductive Video <sup class="text-danger">*</sup></label>:
                                    <div class="form-group col-md-12">
                                        <input type="file" accept=".mp4,.mkv" class="form-control" placeholder="Introduction" name="intro[]" required>
                                    </div>

                                    <label for="Sections" class="h4">Sections of Module</label>
                                    <div class="form-group col-md-12 mb-4">
                                        <div class="row sections"></div>

                                        <a href="javascript:void(0);" class="btn text-dark" onclick="addSection(this)"><i class="fa fa-plus-circle"></i>Add section</a>
                                        <a href="javascript:void(0);" style="display: none" class="btn text-danger" onclick="removeSection(this)"><i class="fa fa-minus-circle"></i>Remove last section</a>
                                    </div>

                                    <label class="h4">TD Worksheet (<span class="text-danger">pdf only</span>)</label>
                                    <div class="form-group col-md-12">
                                        <input type="file" class="form-control" placeholder="TD worksheet" accept=".pdf"  name="module_td[]">
                                    </div>
                                    <label class="h4">TP Worksheet (<span class="text-danger">pdf only</span>)</label>
                                    <div class="form-group col-md-12">
                                        <input type="file" class="form-control" placeholder="TP worksheet" accept=".pdf"  name="module_tp[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <a href="javascript:void(0);" class="btn add-items" onclick="addModule()"><i class="fa fa-plus-circle"></i>Add Module</a>
                    <a id="removeModule" href="javascript:void(0);" class="d-none btn-link text-danger" onclick="removeModule()"><i class="fa fa-minus-circle"></i>Remove Last Module</a>
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
            stockage.nbre_sections = 0;

            // addModule(); // On ajoute la première section obligatoire
        })

        function getNewModuleTemplate() {
            stockage.nbre_sections++;
            var id = stockage.nbre_sections; // get the n° of the section to be created

            return '<div class="dashboard_container section" id="section' + id + '">\n' +
                '<div class="dashboard_container_header">\n' +
                '    <div class="dashboard_fl_1">\n' +
                '        <h4>Module ' + id + '</h4>\n' +
                '    </div>\n' +
                '</div>\n' +
                '<div class="dashboard_container_body p-4">\n' +
                '    <!-- Basic info -->\n' +
                '    <div class="submit-section">\n' +
                '        <div class="form-row">\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>Title <sup class="text-danger">*</sup></label>\n' +
                '                <input type="text" class="form-control" placeholder="Module Title" name="part_title[]" required>\n' +
                '            </div>\n' +
                '            <div class="form-group col-md-12">\n' +
                '                <label>Module content(Presentation, PDF or Video) <sup class="text-danger">*</sup></label>\n' +
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

        function getNewSectionTemplate(m_i, s_i){
            return "<div class=\"form-group col-md-12\" id=\"module_"+m_i+"_section_"+s_i+"\">\n" +
                "               <label>Section content <sup class=\"text-danger\">*</sup></label>\n" +
                "               <div class=\"row\">\n" +
                "                    <div class=\"form-group col-md-12\">\n" +
                "                         <input type=\"text\" class=\"form-control\" placeholder=\"Section "+s_i+": Name of Section\" name=\"module_"+m_i+"_section_title[]\" required>\n" +
                "                     </div>\n" +
                "                     <div class=\"form-group col-md-12\">\n" +
                "                          <textarea name=\"module_"+m_i+"_section_content[]\" id=\"\" cols=\"30\" rows=\"10\" class=\"form-control\" required></textarea>\n" +
                "                     </div>\n" +
                "                 </div>\n" +
                "           </div>";
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
        function addModule() {
            let course_content = $("#course_content"),
                child_template = getNewModuleTemplate();

            course_content.append(child_template);

            if (stockage.nbre_sections > 1) {
                $("#removeModule").removeClass("d-none");
            }
        }

        function addSection(add_section_btn){
            let section_content = add_section_btn.previousElementSibling,
                new_section = getNewSectionTemplate(1, section_content.childElementCount+1);

            $(section_content).append(new_section);

            toggleRemoveSectionButton(section_content);
        }

        function removeModule() {
            if (stockage.nbre_sections > 1) {
                var content = document.getElementById("course_content");
                content.removeChild(content.lastChild);
                stockage.nbre_sections = stockage.nbre_sections - 1;
            }
            if (stockage.nbre_sections == 1) {
                $("#removeModule").addClass("d-none");
            }
        }

        function removeSection(remove_section_btn){
            let section_content = (remove_section_btn.previousElementSibling).previousElementSibling;

            toggleRemoveSectionButton(section_content);
        }

        function toggleRemoveSectionButton(section_content){
            section_content.lastElementChild.remove();

            if(section_content.childElementCount > 1){
                remove_section_btn.style.display = "inline";
            }else{
                remove_section_btn.style.display = "none";
            }
        }
    </script>
@endsection
