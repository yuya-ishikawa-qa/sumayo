@extends('customer_layouts.customer_layouts')

@section('content')

        <div class="info-area">
            <div class="text-center">
                <h3 class="login_title text-left d-inline-block mt-5">お客様情報入力</h3>
            </div>

            <form action="{!! url('/order_confirmation'); !!}">
                <div class="form-area">

                    <div>
                        <dl>
                            <dt><label for="test">受取日</label></dt>
                            <dd><input class="form-control" name="test" type="date" value="text" id="last_name" required></dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt>受け取り時間</dt>
                            <dd><select class="custom-select my-1 mr-sm-2 col-sm-10 " id="">
                                <option value="1">11:00</option>
                                <option value="2">11:30</option>
                                <option value="3">12:00</option>
                                </select>
                            </dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt><label for="last_name">姓</label></dt>
                            <dd><input class="form-control" name="last_name" type="text" value="text" id="last_name" required></dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt><label for="last_name">名</label></dt>
                            <dd><input class="form-control" name="first_name" type="text" value="" id="first_name" required></dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt><label for="last_name_kana">姓（カナ）</label></dt>
                            <dd><input class="form-control" name="last_name_kana" type="text" value="" id="last_name_kana"></dd>
                        </dl>
                    </div>

                    <div class="half">
                        <dl>
                            <dt><label for="first_name_kana">名（カナ）</label></dt>
                            <dd><input class="form-control" name="first_name_kana" type="text" value="" id="first_name_kana"></dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                        <dt><label for="tel">電話番号</label></dt>
                            <dd><input class="form-control" name="tel" type="tel" value="" id="tel" required></dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                        <dt><label for="mail">メールアドレス</label></dt>
                        <dd><input class="form-control" name="mail" type="mail" value="" id="mail" required></dd>
                        </dl>
                    </div>

                    <div>
                        <dl>
                            <dt><label for="remark">備考</label></dt>
                            <dd><textarea class="form-control" name="remark" value="" id="remark"></textarea></dd>
                        </dl>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">注文確認</button>
            </form>
            <a><button class="btn btn-primary" type="submit">戻る</button></a>
        </main>
@endsection
