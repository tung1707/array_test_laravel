<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable =[
        'taginfo'
    ];

    protected $casts = [
        'taginfo' =>'array'
    ];

    public function insertpost($taginfo)
    {
        $data = Post::create([
            'taginfo'=> $taginfo
        ]);

        //DB::table();
        return $data;
    }
}
