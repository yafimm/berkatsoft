@extends('layouts.dashboard.template')

@section('content')
@include('_partial.flash_message')
<div class="card">
    <div class="card-body card-block">
        <div class="col-sm-12 py-3">
          <form action="{{ (Auth::user()->isAdmin()) ? route('admin.account.update') :  route('user.account.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @method('put')
            @CSRF
            <div class="row form-group">
                <div class="col-12 col-md-12 text-center py-2">
                    <img class="img-fluid rounded-circle" height="300px" width="300px" id="blah" src="{{ ($user->photo) ? asset('img/profile/'.$user->photo) : asset('img/profile/pict.png') }}" alt="">
                    <input type="file" name="photo" value="" id="imgInp">
                    @if($errors->has('photo'))
                      <small class="form-text text-danger">*{{ $errors->first('photo') }}</small>
                    @endif
                </div>
            </div>
              <div class="row form-group">
                  <div class="col col-md-3">
                      <label class=" form-control-label">Username  </label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{ $user->username }}</p>

                  </div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3">
                      <label for="text-input" class=" form-control-label">Name</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <input type="text" id="text-input" name="name" placeholder="Name" value="{{ $user->name }}"class="form-control">
                      @if($errors->has('name'))
                        <small class="form-text text-danger">*{{ $errors->first('name') }}</small>
                      @endif
                  </div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3">
                      <label for="email-input" class=" form-control-label">Email</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <input type="email" id="email-input" name="email" placeholder="Email" value="{{ $user->email}}" class="form-control">
                      @if($errors->has('email'))
                        <small class="form-text text-danger">*{{ $errors->first('email') }}</small>
                      @endif
                  </div>
              </div>
              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="no_telp" class=" form-control-label">Phone Number</label>

                </div>
                <div class="col-12 col-md-9">
                  <input type="text" name="phone_number" placeholder="Phone Number" value="{{ $user->phone_number }}" class="form-control">
                  @if($errors->has('phone_number'))
                    <small class="form-text text-danger">*{{ $errors->first('phone_number') }}</small>
                  @endif
                </div>
              </div>
              <div class="row form-group">
                  <div class="col col-md-3">
                      <label for="textarea-input" class=" form-control-label">Address</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <textarea name="address" id="textarea-input" rows="9" placeholder="Address" class="form-control">{{ $user->address }}</textarea>
                      @if($errors->has('address'))
                        <small class="form-text text-danger">*{{ $errors->first('address') }}</small>
                      @endif
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <input type="submit" class="col-md-3 col-sm-3 float-right btn btn-success" value="Update">
                </div>
              </div>
          </form>
        </div>
        <hr>
        <div class="col-sm-12 py-3">
          <form class="" action="{{ (Auth::user()->isAdmin()) ? route('admin.password.update') :  route('user.password.update') }}" method="post">
            @method('PUT')
            @CSRF
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="password-input" name="password" placeholder="Password" class="form-control">
                    <small class="help-block form-text text-info">Please enter a your password</small>
                    @if($errors->has('password'))
                      <small class="form-text text-danger">*{{ $errors->first('password') }}</small>
                    @endif
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="password-input" class=" form-control-label">New  Password</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="password-input" name="new_password" placeholder="New Password" class="form-control">
                    <small class="help-block form-text text-info">Please enter a new password</small>
                    @if($errors->has('new_password'))
                      <small class="form-text text-danger">*{{ $errors->first('new_password') }}</small>
                    @endif
                </div>
           </div>
           <div class="row form-group">
               <div class="col col-md-3">
                   <label for="password-input" class=" form-control-label">Re-enter New Password</label>
               </div>
               <div class="col-12 col-md-9">
                   <input type="password" id="password-input" name="new_password_confirmation" placeholder="Re-enter New Password" class="form-control">
                   <small class="help-block form-text text-info">Please re-enter a new password</small>
                   @if($errors->has('new_password_confirmation'))
                     <small class="form-text text-danger">*{{ $errors->first('new_password_confirmation') }}</small>
                   @endif
               </div>
          </div>
           <div class="row">
             <div class="col-sm-12">
               <input type="submit" class="col-md-3 col-sm-3 float-right btn btn-success" value="Update">
             </div>
           </div>
          </form>
        </div>
    </div>
</div>
@endsection
