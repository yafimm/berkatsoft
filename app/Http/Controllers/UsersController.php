<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
      private function validator(Request $request)
      {
          //validation rules.
          $rules = [
            'name' => 'required|string|min:6|max:50',
            'address' => 'sometimes|string|min:5',
            'email' => 'sometimes|string|min:6|max:50',
            'photo' => 'sometimes|image|max:1024|mimes:jpeg,jpg,bmp,png',
            'phone_number' => 'sometimes|regex:/(08)[0-9]/'
          ];

          $messages = [''];

          //validate the request.
          $this->validate($request ,$rules);
      }

      private function uploadGambar(Request $request)
      {
          $foto = $request->file('photo');
          $ext = $foto->getClientOriginalExtension();
          $username = \Auth::user()->username;
          if($request->file('photo')->isValid()){
              $filename = $username.$ext;
              $upload_path = 'img/profile';
              $request->file('photo')->move($upload_path, $filename);
              return $filename;
          }
          return false;
      }

      private function hapusGambar(User $user)
      {
          $exist = Storage::disk('foto')->exists($user->foto);
          if(isset($user->foto) && $exist){
              $delete = Storage::disk('foto')->delete($user->foto);
              return $delete; //Kalo delete gagal, bakal return false, kalo berhasil bakal return true
          }
      }

      public function dashboard()
      {
          return view('user.dashboard');
      }

      public function admindashboard()
      {
          return view('admin.dashboard');
      }

      public function show($username)
      {
          $user = User::where('username', '=', $username)->first();
          if($user)
          {
              return view('profil.index-user', compact('user'));
          }
          return abort(404);
      }

      public function edit_profile()
      {
          return view('profil.edit-profile');
      }

      public function edit_password()
      {
          return view('profil.edit-password');
      }

      public function update_account(Request $request)
      {
          $this->validator($request);
          $user = User::find(\Auth::user()->id);
          if($user){
              $input = $request->all();
              if(isset($input['foto']))
              {
                  $this->hapusGambar($user);
                  $input['foto'] = $this->uploadGambar($request);
              }

              $update = $user->update($input);

              if($update)
              {
                  if(\Auth::user()->isAdmin()){
                      $route = 'account.index.admin';
                  }else{
                      $route = "'user.show', {{ \Auth::user()->username }} ";
                  }

                  return redirect()->route($route)->with('flash_message', 'Data Akun berhasil diubah')
                                         ->with('alert-class', 'alert-success');
              }
              // kalo gagal dilempar kesini
              return redirect()->back()->with('flash_message', 'Data Akun gagal diubah')
                                        ->with('alert-class', 'alert-danger');

          }
          return abort(404);
      }

      public function update_password(Request $request)
      {
          $validator = \Validator::make($request->all(), [
              'old_password' => 'required',
              'new_password'=>'required|confirmed|min:6|max:32',
              'new_password_confirmation'=>'sometimes|required_with:new_password',
          ]);

          if ($validator->fails()) {
              return redirect()->route('account.index')
                              ->withErrors($validator)
                              ->with('alert-class', 'alert-danger')
                              ->with('flash_message', 'Ada kesalahan pada saat memasukkan data password');
          }else{
              $user = User::find(\Auth::user()->id);
              if($user){
                if(Hash::check($request->old_password, $user->password)){
                    $user->update(['password' => bcrypt($request->new_password)]);
                    return redirect()->route('user.show', $user->username)->with('flash_message', 'Password Akun berhasil diubah')
                                                        ->with('alert-class', 'alert-success');
                }
                return redirect()->back()->with('flash_message', 'Password lama tidak sesuai')
                                                          ->with('alert-class', 'alert-success');
              }
              return abort(404);
          }
      }

}
