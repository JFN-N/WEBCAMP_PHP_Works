<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Requests\RecipeRegisterPostRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Recipe as RecipeModel;
use App\Models\Completed_Recipe as CompletedRecipeModel;

use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    protected function getListBuilder()
    {
        return RecipeModel::where('user_id', Auth::id())
                     ->orderBy('name', 'DESC')
                     ->orderBy('type');
    }

    public function list()
    {
        // 1Page辺りの表示アイテム数を設定
        $per_page = 20;

        // 一覧の取得
        $list = $this->getListBuilder()
                     ->paginate($per_page);
        return view('recipe.list', ['list' => $list]);
    }

    public function register(RecipeRegisterPostRequest $request)
    {
        // validate済みのデータの取得
        $datum = $request->validated();
        //
        //$user = Auth::user();
        //$id = Auth::id();
        //var_dump($datum, $user, $id); exit;

        // user_id の追加
        $datum['user_id'] = Auth::id();

        // テーブルへのINSERT
        try {
            $r = RecipeModel::create($datum);
        } catch(\Throwable $e) {
            // XXX 本当はログに書く等の処理をする。今回は一端「出力する」だけ
            echo $e->getMessage();
            exit;
        }

         $request->session()->flash('front.task_register_success', true);

        return redirect('/recipe/list');
    }

    /**
     * タスクの詳細閲覧
     */
    public function detail($recipe_id)
    {
        //
        return $this->singleTaskRender($recipe_id, 'recipe.detail');
    }

    /**
     * タスクの編集画面表示
     */
    public function edit($task_id)
    {
        //
        return $this->singleTaskRender($recipe_id, 'recipe.edit');
    }

    /**
     * 「単一のタスク」Modelの取得
     */
    protected function getRecipeModel($recipe_id)
    {
        // task_idのレコードを取得する
        $recipe = RecipeModel::find($recipe_id);
        if ($recipe === null) {
            return null;
        }
        // 本人以外のタスクならNGとする
        if ($recipe->user_id !== Auth::id()) {
            return null;
        }
        //
        return $recipe;
    }

    /**
     * 「単一のタスク」の表示
     */
    protected function singleTaskRender($recipe_id, $template_name)
    {
        // task_idのレコードを取得する
        $recipe = $this->getRecipeModel($recipe_id);
        if ($recipe === null) {
            return redirect('/recipe/list');
        }

        // テンプレートに「取得したレコード」の情報を渡す
        return view($template_name, ['recipe' => $recipe]);
    }

    /**
     * タスクの編集処理
     */
    public function editSave(RecipeRegisterPostRequest $request, $recipe_id)
    {
        // formからの情報を取得する(validate済みのデータの取得)
        $datum = $request->validated();

        // task_idのレコードを取得する
        $recipe = $this->getRecipeModel($recipe_id);
        if ($recipe === null) {
            return redirect('/recipe/list');
        }

        // レコードの内容をUPDATEする
        $recipe->name = $datum['name'];
        $recipe->type = $datum['type'];
        $recipe->detail = $datum['detail'];
/*
        // 可変変数を使った書き方(参考)
        foreach($datum as $k => $v) {
            $task->$k = $v;
        }
*/
        // レコードを更新
        $recipe->save();

        // タスク編集成功
        $request->session()->flash('front.task_edit_success', true);
        // 詳細閲覧画面にリダイレクトする
        return redirect(route('detail', ['recipe_id' => $recipe->id]));
    }

    /**
     * 削除処理
     */
    public function delete(Request $request, $recipe_id)
    {
        // task_idのレコードを取得する
        $recipe = $this->getRecipeModel($recipe_id);

        // タスクを削除する
        if ($task !== null) {
            $task->delete();
            $request->session()->flash('front.task_delete_success', true);
        }

        // 一覧に遷移する
        return redirect('/recipe/list');
    }

    /**
     * タスクの完了
     */
    public function complete(Request $request, $recipe_id)
    {
        /* タスクを完了テーブルに移動させる */
        try {
            // トランザクション開始
            DB::beginTransaction();

            // task_idのレコードを取得する
            $task = $this->getRecipeModel($recipe_id);
            if ($task === null) {
                // task_idが不正なのでトランザクション終了
                throw new \Exception('');
            }

            // tasks側を削除する
            $recipe->delete();
//var_dump($task->toArray()); exit;

            // completed_tasks側にinsertする
            $dask_datum = $recipe->toArray();
            unset($dask_datum['created_at']);
            unset($dask_datum['updated_at']);
            $r = CompletedRecipeModel::create($dask_datum);
            if ($r === null) {
                // insertで失敗したのでトランザクション終了
                throw new \Exception('');
            }
//echo '処理成功'; exit;

            // トランザクション終了
            DB::commit();
            // 完了メッセージ出力
            $request->session()->flash('front.task_completed_success', true);
        } catch(\Throwable $e) {
//var_dump($e->getMessage()); exit;
            // トランザクション異常終了
            DB::rollBack();
            // 完了失敗メッセージ出力
            $request->session()->flash('front.task_completed_failure', true);
        }

        // 一覧に遷移する
        return redirect('/recipe/list');
    }
}
