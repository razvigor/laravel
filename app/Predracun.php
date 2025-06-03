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

use Illuminate\Database\Eloquent\Model;

class Predracun extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'predracuni';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['broj', 'datum', 'kupac_id', 'kupac_ime',  'napomena', 'komplet_remont', 'usluga_id', 'ukupna_cijena', 'nacin_placanja', 
                           'status', 'rabat', 'garancija', 'garancija_el', 'lokacija', 'racun_nota', 'skintuo_sa_stanja', 
                           'oem',  'oem_cijena', 
                           'CW_id', 'CW_cijena', 'CW_id_2', 'CW_cijena_2', 'CW_id_3', 'CW_cijena_3', 
                           'TW_id', 'TW_cijena', 'TW_id_2', 'TW_cijena_2', 'TW_id_3', 'TW_cijena_3', 
                           'BH_id', 'BH_cijena', 'BH_id_2', 'BH_cijena_2', 'BH_id_3', 'BH_cijena_3', 
                           'BP_id', 'BP_cijena', 'BP_id_2', 'BP_cijena_2', 'BP_id_3', 'BP_cijena_3', 
                           'HS_id', 'HS_cijena', 'HS_id_2', 'HS_cijena_2', 'HS_id_3', 'HS_cijena_3', 
                           'AC_id', 'AC_cijena', 'AC_id_2', 'AC_cijena_2', 'AC_id_3', 'AC_cijena_3', 
                           'NZ_id', 'NZ_cijena', 'NZ_id_2', 'NZ_cijena_2', 'NZ_id_3', 'NZ_cijena_3', 
                           'GK_id', 'GK_cijena', 'GK_id_2', 'GK_cijena_2', 'GK_id_3', 'GK_cijena_3', 
                           'RK_id', 'RK_cijena', 'RK_id_2', 'RK_cijena_2', 'RK_id_3', 'RK_cijena_3', 
                           'TH_id', 'TH_cijena', 'TH_id_2', 'TH_cijena_2', 'TH_id_3', 'TH_cijena_3', 
                           'CN_id', 'CN_cijena', 'CN_id_2', 'CN_cijena_2', 'CN_id_3', 'CN_cijena_3'

                            ];

}
