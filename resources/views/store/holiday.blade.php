@extends('layouts.app')

@section('content')

<div class="container">
  
  <div class="text-center mt-5">
    <h2>休日カレンダー</h2>
  </div>

  <h5 class="col text-center">
    6月
  </h5>

  <table class="col text-center">
    <tr>
      <th>日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th>土</th>
    </tr>

    <tr>
    @for ($i=1; $i<=7; $i++)
      <td>
        {{ $i }}
      </td>
    @endfor
    </tr>

    <tr>
      @for ($i=8; $i<=14; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=15; $i<=21; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=22; $i<=28; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=29; $i<=30; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>
    
  </table>

  <h5 class="col text-center">
    7月
  </h5>

  <table class="col text-center">
    <tr>
      <th>日</th>
      <th>月</th>
      <th>火</th>
      <th>水</th>
      <th>木</th>
      <th>金</th>
      <th>土</th>
    </tr>

    <tr>
    @for ($i=1; $i<=7; $i++)
      <td>
        {{ $i }}
      </td>
    @endfor
    </tr>

    <tr>
      @for ($i=8; $i<=14; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=15; $i<=21; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=22; $i<=28; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>

    <tr>
      @for ($i=29; $i<=30; $i++)
        <td>
          {{ $i }}
        </td>
      @endfor
    </tr>
    
  </table>
  
  <div class="col text-center mt-3">
    <a href="/store/edit/holiday" class="btn btn-primary">休日編集画面へ</a>

    <a href="/store" class="btn btn-secondary">戻る</a>
  </div>

</div>

@endsection