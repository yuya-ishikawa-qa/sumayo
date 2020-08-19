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












    <!-- <script> 
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
    </script>  -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI3vmKszpyZPX9TfPekAF5DyXjMmbbYBU&callback=initMap" async defer></script>


    <div class="row justify-content-center mb-5">
      <a class="btn btn-primary text-center mr-2" href="{{ route('storeInfo.edit', ['id' => $store->id ]) }}">編集画面</a>
      <a class="btn btn-secondary text-center" href="{{ url('/stores') }}">戻る</a>
    </div>
  </div>

@endsection