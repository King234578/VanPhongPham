<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    // use HasFactory;
    protected $table = "bills";
    protected $fillable = [
        'id',
        'id_customer',
        'date_order',
        'total',
        'payment',
        'note'

    ];
    public function bill_detail(){
        return $this->hasMany('app\BillDetail','id_bill','id');
    }

    public function customer(){
        return $this->belongsTo('app\Customer','id_bill','id');
    }
}
