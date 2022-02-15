<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $primarykey = 'order_id';
    protected $guarded = ['order_id'];

    public function account(){
        return $this->belongsTo(Account::class,'account_id','id');
    }

    public function ebook(){
        return $this->belongsTo(EBook::class,'ebook_id','ebook_id');
    }

}
