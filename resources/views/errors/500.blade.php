<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/pageError.css') }}">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>

function norm(value, min, max) {
  return (value - min) / (max - min);
}

function lerp(norm, min, max) {
  return (max - min) * norm + min;
}

function map(value, sourceMin, sourceMax, destMin, destMax) {
  return lerp(norm(value, sourceMin, sourceMax), destMin, destMax);
}

function map2(value, sourceMin, sourceMax, destMin, destMax, percent) {
  return percent <= 0.5
    ? map(value, sourceMin, sourceMax, destMin, destMax)
    : map(value, sourceMin, sourceMax, destMax, destMin);
}

function fisheye(el) {
  let text = el.innerText.trim(),
    numberOfChars = text.length;

  el.innerHTML =
    "<span>" +
    text
      .split("")
      .map(c => {
        return c === " " ? "&nbsp;" : c;
      })
      .join("</span><span>") +
    "</span>";

  el.querySelectorAll("span").forEach((c, i) => {
    const skew = map(i, 0, numberOfChars - 1, -15, 15),
      scale = map2(i, 0, numberOfChars - 1, 1, 3, i / numberOfChars),
      letterSpace = map2(i, 0, numberOfChars - 1, 5, 20, i / numberOfChars);

    c.style.transform = "skew(" + skew + "deg) scale(1, " + scale + ")";
    c.style.letterSpacing = letterSpace + "px";
  });
}

fisheye(document.querySelector("h1"));

</script>

<div class="container">
    <p>お探しのページは</br>みつかりませんでした</p>
    <h1>ページ</br>エラー</h1>
    <p></br>ホームにもどってもう一度お試しください。</p>
</div>


</body>
</html>