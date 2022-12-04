<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class UserController extends Controller
{

    public function index()
    {
        $user = User::latest()->paginate(5);
        $data['title'] = 'User';
        return view('user.index',compact('user'),$data)
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $data['title'] = 'create';
        return view('user.create',$data);
    }
    public function register()
    {
        $data['title'] = 'Register';
        return view('user/reg', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $user = new User([
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $user->save();
        // Akun::create($request->all());
       
        return redirect()->route('login')
                        ->with('success','User created successfully.');
    
    }

    public function login()
    {
        $data['title'] = 'Login';
        if (Auth::check()) {
            return redirect()->route('user.index');
        }else{
            return view('user/login',$data);
        }
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('user.index');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);

        
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function show(User $user)
    {
        $data['title'] = 'show';
        return view('user.show',compact('user'),$data);
    }

    public function edit(User $user)
    {
        $data['title'] = 'edit';
        return view('user.edit',compact('user'),$data);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);
      
        $user->update($request->all());
      
        return redirect()->route('user.index')
                        ->with('success','User updated successfully');
    
    }

    public function destroy(User $user)
    {
        $user->delete();
       
        return redirect()->route('user.index')
                        ->with('success','User deleted successfully');
    
    }
}
