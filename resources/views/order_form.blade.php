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
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<header>
		</header>
		<main id="top">
			<div class="text-center">
				<h3 class="login_title text-left d-inline-block mt-5">お客様情報入力</h3>
			</div>

			<form>
			<div class="form-row row">
				<label class="my-1 mr-2 col-sm-2 col-form-label" for="inlineFormCustomSelectPref">受け取り時間</label>
				<select class="custom-select my-1 mr-sm-2 col-sm-10 " id="inlineFormCustomSelectPref">
					<option value="1">11:00</option>
					<option value="2">11:30</option>
					<option value="3">12:00</option>
			  </select>
				<div class="valid-feedback">
					Looks good!
				</div>
			</div>

				<div class="form-row row">
					<div class="form-group col-md-6 row">
						<label for="last_name" class="col-sm-2 col-form-label">姓</label>
						<div class="col-sm-8">
							<input class="form-control" name="last_name" type value="text" id="last_name" required>
						</div>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
					<div class="form-group col-md-6 row">
						<label for="first_name" class="col-sm-2 col-form-label">名</label>
						<div class="col-sm-8">
							<input class="form-control" name="first_name" type="text" value="" id="first_name" required>
						</div>
						<div class="valid-feedback">
							Looks good!
						</div>
					</div>
				</div>

					<div class="form-row row">
						<div class="form-group col-md-6 row">
							<label for="last_name" class="col-sm-2 col-form-label">姓（カナ）</label>
							<div class="col-sm-8">
								<input class="form-control" name="last_name" type value="text" id="last_name" required>
							</div>
							<div class="valid-feedback">
								Looks good!
							</div>
						</div>
						<div class="form-group col-md-6 row">
							<label for="first_name" class="col-sm-2 col-form-label">名（カナ）</label>
							<div class="col-sm-8">
								<input class="form-control" name="first_name" type="text" value="" id="first_name" required>
							</div>
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
				<button class="btn btn-primary" type="submit">注文確認</button>
			</form>
		</main>
	</body>
</html>
