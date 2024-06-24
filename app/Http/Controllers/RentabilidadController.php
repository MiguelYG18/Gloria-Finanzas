<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RentabilidadController extends Controller
{
    public function mub(){
        $utilidad_bruta=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ganancia (Pérdida) Bruta')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $ventas=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ingresos de Actividades Ordinarias')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        return view('ratios.rentabilidad.mub',compact('utilidad_bruta','ventas'));
    }
    public function mun(){
        $utilidad_neta=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ganancia (Pérdida) Neta del Ejercicio')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $ventas_netas=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ingresos de Actividades Ordinarias')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        return view('ratios.rentabilidad.mun',compact('utilidad_neta','ventas_netas'));
    }
    public function rp(){
        $utilidad_neta=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ganancia (Pérdida) Neta del Ejercicio')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();

        $activos_totales=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Activo')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();
        return view('ratios.rentabilidad.rp',compact('utilidad_neta','activos_totales'));
    }
    public function roe(){
        $utilidad_neta=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ganancia (Pérdida) Neta del Ejercicio')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();

        $patrimonio=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Patrimonio')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();
        return view('ratios.rentabilidad.roe',compact('utilidad_neta','patrimonio'));        
    }
    public function roa(){
        $utilidad_neta=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ganancia (Pérdida) Neta del Ejercicio')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();

        $activos_totales=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Activo')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();
        return view('ratios.rentabilidad.roa',compact('utilidad_neta','activos_totales'));
    }
}
