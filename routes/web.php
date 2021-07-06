<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::match(["GET", "POST"], "/home", function () {
//     if (!empty($_POST)) {
//         $img = $_POST['image'];
//         $folderPath = public_path() . '/upload/';

//         $image_parts = explode(';base64,', $img);
//         $image_type_aux = explode('image/', $image_parts[0]);
//         $image_type = $image_type_aux[1];

//         $image_base64 = base64_decode($image_parts[1]);
//         $fileName = uniqid() . '.png';

//         $file = $folderPath . $fileName;
//         file_put_contents($file, $image_base64);

//         print_r($fileName);
//     }
//     return view("home");
// });

Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';
