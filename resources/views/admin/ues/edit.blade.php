@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                Update a Course in the system
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                <div class="card">
                    <form class="card-body" action="{{ route('admin.ues.update', ['field_slug' => $field->slug, 'level_slug' => $level->slug, 'ue' => $ue->slug]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="field" value="{{$field->id}}" required>
                        <input type="hidden" name="level" value="{{$level->id}}" required>
                        <input type="hidden" name="ue" value="{{$ue->id}}" required>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" required placeholder="Internet and Network Security" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $ue->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Code</label>
                                    <input type="text" name="code" id="code" required placeholder="ICT313" class="form-control @error('code') is-invalid @enderror" value="{{old('code') ?? $ue->code}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                Description
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="{{old('description') ?? $ue->description}}"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                Select Teacher / Lecturer <span>
                                    <span id="refreshTeachers"><i class="menu-icon tf-icons bx bx-refresh"></i></span>
                                </span>
                                <select name="teacher" id="teachers" class="form-control" required>
                                    <option value="">Choose a lecturer for this Course</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}" @if(@$ue->teachers[0]->id == $teacher->id) selected @endif >{{$teacher->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                Select the Semester
                                <select name="semester_id" id="semester_id" class="form-control" required>
                                    <option value="">Select the Semester</option>
                                    <option value="{{$level->semesters[0]->id}}" @if($ue->semester->slug=="semester-1") selected @endif>Semester 1</option>
                                    <option value="{{$level->semesters[1]->id}}" @if($ue->semester->slug=="semester-2") selected @endif>Semester 2</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save" id="submitBtn">
                        <a href="{{ route('admin.ues', ['field_slug' => $field->slug, 'level_slug' => $level->slug]) }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        $(document).on('click', "#refreshTeachers", function(e){
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: "{{ route('admin.teachers.api_json') }}",
                datatype: 'json',
                success: function (response) {
                    $("#teachers").empty();
                    $("#teachers").append('<option value="">Choose a lecturer for this Course</option>');
                   $(response.teachers).each(function(index, teacher){
                        $("#teachers").append('<option value="'+teacher.id+'">'+teacher.fullname+'</option>')
                    });
                }
            });
        });

        $("#code").keyup(function(e){
            e.preventDefault();

            let val = $(this).val();

            if(val.length <= 3) return;

            $.ajax({
                type: 'post',
                url: "{{ route('admin.ues.check') }}",
                data: "ue="+val,
                datatype: 'json',
                success: function (response) {
                    if(response.status){
                        $("#code").removeClass('is-invalid');
                        $("#submitBtn").removeAttr('disabled')
                    }else{
                        $("#code").addClass('is-invalid');
                        $("#submitBtn").attr('disabled', 'true')
                    }
                }
            });
        });
    </script>
@endsection
