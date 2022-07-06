@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                Add a new field to the system
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                <div class="card">
                    <form class="card-body" action="{{ route('admin.fields.create') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="form-group">
                                <input type="text" name="name" required placeholder="ICT For Development" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save">
                        <a href="{{route('admin.fields')}}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
