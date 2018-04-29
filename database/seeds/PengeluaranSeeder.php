<?php

use Illuminate\Database\Seeder;
use App\Pengeluaran;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nama_makanan="barang";
    	$harga_barang=[50000,65000,30000,40000,100000,45000,120000,30000,20000,74000];
    	$month_awal=5;
        $tahun=2018;
        $bulan=$month_awal;
    	for($i=0;$i<12;$i++)
        {
            if($bulan<=0){
                    $bulan+=12;
                    $tahun-=1;
            }
    		for($j=0;$j<10;$j++)
            {
    			
    			$tanggal='24 05:49:12';
    			Pengeluaran::insert([
                    'user_id' => 1,
    	            'nama_barang' => $nama_makanan.$j,
    	            'harga' => $harga_barang[rand(0,9)],
    	            'created_at' => $tahun.'-'.(string)$bulan.'-'.$tanggal,
	            ]);
    		}
            $bulan-=1;
    	}
	    // Pengeluaran::insert([
     //        'nama_barang' => 'test',
     //        'harga' => '20000',
     //        'created_at' => '2018-12-24 05:49:12',
     //    ]);
    }
}
