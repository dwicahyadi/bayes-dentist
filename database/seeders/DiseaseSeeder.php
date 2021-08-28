<?php

namespace Database\Seeders;

use App\Models\Disease;
use Illuminate\Database\Seeder;

class DiseaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disease::insert([
            ['name' => 'Erosi Gigi', 'value' => rand(1,10)/10],
            ['name' => 'Ginggivitis', 'value' => rand(1,10)/10],
            ['name' => 'Pulpitis', 'value' => rand(1,10)/10],
            ['name' => 'Abses Gigi', 'value' => rand(1,10)/10],
            ['name' => 'Periodontitis', 'value' => rand(1,10)/10],
            ['name' => 'Karies Gigi', 'value' => rand(1,10)/10],
            ['name' => 'Halitosis', 'value' => rand(1,10)/10],
        ]);

        $rules[1][1] = ['value' => rand(1,10)/10];
        $rules[1][2] = ['value' => rand(1,10)/10];
        $rules[1][3] = ['value' => rand(1,10)/10];
        $rules[1][4] = ['value' => rand(1,10)/10];
        $rules[1][5] = ['value' => rand(1,10)/10];
        $rules[1][20] = ['value' => rand(1,10)/10];
        $rules[1][21] = ['value' => rand(1,10)/10];
        $rules[1][22] = ['value' => rand(1,10)/10];
        $rules[1][23] = ['value' => rand(1,10)/10];
        $rules[1][24] = ['value' => rand(1,10)/10];
        $rules[1][25] = ['value' => rand(1,10)/10];
        $rules[1][26] = ['value' => rand(1,10)/10];

        $rules[2][2] = ['value' => rand(1,10)/10];
        $rules[2][3] = ['value' => rand(1,10)/10];
        $rules[2][4] = ['value' => rand(1,10)/10];
        $rules[2][5] = ['value' => rand(1,10)/10];
        $rules[2][6] = ['value' => rand(1,10)/10];
        $rules[2][7] = ['value' => rand(1,10)/10];
        $rules[2][8] = ['value' => rand(1,10)/10];
        $rules[2][9] = ['value' => rand(1,10)/10];
        $rules[2][10] = ['value' => rand(1,10)/10];
        $rules[2][11] = ['value' => rand(1,10)/10];
        $rules[2][12] = ['value' => rand(1,10)/10];
        $rules[2][13] = ['value' => rand(1,10)/10];

        $rules[3][1] = ['value' => rand(1,10)/10];
        $rules[3][2] = ['value' => rand(1,10)/10];
        $rules[3][3] = ['value' => rand(1,10)/10];
        $rules[3][4] = ['value' => rand(1,10)/10];
        $rules[3][5] = ['value' => rand(1,10)/10];
        $rules[3][10] = ['value' => rand(1,10)/10];
        $rules[3][11] = ['value' => rand(1,10)/10];
        $rules[3][12] = ['value' => rand(1,10)/10];
        $rules[3][13] = ['value' => rand(1,10)/10];
        $rules[3][14] = ['value' => rand(1,10)/10];
        $rules[3][15] = ['value' => rand(1,10)/10];
        $rules[3][25] = ['value' => rand(1,10)/10];

        $rules[4][6] = ['value' => rand(1,10)/10];
        $rules[4][7] = ['value' => rand(1,10)/10];
        $rules[4][8] = ['value' => rand(1,10)/10];
        $rules[4][9] = ['value' => rand(1,10)/10];
        $rules[4][10] = ['value' => rand(1,10)/10];
        $rules[4][21] = ['value' => rand(1,10)/10];
        $rules[4][22] = ['value' => rand(1,10)/10];
        $rules[4][23] = ['value' => rand(1,10)/10];
        $rules[4][24] = ['value' => rand(1,10)/10];
        $rules[4][25] = ['value' => rand(1,10)/10];
        $rules[4][26] = ['value' => rand(1,10)/10];

        $rules[5][10] = ['value' => rand(1,10)/10];
        $rules[5][11] = ['value' => rand(1,10)/10];
        $rules[5][12] = ['value' => rand(1,10)/10];
        $rules[5][13] = ['value' => rand(1,10)/10];
        $rules[5][14] = ['value' => rand(1,10)/10];
        $rules[5][15] = ['value' => rand(1,10)/10];
        $rules[5][16] = ['value' => rand(1,10)/10];
        $rules[5][17] = ['value' => rand(1,10)/10];
        $rules[5][18] = ['value' => rand(1,10)/10];
        $rules[5][22] = ['value' => rand(1,10)/10];
        $rules[5][23] = ['value' => rand(1,10)/10];
        $rules[5][24] = ['value' => rand(1,10)/10];

        $rules[6][18] = ['value' => rand(1,10)/10];
        $rules[6][19] = ['value' => rand(1,10)/10];
        $rules[6][20] = ['value' => rand(1,10)/10];
        $rules[6][21] = ['value' => rand(1,10)/10];
        $rules[6][22] = ['value' => rand(1,10)/10];
        $rules[6][23] = ['value' => rand(1,10)/10];
        $rules[6][24] = ['value' => rand(1,10)/10];
        $rules[6][25] = ['value' => rand(1,10)/10];
        $rules[6][26] = ['value' => rand(1,10)/10];
        $rules[6][27] = ['value' => rand(1,10)/10];

        $rules[7][8] = ['value' => rand(1,10)/10];
        $rules[7][9] = ['value' => rand(1,10)/10];
        $rules[7][10] = ['value' => rand(1,10)/10];
        $rules[7][11] = ['value' => rand(1,10)/10];
        $rules[7][12] = ['value' => rand(1,10)/10];
        $rules[7][13] = ['value' => rand(1,10)/10];
        $rules[7][14] = ['value' => rand(1,10)/10];
        $rules[7][15] = ['value' => rand(1,10)/10];
        $rules[7][19] = ['value' => rand(1,10)/10];
        $rules[7][20] = ['value' => rand(1,10)/10];
        $rules[7][21] = ['value' => rand(1,10)/10];
        $rules[7][27] = ['value' => rand(1,10)/10];

        foreach ($rules as $i => $rule) {
            $disease = Disease::find($i);
            $disease->symptoms()->sync($rule);
        }

    }
}
