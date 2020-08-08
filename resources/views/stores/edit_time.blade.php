@extends('layouts.app')

@section('content')
<div class="container">

  <div class="text-center mb-3">
    <h2>営業時間管理</h2>
  </div>

  <form action="{{ route('storeTime.update', ['id' => $store->id ]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <!-- 開始時間 -->
    @if($errors->has('start_hour'))
      <div class="text-center">
        <span class="text-danger">
          <strong>{{ $errors->first('start_hour') }}</strong>
        </span>
      </div>
    @endif
    @if($errors->has('start_min'))
      <div class="text-center">
        <span class="text-danger">
          <strong>{{ $errors->first('start_min') }}</strong>
        </span>
      </div>
    @endif
    <div class="row justify-content-center">
      <div class="form-inline mb-2 mr-2 ml-2">
        <label class="mr-2">開店時間</label>
        <div class="form-group">
          <select class="form-control" name="start_hour" id="start_hour">
            <option label="start_hour">
              @for ($i=0; $i<=23; $i++)
                <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
              @endfor
            </option>
          </select>
        </div>
        <div class="form-group mr-3 ml-3">
          <label> : </label>
        </div>

        <div class="form-group">
          <select class="form-control" name="start_min" id="start_min">
            <option label="start_min">
              @for ($i=0; $i<=59; $i++)
                <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
              @endfor
            </option>
          </select>
        </div>
      </div>
    </div>
    
    <!-- 終了時間 -->
    @if($errors->has('end_hour'))
      <div class="text-center">
        <span class="text-danger">
          <strong>{{ $errors->first('end_hour') }}</strong>
        </span>
      </div>
    @endif
    @if($errors->has('end_min'))
      <div class="text-center">
        <span class="text-danger">
          <strong>{{ $errors->first('end_min') }}</strong>
        </span>
      </div>
    @endif

    <div class="row justify-content-center">
      <div class="form-inline mb-2 mr-2 ml-2">
        <label class="mr-2">閉店時間</label>
        <div class="form-group">
          <select class="form-control" name="end_hour" id="end_hour">
            <option label="end_hour">
              @for ($i=0; $i<=23; $i++)
                <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
              @endfor
            </option>
          </select>
        </div>
        <div class="form-group mr-3 ml-3">
          <label> : </label>
        </div>

        <div class="form-group">
          <select class="form-control" name="end_min" id="end_min">
            <option label="end_min">
              @for ($i=0; $i<=59; $i++)
                <option value="{{ $i }}">{{ sprintf('%02d', $i) }}</option>
              @endfor
            </option>
          </select>
        </div>
      </div>
    </div>
    

    <!-- 予約単位時間 -->
    @if($errors->has('serve_range_time'))
      <div class="text-center">
        <span class="text-danger">
          <strong>{{ $errors->first('serve_range_time') }}</strong>
        </span>
      </div>
    @endif
    <div class="row justify-content-center">
      <div class="form-inline mb-2 mr-2 ml-2">
        <label class="mr-2">予約単位時間</label>
        <div class="form-group">
          <select class="form-control" name="serve_range_time" id="serve_range_time">
            <option label="serve_range_time">
              @for ($i=5; $i<=120; $i++)
                @if ($i <= 60)
                  @if ($i%5 === 0)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endif
                @endif
                @if ($i > 60 && $i<= 120 )
                  @if ($i%10 === 0)
                    <option value="{{ $i }}">{{ $i }}</option>
                  @endif
                @endif
              @endfor
            </option>
          </select>
        </div>
        <div class="col">
          <p class="mt-3 mr-3">分</p>
        </div>
      </div>
    </div>

    @if ($errors->has('capacity'))
      <div div class="text-center">
        <span class="text-danger">
          <strong>{{ $errors->first('capacity') }}</strong>
        </span>
      </div>
    @endif
    <!-- 単位時間毎予約可能数 -->
    <div class="row justify-content-center mb-2">
      <div class="form-inline">
        <label for="capacity" class="col-xs-4 col-form-label ml-3 mr-2">予約可能数</label>
        <div class="col">
          <input type="text" id="capacity" name="capacity" class="form-control" value="{{ $store->capacity }}">
        </div>
        <div class="col">
          <p class="mt-2"> [件/<strong class="text-danger">単位時間</strong>]</p>
        </div>
      </div>
    </div>
    


    @if($errors->has('earliest_receivable_time'))
      <div class="text-center">
        <span class="text-danger">
          <strong>{{ $errors->first('earliest_receivable_time') }}</strong>
        </span>
      </div>
    @endif    
    <!-- 最短受取可能時間 -->
    <div class="row justify-content-center mb-2">
      <div class="form-inline">
        <label for="earliest_receivable_time" class="col-xs-4 col-form-label ml-3 mr-2">最短受取可能時間</label>
        <div class="col">
          <input type="text" id="earliest_receivable_time" name="earliest_receivable_time" class="form-control" value="{{ $store->earliest_receivable_time }}">
        </div>
        <div class="col">
          <p class="mt-2">分</p>
        </div>
      </div>
    </div>
    
    <!-- 編集ボタン -->
    <div class="col text-center mt-3">
      <input type="submit" value="更新" class="btn btn-primary">
      <a href="{{ url('/stores') }}" class="btn btn-secondary">戻る</a>
    </div>

  </form>
</div>

@endsection