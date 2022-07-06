@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <div class="col-md-10 col-lg-10 mb-4 mb-md-0">
                List of fields
            </div>
            <div class="col-md-2 col-lg-2 mb-4 mb-md-0">
                <a href="{{ route('admin.fields.new') }}" class="btn btn-primary">Add field</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody class="table-border-bottom-0">
                            @foreach($fields as $field)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$field->name}}</td>

                                    <td>
                                        <span class="text-info">
                                            <a href="{{ route('admin.levels', ['field_slug' => $field->slug])}}"><i class="bx bx-street-view"></i></a>
                                        </span>
                                        <span class="text-danger">
                                            <a href="{{ route('admin.fields.delete', ['id' => $field->id]) }}"><i class="text-danger bx bx-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
