<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'Widiaf','nipd'=>'1','alamat'=>'Cupu','mata_kuliah'=>'ips'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'Iqbal','nipd'=>'2','alamat'=>'Ranca kasiat','mata_kuliah'=>'Kimia'
        ));
        $this->command->info('Dosen Parantos Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $elt = jurusan::create(array(
         	'nama_jurusan'=>'Elektro'
         ));
        $this->command->info('Jurusan Telah Diisi !');

        $widi = mahasiswa::create(array(
        'nama_mahasiswa'=> 'widi','nis'=>'01','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));

        $ilham = mahasiswa::create(array(
        'nama_mahasiswa'=> 'ilham','nis'=>'02','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));
        $feby = mahasiswa::create(array(
        'nama_mahasiswa'=> 'feby','nis'=>'03','id_dosen'=>$dosen2->id,'id_jurusan'=> $elt->id
        ));

        $this->command->info('Mahasiswa Telah Diisi!');

        wali::create(array(
        'nama'=>'Bpk.affandi',
        'alamat'=>'rancamanyar',
        'id_mahasiswa'=>$widi->id
        ));
        wali::create(array(
        'nama'=>'Bpk.akis',
        'alamat'=>'bandung',
        'id_mahasiswa'=>$ilham->id
        ));
        wali::create(array(
        'nama'=>'Bpk.nana',
        'alamat'=>'baleendah',
        'id_mahasiswa'=>$feby->id
        ));

		$this->command->info('Wali Telah Diisi !');

		$ips = matkul::create(array('nama_matkul'=>'ips','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'85'));

		$widi->matkul()->attach($ips->id);
        $widi->matkul()->attach($kimia->id);
		$ilham->matkul()->attach($kimia->id);
		$feby->matkul()->attach($ips->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Telah Diisi !'); 
    }
}
