@extends('layouts.app')

@section('content')

<div class="container">  
  <div class="text-center mt-5">
    <h2>休日カレンダー</h2>
  </div>

  <h5 class="row justify-content-center mt-5">
    {{ $calendar->getTitle() }}
  </h5>

  <div class="card">
    <ul class="list-group list-group-flush">
      @php
        $weeks = $calendar->getWeeks();
      @endphp

      @foreach ($weeks as $week){

        @php
          $days = $week->getDays();
        @endphp

        @foreach ($days as $day)
          <li class="list-group-item">
            <div class="row">
              <div class="col">
                  {{ $day->getDays() }}日
              </div>
              <div class="col">
                  曜日
              </div>
              <div class="col">
                <input class="form-check-input" type="radio" name="" id="inlineRadio1" value="0" checked>
                <label class="form-check-label" for="inlineRadio1">営業</label>
              </div>
              <div class="col">
                <input class="form-check-input" type="radio" name="" id="inlineRadio2" value="1">
                <label class="form-check-label" for="inlineRadio1">休み</label>
              </div>
            </div>
          </li>
        @endforeach
      @endforeach
    </ul>
  </div>
  

  
    
  
  <div class="col text-center mt-3">
    <a href="/stores/edit/holiday" class="btn btn-primary">休日編集画面へ</a>

    <a href="/stores" class="btn btn-secondary">戻る</a>
  </div>

</div>

@endsection