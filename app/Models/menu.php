<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $guarded = ['id'];

    public function kategori(){
        return $this->belongsTo(kategori::class);
    }
}
