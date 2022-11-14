<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    // use HasFactory;
    protected $table = "type_products";
    public function product(){
        return $this->hasMany('app\Product', 'id_type', 'id');
        // loại sản phẩm sẽ có nhiều sản phẩm 
        // nên dùng return $this->hasMany(), và truyền vào 3 tham số
        // tham số thứ nhất là bảng Product liên kết đến ProductType
        // tham số thứ hai là khóa ngoại của bảng Product
        // tham số thứ ba là khóa chính của bảng ProductType
    }
}
