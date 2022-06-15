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
                <h4 class="edu_title">Update UE's content</h4>
                <div id="accordionExample" class="accordion shadow circullum">

                    <!-- Part 1 -->
                    <div class="card">
                        <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">Part 01: How To Learn Web Designing Step by Step</a></h6>
                        </div>
                        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                            <div class="card-body pl-3 pr-3">
                                <ul class="lectures_lists">
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Part 2 -->
                    <div class="card">
                        <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 02: Learn Web Designing in Basic Level</a></h6>
                        </div>
                        <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                            <div class="card-body pl-3 pr-3">
                                <ul class="lectures_lists">
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Part 3 -->
                    <div class="card">
                        <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 03: Learn Web Designing in Advance Level</a></h6>
                        </div>
                        <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                            <div class="card-body pl-3 pr-3">
                                <ul class="lectures_lists">
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Part 04 -->
                    <div class="card">
                        <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 accordion_title"><a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="d-block position-relative collapsed text-dark collapsible-link py-2">Part 04: How To Become Succes in Designing & Development?</a></h6>
                        </div>
                        <div id="collapseThree" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
                            <div class="card-body pl-3 pr-3">
                                <ul class="lectures_lists">
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 01</div>Web Designing Beginner</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 02</div>Startup Designing with HTML5 & CSS3</li>
                                    <li><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 03</div>How To Call Google Map iFrame</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 04</div>Create Drop Down Navigation Using CSS3</li>
                                    <li class="unview"><div class="lectures_lists_title"><i class="ti-control-play"></i>Lecture: 05</div>How to Create Sticky Navigation Using JS</li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
    </script>
@endsection
