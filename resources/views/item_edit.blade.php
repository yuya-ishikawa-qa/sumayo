@extends('layouts.app')
@section('content')

<div class="container">
    <a href="{{ url('/stores')}}"><button class="btn btn-secondary btn-sm mb-2">戻る</button></a>
    <h2 class="text-center mt-2">商品情報編集
    </h2>
    <form action="/items/update/{{$item->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <table class="table">
        <tbody>
            <tr>
            <th scope="row">商品名
                <br>＊必須
            </th>
            <td>
                <input name="item_name" class="form-control" type="text" value="{{$item->item_name}}">
                @if($errors->has('item_name'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('item_name') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
            </tr>
            <tr>
            <th scope="row">画像
                <br>＊必須
            </th>
            <td>
            <img src=
            @if ( $item->path == null) "/storage/items/no_image.png" @else "/storage/items/{{$item->path}}" @endif class="img-fluid" alt="items_list_image" id="items_list_image" >
            </div>
            <input type="file" name="path" value="{{old('path')}}"/>
            @if($errors->has('path'))
                <div>
                    <span class="text-danger">
                    <strong>{{ $errors->first('path') }}</strong>
                    </span>
                </div>
            @endif
            </td>
            </tr>
            <tr>
            <th scope="row">商品カテゴリー
            </th>
            <td>
                <select class="form-control" name="item_category_id">
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
            <th scope="row">商品説明
                <br>＊必須
            </th>
            <td>
                <textarea name="description" class="form-control">{{$item->description}}
                </textarea>
                @if($errors->has('description'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
            </tr>
            <tr>
            <th scope="row">販売状況
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
            <th scope="row">価格 (円)
                <br>＊必須
            </th>
            <td>
                <input name="price"  class="form-control" type="text" value="{{$item->price}}">
                @if($errors->has('price'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('price') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
            </tr>
            <tr>
            <th scope="row">消費税 (％)
            </th>
            <td>
                <input name="tax"  class="form-control" type="text" value="{{$item->tax}}">
                @if($errors->has('tax'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('tax') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
            </tr>
            <tr>
            <th scope="row ">在庫数<br>*必須
            </th>
            <td>
              <label>
                <input type="radio" name="entryPlan" value="hoge1" onclick="entryChange1();"/>一括　　
              </label>
              <label>
                <input type="radio" name="entryPlan" value="hoge2" onclick="entryChange1();"  checked="checked" />曜日指定
              </label>
              <div id="firstBox">
              <input name="stock_all" class="form-control text1" type="text" id="test1" value="{{$item->stock_all}}">
              @if($errors->has('stock_monday') ||
                 $errors->has('stock_tuesday') ||
                 $errors->has('stock_wednesday') ||
                 $errors->has('stock_thursday') ||
                 $errors->has('stock_friday') ||
                 $errors->has('stock_saturday') ||
                 $errors->has('stock_sunday'))
                    <div>
                        <span class="text-danger">
                        <strong>在庫数は数量(半角)を入力してください</strong>
                        </span>
                    </div>
                @endif
              </div>
            </td>
          </tr>

          <!-- 表示非表示切り替え -->
          <tr id="secondBox">
            <th scope="row ">月曜日<br>*必須
            </th>
            <td>
              <input name="stock_monday"  class="form-control text2" type="text" id="test2" value="{{$item->stock_monday}}" >
              @if($errors->has('stock_monday'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('stock_monday') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
          </tr>
          <tr id="thirdBox">
            <th scope="row ">火曜日<br>*必須
            </th>
            <td>
              <input name="stock_tuesday"  class="form-control text2" type="text" id="test3" value="{{$item->stock_tuesday}}">
               @if($errors->has('stock_tuesday'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('stock_tuesday') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
          </tr>
          <tr id="fourthBox">
            <th scope="row ">水曜日<br>*必須
            </th>
            <td>
              <input name="stock_wednesday"  class="form-control" type="text" id="test4" value="{{$item->stock_wednesday}}">
              @if($errors->has('stock_wednesday'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('stock_wednesday') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
          </tr>
          <tr id="fifthBox">
            <th scope="row ">木曜日<br>*必須
            </th>
            <td>
              <input name="stock_thursday"  class="form-control" type="text" id="test5" value="{{$item->stock_thursday}}">
              @if($errors->has('stock_thursday'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('stock_thursday') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
          </tr>
          <tr id="sixthBox">
            <th scope="row ">金曜日<br>*必須
            </th>
            <td>
              <input name="stock_friday"  class="form-control" type="text" id="test6" value="{{$item->stock_friday}}">
              @if($errors->has('stock_friday'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('stock_friday') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
          </tr>
          <tr id="seventhBox">
            <th scope="row ">土曜日<br>*必須
            </th>
            <td>
              <input name="stock_saturday"  class="form-control" type="text" id="test7" value="{{$item->stock_saturday}}">
              @if($errors->has('stock_saturday'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('stock_saturday') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
          </tr>
          <tr id="eighthBox">
            <th scope="row ">日曜日<br>*必須
            </th>
            <td>
              <input name="stock_sunday"  class="form-control" type="text" id="test8" value="{{$item->stock_sunday}}">
              @if($errors->has('stock_sunday'))
                    <div>
                        <span class="text-danger">
                        <strong>{{ $errors->first('stock_sunday') }}</strong>
                        </span>
                    </div>
                @endif
            </td>
          </tr>
          <tr id="nineBox">
            <th scope="row ">
            </th>
            <td>
              *定休日の場合は0と入力してください
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row justify-content-center">
        <button class="btn btn-primary rounded-pill btn-lg col-5">登録
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
        document.getElementById('nineBox').style.display = "none";
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
        document.getElementById('nineBox').style.display = "";
        }
    }
    //オンロードさせ、リロード時に選択を保持
    window.onload = entryChange1;

    $(function(){
        var $test1 = $('#test1');
        var $test2 = $('#test2');
        var $test3 = $('#test3');
        var $test4 = $('#test4');
        var $test5 = $('#test5');
        var $test6 = $('#test6');
        var $test7 = $('#test7');
        var $test8 = $('#test8');

        $test1.on('keyup change',function(){
            $test2.val($test1.val());
            $test3.val($test1.val());
            $test4.val($test1.val());
            $test5.val($test1.val());
            $test6.val($test1.val());
            $test7.val($test1.val());
            $test8.val($test1.val());
        })
    });

    </script>
    @endsection
