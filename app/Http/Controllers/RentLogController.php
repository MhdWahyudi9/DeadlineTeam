<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    public function index()
    {
        // $request->session()->flush();

        $rentlogs = RentLogs::with(['user', 'mobil'])->get();
        return view('Rent.rentlog', ['rent_logs' => $rentlogs]);
    }
}
