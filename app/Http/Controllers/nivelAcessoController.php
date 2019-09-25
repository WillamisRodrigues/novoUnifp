<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenivelAcessoRequest;
use App\Http\Requests\UpdatenivelAcessoRequest;
use App\Repositories\nivelAcessoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Response;

class nivelAcessoController extends AppBaseController
{
    /** @var  nivelAcessoRepository */
    private $nivelAcessoRepository;

    public function __construct(nivelAcessoRepository $nivelAcessoRepo)
    {
        $this->nivelAcessoRepository = $nivelAcessoRepo;
    }

    /**
     * Display a listing of the nivelAcesso.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function atualizarPermissoes(Request $request)
    {
        PermissionController::temPermissao('nivel_acesso.edit');
        $permissoes = DB::table('permission_role')->where('role_id', $request->permissao)->get();
        if ($permissoes) {
            DB::delete('delete from permission_role where role_id = ?', [$request->permissao]);
        }

        $chaves = $request->keys();
        unset($chaves[0]);
        unset($chaves[1]);

        $listaInsert = [];
        foreach ($chaves as $chave) {
            $listaInsert[] = [
                'permission_id'  => $chave,
                'role_id'    => $request->permissao,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }

        DB::table('permission_role')->insert($listaInsert);

        return redirect(route('nivelAcessos.index'));
    }

    public function index(Request $request)
    {
        PermissionController::temPermissao('nivel_acesso.index');
        $nivelAcessos = DB::table('roles')->where('deleted_at', null)->get();

        return view('nivel_acessos.index')
            ->with('nivelAcessos', $nivelAcessos);
    }

    /**
     * Show the form for creating a new nivelAcesso.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('nivel_acesso.update');
        return view('nivel_acessos.create');
    }

    /**
     * Store a newly created nivelAcesso in storage.
     *
     * @param CreatenivelAcessoRequest $request
     *
     * @return Response
     */
    public function store(CreatenivelAcessoRequest $request)
    {
        PermissionController::temPermissao('nivel_acesso.update');
        $input = $request->all();

        $nivelAcesso = DB::insert('insert into roles (name, slug, description, system, created_at, updated_at) values (?, ?, ?, ?, ?, ?)', [$request->name, $request->name, $request->description, 0, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

        Flash::success('Nivel de Acesso salvo com sucesso.');

        return redirect(route('nivelAcessos.index'));
    }

    /**
     * Display the specified nivelAcesso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('nivel_acesso.index');

        $nivelAcesso = DB::table('roles')->where([['deleted_at', '=', null], ['id', '=', $id]])->get();

        if (empty($nivelAcesso)) {
            Flash::error('Nivel de acesso não encontrado.');

            return redirect(route('nivelAcessos.index'));
        }

        return view('nivel_acessos.show')->with('nivelAcesso', $nivelAcesso);
    }

    /**
     * Show the form for editing the specified nivelAcesso.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('nivel_acesso.edit');
        $nivelAcesso = DB::table('roles')->where([['deleted_at', '=', null], ['id', '=', $id]])->get()->first();
        $permissoes_concedidas = DB::table('permission_role')->where('role_id', $id)->get();
        $resources = DB::table('permissions')->select('resource')->groupBy('resource')->get();
        $permissoes = DB::table('permissions')->get();
        // dd($permissoes_concedidas);

        if (empty($nivelAcesso)) {
            Flash::error('Nivel de acesso não encontrado.');

            return redirect(route('nivelAcessos.index'));
        }

        return view('nivel_acessos.edit', ['nivelAcesso' => $nivelAcesso, 'permissoes' => $permissoes, 'permissoes_concedidas' => $permissoes_concedidas, 'resources' => $resources]);
    }

    /**
     * Update the specified nivelAcesso in storage.
     *
     * @param int $id
     * @param UpdatenivelAcessoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenivelAcessoRequest $request)
    {
        PermissionController::temPermissao('nivel_acesso.edit');
        $nivelAcesso = DB::table('roles')->where([['deleted_at', '=', null], ['id', '=', $id]])->get();

        if (empty($nivelAcesso)) {
            Flash::error('Nivel de acesso não encontrado.');

            return redirect(route('nivelAcessos.index'));
        }

        $nivelAcesso = $this->nivelAcessoRepository->update($request->all(), $id);

        Flash::success('Nivel de acesso atualizado com sucesso.');

        return redirect(route('nivelAcessos.index'));
    }

    /**
     * Remove the specified nivelAcesso from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('nivel_acesso.delete');
        $nivelAcesso = DB::table('roles')->where([['deleted_at', '=', null], ['id', '=', $id]])->get();

        if (empty($nivelAcesso)) {
            Flash::error('Nivel de acesso não encontrado.');

            return redirect(route('nivelAcessos.index'));
        }

        DB::update('update roles set deleted_at = ? where id = ?', [date('Y-m-d H:i:s'), $id]);

        Flash::success('Nivel de acesso deletado com sucesso.');

        return redirect(route('nivelAcessos.index'));
    }
}
