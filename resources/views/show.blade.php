<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>商品情報詳細画面</title>
        <link rel="stylesheet" href="show.css">
    </head>
    <body>
        <header>
        
        </header>
        <div class="top-wrapper">
            <div class="container">
                <h1>商品情報詳細</h1>
            <form class="edit-form" method="POST" action="route('edit')" enctype="multipart/form-data">
                @csrf
                
        <table>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>{{$products->id}}</td>
                </tr>
                <tr>
                    <td>商品画像</td>
                    <td><img src="{{ asset($products->img_path)}}"></td>
                </tr>
                <tr>
                    <td>商品名</td>
                    <td>{{$products->product_name}}</td>
                </tr>
                <tr>
                    <td>メーカー名</td>
                    <td>{{$products->company->company_name}}</td>
                </tr>
                <tr>
                    <td>価格</td>
                    <td>{{$products->price}}<td>
                </tr>
                <tr>
                    <td>在庫数</td>
                    <td>{{$products->stock}}</td>
                </tr>
                <tr>
                    <td>コメント</td>
                    <td>{{$products->comment}}</td>
                </tr>
            </tbody>
        </table>
                
                <div class="btn-wrapper">
                    <a href="{{route('edit',['id'=>$products->id])}}" class="btn orange" id="edit">編集</a>
                    <input type="button" onclick="location.href='../home'" value="戻る" class="btn aqua" id="return">
                </div>
            </form>
            </div>
        </div>
        <footer>

        </footer>
        <script src="show.js"></script>
    </body>
</html>