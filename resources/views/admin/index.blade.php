@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- New Visitors & Activity -->
            <div class="col-lg-12 mb-4">
                <div class="card">
                    <div class="card-body row g-4">
                        <div class="col-md-6 pe-md-4 card-separator">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <h5 class="mb-0">Users</h5>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="mt-auto">
                                    <h2 class="mb-2">{{ count($users) }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ps-md-4">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <h5 class="mb-0">Courses</h5>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="mt-auto">
                                    <h2 class="mb-2">{{ count($courses) }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ New Visitors & Activity -->
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-6 mb-4 mb-md-0">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><span class="badge bg-label-primary rounded-pill badge-center p-3 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span> Smart Phone</td>
                                    <td>
                                        <div class="text-muted lh-1"><span class="text-primary fw-semibold">$120</span>/499</div>
                                        <small class="text-muted">Partially Paid</small>
                                    </td>
                                    <td><span class="badge bg-label-primary">Confirmed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 mb-4 mb-md-0">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td><span class="badge bg-label-primary rounded-pill badge-center p-3 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span> Onyx Moffo</td>
                                <td>
                                    onesimemoffo@gmail.com
                                </td>
                                <td>05 / 05 / 2022</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
