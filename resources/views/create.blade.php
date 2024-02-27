<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>商品新規登録</title>
        <link rel="stylesheet" href="create.css">
    </head>
    <body>
        <header>

        </header>
        <div class="top-wrapper">
            <div class="container">
                <h1>商品新規登録</h1>
            <form class="edit-form" action="{{route('submit')}}" method="post" enctype='multipart/form-data'>
                @csrf
                <div class="form-group">
                    <label for="create_name">商品名<sup class="asterisk">&#42;</sup></label>
                    <input type="text" name="product_name" id="create_name">
                    @if($errors->has('product_name'))
                    <p>{{$errors->first('product_name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                <label for="company_name">メーカー名<sup class="asterisk">&#42;</sup></label>
                
                        <select name="company_name" id="company_name">
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                            @endforeach
                        </select>
                    
                     @if($errors->has('company_name'))
                    <p>{{$errors->first('company_name')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="price">価格<sup class="asterisk">&#42;</sup></label>
                    <input type="text" name="price" id="price">
                    @if($errors->has('price'))
                    <p>{{$errors->first('price')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="stock">在庫数<sup class="asterisk">&#42;</sup></label>
                    <input type="text" name="stock" id="stock">
                    @if($errors->has('stock'))
                    <p>{{$errors->first('stock')}}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea name="comment" id="comment"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">商品画像</lebal>
                    <input type="file" name="image" id="image">
                </div>
                <div class="btn-wrapper">
                    <input type="submit" value="新規登録" class="btn orange" id="create">
                    <input type="button" value="戻る" class="btn aqua" id="return">
                </div>
            </form>
            </div>
        </div>
        <footer>

        </footer>
        <script src="./create.js"></script>
    </body>
</html>