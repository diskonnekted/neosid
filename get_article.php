<?php
define('FCPATH', __DIR__ . '/public/');
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->boot();
$a = App\Models\Artikel::first();
echo json_encode($a->getAttributes());
