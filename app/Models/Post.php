<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps=false;
    protected $fillable=['idbaiviet','tieudebaiviet','mieutabaiviet','noidungbaiviet','slugbaiviet','hinhanhbaiviet','idnhanvien'];
    protected $primaryKey='idbaiviet';
    protected $table='baiviet';
}
