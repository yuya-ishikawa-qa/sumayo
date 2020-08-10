@extends('layouts.app')
@section('content')

<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}
  </li>
  @endforeach
</ul>
@endif

<div class="container">
<a href="{{ url('/stores')}}">TOP画面へ</a>
  <form action="/items/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
      <table class="table">
        <tbody>
          <tr>
            <th scope="row ">商品名
              <br>＊必須
            </th>
            <td>
              <input name="item_name" class="form-control" type="text" value="{{old('item_name')}}">
            </td>
          </tr>
          <tr>
            <th scope="row ">画像
              <br>＊必須
            </th>
            <td>
              <input type="file" name="path" value="{{old('path')}}"/>
            </td>
          </tr>
          <tr>
            <th scope="row ">商品カテゴリー
            </th>
            <td>
              <select class="form-control" name="item_category_id">
                <option value="0">選択しない
                </option>
                <option value="1">おすすめ
                </option>
                <option value="2">単品
                </option>
                <option value="3">その他
                </option>
                <option value="4">ドリンク
                </option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row ">商品説明
              <br>＊必須
            </th>
            <td>
              <textarea name="description" class="form-control">{{old('description')}}
              </textarea>
            </td>
          </tr>
          <tr>
            <th scope="row ">販売状況
            </th>
            <td>
              <select class="form-control" name="is_selling">
                <option value="0">販売中
                </option>
                <option value="1">停止中
                </option>
              </select>
            </td>
          </tr>
          <tr>
            <th scope="row ">価格 (円)
              <br>＊必須
            </th>
            <td>
              <input name="price"  class="form-control" type="text" value="{{old('price')}}">
            </td>
          </tr>
          <tr>
            <th scope="row ">消費税 (％)
            </th>
            <td>
              <input name="tax"  class="form-control" type="text" value="10">
            </td>
          </tr>
          <tr>
            <th scope="row ">在庫数
              <br>＊必須
            </th>
            <td>
              <label>
                <input type="radio" name="entryPlan" value="hoge1" onclick="entryChange1();" checked="checked" />一括　　
              </label>
              <label>
                <input type="radio" name="entryPlan" value="hoge2" onclick="entryChange1();" />曜日指定
              </label>
              <input name="stock_all" class="form-control" type="text" id="firstBox" value="{{old('stock_all')}}">
            </td>
          </tr>

          <!-- 表示非表示切り替え -->
          <tr id="secondBox">
            <th scope="row ">月曜日
            </th>
            <td>
              <input name="stock_monday"  class="form-control" type="text" value="0" >
            </td>
          </tr>
          <tr id="thirdBox">
            <th scope="row ">火曜日
            </th>
            <td>
              <input name="stock_tuesday"  class="form-control" type="text" value="0">
            </td>
          </tr>
          <tr id="fourthBox">
            <th scope="row ">水曜日
            </th>
            <td>
              <input name="stock_wednesday"  class="form-control" type="text" value="0">
            </td>
          </tr>
          <tr id="fifthBox">
            <th scope="row ">木曜日
            </th>
            <td>
              <input name="stock_thursday"  class="form-control" type="text" value="0">
            </td>
          </tr>
          <tr id="sixthBox">
            <th scope="row ">金曜日
            </th>
            <td>
              <input name="stock_friday"  class="form-control" type="text" value="0">
            </td>
          </tr>
          <tr id="seventhBox">
            <th scope="row ">土曜日
            </th>
            <td>
              <input name="stock_saturday"  class="form-control" type="text" value="0">
            </td>
          </tr>
          <tr id="eighthBox">
            <th scope="row ">日曜日
            </th>
            <td>
              <input name="stock_sunday"  class="form-control" type="text" value="0">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row justify-content-center">
      <button class="btn btn-secondary rounded-pill btn-lg col-5">登録
      </button>
    </div>
  </form>

{{--  コンフリクト防止のため後でlayouts.appに追加  --}}
  <script type="text/javascript">
    function entryChange1(){
      radio = document.getElementsByName('entryPlan') 
      if(radio[0].checked) {
        //フォーム
        document.getElementById('firstBox').style.display = "";
        document.getElementById('secondBox').style.display = "none";
        document.getElementById('thirdBox').style.display = "none";
        document.getElementById('fourthBox').style.display = "none";
        document.getElementById('fifthBox').style.display = "none";
        document.getElementById('sixthBox').style.display = "none";
        document.getElementById('seventhBox').style.display = "none";
        document.getElementById('eighthBox').style.display = "none";
        document.getElementById('firstNotice').style.display = "";
      }
      else if(radio[1].checked) {
        //フォーム
        document.getElementById('firstBox').style.display = "none";
        document.getElementById('secondBox').style.display = "";
        document.getElementById('thirdBox').style.display = "";
        document.getElementById('fourthBox').style.display = "";
        document.getElementById('fifthBox').style.display = "";
        document.getElementById('sixthBox').style.display = "";
        document.getElementById('seventhBox').style.display = "";
        document.getElementById('eighthBox').style.display = "";
      }
    }
    //オンロードさせ、リロード時に選択を保持
    window.onload = entryChange1;
  </script>
  @endsection
