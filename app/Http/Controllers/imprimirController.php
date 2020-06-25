<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\pdf;
use DB;
use app\curso;
use Session;
class imprimirController extends Controller
{
     public function index()
    {
    	// dd("hola");
          // $pdf = pdf::paginate(10);
          $pdf = pdf::paginate();	
          // $curso = pdf::paginate(5);
         $curso = [];

        return view('pdf.index',compact('pdf','curso'));
    }

public function download()
{
    $curso = [
        'titulo' => 'Styde.net'
    ];
 
    // return PDF::strema('vista-pdf', $curso)
        // ->download('archivo.pdf');
    $pdf = \PDF::loadView('pdf.index');
     return $pdf->download('vista.pdf',$curso);

}
}
