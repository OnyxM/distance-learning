@extends("layouts.admin")

@section("container-xxl")
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-md-12 col-lg-12 mb-4 mb-md-0">
                Add a new Lecturer to the system
            </div>
        </div>
        <div class="row">
            <div class="card col-xl">
                <form class="card-body" action="{{ route('admin.teachers.create') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="radio" name="account" value="1" checked  class="account_radio" required>
                                Already have an account
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="radio" name="account" value="0"  class="account_radio" required>
                                New User
                            </div>
                        </div>
                    </div>

                    <div class="row account_yes">
                        <div class="form-group">
                            Select User's Account
                            <select name="user" id="user" class="form-control text-center" >
                                <option value="">Choose a User</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="account_no row d-none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Firstname <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-center @error('firstname') is-invalid @enderror" placeholder="Firstname" name="firstname" value="{{ old('firstname') }}" >
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lastname <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-center @error('lastname') is-invalid @enderror" placeholder="Lastname" name="lastname" value="{{ old('lastname') }}" >
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="account_no row d-none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control text-center @error('email') is-invalid @enderror" placeholder="email@domain.com" name="email" value="{{ old('email') }}" >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input type="text" class="form-control text-center @error('password') is-invalid @enderror" placeholder="Password" name="password" >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <select name="title" id="title" class="form-control text-center" required>
                                    <option value="">Choose a title for this Teacher</option>
                                    <option value="Ing">Ing</option>
                                    <option value="Ass">Assistant</option>
                                    <option value="Dr">Doctor</option>
                                    <option value="Pr">Professor</option>
                                </select>
                            </div>
                        </div>

{{--                        <div class="col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name">Poste</label>--}}
{{--                                <input type="text" name="poste"  placeholder="Lecturer" class="form-control text-center @error('poste') is-invalid @enderror" required>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                    <input type="submit" class="btn btn-primary" value="Save">
                    <a href="{{ route('admin.teachers') }}" class="btn btn-outline-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("js")
    <script>
        $(document).on('change', ".account_radio", function (e){
            e.preventDefault();

            let val = $(this).val();

            if(val==1){
                $(".account_yes").removeClass("d-none");
                $(".account_no").addClass("d-none");
            }else if(val==0){
                $(".account_no").removeClass("d-none");
                $(".account_yes").addClass("d-none");
            }
        });
    </script>
@endsection
