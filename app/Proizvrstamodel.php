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

use App\Proiztipvrsta;  // Proizvrstamodel pripada jednoj vrsti proizvoda

use App\Proiztip;   // Proizvrstamodel pripada jednom tipu proizvoda
use Illuminate\Database\Eloquent\Model;

class Proizvrstamodel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proizvrstamodeli';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['proiztip_id', 'proizvrsta_id', 'naziv', 'aktivan'];



    /**
     * vrati tip proizvoda za tekući model
     *
     * @return \App\Proiztip
     */
    public function proiztip()
    {
        return $this->belongsTo(Proiztip::class);
    }


     /**
     * vrati vrstu za tekući model
     *
     * @return \App\Proiztipvrsta
     */
    public function proiztipvrsta()
    {
        return $this->belongsTo(Proiztipvrsta::class); 
    }

}
