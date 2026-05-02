<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestRawCommand extends Command
{
    protected $signature = 'opensid:test-raw';
    protected $description = 'Test raw DB queries';

    public function handle()
    {
        $out = "Starting query...\n";
        try {
            $categories = DB::select("SELECT id, kategori FROM kategori");
            foreach ($categories as $cat) {
                $out .= "Category ID: " . $cat->id . " - Name: " . $cat->kategori . "\n";
            }

            $articles = DB::select("SELECT id, judul, id_kategori, enabled FROM artikel ORDER BY id DESC LIMIT 10");
            foreach ($articles as $art) {
                $out .= "Article ID: " . $art->id . " - Title: " . $art->judul . " - Cat: " . $art->id_kategori . " - Enabled: " . $art->enabled . "\n";
            }
        } catch (\Exception $e) {
            $out .= "Error: " . $e->getMessage() . "\n";
        }
        file_put_contents('D:/xampp/htdocs/temaopensid/query_out.txt', $out);
        $this->info('Done!');
    }
}
