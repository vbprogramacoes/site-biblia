<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Category;

class SitemapsController extends Controller
{
    public function index() {
        
        return response()->view('sitemaps.index')->header('Content-Type', 'text/xml');
    }

    public function version(Request $request, $version = "") {
        ini_set('memory_limit', '1G');
        return response()->view('sitemaps.versions.' . $version)->header('Content-Type', 'text/xml');
    }

    public function compostversion(Request $request, $version = "", $book = "") {
        ini_set('memory_limit', '1G');
        return response()->view('sitemaps.compost_verses.' . $version . "_$book" . '_compost_verses')->header('Content-Type', 'text/xml');
    }

    public function versionIndex(Request $request) {
        return response()->view('sitemap_index.version')->header('Content-Type', 'text/xml');
    }

    public function versions(Request $request, $version = "") {

        $blade = "sitemap_index.versions.$version" . "_books";
        return response()->view($blade)->header('Content-Type', 'text/xml');
    }

    public function books(Request $request, $version = "", $book = "") {

        $blade = "sitemap_index.books.$version" . "_$book" . "_chapters";
        return response()->view($blade)->header('Content-Type', 'text/xml');
    }

    public function verse(Request $request, $version = "", $book = "", $chapter = "") {

        $blade = "sitemap_index.verses.$version" . "_$book" . "_$chapter";
        return response()->view($blade)->header('Content-Type', 'text/xml');
    }

    public function compostVerse(Request $request, $version = "", $book = "", $chapter = "") {

        $blade = "sitemap_index.compostverses.$version" . "_$book" . "_$chapter";
        return response()->view($blade)->header('Content-Type', 'text/xml');
    }
}
