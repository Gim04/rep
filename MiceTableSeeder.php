<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mouse;

class MiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/mouse.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Mouse::create([
                    'id' => $data['0'],
                    'bool_position' => $data['1'],
                    'position_id' => $data['2'],
                    'inventory_number'  => $data['3'],
                    'serial_number'  => $data['4'],
                    'manufacturer_id' => $data['5'],
                    'model' => $data['6'],
                    'year'  => $data['7'],
                    'box' => $data['8'],
                    'icon' => $data['9'],
                    'description' => $data['10'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
