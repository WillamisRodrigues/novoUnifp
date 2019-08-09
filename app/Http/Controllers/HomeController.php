<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $matriculas = DB::table('aluno')->get();
        // // dd($matriculas);
        // $lava = new Lavacharts();

        // $teste = $lava->DataTable();
        // $teste->addStringColumn('Teste')
        //     ->addNumberColumn('Matriculas')
        //     // ->addRow(['Matriculas', $matriculas])
        //     // ->addRow(['Matriculas', $matriculas])
        //     ->addRow(['Matriculas', $matriculas]);

        // $lava->BarChart('Title', $teste, []);

        return view('home');
    }
}
