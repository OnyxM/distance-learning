@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                Add a new level to <a href="{{ route('admin.levels', ['field_slug' => $field->slug]) }}">{{ $field->name }}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                <div class="card">
                    <form class="card-body" action="{{ route('admin.levels.create', ['field_slug' => $field->slug]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="field" value="{{$field->id}}" required>

                        <div class="row">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" required placeholder="Master II" class="form-control @error('name') is-invalid @enderror">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                Description
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror"></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                School fees
                                <input type="text" name="pension" placeholder="50000" class="form-control" required>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save">
                        <a href="{{ route('admin.levels', ['field_slug' => $field->slug]) }}" class="btn btn-outline-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
