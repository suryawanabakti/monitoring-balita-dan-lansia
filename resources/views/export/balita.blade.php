

<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>Tanggal Pemeriksaan</th>
            <th>Nama Balita</th>
            <th>BB (kg)</th>
            <th>TPPB</th>
            <th>LILA (cm)</th>
            <th>ASI Eksklusif</th>
            <th>Vitamin A</th>
            <th>Umur</th>
            <th>PMT Ke</th>
            <th>BGT BGM</th>
            <th>IMD</th>
            <th>Catatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $d->tgl_pemeriksaan }}</td>
                <td>{{ $d->balita->nama }}</td>
                <td>{{ $d->berat_badan }}</td>
                <td>{{ $d->tppb }}</td>
                <td>{{ $d->lingkar_kepala }}</td>
                <td>{{ $d->asi_ekslusif ? 'Iya' : 'Tidak' }}</td>
                <td>{{ $d->vit_a ? 'Iya' : 'Tidak' }}</td>
                <td>{{ $d->umur }}</td>
                <td>{{ $d->pmt_ke }}</td>
                <td>{{ $d->bgt_bgm }}</td>
                <td>{{ $d->imd ? 'Iya' : 'Tidak' }}</td>
                <td>{{ $d->catatan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
