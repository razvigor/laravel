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

use App\Alat;
use Illuminate\Database\Eloquent\Model;

class Proizvodjac extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proizvodjaci';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['naziv', 'aktivan'];

    /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function alati()
    {
        return $this->hasMany(Alat::class);
    }
}
