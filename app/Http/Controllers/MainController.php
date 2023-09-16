<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\CompletedRecipe as CompletedRecipeModel;

class MainController extends Controller
{
    public function index()
    {
        return view('main.menu');
    }

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
        $per_page = 5;

        // 一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);

        return view('main.menu',['list' => $list]);
    }

}
