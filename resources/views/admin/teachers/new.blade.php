@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                Add a new Course to the system
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                <div class="card">
                    <form action="{{ route('admin.ues.create', ['field_slug' => $field->slug, 'level_slug' => $level->slug]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="field" value="{{$field->id}}" required>
                        <input type="hidden" name="level" value="{{$level->id}}" required>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" required placeholder="Internet and Network Security" class="form-control @error('name') is-invalid @enderror">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Code</label>
                                    <input type="text" name="code" required placeholder="ICT313" class="form-control @error('code') is-invalid @enderror">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                Description
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                Select Teacher / Lecturer
                                <select name="teacher" id="teacher" class="form-control" required>
                                    <option value="">Choose a lecturer for this Course</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->fullname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                Select the Semester
                                <select name="semester_id" id="semester_id" class="form-control" required>
                                    <option value="">Select the Semester</option>
                                    <option value="{{$level->semesters[0]->id}}">Semester 1</option>
                                    <option value="{{$level->semesters[1]->id}}">Semester 2</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
