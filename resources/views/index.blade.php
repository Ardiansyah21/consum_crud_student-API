<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consume REST API students</title>
</head>
<body>

<form action="" method="get">
    @csrf
    <input type="text" name="search" placeholder="cari nama...">
    <button type="submit">Cari</button>
</form>

@if (Session::get('success'))
    <h2>{{ Session::get('success') }}</h2>
  @endif
<br>
<a href="{{route('add')}}">Tambah data Baru</a><br>
<a href="{{route('trash')}}" style="background: orange; colow: white;">Data yg belum terhapus permanent </a>

        @foreach ($students as $student)
        <ol>
        <li>Nama : {{$student['nama']}}</li>
        <li>NIS : {{$student['nis']}}</li>
        <li>Rombel : {{$student['rombel']}}</li>
        <li>Rayon : {{$student['rayon']}}</li>
        <li> Aksi : <a href="{{route('edit', $student['id'])}}">Edit</a> || Hapus</li>
        <form action="{{route('delete', $student['id'])}}" method="POST">
            @csrf
            @method ('DELETE')
            <button type="submit">Hapus</button>
</form>
</li>
</ol>
@endforeach

</body>
</html>