@extends("layouts.teacher")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Lives</li>
                    <li class=""><a href="javascript:void(0);" data-toggle="modal" data-target="#newLiveModal" class="btn btn-sm btn-danger" style="margin-left: 72%!important;">New Live</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Course Style 1 For Student -->
            <div class="dashboard_container">
                <div class="dashboard_container_header">
                    <div class="dashboard_fl_1">
                        <h4>All Lives</h4>
                    </div>
                    <div class="dashboard_fl_2"></div>
                </div>
                <div class="dashboard_container_body">
                    <div class="row">
                        <button type="button" id="host-join">Join as host</button>
                        <button type="button" id="audience-join">Join as audience</button>
                        <button type="button" id="leave">Leave</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->

@endsection

@section("js")
    <script src="{{asset("dist/live/bundle.js")}}"></script>
@endsection
