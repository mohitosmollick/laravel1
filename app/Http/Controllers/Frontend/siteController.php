<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegistration;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class siteController extends Controller
{
    public function name(){
        return view('Frontend.home');

    }
    public function singlepost(){
        return view('Frontend.single-post');
    }
    public function registerform(){
        return view('Frontend.Auth.register');
    }
    public function registration( Request $request){



       $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'password'  => 'required|min:6|same:confirmpassword',
//            'photo'     =>  'required|image'
       ]);

//        $photos =  $request->file('photo');
//        $file_name = rand(1111,2222).date('ymdhis').$photos->getClientOriginalExtension();
//        $path = public_path('/image');
//        $photos->move($path,$file_name);

        try {
            User::create([
                'name' => $request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);
            session()->flash('type', 'success');
            session()->flash('message', 'User registration Successfully');
        }catch (\Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'User registration Failed');
        }

        return redirect()->back();
    }

    public function loginform(){
        return view('Frontend.Auth.login');
    }

    public function login( Request $request){

        $data = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:6'
        ]);

        if (auth()->attempt($data)){
            return redirect('admin/dashboard');
        }else{
            session()->flash('type', 'danger');
            session()->flash('message', "Failed! Email and Password does't Matches");
            return redirect()->back();
        }


//        Auth::attempt(['email'=>'admin@gamil.com','password'=>'2423534']);


    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
