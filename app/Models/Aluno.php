<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Aluno
 * @package App\Models
 * @version July 31, 2019, 7:49 pm UTC
 *
 * @property string Nome
 * @property string Sexo
 * @property string NascimentoAluno
 * @property string EstadoCivilAluno
 * @property string ProfissaoAluno
 * @property string RgAluno
 * @property string CpfAluno
 * @property string Escolaridade
 * @property string Email
 * @property string Curso
 * @property string Turma
 * @property string Parcelamento
 * @property string Vencimento
 * @property string Mae
 * @property string Pai
 * @property string Conheceu
 * @property string Vendedor
 * @property string DataCadastro
 * @property string Parentesco
 * @property string Pagador
 * @property string NascimentoContratante
 * @property string EstadoCivilContratante
 * @property string ProfissaoContratante
 * @property string RgContratante
 * @property string CpfContratante
 * @property string Endereco
 * @property string Bairro
 * @property string Cidade
 * @property string UF
 * @property string CEP
 * @property string Telefone
 * @property string Celular1
 * @property string Celular2
 */
class Aluno extends Model
{
    use SoftDeletes;

    public $table = 'aluno';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'Nome',
        'Sexo',
        'NascimentoAluno',
        'EstadoCivilAluno',
        'ProfissaoAluno',
        'RgAluno',
        'CpfAluno',
        'Escolaridade',
        'Email',
        'Curso',
        'Turma',
        'Parcelamento',
        'Vencimento',
        'Mae',
        'Pai',
        'Conheceu',
        'Vendedor',
        'DataCadastro',
        'Parentesco',
        'Pagador',
        'NascimentoContratante',
        'EstadoCivilContratante',
        'ProfissaoContratante',
        'RgContratante',
        'CpfContratante',
        'Endereco',
        'Bairro',
        'Cidade',
        'UF',
        'CEP',
        'Telefone',
        'Celular1',
        'Celular2'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'Nome' => 'string',
        'Sexo' => 'string',
        'NascimentoAluno' => 'date',
        'EstadoCivilAluno' => 'string',
        'ProfissaoAluno' => 'string',
        'RgAluno' => 'string',
        'CpfAluno' => 'string',
        'Escolaridade' => 'string',
        'Email' => 'string',
        'Curso' => 'string',
        'Turma' => 'string',
        'Parcelamento' => 'string',
        'Vencimento' => 'string',
        'Mae' => 'string',
        'Pai' => 'string',
        'Conheceu' => 'string',
        'Vendedor' => 'string',
        'DataCadastro' => 'date',
        'Parentesco' => 'string',
        'Pagador' => 'string',
        'NascimentoContratante' => 'string',
        'EstadoCivilContratante' => 'string',
        'ProfissaoContratante' => 'string',
        'RgContratante' => 'string',
        'CpfContratante' => 'string',
        'Endereco' => 'string',
        'Bairro' => 'string',
        'Cidade' => 'string',
        'UF' => 'string',
        'CEP' => 'string',
        'Telefone' => 'string',
        'Celular1' => 'string',
        'Celular2' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Nome' => 'required',
        'Sexo' => 'required',
        'NascimentoAluno' => 'required',
        'EstadoCivilAluno' => 'required',
        'ProfissaoAluno' => 'required',
        'RgAluno' => 'required',
        'CpfAluno' => 'required',
        'Escolaridade' => 'required',
        'Email' => 'required',
        'Curso' => 'required',
        'Turma' => 'required',
        'Parcelamento' => 'required',
        'Vencimento' => 'required',
        'Mae' => 'required',
        'Pai' => 'required',
        'Conheceu' => 'required',
        'Vendedor' => 'required',
        'DataCadastro' => 'required',
        'Parentesco' => 'required',
        'Pagador' => 'required',
        'NascimentoContratante' => 'required',
        'EstadoCivilContratante' => 'required',
        'ProfissaoContratante' => 'required',
        'RgContratante' => 'required',
        'CpfContratante' => 'required',
        'Endereco' => 'required',
        'Bairro' => 'required',
        'Cidade' => 'required',
        'UF' => 'required',
        'CEP' => 'required',
        'Telefone' => 'required',
        'Celular1' => 'required',
        'Celular2' => 'required'
    ];


}
