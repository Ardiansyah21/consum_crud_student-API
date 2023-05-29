<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counsume Rest Api students || create</title>
</head>
<body>

<h2>EDIT Data Siswa Baru</h2>

@if (Session::get('errors'))
    <h2 style="color: red;">{{ Session::get('errors') }}</h2>
  @endif
    <form action="{{route('update' , $student['id'])}}" method="POST">
        @csrf
        @method('PATCH')
        <div style="display : flex; margin-bottom: 15px;">
            <label for="nama">NAMA :</label>
            <input type="text" name="nama" value="{{$student['nama']}}" id="nama" placeholder="masukan nama anda">
        </div>

        <div style="display : flex; margin-bottom: 15px;">
            <label for="nis">NIS :</label>
            <input type="number" name="nis" value="{{$student['nis']}}" id="nis" placeholder="masukan nis anda">
        </div>


        <div style="display : flex; margin-bottom: 15px;">
            <label for="rombel">Rombel :</label>
            <select name="rombel" id="rombel">
                <option value="PPLG X" {{$student['rombel'] == 'PPLG X' ? 'seleceted' : ''}}>PPLG X</option>
                <option value="PPLG XI" {{$student['rombel'] == 'PPLG XI' ? 'seleceted' : ''}}>PPLG XI</option>
                <option value="PPLG XII" {{$student['rombel'] == 'PPLG XII' ? 'seleceted' : ''}}>PPLG XI</option>

            </select>
        </div>

        <div style="display : flex; margin-bottom: 15px;">
            <label for="rayon">RAYON :</label>
            <input type="text" name="rayon" value="{{$student['rayon']}}"id="rayon" placeholder="masukan rayon anda">
        </div>
        <button type="submit">Kirim</button>
    </form>
</body>

</html>
