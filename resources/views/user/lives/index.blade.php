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
                        @foreach($lives as $live)
                            <div class="m-2 col-lg-4 col-md-6">
                                <div class="education_block_grid style_2">

                                    <div class="education_block_thumb">
                                        <a href="#"><img src="{{asset('assets/img/course-1.jpg')}}" class="img-fluid" alt=""></a>
                                    </div>

                                    <div class="education_block_body">
                                        <h4 class="bl-title">{{ $live->titre }}</h4>
                                        <hr>
                                        <h6 class="">{{ $live->ue->code . " - " . $live->ue->name }}</h6>
                                        <hr>
                                        <h5>Date: {{ date("d M Y H:i", $live->date_debut) }}</h5>
                                    </div>

                                    <div class="cources_info_style3">
                                        <div class="row">
                                            <div class="col-6 text-left">
                                                <a href="{{route('user.lives.assist', ['live_code'=>$live->uuid])}}" data-id="{{$live->id}}" class="btn text-danger btn-sm initLive">Start Live</a>
                                            </div>
                                            <div class="col-6 text-right">
                                                <a href="javascript:void(0);" data-id="{{$live->id}}" class="btn text-danger btn-sm deleteLive"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="education_block_footer">--}}
{{--                                        <div class="education_block_author">--}}
{{--                                            <div class="path-img"><a href="instructor-detail.html"><img src="{{asset('assets/img/user-1.jpg')}}" class="img-fluid" alt=""></a></div>--}}
{{--                                            <h5><a href="instructor-detail.html">Dhananjay Preet</a></h5>--}}
{{--                                        </div>--}}
{{--                                        <div class="cources_price_foot"><span class="price_off">$79.0</span>49.99</div>--}}
{{--                                    </div>--}}

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Row -->

    <!-- New Live Modal -->
    <div class="modal fade" id="newLiveModal" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="registermodal">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">New Live's infos</h4>
                    <div class="login-form">
                        <form action="{{route('user.lives.new')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Title of the livestream" name="title" required autofocus autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>Start time <span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control" placeholder="" required name="start_time" required>
                            </div>

                            <div class="form-group">
                                <label>Choose concerned course <span class="text-danger">*</span></label>
                                <select name="ue" id="ue" class="form-control" required>
                                    <option value="">Choose UE</option>
                                    @foreach(auth()->user()->teacher->ues as $ue)
                                    <option value="{{ $ue->id }}">{{ $ue->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <!-- New Live Modal -->
    <div class="modal fade" id="deleteLiveModal" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
            <div class="modal-content" id="registermodal">
                <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                <div class="modal-body">
                    <h4 class="modal-header-title">Delete live ?</h4>
                    <div class="login-form">
                        <form action="{{route('user.lives.delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="live" required>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">Yes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->
@endsection

@section("js")
    <script>
        $(document).on('click', '.deleteLive', function(e){
            e.preventDefault();

            var id = $(this).data('id');

            if(id == ""){ return; }

            $("input[name='live']").val(id);

            $("#deleteLiveModal").modal();

            // On lance le modal de confirmation

        });
    </script>
@endsection
