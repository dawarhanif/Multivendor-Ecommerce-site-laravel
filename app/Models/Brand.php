<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;


class Brand extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','photo','enum'];

    public function brands()
    {
        return $this->belongsTo('Brand');
    }
}
