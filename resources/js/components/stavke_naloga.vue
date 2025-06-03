<template>
  <div class="card-body">

<!-- KARTICE - LINKOVI  -->
    <ul class="nav nav-pills nav-pills-info" role="tablist"  style="background-image: -webkit-linear-gradient(top right,#efefef 0, #fdfdfd 100%);">
      <li class="nav-item">
        <a class="nav-link active show" data-toggle="tab" href="#link_stavke_naloga" role="tablist">
          Stavke naloga
        </a>
      </li>
  
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link_trebovnica" role="tablist">
          Trebovnica
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link_radni_listovi" role="tablist">
          Radni listovi
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link_analiza_kapaciteta" role="tablist">
          Analiza kapaciteta
        </a>
      </li>    

    </ul>
<!-- KARTICE - TABOVI  -->
    <div class="tab-content tab-space"   style="background-image: -webkit-linear-gradient(bottom, #fdfdfd 98%, #e4e4e4);">

<!--      STAVKE NALOGA -->
      <div class="tab-pane active show" id="link_stavke_naloga">


        <!-- Modalne forme (stavke) -->
        <div class="row">

          <!-- Button "Štampa naloga" -->
          <div class="col-6 text-left">
            <button type="button" class="btn btn-warning" @click="show_RN_PDF()">
              PDF - nalog
            </button>
          </div>

          <!-- Button "Nova stavka" -->
          <div class="col-6 text-right">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#novaStavkaNaloga" @click="dodajStavkurn">
              Nova stavka
            </button>
          </div>
                    
          <!-- Modal (dodaj/izmjeni element)- pocetak -->
          <div class="modal fade" id="novaStavkaNaloga" tabindex="-1" role="dialog" aria-labelledby="novaStavkaNaloga" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 75%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">

                          <form  class="form-horizontal"  @submit.prevent="snimiStavkurn()">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                <h4 class="card-title" v-if="edit_stavkarn">Izmjena stavke</h4>
                                <h4 class="card-title" v-else>Dodavanje stavke</h4>
                                
                              </div>
                              
                              <div class="card-body ">
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <button type="button" id="btn-zatvori-modal-e" class="btn btn-warning" @click="zatvoriModal()">
                                      Zatvori
                                    </button>
                                  </div>
                                </div>

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Redni broj</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="stavkarn_ed.r_br"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Kupac</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select class="selectpicker col-sm-12 pl-0 pr-0" id="izbor_kupca" name="izbor_kupca" v-model="stavkarn_ed.kupac_id" data-style="select-with-transition" title="" data-size="5">

                                        <option  v-for="listValue in kupci" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.naziv}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>   

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Proizvod</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <v-selectize  :create-item="maybeCreate()" :options="proizvodi" v-model="pr_selected" placeholder="izaberite proizvod" key-by="id" label="naziv" :keys="['naziv', 'naziv_2', 'naziv_3', 'naziv_4']"/>
                                      
                                                                            
                                      <!--
                                      <select class="selectpicker col-sm-12 pl-0 pr-0" id="izbor_proizvoda" name="izbor_proizvoda" v-model="stavkarn_ed.proizvod_id" data-style="select-with-transition" title="" data-size="5">

                                        <option  v-for="listValue in proizvodi" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.naziv}}
                                        </option>
                                      </select>
                                      -->
                                    </div>
                                  </div>
                                </div> 


                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Količina</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="stavkarn_ed.kolicina"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Napomena</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <textarea name="opis" id="input-napomena" cols="30" rows="4" class="form-control" v-model="stavkarn_ed.napomena" placeholder="unesite kratku napomenu (nije obavezno)"></textarea>
                                    </div>
                                  </div>
                                </div> 

                              </div>



                              <div class="card-footer ml-auto">
                                <button type="submit" class="btn btn-warning">Snimi</button>
                              </div>

                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>                    
          <!-- Modal - kraj -->



        </div>  

        <!-- Pregled stavki -->
        <div class="row">
          <div class="col-12 text-left">
            


              <!-- za sve tipove materijala -->
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th  class="text-center">
                                    R.br.
                                  </th>
                                  <th>
                                    Kupac
                                  </th>
                                  <th>
                                    Proizvod
                                  </th>
                                  <th  class="text-center">
                                    Kapacitet<br>(kom)
                                  </th>
                                  <th  class="text-center">
                                    Količina
                                  </th>
                                  <th>
                                    Napomena
                                  </th>                                  
                                  <th class="text-right">Ažuriranje<br>stavki</th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="stavka in stavkern"  v-bind:key="stavka.id">
                                  <td class="text-center">
                                    {{stavka.r_br}}
                                  </td>
                                  <td>
                                    {{stavka.kupac_naziv}}
                                  </td>

                                  <td>
                                    {{stavka.proizvod_naziv}}
                                  </td>
                                  <td class="text-center">
                                    {{stavka.proizvoda_u_smjeni*rnalog.broj_dana}}
                                  </td>                                  
                                  <td class="text-center">
                                    {{stavka.kolicina}}
                                  </td>
                                  <td>
                                    {{stavka.napomena}}
                                  </td>


                                
                                  <td class="text-right">
                                      <form action="" method="post" >
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniStavkurn(stavka)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniStavkurn(stavka.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>  

                                <tr>
                                  <th class="text-right" colspan="4">
                                    Zapunjenost kapaciteta:
                                </th>                                  
                                  <td class="text-center">
                                    {{zaokruzi(parseFloat(zapunjenost_kapaciteta), 2)}} %
                                  </td>
                                  <td colspan="2">
                                    
                                  </td>
                          
                                </tr>  


                                </tbody>
                              </table>
                            </div> 
                  </div>
          </div>
        </div>


      </div>

<!--      ANALIZA KAPACITETA -->

      <div class="tab-pane" id="link_analiza_kapaciteta">
        <div class="row">
<!--            - PARAMETRI analize: količine proizvoda i broj smjena -->          
          <div class="col-12 text-left">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover datatable-info" style="display:blok">
                                <thead class="text-info">
                                  <th  class="text-center">
                                    Broj proizvoda
                                  </th>
                                  <th>
                                    Naziv proizvoda
                                  </th>

                                  <th  class="text-center">
                                    Broj smjena
                                  </th>
                                </thead>

                                <tbody>
                                  <div style="display:none">
                                      {{$r_br = 0}}
                                  </div>
                                  <tr v-for="stavka in proizvodi_rn" v-bind:key="stavka.naziv_proizvoda">
                                    <div  style="display:none">
                                      {{$r_br+=1}}
                                    </div>

                                    <td  class="text-center">
                                      <input  class="text-center" v-model="stavka.broj_proizvoda" placeholder="-"  size="5">
                                    </td>
                                    <td>
                                      {{stavka.naziv_proizvoda}}
                                    </td>
                                    <td v-if="$r_br == 1" class="text-center" rowspan="0">
                                      <input class="text-center" v-model="broj_smjena" placeholder="-" @keyup="prikaziPlan()" size="5">
                                    </td>
                                  </tr>  

                                </tbody>
                              </table>
                            </div>
                  </div>
          </div>     

<!--            - PRIKAZ analize        -->
          <div class="card-body">                    
                    <div class="table-responsive">
                      <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                        <thead class="text-warning">

                          <th>
                            Odjeljenje
                          </th>

                          <th>
                            Radno mjesto
                          </th>

                          <th class="text-center">
                            Protočno vrijeme<br>(min/proizvodu)
                          </th>

                          <th class="text-center">
                            Potreban rad<br> (minuta/smjena)
                          </th>
                          <th class="text-center">
                            Broj radnika<br>(na rad. mjestu)
                          </th>
                          
                          <th class="text-center">
                            Stepen opterećenja<br>rada radnika
                          </th>
                          <th class="text-center">
                            Teoretski potreban<br>broj radnika
                          </th>
                          <th class="text-center">
                            Usvojen broj<br>radnika
                          </th>
                          <th class="text-center">
                            Preostalo slobodno vrijeme
                            <br>u jednoj smjeni (min)
                          </th>
                         

                        </thead>
                        <tbody>

                        <tr v-for="element_analize in analiza_kapaciteta" v-bind:key="element_analize.id_operacije">

                          <td>
                            {{element_analize.lokacija}}
                          </td>

                          <td>
                            {{element_analize.masina}}
                          </td>

                          <td class="text-center">
                            {{zaokruzi(ukupno_vrijeme_masine(element_analize.masina_id),3)}}
                          </td>                          

                          <td class="text-center">
                            {{zaokruzi(ukupno_vrijeme_masine(element_analize.masina_id)/broj_smjena,3)}}
                          </td>
                          <td class="text-center">
                            {{rn_max_br_radnika(element_analize.masina_id)}}
                                                        
                          </td>

                          <td v-bind:class="[ukupno_vrijeme_masine(element_analize.masina_id)/(broj_smjena*480)>1 ? 'text-center bg-danger ': 'text-center']" role="alert">

                            {{zaokruzi(ukupno_vrijeme_masine(element_analize.masina_id)/(broj_smjena*480), 3)}}
                            
                          </td>
                          <td class="text-center">
                            {{zaokruzi(rn_max_br_radnika(element_analize.masina_id)*ukupno_vrijeme_masine(element_analize.masina_id)/(broj_smjena*480),3)}}
                            
                            
                          </td>
                          <td class="text-center">
                            {{rn_max_br_radnika_usvojen(element_analize.masina_id)}}
                            
                          </td>                          
                          <td class="text-center">
                            {{zaokruzi((broj_smjena*480)*(1-(rn_max_br_radnika(element_analize.masina_id)*ukupno_vrijeme_masine(element_analize.masina_id)/(broj_smjena*480))/rn_max_br_radnika_usvojen(element_analize.masina_id)),2)}}
                            
                          </td>     
                        
                
                        </tr>       
                        </tbody>
                      </table>
                    </div> 
          </div>
<!--            - PRIKAZ analize - kraj -->
        </div> 
        
        

      </div>        

<!--      TREBOVNICA -->
      <div class="tab-pane" id="link_trebovnica">
        <div class="row">
          <!-- Trebovnica PDF -->
          <div class="col-12 text-right">
            <button type="button" class="btn btn-warning" @click="show_PDF('T')">
              PDF - trebovnica
            </button>
                
          <!-- Izdatnica -->
 
            <button type="button" class="btn btn-warning" @click="show_PDF('I')">
              PDF - izdatnica
            </button>
          </div>        

        </div> 

        <!-- Detalji trebovnice -->
        <div class="row">
          <div class="col-12 text-left">
            <div class="card-body"> 
              <div id="accordion_treb" role="tablist">

                <div v-for="(treb_matTip, index) in trebovnicaMatTipovi" v-bind:key="index" class="card card-collapse">
                  <div class="card-header" role="tab" :id="'heading-'+index">
                    <h4 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" :href="'#collapse_treb-'+index" aria-expanded="false">
                        <b>{{ treb_matTip.mattip_naziv }}</b>
                        <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                    </h4>
                  </div>

                  <div :id="'collapse_treb-'+index"  class="collapse" role="tabpanel" data-parent="#accordion_treb">
                    <div class="card-body">                    
                        <div class="table-responsive">
                                <table class="table table-no-bordered table-hover datatable-warning" style="display:blok">
                                  <thead class="text-warning">
                                    <th class="text-center">
                                      R. br.
                                    </th>
                                    <th class="text-left">
                                      Materijal
                                    </th>
                                  
                                    <th  class="text-center">
                                      Jedinica<br> mjere
                                    </th>

                                    <th class="text-center">
                                      Količina
                                    </th>
                                    <th class="text-center">
                                      Cijena
                                      <br>(KM)
                                    </th>
                                    <th class="text-right">
                                      Vrijednost
                                      <br>(KM)
                                    </th>

                                    
                                  </thead>
                                  <tbody>
                          <tr v-for="(treb_materijal, index) in trebovnica" v-bind:key="index">
                            <td v-if="treb_materijal.mattip_naziv===treb_matTip.mattip_naziv" class="text-center">
                              {{index+1}}
                            </td>
                            <td v-if="treb_materijal.mattip_naziv===treb_matTip.mattip_naziv">
                              {{treb_materijal.materijal_naziv}}<br>
                              <div v-if="treb_materijal.ima_kontakt!=='0'"><br>kontakt</div>
                              <div v-if="treb_materijal.ima_razredjivac!=='0'"><br>razređivač</div>
                            </td>

                            <td v-if="treb_materijal.mattip_naziv===treb_matTip.mattip_naziv" class="text-center">
                              {{treb_materijal.jed_mjere}}
                            </td>

                            <td v-if="treb_materijal.mattip_naziv===treb_matTip.mattip_naziv" class="text-center">
                              {{zaokruzi(parseFloat(treb_materijal.potrosnja),4)}}
                              <div v-if="treb_materijal.ima_kontakt!=='0'"><br>{{zaokruzi(parseFloat(treb_materijal.potrosnja)*parseFloat(treb_materijal.k_koef),4)}}</div>
                              <div v-if="treb_materijal.ima_razredjivac!=='0'"><br>{{zaokruzi(parseFloat(treb_materijal.potrosnja)*parseFloat(treb_materijal.r_koef),4)}}</div>
                            </td>

                            <td v-if="treb_materijal.mattip_naziv===treb_matTip.mattip_naziv" class="text-center">
                              {{treb_materijal.cijena}}
                              <div v-if="treb_materijal.ima_kontakt!=='0'"><br>{{zaokruzi(parseFloat(treb_materijal.k_cijena),2)}}</div>
                              <div v-if="treb_materijal.ima_razredjivac!=='0'"><br>{{zaokruzi(parseFloat(treb_materijal.r_cijena),2)}}</div>

                            </td>
                            <td v-if="treb_materijal.mattip_naziv===treb_matTip.mattip_naziv" class="text-right">
                              {{zaokruzi(parseFloat(treb_materijal.potrosnja)*treb_materijal.cijena,2)}}
                              <div v-if="treb_materijal.ima_kontakt!=='0'"><br>{{zaokruzi(parseFloat(treb_materijal.potrosnja)*parseFloat(treb_materijal.k_koef)*parseFloat(treb_materijal.k_cijena),2)}}</div>
                              <div v-if="treb_materijal.ima_razredjivac!=='0'"><br>{{zaokruzi(parseFloat(treb_materijal.potrosnja)*parseFloat(treb_materijal.r_koef)*parseFloat(treb_materijal.r_cijena),2)}}</div>
                            </td>  
                          </tr>
                                    <tr>
                                      <td class="text-right text-warning"  colspan="5">Ukupno:</td>
                                      <td class="text-right">{{zaokruzi(total_tipa(treb_matTip.mattip_naziv), 2)}}</td>
                                    </tr>
                                  </tbody>
                                </table>
                        </div> 
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div><!-- detalji trebovnice KRAJ-->
        
        <!--  podnožje trebovnice  -->
        <div class="row">
          <div class="col-12 text-left">
            <div class="card-body">
              <div id="accordion_rad" role="tablist">

                <div class="card card-collapse">

                  <div class="card-header" role="tab" :id="'heading-r1'">
                    <h4 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" :href="'#collapse_r1'" aria-expanded="false">
                        <b>Ukupni trošak materijala za radni nalog</b>
                        <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                    </h4>
                  </div>    
                </div>

                  <div :id="'collapse_r1'"  class="collapse" role="tabpanel" data-parent="#accordion_rad">
                    <div class="card-body">                    
                              <div class="table-responsive">
                                <table class="table table-no-bordered table-hover datatable-warning" style="display:blok">
                                  <thead class="text-warning">
                                    <th class="text-left">
                                      Vrsta troška
                                    </th>
                                    <th class="text-right">
                                      Vrijednost
                                      <br>(KM)
                                    </th>
                                  
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Trošak materijala</td>
                                      <td class="text-right">{{zaokruzi(parseFloat(total_materijal), 2)}}</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div> 
                    </div>
                  </div>


              </div>
            </div>
          </div>
        </div> <!-- podnožje trebovnice KRAJ-->

      </div>  

<!--      RADNI LISTOVI -->
      <div class="tab-pane" id="link_radni_listovi">
        <div class="row">

          <!-- Filter radnih listova po poljima: Kupci, Modeli -->
          <div class="col-6 text-left" >
              <div class="bd-callout bd-callout-warning">
                <div class="form-group has-danger">
                  <label class="col-sm-3 col-form-label text-info"><b>Filter po kupcu:</b></label>
                  <select class="selectpicker col-sm-7 pl-0 pr-0" id="filter_kupac_rn" name="filter_kupac_rn" v-model="filter_kupac_rn"  @change="ucitajRadneListove" data-style="select-with-transition" title="" data-size="5">
                    <option  v-for="listValue in kupci_rn" v-bind:key="listValue.kupac_id" v-bind:value="listValue.kupac_id">
                            {{listValue.kupac_naziv}}
                    </option>
                  </select>
                  <label class="col-sm-3 col-form-label text-info"><b>Filter po modelu:</b></label>
                  <select class="selectpicker col-sm-7 pl-0 pr-0" id="filter_model_rn" name="filter_model_rn" v-model="filter_model_rn"  @change="ucitajRadneListove" data-style="select-with-transition" title="" data-size="5">
                    <option  v-for="listValue in modeli_rn" v-bind:key="listValue.model_id" v-bind:value="listValue.model_id">
                            {{listValue.model_naziv}}
                    </option>
                  </select>
                  

                </div>
              </div>
          </div>  

          <!-- Štampa analize --> 
          <div class="col-6 text-right">
            <button type="button" class="btn btn-warning" @click="show_RL_PDF(0)">
              PDF - radni listovi
            </button>
          </div>        
        </div>

        <!-- Detalji radnih listova -->
        <div class="row">
          <div class="col-12 text-left">
            <div class="card-body">  
              <div id="accordion_radlist" role="tablist">

                <div v-for="(rl_Masina, index) in radni_listoviMasine" v-bind:key="index" class="card card-collapse">
                  <div class="card-header" role="tab" :id="'heading-'+index">
                    <h4 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" :href="'#collapse_radlist-'+index" aria-expanded="false">
                        <b>{{ rl_Masina.masina_naziv }}</b>
                        <i class="material-icons">keyboard_arrow_down</i>
                      </a>
                    </h4>
                  </div>
                  <div :id="'collapse_radlist-'+index"  class="collapse" role="tabpanel" data-parent="#accordion_radlist">
                    <div class="card-body"> 
                        <div class="table-responsive">
                            <table class="table table-no-bordered table-hover datatable-warning" style="display:blok">

                                <thead class="text-warning">

                                          <!-- Štampa analize --> 
          <div class="col-12 text-left">
            <button type="button" class="btn btn-warning" @click="show_RL_PDF(rl_Masina.masina_id)">
              PDF - radni list
            </button>
          </div>        
                                </thead>

                                
                                <thead class="text-warning">
                                    <th>
                                      R. br.
                                    </th>
                                    <th class="text-left">
                                      Naziv<br>proizvoda
                                    </th>
                                    <th  class="text-left">
                                      Vrsta<br>materijala
                                    </th>
                                    <th class="text-center">
                                      Klasa
                                    </th>
                                    <th>
                                    Naziv dijela
                                      <br>proizvoda
                                    </th>
                                    <th v-if="rl_Masina.bruto_mjere==1" class="text-right">
                                      Bruto
                                      <br>dužina
                                    </th>
                                    <th v-else class="text-right">
                                      Neto
                                      <br>dužina
                                    </th>
                                    <th v-if="rl_Masina.bruto_mjere==1" class="text-right">
                                      Bruto
                                      <br>Širina
                                    </th>                                    
                                    <th v-else class="text-right">
                                      Neto
                                      <br>širina
                                    </th> 
                                    <th v-if="rl_Masina.bruto_mjere==1" class="text-right">
                                      Bruto
                                      <br>debljina
                                    </th>                                    
                                    <th v-else class="text-right">
                                      Neto
                                      <br>debljina
                                    </th>                                   
                                    <th class="text-center">
                                      Komada
                                      <br>(kom. u proizvodu x broj proizvoda)
                                    </th>
                                </thead>
                                
                                <tbody>
                                  <tr v-for="(rl_Element, index) in radni_listovi" v-bind:key="index">
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv" class="text-center">
                                      {{index+1}}
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv" class="text-left">
                                      {{rl_Element.proizvod_naziv}}
                                    </td>  
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv" class="text-left">
                                      {{rl_Element.mat_naziv_kratki}}
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv" class="text-center">
                                      {{rl_Element.klasa}}
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv" class="text-left">
                                      {{rl_Element.element_naziv}}
                                    </td>                                                                                                                                          

                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv && zaokruzi(parseFloat(rl_Element.duzina),0)!=0" class="text-right">
                                      {{zaokruzi(parseFloat(rl_Element.duzina),0)}}
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv && zaokruzi(parseFloat(rl_Element.duzina),0)==0" class="text-right">
                                      -
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv && zaokruzi(parseFloat(rl_Element.sirina),0)!=0" class="text-right">
                                      {{zaokruzi(parseFloat(rl_Element.sirina),0)}}
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv && zaokruzi(parseFloat(rl_Element.sirina),0)==0" class="text-right">
                                      -
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv && zaokruzi(parseFloat(rl_Element.debljina),0)!=0" class="text-right">
                                      {{zaokruzi(parseFloat(rl_Element.debljina),0)}}
                                    </td>
                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv && zaokruzi(parseFloat(rl_Element.debljina),0)==0" class="text-right">
                                      -
                                    </td>

                                    <td v-if="rl_Element.masina_naziv===rl_Masina.masina_naziv" class="text-center">
                                      {{zaokruzi(parseFloat(rl_Element.broj_komada)*parseFloat(rl_Element.teh_k),0)}}
                                    </td>                                  
                                  </tr>
                                </tbody>  
                            </table>
                        </div>        
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>      
        </div><!-- Detalji radnih listova - KRAJ -->

      </div>

    </div><!-- kartice - tabovi  kraj -->

  </div><!-- "card-body" kraj -->
</template>

<script>

/// uvozimo komponentu "selectize"
import 'selectize/dist/css/selectize.default.css' // This is required, we use the same css as selectize.js
import VSelectize from '@isneezy/vue-selectize'

  export default {
    data: function (){
      return {

        // promjeniva za izbor iz liste
        pr_selected: {

          id:    0, 
          naziv: 'obavezan unos'
        },
        // promjeniva za izbor iz liste

        rnalog:{},
        stavkern:[],

        // koristi se na kartici analiza
        proizvodi_rn:[],
        analiza_kapaciteta:[], 

        // spisak svih kombinacija proizvod-masina u nalogu
        masina_proizvodi:[],         

        broj_smjena: 1,  /// planirani broj smjena (u bazi "broj_dana"), ako se drugačije ne zada
        
        radni_listovi:[],
        kupci_rn:[],
        filter_kupac_rn: 0,
        modeli_rn:[],
        filter_model_rn: 0,

        trebovnica:[],
      
        proizvodi:[],
        kupci:[],
      
        stavkarn_ed: {
          id: 0,
          r_br:0,
          rnalog_id: 0,
          kupac_id: 0,

          proizvod_id: 0,

          kolicina: 1, 
          napomena: ''

        },
        //element_id: '',


        edit_stavkarn: false,   /// od ovog zavisi da li se modal koristi za unos ili edit (inicijalno unos)




      }
    },

    computed: {

      trebovnicaMatTipovi() {
        return this.trebovnica.reduce((seed, current) => {
          return Object.assign(seed, {
            [current.mattip_naziv]: current
          });
        }, {});
      },

      radni_listoviMasine() {
        return this.radni_listovi.reduce((seed, current) => {
          return Object.assign(seed, {
            [current.masina_naziv]: current
          });
        }, {});
      },

      total_materijal () {
        return this.trebovnica.reduce( (acc, treb_materijal) => {
          return parseFloat(acc) 
              + parseFloat( this.zaokruzi( parseFloat(treb_materijal.cijena)   * parseFloat(treb_materijal.potrosnja), 2))
              + parseFloat( this.zaokruzi( parseFloat(treb_materijal.k_cijena) * parseFloat(treb_materijal.potrosnja) * parseFloat(treb_materijal.k_koef), 2))
              + parseFloat( this.zaokruzi( parseFloat(treb_materijal.r_cijena) * parseFloat(treb_materijal.potrosnja) * parseFloat(treb_materijal.r_koef), 2))

        }, 0)
      },


      zapunjenost_kapaciteta () {
        return this.stavkern.reduce( (acc, stavka) => {
          return parseFloat(acc) 
              + parseFloat( this.zaokruzi( 100*parseFloat(stavka.kolicina) / (parseFloat(stavka.proizvoda_u_smjeni)   * parseFloat(this.rnalog.broj_dana)), 2))


        }, 0)
      },

 
    },




    created(){


        this.UcitajRnalog();
        this.ucitajStavkern();
        this.ucitajKupci_rn(0);  //ne treba osvjezavanje
        this.ucitajModeli_rn(0); //ne treba osvjezavanje
       
        this.ucitajProizvodi_rn();
        this.ucitajAnalizuKapaciteta();
        this.ucitajMasinaProizvodi();
  //      //alert('2');
    //    //alert('3');
       this.ucitajTrebovnicu(); 
       this.ucitajRadneListoveSve(); /// samo na pocetku citaj sve jer nema parametara za filter
                                     /// kasnije svugdje korisnitmo ucitajRadneListove() 

//  //alert('4');
        this.ucitajKupce();
        this.ucitajProizvode();
      //  //alert('5');
      //  this.ucitajMasine();


    },

    methods: {

  total_tipa (mt_naziv) {
    return this.trebovnica.reduce( (acc, treb_materijal) => {
      return parseFloat(acc) 
           + parseFloat((mt_naziv==treb_materijal.mattip_naziv)?this.zaokruzi( parseFloat(treb_materijal.cijena)   * parseFloat(treb_materijal.potrosnja), 2):parseFloat(0))
           + parseFloat((mt_naziv==treb_materijal.mattip_naziv)?this.zaokruzi( parseFloat(treb_materijal.k_cijena) * parseFloat(treb_materijal.potrosnja) * parseFloat(treb_materijal.k_koef), 2):parseFloat(0))
           + parseFloat((mt_naziv==treb_materijal.mattip_naziv)?this.zaokruzi( parseFloat(treb_materijal.r_cijena) * parseFloat(treb_materijal.potrosnja) * parseFloat(treb_materijal.r_koef), 2):parseFloat(0))

    }, 0)
  },

  kolicina_proizvoda (proizvod_id) {
    return this.proizvodi_rn.reduce( (acc, proizvod) => {
      return parseFloat(acc) 
           + parseFloat((proizvod_id==proizvod.id_proizvoda)?parseFloat(proizvod.broj_proizvoda):parseFloat(0))

    }, 0)
  },

  ukupno_vrijeme_masine (masina_id) {
    return this.masina_proizvodi.reduce( (acc, mp) => {
      return parseFloat(acc) 
           + parseFloat((masina_id==mp.masina_id)?parseFloat(mp.vrijeme)*this.kolicina_proizvoda(mp.proizvod_id):parseFloat(0))
//*kolicina_proizvoda(mp.proizvod_id)                                   !
    }, 0)
  },

  rn_max_br_radnika (masina_id) {
    return this.masina_proizvodi.reduce( (acc, mp) => {
      return parseFloat(acc) 
          +  parseFloat((acc<mp.br_radnika)&&masina_id==mp.masina_id&&this.kolicina_proizvoda(mp.proizvod_id)>0?parseFloat(mp.br_radnika-acc):parseFloat(0))
//*kolicina_proizvoda(mp.proizvod_id)                                   !
    }, 0)
  },

  rn_max_br_radnika_usvojen (masina_id) {
    return this.masina_proizvodi.reduce( (acc, mp) => {
      return parseFloat(acc) 
          +  parseFloat((acc<mp.br_radnika_usvojen)&&masina_id==mp.masina_id&&this.kolicina_proizvoda(mp.proizvod_id)>0?parseFloat(mp.br_radnika_usvojen-acc):parseFloat(0))
//*kolicina_proizvoda(mp.proizvod_id)                                   !
    }, 0)
  },

        maybeCreate(){
            return false;
        },

        zaokruzi_old(broj, dec) {

            return broj.toFixed(dec);
      
        },//ova funkcija ne valja
    

        zaokruzi(number, decimals) {
          var x = Math.pow(10, Number(decimals) + 1);
          var y = Math.pow(10, Number(decimals) +2);
          //document.getElementById("demo").innerHTML =(Number(Math.floor(number*(decimals+1))/10) + (1 / x));
          return ((Number(Math.floor(Number(number*x)))/x)+ (1 / y)).toFixed(decimals);
        },

        UcitajRnalog: function() {
          axios.get('./../../api/rnalog/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.rnalog=response.data.data;
              this.$nextTick(function(){ 
                  this.broj_smjena=this.rnalog.broj_dana;

              });
           // 1.2.2021 - vjerovatno višak
           
           //   this.stavkarn_ed.rnalog_id=document.getElementById("rnalog_id").value;
           //   this.stavkarn_ed.sklop=false;
           //   this.stavkarn_ed.id_nadredjenog=0;
            

          })
          .catch(function(error){
              console.log(error);
          });
        },


    //  STAVKE RADNOG NALOGA  //////////////////////////////
        ucitajStavkern: function() {
          axios.get('./../../api/stavke_rn/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.stavkern=response.data.data;
              
           // 1.2.2021 - vjerovatno višak
           
           //   this.stavkarn_ed.rnalog_id=document.getElementById("rnalog_id").value;
           //   this.stavkarn_ed.sklop=false;
           //   this.stavkarn_ed.id_nadredjenog=0;
            

          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajProizvodi_rn: function() {
          axios.get('./../../api/proizvodi_rn/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.proizvodi_rn=response.data;
              
           // 1.2.2021 - vjerovatno višak
           
           //   this.stavkarn_ed.rnalog_id=document.getElementById("rnalog_id").value;
           //   this.stavkarn_ed.sklop=false;
           //   this.stavkarn_ed.id_nadredjenog=0;
            

          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajKupci_rn: function(str) {
          axios.get('./../../api/kupci_rn/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.kupci_rn=response.data;
              
              //if (str!==0){
                  // 3.9.2021 - nakon učitavanja osvježi ali nemoj pri inicijanom učitavanju
                  this.$nextTick(function(){ 
                    $('#filter_kupac_rn').selectpicker("refresh");
                  });
              //}    
          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajModeli_rn: function(str) {
          axios.get('./../../api/modeli_rn/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.modeli_rn=response.data;
              
              //if (str!==0){
                  // 3.9.2021 - nakon učitavanja osvježi ali nemoj pri inicijanom učitavanju
                  this.$nextTick(function(){ 
                    $('#filter_model_rn').selectpicker("refresh");
                  }); 
              //}           

          })
          .catch(function(error){
              console.log(error);
          });
        },

        dodajStavkurn(){

            // prikaži modalni prozor
            $("#novaStavkaNaloga").modal("show");

            this.edit_stavkarn = false;
            this.stavkarn_ed.id           = null;
            this.stavkarn_ed.rnalog_id    = document.getElementById("rnalog_id").value;
            this.stavkarn_ed.r_br         = '';
            this.stavkarn_ed.kupac_id     = 0;
            this.stavkarn_ed.proizvod_id  = 0;
            this.stavkarn_ed.kolicina     = 0;
            this.stavkarn_ed.napomena     = '';
            
            // forsiraj osvježavanje liste
            this.$nextTick(function(){ 
              $('#izbor_kupca').selectpicker("refresh");
              $('#filter_kupac_rn').selectpicker("refresh");
              $('#filter_model_rn').selectpicker("refresh");
              //$('#izbor_proizvoda').selectpicker("refresh"); 
            });

            this.$forceUpdate();
        
        },
        

        izmjeniStavkurn(stavka){
            //alert('id elementa '+stavka.id);
            // prikaži modalni prozor
            $("#novaStavkaNaloga").modal("show");
            this.edit_stavkarn = true;
            this.stavkarn_ed.id           = stavka.id;
            this.stavkarn_ed.rnalog_id    = stavka.rnalog_id;
            this.stavkarn_ed.r_br         = stavka.r_br;
            this.stavkarn_ed.kupac_id     = stavka.kupac_id;
            this.stavkarn_ed.proizvod_id  = stavka.proizvod_id;
                        /// podaci za pretraživu listu
                        this.pr_selected.id    = stavka.proizvod_id;
                        this.pr_selected.naziv = stavka.proizvod_naziv;   

            this.stavkarn_ed.kolicina     = stavka.kolicina;
            this.stavkarn_ed.napomena     = stavka.napomena;


            // forsiraj osvježavanje liste
            this.$nextTick(function(){ 
              $('#izbor_kupca').selectpicker("refresh");
              $('#filter_kupac_rn').selectpicker("refresh");
              $('#filter_model_rn').selectpicker("refresh");
              //$('#izbor_proizvoda').selectpicker("refresh"); 
            });

            this.$forceUpdate();
        
        },
        
        
        

        snimiStavkurn(){


            if (!this.pr_selected || this.pr_selected.id==0 ){
                alert('Nije izabran proizvod!');

            } else{

                //pokupi novo stanje
                this.$forceUpdate();
                  /// uzimamo vrijednost iz dinamičkog selekta
                  this.stavkarn_ed.proizvod_id=this.pr_selected.id;


                if (this.edit_stavkarn===false){
                  // dodaj stavku
                  //alert('dodao pa zatvaram 1');
                  fetch('./../../api/stavkarn', {
                    method: 'post',
                    body: JSON.stringify(this.stavkarn_ed),
                    headers: {
                      'content-type': 'application/json'
                    }
                  })
                  
                  .then(response => response.json())
                  .then(data => {
                    //alert('dodao pa zatvaram 2');
                    this.ucitajStavkern();
                    this.ucitajKupci_rn();
                    this.ucitajModeli_rn();
 



                                    
                    this.ucitajProizvodi_rn();
                    this.ucitajAnalizuKapaciteta();
                    this.ucitajMasinaProizvodi();
                    this.ucitajTrebovnicu();
                    this.ucitajRadneListove(); 
                    //this.ucitajKalkulacijaMaterijali(); 



                    this.isprazniModal();

                    // sakrij modalni prozor
                    $("#novaStavkaNaloga").modal("hide");
                  })
                  .catch(err => console.log(JSON.stringify(this.stavkarn_ed)));

                } else {
                  
                  // ažuriraj postojeći element
                    fetch('./../../api/stavkarn', {
                    method: 'put',
                    body: JSON.stringify(this.stavkarn_ed),
                    headers: {
                      'content-type': 'application/json'
                    }
                  })
                  .then(response => response.json())
                  .then(data => {
                    this.ucitajStavkern();
                    this.ucitajKupci_rn();
                    this.ucitajModeli_rn();
                  
                    this.ucitajProizvodi_rn();
                    this.ucitajAnalizuKapaciteta();
                    this.ucitajMasinaProizvodi();
                    this.ucitajTrebovnicu();
                    this.ucitajRadneListove(); 
                    //this.ucitajKalkulacijaMaterijali(); 
                    this.isprazniModal();

                    // sakrij modalni prozor
                    $("#novaStavkaNaloga").modal("hide");

                  })
                  .catch(err => console.log(err));
                  
                
                }
          
            }
        },

        ukloniStavkurn(id){
          if(confirm('Da li želite ukloniti stavku?')){
            fetch(`./../../api/stavkarn/${id}`,{
              method: 'delete'
            })
            .then(response=>response.json())
            .then(data=>{
              //alert('Element uklonjen');
              this.ucitajStavkern();
              this.ucitajKupci_rn();
              this.ucitajModeli_rn();
         
              this.ucitajProizvodi_rn();
              this.ucitajAnalizuKapaciteta();
              this.ucitajMasinaProizvodi();
              this.ucitajTrebovnicu();
              this.ucitajRadneListove(); 
              //this.ucitajKalkulacijaMaterijali(); 
            })

            
          }
        },

        isprazniModal(){
  
              this.stavkarn_ed.id           = 0;
              
              this.stavkarn_ed.r_br        = '';
              this.stavkarn_ed.kupac_id    = 0;
              this.stavkarn_ed.proizvod_id = 0;
              this.stavkarn_ed.kolicina        = 0;
              this.stavkarn_ed.napomena        = '';


                          // polja za pretraživu listu
                          if (this.pr_selected){
                              this.pr_selected.id     = 0;//this.materijal.mattipoznaka_id;
                              this.pr_selected.naziv  = '';
                          }else{
                            this.pr_selected = {
                              id:    0,
                              naziv: ''
                            } 
                          }     

              // prebaci modalni prozor u mod dodavanja
              this.edit_stavkarn = false;
              this.$nextTick(function(){ 
                $('#izbor_kupca').selectpicker("refresh");
                $('#filter_kupac_rn').selectpicker("refresh");
                $('#filter_model_rn').selectpicker("refresh");
                //$('#izbor_proizvoda').selectpicker("refresh");
                
                 
              });
              this.$forceUpdate();

        },

        zatvoriModal(){
          
          // obriši podatke
          this.isprazniModal();
          
          // a potom ga sakrij
          $("#novaStavkaNaloga").modal("hide");
                    
        },

        





        ucitajAnalizuKapaciteta: function() {
          axios.get('./../../api/analiza_kapaciteta_rn/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.analiza_kapaciteta=response.data;
              
          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajMasinaProizvodi: function() {
          axios.get('./../../api/analiza_kapaciteta_rn_mp/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.masina_proizvodi=response.data;
              
          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajTrebovnicu: function() {
          var nista
          
          //axios.get('./../../api/kalkulacija_proizvoda/'+document.getElementById("rnalog_id").value)
          
          axios.get('./../../api/trebovnica/'+document.getElementById("rnalog_id").value)
          .then((response)=>{
              this.trebovnica=response.data;
          })
          .catch(function(error){
              console.log(error);
          });
        
        },

        ucitajRadneListoveSve: function() {
          var nista
          
          axios.get('./../../api/radni_listovi/'+document.getElementById("rnalog_id").value+'/0/0')
          .then((response)=>{
              this.radni_listovi=response.data;
          })
          .catch(function(error){
              console.log(error);
          });
        
        },

        ucitajRadneListove: function() {
          var nista
          
          axios.get('./../../api/radni_listovi/'+document.getElementById("rnalog_id").value+'/'+document.getElementById("filter_kupac_rn").value+'/'+document.getElementById("filter_model_rn").value)
          .then((response)=>{
              this.radni_listovi=response.data;
          })
          .catch(function(error){
              console.log(error);
          });
        
        },


/*
        ucitajMasine: function() {
          axios.get('./../../api/masine')
          .then((response)=>{
              this.masine=response.data.data;
          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajAlate: function() {
          axios.get('./../../api/alati')
          .then((response)=>{
              this.alati=response.data.data;
          })
          .catch(function(error){
              console.log(error);
          });
        },
*/
        ucitajKupce: function() {
          axios.get('./../../api/kupci')
          .then((response)=>{
              this.kupci=response.data.data;
          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajProizvode: function() {
          axios.get('./../../api/proizvodi_all')
          .then((response)=>{
              this.proizvodi=response.data.data;
          })
          .catch(function(error){
              console.log(error);
          });
        },        
/*
        ucitajProizvode:function() {
        
        //prikaži sve materijale tipa         
              axios.get('./../../api/proizvodi_t/'+this.stavkarn_ed.mattip_id)
              .then((response)=>{
                  this.proizvodi=response.data.data;
                  this.$nextTick(function(){ 
                    $('#izbor_materijala').selectpicker("refresh");

                    /// ako prikazuješ materijale prikaži i osobine tog tipa
                    this.ucitajOsobineElementa();
                    this.$forceUpdate();
                  });

              })
              .catch(function(error){
                  console.log(error);
              });

        },

        ucitajOsobineElementa:function() {
        //prikaži sve osobine izabranog tipa  
        
        //alert('citam osobine za:'+this.stavkarn_ed.mattip_id);       
              axios.get('./../../api/osobine_elementa_t/'+this.stavkarn_ed.mattip_id)
              .then((response)=>{
                  this.osobine_elementa=response.data.data;
                  this.$nextTick(function(){ 
        //alert('procitao osobine' + this.osobine_elementa.naziv+' za:'+this.stavkarn_ed.mattip_id); 
        this.prikaziOsobineElementa(this.stavkarn_ed);  
                  });
                
              })
              .catch(function(error){
                  console.log(error);
              });

        },

        ucitajListeOsobina () {
              
            switch(this.stavkarn_ed.mattip_id) {

              case 1:
                this.lista_1=this.tip_1_lista_1;
                break;
              case 2:
                this.lista_1=this.tip_2_lista_1;
                break;
              case 4:
                this.lista_1=this.tip_4_lista_1;
                break;
              case 5:
                this.lista_1=this.tip_5_lista_1;
                break;
              case 6:
                this.lista_1=this.tip_6_lista_1;
                break;
              case 9:
                this.lista_1=this.tip_9_lista_1;
                break;              
              case 10:
                this.lista_1=this.tip_10_lista_1;
                break;
              case 11:
                this.lista_1=this.tip_11_lista_1;
                break;              
              case 12:
                this.lista_1=this.tip_12_lista_1;
                break;
            
            
              default:
                this.lista_1=this.tip_13_lista_1;

            };
              
            switch(this.stavkarn_ed.mattip_id) {

              case 4:
                this.lista_2=this.tip_4_lista_2;
                break;
              case 5:
                this.lista_2=this.tip_5_lista_2;
                break;
              case 6:
                this.lista_2=this.tip_6_lista_2;
                break;

              case 11:
                this.lista_2=this.tip_11_lista_2;
                break;   

              default:
                this.lista_2=this.tip_13_lista_2;

            };
              
            switch(this.stavkarn_ed.mattip_id) {

              case 4:
                this.lista_3=this.tip_4_lista_3;
                break;
              case 5:
                this.lista_3=this.tip_5_lista_3;
                break;
              case 6:
                this.lista_3=this.tip_6_lista_3;
                break;

              case 11:
                this.lista_3=this.tip_11_lista_3;
                break;   

              default:
                this.lista_3=this.tip_13_lista_3;

            };
              
        },


        prikaziOsobineElementa(element){


          if (this.stavkarn_ed.sklop==1){
              // ne prikazuj ništa od osobina jer ih sklop nema

              /// AREA polja
              this.stavkarn_ed.el_lab_31      = "Opis sklopa";
              this.stavkarn_ed.el_txt_31      = stavka.el_txt_31;
          }else{
      //alert('umjesto '+this.stavkarn_ed.el_lab_01+' ubaci: '+this.osobine_elementa.elab_01);

      //alert('trt');

              this.stavkarn_ed.el_lab_01      = this.osobine_elementa.elab_01;
              this.stavkarn_ed.el_int_01      = stavka.el_int_01;
              this.stavkarn_ed.el_jm_01       = this.osobine_elementa.ejed_01;

              this.stavkarn_ed.el_lab_02      = this.osobine_elementa.elab_02;
              this.stavkarn_ed.el_int_02      = stavka.el_int_02;
              this.stavkarn_ed.el_jm_02       = this.osobine_elementa.ejed_02;

              this.stavkarn_ed.el_lab_03      = this.osobine_elementa.elab_03;
              this.stavkarn_ed.el_int_03      = stavka.el_int_03;
              this.stavkarn_ed.el_jm_03       = this.osobine_elementa.ejed_03;

              this.stavkarn_ed.el_lab_04      = this.osobine_elementa.elab_04;
              this.stavkarn_ed.el_int_04      = stavka.el_int_04;
              this.stavkarn_ed.el_jm_04       = this.osobine_elementa.ejed_04;

              this.stavkarn_ed.el_lab_05      = this.osobine_elementa.elab_05;
              this.stavkarn_ed.el_int_05      = stavka.el_int_05;
              this.stavkarn_ed.el_jm_05       = this.osobine_elementa.ejed_05;

              this.stavkarn_ed.el_lab_06      = this.osobine_elementa.elab_06;
              this.stavkarn_ed.el_int_06      = stavka.el_int_06;
              this.stavkarn_ed.el_jm_06       = this.osobine_elementa.ejed_06;

              this.stavkarn_ed.el_lab_07      = this.osobine_elementa.elab_07;
              this.stavkarn_ed.el_int_07      = stavka.el_int_07;
              this.stavkarn_ed.el_jm_07       = this.osobine_elementa.ejed_07;    

                        /// AREA polja
              this.stavkarn_ed.el_lab_31      = this.osobine_elementa.elab_31;
              this.stavkarn_ed.el_txt_31      = stavka.el_txt_31;
          }

  
          

          
          
          //alert(this.osobine_elementa.elab_01);
        
        },

        izmjeniAnalizu(element_analize){
          // prikaži modalni prozor
          $("#izmjenaAnalize").modal("show");

          this.analiza_operacija_ed.rnalog_id                      = element_analize.rnalog_id;
          this.analiza_operacija_ed.masina_id                        = element_analize.masina_id;

          //this.operacija_ed.element_id   = this.stavkarn_ed.id; //// operacija pripada tekućem elementu        
          //this.operacija_ed.redni_broj   = operacija.redni_broj;        
          //this.operacija_ed.masina_id    = operacija.masina_id;        
          //this.operacija_ed.alat_id      = operacija.alat_id;        
          this.analiza_operacija_ed.br_radnika                = element_analize.br_radnika;        
          this.analiza_operacija_ed.br_radnika_usvojen        = element_analize.br_radnika_usvojen;
        

          //this.operacija_ed.opis         = operacija.opis;
          //this.operacija_ed.parametri    = operacija.parametri;
          //this.operacija_ed.vrijeme      = operacija.vrijeme;


        },

        zatvoriModalAnaliza(){
          
          // obriši podatke
          //this.isprazniModalAnaliza();
          
          // a potom ga sakrij
          
          $("#izmjenaAnalize").modal("hide");
          
                    
        },

        snimiAnalizu(){

            // ažuriraj postojeću operaciju
              fetch('./../../api/analiza_kapaciteta_operacija', {
              method: 'put',
              body: JSON.stringify(this.analiza_operacija_ed),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              // osvježi prikaz tabele
              this.ucitajOperacije();
              this.ucitajAnalizuKapaciteta();
                                                          // isprazni modalnu formu
                                                          // this.isprazniModalOperacija();

              // sakrij modalni prozor
              $("#izmjenaAnalize").modal("hide");

            })
            .catch(err => console.log(err));
          
        },

        snimiBrProizvoda(){
          document.getElementById("proizvoda_u_smjeni").value=this.plan_br_proizvoda;

        },
        */


        // 21.7.2021 - vjerovatno neće trebati
        prikaziPlan(){
          //document.getElementById("input-proizvoda_u_smjeni").disabled = false;
          document.getElementById("input-broj_dana").value=this.broj_smjena;
          this.rnalog.broj_dana=this.broj_smjena;
          //document.getElementById("input-proizvoda_u_smjeni").disabled = true;
        },


        show_RN_PDF(){
       
         // open the page as popup //
         var page = '../../../api/rnalog_pdf/'+document.getElementById("rnalog_id").value;
         //var page = '/test_pdf';
         
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=800,height=1200,top=300");
         
         // focus on the popup //
         myWindow.focus();
         


         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
         
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
        
        },             

        show_PDF(tr_iz){
       
         // open the page as popup //
         var page = '../../../api/trebovnica_pdf/'+document.getElementById("rnalog_id").value+'/'+tr_iz;
         //var page = '/test_pdf';
         
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=800,height=1200,top=300");
         
         // focus on the popup //
         myWindow.focus();
         


         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
         
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
        
        },        

        show_RL_PDF(id_masine){
       
         // open the page as popup //
         var page = '../../../api/radni_listovi_pdf/'+document.getElementById("rnalog_id").value+'/'+id_masine+'/'+document.getElementById("filter_kupac_rn").value+'/'+document.getElementById("filter_model_rn").value;
         //var page = '/test_pdf';
         
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=800,height=1200,top=300");
         
         // focus on the popup //
         myWindow.focus();
        
        }        


      
    },


    components: {
      VSelectize
    }
    

  }
</script>
