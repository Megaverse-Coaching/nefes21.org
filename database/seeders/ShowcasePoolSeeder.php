<?php

namespace Database\Seeders;

use App\Models\Admin\ShowcasePool;
use Illuminate\Database\Seeder;

class ShowcasePoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = $this->data();

        foreach ($data as $value) {
            ShowcasePool::create([
                'content_id' => $value['content_id'],
                'dimension_id' => $value['dimension_id'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by'],
            ]);
        }
    }

    private function data():array
    {
        return [
            [
                "content_id" => "101287",
                "dimension_id" => "intellectual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101113",
                "dimension_id" => "intellectual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101178",
                "dimension_id" => "intellectual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101106",
                "dimension_id" => "intellectual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101127",
                "dimension_id" => "intellectual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101076",
                "dimension_id" => "family_parenting",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101106",
                "dimension_id" => "family_parenting",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101110",
                "dimension_id" => "family_parenting",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101118",
                "dimension_id" => "family_parenting",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101143",
                "dimension_id" => "family_parenting",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101169",
                "dimension_id" => "family_parenting",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101146",
                "dimension_id" => "family_parenting",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101101",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101203",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101204",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101205",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101281",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101187",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101186",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101182",
                "dimension_id" => "sleep",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101074",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101073",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101084",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101086",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101087",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101104",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101096",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101115",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101093",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101165",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101343",
                "dimension_id" => "relationships",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101083",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101166",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101128",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101105",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101102",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101333",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101337",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101375",
                "dimension_id" => "occupational",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101222",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101278",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101269",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101300",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101294",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101306",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101357",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101351",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101345",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101316",
                "dimension_id" => "physical",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101081",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101098",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101099",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101205",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101100",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101097",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101129",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101106",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101127",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101335",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101382",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101383",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101366",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101370",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101321",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101353",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101341",
                "dimension_id" => "meditation",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101200",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101201",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101202",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101203",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101204",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101205",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101384",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101378",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101318",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101320",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101344",
                "dimension_id" => "music",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101080",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101092",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101287",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101211",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101270",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101210",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101075",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101091",
                "dimension_id" => "emotional",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101091",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101111",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101340",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101302",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101336",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101383",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101231",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101315",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101319",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101358",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ],
            [
                "content_id" => "101218",
                "dimension_id" => "spiritual",
                "created_by" => 801000,
                "updated_by" => 801000,
            ]
        ];
    }
}
