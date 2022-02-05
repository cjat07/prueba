<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tercero;
use App\Models\Municipio;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Tercero::all();
        return view('registro', ['datas'=> Tercero::all()]);
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

        // return $request->all();
        $search= Tercero::where('numeroidentificacion',$request->numeroidentificacion)->first();
        if($search){
            return back();
        }else{
            $new = new Tercero;
            $new->tipoidentificacion= $request->tipoidentificacion;
            $new->numeroidentificacion = $request->numeroidentificacion;
            $new->idtipotercero = $request->idtipotercero;
            $new->nombre1= $request->nombre1;
            $new->nombre2= $request->nombre2;
            $new->apellido1= $request->apellido1;
            $new->apellido2= $request->apellido2;
            $new->iddepartamento = $request->iddepartamento;
            $new->idmunicipio = $request->idmunicipio;
            $new->save();
    
            return back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Tercero::find($request->id);
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
    public function update(Request $request)
    {
        $new = Tercero::findOrFail($request->idupdate);
        $new->tipoidentificacion= $request->tipoidentificacion;
        $new->numeroidentificacion = $request->numeroidentificacion;
        $new->idtipotercero = $request->idtipotercero;
        $new->nombre1= $request->nombre1;
        $new->nombre2= $request->nombre2;
        $new->apellido1= $request->apellido1;
        $new->apellido2= $request->apellido2;
        $new->iddepartamento = $request->iddepartamento;
        $new->idmunicipio = $request->idmunicipio;
        $new->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tercero::where('id', $id)->delete();
        return back();
    }

    public function search(Request $request){
        return Municipio::select('id','nombmuni')->where('iddepa',$request->id)->get();
    }
}
