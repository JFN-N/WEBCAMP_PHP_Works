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
        $group_by_column = ['users.name', 'completed_recipe.type'];
        $recipe = UserModel::select($group_by_column)
        //$list = completed_shopping_listsModel::select($group_by_column)
        //SELECT type, COUNT(type) FROM completed_recipe GROUP BY type;
                         ->selectRaw('count(completed_recipe.type) AS recipe_num')
                         ->leftJoin('completed_recipe.type', 'users.id', '=', 'completed_recipe.user_id')
                         ->groupBy('completed_recipe.type')
                         ->orderBy('users.name')
                         ->orderBy('completed_recipe.type')
                        ->get();
//echo "<pre>\n";
//var_dump($list->toArray()); exit;
        return view('archive.data', ['recipe' => $recipe]);
    }
}
