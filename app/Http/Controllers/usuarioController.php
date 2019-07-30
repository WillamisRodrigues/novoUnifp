<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateusuarioRequest;
use App\Http\Requests\UpdateusuarioRequest;
use App\Repositories\usuarioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class usuarioController extends AppBaseController
{
    /** @var  usuarioRepository */
    private $usuarioRepository;

    public function __construct(usuarioRepository $usuarioRepo)
    {
        $this->usuarioRepository = $usuarioRepo;
    }

    /**
     * Display a listing of the usuario.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $usuarios = $this->usuarioRepository->all();

        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new usuario.
     *
     * @return Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created usuario in storage.
     *
     * @param CreateusuarioRequest $request
     *
     * @return Response
     */
    public function store(CreateusuarioRequest $request)
    {
        $input = $request->all();

        $usuario = $this->usuarioRepository->create($input);

        Flash::success('Usuario salvo com sucesso.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Display the specified usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            Flash::error('Usuario não encontrado.');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.show')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified usuario.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            Flash::error('Usuario não encontrado.');

            return redirect(route('usuarios.index'));
        }

        return view('usuarios.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified usuario in storage.
     *
     * @param int $id
     * @param UpdateusuarioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateusuarioRequest $request)
    {
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            Flash::error('Usuario não encontrado.');

            return redirect(route('usuarios.index'));
        }

        $usuario = $this->usuarioRepository->update($request->all(), $id);

        Flash::success('Usuario atualizado com sucesso.');

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified usuario from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuario = $this->usuarioRepository->find($id);

        if (empty($usuario)) {
            Flash::error('Usuario não encontrado.');

            return redirect(route('usuarios.index'));
        }

        $this->usuarioRepository->delete($id);

        Flash::success('Usuario deletado com sucesso.');

        return redirect(route('usuarios.index'));
    }
}
