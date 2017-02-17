<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

/**
 * Class BookController
 * @package App\Http\Controllers
 * @Resource("Books", uri="/api/book")
 */
class BookController extends Controller
{
    /**
     * List all books.
     *
     * @return \Illuminate\Http\Response
     *
     * @Get("/")
     */
    public function index()
    {
        return response(Book::with('book_category')->get());
    }

    /**
     * Store a book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @Request("book_category_id=book_category_id&title=title&author=author", contentType="application/x-www-form-urlencoded")
     * @Post("/")
     * @Parameters({
     *     @Parameter("book_category_id",required=true, description="Book Category ID"),
     *     @Parameter("title", required=true, description="Book Title"),
     *     @Parameter("author",required=true, description="Book Author"),
     * })
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());
        return Book::where('id',$book->id)->with('book_category')->first();
    }

    /**
     * Display a book.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @Get("/{id}")
     * @Parameters({
     *     @Parameter("id",required=true, description="Book ID"),
     * })
     */
    public function show($id)
    {
        return response(Book::where('id',$id)->with('book_category')->first());
    }

    /**
     * Update a book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @Patch("/{id}")
     * @Parameters({
     *     @Parameter("id",required=true, description="Book ID"),
     * })
     */
    public function update(Request $request, $id)
    {
        Book::find($id)->update($request->all());
        return response(Book::where('id',$id)->with('book_category')->first());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @Delete("/{id}")
     * @Parameters({
     *     @Parameter("id",required=true, description="Book ID"),
     * })
     */
    public function destroy($id)
    {
        return response(Book::destroy($id));
    }
}
