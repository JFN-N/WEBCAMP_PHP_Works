<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Completed_Recipe extends Model
{
    use HasFactory;

    /**
     * 複数代入不可能な属性
     */
    protected $guarded = [];

    public function getCountAmount()
    {
      return DB::table('completed_recipes')
              ->select('completed_recipes_type')
              ->selectRaw('COUNT(completed_recipes_type) as count_type')
              ->groupBy('completed_recipes_type')
              ->get();
    }
}
