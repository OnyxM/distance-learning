@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-10 col-lg-10 mb-4 mb-md-0">
                List of levels
            </div>
            <div class="col-md-2 col-lg-2 mb-4 mb-md-0">
                <a href="{{ route('admin.fields.new') }}" class="btn btn-info">Add level</a>
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
                            @foreach($field->levels as $level)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$level->name}}</td>

                                    <td>
                                        <span class="text-info"><i class="bx bx-street-view"></i></span>
                                        <span class="text-danger">
                                            <a href="{{ route('admin.levels.delete', ['field_slug' =>$field->slug ,'id' => $level->id]) }}"><i class="bx bx-trash"></i></a>
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
