<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class CarImage extends Model
{
    // テーブル定義
    protected $table = 'car_images';

    // リレーション
    public function car()
    {
        return $this->belongsTo('App\Models\Car');
    }
    public function reports(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'reports')->withTimestamps();
    }

    // 通報済みかどうかの判定
    public function isReportedBy(User $user): bool
    {
        return (bool)$this->reports->where('id', $user->id)->count();
    }
    // 通報カウント
    public function getCountReportsAttribute(): int
    {
        return $this->reports->count();
    }
    // 画像削除
    public function deleteCarImage(Request $request)
    {
        $image = $request->image;

        $s3_delete = Storage::disk('s3')->delete($image);
        $db_delete = CarImage::where('image', $image)->delete();
    }
}
