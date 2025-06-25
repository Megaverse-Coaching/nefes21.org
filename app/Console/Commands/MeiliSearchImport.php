<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MeiliSearch\Client;
use App\Models\Content;

class MeiliSearchImport extends Command
{
    protected $signature = 'meilisearch:import';

    protected $description = 'Import data to MeiliSearch';

    public function handle()
    {
        $client = new Client('http://vmi1589038.contaboserver.net:32768');
        $index = $client->index('contents_index');

        $contents = Content::all();

        $documents = [];

        foreach ($contents as $content) {
            $documents[] = $content->toArray();
        }

        $index->addDocuments($documents);

        $this->info('Data imported to MeiliSearch successfully!');
    }
}
