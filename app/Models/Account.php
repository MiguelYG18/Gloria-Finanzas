<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'type',
        'category'
    ];
    public function details(){
        return $this->hasMany(Detail::class,'id_account');
    }
}
