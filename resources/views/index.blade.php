<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>商品一覧画面</title>
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <heder></header>
        <div class="wrapper">
            <div class="container">
            <h1>商品一覧画面</h1>
                <div class="search">
                <form action="{{ route('search') }}" method="get">
                    @csrf
                    <div class="form-group">
                        <input type="search" name="keyword">
                            <select name="company_id" id="company_id">
                                <option value="">選択してください</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                @endforeach
                            </select>
                        <input type="submit" class="btn white" id="search" value="検索">
                    </div>
                </div>
                </form>
                <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>在庫数</th>
                                <th>メーカー名</th>
                                <th><a href="{{route('create')}}" class="btn orange" id="create">新規登録</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img src="{{ asset($product->img_path)}}"></td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->company->company_name}}</td>
                                <td><a href="{{route('show',['id'=>$product->id])}}" class="btn aqua" id="show">詳細</a></td>
                                <td>
                                    <form action="{{ route('delete',['id'=>$product->id])}}" method="POST">
                                        @csrf
                                        <input type="submit" value="削除" class="btn red" id="delete" onClick='return confirm("本当に削除しますか？");'></td>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        <footer></footer>
        <script src="./index.js"></script>
    </body>
</html> 