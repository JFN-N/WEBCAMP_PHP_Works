<?php

declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CompletedRecipe as CompletedRecipeModel;

class CompletedRecipeController extends Controller
{
    protected function getListBuilder()
    {
        return CompletedRecipeModel::where('user_id', Auth::id())
                     ->orderBy('name', 'DESC')
                     ->orderBy('type');
    }

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
    public function getTypeString()
    {
        return $this::TYPE_VALUE[ $this->type ] ?? '';
    }

    /**
     * タスク一覧ページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        // 1Page辺りの表示アイテム数を設定
        $per_page = 10;

        // 一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);
/*
$sql = $this->getListBuilder()
            ->toSql();
echo "<pre>\n"; var_dump($sql, $list); exit;
var_dump($sql);
*/
        //
        return view('recipe.completed_list', ['list' => $list]);
    }
}
