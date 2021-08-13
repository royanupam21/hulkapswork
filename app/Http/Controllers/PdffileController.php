<?php

namespace App\Http\Controllers;

use App\Pdffile;
use Illuminate\Http\Request;

class PdffileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pdffile::all();
        //dd($bans);
        echo json_encode($datas);
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
        
        
        $path = 'uploads/pfile';
        \File::makeDirectory($path, 0777, true, true);
        if ($request->hasFile('thumbimage')){

            $fileName = time().'.'.$request->thumbimage->getClientOriginalExtension();
            $request->thumbimage->move($path, $fileName);
            $obj = new Pdffile();
            $obj->title = $fileName;
            $obj->author = "";
            $obj->purl = $path.'/'.$fileName;
            $obj->save();
        }else{
            //$noticeboard->attachment1 = '-';
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pdffile  $pdffile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas=Teacher::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pdffile  $pdffile
     * @return \Illuminate\Http\Response
     */
    public function edit(Pdffile $pdffile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pdffile  $pdffile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pdffile $pdffile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pdffile  $pdffile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pdffile $pdffile)
    {
        //
    }
}
