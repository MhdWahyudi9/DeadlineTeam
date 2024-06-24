<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\RentLogs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MobilRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $mobil = Mobil::all();
        return view('Rent.mobil-rent', ['users' => $users, 'mobil' => $mobil]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDays(3)->toDateString();

        // Mengambil mobil berdasarkan mobil_id dari request
        $mobil = Mobil::findOrFail($request->mobil_id);

        // Mengecek status mobil
        if ($mobil->status != 'in stock') {
            Session::flash('message', 'Mobil tidak tersedia');
            Session::flash('alert-class', 'alert-danger');
            return redirect('mobil-rent'); // Menggunakan nama rute yang benar
        } else {
            $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
                ->count();

            if ($count >= 3) {
                Session::flash('message', 'Pengguna Melewati Batas jumlah Peminjaman Mobil');
                Session::flash('alert-class', 'alert-danger');
                return redirect('mobil-rent'); // Menggunakan nama rute yang benar   
            }
            try {
                DB::beginTransaction();
                RentLogs::create($request->all());
                $mobil->status = 'stok habis';
                $mobil->save();
                DB::commit();
                Session::flash('message', 'Rent mobil berhasil');
                Session::flash('alert-class', 'alert-success');
                return redirect('mobil-rent'); // Menggunakan nama rute yang benar
            } catch (\Throwable $th) {
                DB::rollBack();
                Session::flash('message', 'Terjadi kesalahan saat proses penyewaan');
                Session::flash('alert-class', 'alert-danger');
                return redirect('mobil-rent'); // Menggunakan nama rute yang benar
            }


        }
    }

    public function returnMobil()
    {
        $users = User::where('id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $mobil = Mobil::all();
        return view('Return.return-mobil', ['users' => $users, 'mobil' => $mobil]);
    }
    public function saveReturnMobil(Request $request)
    {
        //user dan mobil yang dipilih untuk dikembalikan benar, maka berhasil dikembalikan
        //user dan mobil yang dipilih salah, maka akan muncul error
        $rent = RentLogs::where('user_id', $request->user_id)->where('mobil_id', $request->mobil_id)->where('actual_return_date', null);
        $rentData = $rent->first();
        $countData = $rent->count();

        if ($countData == 1) {
            //pengembalian mobil
            $rentData->actual_return_date = Carbon::now()->toDateString();
            $rentData->save();

            Session::flash('message', 'Mobil berhasil dikambalikan');
            Session::flash('alert-class', 'alert-success');
            return redirect('mobil-return'); // Menggunakan nama rute yang benar   
        } else {
            Session::flash('message', 'Terdapat kesalahan dalam Pengembalian Mobil');
            Session::flash('alert-class', 'alert-danger');
            return redirect('mobil-return'); // Menggunakan nama rute yang benar   
        }
    }
}
