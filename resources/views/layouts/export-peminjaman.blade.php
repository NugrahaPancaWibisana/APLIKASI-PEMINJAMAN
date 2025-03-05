<table>
    <thead>
        <tr>
            <th colspan="8" style="text-align: center; ">REKAP PEMINJAMAN BARANG</th>
        </tr>
        <tr>
            <th colspan="8" style="text-align: center; font-size: 14px; font-weight:bolder;">SMK NEGERI
                1 SUBANG</th>
        </tr>
    </thead>
</table>

<table style="width: 100%; border: 1px solid #000; border-collapse: collapse;">
    <thead style="color: black;">
        <tr>
            <th height="50" valign="center" width="5" style="text-align: center; border: 1px solid #000;">NO
            </th>
            <th valign="center" width="30" style="text-align: center; border: 1px solid #000;">
                Peminjam</th>
            <th valign="center" width="15" style="text-align: center; border: 1px solid #000;">
                Tanggal Pinjam</th>
            <th valign="center" width="15" style="text-align: center; border: 1px solid #000;">Lama
                Pinjam</th>
            <th valign="center" width="15" style="text-align: center; border: 1px solid #000;">Total
                Barang</th>
            <th valign="center" width="30" style="text-align: center; border: 1px solid #000;">Barang
                Yang Dipinjam</th>
            <th valign="center" width="30" style="text-align: center; border: 1px solid #000;">Status
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($peminjaman->get() as $item)
            <tr>
                <td style="padding: 2px; text-align: center; border: 1px solid #000;">
                    {{ $counter++ }}</td>
                <td style="padding: 2px; text-align: center; border: 1px solid #000;">{{ $item->person->name }}</td>
                <td style="padding: 2px; text-align: center; border: 1px solid #000;">
                    {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') }}</td>
                <td style="padding: 2px; text-align: center; border: 1px solid #000;">
                    {{ \Carbon\Carbon::parse($item->lama_pinjam)->format('d M Y') }}</td>
                <td style="padding: 2px; text-align: center; border: 1px solid #000;">{{ $item->total_barang }}</td>
                <td style="padding: 2px; text-align: left; border: 1px solid #000;">
                    @foreach ($item->items as $peminjamanItem)
                        {{ $peminjamanItem->barang->nama }} ({{ $peminjamanItem->jumlah_barang }})
                        @if (!$loop->last)
                            |
                        @endif
                    @endforeach
                </td>
                <td style="padding: 2px; text-align: center; border: 1px solid #000;">{{ ucfirst($item->status) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align: center;">Data Peminjaman Tidak Ditemukan</td>
            </tr>
        @endforelse
    </tbody>
</table>
