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

use App\Mattip;
use App\Mattipoznaka;
use App\Mattipvrsta;
use Illuminate\Database\Eloquent\Model;

class Materijal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materijali';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv',
        'dodatni_opis',
        'mattip_id',
        'mattipvrsta_id',
        'vrsta_podloge',
        'vrsta_okova',
        'proizvodjac',
        'namjena',
        'forma_oblik',
        'sp_tezina',
        'gustina',
        'tvrdoca',
        'klasa',
        'br_linija',
        'br_slojeva',
        'debljina',
        'duz_trake',
        'sir_trake',
        'sirina',
        'duz_razred',
        'jed_mjere',
        'cijena',
        'granulacija',
        'mattipoznaka_id'
     
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
     * @return \App\Mattip
     */
    public function mattip()
    {
        return $this->belongsTo(Mattip::class); 
    }

        /**
     * Get the category of the item
     *
     * @return \App\Mattipoznaka
     */
    public function mattipoznaka()
    {
        return $this->belongsTo(Mattipoznaka::class); 
    }

        /**
     * Get the category of the item
     *
     * @return \App\Mattipvrsta
     */
    public function mattipvrsta()
    {
        return $this->belongsTo(Mattipvrsta::class); 
    }

}
