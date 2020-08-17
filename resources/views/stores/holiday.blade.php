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

  <div class="row justify-content-center mt-5 pb-3">
    <div class="col">
      <a class="btn btn-outline-secondary float-left" href="{{ url('/stores/1/holiday?date=' . $calendar->getPreviousMonth()) }}">前月</a>
    </div>
    <div class="col">
      <h3 class="red"><strong>{{ $calendar->getTitle() }}</strong></h3>  
    </div>
    <div class="col">
      <a class="btn btn-outline-secondary float-right" href="{{ url('/stores/1/holiday?date=' . $calendar->getNextMonth()) }}">次月</a>
    </div>
  </div>


  <div class="row justify-content-center mt-2">
    <div class="col-md-8">
      <div class="card">

        <div class="card-header">
          <div class="row">
            <div class="col"> 
              日付 (曜日)
            </div>
            <div class="col">
              <div class="pl-5">
                営業 / 休み 選択
              </div>
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
                        <div class="switchArea">
                        @if (isset($holidays_list[$day->render()]) && $holidays_list[$day->render()] === 1)
                          <input type="checkbox" name="{{ $day->render() }}" id="{{ $day->render() }}" value="1" checked>
                        @endif
                          <label for="{{ $day->render() }}"><span></span></label>
                          <div id="swImg"></div>
                        </div>
                      </div>
                    </div>
                  </li>
                @endif
              @endforeach
            </ul>
          @endforeach
          <div class="row justify-content-center pt-3 pb-3">
            <input type="submit" class="btn btn-primary" value="店舗休日を更新する">
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