<?php
define('FCPATH', __DIR__ . '/public/');
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->boot();

// Instead of using Eloquent directly, we can check DB table if model not bound
$k = \DB::table('kategori')->get();
echo "Categories:\n";
foreach ($k as $cat) {
    echo "ID: " . $cat->id . " - " . $cat->kategori . "\n";
}

$a = \DB::table('artikel')->orderBy('id', 'desc')->take(10)->get();
echo "\nArticles:\n";
foreach ($a as $art) {
    echo "ID: " . $art->id . " - Judul: " . $art->judul . " - Kategori: " . $art->id_kategori . " - Enabled: " . $art->enabled . "\n";
}
