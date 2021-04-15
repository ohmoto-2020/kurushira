<?php

namespace App\Models;

// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\User;


class Car extends Model
{
    // リレーション
    public function car_images()
    {
        return $this->hasMany('App\Models\CarImage');
    }
    public function likes():BelongsToMany
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    // いいね済みかどうかの判定
    public function isLikedBy(User $user): bool
    {
        return (bool)$this->likes->where('id', $user->id)->count();
    }
    // いいね数カウント
    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    // 車種配列
    public static function getCarsFromDb()
    {
        $makers =
            [
                'トヨタ',
                'レクサス',
                '光岡自動車',
                '日産',
                'ホンダ',
                'マツダ',
                'スバル',
                'ダイハツ',
                'スズキ',
                '三菱',
                'メルセデス・ベンツ',
                'スマート',
                'BMW',
                'アウディ',
                'フォルクスワーゲン',
                'ミニ',
                'ポルシェ',
                'キャデラック',
                'シボレー',
                'ハマー',
                'フォード',
                'リンカーン',
                'クライスラー',
                'ダッジ',
                'ジープ',
                'テスラ',
                'ロールス・ロイス',
                'ベントレー',
                'ランドローバー',
                'アストンマーティン',
                'ロータス',
                'マクラーレン',
                'ローバー',
                'ケータハム',
                'モーガン',
                'ボルボ',
                'プジョー',
                'ルノー',
                'シトロエン',
                'DSオートモビル',
                'ブガッティ',
                'アルピーヌ',
                'フィアット',
                'アルファロメオ',
                'フェラーリ',
                'ランボルギーニ',
                'マセラティ',
                'アバルト',
                'インフィニティ',
                '米国トヨタ'
            ];

        $car_array = array();
        foreach ($makers as $maker) {
            $cars = Car::where('maker', $maker)
                ->get();
            $car_array[$maker] = $cars;
        }
        return $car_array;
    }

    // 検索結果
    public static function getSearchCarsFromDb(Request $request)
    {
        $match_cars = Car::where('style', $request->style)
            ->where('size', $request->size)
            ->where('country', $request->country)
            ->where('uses', $request->uses)
            ->paginate(6)
            ->appends('style', $request->style)
            ->appends('size', $request->size)
            ->appends('country', $request->country)
            ->appends('uses', $request->uses);

        return $match_cars;
    }
}
