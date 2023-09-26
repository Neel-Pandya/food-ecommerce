<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    //
    public function getMenu()
    {
        $item = DB::table('items')->where('item_status', 'Active')->get();
        return response()->json(['i' => $item]);
    }

    public function getGallery()
    {
        $gallery = DB::table('gallery')->where('status', 'Active')->get();
        return response()->json(['gallery' => $gallery]);

    }
}