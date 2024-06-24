<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiquidezController extends Controller
{
    public function corriente(){
        $activos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Activo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        $pasivos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        return view('ratios.liquidez.corriente',compact('activos_corrientes','pasivos_corrientes'));
    }
    public function acidez(){
        $activos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Activo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        $pasivos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        $inventario = DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select('details.year', 'details.quantity')
        ->where('accounts.name', 'Inventarios')
        ->where('accounts.type', 'Activo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->get();

        return view('ratios.liquidez.acidez',compact('activos_corrientes','pasivos_corrientes','inventario'));
    }
    public function efectivo(){
        $efectivo = DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select('details.year', 'details.quantity')
        ->where('accounts.name', 'Efectivo y Equivalentes al Efectivo')
        ->where('accounts.type', 'Activo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->get();

        $pasivos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();
        
        return view('ratios.liquidez.efectivo',compact('efectivo','pasivos_corrientes'));
    }
    public function capital_trabajo(){

        $activos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Activo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        $pasivos_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Pasivo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();        

        return view('ratios.liquidez.capital_trabajo',compact('activos_corrientes','pasivos_corrientes'));
    }    
}
