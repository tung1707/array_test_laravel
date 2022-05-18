<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        //
        //return Post::all();
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $taginfo = $request->tagid;
        $data = [];
        //lay value roi
       // DB::table('tag')->where('id', $tag)
        $i = 0;
        foreach ($taginfo as $tag) {
            var_dump(DB::table('tag')
            ->where('id', $tag)
            ->select('*')
            ->get());
            
           array_push($data,DB::table('tag')
                ->where('id', $tag)
                ->select('*')
                ->get());

           
                /*
            $data[$i] = DB::table('tag')
                ->where('id', $tag)
                ->select('id as tagid', 'content as tagcontent', 'colorcode')
                ->get();*/
                /*
            $i++;
            $data1 = DB::table('tag')
           ->where('id', $tag)
           ->select('id as tagid', 'content as tagcontent', 'colorcode')
           ->get()     ;
           */
           //dd("abdbs");
        }
        
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
//** OLD CODE */
/*
public function store(Request $request)
    {
        //
        //$data = ['abc','kiwi'];
        //return $this->post->insertpost($data)->save();
        $taginfo = $request->tagid;
        $data = [];/*
        foreach ($taginfo as $tag) {
            $sample =  (string) (DB::table('tag')
                ->where('id', $tag)
                ->select('id as tagid', 'content as tagcontent', 'colorcode')
                ->get());
        }


        foreach($taginfo as $tag)
        {
            $sample = (string) (DB::table('tag')
            ->where('id', $tag)
            ->select('id as tagid', 'content as tagcontent', 'colorcode')
            ->get());
            $newsample = str_replace(array ('[',']'),' ',$sample);
            $newsample2 = stripslashes($newsample);
            array_push($data,$newsample2);
        }
    
    $i=0;
    foreach($taginfo as $tag)
        {
            array_push($data,DB::table('tag')
            ->where('id', $tag)
            ->select('id as tagid', 'content as tagcontent', 'colorcode')
            ->get() );

            $data[$i] = DB::table('tag')
            ->where('id', $tag)
            ->select('id as tagid', 'content as tagcontent', 'colorcode')
            ->get();
            $i++;
        }
        $data = DB::table('tag')
            ->where('id', $tag)
            ->select('id as tagid', 'content as tagcontent', 'colorcode')
            ->get();

*/