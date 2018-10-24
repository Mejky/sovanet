<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorController extends Controller{

    public function createAuthor(Request $request){

        $author = Author::create($request->all());

        return response()->json($author);

    }

    public function updateAuthor(Request $request){

        $author  = Author::find($request->input('id'));

        if ($author == NULL) {

            return response()->json(['error' => 'Bad request'], 400);

        } else {

        $author->first_name = $request->input('first_name');
        $author->last_name = $request->input('last_name');
        $author->save();

        return response()->json($author);

        }
    }

    public function deleteAuthor($id){
        $author  = Author::find($id);

        if ($author == NULL) {

            return response()->json(['error' => 'Bad request'], 400);

        } else {

        $author->delete();

            return response()->json('Removed successfully.');

        }
    }

    public function showAuthor($id)
    {
        $author  = Author::find($id);

        return response()->json($author);
    }

    public function index(){

        $author  = Author::all();

        if (!empty(response()->json($author))) {

            return response()->json($author);
        }

        else {

            return response()->json('Empty result.');

        }

}
}
?>