<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EndeudamientoController extends Controller
{
    public function apalancamiento(){
        $activos=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Activo')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        $pasivos=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();        
        return view('ratios.endeudamiento.apalancamiento',compact('activos','pasivos'));
    }
    public function solvencia_patrimonial_largo_plazo(){
        $pasivos_no_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->where('accounts.category', 'No Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();
        $patrimonio=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Patrimonio')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get(); 
        return view('ratios.endeudamiento.solvencia',compact('pasivos_no_corrientes','patrimonio'));
    }
    public function solvencia_patrimonial(){
        $pasivos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        $pasivos_no_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->where('accounts.category', 'No Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        $patrimonio=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Patrimonio')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        return view('ratios.endeudamiento.solvencia_patrimonial',compact('pasivos_corrientes','pasivos_no_corrientes','patrimonio'));
    }
}
