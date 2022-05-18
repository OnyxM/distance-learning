@extends("layouts.teacher")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">

        </div>
    </div>
    <!-- /Row -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <!-- Course Style 1 For Student -->
            <div class="dashboard_container">
                <div class="dashboard_container_body">
                    <div class="row justify-content-around m-3">
                        <button type="button" id="host-join" class="btn btn-theme">Join</button>
                        <button type="button" class="d-none btn btn-theme" id="audience-join">Join as audience</button>
                        <button type="button" class="d-none btn btn-theme" id="leave">Leave</button>
                    </div>
                </div>
                <div class="dashboard_container_header">
{{--                    <div class="dashboard_fl_1">--}}
{{--                        <h4>Assist Live : <i>Title here</i></h4>--}}
{{--                    </div>--}}
                    <div class="dashboard_fl_2 row" id="users_live" style="height: 600px; overflow-y:scroll;">

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
