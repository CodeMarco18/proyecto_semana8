<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version September 30, 2021, 12:24 am UTC
 *
 * @property string $ape_nom
 * @property string $dni
 * @property string $celular
 */
class Paciente extends Model
{
    //use SoftDeletes;

    public $table = 'paciente';
    protected $primaryKey= 'id_paciente';
    public $timestamps =false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ape_nom',
        'dni',
        'celular'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_paciente' => 'integer',
        'ape_nom' => 'string',
        'dni' => 'string',
        'celular' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ape_nom' => 'nullable|string|max:45',
        'dni' => 'nullable|string|max:45',
        'celular' => 'nullable|string|max:45'
    ];

    
}
