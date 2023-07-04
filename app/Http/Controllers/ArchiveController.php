<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as UserModel;
use App\Models\completed_shopping_lists as completed_shopping_listsModel;

class ArchiveController extends Controller
{
    public function list()
    {
        $group_by_column = ['users.id', 'users.name'];
        $recipe = RecipeModel::select($group_by_column)
        //$list = completed_shopping_listsModel::select($group_by_column)
                         ->selectRaw('count(completed_shopping_lists.id) AS task_num')
                         ->leftJoin('completed_shopping_lists', 'users.id', '=', 'completed_shopping_lists.user_id')
                         ->groupBy($group_by_column)
                         ->orderBy('users.id')
                         ->orderBy('users.name')
                        ->get();
//echo "<pre>\n";
//var_dump($list->toArray()); exit;
        return view('admin.user.list', ['recipe' => $recipe]);
    }
}
