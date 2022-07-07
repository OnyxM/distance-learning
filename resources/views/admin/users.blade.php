@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title">All Users</h5>
                <div class="d-flex justify-content-between align-items-center row gap-3 gap-md-0">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="datatables-users table border-top">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Name</th>
                        <th>Email</th>
{{--                        <th>Priority</th>--}}
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $cpt=1; @endphp
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $cpt }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
{{--                                <td>--}}
{{--                                    @if($user->priority=='0')--}}
{{--                                        <span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span> User--}}
{{--                                    @elseif($user->priority=='2')--}}
{{--                                        <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span> Manager--}}
{{--                                    @elseif($user->priority=='3')--}}
{{--                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span> Admin--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td>
                                    @if($user->id != auth()->user()->id)
                                        @if(is_null($user->deleted_at))
                                            <span class="badge bg-label-success">Active</span>
                                        @else
                                            <span class="badge bg-label-secondary">Inactive</span>
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-block">
                                        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
{{--                                            <a href="javascript:;" class="dropdown-item text-warning suspend-user">Suspend</a>--}}
{{--                                            <div class="dropdown-divider"></div>--}}
                                            @if(is_null($user->deleted_at))
                                                <a href="javascript:void(0);" class="dropdown-item text-danger suspend-user" data-user="{{ $user->id }}">Suspend</a>
                                            @else
                                                <a href="javascript:void(0);" class="dropdown-item text-success enable-user" data-user="{{ $user->id }}">Enable</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php $cpt++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($user->id != auth()->user()->id)
    <div class="modal fade" id="suspendUserModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-5" id="info_m0"></h3>
                    </div>
                    <h6 id="info_m"></h6>

                    <form id="suspendUserForm" class="row g-3" method="post" action="{{ route('admin.users.set_status') }}">
                        <div class="col-12">
                            @csrf
                            <input type="hidden" name="user" required>
                            <input type="hidden" name="status" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="modalEnableOTPPhone">Enter the reason</label>
                            <div class="input-group input-group-merge">
                                <textarea name="reason" class="form-control" cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection

@section("js")
    <script>
        $(document).on('click', ".suspend-user", function(e){
            e.preventDefault();

            var user = $(this).data('user');

            if(user === ""){
                return ;
            }

            $("#info_m0").html("Suspend User ?");
            $("#info_m").html("Are you sure you want to suspend this user ?");
            $("input[name='user']").val(user);
            $("input[name='status']").val("disable");

            $("#suspendUserModal").modal("toggle");
        });

        $(document).on('click', ".enable-user", function(e){
            e.preventDefault();

            var user = $(this).data('user');

            if(user === ""){
                return ;
            }

            $("#info_m0").html("Enable User ?");
            $("#info_m").html("Are you sure you want to enable this user ?");
            $("input[name='user']").val(user);
            $("input[name='status']").val("enable");

            $("#suspendUserModal").modal("toggle");
        });
    </script>
@endsection
