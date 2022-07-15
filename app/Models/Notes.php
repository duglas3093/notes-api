<?php

namespace App\Models;

use CodeIgniter\Model;
use faker\Generator;

class Notes extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'notes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['body','title'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'title'=>[
            'label'=>'titulo',
            'rules'=> 'required'
        ],
        'body'=>[
            'label'=>'cuerpo',
            'rules'=> 'required'
        ],
    ];
    protected $validationMessages   = [
        'title' => [
            'required'  => 'El campo {field} es requerido.'
        ],
        'body' => [
            'required'  => 'El campo {field} es requerido.'
        ]
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function fake(Generator &$faker)
    {
        return [
            'title'  => $faker->words(2, true),
            'body'  => $faker->sentence(6),
        ];

        /*
         * Or you can return a return type object.

        return new User([
            'first'  => $faker->firstName,
            'email'  => $faker->email,
            'phone'  => $faker->phoneNumber,
            'avatar' => Faker\Provider\Image::imageUrl(800, 400),
            'login'  => config('Auth')->allowRemembering ? date('Y-m-d') : null,
        ]);

        */
    }

}
