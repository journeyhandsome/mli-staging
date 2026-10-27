<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{


    public function approve() {

        $users = User::where('role','=', null)
            ->oldest()->paginate(10);
        return view('admin/users.approve', compact('users'));
    }
    public function pending() {

        return view('pending');
    }

    public function approval($id) {

        $user = User::find($id);
        return view('admin/users.approval', compact('user'));
    }

    public function accept(Request $request, $id) {
        $user = User::find($id);

        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.approve')->with('success', 'Approved Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::where('role','!=', null)
        ->oldest()->paginate(10);
        return view('admin/users.index', compact('users'));
    }

    public function create() {
        return view('admin/users.create');
    }
    
    public function store(UserPostRequest $request) {
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Created Successfully!');
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        if($request->current_password || $request->new_password){
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required_with:password_confirmation|same:password_confirmation|min:5|max:12|different:current_password'
            ]);
        }
        else{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email'
            ]);

        }
        
        if($request->current_password)
            {
                $isCurrentPass = Hash::check($request->current_password, $user->password);

                if($isCurrentPass){
                    $data = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->new_password),
                    ];
                    $user->fill($data)->save();
                    return redirect()->route('users.index')->with('success', 'Edited Successfully!');
                }
                else{
                    return back()->with('wrongCurrentPass', 'The current password does not match.');
                }
            }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Edited Successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        
        $user->delete();
        return back()->with('success', 'Deleted Successfully!');
    }

}
