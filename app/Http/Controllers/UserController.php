<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // can't delete self row
        if ($user->id == auth()->user()->id) {
            return redirect()->route('user.index')->with('error', 'You can\'t delete yourself');
        }
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }

    /**
     * Block the user from accessing the specified resource
     */
    public function block(User $user)
    {
        // can't delete self row
        if ($user->id == auth()->user()->id) {
            return redirect()->back()->with('error', 'You can\'t block yourself');
        }
        $user->update(
            [
                'status' => 'blocked'
            ]
        );

        return redirect()->back()->with('success', 'User blocked successfully');
    }

    /**
     * Active the user from accessing the specified resource
     */
    public function active(User $user)
    {
        // can't delete self row
        if ($user->id == auth()->user()->id) {
            return redirect()->back()->with('error', 'You can\'t active yourself');
        }
        $user->update(
            [
                'status' => 'active'
            ]
        );

        return redirect()->back()->with('success', 'User blocked successfully');
    }
}
