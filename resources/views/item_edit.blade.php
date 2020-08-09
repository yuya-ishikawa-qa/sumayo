@extends('layouts.app')
    
@section('content')

        <div class="container">

                <h2 class="text-center mt-2">商品情報編集</h2>

            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="" id=item_edit_image>
                    <p class="text-center">写真1</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="" id=item_edit_image>
                    <p class="text-center">写真2</p>
                </div>
                <div class="col-4">
                    <img src="{{ asset('image/food_image/1678376_s.jpg') }}" alt="" id=item_edit_image>
                    <p class="text-center">写真3</p>
                </div>
            </div>

            <div class="row">

                <table class="table">
                    <form action="">
                    <tbody>
                        <tr>
                        <th scope="row">商品名</th>
                        <td>
                        <input name="item_name" id="item_name" placeholder="" class="form-control" type="text"></td>
                        </tr>
                        <tr>
                        <th scope="row">商品説明<br>(最大何文字)</th>
                        <td><input name="item_description" id="item_description" placeholder="" class="form-control" type="text"></td>
                        </tr>
                        <tr>
                        <th scope="row">販売状況</th>
                        <td>
                            <select class="form-control">
                                <option>販売中</option>
                                <option>停止中</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">価格(円)</th>
                        <td><input name="item_description" id="item_description" placeholder="" class="form-control" type="text"></td>
                        </tr>
                        <tr>
                        <th scope="row">消費税</th>
                        <td><input name="item_description" id="item_description" placeholder="" class="form-control" type="text"></td>
                        </tr>
                        <tr>
                        <th scope="row">在庫数<br>一括or各曜日選択できるようにする</th>
                        <td><input name="item_description" id="item_description" placeholder="" class="form-control" type="text"></td>
                        </tr>
                        <tr>
                    </tbody>
                    </form>
                </table>
            </div>

            <div class="row justify-content-center">
                <button type="button" type="submit" class="btn btn-secondary rounded-pill btn-lg col-5">登録</button>
            </div>

            </div>
        </div>
        
@endsection