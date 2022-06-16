@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                Add a new Lecturer to the system
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                <div class="card">
                    <form action="{{ route('admin.teachers.create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="form-group">
                                Select User's Account
                                <select name="user" id="user" class="form-control" required>
                                    <option value="">Choose a lecturer for this Course</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <select name="title" id="title" class="form-control" required>
                                        <option value="">Choose a lecturer for this Course</option>
                                        <option value="Dr">Doctor</option>
                                        <option value="Ing">Ing</option>
                                        <option value="Prof">Prof</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">name</label>
                                    <input type="text" name="name" required placeholder="John Doe" class="form-control @error('name') is-invalid @enderror">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Poste</label>
                                    <input type="text" name="poste" required placeholder="Lecturer" class="form-control @error('poste') is-invalid @enderror">
                                </div>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Save">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
