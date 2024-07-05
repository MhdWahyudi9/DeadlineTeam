<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mobil;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $mobil = Mobil::query();

        if ($request->category) {
            $mobil = $mobil->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        if ($request->title) {
            $mobil = $mobil->where('title', 'like', '%' . $request->title . '%');
        }

        $mobil = $mobil->get();

        return view('mobil-list', ['mobil' => $mobil, 'categories' => $categories]);
    }
}


