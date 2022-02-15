<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $primarykey = 'id';
    protected $guarded = [ 'id' ];
    protected $hidden = [
        'password'
    ];
    public function role(){
        return $this->belongsTo(Role::class,'role_id','role_id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id','gender_id');
    }

    public function order(){
        return $this->hasMany(Order::class,'id','id');
    }
    
}
