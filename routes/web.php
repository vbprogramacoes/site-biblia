<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SitemapsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\VerseController;
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

/*
|--------------------------------------------------------------------------
| Sitemaps
|--------------------------------------------------------------------------
*/
Route::get('/sitemap-index.xml', [SitemapsController::class, 'index']);
Route::get('/sitemap-{version}-{book}-compost-verses.xml', [SitemapsController::class, 'compostversion']);
Route::get('/sitemap-{version}.xml', [SitemapsController::class, 'version']);

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/{version}', [HomeController::class, 'version']);

/*
|--------------------------------------------------------------------------
| BOOK
|--------------------------------------------------------------------------
|
| Route for books of the version
|
*/
Route::get('/{version}/{book}', [BookController::class, 'index']);

/*
|--------------------------------------------------------------------------
| CHAPTER
|--------------------------------------------------------------------------
|
| Route for books of the version
|
*/

Route::get('/{version}/{book}/{chapter}', [ChapterController::class, 'index']);


/*
|--------------------------------------------------------------------------
| VERSES
|--------------------------------------------------------------------------
|
| Route for books of the version
|
*/
Route::get('/{version}/{book}/{chapter}/{verse}', [VerseController::class, 'index']);
Route::get('/{version}/{book}/{chapter}/{verse}/{versecompost}', [VerseController::class, 'versescompost']);

/*
|--------------------------------------------------------------------------
| 404 Page Not Found
|--------------------------------------------------------------------------
*/

Route::get('/{path}', function () {
    return view('404');
});

