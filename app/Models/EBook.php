<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EBook extends Model
{
    use HasFactory;
    public $primarykey = 'ebook_id';
    protected $guarded = ['ebook_id'];

    public function order(){
        return $this->hasMany(Order::class,'ebook_id','ebook_id');
    }
}
