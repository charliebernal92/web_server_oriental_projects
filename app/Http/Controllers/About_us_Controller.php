<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Abouts;

class About_us_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = Abouts::all();
        $abouts = $about[0];
        return view('about_us.show', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $about_us = Abouts::all();
        return view('about_us.create', compact('about_us'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about_us = new Abouts();
        $about_us->about_us_string = $request->about_us_text;
        $about_us->save();

        $about = Abouts::all();
        $abouts = $about[0];
        return view('about_us.show', compact('abouts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about_tbl = new Abouts();

        $about = $about_tbl::where('id', $id)->first();
        return view('about_us.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about_tbl = new Abouts();
        $about = $about_tbl::where('id', $id)->first();
        $about->about_us_string = $request->about_us_text;
        $about->save();

        return redirect('/about_us');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
