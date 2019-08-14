<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFuncionarioRequest;
use App\Http\Requests\UpdateFuncionarioRequest;
use App\Repositories\FuncionarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FuncionarioController extends AppBaseController
{
    /** @var  FuncionarioRepository */
    private $funcionarioRepository;

    public function __construct(FuncionarioRepository $funcionarioRepo)
    {
        $this->funcionarioRepository = $funcionarioRepo;
    }

    /**
     * Display a listing of the Funcionario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $funcionarios = $this->funcionarioRepository->all();

        return view('funcionarios.index')
            ->with('funcionarios', $funcionarios);
    }

    public function aniversario(Request $request)
    {
        $funcionarios = $this->funcionarioRepository->all();

        return view('funcionarios.aniversario')
            ->with('funcionarios', $funcionarios);
    }

    /**
     * Show the form for creating a new Funcionario.
     *
     * @return Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created Funcionario in storage.
     *
     * @param CreateFuncionarioRequest $request
     *
     * @return Response
     */
    public function store(CreateFuncionarioRequest $request)
    {
        $input = $request->all();

        $funcionario = $this->funcionarioRepository->create($input);

        Flash::success('Funcionário salvo com sucesso.');

        return redirect(route('funcionarios.index'));
    }

    /**
     * Display the specified Funcionario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        return view('funcionarios.show')->with('funcionario', $funcionario);
    }

    /**
     * Show the form for editing the specified Funcionario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        return view('funcionarios.edit')->with('funcionario', $funcionario);
    }

    /**
     * Update the specified Funcionario in storage.
     *
     * @param int $id
     * @param UpdateFuncionarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFuncionarioRequest $request)
    {
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        $funcionario = $this->funcionarioRepository->update($request->all(), $id);

        Flash::success('Informações do funcionário atualizadas com sucesso.');

        return redirect(route('funcionarios.index'));
    }

    /**
     * Remove the specified Funcionario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $funcionario = $this->funcionarioRepository->find($id);

        if (empty($funcionario)) {
            Flash::error('Funcionário não encontrado.');

            return redirect(route('funcionarios.index'));
        }

        $this->funcionarioRepository->delete($id);

        Flash::success('Funcionário deletado com sucesso.');

        return redirect(route('funcionarios.index'));
    }
}
