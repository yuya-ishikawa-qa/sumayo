@extends('customer_layouts.customer_layouts')
    
@section('content')

    @php
        $weeks = $calendar->getWeeks();
    @endphp

<a href="{{ url('/')}}">戻る</a>
            
{{--  お店情報  --}}
    <div class="container">
        @foreach ($store as $store)
            <div class="row text-center">
                <h3 class="col-12 mt-3 mb-3">{{ $store->name }}</h3>
            </div>

            <div class="mb-4">
                <div class="text-center">営業時間</div>
                <div class="col text-center">
                    <span class="just"><strong>{{ substr($store->start_time, 0, 5) }}-{{ substr($store->end_time, 0, 5) }}</strong></span><br>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">定休日</div>
                <div class="col text-center">
                    <span><strong>{{ $calendar->getTitle() }}</strong></span><br>
                </div>
                <div class="d-flex flex-wrap mb-2 ml-5">
                    @foreach($weeks as $week)
                        @php
                            $days = $week->getDays();
                        @endphp
                        @foreach($days as $day)
                            @if (isset($holidays_list[$day->render()]) && ($holidays_list[$day->render()]) === 1)
                            <div class="text-danger pl-3 pr-3 justify-content-around"><strong>{{ $day->renderDayOfTheWeek() }}</strong></div>
                            @endif        
                        @endforeach
                    @endforeach
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">電話番号</div>
                <div class="col text-center">
                    <span class="just"><strong>{{ $store->phone }}</strong></span><br>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">住所</div>
                <div class="col text-center">
                    <strong><span id="address">{{ $store->address }}</span></strong><br>
                    <div class="col mr-2 ml-2" id="map" style="width:100%; height:300px"></div>
                </div>
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


                // var contentString = '<span>{{ $store->name }}</span>'+'</br>'+'〒 <span>{{ $store->postcode }}</span>'+'<span>{{ $store->address }}</span>'+'</br>'+'<span>{{ $store->comment }}</span>'+'</br>'+'<a href="https://maps.googleapis.com/maps/api/geocode/json?address={{ $store->address }}components=country:JP&key=">GoogleMapで見る</a>'

                var latlng = []; //緯度経度の値をセット
                var marker = []; //マーカーの位置情報をセット
                var myLatLng; //地図の中心点をセット用
                var geocoder;

                var contentString = '<span>{{ $store->name }}</span>'+'</br>'+'〒 <span>{{ $store->postcode }}</span>'+'<span>{{ $store->address }}</span>'+'</br>'

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

                window.onload = function () {
                    marker[0].addListener('click', function() {
                        infowindow.open(map, marker[0]);

                    });
                };
                };//function initMap終了
            </script>


            <script src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" async defer></script>

            <div class="mb-4">
                <div class="text-center">コメント</div>
                <div class="col text-center">
                    <span class="just"><strong>{{ $store->comment }}</strong></span><br>
                </div>
            </div>
        @endforeach
        </div>
    </div>
            



@endsection