<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\sale;

class ProductController extends Controller
{

    public function showList(){
        
        //インスタンス生成
        $model = new Product();
        $products = $model->getList();

        return view('index',['products' => $products]);
    }

    public function home() {

        $products = Product::all();
        $companies = Company::all();
        
       return view('index',compact('products','companies'));
    }

    public function search(Request $request) {

        //キーワード検索処理
        $keyword=$request->input('keyword');
        $company_id=$request->input('company_id');

        $companies=Company::all();

        $query=Product::query();

        if(!empty($keyword)){
            $query->where('product_name','LIKE','%'. $keyword. '%');
        }
        if(!empty($company_id)){
            $query->where('company_id','=',$company_id);
        }

        $products=$query->get();

       return view('index',compact('products','companies'));
    }


    public function create() {

        $companies = Company::all();

        return view('create',compact('companies'));
    }

    public function show($id) {

        $products=Product::find($id);

        return view('show',compact('products'));
    }

    public function edit($id) {

        $products=Product::find($id);
        $companies=Company::all();

        return view('edit',compact('products','companies'));
    }

    public function update(ProductRequest $request,$id){
        
        $image=$request->file('img');

        $file_name=$image->getClientOriginalName();
        
        $image->storeAs('public/images',$file_name);

        $image_path='storage/images/'.$file_name;

        DB::beginTransaction();

        try{
            
            $model=new Product();
            $model->updateProduct($request,$id,$image_path);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            
        }

        return redirect()->route('edit',['id'=>$id]);

    }

    


    public function createSubmit(Request $request){
        
        $image=$request->file('image');

        $file_name=$image->getClientOriginalName();
        
        $image->storeAs('public/images',$file_name);

        $image_path='storage/images/'.$file_name;
        

        //トランザクション開始
        DB::beginTransaction();

        try{
            //登録処理呼び出し
            $model=new Product();
            $model->createProduct($request,$image_path);
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }

        
        //処理が完了したらregistにリダイレクト
        return redirect(route('create'));

        
    }

    public function delete($id){
        $products=Product::find($id);
        $products->delete();
        return redirect()->route('home');
    }


    
}

