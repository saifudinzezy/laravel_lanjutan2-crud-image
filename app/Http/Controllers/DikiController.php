<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil class crypt
use Illuminate\Support\Facades\Crypt;

class DikiController extends Controller
{
    //
    public function enkripsi()
    {
        $encrypted = Crypt::encryptString('saifudin');
        $decrypted = Crypt::decryptString($encrypted);

        echo "Hasil Enkripsi : " . $encrypted;
		echo "<br/>";
		echo "<br/>";
		echo "Hasil Dekripsi : " . $decrypted;
    }

    public function data()
    {
        $parameter =[
			'nama' => 'Diki Alfarabi Hadi',
			'pekerjaan' => 'Programmer',
        ];
        $enkripsi= Crypt::encrypt($parameter);
        echo "<a href='/data/".$enkripsi."'>Klik</a>";
    }

    public function data_proses($data)
    {
        $data = Crypt::decrypt($data);
        //get data array nama
		echo "Nama : " . $data['nama'];
		echo "<br/>";
		echo "Pekerjaan : " . $data['pekerjaan'];
    }
}
