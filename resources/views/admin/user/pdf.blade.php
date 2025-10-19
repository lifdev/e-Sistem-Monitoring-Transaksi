<h1 align="center">Data User</h1>
<hr>
<table width="100%" border="1px" style="border-">
    <thead>
    <tr>
        <th width="20">No</th>
        <th width="20">Nama</th>
        <th width="20">Email</th>
        <th width="20">Jabatan</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($user as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->jabatan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>