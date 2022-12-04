<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $user = Akun::latest()->paginate(5);
      
        return view('user.index',compact('user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);
      
        Akun::create($request->all());
       
        return redirect()->route('user.index')
                        ->with('success','User created successfully.');
    
    }

    public function show(Akun $user)
    {
        return view('user.show',compact('user'));
    }

    public function edit(Akun $user)
    {
        return view('user.edit',compact('user'));
    }

    public function update(Request $request, Akun $user)
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

    public function destroy(Akun $user)
    {
        $user->delete();
       
        return redirect()->route('user.index')
                        ->with('success','User deleted successfully');
    
    }
}
