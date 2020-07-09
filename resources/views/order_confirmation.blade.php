<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
		<title>TOP</title>
		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<!-- jQuery.jsの読み込み -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<body>
		<header>
		</header>
		<main id="top">
			<div class="text-center">
					<h3 class="login_title text-left d-inline-block mt-5">お客様情報入力</h3>
			</div>

			<form>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="last_name">姓</label>
						<input class="form-control" name="last_name" type value="text" id="last_name" required>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<div class="form-group col-md-6">
						<label for="first_name">名</label>
						<input class="form-control" name="first_name" type="text" value="" id="first_name" required>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="tel">電話番号</label>
					<input class="form-control" name="tel" type="text" value="" id="tel" required>
					<div class="valid-feedback">
						Looks good!
					</div>
			  </div>
				<div class="form-group">
					<label for="mail">メールアドレス</label>
					<input class="form-control" name="mail" type="text" value="" id="mail" required>
					<div class="valid-feedback">
						Looks good!
					</div>
			  </div>
				<div class="mb-3">
					<label for="remark">備考</label>
					<textarea class="form-control" name="remark" value="" id="remark"></textarea>
					<div class="invalid-feedback">
						Please enter a message in the textarea.
					</div>
				</div>
				<button class="btn btn-primary" type="submit">Submit form</button>
			</form>
		</main>
	</body>
</html>
