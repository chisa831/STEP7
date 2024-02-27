<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\product;

class company extends Model
{
    use HasFactory;

    public function products(){
        return $this->hasMany(Product::class,'company_id','id');
        
    }
}
