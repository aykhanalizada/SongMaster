<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('is_active', 1)
            ->where('is_deleted', 0)
            ->get();

        return inertia('Users/Index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        return redirect()->route('artists.index')->with('success', 'Artist has been created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return inertia('Users/Edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->validated();

        $user = User::findOrFail($id);

        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->username = $data['username'];
        $user->email = $data['email'];

        if(isset($data['password'])){
            $user->password = Hash::make($data['password']);
        }


        $user->save();

        return redirect()->route('users.index')->with('success', 'User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user) {
            $user->is_deleted = 1;
            $user->save();
        }

        return redirect()->route('users.index')->with('success', 'User has been deleted successfully.');
    }
}
