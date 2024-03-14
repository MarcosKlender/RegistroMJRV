<?php

namespace App\Http\Controllers;

use App\Imports\MJRVImport;
use App\Models\MJRV;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MJRVController extends Controller
{
    public function import()
    {
        Excel::import(new MJRVImport, request()->file('file'));

        return redirect ('/mjrv')->with('success', 'MJRV importados correctamente.');
    }

    public function index()
    {
        $members = MJRV::take(5)->get();
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

    public function update(Request $request, MJRV $mJRV)
    {
        //
    }

    public function destroy(MJRV $mJRV)
    {
        //
    }
}
