<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Models\Account;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function list(){
        $accounts=Account::all();
        return view('admin.account.list',compact('accounts'));
    }
    public function add(){
        return view('admin.account.created');
    }
    public function insert(StoreAccountRequest $request){
        try {
            DB::beginTransaction();
                //Verificar si se sube una imagen
                $account=new Account();
                $account->fill([
                     'name'=>$request->name,
                     'type'=>$request->type,
                     'category'=>$request->category,
                ]);
                $account->save();
            DB::commit();
       } catch (Exception $e) {
            DB::rollBack();
       }
       return redirect('admin/account/list')->with('success','Cuenta Registrada');        
    }
}
