<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if (Session::get('success'))
    <h2>{{ Session::get('success') }}</h2>
  @endif
    <a href="/">kembali</a>
    @foreach ($studentsTrash as $student)
    <ol>
        <li>Nama : {{$student['nama']}}</li>
        <li>NIS : {{$student['nis']}}</li>
        <li>Rombel : {{$student['rombel']}}</li>
        <li>Rayon : {{$student['rayon']}}</li>
        <li> Di hapus pada tanggal : {{\Carbon\Carbon::parse($student['deleted_at'])->format('j F, Y') }}</li>
        <li>
        <a href="{{route ('restore', $student['id'])}}">Kemablikan data</a>
        <a href="{{route('permanent', $student['id'])}}" style="background: orange; colow: white;">Data terhapus permanent </a>
</li>
</ol>
@endforeach
</body>
</html>