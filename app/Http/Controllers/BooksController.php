<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //for usage of storage
use App\Models\Book; //connect to database

class BooksController extends Controller
{
    public function __construct()
    {
        //if guest show only in exception
        //exception using function name in this controller
        $this->middleware('auth', ['except' =>['index','show','ubah']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = Book::all();
    //    return $data;
       //$data = Book::orderBy('title', 'asc')->paginate(1);
       return view('books/index')->with('books', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'title'=>'required|max:6',
            'description'=>'required',
            'cover'=>'image|nullable|max:1999'
        ]);


        if($request->hasFile('cover'))
        {
            //filename with extension
            //store file in folder insert name to database
            $fileNameWithExt = $request->file('cover')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'-'.time().'.'.$extension;

            $upload = $request->file('cover')->storeAs('public/cover', $fileNameToStore);

        }
        else
        {
            $fileNameToStore = 'noimage.jpg';
        }

        $data = new Book;
        $data->title = $request->title;
        $data->desc = $request->description;
        $data->genre = $request->genre;
        $data->cover = $fileNameToStore;
        $data->user_id = auth()->user()->id;
        $data->save();

        return redirect('/books')->with('success','Data Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Book::find($id);
        //return $data;
        return view('books/show')->with('book', $data);
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
        $data = Book::find($id);
        if(auth()->user()->id !== $data->user_id)
        {
            return redirect('/books')->with('error', 'Action Not Allowed');
        }
        return view('books/edit')->with('book', $data);

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
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);


        if($request->hasFile('cover'))
        {
            //filename with extension
            //store file in folder insert name to database
            $fileNameWithExt = $request->file('cover')->getClientOriginalName();

            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('cover')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'-'.time().'.'.$extension;

            $upload = $request->file('cover')->storeAs('public/cover', $fileNameToStore);

        }

        //
        //return $request->input();
        $data = Book::find($id);
        $data->title = $request->title;
        $data->desc = $request->description;
        $data->genre = $request->genre;
        if($request->hasFile('cover'))
        {
        $data->cover = $fileNameToStore;
        }
        $data->update();

        return redirect('books/'.$id)->with('success','Data Successfully Updated');
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
        $data = Book::find($id);
        if($data->cover!='noimage.jpg')
        {
            Storage::delete('public/cover/'.$data->cover);
        }
        $data->delete();

        return redirect('books')->with('error','Data Successfully Deleted');
    }

    public function ubah()
    {
        $a = "selamat belajar laravel";
        $out = ucwords($a); 

        echo "Original String: ".$a."<br>";
        echo "Output ucwords: ".ucwords($a)."<br>"; //automatic change first letter into uppercase
        echo "Output upper: ".strtoupper($a)."<br>"; //automatic change all letters into uppercase
        echo "Output lower: ".strtolower($a)."<br>"; //automatic change all letters into lowercase
        
        //choose string
        $b = substr($a, 8,-3);
        echo "Output upper: ".strtoupper($b)."<br>"; 

        $gab = strtoupper($a).$b;
        echo $gab;
    }
}
