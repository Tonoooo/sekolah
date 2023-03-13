<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class siswa extends Model
{
    use HasFactory, Sortable;
    protected $table = 'siswa';
    protected $guarded = [
        'id'
    ];
    public $timestamp = false;
}
