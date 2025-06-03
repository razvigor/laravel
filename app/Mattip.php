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

use App\Materijal;
use App\Mattipvrsta;
use App\Mattipoznaka;
use Illuminate\Database\Eloquent\Model;

class Mattip extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mattipovi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['naziv', 'redni_broj',
                           'klab01','klab02','klab03','klab04','klab05','klab06','klab07',
                           'kdef01','kdef02','kdef03','kdef04','kdef05','kdef06','kdef07', 
                           'kdec01','kdec02','kdec03','kdec04','kdec05','kdec06','kdec07', 
                           'kjed01','kjed02','kjed03','kjed04','kjed05','kjed06','kjed07'
    ];

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
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function mattipvrste()
    {
        return $this->hasMany(Mattipvrsta::class);
    }

     /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function mattipoznake()
    {
        return $this->hasMany(Mattipoznaka::class);
    }
}
