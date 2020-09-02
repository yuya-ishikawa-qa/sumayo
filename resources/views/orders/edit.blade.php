@extends('layouts.app')

@section('content')
<div class="info-area">
    <div class="text-center">
        <h3 class="login_title text-left d-inline-block mt-5">情報編集</h3>
    </div>

    <form action="{{route('orders.update',['id' => $order->id])}}" method="post">
        {{csrf_field()}}
        {{ method_field('PUT')}}
        <div class="form-area">
            <div>
                <dl>
                    <dt>id</dt>
                    <dd>{{ $order->id }}</dd>
                </dl>
            </div>


            <div>
                <dl>
                    <dt>ステータス</dt>
                    <dd>
                        <select name="order_status" class="custom-select my-1 mr-sm-2 col-sm-10 " id="">
                        @foreach($order_status_list as $key => $value)
                        @if((!empty($order->order_status) && $order->order_status == $key) || old('value') == $key )
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif
                        @endforeach
                        </select>
                    </dd>
                </dl>
            </div>

            <div>
                <dl>
                    <dt>受取日</dt>
                    <dd>{{ $recieved_date->format('Y年m月d日') }}</dd>
                </dl>
            </div>

            <div>
                <dl>
                    <dt>受け取り時間</dt>
                    <dd>{{ $order->recieved_time }}</dd>
                </dl>
            </div>

            <div class="half">
                <dl>
                    <dt><label for="last_name">姓</label></dt>
                    <dd>{{ $customer->last_name }}</dd>
                </dl>
            </div>

            <div class="half">
                <dl>
                    <dt><label for="last_name">名</label></dt>
                    <dd>{{ $customer->first_name }}</dd>
                </dl>
            </div>

            <div class="half">
                <dl>
                    <dt>姓（カナ）</dt>
                    <dd>{{ $customer->last_name_kana }}</dd>
                </dl>
            </div>

            <div class="half">
                <dl>
                    <dt><label for="first_name_kana">名（カナ）</label></dt>
                    <dd>{{ $customer->first_name_kana }}</dd>
                </dl>
            </div>

            <div>
                <dl>
                    <dt><label for="tel">電話番号</label></dt>
                    <dd>{{ $customer->tel }}</dd>
                </dl>
            </div>

            <div>
                <dl>
                    <dt><label for="mail">メールアドレス</label></dt>
                    <dd>{{ $customer->mail }}</dd>
                </dl>
            </div>

            <div>
                <dl>
                    <dt><label for="comment">備考</label></dt>
                    <dd><textarea class="form-control" name="comment" id="comment">{{ $order->comment }}</textarea></dd>
                </dl>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary" type="submit">更新</button>
        </div>
    </form>
    <div class="text-center mt-2">
        <a href="{{route('orders.show',['id' => $order->id])}}"><button class="btn btn-secondary" type="submit">戻る</button></a>
    </div>

</div>
@endsection
