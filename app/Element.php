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

use App\Operacija;  // element ima više operacija

use App\Proizvod;   // element pripada jednom proizvodu
use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'elementi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['proizvod_id', 'naziv', 'mattip_id', 'sklop', 'id_nadredjenog', 'materijal_id', 
                           'elint_01', 'elint_02', 'elint_03', 'elint_04', 'elint_05', 'elint_06', 'elint_07', 'eltxt_31', 'izvorni_id'];

    /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function operacije()
    {
        return $this->hasMany(Operacija::class);
    }


     /**
     * Get the category of the item
     *
     * @return \App\Proizvod
     */
    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class); 
    }

}
