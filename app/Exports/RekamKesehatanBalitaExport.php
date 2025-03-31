<?php

namespace App\Exports;

use App\Invoice;
use App\Models\RekamKesehatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekamKesehatanBalitaExport implements FromView
{
    public function view(): View
    {
        return view('export.balita', [
            'data' => RekamKesehatan::with('balita')->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
