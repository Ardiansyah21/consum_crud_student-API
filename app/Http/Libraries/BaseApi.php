<?php
// Perbedaan helpers dan Lebraries
// Helapes : Bikin API
// Libraris : Pake API
namespace App\Http\Libraries;
// mengatur posisi file : spaces
use Illuminate\Support\Facades\Http;
// Variabel yang cuma bisa di akses di class ini dan turunanya
class BaseApi
// Consturctor : menyapkan isi data, dijalankan otomatis tanpa dipanggil
{
    protected $baseUrl;
    public function __construct()
    // var $baseUrl yang diatas disi nilainya dari isian file .env bagian API_HOST
    // var ini disi otomatis ketika file/class BaseApi dipanggil do conttrolle
    {
        $this->baseUrl = "http://127.0.0.1:2222";
    }
    private function client()
    {
        // koneksikan iv dari var $BaseUrl ke depancy Http
        //mengunkan dependency Http karena Projek API nya berbasis web (Protokol Http)
        return Http::baseUrl($this->baseUrl);
    }
    public function index(String $endpoint, Array $data =[])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function Store(String $endpoint, Array $data =[])
{
//pake post() karena buat route tambah data di project  rest api nya pake POST

return $this->client()->post($endpoint, $data);

}

public function edit(String $endpoint, Array $data =[])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function update(String $endpoint, Array $data =[])
    {
        return $this->client()->patch($endpoint, $data);
    }
    public function delete(String $endpoint, Array $data =[])
    {
        return $this->client()->delete($endpoint, $data);
    }

    public function trash(String $endpoint, Array $data =[])
    {
        return $this->client()->get($endpoint, $data);
    }

    public function restore(String $endpoint, Array $data =[])
    {
        return $this->client()->get($endpoint, $data);
    }
    
    public function permanentDelete(String $endpoint, Array $data =[])
    {
        return $this->client()->get($endpoint, $data);
    }
}