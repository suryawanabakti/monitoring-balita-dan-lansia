<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
        <tr>
            <th>Tanggal Pemeriksaan</th>
            <th>Nama</th>
            <th>Diagnosa</th>
            <th>TB (cm)</th>
            <th>BB (kg)</th>
            <th>Rujuk</th>
            <th>HB Kurang</th>
            <th>Kolesterol</th>
            <th>Asam Urat</th>
            <th>Gangguan Ginjal</th>
            <th>Gangguan Pendengaran</th>
            <th>Gangguan Mata</th>
            <th>Gangguan Mental</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $d->tgl_pemeriksaan }}</td>
                <td>{{ $d->lansia->nama }}</td>
                <td>{{ $d->catatan }}</td>
                <td>{{ $d->tinggi_badan }}</td>
                <td>{{ $d->berat_badan }}</td>
                <td>{{ $d->rujuk ? "Iya" : "Tidak" }}</td>
                <td>{{ $d->hb_kurang ? "Iya" : "Tidak" }}</td>
                <td>{{ $d->kolestrol ? "Iya" : "Tidak" }}</td>
                <td>{{ $d->asam_urat ? "Iya" : "Tidak" }}</td>
                <td>{{ $d->gangguan_ginjal ? "Iya" : "Tidak" }}</td>
                <td>{{ $d->gangguan_pendengaran ? "Iya" : "Tidak" }}</td>
                <td>{{ $d->gangguan_mata ? "Iya" : "Tidak" }}</td>
                <td>{{ $d->gangguan_mental ? "Iya" : "Tidak" }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
