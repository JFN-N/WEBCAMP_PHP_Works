<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User as UserModel;
use App\Models\completed_shopping_lists as completed_shopping_listsModel;

class ArchiveController extends Controller
{
    protected function getListBuilder()
    {
        return completed_shopping_listsModel::where('user_id', Auth::id())
                     ->orderBy('type');
                     //->orderBy('created_at');
    }
}
