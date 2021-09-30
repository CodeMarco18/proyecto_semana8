<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Citas_detalle
 * @package App\Models
 * @version September 30, 2021, 12:26 am UTC
 *
 * @property integer $id_cita
 */
class Citas_detalle extends Model
{
    //use SoftDeletes;

    public $table = 'citas_detalle';
    protected $primaryKey= 'id_detallecita';
    public $timestamps =false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id_cita'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_detallecita' => 'integer',
        'id_cita' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_cita' => 'nullable|integer'
    ];

    
}
