<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class PatrimonioController extends Controller
{
    public function patrimonio(){
        $accounts=Account::where('type','Patrimonio')->get();
        $labels = $accounts->pluck('name')->toArray();

        $data2022 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2022);
            return $detail ? $detail->quantity : 0;
        })->toArray();
    
        $data2023 = $accounts->map(function($account) {
            $detail = $account->details->firstWhere('year', 2023);
            return $detail ? $detail->quantity : 0;
        })->toArray();

        return view('patrimonio.patrimonio',compact('accounts', 'labels', 'data2022', 'data2023'));
    }
}
