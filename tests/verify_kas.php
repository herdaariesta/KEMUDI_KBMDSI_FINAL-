<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\TransaksiKas;
use App\Models\IuranPengurus;
use App\Models\ProgramKerja;

echo "=== VERIFIKASI DATA KAS KBMDSI ===" . PHP_EOL;
echo "Total Transaksi: " . TransaksiKas::count() . PHP_EOL;
$inflow = (float) TransaksiKas::where('jenis', 'masuk')->sum('nominal');
$outflow = (float) TransaksiKas::where('jenis', 'keluar')->sum('nominal');
$saldo = $inflow - $outflow;
echo "Total Masuk (Inflow): Rp " . number_format($inflow, 0, ',', '.') . PHP_EOL;
echo "Total Keluar (Outflow): Rp " . number_format($outflow, 0, ',', '.') . PHP_EOL;
echo "Saldo Kas Riil: Rp " . number_format($saldo, 0, ',', '.') . PHP_EOL;

echo PHP_EOL . "=== VERIFIKASI DATA IURAN PENGURUS ===" . PHP_EOL;
$totalPengurus = IuranPengurus::count();
$lunas = IuranPengurus::where('status', 'lunas')->count();
$belum = IuranPengurus::where('status', 'belum')->count();
echo "Total Pengurus: {$totalPengurus}" . PHP_EOL;
echo "Lunas: {$lunas} (" . round(($lunas / $totalPengurus) * 100) . "%)" . PHP_EOL;
echo "Belum: {$belum}" . PHP_EOL;

// Test controller invocation
echo PHP_EOL . "=== VERIFIKASI CONTROLLER & BLADE VIEW ===" . PHP_EOL;
$controller = new App\Http\Controllers\KasController();
$request = Illuminate\Http\Request::create('/kas', 'GET');
$response = $controller->index($request);
$html = $response->render();
echo "Kas view rendered successfully! Output size: " . strlen($html) . " bytes." . PHP_EOL;

// Also test Proker view
$prokerController = new App\Http\Controllers\ProgramKerjaController();
$prokerRequest = Illuminate\Http\Request::create('/proker', 'GET');
$prokerResponse = $prokerController->index($prokerRequest);
$prokerHtml = $prokerResponse->render();
echo "Proker view rendered successfully! Output size: " . strlen($prokerHtml) . " bytes." . PHP_EOL;
