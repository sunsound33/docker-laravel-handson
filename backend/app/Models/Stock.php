<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Stock extends Model
{
    use Sortable;


    public $sortable = ['id','fee']; 
    protected $guarded = [
        'id'
      ];
}
