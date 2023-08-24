<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeyboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/keyboard.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Keyboard::create([
                    'id' => $data['0'],
                    'bool_position' => $data['1'],
                    'position_id' => $data['2'],
                    'inventory_number'  => $data['3'],
                    'serial_number'  => $data['4'],
                    'manufacturer_id' => $data['5'],
                    'model' => $data['6'],
                    'year'  => $data['7'],
                    'layout' => $data['8'],
                    'switch' => $data['9'],
                    'icon' => $data['10'],
                    'description' => $data['11']
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }  
}
