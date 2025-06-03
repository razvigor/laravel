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

use App\Materijal;  // oznaka ima više materijala

use App\Mattip;     // oznaka pripada jednom tipu
use Illuminate\Database\Eloquent\Model;

class Mattipoznaka extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mattipoznake';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mattip_id', 'natpis', 'oznaka', 'internasifra'];

    /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function materijali()
    {
        return $this->hasMany(Materijal::class);
    }


     /**
     * Get the category of the item
     *
     * @return \App\Mattip
     */
    public function mattip()
    {
        return $this->belongsTo(Mattip::class); 
    }

}
