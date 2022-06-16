@extends("layouts.teacher")

@section("css")
    <link rel="stylesheet" href="{{ asset('assets/summernote/summernote-bs4.css') }}">
@endsection

@section("content")
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('teacher.index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('teacher.ues')}}">My Courses</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $ue->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- /Row -->

    <div class="row">
        <div class="col-lg-12 col-md-12">

            <!-- Overview -->
            <div class="edu_wraper">
                <h3 class="edu_title text-center">Update UE's infos</h3>
                <form action="{{ route('teacher.ue.update_infos') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="ue" value="{{ $ue->id }}" required>

                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Name <sup class="text-danger">*</sup></label>
                                <input type="text" class="text-center form-control @error('name') is-invalid @enderror" name="name" required value="{{ old('name') ?? $ue->name }}">
                                @error('name')
                                <span class="text-danger text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Code <sup class="text-danger">*</sup></label>
                                <input type="text" class="text-center form-control @error('code') is-invalid @enderror" name="code" required value="{{ old('code') ?? $ue->code }}">
                                @error('code')
                                <span class="text-danger text-sm" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Featured Image</label>
                        <input type="file" class="form-control" name="photo">
                    </div>

                    <div class="form-group">
                        <label>Description <sup class="text-danger">*</sup></label>
                        <textarea class="form-control summernote-simple @error('description') is-invalid @enderror" name="description" required>{!! old('description') ?? $ue->description !!}</textarea>
                        @error('description')
                        <span class="text-danger text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group text-right">
                        <button class="btn btn-theme" type="submit">Submit Request</button>
                    </div>
                </form>
            </div>

            <div class="edu_wraper">
                <h4 class="edu_title">UE's content</h4>
                <div class="form-group text-right">
                    <button class="btn btn-outline-theme" id="addChapterButton" type="button">Add a Chapter</button>
                </div>
                <div id="accordionExample" class="accordion shadow circullum">
                    @foreach($ue->chapters as $chap)
                        <div class="card">
                            <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                <h6 class="mb-0 accordion_title row">
                                    <span class="text-left col-9"><a href="#" class="d-block position-relative text-dark py-2">{{ $chap->name }}</a></span>
                                    <span class="text-right col-3">
                                        <a href="#" class="d-block position-relative text-dark py-2"><i class="ti-edit"></i></a>
                                        <a href="javascript:void(0);" class="d-block position-relative text-danger py-2 deleteChapter" data-id="{{$chap->id}}">
                                            <i class="ti-trash"></i>
                                        </a>
                                    </span>
                                </h6>
                            </div>

                            <div class="modal fade" id="deleteChapterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form class="modal-content" action="{{ route('chapter.delete') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ue" value="{{$ue->id}}" required>
                                        <input type="hidden" name="del_chap" value="" required>
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Sure to delete the Chapter ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ...
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <form class="card d-none" id="addChapter" method="POST" action="{{route('chapter.add')}}" enctype="multipart/form-data">
                        <hr>
                        @csrf
                        <input type="hidden" name="ue" value="{{ $ue->id }}" required>

                        <div class="card-header bg-white shadow-sm border-0">
                            <h6 class="d-block position-relative text-dark py-2">Add a Chapter to this Course</h6>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Name <sup class="text-danger">*</sup></label>
                                    <input type="text" class="text-center form-control @error('chapter_name') is-invalid @enderror" name="chapter_name" required value="{{ old('chapter_name') }}" placeholder="Chap n: Name of the Chapter">
                                    @error('chapter_name')
                                    <span class="text-danger text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>Document (pdf,pptx) <sup class="text-danger">*</sup></label>
                                    <input type="file" class="text-center form-control @error('document') is-invalid @enderror" name="document" required value="{{ old('document') }}">
                                    @error('document')
                                    <span class="text-danger text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>TD <span class="text-danger">(pdf)</span></label>
                                    <input type="file" class="text-center form-control @error('td') is-invalid @enderror" name="td" value="{{ old('td') }}">
                                    @error('td')
                                    <span class="text-danger text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <label>TP <span class="text-danger">(pdf)</span></label>
                                    <input type="file" class="text-center form-control @error('tp') is-invalid @enderror" name="tp" value="{{ old('tp') }}">
                                    @error('tp')
                                    <span class="text-danger text-sm" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-outline-theme" type="button" onclick="javascript:location.reload();">Cancel</button>
                            <button class="btn btn-theme" type="submit">Submit Request</button>
                        </div>
                    </form>

                </div>
            </div>
            </div>

        </div>
    </div>
@endsection

@section("js")
    <script src="{{ asset('assets/summernote/summernote-bs4.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".summernote-simple").summernote();
    });

    $(document).on('click', "#addChapterButton", function(e){
        e.preventDefault();

        $("#addChapter").removeClass("d-none");
        $("input[name='chapter_name']").focus();
    });

    $(document).on('click', ".deleteChapter", function(e){
        e.preventDefault();
        var chap = $(this).data('id')

        $("input[name='del_chap']").val(chap)
        $("#deleteChapterModal").modal('toggle')
    });
</script>
@endsection
