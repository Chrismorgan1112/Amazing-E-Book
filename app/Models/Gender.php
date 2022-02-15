<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    public $primarykey = 'gender_id';
    protected $guarded = ['gender_id'];

    public function account(){
        return $this->hasMany(Account::class,'account_id','id');
    }
}
