@extends('layouts.app')
    
@section('content')

        <div class="container">
            <h2 class="text-center mt-2">商品詳細</h2>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="" id=item_detail_image>
                    <p class="text-center">写真1</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="" id=item_detail_image>
                    <p class="text-center">写真2</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="" id=item_detail_image>
                    <p class="text-center">写真3</p>
                </div>
            </div>


            <div class="row">

                <img src="image/food_image/1678376_s.jpg" alt="">

                <table class="table">
                    <tbody>
                        <tr>
                        <th scope="row">商品名</th>
                        <td>ナポリタン</td>
                        </tr>
                        <tr>
                        <th scope="row">商品説明</th>
                        <td>昔ながらのナポリタン</td>
                        </tr>
                        <tr>
                        <th scope="row">販売状況</th>
                        <td>販売中</td>
                        </tr>
                        <tr>
                        <th scope="row">価格</th>
                        <td>&yen;700</td>
                        </tr>
                        <tr>
                        <th scope="row">販売状況</th>
                        <td>販売中</td>
                        </tr>
                        <tr>
                        <th scope="row">消費税</th>
                        <td>10%</td>
                        </tr>
                        <tr>
                        <th scope="row">在庫数</th>
                        <td>20</td>
                        </tr>
                        <tr>
                        <th scope="row">販売曜日</th>
                        <td>月、火、水、木、金</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div class="row justify-content-center">
                <a class="btn btn-secondary rounded-pill btn-lg col-5" href="{{ url('/items/detail/edit')}}" role="button">編集</a>
                <a href="" class="col-1"></a>
                <a class="btn btn-danger rounded-pill btn-lg col-5" href="#" role="button">削除</a>

                {{--  削除確認アラートあとで追加  --}}

                <a href="{{ url('/items')}}" class="col-6 text-center mt-4">商品一覧に戻る</a>
            </div>
        </div>

@endsection