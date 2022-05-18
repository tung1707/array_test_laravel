<?php

namespace App\Http\Controllers;

use App\Http\Resources\IndexResource;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $tag;
    public function __construct()
    {
        $this->tag = new Tag();
    }

    public function index()
    {
        //
        //$tagnumber = Tag::count('id');
        $tagnumber = Tag::pluck('id');
        $taginfo = [];
        $i = 1;
        foreach($tagnumber as $id){
            $taginfo[$id] = [
                "taginfo" => Tag::where('id',$id)->first(),
                "postusetag" => DB::table('tag_post')
                    ->where('tag_id', $id)
                    ->count('post_id')
            ];
            $i++;
        }
        return response()->json([
            "taginfo" => $taginfo
        ]);

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
        $content= $request->content;
        $colorcode = $request->colorcode;
        $insert = $this->tag->InsertTag($content,$colorcode);
        if ($insert->save()) {
            return new IndexResource($insert);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $taginfo = Tag::find($id)->first();

        $postusetag = DB::table('tag_post')
            //->join('tag_post','tag.id','=','tag_post.tag_id')
            //->distinct('tag_id')
            //->select('tag.*','count(tag_post.post_id) as postusetag')
            ->where('tag_id', $id)
            ->count('post_id');
        return response()->json([
            'taginfo' => $taginfo,
            'postusetag' => $postusetag
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $response = [];
            $update = $this->tag->findid($id);
            $update->content  = $request->content;
            $update->colorcode = $request->colorcode;
            if ($update->save()) {
                $response["status"] = "Successs";
                $response["message"] = "UPDATE TAG SUCCESS";
                return response()->json($response);
            }
        } catch (Exception $exception) {
            $response["status"] = "ERROR";
            $response["message"] = "UPDATE TAG FAIL";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $response = [];
        $destroy = $this->tag->findid($id);
        if ($destroy->delete()) {
            $response["status"] = "Successs";
            $response["message"] = "DELETE TAG SUCCESS";
            return response()->json($response);
        }
    }
}
