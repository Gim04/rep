<?php

namespace Database\Seeders;

use App\Models\Peripheral;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeripheralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("database/data/peripherals.csv"), "r");
  
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Peripheral::create([
                    'id' => $data['0'],
                    'position' => $data['1'],
                    'position_id' => $data['2'],
                    'inventory_number'  => $data['3'],
                    'serial_number'  => $data['4'],
                    'manufacturer_id' => $data['5'],
                    'model' => $data['6'],
                    'type_of_peripheral' => $data['7'],
                    'power_rating' => $data['8'],
                    'description' => $data['9'],
                    'box' => $data['10'],
                    'icon' => $data['11'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    
    }
}
