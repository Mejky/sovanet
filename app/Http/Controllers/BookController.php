<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller{

    public function createBook(Request $request){

        $author = Author::find($request->input('author'));

        if ($author == NULL) {

            return response()->json('Author do not exists.');

        } else {

        $book = Book::create($request->all());

        $book->author = Author::find($book->author);

        return response()->json($book); }

    }

    public function updateBook(Request $request){

        $book  = Book::find($request->input('id'));

        if ($book == NULL) {

            return response()->json('Book do not exists.');

        } else {

            $author = Author::find($request->input('author'));

            if ($author == NULL) {

                return response()->json('Author do not exists.');

            } else {

        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->save();

        $book->author = Author::find($book->author);

        return response()->json($book);

        } }
    }

    public function deleteBook($id){

        $book  = Book::find($id);

        if ($book == NULL) {

            return response()->json(['error' => 'Bad request'], 400);


        } else {

        $book->delete();

        return response()->json('Removed successfully.');

        }
    }

    public function showBook($id)
    {
        $book  = Book::find($id);

        if ($book == NULL) {

            return response()->json(['error' => 'Bad request'], 400);


        } else {

        $book->author = Author::find($book->author);

        return response()->json($book);

        }
    }

    public function index(){

        $book  = Book::all();

        $books = json_decode($book);

        foreach ($books as $row) {

            $response[$row->id] = Book::find($row->id);
            $response[$row->id]->author = Author::find($response[$row->id]->author);

        }

        if (!empty(response()->json($response))) {

            return response()->json($response);
        }

        else {

            return response()->json('Empty result.');

        }

}
}
?>
