@extends("layouts.teacher")

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <span id="prev" class="d-none">{{ url()->previous() }}</span> <br>

            <span>{{ $live->participants()->count() }}</span>
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
                    <div class="dashboard_fl_2 row" id="users_live" style="height: 600px; overflow-y:scroll;">
                        <div id="123456789" class="m-2" style="width: 240px; height: 240px;">
                            <div id="agora-video-player-track-cam-47b799a7" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: black;">
                                <img src="data:image/jpeg;base64,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" alt="">
{{--                                <video id="video_track-cam-47b799a7" class="agora_video_player" playsinline="" muted="" style="width: 100%; height: 100%; position: absolute; left: 0px; top: 0px; transform: rotateY(180deg); object-fit: cover;"></video>--}}
                            </div>
                        </div>
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
