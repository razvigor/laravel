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

use App\StavkaRN;
use Illuminate\Database\Eloquent\Model;

class Kupac extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kupci';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['naziv', 'ulica_i_broj',  'post_br_mjesto', 'drzava', 'kontakt_osoba', 'mail', 'telefon', 'status', 'jmb_jib', 'fiktivni', 'username', 'password'];

    /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function stavkern()
    {
        return $this->hasMany(StavkaRN::class);
    }
}
