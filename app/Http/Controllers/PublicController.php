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
        if ($request->category || $request->title) {
            $mobil = Mobil::where('title', 'like', '%' . $request->title . '%')
                ->orWhereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category);
                })
                ->get();
        } else {

            $mobil = Mobil::all();
        }

        return view('mobil-list', ['mobil' => $mobil, 'categories' => $categories]);
    }
}
