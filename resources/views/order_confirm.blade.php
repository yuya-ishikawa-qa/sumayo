<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TOP</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- jQuery.jsの読み込み -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
  </head>
  <body>
		<header>
		</header>
		<main id="top">
			<div class="text-center">
					<h3 class="login_title text-left d-inline-block mt-5">お客様情報入力</h3>
			</div>

			<div class="row mt-5 mb-5">
					<div class="col-sm-6 offset-sm-3">

									<div class="form-group">
										<label for="last_name">姓</label>
										<input class="form-control" name="last_name" type value="text" id="last_name">
									</div>
									<div class="form-group">
										<label for="first_name">名</label>
										<input class="form-control" name="first_name" type="text" value="" id="first_name">
									</div>
									<div class="form-group">
										<label for="last_name_kana">姓（カナ）</label>
										<input class="form-control" name="last_name_kana" type="text" value="" id="last_name_kana">
									</div>
									<div class="form-group">
										<label for="first_name_kana">名（カナ）</label>
										<input class="form-control" name="first_name_kana" type="text" value="" id="first_name_kana">
									</div>
									<div class="form-group">
										<label for="tel">電話番号</label>
										<input class="form-control" name="tel" type="text" value="" id="tel">
									</div>
									<div class="form-group">
										<label for="mail">メールアドレス</label>
										<input class="form-control" name="mail" type="text" value="" id="mail">
									</div>
									<div class="form-group">
										<label for="remark">備考</label>
										<textarea class="form-control" name="remark" value="" id="remark"></textarea>
									</div>
					</div>
			</div>
		</main>
  </body>
</html>
