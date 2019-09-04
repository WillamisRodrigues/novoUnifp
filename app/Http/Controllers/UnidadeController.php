<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateUnidadeRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateUnidadeRequest;
use App\Repositories\UnidadeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



use Illuminate\Http\Request;
use Flash;
use Response;

class UnidadeController extends AppBaseController
{
    /** @var  UnidadeRepository */
    private $unidadeRepository;

    public function __construct(UnidadeRepository $unidadeRepo)
    {
        $this->unidadeRepository = $unidadeRepo;
    }

    /**
     * Display a listing of the Unidade.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $unidades = $this->unidadeRepository->all();

        return view('unidades.index')
            ->with('unidades', $unidades);
    }

    public static function getUnidade()
    {
        $usuario = DB::table('users')->where('id', Auth::user()->id)->get('idUnidade')->first();

        if ($usuario->idUnidade) {
            $unidade = $usuario->idUnidade;
            $nomeUnidade = DB::table('unidade')->where('id', $unidade)->get()->first();
            Session::put('nomeUnidade', $nomeUnidade);
        } else {
            $unidade = Session::get('unidade');
            Session::put('nomeUnidade', "");
        }
        return $unidade;
    }

    /**
     * Show the form for creating a new Unidade.
     *
     * @return Response
     */
    public function create()
    {
        $unidades = DB::table('unidade')->get();
        return view('unidades.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created Unidade in storage.
     *
     * @param CreateUnidadeRequest $request
     *
     * @return Response
     */
    public function store(CreateUnidadeRequest $request)
    {
        $input = $request->all();

        $unidade = $this->unidadeRepository->create($input);

        if($request->file('Logotipo')){
            $caminho = $request->file('Logotipo')->store('imagens/logotipos');
            $path = Storage::disk('public')->putFile('logotipos-unidades', $request->file('Logotipo'));
            DB::update('update unidade set Logotipo = ? where id = ?', [$path, $unidade->id]);
        }

        Flash::success('Unidade criada com sucesso.');

        return redirect(route('unidades.index'));
    }

    /**
     * Display the specified Unidade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unidade = $this->unidadeRepository->find($id);

        if (empty($unidade)) {
            Flash::error('Unidade não encontrada.');

            return redirect(route('unidades.index'));
        }

        return view('unidades.show')->with('unidade', $unidade);
    }

    /**
     * Show the form for editing the specified Unidade.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unidade = $this->unidadeRepository->find($id);
        $unidades = DB::table('unidade')->get();

        if (empty($unidade)) {
            Flash::error('Unidade não encontrada.');

            return redirect(route('unidades.index'));
        }

        return view('unidades.edit', ['unidades' => $unidades, 'unidade' => $unidade]);
    }

    /**
     * Update the specified Unidade in storage.
     *
     * @param int $id
     * @param UpdateUnidadeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnidadeRequest $request)
    {
        $unidade = $this->unidadeRepository->find($id);

        if (empty($unidade)) {
            Flash::error('Unidade não encontada.');

            return redirect(route('unidades.index'));
        }

        $unidade = $this->unidadeRepository->update($request->all(), $id);

        Flash::success('Unidade atualizada com sucesso.');

        return redirect(route('unidades.index'));
    }

    /**
     * Remove the specified Unidade from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unidade = $this->unidadeRepository->find($id);

        if (empty($unidade)) {
            Flash::error('Unidade não encontrada.');

            return redirect(route('unidades.index'));
        }

        $this->unidadeRepository->delete($id);

        Flash::success('Unidade deletada com sucesso.');

        return redirect(route('unidades.index'));
    }
}
