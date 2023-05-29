<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Libraries\BaseApi;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        // memangil liberaris baseapai method indek dengan me ngirim farameter
        //berupa path data dari Api nya, parameter 2 data untuk mengisi search_nama Api
        $data = (new BaseApi)->index('/api/students', ['search_nama' => $search]);
        //ambil resnpon jsonnya
        $students = $data->json();
        //dd($students);
        //kirim hasil pengambilan data ke blade index
        return view('index')->with(['students'=> $students['data']]);

    }

    public function trash()
    {
        $proses = (new BaseApi)->trash('/api/students/show/trash');
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{ $studentTrash = $proses->json('data');
            return view('trash')->with(['studentsTrash' => $studentTrash]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon, 

        ];
        $proses = (new BaseApi)->store('/api/students/store', $data);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            return redirect('/')->with('success', 'Berhasil menambahkan data baru ke student Api');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //proses ambil data api ke route Rest Api /student/{id}
        $data = (new BaseApi)->edit('/api/students/' .$id);
        //balikin ke halaman awal, sama errors nya
        if ($data->failed()){
            $errors = $data->json('data');
            //kalau gagal proses $data diatas, ambil deskripsi err dari jsonnproperty data
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            //kalau berhasil, ambil data dari jsonnya
            $student = $data->json(['data']);
            return view('edit')->with(['student' => $student]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payload = [
            'nama' => $request->nama,
            'nis' => $request->nis,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon, 
        ];

        $proses = (new BaseApi)->update('/api/students/update/'.$id, $payload);
        if($proses->failed()){
            $errors = $proses->json('data');
            // dd($proses);
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            return redirect('/')->with('success', 'Berhasil mengubah data dari Api');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $proses = (new BaseApi)->delete('/api/students/delete/'.$id);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);

        }else{
            return redirect('/')->with("success", 'Berhasil menguhapus data dari Api');
        }
    }


    public function permanentDelete($id)
    {
        $proses = (new BaseApi)->permanentDelete('/api/students/trash/delete/permanent/'.$id);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['Errors' => $errors]);

        }else{
            return redirect()->back()->with("success", 'Berhasil menghapus data seacara permanen');
        }
    }

    public function restore($id)
    {
        $proses = (new BaseApi)->restore('/api/students/trash/restore/'.$id);
        if ($proses->failed()){
            $errors = $proses->json('data');
            return redirect()->back()->with(['errors' => $errors]);
        }else{
            return redirect('/')->with('success', 'Berhasil mengembalikan data dari sampah');
        }
        

 
    }

}

