<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as Database;

class UserController extends Controller
{
    //
    public function create()
    {
        $countUsers = Database::table('users')
            ->where('status', 'Active')
            ->count('id');
        $countItems = Database::table('items')
            ->where('item_status', 'Active')
            ->count('id');
        $galleryData = Database::table('gallery')->where('status', 'Active')->get();
        return view('welcome', compact('countUsers', 'countItems', 'galleryData'));
    }

    public function cart_design()
    {
        return view('blueprint.cart');
    }
}