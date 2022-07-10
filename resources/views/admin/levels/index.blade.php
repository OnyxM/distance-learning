@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <div class="col-md-10 col-lg-10 mb-4 mb-md-0">
                <strong>Levels of <a href="{{ route('admin.levels', ['field_slug' => $field->slug]) }}">{{ $field->name }}</a></strong>
            </div>
            <div class="col-md-2 col-lg-2 mb-4 mb-md-0">
                <a href="{{ route('admin.levels.new', ['field_slug' => $field->slug]) }}" class="btn btn-primary">Add level</a>
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
                                <th>Pension</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody class="table-border-bottom-0">
                            @foreach($field->levels as $level)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{$level->name}}</td>
                                    <td>{{ number_format($level->pension) }} XAF</td>

                                    <td>
                                        <a href="{{route('admin.ues', ['field_slug' => $field->slug, 'level_slug' => $level->slug])}}"><i class="bx bx-street-view"></i></a>
                                        {{--                                        {{ route('admin.levels.edit', ['field_slug' =>$field->slug ,'id' => $level->id]) }}--}}
                                        <a class="text-warning level_edit" href="javascript:void(0);" data-id="{{ $level->id }}" data-pension="{{ $level->pension }}" data-name="{{ $level->name }}" data-description="{{ $level->description }}"><i class="bx bx-edit"></i></a>
                                        <a class="text-danger" href="{{ route('admin.levels.delete', ['field_slug' =>$field->slug ,'id' => $level->id]) }}"><i class="bx bx-trash"></i></a>
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

    <div class="modal fade" id="editLevelModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{ route('admin.levels.edit', ['field_slug' => $field->slug]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="field" value="{{$level->id}}" required>
                        <input type="hidden" name="level" value="" required>

                        <div class="row">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" required placeholder="ICT For Development" class="form-control">
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
                                School fees
                                <input type="number" name="pension" placeholder="50000" class="form-control" required>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-success" value="Save">
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        $(document).on('click', ".level_edit", function(e){
            e.preventDefault();

            // var id = $(this).data('id');

            $("input[name='level']").val($(this).data('id'));
            $("input[name='name']").val($(this).data('name'));
            $("input[name='pension']").val($(this).data('pension'));
            $("input[name='description']").val($(this).data('description'));

            $("#editLevelModal").modal('toggle');
        });
    </script>
@endsection
