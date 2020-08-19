@extends('customer_layouts.customer_layouts')
    
@section('content')

    @php
        $weeks = $calendar->getWeeks();
    @endphp

<a href="{{ url('/')}}">戻る</a>
            
{{--  お店情報  --}}
    <div class="container">
        @foreach ($store as $store)
            <div class="row text-center">
                <h3 class="col-12 mt-3 mb-3">{{ $store->name }}</h3>
            </div>

            <div class="mb-4">
                <div class="text-center">営業時間</div>
                <div class="col text-center">
                    <span class="just"><strong>{{ substr($store->start_time, 0, 5) }}-{{ substr($store->end_time, 0, 5) }}</strong></span><br>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">定休日</div>
                <div class="col text-center">
                    <span><strong>{{ $calendar->getTitle() }}</strong></span><br>
                </div>
                <div class="d-flex flex-wrap mb-2 ml-5">
                    @foreach($weeks as $week)
                        @php
                            $days = $week->getDays();
                        @endphp
                        @foreach($days as $day)
                            @if (isset($holidays_list[$day->render()]) && ($holidays_list[$day->render()]) === 1)
                            <div class="text-danger pl-3 pr-3 justify-content-around"><strong>{{ $day->renderDayOfTheWeek() }}</strong></div>
                            @endif        
                        @endforeach
                    @endforeach
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">電話番号</div>
                <div class="col text-center">
                    <span class="just"><strong>{{ $store->phone }}</strong></span><br>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">住所</div>
                <div class="col text-center">
                    <span class="just"><strong>{{ $store->address }}</strong></span><br>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">コメント</div>
                <div class="col text-center">
                    <span class="just"><strong>{{ $store->comment }}</strong></span><br>
                </div>
            </div>


            
        @endforeach
        </div>
    </div>
            
@endsection