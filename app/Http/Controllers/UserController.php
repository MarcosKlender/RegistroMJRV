<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function import()
    {
        try {
            DB::transaction(function () {
                User::truncate();
                Excel::import(new UserImport, request()->file('file'));
            });

            return redirect('/user')->with('success', 'Usuarios importados correctamente.');
        } catch (\Throwable $e) {
            return redirect('/user')->with('error', 'Error al importar. Asegúrate de usar un archivo válido.');
        }
    }

    public function index()
    {
        $users = User::orderBy("id", "DESC")->take(5)->get();
        $usersCount = User::count();

        return view('user.index', ['users' => $users, 'usersCount' => $usersCount]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|numeric|digits:10|unique:users,username',
            'phone' => 'required|numeric|digits:10',
            'location' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect('/user')->withErrors($errors);
        } else {
            $user = User::create([
                'name' => strtoupper($request->name),
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'location' => strtoupper($request->location),
                'role' => $request->role,
                'password' => Hash::make($request->username),
            ]);

            $user->save();

            return redirect('/user')->with('success', 'Usuario creado correctamente.');
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'username' => 'required|numeric|digits:10|unique:users,username,' . $request->id,
            'phone' => 'required|numeric|digits:10',
            'location' => 'required',
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect('/user')->withErrors($errors);
        } else {
            $user = User::find($request->id);

            $user->update([
                'name' => strtoupper($request->name),
                'email' => $request->email,
                'username' => $request->username,
                'phone' => $request->phone,
                'location' => strtoupper($request->location),
                'role' => $request->role
            ]);

            $user->save();

            return redirect('/user')->with('success', 'Usuario editado correctamente.');
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/user')->with('success', '¡Usuario eliminado!');
    }
}
