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
}
