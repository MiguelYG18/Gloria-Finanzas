<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailResultRequest;
use App\Models\Account;
use App\Models\Detail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailResultController extends Controller
{
    public function add(){
        $accounts=Account::where('type','Resultado')->get();
        return view('resultado.detail.created',compact('accounts'));
    }
    public function insert(StoreDetailResultRequest $request){
        try {
            DB::beginTransaction();
                $detail=new Detail();
                $detail->fill([
                     'id_account'=>$request->id_account,
                     'quantity'=>$request->quantity,
                     'year'=>$request->year,
                ]);
                $detail->save();
            DB::commit();            
        } catch (Exception $e) {
            DB::rollBack();
        }
        return redirect('/admin/result/detail/add')->with('success','Detalles de la cuenta registrado');    
    }
}
