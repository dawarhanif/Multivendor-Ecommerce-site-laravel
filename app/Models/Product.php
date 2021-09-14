<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','description','photo','stock','price','offer_price','discount','conditions','status','vendor_id','category_id','child_category_id','size','brand_id'];
    public function related_products(){
        return $this->hasMany('App\Models\Product','category_id','category_id')->where('status','active')->limit('9');
    }
    public static function getProductByCart($id)
    {
        return self :: where('id',$id)->get()->toArray();
    }
}

