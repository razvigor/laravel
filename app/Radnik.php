<?php
/*

=========================================================
* Argon Dashboard PRO - v1.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro-laravel
* Copyright 2018 Creative Tim (https://www.creative-tim.com) & UPDIVISION (https://www.updivision.com)

* Coded by www.creative-tim.com & www.updivision.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
namespace App;


use Illuminate\Database\Eloquent\Model;

class Radnik extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'radnici';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'jmbg', 'birthday', 'birthplace', 'adress', 'drzavljanstvo', 'nacionalnost', 'vjeroispovjest', 'vjerski_praznik', 'bracno_stanje', 'djeca', 'stambeno_pitanje', 'invalidnost', 'pol', 'telefon', 'stepen', 'skolska_sprema', 'naziv_ustanove', 'zanimanje', 'posebna_znanja', 'strucni_ispiti', 'p_radna_mjesta', 'p_opis_posla', 'p_trajanje', 'z_datum', 'z_staz', 'z_status', 'z_vrsta_RO', 'z_org_cjelina', 'z_radno_mjesto', 'z_angazovanja', 'br_ormarica', 'z_licni_dohodak', 'z_radni_sat'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    //protected $casts = [
    //    'options' => 'array',
    //];


}
