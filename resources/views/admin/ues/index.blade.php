@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <div class="col-md-10 col-lg-10 mb-4 mb-md-0">
                <strong>UEs of <a href="{{ route('admin.levels', ['field_slug' => $level->field->slug]) }}">{{ $level->field->name }}</a> - {{ $level->name }}</strong>
            </div>
            <div class="col-md-2 col-lg-2 mb-4 mb-md-0">
                <a href="{{ route('admin.ues.new', ['field_slug' => $field->slug, 'level_slug' => $level->slug]) }}" class="btn btn-primary">Add Ue</a>
            </div>
        </div>

        <?php $sem_1 = $level->semesters[0]; $sem_2 = $level->semesters[1]; ?>

        <div class="row mb-4">
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
                            <tr>
                                <td colspan="5" class="text-center"><strong>UEs of Semester I</strong></td>
                            </tr>
                            @foreach($sem_1->ues as $ue)
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
                                        <span>
                                            <a class="text-danger" href="{{ route('admin.levels.delete', ['field_slug' =>$field->slug ,'id' => $level->id]) }}"><i class="bx bx-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach

                            <tr>
                                <td colspan="5" class="text-center"><strong>UEs of Semester II</strong></td>
                            </tr>

                            <?php $p = 1; ?>
                            @foreach($sem_2->ues as $ue)
                                <tr>
                                    <td>{{ $p }}</td>
                                    <td>{{$ue->name}}</td>
                                    <td>{{$ue->code}}</td>
                                    <td>{{$ue->teachers[0]->fullname}}</td>

                                    <td>
                                        <span class="text-info">
                                            <a href="javascript:void(0);">
                                                <i class="bx bx-street-view"></i>
                                            </a>
                                        </span>
                                        <span>
                                            <a class="text-danger" href="{{ route('admin.levels.delete', ['field_slug' =>$field->slug ,'id' => $level->id]) }}"><i class="bx bx-trash"></i></a>
                                        </span>
                                    </td>
                                </tr>
                                <?php $p++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
