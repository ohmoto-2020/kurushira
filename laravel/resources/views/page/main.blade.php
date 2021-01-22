@extends('common')
@section('title','特徴選択 | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p class="try">個人差があります。<br>様々なパターンを試してみてください。</p>
  <form action="result.php" class="container__card" bodyhod="POST">
    <div class="container__card__body">
      <div class="container__card__body__item">
        <p class="container__card__body__item__title">スタイル</p>
        <select class="container__card__body__item__select" name="style">
          <option value="かわいい">かわいい</option>
          <option value="かっこいい">かっこいい</option>
          <option value="シンプル">シンプル</option>
          <option value="おしゃれ">おしゃれ</option>
          <option value="レトロ">レトロ</option>
        </select>
      </div>
      <div class="container__card__body__item">
        <p class="container__card__body__item__title">サイズ</p>
        <select class="container__card__body__item__select" name="size">
          <option value="ふつう">ふつう</option>
          <option value="すごくおおきい">すごくおおきい</option>
          <option value="おおきい">おおきい</option>
          <option value="ちいさい">ちいさい</option>
        </select>
      </div>
      <div class="container__card__body__item">
        <p  class="container__card__body__item__title">国</p>
        <select class="container__card__body__item__select" name="country">
          <option value="国産車">国産車</option>
          <option value="外車">外車</option>
        </select>
      </div>
      <div class="container__card__body__item">
        <p  class="container__card__body__item__title">用途</p>
        <select class="container__card__body__item__select" name="uses">
          <option value="街乗り">街乗り</option>
          <option value="アウトドア">アウトドア</option>
          <option value="スポーツ">スポーツ</option>
        </select>
      </div>
    </div>
    <button type="submit" class="container__card__body" value="次へ">NEXT</button>
  </form>
</div>

@endsection
