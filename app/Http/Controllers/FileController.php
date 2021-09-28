<?php

namespace App\Http\Controllers;

use App\file;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $files = File::where("userID", "=" , $user)->get();
        return view('files.index')->with('files' , $files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { $request->validate([
                // 'tilte' => "required",
                'description' => "required",
                'fileinput' => "required"
    ]);
        $file = new File();
        $file->title = $request->title ;
        $file->description = $request->description;
       $file->userID = $request->userID;
        // uplaod file

        $file_data = $request->file('fileinput');
        $fileName = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/uploads/' , $fileName);
        ####################
        $file->mainFile = $fileName;
        $file->save();

        return redirect('files');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        return view('files.show')->with('file' , $file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file = File::find($id);
        return view('files.edit')->with('file' , $file);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $request->validate([
            // 'tilte' => "required",
            'description' => "required",
            'fileinput' => "required"
]);
        $file =  File::find($id);
        $file->title = $request->title ;
        $file->description = $request->description;

        // uplaod file

        $file_data = $request->file('fileinput');
        $fileName = $file_data->getClientOriginalName();
        $file_data->move(public_path() . '/uploads/' , $fileName);
        ####################
        $file->mainFile = $fileName;
        $file->save();

        return redirect('files');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
                return redirect('files');

    }
    public function download($id)
    {
        $item = File::where('id',$id)->firstOrFail();
        $pathItem = public_path('uploads/' . $item->mainFile);
        return response()->download($pathItem );
    }
}
