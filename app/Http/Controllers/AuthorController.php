<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Http\Resources\AuthorResource;
use PHPUnit\Runner\Exception;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authors = Author::paginate(10);
        return AuthorResource::collection($authors);
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
        $author = new Author();

        DB::beginTransaction();
        try {

            $author->name = $request->name;
            $author->pen_name = $request->pen_name;

            $author->save();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();

            return $ex->getMessage();
        }


        return new AuthorResource($author);
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
        $author = Author::findOrFail($id);

        return new AuthorResource($author);
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
        $author = Author::findOrFail($id);

        if ($author) {

            DB::beginTransaction();
            try {

                $author->name = $request->name;
                $author->pen_name = $request->pen_name;

                $author->save();
                DB::commit();
            } catch (\Exception $ex) {
                DB::rollback();

                return $ex->getMessage();
            }
        }

        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);

        if ($author->delete()) {
            return new AuthorResource($author);
        }
    }
}
