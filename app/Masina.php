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

use App\Mtag;
use App\Masinvrsta;
use App\Masinlokacija;
use Illuminate\Database\Eloquent\Model;

class Masina extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'masine';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'r_br', 'name', 'description', 'picture', 'masinvrsta_id', 'komada', 'lokacija', 'bruto_mjere',  'masinlokacija_id', 'inst_ee_kw', 'opt_fi1', 'opt_kom1', 'opt_fi2', 'opt_kom2', 'opt_fi3', 'opt_kom3', 'kz', 'kz_p', 'kz_l','status', 'date', 'show_on_homepage', 'options'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    /**
     * Get the category of the item
     *
     * @return \App\Masinvrsta
     */
    public function masinvrsta()
    {
        return $this->belongsTo(Masinvrsta::class); //, 'masinvrsta_id'
    }

    /**
     * Get the category of the item
     *
     * @return \App\Masinlokacija
     */
    public function masinlokacija()
    {
        return $this->belongsTo(Masinlokacija::class); //, 'masinvrsta_id'
    }

    /**
     * Get the tags of the item
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function mtags()
    {
        return $this->belongsToMany(Mtag::class);
    }

    /**
     * Get the path to the picture
     *
     * @return string
     */
    public function path()
    {
        return "/storage/{$this->picture}";
    }
}
