<?php

namespace Database\Seeders;

use App\Models\Admin\Deck;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $data = $this->data();

        foreach ($data as $value) {
            Deck::create([
                'id' => $value['id'],
                'status' => $value['status'],
                'order' => $value['order'],
                'created_by' => $value['created_by'],
                'title' => $value['title'],
                'tag' => $value['tag'],
                'color' => $value['color'],
                'isValid' => $value['isValid'],
            ]);
        }
    }

    private function data(): array
    {
        return [
            ['id'=> 501001, 'status' => 1, 'order' => 1, 'title' => 'Olumlama Kartları',    'tag' => 'Günlük Olumlama',     'color'=>'#003e38', 'created_by'=>801000,  'isValid' => 1],
            ['id'=> 501002, 'status' => 1, 'order' => 2, 'title' => 'Farkındalık Kartları', 'tag' => 'Günlük Farkındalık',  'color'=>'#312e39', 'created_by'=>801000,  'isValid' => 1],
            ['id'=> 501003, 'status' => 1, 'order' => 3, 'title' => 'Mucize Kartları',      'tag' => 'Günlük Mucize',       'color'=>'#222e4b', 'created_by'=>801000,  'isValid' => 1],
            ['id'=> 501004, 'status' => 1, 'order' => 4, 'title' => 'Denge Kartları',       'tag' => 'Günlük Denge',        'color'=>'#2d3b40', 'created_by'=>801000,  'isValid' => 1],
            ['id'=> 501005, 'status' => 1, 'order' => 5, 'title' => 'Motivasyon Kartları',  'tag' => 'Günlük Motivasyon',   'color'=>'#3b382e', 'created_by'=>800100,  'isValid' => 1],
        ];
    }
}
