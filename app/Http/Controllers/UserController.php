<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function import()
    {
        Excel::import(new UserImport, request()->file('file'));

        return redirect ('/user')->with('success', 'Usuarios importados correctamente.');
    }

    public function index()
    {
        $users = User::take(5)->get();
        $usersCount = User::count();

        return view('user.index', ['users' => $users, 'usersCount' => $usersCount]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
