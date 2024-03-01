<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\sale;
use App\Models\company;

class Product extends Model
{
    
    public function getList() {
        // productsテーブルからデータを取得
        $products = DB::table('products')->get();

        return $products;
    }  

    public function createProduct($data,$image_path){

        DB::table('products')->insert([
            'product_name'=>$data->input('product_name'),
            'company_id'=>$data->input('company_name'),
            'price'=>$data->input('price'),
            'stock'=>$data->input('stock'),
            'comment'=>$data->input('comment'),
            'img_path'=>$image_path
        ]);
       
    }

    public function updateProduct($request,$id,$image_path){

        DB::table('products')->where('id',$id)->update([
            'product_name'=>$request->product_name,
            'company_id'=>$request->company_name,
            'price'=>$request->price,
            'stock'=>$request->stock,
            'comment'=>$request->comment,
            'img_path'=>$image_path
        ]);

    }
    
    public function sales(){
        return $this->hasMany(Sale::class,'product_id','id');
        
    }

    public function company(){
        return $this->belongsTo(Company::class,'company_id','id');

    }

   
}

