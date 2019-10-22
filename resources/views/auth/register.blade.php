@extends('layouts.template')

@section('content')
<!--================login_part Area =================-->
<section class="login_part padding_top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <div class="login_part_text text-center">
                    <div class="login_part_text_iner">
                        <h2>New to our Shop?</h2>
                        <p>There are advances being made in science and technology
                            everyday, and a good example of this is the</p>
                        <a href="{{ route('login') }}" class="btn_3">Do you have an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="login_part_form">
                    <div class="login_part_form_iner">
                        <h3>Welcome to our shop ! <br>
                            Please Sign up now</h3>
                        <form class="row contact_form" action="{{ route('register') }}" method="post">
                          @csrf
                          @method('post')

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" value=""
                                    placeholder="Name">
                                @if($errors->has('name'))
                                  <small class="form-text text-danger">*{{ $errors->first('name') }}</small>
                                @endif
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="username" name="username" value=""
                                    placeholder="Username">
                                @if($errors->has('username'))
                                  <small class="form-text text-danger">*{{ $errors->first('username') }}</small>
                                @endif
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="email" name="email" value=""
                                    placeholder="Email">
                                @if($errors->has('email'))
                                  <small class="form-text text-danger">*{{ $errors->first('email') }}</small>
                                @endif
                            </div>

                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password" value=""
                                    placeholder="Password">
                                @if($errors->has('password'))
                                  <small class="form-text text-danger">*{{ $errors->first('password') }}</small>
                                @endif
                            </div>


                            <div class="col-md-12 form-group p_star">
                                <input type="password" class="form-control" id="password" name="password_confirmation" value=""
                                    placeholder="Password Confirmation">
                                @if($errors->has('password_confirmation'))
                                  <small class="form-text text-danger">*{{ $errors->first('password_confirmation') }}</small>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account d-flex align-items-center">
                                    <input type="checkbox" id="f-option" name="selector">
                                    <label for="f-option">Remember me</label>
                                </div>
                                <button type="submit" value="submit" class="btn_3">
                                    log in
                                </button>
                                <a class="lost_pass" href="#">forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================login_part end =================-->

@endsection
