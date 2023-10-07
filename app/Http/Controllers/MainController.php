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

    /**
     * タスクの詳細閲覧
     */
    public function detail($complete_recipe_id)
    {
        //
        return $this->singleTaskRender($complete_recipe_id, 'mastered.recipe');
    }

     /**
     * 「単一のタスク」Modelの取得
     */
    protected function getCompletedRecipeModel($complete_recipe_id)
    {
        // task_idのレコードを取得する
        $complete_recipe = CompletedRecipeModel::find($complete_recipe_id);
        if ($complete_recipe === null) {
            return null;
        }
        // 本人以外のタスクならNGとする
        if ($complete_recipe->user_id !== Auth::id()) {
            return null;
        }
        //
        return $complete_recipe;
    }

    protected function singleTaskRender($complete_recipe_id, $template_name)
    {
        // task_idのレコードを取得する
        $complete_recipe = $this->getCompletedRecipeModel($complete_recipe_id);
        if ($complete_recipe === null) {
            return redirect('/main/menu');
        }

        // テンプレートに「取得したレコード」の情報を渡す
        return view($template_name, ['complete_recipe' => $complete_recipe]);
    }

}
