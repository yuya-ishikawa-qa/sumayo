<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>TOP</title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- jQuery.jsの読み込み -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<header>
		</header>
		<main class="info-area">
			<div class="text-center">
				<h3 class="login_title text-left d-inline-block mt-5">お客様情報入力</h3>
			</div>

			<form action="{!! url('/order_confirmation'); !!}">
				<div class="form-area">

					<div>
						<dl>
							<dt><label for="test">受取日</label></dt>
							<dd><input class="form-control" name="test" type="date" value="text" id="last_name" required></dd>
						</dl>
					</div>

					<div>
						<dl>
							<dt>受け取り時間</dt>
							<dd><select class="custom-select my-1 mr-sm-2 col-sm-10 " id="">
								<option value="1">11:00</option>
								<option value="2">11:30</option>
								<option value="3">12:00</option>
								</select>
							</dd>
						</dl>
					</div>

					<div class="half">
						<dl>
							<dt><label for="last_name">姓</label></dt>
							<dd><input class="form-control" name="last_name" type="text" value="text" id="last_name" required></dd>
						</dl>
					</div>

					<div class="half">
						<dl>
							<dt><label for="last_name">名</label></dt>
							<dd><input class="form-control" name="first_name" type="text" value="" id="first_name" required></dd>
						</dl>
					</div>

					<div class="half">
						<dl>
							<dt><label for="last_name_kana">姓（カナ）</label></dt>
							<dd><input class="form-control" name="last_name_kana" type="text" value="" id="last_name_kana"></dd>
						</dl>
					</div>

					<div class="half">
						<dl>
							<dt><label for="first_name_kana">名（カナ）</label></dt>
							<dd><input class="form-control" name="first_name_kana" type="text" value="" id="first_name_kana"></dd>
						</dl>
					</div>

					<div>
						<dl>
						<dt><label for="tel">電話番号</label></dt>
							<dd><input class="form-control" name="tel" type="tel" value="" id="tel" required></dd>
						</dl>
					</div>

					<div>
						<dl>
						<dt><label for="mail">メールアドレス</label></dt>
						<dd><input class="form-control" name="mail" type="mail" value="" id="mail" required></dd>
						</dl>
					</div>

					<div>
						<dl>
							<dt><label for="remark">備考</label></dt>
							<dd><textarea class="form-control" name="remark" value="" id="remark"></textarea></dd>
						</dl>
					</div>
				</div>
				<button class="btn btn-primary" type="submit">注文確認</button>
			</form>
			<a><button class="btn btn-primary" type="submit">戻る</button></a>
		</main>
	</body>
</html>
