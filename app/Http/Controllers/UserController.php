<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Contracts\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->cannot('posts') || auth()->user()->cannot('users')) {
            abort(403);
        } else {

            $searchText = request('search');

            $users = User::where('name', 'LIKE', '%' . $searchText . '%')
                ->orWhere('username', 'LIKE', '%' . $searchText . '%')
                ->orWhere('email', 'LIKE', '%' . $searchText . '%')
                ->orderBy('id', 'desc')
                ->paginate(5);

            return view('backend.users.index', [
                'users' => $users,
                'searchKw' => $searchText,
                'title' => 'All Users'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(User $user, Role $roles)
    {
        if (auth()->user()->cannot('posts') || auth()->user()->cannot('users')) {
            abort(403);
        } else {
            return view('backend.users.create-user', compact('user', 'roles'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // dd($request->role); 

        $request->validate([
            'name'      => 'required',
            'photo'     => 'required|image|mimes:jpg,png,jpeg',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed'
        ]);

        $user = new User;

        $user->name         = $request->name;
        $user->username     = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower(trim($request->name))));
        $user->email        = $request->email;
        $user->password     = $request->password;

        // image upload
        $imageName = $request->file('photo')->hashName();
        $request->file('photo')->storeAs('public/images', $imageName);
        $user->photo = $imageName;

        // Assign role to the user
        $user->assignRole($request->role);

        $user->save();


        return redirect()->route('users.index')->with('message', 'User Created successfully!!');
    }

    /**
     * Display the specified resource.
     */


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(User $user, Role $roles)
    {
        if (auth()->user()->cannot('posts') || auth()->user()->cannot('users')) {
            abort(403);
        } else {

            return view('backend.users.edit', compact('user', 'roles'));
        }
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required',
        ]);

        $user = User::firstWhere('id', $id);

        $user->name         = $request->name;
        $user->username     = $request->username;
        $user->email        = $request->email;
        $user->password     = $request->password;

        // image upload
        if ($request->photo != null) {
            $imageName = $request->file('photo')->hashName();
            $request->file('photo')->storeAs('public/images', $imageName);
            $user->photo = $imageName;
        } else {
            $user->photo = $request->photoUpdate;
        }

        // Assign role to the user
        $user->syncRoles($request->role);

        $user->save();

        return redirect()->route('users.index')->with('message', 'User updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        if (auth()->user()->cannot('posts') || auth()->user()->cannot('users')) {
            abort(403);
        } else {

            $user = new User();
            // if( Gate::forUser($user)->allows('delete-user', $user) ){
            // Gate::authorize('delete-user', $user);
            $user = User::firstWhere('id', $id);
            $user->posts()->update(['user_id' => 1]);
            $user->delete();

            return back()->with('message', 'User Deleted!!');
            // }
        }
    }


    public function my_profile()
    {
        $user = auth()->user();
        return view('backend.users.profile', compact('user'));
    }
}
