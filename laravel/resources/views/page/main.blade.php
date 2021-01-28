@extends('common')
@section('title','特徴選択 | クルシラ')
<body class="body">
@section('content')
<div class="container">
  <p class="note">個人差がありますので様々なパターンを試してみてください。</p>
  <form action="{{ route('result') }}" class="container__card" method="POST">
  @csrf
    <div class="container__card__header">特徴を選んでください</div>
    <div class="container__card__body">
      <div class="container__card__body__box">
        <label for="style">スタイル</label>
        <select class="container__card__body__box__form form-control" name="style" id="style">
          <option value="かわいい">かわいい</option>
          <option value="かっこいい">かっこいい</option>
          <option value="シンプル">シンプル</option>
          <option value="おしゃれ">おしゃれ</option>
          <option value="レトロ">レトロ</option>
        </select>
      </div>
      <div class="container__card__body__box">
        <label for="size">サイズ</label>
        <select class="container__card__body__box__form form-control" name="size" id="size">
          <option value="ふつう">ふつう</option>
          <option value="すごくおおきい">すごくおおきい</option>
          <option value="おおきい">おおきい</option>
          <option value="ちいさい">ちいさい</option>
        </select>
      </div>
      <div class="container__card__body__box">
        <label for="country">国</label>
        <select class="container__card__body__box__form form-control" name="country" id="country">
          <option value="国産車">国産車</option>
          <option value="外車">外車</option>
        </select>
      </div>
      <div class="container__card__body__box">
        <label for="uses">用途</label>
        <select class="container__card__body__box__form form-control" name="uses" id="uses">
          <option value="街乗り">街乗り</option>
          <option value="アウトドア">アウトドア</option>
          <option value="スポーツ">スポーツ</option>
        </select>
      </div>
      <div class="container__card__body__button">
        <button type="submit" class="send" value="次へ">結果を見る</button>
      </div>
    </div>
  </form>
</div>

@endsection
