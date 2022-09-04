<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('backend.users.create-user', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $user->is_admin     = 0;

        // image upload
        $imageName = $request->file('photo')->hashName();
        $request->file('photo')->storeAs('public/images', $imageName);
        $user->photo = $imageName;
        $user->save();


        return redirect()->route('users.index')->with('message', 'User Created successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->photo);
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

        $user->save();

        return back()->with('message', 'User updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::firstWhere('id', $id);

        $user->posts()->update(['user_id' => 1]);

        $user->delete();
        return back()->with('message', 'User Deleted!!');
    }


    public function my_profile()
    {
        $user = auth()->user();

        return view('backend.users.profile', compact('user'));
    }
}
