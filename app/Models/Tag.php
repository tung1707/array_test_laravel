<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    protected $fillable=[
        'content',
        'colorcode'
    ];
    public function SelectAll()
    {
        return Tag::all();
    }
    
    public function InsertTag($content,$colorcode)
    {
        $data = [
            'content'=> $content,
            'colorcode'=>$colorcode
        ];
        return Tag::create($data);
    }
    
    public function findid($id)
    {
        return Tag::find($id);
    }
}
