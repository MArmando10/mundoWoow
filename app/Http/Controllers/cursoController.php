<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

// use Dompdf\Dompdf;

use App\curso;

use DB;

use Session;

class cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// dd("hola");
          $curso = curso::paginate(5);
         $anterior = [];

        return view ('curso.index',compact('anterior','curso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
         $curso = new curso;
         $curso = $curso->all();
     
        
        return view('curso.create',compact('curso','curso'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     // dd("hola");  
        $request->validate([
            'Codigo' => 'required',
            'Nombre' => 'required',
            'apellidoP'=> 'required',
            'apellidoM'=> 'required',
            'areaLaboral'=> 'required',
            'puesto'=> 'required',
            'Institucion'=> 'required'
          ]);
           DB::table('curso')->updateOrInsert(
            [
            'Codigo'=>request()->input('Codigo'),
            'Nombre'=>request()->input('Nombre'),
            'apellidoP'=>request()->input('apellidoP'),
            'apellidoM'=>request()->input('apellidoM'),
            'areaLaboral'=>request()->input('areaLaboral'),
            'puesto'=>request()->input('puesto'),
            'Institucion'=>request()->input('Institucion')     
                
]);
            Session::flash('message','guardada con exito.');
            return redirect()->route('curso.index');
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
         $curso = new curso;
         $curso = curso::find($id);

         return view('curso.edit', compact('curso','curso'));
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
        // dd("hola");
         $request->validate([

            'Codigo'=> 'required',
            'Nombre'=> 'required',
            'apellidoP'=> 'required',
            'apellidoM'=> 'required',
            'areaLaboral'=> 'required',
            'puesto'=> 'required',
            'Institucion'=> 'required',
          ]);

        $curso = curso::find($id);
        $curso->Codigo = $request->get('Codigo');
        $curso->Nombre = $request->get('Nombre');
        $curso->apellidoP = $request->get('apellidoP');
        $curso->apellidoM= $request->get('apellidoM');
        $curso->areaLaboral = $request->get('areaLaboral');
        $curso->puesto = $request->get('puesto');
        $curso->Institucion = $request->get('Institucion');

         $curso->save();

          
         return redirect()->route('curso.index')->with('success', 'guardado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = curso::find($id);
        $curso->delete();
        return redirect()->route('curso.index')->with('success', 'eliminado con exito!'); 
        // return redirect()->route('curso.index');
    }


public function download($curso )
{
    $curso = [
        'titulo' => 'Styde.net'
    ];
 
    return PDF::loadview('vista-pdf', $curso)
        ->stream('archivo.pdf');
}


function searchcurso(Request $request) {

        $anterior = $request->all();

       $curso = curso::when($request->apellido1,function($query,$request){return $query->where('apellidoP','like', $request .'%');})
                                     ->when($request->apellido2,function($query,$request){return $query->where('apellidoM','like', $request .'%');})
                                     ->when($request->nombre,function($query,$request){return $query->where('Nombre','like', $request .'%');})
                                     ->orderBy('apellidoP', 'ASC')
                                     ->orderby('apellidoM','asc')
                                     ->orderby('Nombre','asc')
                                     
                                     ->paginate(10)
                                     ->setPath ( '' );

                $curso->appends ( array (
                 'apellidoP ' => $request->apellidoP,
                 'apellidoM' => $request->apellidoM,
                 'Nombre' => $request->Nombre
                ) );

       }
  
}


