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

use App\Turbiandiophoto; // dio ima ima više forografija


use Illuminate\Database\Eloquent\Model;



class Turbinadio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'turbinadijelovi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'opis',
        'oznaka', 
        'vrsta_id', 
        'cijena',
        'cijena_as',
        'cijena_ts',
        'nab_cijena',
        'nab_c_fix', 
        'na_stanju_s',
        'na_stanju_r',
        'na_stanju_p',
        'limit_s',
        'limit_r',
        'polica_s',
        'polica_r',
        'polica_p',
        'evivalent_za_id',
        'turbinadiopodtip_id'
     
    ];


    /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function turbinadiophostos()
    {
        return $this->hasMany(Turbiandiophoto::class);
    }


}
