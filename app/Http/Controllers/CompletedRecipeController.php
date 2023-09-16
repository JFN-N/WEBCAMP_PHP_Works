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
     * タスク一覧ページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        // 1Page辺りの表示アイテム数を設定
        $per_page = 7;

        // 一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);

        //
        return view('recipe.completed_list', ['list' => $list]);
    }
}
