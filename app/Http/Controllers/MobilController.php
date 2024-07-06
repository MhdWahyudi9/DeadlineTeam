<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    public function index()
    {

        $mobil = Mobil::all();
        return view('Mobil.mobil', ['mobil' => $mobil]);
    }

    public function add()
    {
        $categories = Category::all();
        return view('Mobil.mobil-add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'mobil_code' => 'required|unique:mobil|max:255',
            'title' => 'required|max:255'

        ]);
        $newName = '';
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('public/gambar', $newName);
        }

        $request['gambar'] = $newName;
        $mobil = Mobil::create($request->all());
        $mobil->categories()->sync($request->categories);
        return redirect('mobil')->with('status', 'Mobil Berhasil Di Tambahkan');
    }

    public function edit($slug)
    {
        $mobil = Mobil::where('slug', $slug)->first();
        $categories = Category::all();
        return view('Mobil.mobil-edit', ['categories' => $categories, 'mobil' => $mobil]);

    }

    public function update(Request $request, $slug)
    {
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;
            $request->file('image')->storeAs('public/gambar', $newName);
            $request['public/gambar'] = $newName;
        }

        $mobil = Mobil::where('slug', $slug)->first();
        $mobil->update($request->all());

        if ($request->categories) {
            $mobil->categories()->sync($request->categories);
        }
        return redirect('mobil')->with('status', 'Mobil Berhasil Di update');
    }

    public function delete($slug)
    {
        $mobil = Mobil::where('slug', $slug)->first();
        return view('Mobil.mobil-delete', ['mobil' => $mobil]);

    }

    public function destroy($slug)
    {
        $mobil = Mobil::where('slug', $slug)->first();
        $mobil->delete();
        return redirect('mobil')->with('status', 'delete mobil Berhasil');
    }

    public function deletedMobil()
    {
        $deletedMobil = Mobil::onlyTrashed()->get();
        return view('Mobil.mobil-deleted-list', ['deletedMobil' => $deletedMobil]);
    }

    public function restore($slug)
    {
        $mobil = Mobil::withTrashed()->where('slug', $slug)->first();
        $mobil->restore();
        return redirect('mobil')->with('status', 'category restored successfully');
    }

    // public function index(Request $request)
    // {
    //     $request->session()->flush();
    // }
}
