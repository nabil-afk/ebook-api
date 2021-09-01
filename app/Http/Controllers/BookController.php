<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::all();
        return [
            "status" => "200",
            "message"=> "Load books is successs",
            "data" => $book
        ];
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
        $book = new Book();
        $book->title = $request->title;
        $book->description = $request->description;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->page = $request->page;
        $book->save();
        if($book->save()){
            return response()->json([
                'status' => 201,
                'message' => 'Data Berhasil Di Simpan!',
                'data' => $book
            ], 201);
        }
        else{
            return response()->json([
                'status' => 400,
                'message' => 'Data Belum Tersimpan!'
            ], 400);
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
        $book = Book::find($id);
        if($book){
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil ditemukan!',
                'data' => $book
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . ' tidak ditemukan!'
            ], 404);
        }
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
        $book = Book::find($id);
        if($book){
            $book->title = $request->title ? $request->title : $book->title;
            $book->description = $request->description ? $request->description : $book->description;
            $book->author = $request->author ? $request->author : $book->author;
            $book->publisher = $request->publisher ? $request->publisher : $book->publisher;
            $book->page = $request->page ? $request->page : $book->page;
            $book->save();
            return response()->json([
                'status' => 200,
                'message' => 'Data berhasil diubah!',
                'data' => $book
            ], 200);
        }
        else{
            return response()->json([
                'status' => 404,
                'message' => 'Id ' . $id . ' tidak ditemukan!'
            ], 404);
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
         $book = Book::find($id);
        if($book){
            $book->delete();
            return [
                "status" => "204",
                "message" => "Remove book is success"
            ];
        }else{
            return [
                "status" => "405",
                "message" => "Book not found"
            ];
        }
        
    }
}
