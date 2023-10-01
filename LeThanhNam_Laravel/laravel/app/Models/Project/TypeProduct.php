<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeProduct extends Model
{
    use HasFactory;

    protected $table = 'typeproduct';

    public function getAllTypeProduct()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }
}
