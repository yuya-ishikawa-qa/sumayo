@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center pt-3 mb-4">
        <h2>お店TOP画像設定</h2>
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


    <div class="mt-3 mb-3">
        <div class="text-center">
            @isset ($store->top_image1)
                <div class="border border-primary rounded pt-2 pb-2 pr-2 pl-2 ">
                    <div class="col mb-2">
                        <strong><u>アップロード済トップ画像1</u></strong>
                    </div>
                    <div class="col">
                        <img style="max-width: 100%; height: auto;" src="/storage/storeImages/{{$store->top_image1}}" alt="画像が読み込めません">
                    </div>
                </div>
            @endisset

            @isset ($store->top_image2)
                <div class="border border-primary rounded pt-2 pb-2 pr-2 pl-2 ">
                    <div class="col mb-2">
                        <strong><u>アップロード済トップ画像2</u></strong>
                    </div>
                    <div class="col">
                        <img style="max-width: 100%; height: auto;" src="/storage/storeImages/{{$store->top_image2}}" alt="画像が読み込めません">
                    </div>
                </div>
            @endisset

            @isset ($store->top_image3)
                <div class="border border-primary rounded pt-2 pb-2 pr-2 pl-2 ">
                    <div class="col mb-2">
                        <strong><u>アップロード済トップ画像3</u></strong>
                    </div>
                    <div class="col">
                        <img style="max-width: 100%; height: auto;" src="/storage/storeImages/{{$store->top_image3}}" alt="画像が読み込めません">
                    </div>
                </div>
            @endisset

            @if ($store->top_image1 == null && $store->top_image2 == null && $store->top_image3 == null)
                <!-- No image画像 -->
                <div class="border border-danger rounded pt-2 pb-2 pr-2 pl-2 ">
                    <div class="col text-danger mb-2">
                        <div><strong><u>オススメ商品画像アップロード未完了</u></strong></div>
                        <span>※画像をアップロードしてください</span>
                    </div>
                </div>
            @endif
        </div>
    </div>



  <form action="{{ route('storeImages.upload', ['id' => $store->id ]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    <div class="form-group text-center mb-4">
      <label class="control-label">オススメ商品画像1</label>
      <div class="ml-5 pl-4">
        <input type="file" id="top_image1" name="top_images[top_image1]" multiple="multiple"/>
      </div>
      <span class="text-danger">
        <strong>{{ $errors->first('top_images.top_image1') }}</strong>
      </span>
    </div>

    <div class="form-group text-center mb-4">
      <label class="control-label">オススメ商品画像2</label>
      <div class="text-cetner ml-5 pl-4">
        <input type="file" id="top_image2" name="top_images[top_image2]" multiple="multiple"/>
      </div>
      <span class="text-danger">
        <strong>{{ $errors->first('top_images.top_image2') }}</strong>
      </span>
    </div>

    <div class="form-group text-center mb-4">
      <label class="control-label">オススメ商品画像3</label>
      <div class="ml-5 pl-4">
        <input type="file" id="top_image3" name="top_images[top_image3]" multiple="multiple"/>
      </div>
      <span class="text-danger">
        <strong>{{ $errors->first('top_images.top_image3') }}</strong>
      </span>
    </div>

    <div class="text-center mb-4">
      <input type="submit" value="送信" class="btn btn-primary">
    </div> 
  </form>
  <div class="text-center">
      <a href="{{ url('/stores') }}"><button class="btn btn-secondary">戻る</button></a>
    </div>

</div>

@endsection