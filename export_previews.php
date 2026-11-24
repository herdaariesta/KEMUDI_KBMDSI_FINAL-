<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$prokerController = new App\Http\Controllers\ProgramKerjaController();
$prokerRequest = Illuminate\Http\Request::create('/proker', 'GET');
$prokerHtml = $prokerController->index($prokerRequest)->render();

$kasController = new App\Http\Controllers\KasController();
$kasRequest = Illuminate\Http\Request::create('/kas', 'GET');
$kasHtml = $kasController->index($kasRequest)->render();

file_put_contents(__DIR__ . '/public/proker_preview.html', $prokerHtml);
file_put_contents(__DIR__ . '/public/kas_preview.html', $kasHtml);

$artifactDir = 'C:/Users/herda/.gemini/antigravity/brain/a8b1bcf7-7e76-4526-bdde-739a684ca334';
file_put_contents($artifactDir . '/proker_preview.html', $prokerHtml);
file_put_contents($artifactDir . '/kas_preview.html', $kasHtml);

echo "Successfully exported preview HTMLs to both public/ and artifacts directory!" . PHP_EOL;
