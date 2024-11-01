<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'name' => 'Nasi Goreng Spesial',
                'descrip' => 'Nasi goreng dengan ayam, telur, dan sambal.',
                'price' => 25000
            ],
            [
                'name' => 'Mie Ayam',
                'descrip' => 'Mie ayam dengan kuah kaldu gurih dan pangsit.',
                'price' => 20000
            ],
            [
                'name' => 'Es Teh Manis',
                'descrip' => 'Teh manis dingin yang menyegarkan.',
                'price' => 5000
            ],
            [
                'name' => 'Sate Ayam',
                'descrip' => 'Sate ayam dengan bumbu kacang dan lontong.',
                'price' => 30000
            ],
            [
                'name' => 'Ayam Bakar',
                'descrip' => 'Ayam bakar dengan bumbu spesial dan sambal terasi.',
                'price' => 35000
            ]
        ];
        foreach ($menus as $menu){
            Menu::create($menu);
        }
    }
}
