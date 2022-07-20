@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <div class="col-md-10 col-lg-10 mb-4 mb-md-0">
                <strong>UEs of <a href="{{ route('admin.levels', ['field_slug' => $level->field->slug]) }}">{{ $level->field->name }}</a> - {{ $level->name }}</strong>
            </div>
            <div class="col-md-2 col-lg-2 mb-4 mb-md-0">
                <a href="javascript:void(0);" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addBulkUesModal">Bulk add</a>
                <a href="{{ route('admin.ues.new', ['field_slug' => $field->slug, 'level_slug' => $level->slug]) }}" class="btn btn-primary">Add Ue</a>
            </div>
        </div>

        <?php $sem_1 = @$level->semesters[0]; @$sem_2 = $level->semesters[1]; ?>

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
                            @foreach($sem_1->ues()->orderBy('code', 'asc')->get() as $ue)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $ue->name }}</td>
                                    <td>{{ $ue->code }}</td>
                                    <td>{{ @$ue->teachers[0]->fullname }}</td>

                                    <td>
                                        <a href="{{ route('ue.info', ['field'=>$field->slug, 'level'=>$level->slug, 'ue'=>$ue->code]) }}" target="_blank" ref="noopener"><i class="bx bx-book"></i></a>
                                        <a class="text-primary" href="{{ route('admin.ues.edit', ['field_slug' =>$field->slug, 'level_slug' => $level->slug, 'ue' => $ue->slug]) }}"><i class="bx bx-edit"></i></a>
                                        <a class="text-danger" href="{{ route('admin.levels.delete', ['field_slug' =>$field->slug ,'id' => $level->id]) }}"><i class="bx bx-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach

                            <tr>
                                <td colspan="5" class="text-center"><strong>UEs of Semester II</strong></td>
                            </tr>

                            <?php $p = 1; ?>
                            @foreach($sem_2->ues()->orderBy('code', 'asc')->get() as $ue)
                                <tr>
                                    <td>{{ $p }}</td>
                                    <td>{{ $ue->name }}</td>
                                    <td>{{ $ue->code }}</td>
                                    <td>{{ @$ue->teachers[0]->fullname }}</td>

                                    <td>
                                        <a href="{{ route('ue.info', ['field'=>$field->slug, 'level'=>$level->slug, 'ue'=>$ue->code]) }}" target="_blank" ref="noopener"><i class="bx bx-book"></i></a>
                                        <a class="text-primary" href="{{ route('admin.ues.edit', ['field_slug' =>$field->slug, 'level_slug' => $level->slug, 'ue' => $ue->slug]) }}"><i class="bx bx-edit"></i></a>
                                        <a class="text-danger" href="{{ route('admin.levels.delete', ['field_slug' =>$field->slug ,'id' => $level->id]) }}"><i class="bx bx-trash"></i></a>
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

    <div class="modal" id="addBulkUesModal" tabindex="-1" style="display: none;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3>Add Bulk Ues</h3>
                    </div>
                    <form id="addNewCCForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.ues.bulk_create', ['field_slug' => $field->slug, 'level_slug' => $level->slug]) }}" method="POST"enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="field" value="{{ $field->id }}" required>
                        <input type="hidden" name="level" value="{{ $level->id }}" required>

                        <div class="col-12 fv-plugins-icon-container">
                            <label class="form-label w-100" for="modalUesFile">Choose csv file</label>
                            <div class="input-group input-group-merge has-validation">
                                <input id="modalUesFile" name="ues_file" class="form-control credit-card-mask" type="file" placeholder="1356 3215 6548 7898" aria-describedby="modalAddCard2" required>
                                <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span class="card-type"></span></span>
                            </div><div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>


                        <div class="col-12">
                            <label class="switch">
                                <input type="checkbox" class="switch-input" name="clear_old_ues">
                                <span class="switch-toggle-slider">
                                    <span class="switch-on"></span>
                                    <span class="switch-off"></span>
                                  </span>
                                <span class="switch-label">Clear old ues?</span>
                            </label>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">Submit</button>
                            <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                        <div></div><input type="hidden"></form>
                </div>
            </div>
        </div>
    </div>
@endsection


{{--admin.ues.bulk_create--}}
