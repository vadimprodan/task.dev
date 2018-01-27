<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $items = Classroom::get();

        return view('index', compact('items'));
    }

    public function classroom($id)
    {
        $item = Classroom::findOrFail($id);

        return view('class', compact('item'));
    }
}
