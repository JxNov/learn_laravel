<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = [
            [
                'id' => 1,
                'name' => 'User 1'
            ],
            [
                'id' => 2,
                'name' => 'User 2'
            ]
        ];

//        return view('list-user', compact('users'));
        return view('list-user')->with(
            [
                'users' => $users
            ]
        );
    }

    public function info()
    {
        $user = [
            'id' => 1,
            'name' => 'Nguyễn Mạnh Dũng',
            'age' => 21,
            'address' => 'Hà Nội',
            'class' => 'WD18321'
        ];

        return view('info', compact('user'));
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
    public function show(string $id)
    {
        //
        return "User " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //

        return $request->input('id');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
