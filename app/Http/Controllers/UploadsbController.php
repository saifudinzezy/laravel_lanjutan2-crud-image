<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use model gambar
use App\Gambar;
//panggil class file untuk menghapus file
use File;

class UploadsbController extends Controller
{
    //
    public function upload2()
    {
        $gambar = Gambar::get();
        return view('upload2', ['gambar' => $gambar]);
    }

    public function proses_upload(Request $request)
    {
        //validasi data dlu sebelum di proses
        $this->validate($request, [
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'keterangan' => 'required'
        ]);

        //menyimpan data file yang diupload ke variabel file
        $file = $request->file('file');
        
        $nama_file = time()."_".$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);
        
        Gambar::create([
            'file' => $nama_file,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back();
    }

    //hapus data dan gambarnya 
    public function hapus($id)
    {
        //hapus file
        //ambil data sesuai id
        $gambar = Gambar::where('id', $id)->first();
        //hapus File gambar sesuai nama gambarnya
        File::delete('data_file/'.$gambar->file);

        //hapus data sesuai id
        Gambar::where('id', $id)->delete();
        return redirect()->back();
    }
}