<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

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

      public function index_admin()
      {
          $all_user = User::where('role_id','=',1)->Paginate(20);
          return view('user.indexadmin', compact('all_user'));
      }

      public function dashboard()
      {
          return view('user.dashboard');
      }

      public function admindashboard()
      {
          $total_user = User::where('role_id', '=', 1)->count();
          $order_unpaid = \App\Order::where('status', '=', 'Unpaid')->count();
          return view('user.dashboard', compact('total_user', 'order_unpaid'));
      }

      public function account()
      {
          $user = \Auth::user();
          if($user)
          {
              return view('user.account', compact('user'));
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

      public function account_update(Request $request)
      {
          $this->validator($request);
          $user = User::find(\Auth::user()->id);
          $input = $request->all();
          if(isset($input['photo']))
          {
              $this->hapusGambar($user);
              $input['photo'] = $this->uploadGambar($request);
          }

          $update = $user->update($input);

          if($update)
          {
              if(\Auth::user()->isAdmin()){
                  $route = 'admin.account';
              }else{
                  $route = 'user.account';
              }

              return redirect()->route($route)->with('flash_message', 'Profile successfully updated')
                                     ->with('alert-class', 'alert-success');
          }
          // kalo gagal dilempar kesini
          return redirect()->back()->with('flash_message', 'Profile failed to updated')
                                    ->with('alert-class', 'alert-danger');

      }

      public function password_update(Request $request)
      {
          $validator = \Validator::make($request->all(), [
              'password' => 'required',
              'new_password'=>'required|confirmed|min:6|max:32',
              'new_password_confirmation'=>'required_with:new_password',
          ]);

          if ($validator->fails()) {
              return redirect()->back()
                              ->withErrors($validator)
                              ->with('alert-class', 'alert-danger')
                              ->with('flash_message', 'There was an error when entering the password !!');
          }else{
              $user = User::find(\Auth::user()->id);
              if($user){
                if(Hash::check($request->password, $user->password)){
                    $user->update(['password' => bcrypt($request->new_password)]);
                    return redirect()->back()->with('flash_message', 'Password successfully updated')
                                                        ->with('alert-class', 'alert-success');
                }
                return redirect()->back()->with('flash_message', 'Old Password is wrong !!')
                                                          ->with('alert-class', 'alert-danger');
              }
              return abort(404);
          }
      }

}
