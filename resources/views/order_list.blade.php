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
		<main class="order-list">
			<div class="search">
				<form>
					<input class="form-control" name="test" type="date" value="2020/07/15" id="last_name">
					<button class="btn btn-primary" type="button">前</button>
					<button class="btn btn-primary" type="button">今日</button>
					<button class="btn btn-primary" type="button">次</button>
				</form>
			</div>
			<form action="{!! url('/order_detail'); !!}">
				<div class="order-area">
					<button class="btn btn-primary" type="button">完了にする</button>
					<div class="order-item">
						<div class="time">時間</div>
						<div class="title">内容</div>
						<div class="operation"></div>
					</div>
					<div class="order-item bg-secondary">
						<div class="time">11:00</div>
						<div class="content">阪江光希<br>
							<span class="bg-info">受取済</span>合計1,620円<br>
							唐揚げ弁当×2<br>
							ハンバーグ弁当×1
						</div>
						<div class="operation">
							<button>詳細確認</button><br>
							<label><input type="checkbox">完了</label>
						</div>
					</div>
					<div class="order-item bg-secondary">
						<div class="time">11:00</div>
						<div class="content">佐藤太郎<br>
							<span class="bg-info">受取済</span>合計1,620円<br>
							唐揚げ弁当×2<br>
							ハンバーグ弁当×1
						</div>
						<div class="operation">
							<button>詳細確認</button><br>
							<label><input type="checkbox">完了</label>
						</div>
					</div>
				</div>
			</form>
		</main>
	</body>
</html>
