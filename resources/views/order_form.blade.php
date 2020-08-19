@extends('customer_layouts.customer_layouts')

@section('content')

        <div class="info-area">
            <div class="text-center">
                <h3 class="login_title text-left d-inline-block mt-5">お客様情報入力</h3>
            </div>

            <form action="{{route('buy.show')}}" method="post">
                {{ csrf_field() }}
                <div class="form-area">

                    <div>
                        <dl>
                            <dt><label for="test">受取日</label></dt>
                            <dd>
                                <select class="custom-select my-1 mr-sm-2 col-sm-10 " name="recieved_date" id="recieved_date">
                                    @foreach($get_available_date as $value)
                                    @php
                                    $set_date = null; #初期化
                                    $set_date = date_create($value);
                                    @endphp

                                    @if(!empty(old('recieved_date')) && old('recieved_date') == $set_date->format('Y-m-d'))
                                    <option value="{{$set_date->format('Y-m-d')}}" selected>{{$set_date->format('Y年m月d日')}}</option>
                                    @elseif(empty(old('recieved_date')) && !empty(session()->get('order')['recieved_date']) && session()->get('order')['recieved_date'] == $set_date->format('Y-m-d'))
                                    <option value="{{$set_date->format('Y-m-d')}}" selected>{{$set_date->format('Y年m月d日')}}</option>
                                    @else
                                    <option value="{{$set_date->format('Y-m-d')}}">{{$set_date->format('Y年m月d日')}}</option>
                                    @endif

                                    @endforeach
                                </select>
                                <p style="color:red">{{ $errors->first('recieved_date') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt>受け取り時間</dt>
                            <dd>
                                <select class="custom-select my-1 mr-sm-2 col-sm-10 " name="recieved_time" id="recieved_time">
                                    @foreach($get_times as $value)
                                    @php
                                    $set_time = null; #初期化

                                    # 基準を設定(時間の管理のために使う日付は1980年1月1日とする)
                                    $set_time = date_create(sprintf('1980-01-01 %s',$value));
                                    @endphp
                                    <option value="{{$set_time->format('H:i')}}">{{$set_time->format('H:i')}}</option>

                                    @if(!empty(old('recieved_time')) && old('recieved_time') == $set_time->format('H:i'))
                                    <option value="{{$set_time->format('H:i')}}" selected>{{$set_time->format('H:i')}}</option>
                                    @elseif(empty(old('recieved_time')) && !empty(session()->get('order')['recieved_time']) && session()->get('order')['recieved_time'] == $set_time->format('H:i'))
                                    <option value="{{$set_time->format('H:i')}}" selected>{{$set_time->format('H:i')}}</option>
                                    @else
                                    <option value="{{$set_time->format('H:i')}}">{{$set_time->format('H:i')}}</option>
                                    @endif

                                    @endforeach
                                </select>
                                <p style="color:red">{{ $errors->first('recieved_time') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt><label for="last_name">姓</label></dt>
                            <dd>
                                @php
                                $value = ''; #初期化
                                # バリデーションチェックエラーの返り値を優先する
                                if(!empty(old('last_name')) ){
                                    $value = old('last_name');
                                }elseif(!empty(session()->get('order')['last_name'])){
                                    $value = session()->get('order')['last_name'];
                                }
                                @endphp
                                <input class="form-control" name="last_name" type="text" value="{{$value}}" id="last_name" placeholder="佐藤" required>
                                <p style="color:red">{{ $errors->first('last_name') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt><label for="last_name">名</label></dt>
                            <dd>
                                @php
                                $value = ''; #初期化
                                # バリデーションチェックエラーの返り値を優先する
                                if(!empty(old('first_name')) ){
                                    $value = old('first_name');
                                }elseif(!empty(session()->get('order')['first_name'])){
                                    $value = session()->get('order')['first_name'];
                                }
                                @endphp
                                <input class="form-control" name="first_name" type="text" value="{{$value}}" id="first_name" placeholder="太郎" required>
                                <p style="color:red">{{ $errors->first('first_name') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt><label for="last_name_kana">姓（カナ）</label></dt>
                            <dd>
                                @php
                                $value = ''; #初期化
                                # バリデーションチェックエラーの返り値を優先する
                                if(!empty(old('last_name_kana')) ){
                                    $value = old('last_name_kana');
                                }elseif(!empty(session()->get('order')['last_name_kana'])){
                                    $value = session()->get('order')['last_name_kana'];
                                }
                                @endphp
                                <input class="form-control" name="last_name_kana" type="text" value="{{$value}}" id="last_name_kana" placeholder="サトウ" required>
                                <p style="color:red">{{ $errors->first('last_name_kana') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt><label for="first_name_kana">名（カナ）</label></dt>
                            <dd>
                                @php
                                $value = ''; #初期化
                                # バリデーションチェックエラーの返り値を優先する
                                if(!empty(old('first_name_kana')) ){
                                    $value = old('first_name_kana');
                                }elseif(!empty(session()->get('order')['first_name_kana'])){
                                    $value = session()->get('order')['first_name_kana'];
                                }
                                @endphp
                                <input class="form-control" name="first_name_kana" type="text" value="{{$value}}" id="first_name_kana" placeholder="タロウ" required>
                                <p style="color:red">{{ $errors->first('first_name_kana') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                        <dt><label for="tel">電話番号</label></dt>
                            <dd>
                                @php
                                $value = ''; #初期化
                                # バリデーションチェックエラーの返り値を優先する
                                if(!empty(old('tel')) ){
                                    $value = old('tel');
                                }elseif(!empty(session()->get('order')['tel'])){
                                    $value = session()->get('order')['tel'];
                                }
                                @endphp
                                <input class="form-control" name="tel" type="tel" value="{{$value}}" id="tel" placeholder="090-0000-1111" required>
                                <p style="color:red">{{ $errors->first('tel') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                        <dt><label for="mail">メールアドレス</label></dt>
                            <dd>
                                @php
                                $value = ''; #初期化
                                # バリデーションチェックエラーの返り値を優先する
                                if(!empty(old('mail')) ){
                                    $value = old('mail');
                                }elseif(!empty(session()->get('order')['mail'])){
                                    $value = session()->get('order')['mail'];
                                }
                                @endphp
                                <input class="form-control" name="mail" type="mail" value="{{$value}}" id="mail" placeholder="sample@sample.jp" required>
                                <p style="color:red">{{ $errors->first('mail') }}</p>
                            </dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt><label for="comment">備考</label></dt>
                            <dd>
                                @php
                                $value = ''; #初期化
                                # バリデーションチェックエラーの返り値を優先する
                                if(!empty(old('comment')) ){
                                    $value = old('comment');
                                }elseif(!empty(session()->get('order')['comment'])){
                                    $value = session()->get('order')['comment'];
                                }
                                @endphp
                                <textarea class="form-control" name="comment" id="comment">{{$value}}</textarea>
                                <p style="color:red">{{ $errors->first('comment') }}</p>
                            </dd>
                        </dl>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">注文確認</button>
            </form>
            <div class="mt-2">
                <a href="{{route('buy.show')}}"><button class="btn btn-primary" type="submit">戻る</button></a>
            </div>
        </main>
@endsection
