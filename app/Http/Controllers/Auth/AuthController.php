<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
  
class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }  
      
    public function registration()
    {
        return view('auth.register');
    }
      
    public function postLogin(Request $request)
    {
        $user = User::query()->where('email', $request->email)->first();
        if ($user != null) {
            if($user->status == 1) {
                $request->validate([
                    'email' => 'required',
                    'password' => 'required',
                ]);
           
                $credentials = $request->only('email', 'password');
                if (Auth::attempt($credentials)) {
                    Session::flash('success','You have Successfully loggedin');
                    return redirect()->intended('admin');
                }
                
                Session::flash('error','You have entered invalid credentials');
                return redirect("login");
            }elseif ($user->status == 0) {
                Session::flash('error','Your account is not active! Please active your account.');
                return redirect("login");
            }
        }else {
            Session::flash('error','You have entered invalid credentials');
            return redirect("login");
        }
    }
      
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        Session::flash('success','Your registration complete :)');
        return redirect("login");
    }
    
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'role_id' => $data['role'],
        'phone' => $data['phone'],
        'password' => Hash::make($data['password']),
      ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}