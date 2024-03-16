<?php

namespace App\Http\Controllers;

use App\Models\MJRV;
use App\Models\Registration;
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
            return redirect()->back()->with('error', 'No existen resultados. Prueba con otro número de cédula.');
        }

        return view('registration.search', ['mjrv' => $mjrv]);
    }

    public function index()
    {
        $members = MJRV::where('coordinador_cedula', Auth::user()->username)->get();

        return view('registration.index', ['members' => $members]);
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

    public function update(Request $request, MJRV $mjrv)
    {
        $request->validate([
            'coordinador_cedula' => 'required',
            'coordinador_nombre' => 'required',
            'coordinador_celular' => 'required',
            'asistencia' => 'required',
        ]);

        $mjrv = MJRV::find($request->id);

        $mjrv->update([
            'coordinador_cedula' => $request->coordinador_cedula,
            'coordinador_nombre' => $request->coordinador_nombre,
            'coordinador_celular' => $request->coordinador_celular,
            'asistencia' => $request->asistencia,
        ]);

        return redirect()->route('registration.index')->with('success', 'MJRV registrado exitosamente');
    }

    public function destroy(MJRV $mjrv)
    {
        //
    }
}
