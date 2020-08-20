@extends('layouts.app')

@section('content')

  @if (session('flash_message'))
    <div class="text-center alert alert-success">
        {{ session('flash_message') }}
    </div>
  @endif

  <div class="container">
    <div class="text-center pt-2 mb-4">
      <h2>店舗情報</h2>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        店舗名 :　<strong>{{ $store->name }}</strong>
      </div>
    </div>

    <div class="row text-center mb-4">
      <div class="col">
        電話番号 :　<strong>{{ $store->phone }}</strong>
      </div>
    </div>

    <div class="row text-center mb-3">
      <div class="col">
        郵便番号 :　<strong>{{ $store->postcode }}</strong>
      </div>
    </div>

    <div class="mb-4">
      <div class="text-center">住所</div>
      <div class="col text-center">
          <strong><span id="address">{{ $store->address }}</span></strong><br>
          <div class="col mr-2 ml-2" id="map" style="width:100%; height:300px"></div>
      </div>
    </div>
      
    <div class="col text-center">
      店舗情報コメント
    </div> 
    <div class="text-center ml-3 mr-3 mb-4">
      <strong>{{ $store->comment }}</strong>
    </div>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!-- Google Map API script    -->
    <script>
      function initMap() {

          var address = document.getElementById('address').textContent; 
          var contentString = document.getElementById('address').textContent;

          var addresses = [
              address,
          ];

          var contentString = '<h1>{{ $store->name }}</h1>'+'<p>{{ $store->comment }}</p>';

          var latlng = []; //緯度経度の値をセット
          var marker = []; //マーカーの位置情報をセット
          var myLatLng; //地図の中心点をセット用
          var geocoder;
          geocoder = new google.maps.Geocoder();

          var map = new google.maps.Map(document.getElementById('map'));//地図を作成する

          geo(aftergeo);

          function geo(callback){
            var cRef = addresses.length;
            for (var i = 0; i < addresses.length; i++) {
              (function (i) { 
                geocoder.geocode({'address': addresses[i]}, 
                function(results, status) { // 結果
                  if (status === google.maps.GeocoderStatus.OK) { // ステータスがOKの場合
                      latlng[i]=results[0].geometry.location;// マーカーを立てる位置をセット
                      marker[i] = new google.maps.Marker({
                          position: results[0].geometry.location, // マーカーを立てる位置を指定
                          map: map // マーカーを立てる地図を指定
                      });
                  } else { // 失敗した場合
                  }//if文の終了。ifは文なので;はいらない
                  if (--cRef <= 0) {
                      callback();//全て取得できたらaftergeo実行
                  }
                }//function(results, status)の終了
                );//geocoder.geocodeの終了
              }) (i);
            }//for文の終了
          }//function geo終了

          function aftergeo(){
            myLatLng = latlng[0];//最初の住所を地図の中心点に設定
            var opt = {
                center: myLatLng, // 地図の中心を指定
                zoom: 16 // 地図のズームを指定
            };//地図作成のオプションのうちcenterとzoomは必須
            map.setOptions(opt);//オプションをmapにセット
          }//function aftergeo終了

          var infowindow = new google.maps.InfoWindow({
            content: contentString
          });

          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
        };//function initMap終了
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key='ここにキー'&callback=initMap" async defer></script>


    <div class="row justify-content-center mb-5">
      <a class="btn btn-primary text-center mr-2" href="{{ route('storeInfo.edit', ['id' => $store->id ]) }}">編集画面</a>
      <a class="btn btn-secondary text-center" href="{{ url('/stores') }}">戻る</a>
    </div>
  </div>

@endsection