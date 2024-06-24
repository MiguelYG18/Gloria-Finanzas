<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GestionController extends Controller
{
    public function existencia(){
        $costo_venta=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Costo de Ventas')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $inventario=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Inventarios')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        return view('ratios.gestion.rotacion_inventario',compact('costo_venta','inventario'));
    }
    public function cuentas_cobrar(){
        $comerciales=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Cuentas por Cobrar Comerciales')
        ->where('accounts.type','Activo')
        ->where('accounts.category','Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $entidades=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Cuentas por Cobrar a Entidades Relacionadas')
        ->where('accounts.type','Activo')
        ->where('accounts.category','Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $otras=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Otras Cuentas por Cobrar')
        ->where('accounts.type','Activo')
        ->where('accounts.category','Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $ventas=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ingresos de Actividades Ordinarias')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        return view('ratios.gestion.rotacion_cuenta_por_cobrar',compact('ventas','comerciales','entidades','otras'));
    }
    public function cuentas_pagar(){
        $comerciales=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Cuentas por Pagar Comerciales')
        ->where('accounts.type','Pasivo')
        ->where('accounts.category','Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $entidades=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Cuentas por Pagar a Entidades Relacionadas')
        ->where('accounts.type','Pasivo')
        ->where('accounts.category','Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        $otras=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Otras Cuentas por Pagar')
        ->where('accounts.type','Pasivo')
        ->where('accounts.category','Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();

        $ventas=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Costo de Ventas')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        return view('ratios.gestion.rotacion_cuenta_por_pagar',compact('ventas','comerciales','entidades','otras'));
    }
    public function activo_fijo(){
        $ventas=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->where('accounts.name','Ingresos de Actividades Ordinarias')
        ->whereIn('details.year', [2022, 2023])
        ->select('details.year','details.quantity')
        ->get();
        
        $activos_no_corrientes=DB::table('accounts')
        ->join('details', 'accounts.id', '=', 'details.id_account')
        ->select(DB::raw('SUM(details.quantity) as total_quantity, details.year'))
        ->where('accounts.type', 'Activo')
        ->where('accounts.category', 'Corriente')
        ->whereIn('details.year', [2022, 2023])
        ->groupBy('details.year')
        ->get();

        return view('ratios.gestion.rotacion_activo_fijo',compact('ventas','activos_no_corrientes'));
    }
}
