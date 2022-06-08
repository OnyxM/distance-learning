@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-10 col-lg-10 mb-4 mb-md-0">
                List of UEs for Semester I
            </div>
            <div class="col-md-2 col-lg-2 mb-4 mb-md-0">
                <a href="{{ route('admin.ues.new', ['field_slug' => $field->slug, 'level_slug' => $level->slug]) }}" class="btn btn-info">Add Ue</a>
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
                                <th>Code</th>
                                <th>Lecturer</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody class="table-border-bottom-0">
                            @foreach($level->semesters[0]->ues as $ue)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$ue->name}}</td>
                                    <td>{{$ue->code}}</td>
                                    <td>{{$ue->teachers[0]->fullname}}</td>

                                    <td>
                                        <span class="text-info">
                                            <a href="javascript:void(0);">
                                                <i class="bx bx-street-view"></i>
                                            </a>
                                        </span>
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

        <div class="row">
            <div class="col-md-10 col-lg-10 mb-4 mb-md-0">
                List of UEs for Semester II
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
                            @foreach($level->semesters[1]->ues as $ue)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$ue->name}}</td>

                                    <td>
                                        <span class="text-info">
                                            <a href="{{route('admin.ues', ['field_slug' => $field->slug, 'level_slug' => $level->slug])}}">
                                                <i class="bx bx-street-view"></i>
                                            </a>
                                        </span>
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
