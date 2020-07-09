@extends('layouts.app')

@section('content')

<div class="container">

<div class="col mt-3 mb-3">
  <h3>店員情報一覧</h3>
</div>

<table class="table table-striped table-condensed">
  <thead>
    <tr>
      <th>#</th>
      <th>
        名前
      </th>
    </tr>
  </thead>
  
  <tbody>
    <tr>
      <td>1</td>
      <td>スマヨ店長AAAAAAAA</td>
      <td>
        <button class="btn btn-primary" href="">編集</button> 
      </td>
      <td>
        <button class="btn btn-danger" href="">削除</button> 
      </td>
    </tr>

    <tr>
      <td>2</td>
      <td>スマヨスタッフAAAAAAAAA</td>
      <td>
        <button class="btn btn-primary" href="">編集</button> 
      </td>
      <td>
        <button class="btn btn-danger" href="">削除</button> 
      </td>
    </tr>
  </tbody>
</table>

</div>

@include('commons.footer')

@endsection