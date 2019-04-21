<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil class crypt
use Illuminate\Support\Facades\Crypt;
//tambahkan utk hashing
use Illuminate\Support\Facades\Hash;

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

    //hashing
    public function hash()
    {
        //reload code hash setiap refresh
        $hash_password_saya = Hash::make('halo123');
        echo $hash_password_saya;

        if (Hash::check('password_yang_dimasukkan', $password_dari_db)) {
            // Jika password benar
        }else{
            // jika password tidak sesuai
        }
    }
}
