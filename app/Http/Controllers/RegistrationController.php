<?php

namespace App\Http\Controllers;

use App\Models\MJRV;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function search(Request $request)
    {
        $idNumber = $request->string('idNumber');

        try {
            $mjrv = MJRV::where('cedula', $idNumber)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect('/registration')->with('error', 'No existen resultados. Prueba con otro número de cédula.');
        }

        return view('registration.search', ['mjrv' => $mjrv]);
    }

    public function index()
    {
        if (Auth::user()->role == 3) {
            return redirect('/report');
        } else {
            $members = MJRV::where('coordinador_cedula', Auth::user()->username)->orderBy("id", "DESC")->get();

            return view('registration.index', ['members' => $members]);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(MJRV $mjrv)
    {
        //
    }

    public function edit(MJRV $mjrv)
    {
        //
    }

    public function update(Request $request)
    {
        $mjrv = MJRV::find($request->id);

        $updateData = [
            'coordinador_cedula' => $request->coordinador_cedula,
            'coordinador_nombre' => $request->coordinador_nombre,
            'coordinador_celular' => $request->coordinador_celular,
            'asistencia' => $request->asistencia,
            'editado' => $request->editado,
        ];

        if ($request->has('unlink')) {
            $updateData['coordinador_cedula'] = null;
            $updateData['coordinador_nombre'] = null;
            $updateData['coordinador_celular'] = null;
        }

        $mjrv->update($updateData);

        if ($request->has('unlink')) {
            return redirect()->route('registration.index')->with('success', '¡MJRV desvinculado!');
        } else {
            return redirect()->route('registration.index')->with('success', '¡MJRV registrado!');
        }
    }

    public function destroy(MJRV $mjrv)
    {
        //
    }
}
