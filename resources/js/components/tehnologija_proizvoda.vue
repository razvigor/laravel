<template>
  <div class="card-body">

<!-- KARTICE - LINKOVI  -->
    <ul class="nav nav-pills nav-pills-info" role="tablist"  style="background-image: -webkit-linear-gradient(top right,#efefef 0, #fdfdfd 100%);">
      <li class="nav-item">
        <a class="nav-link active show" data-toggle="tab" href="#link_lista_materijala" role="tablist">
          Sastavnica i tehnologija
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link_pregled_tehnologija" role="tablist">
          Pregled tehnologija
        </a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link_analiza_kapaciteta" role="tablist">
          Analiza kapaciteta
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#link_kalkulacija" role="tablist">
          Kalkulacija
        </a>
      </li>      
    </ul>
<!-- KARTICE - TABOVI  -->
    <div class="tab-content tab-space"   style="background-image: -webkit-linear-gradient(bottom, #fdfdfd 98%, #e4e4e4);">

<!-- SASTAVNICA I TEHNOLOGIJA OBRADE -->
      <div class="tab-pane active show" id="link_lista_materijala">


        <!-- Modalne forme (element, operacija) -->
        <div class="row">
          <!-- Button "Novi element" -->
          <div class="col-12 text-right">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#noviElementProizvoda" @click="dodajElement">
              Novi element / sklop
            </button>
          </div>
                    
          <!-- Modal (dodaj/izmjeni element)- pocetak -->
          <div class="modal fade" id="noviElementProizvoda"  tabindex="-1" role="dialog" aria-labelledby="noviProizvod" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 75%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12">

                          <form  class="form-horizontal"  @submit.prevent="snimiElement()">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                <h4 class="card-title" v-if="edit_element">Izmjena elementa/sklopa</h4>
                                <h4 class="card-title" v-else>Novi element/sklop</h4>

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
                                  <label class="col-sm-3 col-form-label">Naziv</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="element_ed.naziv"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Nadređeni element</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select class="selectpicker col-sm-12 pl-0 pr-0" id="izbor_nadredjenog" name="izbor_nadredjenog" v-model="element_ed.id_nadredjenog" data-style="select-with-transition" title="" data-size="5">
                                        <option  value="0">
                                                Proizvod
                                        </option>
                                        <option  v-for="listValue in sklopovi" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.naziv}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>   
                              </div>

                              <div class="card-body">
                                  <ul class="nav nav-pills nav-pills-info" role="tablist"  style="background-image: -webkit-linear-gradient(top right,#efefef 0, #fdfdfd 100%);">
                                    <li class="nav-item">
                                      <a class="nav-link active show" data-toggle="tab" href="#link_osobine" role="tablist">
                                        Osobine elementa
                                      </a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#link_operacije" role="tablist">
                                        Tehnologija obrade elementa
                                      </a>
                                    </li>
                                  </ul>

                                  <div class="tab-content tab-space"   style="background-image: -webkit-linear-gradient(top left,#efefef 0, #fdfdfd 100%);">
                                      <div class="tab-pane active show" id="link_osobine">


                                                                      <div class="row">
                                                                        <label class="col-sm-3 col-form-label label-checkbox">Sklop (da/ne)</label>
                                                                        <div class="col-sm-9 checkbox-radios">
                                                                          <div class="togglebutton">
                                                                            <label>
                                                                              <input type="checkbox" v-model="element_ed.sklop" value="false">
                                                                              <span class="toggle"></span>
                                                                            </label>
                                                                          </div>
                                                                        </div>
                                                                      </div>

                                                                      <div class="row" v-show="element_ed.sklop === true || element_ed.sklop === 1">
                                                                        <label class="col-sm-3 col-form-label">Opis sklopa</label>
                                                                        <div class="col-sm-7">
                                                                          <div class="form-group has-danger">
                                                                            
                                                                            <textarea name="opis" id="input-opis-sklopa" cols="30" rows="10" class="form-control" v-model="element_ed.el_txt_31" placeholder="unesite kratak opis sklopa (nije obavezno)"></textarea>
                                                                          </div>
                                                                        </div>
                                                                      </div> 

                                                                      

                                          <div  v-show="element_ed.sklop === false || element_ed.sklop === 0">
                                                                      <div class="row">
                                                                        <label class="col-sm-3 col-form-label">Tip materijala</label>
                                                                        <div class="col-sm-7">
                                                                          <div class="form-group has-danger">
                                                                            <select required class="selectpicker col-sm-12 pl-0 pr-0" id="izbor_tipa_materijala" v-model="element_ed.mattip_id" @change="ucitajMaterijale" data-style="select-with-transition" title="" data-size="7">
                                                                              <option value="0" disabled>obavezan unos</option>
                                                                              <option  v-for="listValue in mattipovi" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                                      {{listValue.naziv}}
                                                                              </option>
                                                                            </select>
                                                                          </div>
                                                                        </div>
                                                                      </div>       

                                                                      <div class="row">
                                                                        <label class="col-sm-3 col-form-label">Materijal</label>
                                                                        <div class="col-sm-7">
                                                                          <div class="form-group has-danger">


                                                                            <v-selectize  :create-item="maybeCreate()" :options="materijali"  v-model="m_selected" placeholder="izaberite materijal" key-by="id" label="naziv" :keys="['naziv', 'naziv_2', 'naziv_3', 'naziv_4']"/>
                                                                            <!--
                                                                            <select required class="selectpicker col-sm-12 pl-0 pr-0" id="izbor_materijala" v-model="element_ed.materijal_id"  data-style="select-with-transition" title="" data-size="7">
                                                                                                                                                            
                                                                              <option value="0" disabled>obavezan unos</option>
                                                                              <option  v-for="listValue in materijali" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                                      {{listValue.naziv}}
                                                                              </option>
                                                                            </select>
                                                                            -->
                                                                          </div>
                                                                        </div>
                                                                      </div>    

                             

                                                                      <div class="row" v-show="element_ed.el_lab_01 !== null && element_ed.el_lab_01 !==''">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_01 }}</label>
                                                                        <div class="col-sm-2">
                                                                          <div class="form-group has-danger">
                                                                            <input class="form-control" v-model="element_ed.el_int_01"  type="text" placeholder="" value=""/>
                                                                          </div>
                                                                        </div>
                                                                        <label class="col-sm-3 mr-auto col-form-label text-left">{{ element_ed.el_jm_01 }}</label>
                                                                      </div>                                           

                                                                      <div class="row" v-show="element_ed.el_lab_02 !== null && element_ed.el_lab_02 !=='' ">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_02 }}</label>
                                                                        <div class="col-sm-2">
                                                                          <div class="form-group has-danger">
                                                                            <input class="form-control" v-model="element_ed.el_int_02"  type="text" placeholder="" value=""/>
                                                                          </div>
                                                                        </div>
                                                                        <label class="col-sm-3 mr-auto col-form-label text-left">{{ element_ed.el_jm_02 }}</label>
                                                                      </div>

                                                                      <div class="row" v-show="element_ed.el_lab_03 !== null && element_ed.el_lab_03 !=='' ">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_03 }}</label>
                                                                        <div class="col-sm-2">
                                                                          <div class="form-group has-danger">
                                                                            <input class="form-control" v-model="element_ed.el_int_03"  type="text" placeholder="" value=""/>
                                                                          </div>
                                                                        </div>
                                                                        <label class="col-sm-3 mr-auto col-form-label text-left">{{ element_ed.el_jm_03 }}</label>
                                                                      </div>   

                                                                      <div class="row" v-show="element_ed.el_lab_04 !== null && element_ed.el_lab_04 !=='' ">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_04 }}</label>
                                                                        <div class="col-sm-2">
                                                                          <div class="form-group has-danger">
                                                                            <input class="form-control" v-model="element_ed.el_int_04"  type="text" placeholder="" value=""/>
                                                                          </div>
                                                                        </div>
                                                                        <label class="col-sm-3 mr-auto col-form-label text-left">{{ element_ed.el_jm_04 }}</label>
                                                                      </div>   

                                                                      <div class="row" v-show="element_ed.el_lab_05 !== null && element_ed.el_lab_05 !=='' ">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_05 }}</label>
                                                                        <div class="col-sm-2">
                                                                          <div class="form-group has-danger">
                                                                            <input class="form-control" v-model="element_ed.el_int_05"  type="text" placeholder="" value=""/>
                                                                          </div>
                                                                        </div>
                                                                        <label class="col-sm-3 mr-auto col-form-label text-left">{{ element_ed.el_jm_05 }}</label>
                                                                      </div>   

                                                                      <div class="row" v-show="element_ed.el_lab_06 !== null && element_ed.el_lab_06 !=='' ">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_06 }}</label>
                                                                        <div class="col-sm-2">
                                                                          <div class="form-group has-danger">
                                                                            <input class="form-control" v-model="element_ed.el_int_06"  type="text" placeholder="" value=""/>
                                                                          </div>
                                                                        </div>
                                                                        <label class="col-sm-3 mr-auto col-form-label text-left">{{ element_ed.el_jm_06 }}</label>
                                                                      </div>   

                                                                      <div class="row" v-show="element_ed.el_lab_07 !== null && element_ed.el_lab_07 !==''">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_07 }}</label>
                                                                        <div class="col-sm-2">
                                                                          <div class="form-group has-danger">
                                                                            <input class="form-control" v-model="element_ed.el_int_07"  type="text" placeholder="" value=""/>
                                                                          </div>
                                                                        </div>
                                                                        <label class="col-sm-3 mr-auto col-form-label text-left">{{ element_ed.el_jm_07 }}</label>
                                                                      </div> 



                                                                      <div class="row" v-show="element_ed.el_lab_31 !== null && element_ed.el_lab_31 !==''">
                                                                        <label class="col-sm-3 col-form-label">{{ element_ed.el_lab_31 }}</label>
                                                                        <div class="col-sm-7 mr-auto">
                                                                          <div class="form-group has-danger">
                                                                            <textarea name="opis" id="input-opis-elementa" cols="30" rows="4" class="form-control" v-model="element_ed.el_txt_31" placeholder="unesite kratak opis (nije obavezno)"></textarea>
                                                                          </div>
                                                                        </div>
                                                                      </div>  
                                                                      
                                          </div>                 


                                      </div>

                                      <div class="tab-pane" id="link_operacije">

                                          <div class="row">
                                      
                                              <div class="col-12 text-right">
                                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#novaOperacijaElementa" data-backdrop="static" data-keyboard="false">
                                                      Nova operacija
                                                  </button>
                                              </div>
                                          


                                          </div>  

                                          <div class="table-responsive">
                                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                                  <thead class="text-warning">
                                                      <th>
                                                      R.br.
                                                      </th>
                                                      <th>
                                                      Mašina
                                                      </th>
                                                      <th>
                                                      Br. rukovalaca
                                                      </th>
                                                      <th>
                                                      Br. pomoćnika
                                                      </th>
                                                      <th>
                                                      Opis operacije
                                                      </th>
                                                      <th>
                                                      Parametri obrade
                                                      </th>
                                                      <th>
                                                      Alat
                                                      </th>
                                                      <th>
                                                      Vrijeme (min)
                                                      </th>
                                                  
                                                      <th class="text-right">
                                                      Ažuriranje<br> osobina i<br> tehnologije
                                                      </th>
                                            
                                                  </thead>
                                                  <tbody>
            

                                                    <tr v-for="operacija in operacije" v-bind:key="operacija.id">
                                                      <td>
                                                        {{operacija.redni_broj}}
                                                      </td>
                                                      <td>
                                                        {{operacija.masina_naziv}}
                                                      </td>
                                                      <td>
                                                        {{operacija.br_rr}}
                                                      </td>
                                                      <td>
                                                        {{operacija.br_pr}}
                                                      </td>                                                                                                                                                    
                                                      <td>
                                                        {{operacija.opis}}
                                                      </td>    
                                                      <td>
                                                        {{operacija.parametri}}
                                                      </td>    
                                                      <td>
                                                        {{operacija.alat_naziv}}
                                                      </td>         
                                                      <td>
                                                        {{operacija.vrijeme}}
                                                      </td>                                                      
                                                      <td class="td-actions text-right">
                                                          <form action="" method="post">
                                                    
                                                            
                                                            
                                                              <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniOperaciju(operacija)">
                                                                  <i class="material-icons">edit</i>
                                                                  
                                                              </button>
                                                            
                                                            
                                                              <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniOperaciju(operacija.id)">
                                                                  <i class="material-icons">delete</i>
                                                                  
                                                              </button>
                                                            
                                                          </form>
                                                      </td>
                                              
                                                    </tr>    

                                                  </tbody>
                                              </table>

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

          <!-- ModalOperacije - pocetak -->
          <div class="modal fade" id="novaOperacijaElementa" tabindex="-2" role="dialog" aria-labelledby="novaOperacija" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 65%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 

                          <form  class="form-horizontal"  @submit.prevent="snimiOperaciju()">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                <h4 class="card-title" v-if="edit_element">Izmjena operacije</h4>
                                <h4 class="card-title" v-else>Nova operacija</h4>

                              </div>
                              <div class="card-body ">
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <button type="button" id="btn-zatvori-modal-o"  class="btn btn-warning" @click="zatvoriModalOperacija()">
                                      Zatvori operaciju
                                    </button>
                                  </div>
                                </div>

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Redni br.</label>
                                  <div class="col-sm-2 mr-auto">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="operacija_ed.redni_broj"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <!-- Ovde ide lista sa pretragom--> 
                                  <label class="col-sm-3 col-form-label">Mašina</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      
                                      <v-selectize :create-item="maybeCreate()" :options="masine" v-model="masina_selected" placeholder="izaberite mašinu" key-by="id" label="naziv" :keys="['naziv', 'naziv_2', 'naziv_3', 'naziv_4']" />
                                      
                                                                            
                                      <!--
                                      <select class="selectpicker col-sm-12 pl-0 pr-0" id="izbor_masine" v-model="operacija_ed.masina_id" data-style="select-with-transition" title="" data-size="5">
                                        <option  v-for="listValue in masine" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.naziv}}
                                        </option>
                                      </select>
                                      -->
                                    </div>
                                  </div>
                                </div>   
                              
                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Broj rukovalaca</label>
                                  <div class="col-sm-2 mr-auto">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="operacija_ed.br_rr"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Broj pomoćnika</label>
                                  <div class="col-sm-2 mr-auto">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="operacija_ed.br_pr"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Opis operacije</label>
                                  <div class="col-sm-7 mr-auto">
                                    <div class="form-group has-danger">
                                      <textarea name="opis" id="input-opis-operacije" cols="30" rows="4" class="form-control" v-model="operacija_ed.opis" placeholder="unesite kratak opis (nije obavezno)"></textarea>
                                    </div>
                                  </div>
                                </div>  

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Parametri obrade</label>
                                  <div class="col-sm-7 mr-auto">
                                    <div class="form-group has-danger">
                                      <textarea name="opis" id="input-parametri" cols="30" rows="4" class="form-control" v-model="operacija_ed.parametri" placeholder="unesite parametre (nije obavezno)"></textarea>
                                    </div>
                                  </div>
                                </div>  

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Alat</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select class="selectpicker col-sm-12 pl-0 pr-0" id="izbor_alata" v-model="operacija_ed.alat_id" data-style="select-with-transition" title="" data-size="5">
                                        <option  v-for="listValue in alati" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.alat_naziv}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>  

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Vrijeme</label>
                                  <div class="col-sm-2  mr-auto">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="operacija_ed.vrijeme"  type="text" placeholder="" value="" required="true" aria-required="true"/>
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
          <!-- ModalOperacije - kraj -->



        </div>  

        <!-- Pregled elemenata po tipovima materijala -->
        <div class="row">
          <div class="col-12 text-left">
            <div id="accordion" role="tablist">


              <!-- MASIV -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_01">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_01" aria-expanded="false" aria-controls="collapse_01">
                      <b>Elementi - Masiv (Osobine i Tehnologije obrade)</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_01" class="collapse" role="tabpanel" aria-labelledby="heading_01" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> elementa
                                  </th>
                                  <th>
                                    Materijal
                                  </th>
                                  
                                  <th>
                                    Dužina<br> neto
                                  </th>
                                  <th>
                                    Širina<br> neto
                                  </th>
                                  <th>
                                    Debljina<br> neto
                                  </th>
                                  <th>
                                    Dužina<br> bruto
                                  </th>
                                  <th>
                                    Širina<br> bruto
                                  </th>
                                  <th>
                                    Debljina<br> bruto
                                  </th>
                                  <th>
                                    Broj<br> komada
                                  </th>
                                  <th>
                                    Volume<br> neto (m3)
                                  </th>
                                  <th>
                                    Volume<br> bruto (m3)
                                  </th>

                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>


                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_01"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>

                                  <td>
                                    {{element.el_int_01}}
                                  </td>
                                  <td>
                                    {{element.el_int_02}}
                                  </td>
                                  <td>
                                    {{element.el_int_03}}
                                  </td>
                                  <td>
                                    {{element.el_int_04}}
                                  </td>
                                  <td>
                                    {{element.el_int_05}}
                                  </td>
                                  <td>
                                    {{element.el_int_06}}
                                  </td>
                                  <td>
                                    {{element.el_int_07}}
                                  </td>                          
                                  <td>
                                    {{zaokruzi(element.el_int_01*element.el_int_02*element.el_int_03*element.el_int_07/1000000000,3)}}
                                  </td>   
                                  <td>
                                    {{zaokruzi(element.el_int_04*element.el_int_05*element.el_int_06*element.el_int_07/1000000000,3)}}
                                  </td>   



                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- PLOČASTI MATERIJAL -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_02">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_02" aria-expanded="false" aria-controls="collapse_02">
                      <b>Elementi - Pločasti materijali (Osobine i Tehnologije obrade)</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_02" class="collapse" role="tabpanel" aria-labelledby="heading_02" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> elementa
                                  </th>
                                  <th>
                                    Materijal
                                  </th>
                                  
                                  <th class="text-right">
                                    Dužina<br> neto
                                  </th>
                                  <th class="text-right">
                                    Širina<br> neto
                                  </th>
                                  <th class="text-right">
                                    Debljina<br> neto
                                  </th>
                                  <th class="text-right">
                                    Dužina<br> bruto
                                  </th>
                                  <th class="text-right">
                                    Širina<br> bruto
                                  </th>
                                  <th class="text-right">
                                    Debljina<br> bruto
                                  </th>
                                  <th class="text-center">
                                    Broj<br> komada
                                  </th>
                                  <th  class="text-center">
                                    Jedinica<br> mjere
                                  </th>                                  
                                  <th class="text-right">
                                    Količina<br> neto
                                  </th>
                                  <th class="text-right">
                                    Količina<br> bruto
                                  </th>

                                  <th class="text-center">
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_02"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>

                                  <td class="text-right">
                                    {{element.el_int_01}}
                                  </td>
                                  <td class="text-right">
                                    {{element.el_int_02}}
                                  </td>
                                  <td class="text-right">
                                    {{element.el_int_03}}
                                  </td>
                                  <td class="text-right">
                                    {{element.el_int_04}}
                                  </td>
                                  <td class="text-right">
                                    {{element.el_int_05}}
                                  </td>
                                  <td class="text-right">
                                    {{element.el_int_06}}
                                  </td>
                                  <td class="text-center">
                                    {{element.el_int_07}}
                                  </td> 
                                  <td class="text-center">
                                    {{element.jed_mjere}}
                                  </td> 
                                  <td v-if="element.jed_mjere=='m3'"  class="text-right">
                                    {{element.el_int_01*element.el_int_02*element.el_int_03*element.el_int_07/1000000000}}
                                  </td>   
                                  <td v-else-if="element.jed_mjere=='m2'"  class="text-right">
                                    {{element.el_int_01*element.el_int_02*element.el_int_07/1000000}}
                                  </td>   
                                  <td v-else class="text-right">
                                    {{element.el_int_07}}
                                  </td>   

                                  <td v-if="element.jed_mjere=='m3'"  class="text-right">
                                    {{element.el_int_04*element.el_int_05*element.el_int_06*element.el_int_07/1000000000}}
                                  </td>   
                                  <td v-else-if="element.jed_mjere=='m2'"  class="text-right">
                                    {{element.el_int_04*element.el_int_05*element.el_int_07/1000000}}
                                  </td>   
                                  <td v-else  class="text-right">
                                    {{element.el_int_07}}
                                  </td>   


                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'"  class="text-center">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- GURTNA -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_03">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_03" aria-expanded="false" aria-controls="collapse_03">
                      <b>Elementi - Gurtna</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_03" class="collapse" role="tabpanel" aria-labelledby="heading_03" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> elementa
                                  </th>

                                  <th>
                                    Materijal
                                  </th>



                                  <th>
                                    Potrebna<br>dužina (m)
                                  </th>



                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_03"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>



                                  <td>
                                    {{element.el_int_03}}
                                  </td>




                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- KARTON -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_04">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_04" aria-expanded="false" aria-controls="collapse_04">
                      <b>Elementi - Karton</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_04" class="collapse" role="tabpanel" aria-labelledby="heading_04" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> elementa
                                  </th>
                                  <th>
                                    Materijal
                                  </th>


                                  <th>
                                    Dužina
                                  </th>
                                  <th>
                                    Širina
                                  </th>
                                  <th>
                                    Visina
                                  </th>

                                  <th>
                                    Proizvoda<br> u kutiji
                                  </th>
                                  <th>
                                    Potrebno<br> plašteva
                                  </th>



                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_04"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>


                                  <td>
                                    {{element.el_int_01}}
                                  </td>
                                  <td>
                                    {{element.el_int_02}}
                                  </td>
                                  <td>
                                    {{element.el_int_03}}
                                  </td>

                                  <td>
                                    {{element.el_int_05}}
                                  </td>
                                  <td>
                                    {{element.el_int_06}}
                                  </td>


                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- LJEPENKA -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_05">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_05" aria-expanded="false" aria-controls="collapse_05">
                      <b>Elementi - Ljepenka</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_05" class="collapse" role="tabpanel" aria-labelledby="heading_05" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> elementa
                                  </th>
                                  <th>
                                    Materijal
                                  </th>


                                  <th>
                                    Dužina<br> neto
                                  </th>
                                  <th>
                                    Dužina<br> tržišna
                                  </th>
                                  <th>
                                    Širina<br> neto
                                  </th>
                                  <th>
                                    Širina<br> tržišna
                                  </th>
                                  <th>
                                    Potrebno plašteva<br> neto
                                  </th>
                                  <th>
                                    Potrebno plašteva<br> tržišna
                                  </th>
                                  <th>
                                    Debljina
                                  </th>



                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_05"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>


                                  <td>
                                    {{element.el_int_01}}
                                  </td>
                                  <td>
                                    {{element.el_int_02}}
                                  </td>
                                  <td>
                                    {{element.el_int_03}}
                                  </td>
                                  <td>
                                    {{element.el_int_04}}
                                  </td>
                                  <td>
                                    {{element.el_int_05}}
                                  </td>
                                  <td>
                                    {{element.el_int_06}}
                                  </td>
                                  <td>
                                    {{element.el_int_07}}
                                  </td>                          
 

                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- SPUŽVE -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_06">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_06" aria-expanded="false" aria-controls="collapse_06">
                      <b>Elementi - Spužva</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_06" class="collapse" role="tabpanel" aria-labelledby="heading_06" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> elementa 
                                  </th>
                                  <th>
                                    Materijal
                                  </th>

                                  <th>
                                    Dužina
                                  </th>
                                  <th>
                                    Širina
                                  </th>
                                  <th>
                                    Debljina
                                  </th>

                                  <th>
                                    Potrebno<br> (kom.)
                                  </th>



                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_06"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>
                                 
                                  <td>
                                    {{element.el_int_02}}
                                  </td>
                                  <td>
                                    {{element.el_int_03}}
                                  </td>
                                  <td>
                                    {{element.el_int_04}}
                                  </td>
                                  <td>
                                    {{element.el_int_05}}
                                  </td>



                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- PRESVLAKE -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_07">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_07" aria-expanded="false" aria-controls="collapse_07">
                      <b>Elementi - Presvlaka (Osobine i Tehnologije obrade)</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_07" class="collapse" role="tabpanel" aria-labelledby="heading_07" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br>presvlake
                                  </th>

                                  <th>
                                    Materijal
                                  </th>



                                  <th>
                                    Potrebno<br>(m)
                                  </th>



                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_07"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>

                                  <td>
                                    {{element.el_int_03}}
                                  </td>




                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- LJEPILO -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_09">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_09" aria-expanded="false" aria-controls="collapse_09">
                      <b>Elementi / materijal - Ljepilo</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_09" class="collapse" role="tabpanel" aria-labelledby="heading_09" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> / namjena
                                  </th>

                                  <th>
                                    Materijal
                                  </th>


                                  <th>
                                    Površina<br>  nanošenja (m2)
                                  </th>



                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_09"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>

                                  <td>
                                    {{element.el_int_01}}
                                  </td>

                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- BOJA/LAK -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_10">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_10" aria-expanded="false" aria-controls="collapse_10">
                      <b>Elementi / materijal - Boja / lak</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_10" class="collapse" role="tabpanel" aria-labelledby="heading_10" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> / namjena
                                  </th>

                                  <th>
                                    Materijal
                                  </th>

                                  <th>
                                    Površina<br>  nanošenja (m2)
                                  </th>

                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_10"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>
                                  <td>
                                    {{element.el_int_01}}
                                  </td>

                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!--  BRUSNI MATERIJAL --- izbačen 31.1.2021
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_11">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_11" aria-expanded="false" aria-controls="collapse_11">
                      <b>Elementi - Brusni materijal</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_11" class="collapse" role="tabpanel" aria-labelledby="heading_11" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv<br> materijala
                                  </th>
                                  <th>
                                    Materijal
                                  </th>
                                  <th>
                                    Namjena
                                  </th>
                                  <th>
                                    Vrsta<br> podloge
                                  </th>
                                  <th>
                                    Granulacija
                                  </th>

                                  <th>
                                    Dužina<br>(mm)
                                  </th>
                                  <th>
                                    Širina<br>(mm)
                                  </th>

                                  <th>
                                    Površina<br> brušenja(m2)
                                  </th>



                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_11"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>
                                  <td>
                                    {{element.el_var_21}}
                                  </td>
                                  <td>
                                    {{element.el_var_22}}
                                  </td>
                                  <td>
                                    {{element.el_var_23}}
                                  </td>

                                  <td>
                                    {{element.el_int_01}}
                                  </td>
                                  <td>
                                    {{element.el_int_02}}
                                  </td>
                                  <td>
                                    {{element.el_int_03}}
                                  </td>


                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>
-->

              <!-- OKOVI -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_12">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_12" aria-expanded="false" aria-controls="collapse_12">
                      <b>Elementi - Okovi</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_12" class="collapse" role="tabpanel" aria-labelledby="heading_12" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv
                                  </th>

                                  <th>
                                    Materijal
                                  </th>


                                  <th>
                                    Količina<br>
                                  </th>

                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_12"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>


                                  <td>
                                    {{element.el_int_01}}
                                  </td>                          


                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- Ostali tipovi (tip 13) -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_13">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_13" aria-expanded="false" aria-controls="collapse_13">
                      <b>Elementi - Ostali tipovi materijala</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div id="collapse_13" class="collapse" role="tabpanel" aria-labelledby="heading_13" data-parent="#accordion">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv
                                  </th>

                                  <th>
                                    Materijal
                                  </th>
                                  <th>
                                    Količina<br>
                                  </th>

                                  <th>
                                    Sklop<br> (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni<br> element
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in elementi_tip_13"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>
                                  <td>
                                    {{element.materijal_naziv}}
                                  </td>

                                  <td>
                                    {{element.el_int_01}}
                                  </td>                          

                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
                                  </td>
                          
                                </tr>       
                                </tbody>
                              </table>
                            </div> 
                  </div>
                </div>
              </div>

              <!-- SKLOPOVI -->
              <div class="card card-collapse">
                <div class="card-header" role="tab" id="heading_99">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" href="#collapse_99" aria-expanded="false" aria-controls="collapse_99">
                      <b> Sklopovi (Opis i Tehnologije obrade)</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>
                <div id="collapse_99" class="collapse" role="tabpanel" aria-labelledby="heading_99" data-parent="#accordion">
                  <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
                                    Naziv elementa
                                  </th>
                                  <th>
                                    Opis
                                  </th>
                                  <th>
                                    Sklop (da/ne)
                                  </th>
                                  <th>
                                    Nadređeni element (0=proizvod)
                                  </th>
                                  
                                  <th class="text-right">
                                    Ažuriranje<br> osobina i<br> tehnologije
                                  </th>
                                  
                                </thead>
                                <tbody>

                                <tr v-for="element in sklopovi"  v-bind:key="element.id">
                                  <td>
                                    {{element.naziv}}
                                  </td>

                                  <td>
                                    {{element.el_txt_31}}
                                  </td>

                                  <td v-bind:class="element.sklop===1 ? 'text-success' : 'text-danger'">
                                    <i class="material-icons" v-if="element.sklop===1">check_circle</i>
                                    <i class="material-icons" v-else>block</i>
                                  
                                  </td>
                                  <td>
                                    {{element.naziv_nadredjenog}}
                                  </td>
                                
                                  <td class="td-actions text-right">
                                      <form action="" method="post">
                                
                                        
                                        
                                          <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniElement(element)">
                                              <i class="material-icons">edit</i>
                                              
                                          </button>
                                        
                                        
                                          <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniElement(element.id)">
                                              <i class="material-icons">delete</i>
                                              
                                          </button>
                                        
                                      </form>
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


      </div>

<!-- PREGLED TEHNOLOGIJA -->
      <div class="tab-pane" id="link_pregled_tehnologija">
        <div class="row">
          <!-- Štampa tehnologije -->
          <div class="col-12 text-right">
            
            <button type="button" class="btn btn-warning" @click="show_tehnologija_PDF(0)">
              Tehnologija - PDF
            </button>
          </div>        
        </div>        

        <div class="row">
          <div class="col-12 text-left">
            <div id="accordion_kalk" role="tablist">

              <div v-for="(t_matTipElement, index) in tehnologijaMatTipoviElementi" v-bind:key="index" class="card card-collapse">
                <div class="card-header" role="tab" :id="'heading-'+index">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" :href="'#collapse_kalk-'+index" aria-expanded="false">
                      <b>{{ t_matTipElement.mattip_naziv +' / '+ t_matTipElement.element_naziv }}</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div :id="'collapse_kalk-'+index"  class="collapse" role="tabpanel" data-parent="#accordion_kalk">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-no-bordered table-hover datatable-warning" style="display:blok">

<thead class="text-warning">

                                          <!-- Štampa analize --> 
          <div class="col-12 text-left">
            <button type="button" class="btn btn-warning" @click="show_tehnologija_PDF(t_matTipElement.element_id)">
              PDF
            </button>
          </div>        
                                </thead>
                                <thead class="text-warning">
                                  <th  class="text-center">
                                    R. br.
                                  </th>                                
                                  <th class="text-left">
                                    Mašina
                                  </th>
                                  <th  class="text-center">
                                    Broj<br>rukovalaca
                                  </th>
                                  <th  class="text-center">
                                    Broj<br>pomoćnika
                                  </th>
                                  <th class="text-left">
                                    Opis operacije
                                  </th>
                                  <th class="text-left">
                                    Parametri<br>obrade
                                  </th>
                                  <th class="text-left">
                                    Alat
                                  </th>
                                  <th class="text-center">
                                    Vrijeme<br>(min)
                                  </th>

                                  
                                </thead>
                                <tbody>
                        <tr v-for="(t_element, index) in tehnologija_elementi" v-bind:key="index">
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-center">
                            {{index+1}}
                          </td>
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-left">
                            {{t_element.masina_naziv}}
                          </td>
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-center">
                            {{t_element.br_rr}}
                          </td>
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-center">
                            {{t_element.br_pr}}
                          </td>
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-left">
                            {{t_element.opis}}
                          </td>
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-left">
                            {{t_element.parametri}}
                          </td>
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-left">
                            {{t_element.alat_naziv}}
                          </td>
                          <td v-if="t_element.mattip_naziv===t_matTipElement.mattip_naziv && t_element.element_naziv===t_matTipElement.element_naziv" 
                          class="text-center">
                            {{zaokruzi(parseFloat(t_element.vrijeme),3)}}
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
      </div>
<!-- ANALIZA KAPACITETA -->
      <div class="tab-pane" id="link_analiza_kapaciteta">
        <div class="row">



          <div class="col-6 text-left">
                          <div>
                                        Planirani broj proizvoda u smjeni: <input v-model="plan_br_proizvoda" placeholder="-" @keyup="prikaziPlan()" size="5">
                          </div>
          </div> 

          <!-- Štampa analize --> 
    

          <!-- Modal izmjena Analize - pocetak -->
          <div class="modal fade" id="izmjenaAnalize" tabindex="-1" role="dialog" aria-labelledby="izmjenaAnalize" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 

                          <form  class="form-horizontal" @submit.prevent="snimiAnalizu()">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                
                                <h4 class="card-title">Usvajanje broja radnika</h4>

                              </div>
                              <div class="card-body ">
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <button type="button" id="btn-zatvori-modal-a"  class="btn btn-warning" @click="zatvoriModalAnaliza()">
                                      Zatvori
                                    </button>
                                  </div>
                                </div>

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Broj radnika</label>
                                  <div class="col-sm-2 mr-auto">
                                    <div class="form-group has-danger">
                                      <input type='hidden' v-model="analiza_operacija_ed.proizvod_id">
                                      <input type='hidden' v-model="analiza_operacija_ed.masina_id">
                                      <input readonly class="form-control-plaintext"  v-model="analiza_operacija_ed.br_radnika" type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Usvojeni broj radnika</label>
                                  <div class="col-sm-2 mr-auto">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="analiza_operacija_ed.br_radnika_usvojen"  type="text" placeholder="" value="" required="true" aria-required="true"/>
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
          <!-- Modal izmjena Analize - kraj -->

<!-- ANALIZA KAPACITETA - PRIKAZ -->
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
                          <th class="text-center">
                            Izmjene
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
                            {{zaokruzi(element_analize.vrijeme*1,3)}}
                          </td>                          

                          <td class="text-center">
                            {{zaokruzi(element_analize.vrijeme*plan_br_proizvoda,3)}}
                                                      
                          </td>
                          <td class="text-center">
                            {{element_analize.br_radnika}}
                                                        
                          </td>
                          <td v-bind:class="[element_analize.vrijeme*plan_br_proizvoda/480>1 ? 'text-center bg-danger ': 'text-center']" role="alert">
                            {{zaokruzi(element_analize.vrijeme*plan_br_proizvoda/480, 3)}}
                            
                          </td>
                          <td class="text-center">
                            {{zaokruzi(element_analize.br_radnika*element_analize.vrijeme*plan_br_proizvoda/480,3)}}
                            
                            
                          </td>
                          <td class="text-center">
                            {{element_analize.br_radnika_usvojen}}
                            
                          </td>                          
                          <td class="text-center">
                            {{zaokruzi(480*(1-(element_analize.br_radnika*element_analize.vrijeme*plan_br_proizvoda/480)/element_analize.br_radnika_usvojen),2)}}
                            
                          </td>     
                        
                          <td class="td-actions-center">
                              <form action="" method="post">
                        
                                
                                
                                  <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniAnalizu(element_analize)">
                                      <i class="material-icons">edit</i>
                                      
                                  </button>
                                
                               

                                
                              </form>
                          </td>
                  
                        </tr>
                        <tr>
                          <th class="text-right" colspan="7">
                            Ukupno usvojeno radnika:
                          </th>                                  
                          <th class="text-center">
                            {{total_usvojeno_radnika}}
                          </th>
                          <td colspan="2">
                            
                          </td>
                  
                        </tr>                                
                        </tbody>
                      </table>
                    </div> 
          </div>

        </div>
      </div>

<!-- KALKULACIJA -->
      <div class="tab-pane" id="link_kalkulacija">
        <div class="row">
          <!-- Štampa kalkulacije -->
          <div class="col-12 text-right">
            <button type="button" class="btn btn-warning" @click="show_PDF()">
              Kalkulacija - PDF
            </button>
          </div>        
        </div>        

        <div class="row">
          <div class="col-12 text-left">
            <div id="accordion_kalk" role="tablist">

              <div v-for="(k_matTip, index) in kalkulacijaMatTipovi" v-bind:key="index" class="card card-collapse">
                <div class="card-header" role="tab" :id="'heading-'+index">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" :href="'#collapse_kalk-'+index" aria-expanded="false">
                      <b>{{ k_matTip.mattip_naziv }}</b>
                      <i class="material-icons">keyboard_arrow_down</i>
                    </a>
                  </h4>
                </div>

                <div :id="'collapse_kalk-'+index"  class="collapse" role="tabpanel" data-parent="#accordion_kalk">
                  <div class="card-body">                    
                            <div class="table-responsive">
                              <table class="table table-no-bordered table-hover datatable-warning" style="display:blok">
                                <thead class="text-warning">
                                  <th>
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
                        <tr v-for="(k_materijal, index) in kalkulacija_materijali" v-bind:key="index">
                          <td v-if="k_materijal.mattip_naziv===k_matTip.mattip_naziv">
                            {{index+1}}
                          </td>
                          <td v-if="k_materijal.mattip_naziv===k_matTip.mattip_naziv">
                            {{k_materijal.materijal_naziv}}<br>
                            <div v-if="k_materijal.ima_kontakt!=='0'"><br>kontakt</div>
                            <div v-if="k_materijal.ima_razredjivac!=='0'"><br>razređivač</div>
                          </td>

                          <td v-if="k_materijal.mattip_naziv===k_matTip.mattip_naziv" class="text-center">
                            {{k_materijal.jed_mjere}}
                          </td>
                          <td v-if="k_materijal.mattip_naziv===k_matTip.mattip_naziv" class="text-center">
                            {{zaokruzi(parseFloat(k_materijal.potrosnja),4)}}
                            <div v-if="k_materijal.ima_kontakt!=='0'"><br>{{zaokruzi(parseFloat(k_materijal.potrosnja)*parseFloat(k_materijal.k_koef),4)}}</div>
                            <div v-if="k_materijal.ima_razredjivac!=='0'"><br>{{zaokruzi(parseFloat(k_materijal.potrosnja)*parseFloat(k_materijal.r_koef),4)}}</div>
                          </td>
                          <td v-if="k_materijal.mattip_naziv===k_matTip.mattip_naziv" class="text-center">
                            {{k_materijal.cijena}}
                            <div v-if="k_materijal.ima_kontakt!=='0'"><br>{{zaokruzi(parseFloat(k_materijal.k_cijena),2)}}</div>
                            <div v-if="k_materijal.ima_razredjivac!=='0'"><br>{{zaokruzi(parseFloat(k_materijal.r_cijena),2)}}</div>

                          </td>
                          <td v-if="k_materijal.mattip_naziv===k_matTip.mattip_naziv" class="text-right">

                                                                              {{zaokruzi(parseFloat(zaokruzi(parseFloat(k_materijal.potrosnja),4))*parseFloat(zaokruzi(parseFloat(k_materijal.cijena),2)),2)}}
                            <div v-if="k_materijal.ima_kontakt!=='0'"><br>    {{zaokruzi(parseFloat(zaokruzi(parseFloat(k_materijal.potrosnja),4))*parseFloat(k_materijal.k_koef)*parseFloat(k_materijal.k_cijena),2)}}</div>
                            <div v-if="k_materijal.ima_razredjivac!=='0'"><br>{{zaokruzi(parseFloat(zaokruzi(parseFloat(k_materijal.potrosnja),4))*parseFloat(k_materijal.r_koef)*parseFloat(k_materijal.r_cijena),2)}}</div>
                                                      
                          </td>  
                        </tr>
                                  <tr>
                                    <td class="text-right text-warning"  colspan="5">{{zaokruzi(3.045,2)}}Ukupno:</td>
                                    <td class="text-right">{{zaokruzi(total_tipa(k_matTip.mattip_naziv), 2)}}</td>
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

        <div class="row">
          <div class="col-12 text-left">

            <div id="accordion_rad" role="tablist">

              <div class="card card-collapse">

                <div class="card-header" role="tab" :id="'heading-r1'">
                  <h4 class="mb-0">
                    <a class="collapsed" data-toggle="collapse" :href="'#collapse_r1'" aria-expanded="false">
                      <b>Ukupni troškovi izrade jedinice proizvoda</b>
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
                        <tr>
                          <td>Trošak materijala</td>
                          <td class="text-center">-</td>
                          <td class="text-center">-</td>
                          <td class="text-center">-</td>
                          <td class="text-right">{{zaokruzi(total_materijal, 2)}}</td>  
                        </tr>


                        <tr>
                          <td>Trošak rada</td>
                          <td class="text-center">NS</td>
                          <td class="text-center">{{zaokruzi(total_usvojeno_radnika*8/plan_br_proizvoda, 3)}} </td>
                          <td class="text-center">{{vrijednost_norma_sata}}</td>
                          <td class="text-right"> {{zaokruzi(vrijednost_norma_sata*total_usvojeno_radnika*8/plan_br_proizvoda, 2)}}</td>  
                        </tr>


                                  <tr>
                                    <td class="text-right text-warning"  colspan="4">Ukupno:</td>
                                    <td class="text-right">{{zaokruzi(parseFloat(total_materijal)+parseFloat(zaokruzi(vrijednost_norma_sata*total_usvojeno_radnika*8/plan_br_proizvoda, 2)), 2)}}</td>
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

    </div>

  </div>
</template>

<script>

/// uvozimo komponentu "selectize"
import 'selectize/dist/css/selectize.default.css' // This is required, we use the same css as selectize.js
import VSelectize from '@isneezy/vue-selectize'



  export default {
    data: function (){
      return {

        // promjeniva za izbor iz liste
        m_selected: {

          id:    0, 
          naziv: 'obavezan unos'
        },


        masina_selected: {

          id:    0, 
          naziv: 'obavezan unos'
        },
        // promjeniva za izbor iz liste


        proizvod:{},
        elementi:[],
        operacije:[],
        analiza_kapaciteta:[],
        kalkulacija_materijali:[],
        mattipovi:[],
        materijali:[],
        masine:[],
        alati:[],

        tehnologija_elementi:[],



        
        osobine_elementa:{
          
          elab_01: '',
          ejed_01: '',
          
          elab_02: '',
          ejed_02: '',
          
          elab_03: '',
          ejed_03: '',
          
          elab_04: '',
          ejed_04: '',
          
          elab_05: '',
          ejed_05: '',
          
          elab_06: '',
          ejed_06: '',

          elab_07: '',
          ejed_07: '',    



          elab_31: ''
            

        },

        
        element_ed: {
          id: 0,
          proizvod_id: 0,
          naziv: '',
          mattip_id: 0,
          materijal_id: 0,
          sklop: 0,
          id_nadredjenog: 0,
          el_int_01: '',
          el_int_02: '',
          el_int_03: '',
          el_int_04: '',
          el_int_05: '',
          el_int_06: '',
          el_int_07: '' 

        },
        //element_id: '',


        edit_element: false,   /// od ovog zavisi da li se modal koristi za unos ili edit (inicijalno unos)
        plan_br_proizvoda: 1,  /// planirani broj proizvoda, ako se drugačije ne zada
        vrijednost_norma_sata: 0,
        operacije:[],
        edit_operacija: false,   /// od ovog zavisi da li se modal koristi za unos ili edit (inicijalno unos)

        operacija_ed: {
          id: 0,
          element_id: 0,
          redni_broj: 0,
          masina_id: 0,
          alat_id: 0,
          br_rr: 0,
          br_pr: 0,
          opis: '',
          parametri: '',
          vrijeme: 0
        },

        analiza_operacija_ed: {
          proizvod_id: 0,
          masina_id: 0,
          br_radnika: 0,
          br_radnika_usvojen: 0
        }

      }
    },

    computed: {
/*
    totalItem: function(){
      let sum = 0;
      this.items.forEach(function(item) {
         sum += (parseFloat(item.price) * parseFloat(item.quantity));
      });

     return sum;
   },
*/
  total_masiv () {
    return this.kalkulacija_materijali.reduce( (acc, k_materijal) => {
      return acc + (k_materijal.cijena * k_materijal.potrosnja)
    }, 0)
  },

  total_materijal () {
    return this.kalkulacija_materijali.reduce( (acc, k_materijal) => {
      return parseFloat(acc) 
           + parseFloat( this.zaokruzi( parseFloat(k_materijal.cijena)   * parseFloat(this.zaokruzi(parseFloat(k_materijal.potrosnja),4))                                  , 2))
           + parseFloat( this.zaokruzi( parseFloat(k_materijal.k_cijena) * parseFloat(this.zaokruzi(parseFloat(k_materijal.potrosnja),4)) * parseFloat(k_materijal.k_koef) , 2))
           + parseFloat( this.zaokruzi( parseFloat(k_materijal.r_cijena) * parseFloat(this.zaokruzi(parseFloat(k_materijal.potrosnja),4)) * parseFloat(k_materijal.r_koef) , 2))

}, 0)
  },

  total_usvojeno_radnika () {
    return this.analiza_kapaciteta.reduce( (acc, element_analize) => {
      return acc + (element_analize.br_radnika_usvojen)
    }, 0)
  },

      kalkulacijaMatTipovi() {
        return this.kalkulacija_materijali.reduce((seed, current) => {
          return Object.assign(seed, {
            [current.mattip_naziv]: current
          });
        }, {});
      },

      tehnologijaMatTipoviElementi() {
        return this.tehnologija_elementi.reduce((seed, current) => {
          return Object.assign(seed, {
            [current.mattip_naziv+'-'+current.element_naziv]: current
          });
        }, {});
      },


      sklopovi: function () {
        return this.elementi.filter(function (element) {
          return element.sklop === 1
        })
      },

      elementi_tip_01: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 1
        })
      },

      elementi_tip_02: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 2
        })
      },

      elementi_tip_03: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 3
        })
      },

      elementi_tip_04: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 4
        })
      },

      elementi_tip_05: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 5
        })
      },

      elementi_tip_06: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 6
        })
      },

      elementi_tip_07: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 7
        })
      },

      elementi_tip_08: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 8
        })
      },

      elementi_tip_09: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 9
        })
      },

      elementi_tip_10: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 10
        })
      },

      elementi_tip_11: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 11
        })
      },

      elementi_tip_12: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 12
        })
      },

      elementi_tip_13: function () {
        return this.elementi.filter(function (element) {
          return element.mattip_id === 13
        })
      },

      ostali: function () {
        return this.elementi.filter(function (element) {
          
          return element.mattip_id > 13
        })
      }
 
    },

    created(){
        // 29_12_2020
        //this.isprazniModal();
//alert('1');

        this.UcitajProizvod();
        this.ucitajElemente();
  //      //alert('2');
        this.ucitajAnalizuKapaciteta(); 
    //    //alert('3');
        this.ucitajTehnologijaElementi();

        this.ucitajKalkulacijaMaterijali(); 
      //  //alert('4');
        this.ucitajMattipove();
      //  //alert('5');
        this.ucitajMasine();
//alert('6');        
        this.ucitajAlate();
  //       //alert('7');   
        //this.$nextTick(function(){ 
        //  $('#izbor_materijala').selectpicker("refresh"); 
        //});
    },

    methods: {


  total_tipa (mt_naziv) {
    return this.kalkulacija_materijali.reduce( (acc, k_materijal) => {
      return parseFloat(acc) 
           + parseFloat((mt_naziv==k_materijal.mattip_naziv)?this.zaokruzi(parseFloat(k_materijal.cijena)   * this.zaokruzi(parseFloat(k_materijal.potrosnja),4), 2):parseFloat(0))
           + parseFloat((mt_naziv==k_materijal.mattip_naziv)?this.zaokruzi(parseFloat(k_materijal.k_cijena) * this.zaokruzi(parseFloat(k_materijal.potrosnja),4) * parseFloat(k_materijal.k_koef), 2):parseFloat(0))
           + parseFloat((mt_naziv==k_materijal.mattip_naziv)?this.zaokruzi(parseFloat(k_materijal.r_cijena) * this.zaokruzi(parseFloat(k_materijal.potrosnja),4) * parseFloat(k_materijal.r_koef), 2):parseFloat(0))

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

        UcitajProizvod: function() {
          axios.get('./../../api/proizvod/'+document.getElementById("proizvod_id").value)
          .then((response)=>{
              this.proizvod=response.data.data;
              this.$nextTick(function(){ 
                  this.plan_br_proizvoda=this.proizvod.proizvoda_u_smjeni;
                  this.vrijednost_norma_sata=this.proizvod.parametar_vrijednost;
              });
           // 1.2.2021 - vjerovatno višak
           
           //   this.element_ed.proizvod_id=document.getElementById("proizvod_id").value;
           //   this.element_ed.sklop=false;
           //   this.element_ed.id_nadredjenog=0;
            

          })
          .catch(function(error){
              console.log(error);
          });
        },


    //  ELEMENTI  //////////////////////////////
        ucitajElemente: function() {
          axios.get('./../../api/elementi_p/'+document.getElementById("proizvod_id").value)
          .then((response)=>{
              this.elementi=response.data.data;
              
           // 1.2.2021 - vjerovatno višak
           
           //   this.element_ed.proizvod_id=document.getElementById("proizvod_id").value;
           //   this.element_ed.sklop=false;
           //   this.element_ed.id_nadredjenog=0;
            

          })
          .catch(function(error){
              console.log(error);
          });
        },

        dodajElement(){

            // prikaži modalni prozor
            $("#noviElementProizvoda").modal("show");

            this.edit_element = false;
            this.element_ed.id             = null;
            this.element_ed.proizvod_id    = document.getElementById("proizvod_id").value;
            this.element_ed.naziv          = '-';
            this.element_ed.mattip_id      = 0;
            
            // 8.2.2021.
            //this.ucitajMaterijale();
            
            //vjerovatno višak:
            //this.ucitajOsobineElementa();
            //this.ucitajListeOsobina();


            this.element_ed.materijal_id   = 0;
            this.element_ed.sklop          = false;
            this.element_ed.id_nadredjenog = 0;
            // forsiraj osvježavanje liste
            this.$nextTick(function(){ 
              $('#izbor_tipa_materijala').selectpicker("refresh");
              //$('#izbor_materijala').selectpicker("refresh"); 
                    this.m_selected.id     =  0;
                    this.m_selected.naziv  =  'obavezan unos';

              $('#izbor_nadredjenog').selectpicker("refresh");
  
            });
          

        
            this.element_ed.el_lab_01      = '';
            //this.element_ed.el_int_01      = element.el_int_01;
            //this.element_ed.el_jm_01       = element.el_jm_01;

            this.element_ed.el_lab_02      = '';
            //this.element_ed.el_int_02      = element.el_int_02;
            //this.element_ed.el_jm_02       = element.el_jm_02;

            this.element_ed.el_lab_03      = '';
            //this.element_ed.el_int_03      = element.el_int_03;
            //this.element_ed.el_jm_03       = element.el_jm_03;

            this.element_ed.el_lab_04      = '';
            //this.element_ed.el_int_04      = element.el_int_04;
            //this.element_ed.el_jm_04       = element.el_jm_04;

            this.element_ed.el_lab_05      = '';
            //this.element_ed.el_int_05      = element.el_int_05;
            //this.element_ed.el_jm_05       = element.el_jm_05;

            this.element_ed.el_lab_06      = '';
            //this.element_ed.el_int_06      = element.el_int_06;
            //this.element_ed.el_jm_06       = element.el_jm_06;

            this.element_ed.el_lab_07      = '';
            //this.element_ed.el_int_07      = element.el_int_07;
            //this.element_ed.el_jm_07       = element.el_jm_07;  

                  
            /// AREA polja
            this.element_ed.el_lab_31      = '';
            //this.element_ed.el_txt_31      = element.el_txt_31;

            this.$forceUpdate();
        },  

        izmjeniElement(element){
            //alert('id elementa '+element.id);
            // prikaži modalni prozor
            $("#noviElementProizvoda").modal("show");
            this.edit_element = true;
            this.element_ed.id             = element.id;
            this.element_ed.proizvod_id    = element.proizvod_id;
            this.element_ed.naziv          = element.naziv;
            this.element_ed.mattip_id      = element.mattip_id;
            this.ucitajMaterijale();
            //this.ucitajOsobineElementa();
            this.ucitajListeOsobina();
            this.ucitajOperacije();
            this.ucitajAnalizuKapaciteta();

            this.element_ed.materijal_id   = element.materijal_id;



            this.element_ed.sklop          = element.sklop;
            this.element_ed.id_nadredjenog = element.id_nadredjenog;
            // forsiraj osvježavanje liste
            this.$nextTick(function(){ 
              $('#izbor_tipa_materijala').selectpicker("refresh");
              //$('#izbor_materijala').selectpicker("refresh"); 
                        /// podaci za pretraživu listu
                        this.m_selected.id    = element.materijal_id;
                        this.m_selected.naziv = element.materijal_naziv;
              $('#izbor_nadredjenog').selectpicker("refresh");
  
            });
          

          
            this.element_ed.el_lab_01      = element.el_lab_01;
            this.element_ed.el_int_01      = element.el_int_01;
            this.element_ed.el_jm_01       = element.el_jm_01;

            this.element_ed.el_lab_02      = element.el_lab_02;
            this.element_ed.el_int_02      = element.el_int_02;
            this.element_ed.el_jm_02       = element.el_jm_02;

            this.element_ed.el_lab_03      = element.el_lab_03;
            this.element_ed.el_int_03      = element.el_int_03;
            this.element_ed.el_jm_03       = element.el_jm_03;

            this.element_ed.el_lab_04      = element.el_lab_04;
            this.element_ed.el_int_04      = element.el_int_04;
            this.element_ed.el_jm_04       = element.el_jm_04;

            this.element_ed.el_lab_05      = element.el_lab_05;
            this.element_ed.el_int_05      = element.el_int_05;
            this.element_ed.el_jm_05       = element.el_jm_05;

            this.element_ed.el_lab_06      = element.el_lab_06;
            this.element_ed.el_int_06      = element.el_int_06;
            this.element_ed.el_jm_06       = element.el_jm_06;

            this.element_ed.el_lab_07      = element.el_lab_07;
            this.element_ed.el_int_07      = element.el_int_07;
            this.element_ed.el_jm_07       = element.el_jm_07;  

                  
            /// AREA polja
            this.element_ed.el_lab_31      = element.el_lab_31?element.el_lab_31:'-';
            this.element_ed.el_txt_31      = element.el_txt_31;

            this.$forceUpdate();
        },

        snimiElement(){

            if ((!this.m_selected || this.m_selected.id==0 || this.element_ed.mattip_id==0) && (!this.element_ed.sklop || this.element_ed.sklop==0)){
                alert('Nije izabran materijal!');

            } else{
              //pokupi novo stanje
              this.$forceUpdate();
                /// uzimamo vrijednost iz dinamičkog selekta
                this.element_ed.materijal_id=this.m_selected.id;

              if (this.edit_element===false){
                // dodaj element
                //alert('dodao pa zatvaram 1');
                fetch('./../../api/element', {
                  method: 'post',
                  body: JSON.stringify(this.element_ed),
                  headers: {
                    'content-type': 'application/json'
                  }
                })
                
                .then(response => response.json())
                .then(data => {
                  //alert('dodao pa zatvaram 2');
                  this.ucitajElemente();
                  this.ucitajAnalizuKapaciteta();
                  this.ucitajTehnologijaElementi();
                  this.ucitajKalkulacijaMaterijali(); 
                  //$('#izbor_nadredjenog').selectpicker("refresh");
                  //alert('dodao pa zatvaram 3');
                  this.isprazniModal();
                  //alert('dodao pa zatvaram 4');
                  // sakrij modalni prozor
                  $("#noviElementProizvoda").modal("hide");
                })
                .catch(err => console.log(JSON.stringify(this.element_ed)));

              } else {
                
                // ažuriraj postojeći element
                  fetch('./../../api/element', {
                  method: 'put',
                  body: JSON.stringify(this.element_ed),
                  headers: {
                    'content-type': 'application/json'
                  }
                })
                .then(response => response.json())
                .then(data => {
                  this.ucitajElemente();
                  this.ucitajAnalizuKapaciteta();
                  this.ucitajTehnologijaElementi();
                  this.ucitajKalkulacijaMaterijali(); 
                  this.isprazniModal();

                  // sakrij modalni prozor
                  //$('#izbor_nadredjenog').selectpicker("refresh");
                  $("#noviElementProizvoda").modal("hide");

                })
                .catch(err => console.log(err));
                
              
              }
              
            }          
        },

        ukloniElement(id){
          if(confirm('Da li želite ukloniti element?')){
            fetch(`./../../api/element/${id}`,{
              method: 'delete'
            })
            .then(response=>response.json())
            .then(data=>{
              //alert('Element uklonjen');
              this.ucitajElemente();
              this.ucitajAnalizuKapaciteta();
              this.ucitajTehnologijaElementi();
              this.ucitajKalkulacijaMaterijali(); 
            })
          }
        },

        isprazniModal(){
  
              this.element_ed.id           = 0;
              this.operacija_ed.element_id   = 0;  /// tek sad se ovo briše a ne na zataranju modalOperacija

              this.element_ed.naziv        = '';
              this.element_ed.mattip_id    = 0;
              this.element_ed.materijal_id = 0;



              this.element_ed.sklop        = 0;
              this.element_ed.id_nadredjenog = 0;

              this.element_ed.el_lab_01      = '';
              this.element_ed.el_int_01      = 0;
              this.element_ed.el_jm_01       = '';

              this.element_ed.el_lab_02      = '';
              this.element_ed.el_int_02      = 0;
              this.element_ed.el_jm_02       = '';

              this.element_ed.el_lab_03      = '';
              this.element_ed.el_int_03      = 0;
              this.element_ed.el_jm_03       = '';

              this.element_ed.el_lab_04      = '';
              this.element_ed.el_int_04      = 0;
              this.element_ed.el_jm_04       = '';

              this.element_ed.el_lab_05      = '';
              this.element_ed.el_int_05      = 0;
              this.element_ed.el_jm_05       = '';

              this.element_ed.el_lab_06      = '';
              this.element_ed.el_int_06      = 0;
              this.element_ed.el_jm_06       = '';

              this.element_ed.el_lab_07      = '';
              this.element_ed.el_int_07      = 0;
              this.element_ed.el_jm_07       = '';
              
          

              //   AREA polja
              this.element_ed.el_lab_31      = '';
              this.element_ed.el_txt_31      = '';


              // prebaci modalni prozor u mod dodavanja
              this.edit_element = false;
              // isprazni listu materijala
              this.materijali = [];
              // isprazni listu operacija
              this.operacije = [];
              // forsiraj osvježavanje liste 2. blokirani
              this.$nextTick(function(){ 
                $('#izbor_tipa_materijala').selectpicker("refresh");
                //$('#izbor_materijala').selectpicker("refresh");
                          // polja za pretraživu listu
                          if (this.m_selected){
                              this.m_selected.id     = this.element_ed.materijal_id;
                              this.m_selected.naziv  = '';
                          }else{
                            this.m_selected = {
                              id:    0,
                              naziv: ''
                            } 
                          }
                $('#izbor_nadredjenog').selectpicker("refresh");
                //30_12_2020
                //$('#lista_1').selectpicker("refresh"); 
                //$('#lista_2').selectpicker("refresh"); 
                //$('#lista_3').selectpicker("refresh"); 
                 
              });

        },

        zatvoriModal(){
          
          // obriši podatke
          this.isprazniModalOperacija();
          this.isprazniModal();
          
          // a potom ga sakrij
          $("#noviElementProizvoda").modal("hide");
                    
          // forsiraj osvježavanje liste - -ovde ne treba
          //this.$nextTick(function(){ 
          //  $('#izbor_materijala').selectpicker("refresh");
          //});
        },

    //  OPERACIJE  //////////////////////////////
        ucitajOperacije: function() {
          //alert('operacije za element id: '+this.element_ed.id);
          axios.get('./../../api/operacije_e/'+this.element_ed.id)
          .then((response)=>{
              this.operacije=response.data.data;
              this.operacija_ed.element_id=this.element_ed.id;
              //kada osvjezavas prikaz operacija: - osvjezi i analizu i tehnologiju 
              this.ucitajAnalizuKapaciteta();
              this.ucitajTehnologijaElementi();
              //                                  - osvježi kalkulaciju
              this.ucitajKalkulacijaMaterijali(); 
          })
          .catch(function(error){
              console.log(error);
          });
        },

     // dodajOperaciju()  

        izmjeniOperaciju(operacija){
          // prikaži modalni prozor
          $("#novaOperacijaElementa").modal("show");
          
          this.edit_operacija = true;
          
          this.operacija_ed.id           = operacija.id;
          this.operacija_ed.element_id   = this.element_ed.id; //// operacija pripada tekućem elementu        
          this.operacija_ed.redni_broj   = operacija.redni_broj;        
          this.operacija_ed.masina_id    = operacija.masina_id; 
                                  /// podaci za pretraživu listu
                        this.masina_selected.id    = operacija.masina_id;
                        this.masina_selected.naziv = operacija.masina_naziv;   

          this.operacija_ed.alat_id      = operacija.alat_id;        
          this.operacija_ed.br_rr        = operacija.br_rr;        
          this.operacija_ed.br_pr        = operacija.br_pr;        
          this.operacija_ed.opis         = operacija.opis;
          this.operacija_ed.parametri    = operacija.parametri;
          this.operacija_ed.vrijeme      = operacija.vrijeme;



          // forsiraj osvježavanje liste
          this.$nextTick(function(){ 
            //$('#izbor_masine').selectpicker("refresh");
            $('#izbor_alata').selectpicker("refresh"); 
          });
          

        },

        snimiOperaciju(){

            if (!this.masina_selected || this.masina_selected.id==0 ){
                alert('Nije izabrana mašina!');

            } else{

                //pokupi novo stanje
                this.$forceUpdate();
                  /// uzimamo vrijednost iz dinamičkog selekta
                  this.operacija_ed.masina_id=this.masina_selected.id;

                if (this.edit_operacija===false){
                  // dodaj operaiju
                  fetch('./../../api/operacija', {
                    method: 'post',
                    body: JSON.stringify(this.operacija_ed),
                    headers: {
                      'content-type': 'application/json'
                    }
                  })
                  .then(response => response.json())
                  .then(data => {
                    this.ucitajOperacije();
                    this.isprazniModalOperacija();
                    // sakrij modalni prozor
                    $("#novaOperacijaElementa").modal("hide");
                  })
                  .catch(err => console.log(err));

                } else {
                  // ažuriraj postojeću operaciju
                    fetch('./../../api/operacija', {
                    method: 'put',
                    body: JSON.stringify(this.operacija_ed),
                    headers: {
                      'content-type': 'application/json'
                    }
                  })
                  .then(response => response.json())
                  .then(data => {
                    // osvježi prikaz tabele
                    this.ucitajOperacije();
                    // isprazni modalnu formu
                    this.isprazniModalOperacija();

                    // sakrij modalni prozor
                    $("#novaOperacijaElementa").modal("hide");

                  })
                  .catch(err => console.log(err));
                }
            }    
        },

        isprazniModalOperacija(){
          // prebaci modalni prozor u mod dodavanja
          this.edit_operacija = false; 
          
          this.operacija_ed.id           = 0;
          //this.operacija_ed.element_id   = 0; /// ovo se nulira kad se prazni modal elementa       
          this.operacija_ed.redni_broj   = 0;        
          this.operacija_ed.masina_id    = 0;        
          this.operacija_ed.alat_id      = 0;        
          this.operacija_ed.br_rr        = 0;        
          this.operacija_ed.br_pr        = 0;        
          this.operacija_ed.opis         = '';
          this.operacija_ed.parametri    = '';
          this.operacija_ed.vrijeme      = 0;         
          
                          // polja za pretraživu listu
                          if (this.masina_selected){
                              this.masina_selected.id     = 0;//this.materijal.mattipoznaka_id;
                              this.masina_selected.naziv  = '';
                          }else{
                            this.masina_selected = {
                              id:    0,
                              naziv: ''
                            } 
                          }          

          

              // forsiraj osvježavanje lista
              this.$nextTick(function(){ 
                //$('#izbor_masine').selectpicker("refresh");
                $('#izbor_alata').selectpicker("refresh");

                 
              });

        },

        zatvoriModalOperacija(){
          
          // obriši podatke
          this.isprazniModalOperacija();
          
          // a potom ga sakrij
          
          $("#novaOperacijaElementa").modal("hide");
          
                    
        },

        ukloniOperaciju(id){
          if(confirm('Da li želite ukloniti operaciju?')){
            fetch(`./../../api/operacija/${id}`,{
              method: 'delete'
            })
            .then(response=>response.json())
            .then(data=>{
              //alert('Operacija uklonjena');
              this.ucitajOperacije();
            })
          }
        },



        ucitajAnalizuKapaciteta: function() {
          axios.get('./../../api/analiza_kapaciteta_p/'+document.getElementById("proizvod_id").value)
          .then((response)=>{
              this.analiza_kapaciteta=response.data;
              
          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajKalkulacijaMaterijali: function() {
          var nista
          
          axios.get('./../../api/kalkulacija_proizvoda/'+document.getElementById("proizvod_id").value)
          .then((response)=>{
              this.kalkulacija_materijali=response.data;
              
            
              
          })
          .catch(function(error){
              console.log(error);
          });
        
        },

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

        ucitajMattipove: function() {
          axios.get('./../../api/mattipovi')
          .then((response)=>{
              this.mattipovi=response.data.data;
          })
          .catch(function(error){
              console.log(error);
          });
        },

        ucitajMaterijale:function() {
        
        //prikaži sve materijale tipa         
              axios.get('./../../api/materijali_t/'+this.element_ed.mattip_id)
              .then((response)=>{
                  this.materijali=response.data.data;
                  this.$nextTick(function(){ 
                    //$('#izbor_materijala').selectpicker("refresh");
                                  // #### ovo je višak ################
                                  //this.m_selected.id    = 0;
                                  //this.m_selected.naziv = 'obavezan unos';
                    /// ako prikazuješ materijale prikaži i osobine tog tipa
                    this.ucitajOsobineElementa();
                    this.$forceUpdate();
                  });

              })
              .catch(function(error){
                  console.log(error);
              });

        },


        ucitajTehnologijaElementi: function() {
          var nista
          
          axios.get('./../../api/tehnologija_proizvoda/'+document.getElementById("proizvod_id").value)
          .then((response)=>{
              this.tehnologija_elementi=response.data;
              
            
              
          })
          .catch(function(error){
              console.log(error);
          });
        
        },

        ucitajOsobineElementa:function() {
        //prikaži sve osobine izabranog tipa  
        
        //alert('citam osobine za:'+this.element_ed.mattip_id);       
              axios.get('./../../api/osobine_elementa_t/'+this.element_ed.mattip_id)
              .then((response)=>{
                  this.osobine_elementa=response.data.data;
                  this.$nextTick(function(){ 
        //alert('procitao osobine' + this.osobine_elementa.naziv+' za:'+this.element_ed.mattip_id); 
        this.prikaziOsobineElementa(this.element_ed);  
                  });
                
              })
              .catch(function(error){
                  console.log(error);
              });

        },

        ucitajListeOsobina () {
              
            switch(this.element_ed.mattip_id) {

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
              
            switch(this.element_ed.mattip_id) {

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
              
            switch(this.element_ed.mattip_id) {

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


          if (this.element_ed.sklop==1){
              // ne prikazuj ništa od osobina jer ih sklop nema

              /// AREA polja
              this.element_ed.el_lab_31      = "Opis sklopa";
              this.element_ed.el_txt_31      = element.el_txt_31;
          }else{
//alert('umjesto '+this.element_ed.el_lab_01+' ubaci: '+this.osobine_elementa.elab_01);

//alert('trt');

              this.element_ed.el_lab_01      = this.osobine_elementa.elab_01;
              this.element_ed.el_int_01      = element.el_int_01;
              this.element_ed.el_jm_01       = this.osobine_elementa.ejed_01;

              this.element_ed.el_lab_02      = this.osobine_elementa.elab_02;
              this.element_ed.el_int_02      = element.el_int_02;
              this.element_ed.el_jm_02       = this.osobine_elementa.ejed_02;

              this.element_ed.el_lab_03      = this.osobine_elementa.elab_03;
              this.element_ed.el_int_03      = element.el_int_03;
              this.element_ed.el_jm_03       = this.osobine_elementa.ejed_03;

              this.element_ed.el_lab_04      = this.osobine_elementa.elab_04;
              this.element_ed.el_int_04      = element.el_int_04;
              this.element_ed.el_jm_04       = this.osobine_elementa.ejed_04;

              this.element_ed.el_lab_05      = this.osobine_elementa.elab_05;
              this.element_ed.el_int_05      = element.el_int_05;
              this.element_ed.el_jm_05       = this.osobine_elementa.ejed_05;

              this.element_ed.el_lab_06      = this.osobine_elementa.elab_06;
              this.element_ed.el_int_06      = element.el_int_06;
              this.element_ed.el_jm_06       = this.osobine_elementa.ejed_06;

              this.element_ed.el_lab_07      = this.osobine_elementa.elab_07;
              this.element_ed.el_int_07      = element.el_int_07;
              this.element_ed.el_jm_07       = this.osobine_elementa.ejed_07;    
// 
                        /// AREA polja
              this.element_ed.el_lab_31      = this.osobine_elementa.elab_31;
              this.element_ed.el_txt_31      = element.el_txt_31;
          }

  
          

          
          
          //alert(this.osobine_elementa.elab_01);
        
        },

        izmjeniAnalizu(element_analize){
          // prikaži modalni prozor
          $("#izmjenaAnalize").modal("show");

          this.analiza_operacija_ed.proizvod_id                      = element_analize.proizvod_id;
          this.analiza_operacija_ed.masina_id                        = element_analize.masina_id;

          //this.operacija_ed.element_id   = this.element_ed.id; //// operacija pripada tekućem elementu        
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

        prikaziPlan(){
          //document.getElementById("input-proizvoda_u_smjeni").disabled = false;
          document.getElementById("input-proizvoda_u_smjeni").value=this.plan_br_proizvoda;
          document.getElementById("prikaz-proizvoda_u_smjeni").value=this.plan_br_proizvoda;
          //document.getElementById("input-proizvoda_u_smjeni").disabled = true;
        },

        
        show_PDF(){
       
         // open the page as popup //
         var page = '../../../api/kalk_pr_pdf/'+document.getElementById("proizvod_id").value;
         //var page = '/test_pdf';
         
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=800,height=1200,top=300");
         
         // focus on the popup //
         myWindow.focus();
         


         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
         
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
        
        },        


        show_tehnologija_PDF(id_elementa){
       
         // open the page as popup //
         var page = '../../../api/tehnologija_pdf/'+document.getElementById("proizvod_id").value+'/'+id_elementa;
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
