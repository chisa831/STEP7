<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>商品情報編集</title>
        <link rel="stylesheet" href="edit.css">
    </head>
    <body>
        <header>

        </header>
        <div class="top-wrapper">
            <div class="container">
                <h1>商品情報編集</h1>
            <form class="edit-form" method="POST" action="update" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="id">id</label>
                    <th>{{$products->id}}</th>
                </div>
                <div class="form-group">
                    <label for="create_name">商品名<sup class="asterisk">&#42;</sup></label>
                    <input type="text" name="product_name" id="create_name" value="{{ old('product_name',$products->product_name) }}">
                    @if($errors->has('product_name'))
                    <p>{{$errors->first('product_name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="company_name">メーカー名<sup class="asterisk">&#42;</sup></label>
                    <select name="company_name" id="company_name">
                        @foreach($companies as $company)
                        <option value="{{$company->id}}" @if(old($products->company->company_name) === $products->company_name) selected @endif>{{$products->company->company_name}}</option>
                        @endforeach
                     </select>
                      @if($errors->has('company_name'))
                    <p>{{$errors->first('company_name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">価格<sup class="asterisk">&#42;</sup></label>
                    <input type="text" name="price" id="price" value="{{ old('price',$products->price) }}">
                    @if($errors->has('price'))
                    <p>{{$errors->first('price')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="stock">在庫数<sup class="asterisk">&#42;</sup></label>
                    <input type="text" name="stock" id="stock" value="{{ old('stock',$products->stock) }}">
                    @if($errors->has('stock'))
                    <p>{{$errors->first('stock')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea name="comment" id="comment">{{ old('comment',$products->comment) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="img">商品画像</lebal>
                    <input type="file" name="img" id="img" value="{{ asset($products->img_path)}}" >
                </div>
                <div class="btn-wrapper">
                    <input type="submit" value="更新" class="btn orange" id="update">
                    <a href="{{route('show',['id'=>$products->id])}}"  class="btn aqua" id="return">戻る</a>
                </div>
            </form>
            </div>
        </div>
        <footer></footer>
        <script src="edit.js"></script>
    </body>
</html>