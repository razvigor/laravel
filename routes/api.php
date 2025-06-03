<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

////  komentarisano 6-19-2020 
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
////  dodao 6-19-2020 
Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');
////  dodao 6-19-2020 

/////////////////////////////////////////////////////////////
///////// MODELI PROIZVODA //////////////////////////////////

// pregled svih modela proizvoda sa paginacijom
Route::get('proizvrstamodeli', 'Api\ProizvrstamodelController@index');

// pregled svih modela u svim stavkama na radnom nalogu
Route::get('modeli_rn/{rnalog_id}', 'Api\ProizvrstamodelController@modeli_rn');

// kreiranje modela
Route::post('model', 'Api\ProizvrstamodelController@store');

// izmjena modela
Route::put('model', 'Api\ProizvrstamodelController@store');

//////////////////////////////////////////////////////////
///////// VRSTE PROIZVODA /////////////////////////////////////////

// pregled svih VRSTA PRIZVODA
Route::get('proiztipvrste', 'Api\ProiztipvrstaController@index');

/////////////////////////////////////////////////////////////
///////// PROIZVODI /////////////////////////////////////////
// pregled svih proizvoda
Route::get('proizvodi_all', 'Api\ProizvodController@index_all');

// pregled svih proizvoda sa paginacijom
Route::get('proizvodi', 'Api\ProizvodController@index');

// pregled jednog proizvoda
Route::get('proizvod/{id}', 'Api\ProizvodController@show');

// kreiranje proizvoda
Route::post('proizvod', 'Api\ProizvodController@store');

// izmjena proizvoda
Route::put('proizvod', 'Api\ProizvodController@store');

// brisanje proizvoda
Route::delete('proizvod/{id}', 'Api\ProizvodController@destroy');

//////////////////////////////////////////////////////////////////////
///////// ANALIZA KAPACITETA /////////////////////////////////////////

// pregled svih elemenata u proizvodu
Route::get('analiza_kapaciteta_p/{proizvod_id}', 'Api\AnalizaKapacitetaController@index');

// pregled svih elemenata u proizvodima u radnom nalogu
Route::get('analiza_kapaciteta_rn/{rnalog_id}', 'Api\AnalizaKapacitetaController@index_rn');

// pregled svih elemenata u proizvodima u radnom nalogu
Route::get('analiza_kapaciteta_rn_mp/{rnalog_id}', 'Api\AnalizaKapacitetaController@index_rn_masina_proizvod');

// izmjena operacije pri analizi kapaciteta
Route::put('analiza_kapaciteta_operacija', 'Api\AnalizaKapacitetaController@store');

/////////////////////////////////////////////////////////////////
///////// RADNI LISTOVI /////////////////////////////////////////

// pregled svih elemenata u svim proizvodima na radnom nalogu
Route::get('radni_listovi/{rnalog_id}/{kupac_id}/{model_id}', 'Api\RadniListoviController@index');

Route::get('radni_listovi_pdf/{rnalog_id}/{masina_id}/{kupac_id}/{model_id}', 'Api\RadniListoviController@stampa');



/////////////////////////////////////////////////////////////////////////////////
///////// PREGLED TEHNOLOGIJA PROIZVODA /////////////////////////////////////////

// pregled svih elemenata u proizvodu
Route::get('tehnologija_proizvoda/{proizvod_id}', 'Api\TehnologijaProizvodaController@index');

Route::get('tehnologija_pdf/{proizvod_id}/{element_id}', 'Api\TehnologijaProizvodaController@stampa');


/////////////////////////////////////////////////////////////////////////
///////// KALKULACIJA PROIZVODA /////////////////////////////////////////

// pregled svih elemenata u proizvodu
Route::get('kalkulacija_proizvoda/{proizvod_id}', 'Api\KalkulacijaProizvodaController@index');

Route::get('kalk_pr_pdf/{proizvod_id}', 'Api\KalkulacijaProizvodaController@stampa');

//////////////////////////////////////////////////////////////
///////// TREBOVNICA /////////////////////////////////////////

// pregled svih elemenata u proizvodu
Route::get('trebovnica/{rnalog_id}', 'Api\TrebovnicaController@index');

Route::get('trebovnica_pdf/{rnalog_id}/{tr_iz}', 'Api\TrebovnicaController@stampa');

////////////////////////////////////////////////////////////
///////// ELEMENTI /////////////////////////////////////////

// pregled svih elemenata u proizvodu
Route::get('elementi_p/{proizvod_id}', 'Api\ElementController@index');

// pregled jednog elementa
Route::get('element/{id}', 'Api\ElementController@show');

// kreiranje elementa
Route::post('element', 'Api\ElementController@store');

// izmjena elementa
Route::put('element', 'Api\ElementController@store');

// brisanje elementa
Route::delete('element/{id}', 'Api\ElementController@destroy');

/////////////////////////////////////////////////////////////////
//// MATERIJALI /////////////////////////////////////////////////

// pregled svih materijala
Route::get('materijali', 'Api\MaterijalController@index_all');

// pregled svih materijala u tipu
Route::get('materijali_t/{mattip_id}', 'Api\MaterijalController@index');

// kreiranje materijala
Route::post('materijal', 'Api\MaterijalController@store');

// izmjena materijala
Route::put('materijal', 'Api\MaterijalController@store');

///////////////////////////////////////////////////////////////////////
//// TIPOVI MATERIJALA ////////////////////////////////////////////////
 
// pregled svih tipova materijala
Route::get('mattipovi', 'Api\MattipController@index');

// pregled osobina jednog tipa elementa
Route::get('osobine_elementa_t/{id}', 'Api\MattipController@show');

// pregled koeficijenata jednog tipa elementa
Route::get('koeficijenti_tipa/{id}', 'Api\MattipController@show_k');

///////////////////////////////////////////////////////////////////////
//// VRSTE MATERIJALA /////////////////////////////////////////////////

// pregled svih vrsta materijala
Route::get('mattipvrste', 'Api\MattipvrstaController@index_all');

// kreiranje vrste materijala
Route::post('mattipvrsta', 'Api\MattipvrstaController@store');

// izmjena vrste materijala
Route::put('mattipvrsta', 'Api\MattipvrstaController@store');

// pregled svih vrsta materijala u tipu
Route::get('mattipvrste_t/{mattip_id}', 'Api\MattipvrstaController@index');

////////////////////////////////////////////////////////////////////////
//// OZNAKE MATERIJALA /////////////////////////////////////////////////

// pregled svih oznaka materijala
Route::get('mattipoznake', 'Api\MattipoznakaController@index_all');

// pregled svih oznaka materijala u tipu
Route::get('mattipoznake_t/{mattip_id}', 'Api\MattipoznakaController@index');

// kreiranje oznake materijala
Route::post('mattipoznaka', 'Api\MattipoznakaController@store');

// izmjena oznake materijala
Route::put('mattipoznaka', 'Api\MattipoznakaController@store');


////////////////////////////////////////////////////////////
//// KUPCI /////////////////////////////////////////////////

// pregled svih kupaca (bez fiktivnog)
Route::get('kupci', 'Api\KupacController@index_all');


// pregled svih kupaca (bez fiktivnog)
Route::get('kupci_WS/{user}/{pass}', 'Api\KupacController@index_WS');

// pregled BAŠ svih kupaca
Route::get('kupci_lista', 'Api\KupacController@index_lista');

// pregled svih kupaca u statusu
Route::get('kupci_s/{mattip_id}', 'Api\KupacController@index');

// pregled svih kupaca u svim stavkama na radnom nalogu
Route::get('kupci_rn/{rnalog_id}', 'Api\KupacController@kupci_rn');



// kreiranje kupca
Route::post('kupac', 'Api\KupacController@store');

// izmjena kupca
Route::put('kupac', 'Api\KupacController@store');


/////////////////////////////////////////////////////////////////////////
//// tabela:CONFIGSIFRE /////////////////////////////////////////////////

// pregled svih config za tabelu
Route::get('configsifre_t/{tabela}', 'Api\ConfigsifraController@index_t');

// pregled stavki sifrarnika (configsifra) za tabelu i polje
Route::get('configsifre_t_p/{tabela}/{polje}', 'Api\ConfigsifraController@index_t_p');


/////////////////////////////////////////////////////////////
///////// OPERACIJE /////////////////////////////////////////

// pregled svih operacija na elementu
Route::get('operacije_e/{proizvod_id}', 'Api\OperacijaController@index');

// pregled jednog operacije
Route::get('operacija/{id}', 'Api\OperacijaController@show');

// kreiranje operacije
Route::post('operacija', 'Api\OperacijaController@store');

// izmjena operacije
Route::put('operacija', 'Api\OperacijaController@store');

// brisanje operacije
Route::delete('operacija/{id}', 'Api\OperacijaController@destroy');

//////////////////////////////////////////////////////////
///////// MAŠINE /////////////////////////////////////////

// pregled svih masina
Route::get('masine', 'Api\MasinaController@index');

/////////////////////////////////////////////////////////
///////// ALATI /////////////////////////////////////////

// pregled svih alata
Route::get('alati', 'Api\AlatController@index');

///////////////////////////////////////////////////////////////
//// LOKACIJE /////////////////////////////////////////////////

// pregled svih LOKACIJA
Route::get('masinlokacije', 'Api\MasinlokacijaController@index');

////////////////////////////////////////////////////////////////
///////// RADNI NALOZI /////////////////////////////////////////
// pregled svih proizvoda
Route::get('rnalozi', 'Api\RnalogController@index');

// pregled jednog proizvoda
Route::get('rnalog/{id}', 'Api\RnalogController@show');



////////////////////////////////////////////////////////////////////////
///////// STAVKE RADNOG NALOGA /////////////////////////////////////////
// pregled svih stavki radnog naloga
Route::get('stavke_rn/{rnalog_id}', 'Api\StavkarnController@index');

// štsmpa radnog naloga
Route::get('rnalog_pdf/{rnalog_id}', 'Api\StavkarnController@stampa');

// pregled količina proizvoda u radnom nalogu
Route::get('proizvodi_rn/{rnalog_id}', 'Api\StavkarnController@proizvodi_rn');

// pregled jedne stavke
Route::get('stavkarn/{id}', 'Api\StavkarnController@show');

// kreiranje stavke
Route::post('stavkarn', 'Api\StavkarnController@store');

// izmjena stavke
Route::put('stavkarn', 'Api\StavkarnController@store');

// brisanje stavke
Route::delete('stavkarn/{id}', 'Api\StavkarnController@destroy');



///////////////////////////////////////////////////////////////////////
//// TURBINE /////////////////////////////////////////////////

// pregled svih TURBINA
Route::get('turbine', 'Api\TurbinaController@index');


Route::get('turbine_WS', 'Api\TurbinaController@index_WS');

// pregled filtriranih TURBINA
Route::get('turbine/{duzina_stranice}/{oem}/{opis}/{cw}/{tw}/{bh}/{bp}/{hs}/{ac}/{nz}/{gk}/{rk}/{th}/{cn}', 'Api\TurbinaController@index_2');

// kreiranje TURBINE
Route::post('turbina', 'Api\TurbinaController@store');

// kreiranje duplikata TURBINE
Route::post('turbina_d', 'Api\TurbinaController@store_d');

// izmjena TURBINE
Route::put('turbina', 'Api\TurbinaController@store');

// brisanje turbine
Route::delete('turbina/{id}', 'Api\TurbinaController@destroy');

///////////////////////////////////////////////////////////////////////
//// DIJELOVI TURBINE /////////////////////////////////////////////////


// pregled svih dijelova turbina
Route::get('turbinadijelovi', 'Api\TurbinadioController@index');

// kreiranje dijela turbine
Route::post('turbinadio', 'Api\TurbinadioController@store');

// brisanje slike dijala turbine
Route::delete('brisisliku/{id_slike}', 'Api\TurbinadioController@destroy_photo');

// pregled svih dijelova turbina
Route::get('turbinadioslike/{id}', 'Api\TurbinadioController@index_slika');


// izmjena dijela turbine
Route::put('turbinadio', 'Api\TurbinadioController@store');


// izmjena dijela turbine iz PROKONTIKA (EastCode)
Route::get('izmjena_EC/{id}/{cijena}/{stanje}', 'Api\TurbinadioController@store_EC');


// pregled svih vrsta materijala u tipu
//Route::get('turbinadio/{turbinadiotip_id}', 'Api\TurbinadioController@index_t');

// pregled  dijelova filtriranih po opisu i oznaci
Route::get('turbinadijelovi/{duzina_stranice}/{tip_naziv}/{opis}/{oznaka}', 'Api\TurbinadioController@index_2');

// stampa liste zaliha
Route::get('zalihe_pdf/{filter_stampa_tip}', 'Api\TurbinadioController@stampa_zaliha');


// stampa liste dijelova za naručivanje
Route::get('narudzba_pdf/{lokacija}/{filter_stampa_tip}', 'Api\TurbinadioController@stampa_narudzbe');

///////////////////////////////////////////////////////////////////////
//// TIPOVI DIJELOVA TURBINA /////////////////////////////////////////////////

// pregled svih vrsta materijala
Route::get('turbinadiotipovi/{sort}', 'Api\TurbinadiotipController@index');


// pregled svih podvrsta materijala
Route::get('turbinadiopodtipovi', 'Api\TurbinadiopodtipController@index');


///////////////////////////////////////////////////////////////////////
//// PREDRACUNI /////////////////////////////////////////////////

// pregled svih PREDRAČUNA
Route::get('predracuni', 'Api\PredracunController@index');

// pregled filtriranih PREDRAČUNA
Route::get('predracuni/{duzina_stranice}/{racun_nota}/{broj}/{datum_list}/{kupac_naziv}/{oem}/{napomena}/{status_naziv}', 'Api\PredracunController@index_2');


// kreiranje PREDRAČUNA
Route::post('predracun', 'Api\PredracunController@store');

// izmjena PREDRAČUNA
Route::put('predracun', 'Api\PredracunController@store');

// brisanje Predračuna
Route::delete('predracun/{id}', 'Api\PredracunController@destroy');


// stampa PREDRAČUNA(PR) ili GARANCIJE(G)
Route::get('predracun_pdf/{id}/{tip}', 'Api\PredracunController@stampa');

// export liste Predračuna u PDFa
Route::get('predracuni_pdf/{ZGR}/{datum_od}/{datum_do}', 'Api\PredracunController@export_u_pdf');

// export liste Predračuna u XLSa
Route::get('predracuni_xls/{ZGR}', 'Api\PredracunController@export_u_xls');


////////////////////////////////////////////////////////////
//// USLUGE /////////////////////////////////////////////////

// pregled svih usluga
Route::get('usluge', 'Api\UslugaController@index');

/*
// pregled svih kupaca u statusu
Route::get('kupci_s/{mattip_id}', 'Api\KupacController@index');

// pregled svih kupaca u svim stavkama na radnom nalogu
Route::get('kupci_rn/{rnalog_id}', 'Api\KupacController@kupci_rn');



// kreiranje kupca
Route::post('kupac', 'Api\KupacController@store');

// izmjena kupca
Route::put('kupac', 'Api\KupacController@store');
*/