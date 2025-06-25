<?php

namespace Database\Seeders;

use App\Models\Admin\DimensionLayouts;
use Illuminate\Database\Seeder;

class DimensionLayoutsSeeder extends Seeder
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
            DimensionLayouts::create([
                'category_id' => $value['category_id'],
                'content_id' => $value['content_id'],
                'dimension_id' => $value['dimension_id'],
                'category_order' => $value['category_order'],
                'showcase_id' => $value['showcase_id'],
                'soundscape_id' => $value['soundscape_id'],
            ]);
        }
    }


    private function data():array
    {
        return [









            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => '601086'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => '601085'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => '601087'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => '601100'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => '601104'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => '601108'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => '601111'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => '601114'
            ],
            [
                'category_id' => 'soundscapes',
                'content_id' => null,
                'dimension_id' => 'music',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => '601117'
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101408',
                'dimension_id' => 'music',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101384',
                'dimension_id' => 'music',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101360',
                'dimension_id' => 'music',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101203',
                'dimension_id' => 'music',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101201',
                'dimension_id' => 'music',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101318',
                'dimension_id' => 'music',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101200',
                'dimension_id' => 'music',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101202',
                'dimension_id' => 'music',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101204',
                'dimension_id' => 'music',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'albums',
                'content_id' => '101208',
                'dimension_id' => 'music',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'music',
                'content_id' => '101431',
                'dimension_id' => 'music',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'music',
                'content_id' => '101202',
                'dimension_id' => 'music',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'music',
                'content_id' => '101204',
                'dimension_id' => 'music',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'music',
                'content_id' => '101203',
                'dimension_id' => 'music',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'music',
                'content_id' => '101200',
                'dimension_id' => 'music',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'music',
                'content_id' => '101201',
                'dimension_id' => 'music',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'music',
                'content_id' => '101208',
                'dimension_id' => 'music',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],








            [
                'category_id' => 'family_parenting-610589',
                'content_id' => '101372',
                'dimension_id' => 'family_parenting',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-610589',
                'content_id' => '101289',
                'dimension_id' => 'family_parenting',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-610589',
                'content_id' => '101084',
                'dimension_id' => 'family_parenting',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-610589',
                'content_id' => '101096',
                'dimension_id' => 'family_parenting',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-610589',
                'content_id' => '101168',
                'dimension_id' => 'family_parenting',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-634699',
                'content_id' => '101115',
                'dimension_id' => 'family_parenting',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-634699',
                'content_id' => '101173',
                'dimension_id' => 'family_parenting',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-634699',
                'content_id' => '101169',
                'dimension_id' => 'family_parenting',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-634699',
                'content_id' => '101172',
                'dimension_id' => 'family_parenting',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-634699',
                'content_id' => '101199',
                'dimension_id' => 'family_parenting',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-307382',
                'content_id' => '101438',
                'dimension_id' => 'family_parenting',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-307382',
                'content_id' => '101379',
                'dimension_id' => 'family_parenting',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-307382',
                'content_id' => '101191',
                'dimension_id' => 'family_parenting',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-307382',
                'content_id' => '101190',
                'dimension_id' => 'family_parenting',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-307382',
                'content_id' => '101125',
                'dimension_id' => 'family_parenting',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-307382',
                'content_id' => '101106',
                'dimension_id' => 'family_parenting',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'family_parenting-307382',
                'content_id' => '101143',
                'dimension_id' => 'family_parenting',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],









            [
                'category_id' => 'physical-689686',
                'content_id' => '101447',
                'dimension_id' => 'physical',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-689686',
                'content_id' => '101406',
                'dimension_id' => 'physical',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-689686',
                'content_id' => '101380',
                'dimension_id' => 'physical',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-689686',
                'content_id' => '101362',
                'dimension_id' => 'physical',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-689686',
                'content_id' => '101359',
                'dimension_id' => 'physical',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-689686',
                'content_id' => '101352',
                'dimension_id' => 'physical',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-689686',
                'content_id' => '101346',
                'dimension_id' => 'physical',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-689686',
                'content_id' => '101316',
                'dimension_id' => 'physical',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-811660',
                'content_id' => '101361',
                'dimension_id' => 'physical',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-811660',
                'content_id' => '101306',
                'dimension_id' => 'physical',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-811660',
                'content_id' => '101307',
                'dimension_id' => 'physical',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-811660',
                'content_id' => '101294',
                'dimension_id' => 'physical',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-237985',
                'content_id' => '101345',
                'dimension_id' => 'physical',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-237985',
                'content_id' => '101341',
                'dimension_id' => 'physical',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-237985',
                'content_id' => '101097',
                'dimension_id' => 'physical',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-655539',
                'content_id' => '101386',
                'dimension_id' => 'physical',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-655539',
                'content_id' => '101387',
                'dimension_id' => 'physical',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-655539',
                'content_id' => '101388',
                'dimension_id' => 'physical',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-655539',
                'content_id' => '101389',
                'dimension_id' => 'physical',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-655539',
                'content_id' => '101390',
                'dimension_id' => 'physical',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-655539',
                'content_id' => '101391',
                'dimension_id' => 'physical',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'physical-655539',
                'content_id' => '101392',
                'dimension_id' => 'physical',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],










            [
                'category_id' => 'relationships-302886',
                'content_id' => '101347',
                'dimension_id' => 'relationships',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-302886',
                'content_id' => '101096',
                'dimension_id' => 'relationships',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-302886',
                'content_id' => '101104',
                'dimension_id' => 'relationships',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-302886',
                'content_id' => '101211',
                'dimension_id' => 'relationships',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-302886',
                'content_id' => '101090',
                'dimension_id' => 'relationships',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-302886',
                'content_id' => '101094',
                'dimension_id' => 'relationships',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101073',
                'dimension_id' => 'relationships',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101093',
                'dimension_id' => 'relationships',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101272',
                'dimension_id' => 'relationships',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101165',
                'dimension_id' => 'relationships',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101219',
                'dimension_id' => 'relationships',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101176',
                'dimension_id' => 'relationships',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101198',
                'dimension_id' => 'relationships',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101111',
                'dimension_id' => 'relationships',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101209',
                'dimension_id' => 'relationships',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101266',
                'dimension_id' => 'relationships',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-195818',
                'content_id' => '101310',
                'dimension_id' => 'relationships',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101455',
                'dimension_id' => 'relationships',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101397',
                'dimension_id' => 'relationships',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101377',
                'dimension_id' => 'relationships',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101213',
                'dimension_id' => 'relationships',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101086',
                'dimension_id' => 'relationships',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101087',
                'dimension_id' => 'relationships',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101105',
                'dimension_id' => 'relationships',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101124',
                'dimension_id' => 'relationships',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101292',
                'dimension_id' => 'relationships',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101167',
                'dimension_id' => 'relationships',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-398207',
                'content_id' => '101302',
                'dimension_id' => 'relationships',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101450',
                'dimension_id' => 'relationships',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101444',
                'dimension_id' => 'relationships',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101441',
                'dimension_id' => 'relationships',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101422',
                'dimension_id' => 'relationships',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101415',
                'dimension_id' => 'relationships',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101381',
                'dimension_id' => 'relationships',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101193',
                'dimension_id' => 'relationships',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101191',
                'dimension_id' => 'relationships',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101146',
                'dimension_id' => 'relationships',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101124',
                'dimension_id' => 'relationships',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101206',
                'dimension_id' => 'relationships',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101195',
                'dimension_id' => 'relationships',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101169',
                'dimension_id' => 'relationships',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101177',
                'dimension_id' => 'relationships',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'relationships-197310',
                'content_id' => '101175',
                'dimension_id' => 'relationships',
                'category_order' => 15,
                'showcase_id' => null,
                'soundscape_id' => null
            ],

















            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101442',
                'dimension_id' => 'spiritual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101209',
                'dimension_id' => 'spiritual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101106',
                'dimension_id' => 'spiritual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101264',
                'dimension_id' => 'spiritual',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101265',
                'dimension_id' => 'spiritual',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101268',
                'dimension_id' => 'spiritual',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101269',
                'dimension_id' => 'spiritual',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101270',
                'dimension_id' => 'spiritual',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101271',
                'dimension_id' => 'spiritual',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101290',
                'dimension_id' => 'spiritual',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101273',
                'dimension_id' => 'spiritual',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101277',
                'dimension_id' => 'spiritual',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101274',
                'dimension_id' => 'spiritual',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-407975',
                'content_id' => '101275',
                'dimension_id' => 'spiritual',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-951477',
                'content_id' => '101402',
                'dimension_id' => 'spiritual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-951477',
                'content_id' => '101401',
                'dimension_id' => 'spiritual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-951477',
                'content_id' => '101217',
                'dimension_id' => 'spiritual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-951477',
                'content_id' => '101403',
                'dimension_id' => 'spiritual',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-951477',
                'content_id' => '101404',
                'dimension_id' => 'spiritual',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101452',
                'dimension_id' => 'spiritual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101439',
                'dimension_id' => 'spiritual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101425',
                'dimension_id' => 'spiritual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101420',
                'dimension_id' => 'spiritual',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101419',
                'dimension_id' => 'spiritual',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101418',
                'dimension_id' => 'spiritual',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101417',
                'dimension_id' => 'spiritual',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101416',
                'dimension_id' => 'spiritual',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101363',
                'dimension_id' => 'spiritual',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101301',
                'dimension_id' => 'spiritual',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101106',
                'dimension_id' => 'spiritual',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101144',
                'dimension_id' => 'spiritual',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-635092',
                'content_id' => '101202',
                'dimension_id' => 'spiritual',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101433',
                'dimension_id' => 'spiritual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101427',
                'dimension_id' => 'spiritual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101423',
                'dimension_id' => 'spiritual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101405',
                'dimension_id' => 'spiritual',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101371',
                'dimension_id' => 'spiritual',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101322',
                'dimension_id' => 'spiritual',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101189',
                'dimension_id' => 'spiritual',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101193',
                'dimension_id' => 'spiritual',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101197',
                'dimension_id' => 'spiritual',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101196',
                'dimension_id' => 'spiritual',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101198',
                'dimension_id' => 'spiritual',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-514372',
                'content_id' => '101224',
                'dimension_id' => 'spiritual',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-900923',
                'content_id' => '101215',
                'dimension_id' => 'spiritual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-900923',
                'content_id' => '101218',
                'dimension_id' => 'spiritual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'spiritual-900923',
                'content_id' => '101217',
                'dimension_id' => 'spiritual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],










            [
                'category_id' => 'intellectual-782784',
                'content_id' => '101367',
                'dimension_id' => 'intellectual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-782784',
                'content_id' => '101259',
                'dimension_id' => 'intellectual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-782784',
                'content_id' => '101230',
                'dimension_id' => 'intellectual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-782784',
                'content_id' => '101220',
                'dimension_id' => 'intellectual',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-782784',
                'content_id' => '101206',
                'dimension_id' => 'intellectual',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-782784',
                'content_id' => '101312',
                'dimension_id' => 'intellectual',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-782784',
                'content_id' => '101205',
                'dimension_id' => 'intellectual',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101414',
                'dimension_id' => 'intellectual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101376',
                'dimension_id' => 'intellectual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101103',
                'dimension_id' => 'intellectual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101354',
                'dimension_id' => 'intellectual',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101166',
                'dimension_id' => 'intellectual',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101284',
                'dimension_id' => 'intellectual',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101285',
                'dimension_id' => 'intellectual',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101311',
                'dimension_id' => 'intellectual',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-684664',
                'content_id' => '101333',
                'dimension_id' => 'intellectual',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101462',
                'dimension_id' => 'intellectual',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101434',
                'dimension_id' => 'intellectual',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101358',
                'dimension_id' => 'intellectual',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101178',
                'dimension_id' => 'intellectual',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101080',
                'dimension_id' => 'intellectual',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101305',
                'dimension_id' => 'intellectual',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101192',
                'dimension_id' => 'intellectual',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101106',
                'dimension_id' => 'intellectual',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'intellectual-267011',
                'content_id' => '101303',
                'dimension_id' => 'intellectual',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],









            [
                'category_id' => 'emotional-329590',
                'content_id' => '101467',
                'dimension_id' => 'emotional',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101119',
                'dimension_id' => 'emotional',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101097',
                'dimension_id' => 'emotional',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101343',
                'dimension_id' => 'emotional',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101210',
                'dimension_id' => 'emotional',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101094',
                'dimension_id' => 'emotional',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101110',
                'dimension_id' => 'emotional',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101211',
                'dimension_id' => 'emotional',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-329590',
                'content_id' => '101335',
                'dimension_id' => 'emotional',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101435',
                'dimension_id' => 'emotional',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101432',
                'dimension_id' => 'emotional',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101428',
                'dimension_id' => 'emotional',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101412',
                'dimension_id' => 'emotional',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101424',
                'dimension_id' => 'emotional',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101096',
                'dimension_id' => 'emotional',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101293',
                'dimension_id' => 'emotional',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101100',
                'dimension_id' => 'emotional',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101085',
                'dimension_id' => 'emotional',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101105',
                'dimension_id' => 'emotional',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101099',
                'dimension_id' => 'emotional',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101082',
                'dimension_id' => 'emotional',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101116',
                'dimension_id' => 'emotional',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101263',
                'dimension_id' => 'emotional',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-444403',
                'content_id' => '101262',
                'dimension_id' => 'emotional',
                'category_order' => 15,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101445',
                'dimension_id' => 'emotional',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101281',
                'dimension_id' => 'emotional',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101091',
                'dimension_id' => 'emotional',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101087',
                'dimension_id' => 'emotional',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101092',
                'dimension_id' => 'emotional',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101120',
                'dimension_id' => 'emotional',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101184',
                'dimension_id' => 'emotional',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-944652',
                'content_id' => '101181',
                'dimension_id' => 'emotional',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101440',
                'dimension_id' => 'emotional',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101429',
                'dimension_id' => 'emotional',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101413',
                'dimension_id' => 'emotional',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101407',
                'dimension_id' => 'emotional',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101398',
                'dimension_id' => 'emotional',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101105',
                'dimension_id' => 'emotional',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101358',
                'dimension_id' => 'emotional',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101350',
                'dimension_id' => 'emotional',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101331',
                'dimension_id' => 'emotional',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101330',
                'dimension_id' => 'emotional',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101207',
                'dimension_id' => 'emotional',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101334',
                'dimension_id' => 'emotional',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101329',
                'dimension_id' => 'emotional',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'emotional-394063',
                'content_id' => '101286',
                'dimension_id' => 'emotional',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => '601111'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => '601086'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => '601088'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => '601102'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => '601112'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => '601113'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => '601115'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => '601114'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => '601108'
            ],
            [
                'category_id' => 'sleep_soundscapes',
                'content_id' => null,
                'dimension_id' => 'sleep',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => '601110'
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101466',
                'dimension_id' => 'sleep',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101465',
                'dimension_id' => 'sleep',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101464',
                'dimension_id' => 'sleep',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101463',
                'dimension_id' => 'sleep',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101461',
                'dimension_id' => 'sleep',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101456',
                'dimension_id' => 'sleep',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101437',
                'dimension_id' => 'sleep',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101409',
                'dimension_id' => 'sleep',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101349',
                'dimension_id' => 'sleep',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101101',
                'dimension_id' => 'sleep',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101099',
                'dimension_id' => 'sleep',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101098',
                'dimension_id' => 'sleep',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101178',
                'dimension_id' => 'sleep',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101180',
                'dimension_id' => 'sleep',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101181',
                'dimension_id' => 'sleep',
                'category_order' => 15,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101187',
                'dimension_id' => 'sleep',
                'category_order' => 16,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101182',
                'dimension_id' => 'sleep',
                'category_order' => 17,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_preperation',
                'content_id' => '101283',
                'dimension_id' => 'sleep',
                'category_order' => 18,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101460',
                'dimension_id' => 'sleep',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101459',
                'dimension_id' => 'sleep',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101395',
                'dimension_id' => 'sleep',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101394',
                'dimension_id' => 'sleep',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101393',
                'dimension_id' => 'sleep',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101175',
                'dimension_id' => 'sleep',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101172',
                'dimension_id' => 'sleep',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101169',
                'dimension_id' => 'sleep',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101177',
                'dimension_id' => 'sleep',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101182',
                'dimension_id' => 'sleep',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101183',
                'dimension_id' => 'sleep',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101185',
                'dimension_id' => 'sleep',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_stories',
                'content_id' => '101186',
                'dimension_id' => 'sleep',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_asmr',
                'content_id' => '101101',
                'dimension_id' => 'sleep',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_asmr',
                'content_id' => '101179',
                'dimension_id' => 'sleep',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_asmr',
                'content_id' => '101187',
                'dimension_id' => 'sleep',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_musics',
                'content_id' => '101378',
                'dimension_id' => 'sleep',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_musics',
                'content_id' => '101203',
                'dimension_id' => 'sleep',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_musics',
                'content_id' => '101204',
                'dimension_id' => 'sleep',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_musics',
                'content_id' => '101205',
                'dimension_id' => 'sleep',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'sleep_musics',
                'content_id' => '101201',
                'dimension_id' => 'sleep',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],









            [
                'category_id' => 'meditation-641077',
                'content_id' => '101336',
                'dimension_id' => 'meditation',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101358',
                'dimension_id' => 'meditation',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101313',
                'dimension_id' => 'meditation',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101337',
                'dimension_id' => 'meditation',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101144',
                'dimension_id' => 'meditation',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101212',
                'dimension_id' => 'meditation',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101128',
                'dimension_id' => 'meditation',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101279',
                'dimension_id' => 'meditation',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101318',
                'dimension_id' => 'meditation',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101308',
                'dimension_id' => 'meditation',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101321',
                'dimension_id' => 'meditation',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101280',
                'dimension_id' => 'meditation',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101295',
                'dimension_id' => 'meditation',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-641077',
                'content_id' => '101323',
                'dimension_id' => 'meditation',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101436',
                'dimension_id' => 'meditation',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101426',
                'dimension_id' => 'meditation',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101368',
                'dimension_id' => 'meditation',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101356',
                'dimension_id' => 'meditation',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101097',
                'dimension_id' => 'meditation',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101081',
                'dimension_id' => 'meditation',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101099',
                'dimension_id' => 'meditation',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101333',
                'dimension_id' => 'meditation',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101098',
                'dimension_id' => 'meditation',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101100',
                'dimension_id' => 'meditation',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101299',
                'dimension_id' => 'meditation',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101297',
                'dimension_id' => 'meditation',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101340',
                'dimension_id' => 'meditation',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-933257',
                'content_id' => '101296',
                'dimension_id' => 'meditation',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101469',
                'dimension_id' => 'meditation',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101468',
                'dimension_id' => 'meditation',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101449',
                'dimension_id' => 'meditation',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101443',
                'dimension_id' => 'meditation',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101353',
                'dimension_id' => 'meditation',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101211',
                'dimension_id' => 'meditation',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101338',
                'dimension_id' => 'meditation',
                'category_order' => 7,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101076',
                'dimension_id' => 'meditation',
                'category_order' => 8,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101210',
                'dimension_id' => 'meditation',
                'category_order' => 9,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101308',
                'dimension_id' => 'meditation',
                'category_order' => 10,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101355',
                'dimension_id' => 'meditation',
                'category_order' => 11,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101075',
                'dimension_id' => 'meditation',
                'category_order' => 12,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101310',
                'dimension_id' => 'meditation',
                'category_order' => 13,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'meditation-873482',
                'content_id' => '101312',
                'dimension_id' => 'meditation',
                'category_order' => 14,
                'showcase_id' => null,
                'soundscape_id' => null
            ],









            [
                'category_id' => 'occupational-935694',
                'content_id' => '101325',
                'dimension_id' => 'occupational',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-935694',
                'content_id' => '101326',
                'dimension_id' => 'occupational',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-935694',
                'content_id' => '101166',
                'dimension_id' => 'occupational',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-935694',
                'content_id' => '101096',
                'dimension_id' => 'occupational',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-935694',
                'content_id' => '101089',
                'dimension_id' => 'occupational',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-935694',
                'content_id' => '101120',
                'dimension_id' => 'occupational',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-532653',
                'content_id' => '101327',
                'dimension_id' => 'occupational',
                'category_order' => 1,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-532653',
                'content_id' => '101276',
                'dimension_id' => 'occupational',
                'category_order' => 2,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-532653',
                'content_id' => '101102',
                'dimension_id' => 'occupational',
                'category_order' => 3,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-532653',
                'content_id' => '101112',
                'dimension_id' => 'occupational',
                'category_order' => 4,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-532653',
                'content_id' => '101178',
                'dimension_id' => 'occupational',
                'category_order' => 5,
                'showcase_id' => null,
                'soundscape_id' => null
            ],
            [
                'category_id' => 'occupational-532653',
                'content_id' => '101301',
                'dimension_id' => 'occupational',
                'category_order' => 6,
                'showcase_id' => null,
                'soundscape_id' => null
            ]
        ];
    }
}
