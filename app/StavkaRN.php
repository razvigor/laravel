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


use App\Rnalog;   // stavka pripada jednom nalogu
use App\Kupac;   // stavka pripada jednom kupcu
use App\Proizvod;   // stavka pripada jednom proizvodu
use Illuminate\Database\Eloquent\Model;

class StavkaRN extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stavkern';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rnalog_id', 'r_br', 'kupac_id', 'proizvod_id', 'kolicina', 'napomena'];



     /**
     * Get the category of the item
     *
     * @return \App\Rnalog
     */
    public function rnalog()
    {
        return $this->belongsTo(Rnalog::class); 
    }

    /**
     * Get the category of the item
     *
     * @return \App\Kupac
     */
    public function kupac()
    {
        return $this->belongsTo(Kupac::class); 
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
