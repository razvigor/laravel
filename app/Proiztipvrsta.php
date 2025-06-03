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

use App\Proizvrstamodel;  // Proiztipvrsta ima više modela

use App\Proiztip;   // Proiztipvrsta pripada jednom tipu proizvoda
use Illuminate\Database\Eloquent\Model;

class Proiztipvrsta extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proiztipvrste';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['proiztip_id', 'naziv', 'aktivna'];



    /**
     * vrati sve modele tekuće vrste
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function proizvrstamodeli()
    {
        return $this->hasMany(Proizvrstamodel::class);
    }


     /**
     * vrati tipproizvoda za tekuću vrstu
     *
     * @return \App\Proiztip
     */
    public function proiztip()
    {
        return $this->belongsTo(Proiztip::class); 
    }

}
