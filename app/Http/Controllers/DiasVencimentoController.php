<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiasVencimentoRequest;
use App\Http\Requests\UpdateDiasVencimentoRequest;
use App\Repositories\DiasVencimentoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DiasVencimentoController extends AppBaseController
{
    /** @var  DiasVencimentoRepository */
    private $diasVencimentoRepository;

    public function __construct(DiasVencimentoRepository $diasVencimentoRepo)
    {
        $this->diasVencimentoRepository = $diasVencimentoRepo;
    }

    /**
     * Display a listing of the DiasVencimento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        PermissionController::temPermissao('dias_vencimentos.index');
        $unidade = UnidadeController::getUnidade();
        $diasVencimentos = $this->diasVencimentoRepository->all();

        return view('dias_vencimentos.index')
            ->with('diasVencimentos', $diasVencimentos);
    }

    /**
     * Show the form for creating a new DiasVencimento.
     *
     * @return Response
     */
    public function create()
    {
        PermissionController::temPermissao('dias_vencimentos.update');
        return view('dias_vencimentos.create');
    }

    /**
     * Store a newly created DiasVencimento in storage.
     *
     * @param CreateDiasVencimentoRequest $request
     *
     * @return Response
     */
    public function store(CreateDiasVencimentoRequest $request)
    {
        PermissionController::temPermissao('dias_vencimentos.update');
        $input = $request->all();

        $diasVencimento = $this->diasVencimentoRepository->create($input);

        $unidade = UnidadeController::getUnidade();
        DB::update('update dias_vencimento set idUnidade = ? where id = ?', [$unidade, $diasVencimento->id]);

        Flash::success('Dias Vencimento saved successfully.');

        return redirect(route('diasVencimentos.index'));
    }

    /**
     * Display the specified DiasVencimento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        PermissionController::temPermissao('dias_vencimentos.index');
        $diasVencimento = $this->diasVencimentoRepository->find($id);

        if (empty($diasVencimento)) {
            Flash::error('Dias Vencimento not found');

            return redirect(route('diasVencimentos.index'));
        }

        return view('dias_vencimentos.show')->with('diasVencimento', $diasVencimento);
    }

    /**
     * Show the form for editing the specified DiasVencimento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        PermissionController::temPermissao('dias_vencimentos.edit');
        $diasVencimento = $this->diasVencimentoRepository->find($id);

        if (empty($diasVencimento)) {
            Flash::error('Dias Vencimento not found');

            return redirect(route('diasVencimentos.index'));
        }

        return view('dias_vencimentos.edit')->with('diasVencimento', $diasVencimento);
    }

    /**
     * Update the specified DiasVencimento in storage.
     *
     * @param int $id
     * @param UpdateDiasVencimentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiasVencimentoRequest $request)
    {
        PermissionController::temPermissao('dias_vencimentos.edit');
        $diasVencimento = $this->diasVencimentoRepository->find($id);

        if (empty($diasVencimento)) {
            Flash::error('Dias Vencimento not found');

            return redirect(route('diasVencimentos.index'));
        }

        $diasVencimento = $this->diasVencimentoRepository->update($request->all(), $id);

        Flash::success('Dias Vencimento updated successfully.');

        return redirect(route('diasVencimentos.index'));
    }

    /**
     * Remove the specified DiasVencimento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        PermissionController::temPermissao('dias_vencimentos.delete');
        $diasVencimento = $this->diasVencimentoRepository->find($id);

        if (empty($diasVencimento)) {
            Flash::error('Dias Vencimento not found');

            return redirect(route('diasVencimentos.index'));
        }

        $this->diasVencimentoRepository->delete($id);

        Flash::success('Dias Vencimento deleted successfully.');

        return redirect(route('diasVencimentos.index'));
    }
}
