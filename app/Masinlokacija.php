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

use App\Masina;
use Illuminate\Database\Eloquent\Model;

class Masinlokacija extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'masinlokacije';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['r_br', 'naziv', 'teh_koef'];

    /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function masine()
    {
        return $this->hasMany(Masina::class);//, 'masinlokacija_id'
    }
}
