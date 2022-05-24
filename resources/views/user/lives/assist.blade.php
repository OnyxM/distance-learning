@extends("layouts.teacher")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <span id="prev" class="d-none">{{ url()->previous() }}</span>
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
                        @if($live->user_id == auth()->user()->id)
                        <button type="button" id="join" class="btn btn-theme" data-type="host" data-uid="{{ rand(11111, 99999) }}">Join</button>
                        @else
                        <button type="button" class="btn btn-theme" id="join" data-type="audience" data-uid="{{ rand(111111, 999999) }}">Join</button>
                        @endif
                        <button type="button" class="d-none btn btn-theme" id="leave">Leave</button>
                    </div>
                </div>
                <div class="dashboard_container_header">
{{--                    <div class="dashboard_fl_1">--}}
{{--                        <h4>Assist Live : <i>Title here</i></h4>--}}
{{--                    </div>--}}
                    <div class="dashboard_fl_2 row" id="users_live" style="height: 600px; overflow-y:scroll;"></div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->

@endsection

@section("js")
    <script src="{{asset("dist/live/bundle.js")}}"></script>
@endsection
