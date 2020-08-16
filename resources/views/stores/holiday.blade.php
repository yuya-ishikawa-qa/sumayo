@extends('layouts.app')

@section('content')

<div class="container">  
  <div class="text-center mt-5">
    <h2>店舗休日カレンダー</h2>
  </div>

  @if (session('flash_message'))
        <div class="mb-5">
            <div class="alert alert-success" role="alert">
                {{ session('flash_message') }}
            </div>
        </div>
    @endif

    @if (session('error_message'))
        <div class="mb-5">
            <div class="alert alert-danger" role="alert">
                {{ session('error_message') }}
            </div>
        </div>
    @endif


  <h3 class="row justify-content-center mt-5 pb-3">
    <strong>{{ $calendar->getTitle() }}</strong>
  </h3>


  <div class="row justify-content-center mt-2">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header">
          <div class="row">
            <div class="col"> 
              日付 (曜日)
            </div>
            <div class="col">
              営業
            </div>
            <div class="col">
              休み
            </div>
          </div>
        </div>

        <form action="{{ route('storeCalendar.update', ['id' => $store_id ]) }}" method="post">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
            
          @php
            $weeks = $calendar->getWeeks();
          @endphp

          @foreach($weeks as $week)
            <ul class="list-group list-group-flush $week->getClassName()">
              @php
                $days = $week->getDays();
              @endphp

              @foreach($days as $day)
                @if ($day->render() !== '')
                  <li class="list-group-item $day->getClassName()">
                    <div class="row">
                      <div class="col">
                        {{ $day->renderDayOfTheWeek() }}
                      </div>

                      <div class="col">
                        @if ((isset($holidays_list[$day->render()]) && ($holidays_list[$day->render()]) !== 1)||(empty($holidays_list[$day->render()])))
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-0' }}" value="0" checked>
                        @else
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-0' }}" value="0" >
                        @endif

                        <label 
                          class="form-check-label" 
                          for="{{ $day->render() . '-0' }}">
                          営業
                        </label>
                      </div>
                      
                      <div class="col">
                        @if (isset($holidays_list[$day->render()]) && ($holidays_list[$day->render()]) === 1)
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-1' }}" value="1" checked>
                        @else
                          <input class="form-check-input" type="radio" name="{{ $day->render() }}" id="{{ $day->render() . '-1' }}" value="1">
                        @endif
                        
                        <label 
                          class="form-check-label" 
                          for="{{ $day->render() . '-1' }}">
                          休み
                        </label>
                      </div>
                    </div>
                  </li>
                @endif
              @endforeach
            </ul>
          @endforeach
          <div class="row justify-content-center">
            <input type="submit" class="btn btn-primary" value="更新">
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col text-center mt-3">
    <a href="{{ url('stores') }}" class="btn btn-secondary">戻る</a>
  </div>

</div>

@endsection