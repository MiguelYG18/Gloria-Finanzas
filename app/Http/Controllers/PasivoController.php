<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class PasivoController extends Controller
{
    public function corriente(){
        $accounts=Account::where('type','Pasivo')->where('category','Corriente')->get();
        $labels = $accounts->pluck('name')->toArray();

        $data2022 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2022);
            return $detail ? $detail->quantity : 0;
        })->toArray();
    
        $data2023 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2023);
            return $detail ? $detail->quantity : 0;
        })->toArray();

        return view('pasivo.corriente',compact('accounts', 'labels', 'data2022', 'data2023'));
    }
    public function no_corriente(){
        $accounts=Account::where('type','Pasivo')->where('category','No Corriente')->get();
        $labels = $accounts->pluck('name')->toArray();

        $data2022 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2022);
            return $detail ? $detail->quantity : 0;
        })->toArray();
    
        $data2023 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2023);
            return $detail ? $detail->quantity : 0;
        })->toArray();

        return view('pasivo.no_corriente',compact('accounts', 'labels', 'data2022', 'data2023'));
    } 
}
