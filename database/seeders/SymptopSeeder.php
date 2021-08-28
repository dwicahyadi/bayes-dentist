<?php

namespace Database\Seeders;

use App\Models\Symptom;
use Illuminate\Database\Seeder;

class SymptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Symptom::insert([
            ['code' => 'G001', 'name' => 'Bau mulut tak sedap'],
            ['code' => 'G002', 'name' => 'Bentuk gigi tampak terkikis'],
            ['code' => 'G003', 'name' => 'Bentuk gusi agak membulat/tumpul'],
            ['code' => 'G004', 'name' => 'Bibir kering'],
            ['code' => 'G005', 'name' => 'Bibir pecah-pecah'],
            ['code' => 'G006', 'name' => 'Bibir terasa perih'],
            ['code' => 'G007', 'name' => 'Bibir mudah berdarah'],
            ['code' => 'G008', 'name' => 'Gigi berjejal'],
            ['code' => 'G009', 'name' => 'Gigi goyang'],
            ['code' => 'G010', 'name' => 'Gigi renggang'],
            ['code' => 'G011', 'name' => 'Gigi sulung yang tak kunjung tanggal'],
            ['code' => 'G012', 'name' => 'Gigi terasa sakit atau berdenyut'],
            ['code' => 'G013', 'name' => 'Gigi terasa ngilu dan lebih sensitif terhadap rasa manis, panas atau dingin'],
            ['code' => 'G014', 'name' => 'Gigi tonggos'],
            ['code' => 'G015', 'name' => 'Gigi yang berlubang terasa sakit bila masukmakanan'],
            ['code' => 'G016', 'name' => 'Gigi/gusi bernanah'],
            ['code' => 'G017', 'name' => 'Gingsul'],
            ['code' => 'G018', 'name' => 'Gusi yang turun membuat gigi terlihat lebih panjang'],
            ['code' => 'G019', 'name' => 'Gusi meradang'],
            ['code' => 'G020', 'name' => 'Gusi mudah berdarah'],
            ['code' => 'G021', 'name' => 'Gusi tampak merah dan bengkak'],
            ['code' => 'G022', 'name' => 'Gusi terasa sakit/nyeri'],
            ['code' => 'G023', 'name' => 'Nyeri saat luka tersentuh'],
            ['code' => 'G024', 'name' => 'Nyeri saat membuka mulut'],
            ['code' => 'G025', 'name' => 'Nyeri saat menggigit'],
            ['code' => 'G026', 'name' => 'Nyeri saat mengunyah'],
            ['code' => 'G027', 'name' => 'Nyeri sampai ke daerah sinus, pelipis, mata atau telinga'],
            ['code' => 'G028', 'name' => 'Pembengkakan kelenjar getah bening'],
            ['code' => 'G029', 'name' => 'Rasa sakit tajam hanya sebentar'],
            ['code' => 'G030', 'name' => 'Terasa sakit, panas, perih, atau gatal terutama saat makan dan minum'],
            ['code' => 'G031', 'name' => 'Terdapat gelembung (vesikel) di dalam rongga mulut'],
            ['code' => 'G032', 'name' => 'Terdapat lubang pada gigi'],
            ['code' => 'G033', 'name' => 'Terdapat luka berbentuk oval atau bulat yang berwarna puti/kuning dan tepi yang merah di dalam rongga mulut'],
            ['code' => 'G034', 'name' => 'Terdapat luka (ulkus) yang berwarna kekuningan pada gelembung yang pecah'],
            ['code' => 'G035', 'name' => 'Terjadi demam'],
            ['code' => 'G036', 'name' => 'Timbulnya benih gigi dengan posisi yang abnormal'],
            ['code' => 'G037', 'name' => 'Timbulnya bercak coklat, hitam atau putih pada gigi'],
        ]);
    }
}
