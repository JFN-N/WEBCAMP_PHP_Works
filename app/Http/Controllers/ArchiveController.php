<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as UserModel;
use App\Models\Completed_Recipe as CompletedRecipeModel;

class ArchiveController extends Controller
{
    protected function getListBuilder()
    {
        return completed_shopping_listsModel::where('user_id', Auth::id())
                     ->orderBy('type');
                     //->orderBy('created_at');
    }
}
