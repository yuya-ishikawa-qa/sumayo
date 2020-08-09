@extends('layouts.app')
    
@section('content')

<div class="container">
            <div class="row justify-content-center">
                <a class="btn btn-secondary rounded-pill btn-lg col-10 mt-3" href="{{ url('/items/register')}}" role="button">商品登録</a>
                <a class="btn btn-secondary rounded-pill btn-lg col-10 mt-3" href="{{ url('/register-category')}}" role="button">カテゴリー名変更</a>
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
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
            <tr>
            <th scope="row"><img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="img-fluid" alt="Responsive image" id="items_list_image"></th>
            <td>ナポリタン</td>
            <td>&yen;700</td>
            <td>販売中</td>
            <td><a href="{{ url('/items/detail')}}" id="items_list_detail_link">詳細</a></td>
            </tr>
        </tbody>
        </table>

        </div>

@endsection