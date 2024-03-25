<?php

namespace App\Http\Controllers;

use App\Exports\MJRVExport;
use App\Imports\MJRVImport;
use App\Models\MJRV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class MJRVController extends Controller
{
    public function search(Request $request)
    {
        $mjrvSearch = $request->string('mjrvSearch');

        try {
            $mjrv = MJRV::where('cedula', $mjrvSearch)->firstOrFail();
        } catch (\Throwable $e) {
            return redirect('/mjrv')->with('error', 'No existen resultados. Prueba con otro número de cédula.');
        }

        return view('mjrv.search', ['mjrv' => $mjrv]);
    }

    public function import()
    {
        try {
            DB::transaction(function () {
                MJRV::truncate();
                Excel::import(new MJRVImport, request()->file('file'));
            });

            return redirect('/mjrv')->with('success', '¡MJRV importados!');
        } catch (\Throwable $e) {
            return redirect('/mjrv')->with('error', 'Error al importar. Asegúrate de usar un archivo válido.');
        }
    }

    public function export()
    {
        $fileName = 'MJRV_' . now()->format('d-m-Y_H:i') . '.xlsx';
        return Excel::download(new MJRVExport, $fileName);
    }

    public function index()
    {
        $members = MJRV::inRandomOrder()->take(5)->get();
        $membersCount = MJRV::count();

        return view('mjrv.index', ['members' => $members, 'membersCount' => $membersCount]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(MJRV $mJRV)
    {
        //
    }

    public function edit(MJRV $mJRV)
    {
        //
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'junta' => 'required|numeric|digits_between:1,3',
            'sexo' => 'required|size:1',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            return redirect('/registration')->withErrors($errors);
        } else {
            $mjrv = MJRV::find($request->id);

            $mjrv->update([
                'junta' => $request->junta,
                'sexo' => $request->sexo,
            ]);

            $mjrv->save();

            return redirect('/registration')->with('success', '¡MJRV actualizado!');
        }
    }

    public function destroy(MJRV $mJRV)
    {
        //
    }
}
