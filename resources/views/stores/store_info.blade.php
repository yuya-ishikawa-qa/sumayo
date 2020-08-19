@extends('layouts.app')

@section('content')

  @if (session('flash_message'))
    <div class="text-center alert alert-success">
        {{ session('flash_message') }}
    </div>
  @endif

  <div class="container">
    <div class="text-center pt-2 mb-4">
      <h2>1.店舗情報</h2>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        店舗名 :　{{ $store->name }}
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        電話番号 :　{{ $store->phone }}
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        郵便番号 :　{{ $store->postcode }}
      </div>
    </div>

    <div class="row justify-content-center">
          <span>住所：　</span><p id="address">{{ $store->address }}</p> <!-- 住所 -->
    </div>

    <!-- Google Map 表示 -->
    <div class="row justify-content-center mb-4">
      <div class="col mr-2 ml-2" id="map" style="width:100%; height:300px"></div>
    </div>
      
    <div class="col text-center">
        店舗情報コメント
    </div> 
    <div class="text-center ml-3 mr-3 mb-4">
        {{ $store->comment }}
    </div>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!-- Google Map API script    -->
    <script> 
      function initMap() {
        //地図を表示する領域の div 要素のオブジェクトを変数に代入
        var target = document.getElementById('map');  
        //HTMLに記載されている住所の取得
        var address = document.getElementById('address').textContent; 
        //ジオコーディングのインスタンスの生成
        var geocoder = new google.maps.Geocoder();  
        
        //geocoder.geocode() にアドレスを渡して、コールバック関数を記述して処理
        geocoder.geocode({ 'address': address }, function(results, status){
        //ステータスが OK で results[0] が存在すれば、地図を生成
          if (status === 'OK' && results[0]){  
              new google.maps.Map(target, {
              //results[0].geometry.location に緯度・経度のオブジェクトが入っている
              center: results[0].geometry.location,
              zoom: 14
              });

              //マーカーの生成
              var marker = new google.maps.Marker({
                map: map,
                // position: map.getCenter(),
                position: results[0].geometry.location,
                // animation: google.maps.Animation.DROP
              });
            
            //  //情報ウィンドウの生成
            //   var infoWindow = new google.maps.InfoWindow({
            //     content: 'スマヨレストラン',
            //     pixelOffset: new google.maps.Size(0, 5)
            //   });
      
            //  //マーカーにリスナーを設定
            //  marker.addListener('click', function(){
            //     infoWindow.open(map, marker);
            //   });
          }else{ 
          //ステータスが OK 以外の場合や results[0] が存在しなければ、アラートを表示して処理を中断
            alert('失敗しました。理由: ' + status);
            return;
          }
        });
      }
    </script> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZKrkayq5cqxe3tx3NqyoaDmWuW7YMkRg&callback=initMap" async defer></script>


    <div class="row justify-content-center mb-5">
      <a class="btn btn-primary text-center mr-2" href="{{ route('storeInfo.edit', ['id' => $store->id ]) }}">編集画面</a>
      <a class="btn btn-secondary text-center" href="{{ url('/stores') }}">戻る</a>
    </div>
  </div>

@endsection