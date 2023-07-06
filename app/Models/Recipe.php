<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    /**
     * 複数代入不可能な属性
     */
    protected $guarded = ['id'];

    /**
     * 「重要度」用の定数
     */
    const TYPE_VALUE = [
        1 => '肉',
        2 => '魚',
        3 => '野菜',
        4 => 'その他',
    ];

    /**
     * 重要度の文字列を取得する
     */
    public function getPriorityString()
    {
        return $this::TYOE_VALUE[ $this->type ] ?? '';
    }
}
