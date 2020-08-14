@php
$item_total = $tax_total = 0;
@endphp

@extends('customer_layouts.customer_layouts')

@section('content')
{{--  この戻るボタンはあとで綺麗にする  --}}
<button type="button" onclick="history.back()" class="ml-1">＜</button>

<div class="container">
    <h1>カートの中身</h1>
    @if (session('flash_message'))
    <div style="color:red">{{ session('flash_message') }}</div>
    @endif

    @if(is_array(session()->get('cart')) && count(session()->get('cart')) > 0)
    @foreach(session()->get('cart') as $key => $value)
    @php
    # 商品取得
    $items = App\Items::find([$key]);
    foreach($items  as $v){
    $item = $v;
    }

    # 金額計算
    $item_total += $item->price * $value;
    $tax_total += $item->price * $item->tax / 100 * $value;
    @endphp
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-3">
                <img src="{{ asset('image/food_image/1678376_s.jpg') }}" class="card-img" alt="...">
            </div>
            <div class="col-9">
                <div class="card-body">
                    <table id="item-detail">
                        <tr>
                            <td><p class="product-title">{{ $item->item_name }}</p></td>
                            <td align="right"><p class="sale-price">&yen;{{ number_format($item->price) }}</p></td>
                        </tr>
                        <tr border="0" cellspacing="4" cellpadding="0">
                            <td>
                                <form action="{{route('cart.update',['post_id' => $item->id])}}" method="post">
                                    {{csrf_field()}}
                                    {{ method_field('PUT')}}
                                    数量<input name="quantity" type="text" value="{{ $value }}" size="5"><input type="submit" value="変更">
                                </form>
                                <form action="{{route('cart.destroy',['post_id' => $item->id])}}" method="post">
                                {{csrf_field()}}
                                {{ method_field('DELETE')}}
                                <input type="submit" value="削除">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <div class="card mt-0 mb-0">
        <div class="row no-gutters">
            <div class="col-3">
            </div>
            <div class="col-3">
                <div class="card-body" style="text-align:right;">
                    <p class="total-sales-price">小計</p>
                    <p class="total-sales-price">&yen;{{ number_format($item_total) }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body" style="text-align:right;">
                    <p class="total-sales-price">消費税</p>
                    <p class="total-sales-price">&yen;{{ number_format($tax_total) }}</p>
                </div>
            </div>
            <div class="col-3">
                <div class="card-body" style="text-align:right;">
                    <p class="total-sales-price">合計金額</p>
                    <p class="total-sales-price">&yen;{{ number_format($item_total + $tax_total) }}</p>
                </div>
            </div>
        </div>
    </div>

    {{--  注文に進む  --}}
    <div class="col-12 mt-3" align="center">
        <a href="{{ url('/order_form')}}"><button class="btn btn-primary">注文手続き</button></a>
    </div>
    @else
    <div style="color:red">※商品が選択されていません</div>
    @endif



    {{--  formとsubmitでセッションに商品情報追加すること  --}}

</div>

</body>
@endsection
