<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountResultRequest;
use App\Models\Account;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountResultController extends Controller
{
    public function list(){
        $accounts=Account::where('type','Resultado')->get();
        return view('resultado.account.result',compact('accounts'));
    }
    public function insert(StoreAccountResultRequest $request){
        try {
            DB::beginTransaction();
                //Verificar si se sube una imagen
                $account=new Account();
                $account->fill([
                     'name'=>$request->name,
                     'type'=>'Resultado',
                     'category'=>'NA',
                ]);
                $account->save();
            DB::commit();
       } catch (Exception $e) {
            DB::rollBack();
       }
       return redirect('/admin/result/account/list')->with('success','Cuenta Registrada');        
    }
}
