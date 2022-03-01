@extends("layouts.teacher")

@section("css")
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add content to your newly created course</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <form action="{{route('course.updateContent', ['uuid_course' => $course->uuid])}}" method="POST" enctype="multipart/form-data" id="createContentForm">
        @csrf
        <input type="hidden" name="uuid" value="{{$course->uuid}}" required>

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="" id="course_content">
                    @foreach($modules as $key => $module)
                        <?php $key++; ?>
                        <div class="dashboard_container section" id="module{{$key}}">
                            <div class="dashboard_container_header">
                                <div class="dashboard_fl_1">
                                    <div class="h3">
                                        <div class="mb-2" data-target="#panel_module_{{$key}}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                                            {{ "Module $key" }}
                                        </div>
                                        <input type="text" class="form-control" placeholder="Chapter II: Phases of a pentest" name="module_title[]" required
                                        value='{{old("m_uuid[$key-1]") ?? $module->name}}'>
                                        <input type="hidden" value="{{$module->uuid}}" name="m_{{$key}}_uuid" required>
                                    </div>
                                </div>
                            </div>

                            <div class="dashboard_container_body p-4 collapse" id="panel_module_{{$key}}">
                                <div class="submit-section">
                                    <div class="form-row">
                                        <label class="h4">Introductive Video</label>
                                        <div class="form-group col-md-12">
                                            <input type="file" accept=".mp4,.mkv" class="form-control" placeholder="Introduction" name="intro{{$key}}">
                                        </div>

                                        <div class="accordion form-group col-md-12">
                                            <div data-target="#panel_module_{{$key}}_sections" class="accordion-panel-header collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                                                Sections of Module
                                            </div>
                                            <div class="collapse" id="panel_module_{{$key}}_sections">
                                                <div class="form-group col-md-12 mb-4">
                                                    <div class="row sections">
                                                        @foreach($module->sections as $k => $section)
                                                            <div class="accordion form-group col-md-12" id="module_{{$key}}_section_{{$k}}">
                                                                <div data-target="#panel_module_{{$key}}_section_{{$k}}" class="accordion-panel-header collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">
                                                                    <span class="h6 mb-0">Section {{$k+1}} </span>
                                                                    <input type="hidden" name="m_{{$key}}_s_{{$k+1}}_uuid" value="{{$section->uuid}}" required>
                                                                </div>
                                                                <div class="collapse" id="panel_module_{{$key}}_section_{{$k}}">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <input type="text" class="form-control" placeholder="Section y: Name of Section" name="module_{{$key}}_section_title[]" required
                                                                            value='{{old("module_{$key}_section_title[$k]") ?? $section->title}}'>
                                                                        </div>
                                                                        <div class="form-group col-md-12">
                                                                            <textarea name="module_{{$key}}_section_content[]" id="" cols="30" rows="10" class="form-control summernote" required>{!! old("module_{$key}_section_content[$k]") ?? $section->content !!}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <a href="javascript:void(0);" class="btn text-dark" onclick="addSection(this)"><i class="fa fa-plus-circle"></i>Add section</a>
                                                    <a href="javascript:void(0);" @if($module->sections()->count() <= 1) style="display: none" @endif class="btn text-danger" onclick="removeSection(this)"><i class="fa fa-minus-circle"></i>Remove last section</a>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="h4">TD Worksheet (<span class="text-danger">pdf only</span>)</label>
                                        <div class="form-group col-md-12">
                                            <input type="file" class="form-control" placeholder="TD worksheet" accept=".pdf"  name="module_td{{$key}}">
                                        </div>
                                        <label class="h4">TP Worksheet (<span class="text-danger">pdf only</span>)</label>
                                        <div class="form-group col-md-12">
                                            <input type="file" class="form-control" placeholder="TP worksheet" accept=".pdf"  name="module_tp{{$key}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="form-group col-md-12">
                    <a href="javascript:void(0);" class="btn add-items" onclick="addModule()"><i class="fa fa-plus-circle"></i>Add Module</a>
                    <a id="removeModule" href="javascript:void(0);" class="@if($modules->count() <= 1) d-none @endif btn-link text-danger" onclick="removeModule()"><i class="fa fa-minus-circle"></i>Remove Last Module</a>
                </div>
            </div>
        </div>
        <!-- /Row -->

        <div class="row">
            <div class="form-group col-lg-12 col-md-12 text-right">
                <button class="btn btn-theme" type="submit">Update Content</button>
            </div>
        </div>
    </form>
@endsection

@section("js")
    <script>
        $(document).ready(function () {
            stockage.nbre_modules = document.getElementById("course_content").childElementCount;

            $(".summernote").summernote();
        })

        function getNewModuleTemplate() {
            stockage.nbre_modules++;
            var id = stockage.nbre_modules; // get the n° of the section to be created

            return '<div class="dashboard_container section" id="module' + id + '">\n' +
                '                        <div class="dashboard_container_header">\n' +
                '                            <div class="dashboard_fl_1">\n' +
                '                                <div class="h3">\n' +
                '                                    <div class="mb-2" data-target="#panel_module_'+id+'" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-'+id+'">Module ' + id + '</div>\n' +
                '                                    <input type="text" class="form-control" placeholder="Chapter II: Phases of a pentest" name="module_title[]" required>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '\n' +
                '                        <div class="dashboard_container_body p-4 collapse" id="panel_module_'+id+'">\n' +
                '                            <div class="submit-section">\n' +
                '                                <div class="form-row">\n' +
                '                                    <label class="h4">Introductive Video <sup class="text-danger">*</sup></label>\n' +
                '                                    <div class="form-group col-md-12">\n' +
                '                                        <input type="file" accept=".mp4,.mkv" class="form-control" placeholder="Introduction" name="module_intro[]" required>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <div class="accordion form-group col-md-12">\n' +
                '                                        <div data-target="#panel_module_'+id+'_sections" class="accordion-panel-header collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="panel-1">\n' +
                '                                            <label for="Sections" class="h4">Sections of Module</label>\n' +
                '                                        </div>\n' +
                '                                        <div class="collapse" id="panel_module_'+id+'_sections">\n' +
                '                                            <div class="form-group col-md-12 mb-4">\n' +
                '                                                <div class="row sections"></div>\n' +
                '\n' +
                '                                                <a href="javascript:void(0);" class="btn text-dark add_section_item" onclick="addSection(this)"><i class="fa fa-plus-circle"></i>Add section</a>\n' +
                '                                                <a href="javascript:void(0);" style="display: none" class="btn text-danger" onclick="removeSection(this)"><i class="fa fa-minus-circle"></i>Remove last section</a>\n' +
                '                                            </div>\n' +
                '                                        </div>\n' +
                '                                    </div>\n' +
                '\n' +
                '                                    <label class="h4">TD Worksheet (<span class="text-danger">pdf only</span>)</label>\n' +
                '                                    <div class="form-group col-md-12">\n' +
                '                                        <input type="file" class="form-control" placeholder="TD worksheet" accept=".pdf"  name="module_td[]">\n' +
                '                                    </div>\n' +
                '                                    <label class="h4">TP Worksheet (<span class="text-danger">pdf only</span>)</label>\n' +
                '                                    <div class="form-group col-md-12">\n' +
                '                                        <input type="file" class="form-control" placeholder="TP worksheet" accept=".pdf"  name="module_tp[]">\n' +
                '                                    </div>\n' +
                '                                </div>\n' +
                '                            </div>\n' +
                '                        </div>\n' +
                '                    </div>';
        }

        function getNewSectionTemplate(m_i, s_i){
            return "<div class=\"accordion form-group col-md-12\" id=\"module_"+m_i+"_section_"+s_i+"\">\n" +
                "      <div data-target=\"#panel_module_"+m_i+"_section_"+s_i+"\" class=\"accordion-panel-header collapsed\" data-toggle=\"collapse\" role=\"button\" aria-expanded=\"false\" aria-controls=\"panel-1\">\n" +
                "          <span class=\"h6 mb-0\">Section "+s_i+" </span>\n" +
                "       </div>"+
                "       <div class=\"collapse\" id=\"panel_module_"+m_i+"_section_"+s_i+"\">"+
                "           <div class=\"row\">\n" +
                "               <div class=\"form-group col-md-12\">\n" +
                "                   <input type=\"text\" class=\"form-control\" placeholder=\"Section "+s_i+": Name of Section\" name=\"module_"+m_i+"_section_title[]\" required>\n" +
                "               </div>\n" +
                "               <div class=\"form-group col-md-12\">\n" +
                "                   <textarea name=\"module_"+m_i+"_section_content[]\" id=\"\" cols=\"30\" rows=\"10\" class=\"form-control summernote\" required></textarea>\n" +
                "               </div>\n" +
                "             </div>\n" +
                "        </div>"+
                "     </div>";
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
        function addModule() {
            let course_content = $("#course_content"),
                child_template = getNewModuleTemplate();

            course_content.append(child_template);

            if (stockage.nbre_modules > 1) {
                $("#removeModule").removeClass("d-none");
            }

            var id = stockage.nbre_modules,
                parent = "module"+id;

            // adding the first section of this module
            document.querySelectorAll("#"+parent+" .add_section_item")[0].click();
        }

        function addSection(add_section_btn){

            let primeParent_id = add_section_btn.closest("div[class='dashboard_container section']").getAttribute("id");

            console.log(primeParent_id.split('module')[1]);
            let section_content = add_section_btn.previousElementSibling,
                new_section = getNewSectionTemplate(primeParent_id.split('module')[1], section_content.childElementCount+1),
                remove_section_btn = add_section_btn.nextElementSibling;

            $(section_content).append(new_section);

            toggleDisplaySectionButton(section_content, remove_section_btn);

            $(".summernote").summernote();
        }

        function removeModule() {
            console.log(stockage.nbre_modules);
            if (stockage.nbre_modules > 1) {
                var content = document.getElementById("course_content");
                content.removeChild(content.lastElementChild);
                stockage.nbre_modules = stockage.nbre_modules - 1;
            }
            if (stockage.nbre_modules == 1) {
                $("#removeModule").addClass("d-none");
            }
        }

        function removeSection(remove_section_btn){
            let section_content = (remove_section_btn.previousElementSibling).previousElementSibling;
            section_content.lastElementChild.remove();

            toggleDisplaySectionButton(section_content, remove_section_btn);
        }

        function toggleDisplaySectionButton(section_content, remove_section_btn){

            if(section_content.childElementCount > 1){
                remove_section_btn.style.display = "inline";
            }else{
                remove_section_btn.style.display = "none";
            }
        }
    </script>
@endsection
