<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public $timestamps=false;
    protected $fillable=['ngaythongke','tongtien','loinhuan','soluongban','tongdonhang'];
    protected $primaryKey='idthongke';
    protected $table='thongke';
}
