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
                     ->orderBy('created_at');
    }

    public function list()
    {
        $books = CompletedRecipeModel::selectRaw('COUNT(book_id) as count_book')
         ->get();
//echo "<pre>\n";
//var_dump($list->toArray()); exit;
        return view('admin.user.list', ['users' => $list]);
    }
}
