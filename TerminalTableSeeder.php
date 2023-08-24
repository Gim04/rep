<?php

namespace Database\Seeders;

use App\Models\Terminal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerminalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/terminals.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Terminal::create([
                    'id' => $data['0'],
                    'bool_position' => $data['1'],
                    'position_id' => $data['2'],
                    'inventory_number'  => $data['3'],
                    'serial_number'  => $data['4'],
                    'manufacturer_id' => $data['5'],
                    'model' => $data['6'],
                    'submodel' => $data['7'],
                    'year'  => $data['8'],
                    'powe_type' => $data['9'],
                    'power_rating' => $data['10'],
                    'monitor' => $data['11'],
                    'box' => $data['12'],
                    'icon' => $data['13'],
                    'description' => $data['14'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    
    }
}
