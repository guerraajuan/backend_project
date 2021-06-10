<?php

namespace App\Http\Controllers;

use App\About;
use App\Mail\AboutMail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Mail;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repo["abouts"] = About::all();
        return view("about.index", $repo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("about.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dump($request->All()); //imprimo en pantalla lo que se trae del formulario
        $data = $request->except("_token"); //elimina el elemento token que no es necesario
        //dump($data); muestra informacion sin token
        //die(); detiene la ejecucuion
        About::insert($data);
        return redirect()->route("about.index");
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = About::findOrFail($id);
        return view("about.edit")->with(["about" =>$data]);
    }
    public function search(Request $request)
    {
       $search = $request->input('search');
       $result = About::select()
       ->where("name", "like", "%$search%")
       ->orwhere("email", "like", "%$search%")
       ->get();
       return view("about.index")->with(["abouts" => $result]);
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
       // dump($id);
        //dump($request->all());
        //die();

        $data =$request->except("_token", "_method");
        About::where("id","=",$id)->update($data);
        return redirect()->route("about.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::destroy($id);
        return redirect()->route("about.index");
    }

    public function saveApi(Request $request)
    {
        $data = $request->all();
        //dd($data);
        try {
            About::insert($data);
            Mail::to($data["email"])->send(new AboutMail($data));
        } catch (\Throwable $th) {
            return response()->json(["message"=> "Se genero un error {$th->getMessage()}"],404);
        }
        return response()->json(["message"=> "Se creo el registro con exito "],201);
    }




}
