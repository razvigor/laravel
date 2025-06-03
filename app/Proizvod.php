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

use App\Proizvrstamodel;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proizvodi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['naziv', 'sifra_proizvoda','model_id', 'boja1_id', 'boja2_id', 'opis', 'proizvoda_u_smjeni', 'aktivan'];

    /**
     * Get the items of the category
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function elementi()
    {
        return $this->hasMany(Element::class);
    }



     /**
     * vrati tipproizvoda za tekući proizvod
     *
     * @return \App\Proizvrstamodel
     */
    public function proizvrstamodel()
    {
        return $this->belongsTo(Proizvrstamodel::class); 
    }


}
