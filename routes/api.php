<?php

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Review;
use App\Models\Usuario;

Route::prefix('books')->group(function () {
    Route::get('/', function () {
        return Book::all();
    });

    Route::post('/', function (Request $request) {
        return Book::create($request->all());
    });

    Route::get('{id}', function ($id) {
        return Book::findOrFail($id);
    });

    Route::put('{id}', function (Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return $book;
    });

    Route::delete('{id}', function ($id) {
        Book::destroy($id);
        return response()->json(['message' => 'Deleted']);
    });

    Route::get('{id}/reviews', function ($id) {
        $book = Book::findOrFail($id);
        return $book->reviews; 
    });

    Route::get('with-details', function () {
        return Book::with(['reviews', 'author', 'genre'])->get();
    });
});

Route::prefix('authors')->group(function () {
    Route::get('/', function () {
        return Author::all();
    });

    Route::post('/', function (Request $request) {
        return Author::create($request->all());
    });

    Route::get('{id}', function ($id) {
        return Author::findOrFail($id);
    });

    Route::put('{id}', function (Request $request, $id) {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return $author;
    });

    Route::delete('{id}', function ($id) {
        Author::destroy($id);
        return response()->json(['message' => 'Deleted']);
    });

    Route::get('{id}/books', function ($id) {
        $author = Author::findOrFail($id);
        return $author->books;
    });

    Route::get('with-books', function () {
        return Author::with('books')->get();
    });
});

Route::prefix('genres')->group(function () {
    Route::get('/', function () {
        return Genre::all();
    });

    Route::post('/', function (Request $request) {
        return Genre::create($request->all());
    });

    Route::get('{id}', function ($id) {
        return Genre::findOrFail($id);
    });

    Route::put('{id}', function (Request $request, $id) {
        $genre = Genre::findOrFail($id);
        $genre->update($request->all());
        return $genre;
    });

    Route::delete('{id}', function ($id) {
        Genre::destroy($id);
        return response()->json(['message' => 'Deleted']);
    });

    Route::get('{id}/books', function ($id) {
        $genre = Genre::findOrFail($id);
        return $genre->books; 
    });

    Route::get('with-books', function () {
        return Genre::with('books')->get();
    });
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', function () {
        return Usuario::all();
    });

    Route::post('/', function (Request $request) {
        return Usuario::create($request->all());
    });

    Route::get('{id}', function ($id) {
        return Usuario::findOrFail($id);
    });

    Route::put('{id}', function (Request $request, $id) {
        $user = Usuario::findOrFail($id);
        $user->update($request->all());
        return $user;
    });

    Route::delete('{id}', function ($id) {
        Usuario::destroy($id);
        return response()->json(['message' => 'Deleted']);
    });

    Route::get('{id}/reviews', function ($id) {
        $user = Usuario::findOrFail($id);
        return $user->reviews;
    });
});

Route::prefix('reviews')->group(function () {
    Route::get('/', function () {
        return Review::all();
    });

    Route::post('/', function (Request $request) {
        return Review::create($request->all());
    });

    Route::get('{id}', function ($id) {
        return Review::findOrFail($id);
    });

    Route::put('{id}', function (Request $request, $id) {
        $review = Review::findOrFail($id);
        $review->update($request->all());
        return $review;
    });

    Route::delete('{id}', function ($id) {
        Review::destroy($id);
        return response()->json(['message' => 'Deleted']);
    });
});
