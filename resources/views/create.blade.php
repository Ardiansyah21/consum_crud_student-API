<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counsume Rest Api students || Edit</title>
</head>
<body>

<h2>Tambah Data Siswa Baru</h2>

@if (Session::get('errors'))
    <h2 style="color: red;">{{ Session::get('errors') }}</h2>
  @endif
    <form action="{{route('send')}}" method="POST">
        @csrf
        <div style="display : flex; margin-bottom: 15px;">
            <label for="nama">NAMA :</label>
            <input type="text" name="nama" id="nama" placeholder="masukan nama anda">
        </div>

        <div style="display : flex; margin-bottom: 15px;">
            <label for="nis">NIS :</label>
            <input type="number" name="nis" id="nis" placeholder="masukan nis anda">
        </div>


        <div style="display : flex; margin-bottom: 15px;">
            <label for="rombel">Rombel :</label>
            <select name="rombel" id="rombel">
                <option value="PPLG XI-3">PPLG XI-3</option>
                <option value="PPLG XI-4">PPLG XI-4</option>
                <option value="PPLG XI-5">PPLG XI-5</option>
            </select>
        </div>

        <div style="display : flex; margin-bottom: 15px;">
            <label for="rayon">RAYON :</label>
            <input type="text" name="rayon" id="rayon" placeholder="masukan rayon anda">
        </div>
        <button type="submit">Kirim</button>
    </form>
</body>

</html>
