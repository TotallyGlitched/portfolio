@extends('layouts.nonav')

@section('content')
    <div class="login-section mt-4">
        <div class="container">
            <div class="card shadow border-0 ">
                <div class="row login-card d-flex justify-content-center align-items-center">
                    <div class="col-lg-6 col-12 ">
                        <div class="p-4 ">
                            <img src="\images\loginpage.jpg" alt="" class="w-100">

                        </div>
                    </div>
                    <div class="col-lg-6 col-12 p-md-5">
                        <div class="p-4 p-lg-5 " style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                            <div class="mb-3 ">
                                <form method="post" enctype="multipart/form-data">@csrf
                                    <div class=" Login-logo">
                                        Login
                                    </div>
                                    <vue-inputtext placeholder="Enter Email" name="email"
                                        id="email" class="label-login"
                                        :value="{{ json_encode(old('email') ?? ($data->data['email'] ?? '')) }}"
                                        :error="{{ json_encode($errors->has('email') ? $errors->first('email') : '') }}">
                                    </vue-inputtext>
                                    <vue-inputtext placeholder="Enter Password" name="password"
                                    type="password"
                                        id="password" class="label-login"
                                        :value="{{ json_encode(old('password') ?? ($data->data['password'] ?? '')) }}"
                                        :error="{{ json_encode($errors->has('password') ? $errors->first('password') : '') }}">
                                    </vue-inputtext>

                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>


                                    <button class="btn login-btn my-lg-4 my-3">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
