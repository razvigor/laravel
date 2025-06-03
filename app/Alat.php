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

use App\Alatnaziv;
use App\Proizvodjac;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alati';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'vrsta_namjena',
        'alatnaziv_id',
        'proizvodjac_id',
        'kataloski_br',
        'dimenzija_opis',
        'precnik',
        'vrsta_rez_mat',
        'br_zuba_pera',
        's_reza_p_rupe',
        'smjer'
     
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    //protected $casts = [
    //    'options' => 'array',
    //];



        /**
     * Get the category of the item
     *
     * @return \App\Alatnaziv
     */
    public function alatnaziv()
    {
        return $this->belongsTo(Alatnaziv::class); //, 'masinvrsta_id'
    }

        /**
     * Get the category of the item
     *
     * @return \App\Proizvodjac
     */
    public function proizvodjac()
    {
        return $this->belongsTo(Proizvodjac::class); //, 'masinvrsta_id'
    }


}
