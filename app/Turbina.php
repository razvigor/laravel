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

class Turbina extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'turbine';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'oem', 
        'opis',
        'oem_comp', 
        'comp_wheel',    'CW_napomena',
        'comp_wheel_2',  'CW_napomena_2',
        'comp_wheel_3',  'CW_napomena_3',

        'turbine_wheel',    'TW_napomena',
        'turbine_wheel_2',  'TW_napomena_2',
        'turbine_wheel_3',  'TW_napomena_3',

        'bearing_housing',    'BH_napomena',
        'bearing_housing_2',  'BH_napomena_2',
        'bearing_housing_3',  'BH_napomena_3',

        'back_plate',    'BP_napomena',
        'back_plate_2',  'BP_napomena_2',
        'back_plate_3',  'BP_napomena_3', 
        
        'heat_shield',    'HS_napomena',
        'heat_shield_2',  'HS_napomena_2',
        'heat_shield_3',  'HS_napomena_3', 
        
        'actuator',    'AC_napomena',
        'actuator_2',  'AC_napomena_2',
        'actuator_3',  'AC_napomena_3', 
        
        'noozles',    'NZ_napomena',
        'noozles_2',  'NZ_napomena_2',
        'noozles_3',  'NZ_napomena_3', 

        'gasket_kit',    'GK_napomena',
        'gasket_kit_2',  'GK_napomena_2',
        'gasket_kit_3',  'GK_napomena_3', 

        'repair_kit',    'RK_napomena',
        'repair_kit_2',  'RK_napomena_2',
        'repair_kit_3',  'RK_napomena_3',

        'chra_no',       'CN_napomena',
        'chra_no_2',     'CN_napomena_2',
        'chra_no_3',     'CN_napomena_3',

        'turbine_housing',    'TH_napomena',
        'turbine_housing_2',  'TH_napomena_2',
        'turbine_housing_3',  'TH_napomena_3', 
        
        'cijena', 
        'na_stanju',
        'limit', 
        'nab_cijena',
        'polica'
     
    ];





}
