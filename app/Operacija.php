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


use App\Element;
use Illuminate\Database\Eloquent\Model;

class Operacija extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'operacije';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'element_id', 'redni_broj', 'masina_id', 'br_rr', 'br_pr', 'br_us', 'opis', 'parametri', 'alat_id', 'vrijeme'
    ];



    /**
     * Get the category of the item
     *
     * @return \App\Category
     */
    public function element()
    {
        return $this->belongsTo(Element::class);
    }


}
