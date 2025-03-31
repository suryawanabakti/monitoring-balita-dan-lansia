<?php

namespace App\Exports;

use App\Invoice;
use App\Models\RekamKesehatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekamKesehatanLansiaExport implements FromView
{
    public function view(): View
    {
        return view('export.lansia', [
            'data' => RekamKesehatan::with('lansia')->orderBy('created_at', 'DESC')->get()
        ]);
    }
}
