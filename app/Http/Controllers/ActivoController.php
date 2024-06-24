<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivoController extends Controller
{
    public function corriente(){
        $accounts=Account::where('type','Activo')->where('category','Corriente')->get();
        $labels = $accounts->pluck('name')->toArray();

        $data2022 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2022);
            return $detail ? $detail->quantity : 0;
        })->toArray();
    
        $data2023 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2023);
            return $detail ? $detail->quantity : 0;
        })->toArray();

        return view('activo.corriente',compact('accounts', 'labels', 'data2022', 'data2023'));
    }
    public function no_corriente(){
        $accounts=Account::where('type','Activo')->where('category','No Corriente')->get();
        $labels = $accounts->pluck('name')->toArray();

        $data2022 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2022);
            return $detail ? $detail->quantity : 0;
        })->toArray();
    
        $data2023 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2023);
            return $detail ? $detail->quantity : 0;
        })->toArray();

        return view('activo.no_corriente',compact('accounts', 'labels', 'data2022', 'data2023'));
    }      
}
