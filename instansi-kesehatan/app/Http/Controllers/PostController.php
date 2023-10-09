<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master_Jenis_Kelamin;

class PostController extends Controller
{
    public function index()
    {
        return view('home', [
            "title" => "Dashboard",
        ]);
    }
}
