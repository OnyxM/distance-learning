@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header border-bottom">
                <h5 class="card-title">ALl Users</h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top">
                    <thead>
                    <tr>
                        <th>N°</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Priority</th>
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
                                <td>
                                    @if($user->priority=='0')
                                        <span class="badge badge-center rounded-pill bg-label-warning w-px-30 h-px-30 me-2"><i class="bx bx-user bx-xs"></i></span> User
                                    @elseif($user->priority=='2')
                                        <span class="badge badge-center rounded-pill bg-label-primary w-px-30 h-px-30 me-2"><i class="bx bx-pie-chart-alt bx-xs"></i></span> Manager
                                    @elseif($user->priority=='3')
                                        <span class="badge badge-center rounded-pill bg-label-secondary w-px-30 h-px-30 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span> Admin
                                    @endif
                                </td>
                                <td>@if(is_null($user->deleted_at))
                                        <span class="badge bg-label-success">Active</span>
                                    @else
                                        <span class="badge bg-label-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-block">
                                        <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <a href="javascript:;" class="dropdown-item text-warning suspend-user">Suspend</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="javascript:;" class="dropdown-item text-danger delete-user" data-bs-toggle="modal" data-bs-target="#enableOTP">Delete</a>
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

    <div class="modal fade" id="enableOTP" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-simple modal-enable-otp modal-dialog-centered">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-5">Suspend User ?</h3>
                    </div>
                    <h6>Are you sure you want to suspend this user ?</h6>

                    <form id="enableOTPForm" class="row g-3" onsubmit="return false">
                        <div class="col-12">
                            <label class="form-label" for="modalEnableOTPPhone">Enter the reason of suspending</label>
                            <div class="input-group input-group-merge">
                                <textarea name="reason_suspending" class="form-control" cols="30" rows="10" required></textarea>
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
@endsection
