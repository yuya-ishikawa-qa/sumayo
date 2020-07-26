<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sumayo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        {{--  Bootstrap  --}}
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    </head>
        <style>
        a {
           text-decoration: none;
            color: #555;
          }

        img {
            width: 35px;
            height: auto;
        }
        </style>



    <body>
            ヘッダーあとで追加＠include("commons.header")

戻るボタン？ 

{{--  ボタン  --}}
<div class="container">
    <div class="row justify-content-center">
        <a class="btn btn-secondary rounded-pill btn-lg col-10 mt-3" href="#" role="button">商品登録</a>
        <a class="btn btn-secondary rounded-pill btn-lg col-10 mt-3" href="#" role="button">カテゴリー名変更</a>
    </div>
<p class="col-12 text-center mt-3 mb-0">商品一覧</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">写真</th>
      <th scope="col">商品名</th>
      <th scope="col">価格</th>
      <th scope="col">販売<br>状況</th>
      <th scope="col">詳細</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td><a href="">詳細</a></td>
      {{--  リンク加える  --}}
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
    <tr>
      <th scope="row"><img src="image/food_image/1678376_s.jpg" class="img-fluid" alt="Responsive image"></th>
      <td>ナポリタン</td>
      <td>&yen;700</td>
      <td>販売中</td>
      <td>詳細</td>
    </tr>
  </tbody>
</table>












</div>




            フッターあとで追加＠include("commons.footer")


    </body>
</html>
