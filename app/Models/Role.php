<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public $primarykey = 'role_id';
    protected $guarded = ['role_id'];

    public function account(){
        return $this->hasMany(Account::class,'account_id','id');
    }
}
