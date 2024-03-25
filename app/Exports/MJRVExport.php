<?php

namespace App\Exports;

use App\Models\MJRV;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MJRVExport implements FromView
{
    public function view(): View
    {
        return view('report.excel', [
            'members' => MJRV::where('asistencia', true)->get()
        ]);
    }
}
