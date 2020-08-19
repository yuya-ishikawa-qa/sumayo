@extends('customer_layouts.customer_layouts')
    
@section('content')

<a href="{{ url('/')}}">戻る</a>
            
{{--  お店情報  --}}
    <div class="container_shopinfo">
        <div class="row">
        @foreach ($store as $store)
            <h1 class="col-12 mt-3 mb-3">{{ $store->name }}</h1>
            <p class="col-4">営業時間</p>
            <p class="col-8">{{ substr($store->start_time, 0, 5) }}-{{ substr($store->end_time, 0, 5) }}</p>

            {{--  定休日は後で  --}}
            <p class="col-4">定休日</p>
            <p class="col-8">3日/5日/15日</p>
            
            {{$StoreHoliday}}


            <p class="col-4">住所</p>
            <p class="col-8">{{ $store->address }}</p>
            <p class="col-4">電話番号</p>
            <p class="col-8">{{ $store->phone }}</p>
            <p class="col-4">コメント</p>
            <p class="col-8">{{ $store->comment }}<p>
        @endforeach
            
        </div>
    </div>
            
@endsection