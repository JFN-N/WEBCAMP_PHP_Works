<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as UserModel;
use App\Models\CompletedRecipe as CompletedRecipeModel;

class ArchiveController extends Controller
{
    protected function getListBuilder()
    {
        return CompletedRecipeModel::where('user_id', Auth::id())
                     ->orderBy('type');
    }

    public function list()
    {
        $group_by_column = ['users.id', 'completed_recipes.type'];
        //$list = $this->getListBuilder()
        $list = CompletedRecipeModel::select($group_by_column)
        //CompletedRecipeModel::where('user_id', Auth::user()->id)
                         ->selectRaw('count(completed_recipes.type) AS task_num')
                         ->leftJoin('users', 'users.id', '=', 'completed_recipes.user_id')
                         ->where('users.id', Auth::user()->id)
                         ->groupBy($group_by_column)
                         ->orderBy('users.id')
                         ->orderBy('completed_recipes.type')
                        ->get();

        return view('archive.data', ['list' => $list]);
    }
}
