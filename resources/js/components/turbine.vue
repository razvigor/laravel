<template>
    <div class="card-body"  style="min-height: 2300px;">
          <!-- Button trigger modal -->
          <div class="col-12 text-right mb-2">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#izmjenaTurbine" @click="dodajTurbinu">
              Dodaj
            </button>
          </div>

          <!-- Modal izmjena Turbine - pocetak -->
           
          <div class="modal fade" style="position:absolute; overflow-y:scroll;" 
          id="izmjenaTurbine" tabindex="-1" role="dialog" aria-labelledby="izmjenaTurbine" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                              
                            <div class="card">
                              <div class="card-header card-header-info card-header-text">

                                <div class="card-text">
                                  <h4 class="card-title" v-if="edit">Izabrana OEM turbina: {{turbina.oem}} </h4>
                                  <h4 class="card-title" v-else>Dodavanje nove OEM turbine</h4>
                                </div>
                                                              
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <button type="button" id="btn-zatvori-modal-a"  class="btn btn-warning" @click="zatvoriModal()">
                                      Odustani
                                    </button>
                                  </div>
                                </div>

                              </div>


                                                      <form  class="form-horizontal" @submit.prevent="snimiTurbinu">

                                                          <div class="card-body">

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Kataloški broj turbine</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="oem" v-model="turbina.oem" type="text" placeholder="" value="" required/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Kompatibilne turbine</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <textarea name="oem_komp" id="input-oem_komp" cols="30" rows="3" class="form-control" v-model="turbina.oem_komp" placeholder="alternative verzije turbine (nije obavezno)"></textarea>

                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Cijena remontovane turbine</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="oem_cijena" v-model="turbina.oem_cijena" type="text" placeholder="" value="" required/>
                                                                </div>
                                                              </div>
                                                            </div> 

<!-- -->


                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Nabavna cijena</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" v-model="turbina.nab_cijena"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Na stanju</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" v-model="turbina.na_stanju"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 
                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Limit</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" v-model="turbina.limit"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 
                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Polica</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" v-model="turbina.polica"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div>                                                             
<!---->                                                   

                                                            <div class="card-header bg-info card-header-text">
                                                              <div class="card-text">
                                                                
                                                                <h4 class="card-title">Sastav turbine</h4>
                                                              </div>
                                                            </div>


                                                           <div  v-for="tipoviValue in sviTipoviTurbine()" v-bind:key="tipoviValue.id" v-bind:value="tipoviValue.id" class="row">
                                                              <label class="col-sm-5 col-form-label">{{tipoviValue.naziv_2}}</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  
                                                                  <v-selectize :create-item="maybeCreate()" :options="filtriraniDijelovi(tipoviValue.oznaka)" v-model="turbina.s_model[tipoviValue.oznaka]" placeholder="-" key-by="id" label="oznaka" :keys="['oznaka']"/>
                                                                  
                                                                  <!--
                                                                  <select required class="selectpicker col-sm-12 pl-0 pr-0" v-bind:id="'izbor_'+tipoviValue.oznaka+'_id'"  v-model="turbina.model[tipoviValue.oznaka]" data-style="select-with-transition" title="" data-size="5">
                                                                    <option value="0">-</option>
                                                                    <option  v-for="listValue in filtriraniDijelovi(tipoviValue.oznaka)" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                            {{listValue.oznaka}}
                                                                    </option>
                                                                  </select>
                                                                  -->
                                                                </div>
                                                              </div>
                                                           
                                                           </div>




                                                          </div>   


                                                          <div class="card-footer ml-auto">
                                                            <div class="col-md-12 text-right">
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
          </div>           

          <!-- Modal izmjena Turbine - kraj -->


          <!-- Modal dodavanje Predračuna - pocetak -->
           
          <div class="modal fade" style="position:absolute; overflow-y:scroll;" 
           id="dodavanjePredracuna" tabindex="-1" role="dialog" aria-labelledby="dodavanjePredracuna" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-text">

                                <div class="card-text">
                                  <h4 class="card-title">Dodavanje predračuna za OEM: {{predracun.oem}} </h4>
                                </div>
                                                              
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <button type="button" id="btn-zatvori-modal-a"  class="btn btn-warning" @click="zatvoriModalPredracun()">
                                      Odustani
                                    </button>
                                  </div>
                                </div>

                              </div>

                                                      <form  class="form-horizontal" @submit.prevent="snimiPredracun">

                                                          <div class="card-body ">

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Broj</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="broj" v-model="predracun.broj" type="text" placeholder="" value="" required/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Datum</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input type="date"  name="datum" id="datum" v-model="predracun.datum" placeholder="Unesite datum" class="form-control"/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Kupac</label>
                                                              <div class="col-sm-4">
                                                                <div class="form-group has-danger">
                                                                
                                                                <v-selectize :create-item="maybeCreate()" :options="kupci" v-model="k_selected" placeholder="izaberite kupca" key-by="id" label="naziv" :keys="['naziv']"/>

                                                                  <!--  
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_kupca" id="izbor_kupca" v-model="predracun.kupac_id"  data-style="select-with-transition" title="" data-size="5">
                                                                    <option  v-for="listValue in kupci" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                            {{listValue.naziv}}
                                                                    </option>
                                                                    </select>   
                                                                  -->
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Način plaćanja</label>
                                                              <div class="col-sm-4">
                                                                <div class="form-group has-danger">
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_nacina_placanja" id="izbor_nacina_placanja" v-model="predracun.nacin_placanja"  data-style="select-with-transition" title="" data-size="5">
                                                                        <option value="1">Gotovina</option>
                                                                        <option value="2">Žiralno</option>
                                                                    </select>   
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Rabat</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="rabat" v-model="predracun.rabat" type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>
                                                            </div>                                                             

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Garancija</label>
                                                              <div class="col-sm-4">
                                                                <div class="form-group has-danger">
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_garancije" id="izbor_garancije" v-model="predracun.garancija"  data-style="select-with-transition" title="" data-size="5">
                                                                    <option value="0">-</option>
                                                                    <option value="1">1 godina</option>
                                                                    <option value="2">2 godine</option>
                                                                    <option value="3">3 godine</option>
                                                                    </select>   
                                                                </div>
                                                              </div>
                                                            </div> 


                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Status</label>
                                                              <div class="col-sm-4">
                                                                <div class="form-group has-danger">
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_statusa" id="izbor_statusa" v-model="predracun.status"  data-style="select-with-transition" title="" data-size="5">

                                                                        <option  v-bind:key="0" v-bind:value="0">
                                                                                {{'Nepotvrđen'}}
                                                                        </option>
                                                                        <option  v-bind:key="1" v-bind:value="1">
                                                                                {{'Potvrđen'}}
                                                                        </option>
                                                                        <option  v-bind:key="9" v-bind:value="9">
                                                                                {{'Poništen'}}
                                                                        </option>
                                                                        
                                                                    </select>   
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Napomena</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <textarea name="napomena" id="input-napomena" cols="30" rows="3" class="form-control" v-model="predracun.napomena" placeholder="unesite kratak opis (nije obavezno)"></textarea>

                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Vrsta usluge</label>
                                                              <div class="col-sm-9">
                                                                <div class="form-group has-danger">
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_komplet_remont" id="izbor_komplet_remont" v-model="predracun.komplet_remont"  data-style="select-with-transition" title="" data-size="5">

                                                                        <option  v-bind:key="1" v-bind:value="1">
                                                                                {{'Remont komplet turbine'}}
                                                                        </option>
                                                                        <option  v-bind:key="2" v-bind:value="2">
                                                                                {{'Servis turbine'}}
                                                                        </option>
                                                                        
                                                                    </select>   
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">OEM</label>
                                                              <div class="col-sm-6">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="oem" v-model="predracun.oem" type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="oem_cijena" v-model="predracun.oem_cijena" type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>                                                              
                                                            </div> 

                                                            <div v-show="predracun.komplet_remont==2" v-for="tipoviValue in filtriraniTipoviTurbine()" v-bind:key="tipoviValue.id" v-bind:value="tipoviValue.id" class="row">
                                                              <label class="col-sm-3 col-form-label">{{tipoviValue.naziv_2}}</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">


                                                                  
                                                                  <select required class="selectpicker col-sm-12 pl-0 pr-0" v-bind:id="'izbor_' + tipoviValue.oznaka + '_id'" @change="azuriraj_cijenu(tipoviValue.oznaka, predracun.model[tipoviValue.oznaka])" v-model="predracun.model[tipoviValue.oznaka]" data-style="select-with-transition" title="" data-size="5">
                                                                    <option value="0">-</option>
                                                                    <option  v-for="listValue in filtriraniDijelovi(tipoviValue.oznaka)" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                            {{listValue.oznaka}}
                                                                    </option>
                                                                  </select>
                                                                  
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <table>
                                                                    <tr>
                                                                      <td>
                                                                      <input type="button"  @click="decrement(tipoviValue.oznaka)" value="-">
                                                                      </td>
                                                                      <td>
                                                                      <input class="form-control  text-center"  v-model="predracun.kolicina[tipoviValue.oznaka]" type="text" placeholder="" value="" size="3"/>
                                                                      </td>
                                                                      <td>
                                                                      <input type="button"  @click="increment(tipoviValue.oznaka)" value="+">
                                                                      </td>
                                                                    </tr>
                                                                  </table>                                                                
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <td v-for="dioCijena in izabraniDio(predracun.model[tipoviValue.oznaka])" 
                                                                      v-bind:key="dioCijena.id" v-bind:value="dioCijena.id" 
                                                                      v-bind:class="[predracun.model[tipoviValue.oznaka]=='0'||predracun.kolicina[tipoviValue.oznaka]==0 ? 'form-control text-center  bg-light': 'form-control text-center']"
                                                                      >
                                                                    {{predracun.model[tipoviValue.oznaka]=='0'?0:dioCijena.cijena*predracun.kolicina[tipoviValue.oznaka]}}
                                                                  </td>
                                                                </div>
                                                              </div>                                                               
                                                            </div>
                                                                  

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Usluga</label>
                                                              <div class="col-sm-6">
                                                                <div class="form-group has-danger">
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_usluge" id="izbor_usluge" @change="azuriraj_cijenu_usluge(predracun.usluga_id)" v-model="predracun.usluga_id"  data-style="select-with-transition" title="" data-size="5">
                                                                    <option  v-for="listValue in usluge" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                            {{listValue.opis}}
                                                                    </option>
                                                                    </select>   
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-3" v-show="predracun.komplet_remont==2">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control text-center" v-model="predracun.usluga_cijena"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-9 col-form-label">Ukupna cijena</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control text-center" v-model="ukupnaCijena" disabled type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 


                                                          </div>   




                                                          <div class="card-footer ml-auto">
                                                            <div class="col-md-12 text-right">
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
          </div>           

          <!-- Modal dodavanje predračuna - kraj -->


        <!-- Pregled TURBINA -->
        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                <thead class="text-warning">
                    <th>
                        Kataloški broj turbine
                    </th>
                    <th>
                        Impeler
                    </th>
                    <th>
                        Rotor/osovina<br>turbine
                    </th>                    
                    <th>
                        Kućište<br>srca
                    </th>                    
                    <th>
                        Ploča
                    </th>                    
                    <th>
                        Toplotni<br>štit
                    </th>                    
                    <th>
                        Vakum<br>ventil
                    </th>                    
                    <th>
                        Varijabilna<br>geometrija
                    </th>                    
                    <th>
                        Set za montažu<br>
                        dihtunzi limeni
                    </th>      
                    <th>
                        Set za <br>reparaciju
                    </th>                      
                    <th>
                        Grana<br>turbine
                    </th>        
                    <th>
                        Srce<br>Turbine
                    </th>
                    <th class="text-right">
                        Novi<br>predračun
                    </th>
                    <th class="text-right">
                        Izmjena<br>turbine
                    </th>
                  
                  <!--              
                    <th class="text-right">
                        Cijena<br>(KM)
                    </th>
                    <th class="text-right">
                        Na<br>stanju
                    </th>
                    <th class="text-right">
                        Limit
                    </th>
                    <th  class="text-right">
                        Obrade
                    </th>
      -->
                </thead>

                <tbody>
                  <tr class="table-info">
                    <td>
                      <input type="text" v-model="pretraga.oem" placeholder="svi" size="12"/>
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.comp_wheel" placeholder="svi" size="6"/>
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.turbine_wheel" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.bearing_housing" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.back_plate" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.heat_shield" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.actuator" placeholder="svi" size="6" />
                    </td>                    
                    <td>
                      <input type="text" v-model="pretraga.noozles" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.gasket_kit" placeholder="svi" size="6" />
                    </td>                    
                    <td>
                      <input type="text" v-model="pretraga.repair_kit" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.turbine_housing" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.chra_no" placeholder="svi" size="6" />
                    </td>                                        
                    <td colspan="2">
                    </td>

                  </tr>



                   <!-- <tr v-for="turbina in filtriraniTurbine" v-bind:key="turbina.id">   -->
                     
                     <tr v-for="turbina in filtriraneTurbine" v-bind:key="turbina.id">
                        
                        <td>
                        {{turbina.oem}}<br>
                        <strong v-bind:class="turbina.na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.oem_cijena}}</strong>
                        </td>
                        <td>
                        {{turbina.comp_wheel_oznaka}}<br>
                        <strong v-bind:class="turbina.comp_wheel_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.comp_wheel_cijena}}</strong>
                        </td>
                        <td>
                        {{turbina.turbine_wheel_oznaka}}<br>
                        <strong v-bind:class="turbina.turbine_wheel_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.turbine_wheel_cijena}}</strong>
                        </td> 



                        <td>
                        {{turbina.bearing_housing_oznaka}}<br>
                        <strong v-bind:class="turbina.bearing_housing_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.bearing_housing_cijena}}</strong>
                        </td> 
                        <td>
                        {{turbina.back_plate_oznaka}}<br>
                        <strong v-bind:class="turbina.back_plate_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.back_plate_cijena}}</strong>
                        </td> 
                        <td>
                        {{turbina.heat_shield_oznaka}}<br>
                        <strong v-bind:class="turbina.heat_shield_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.heat_shield_cijena}}</strong>
                        </td> 
                        <td>
                        {{turbina.actuator_oznaka}}<br>
                        <strong v-bind:class="turbina.actuator_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.actuator_na_cijena}}</strong>
                        </td> 
                        <td>
                        {{turbina.noozles_oznaka}}<br>
                        <strong v-bind:class="turbina.noozles_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.noozles_na_cijena}}</strong>
                        </td> 
                        <td>
                        {{turbina.gasket_kit_oznaka}}<br>
                        <strong v-bind:class="turbina.gasket_kit_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.gasket_kit_cijena}}</strong>
                        </td> 
                        <td>
                        {{turbina.repair_kit_oznaka}}<br>
                        <strong v-bind:class="turbina.repair_kit_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.repair_kit_cijena}}</strong>
                        </td>
                        <td>
                        {{turbina.turbine_housing_oznaka}}<br>
                        <strong v-bind:class="turbina.turbine_housing_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.turbine_housing_cijena}}</strong>
                        </td>                        
                        <td>
                        {{turbina.chra_no_oznaka}}<br>
                        <strong v-bind:class="turbina.chra_no_na_stanju=='0' ? 'text-danger' : 'text-success' ">{{turbina.chra_no_cijena}}</strong>
                        </td>
        <!--
                        <td class="text-right">
                        {{turbina.cijena}}
                        </td>
                        <td class="text-right">
                        {{turbina.na_stanju}}
                        </td>
                        <td class="text-right">
                        {{turbina.limit}}
                        </td>
        -->

                        <td class="td-actions text-right">
                            <!-- Button trigger modal -->
                            
                            <!-- Button trigger modal / staro
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal_index" data-backdrop="static" data-keyboard="false">
                                <i class="material-icons">edit</i>
                                </button>
                            Button trigger modal / staro -->
                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="dodajPredracun(turbina)">
                                <!--<i class="material-text">Novi<br>predračun</i>-->
                                <i class="material-icons">post_add</i>
                            </button>
                        </td>    
                        <td class="td-actions text-right">
                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniTurbinu(turbina)">
                                <!--<i class="material-text">Izmjena<br>turbine</i>-->
                                <i class="material-icons">edit</i>
                            </button>

                        </td>
                                      
                    </tr>
                                 



                </tbody>
            </table>
        </div>


    </div>
</template>

<script>

/// uvozimo komponentu "selectize"
import 'selectize/dist/css/selectize.default.css' // This is required, we use the same css as selectize.js
import VSelectize from '@isneezy/vue-selectize'



export default {
    data() {
        return{


        // promjeniva za izbor iz liste
        k_selected: {

          id:    0, 
          naziv: 'izaberite kupca'
        },
        // promjeniva za izbor iz liste

            kupci: [],
            turbine: [],
            usluge: [],

            pretraga:{
              oem: '',
              comp_wheel: '',
              turbine_wheel: '', 
              bearing_housing: '', 
              back_plate: '', 
              heat_shield: '', 
              actuator: '', 
              noozles: '', 
              gasket_kit: '', 
              repair_kit: '',
              turbine_housing: '',
              chra_no: '' 

            },

            pagination: {},
            edit: false,
            turbina_id: '',

            edit_predracun: false,
            

            turbina: {
                id: '',
                oem: '',


                model: {
                    'CW' :0,
                    'TW' :0,
                    'BH' :0,
                    'BP' :0,
                    'HS' :0,
                    'AC' :0,
                    'NZ' :0,
                    'GK' :0,
                    'RK' :0,
                    'TH' :0,
                    'CN' :0,

                    'X01' :0,
                    'X02' :0,
                    'X03' :0,
                    'X04' :0,
                    'X05' :0,
                    'X06' :0,
                    'X07' :0,
                    'X08' :0,
                    'X09' :0,
                    'X10' :0,
                    'X11' :0,
                    'X12' :0,
                    'X13' :0                    
                }, 

                s_model: {

                    'CW' :0,
                    'TW' :0,
                    'BH' :0,
                    'BP' :0,
                    'HS' :0,
                    'AC' :0,
                    'NZ' :0,
                    'GK' :0,
                    'RK' :0,
                    'TH' :0,
                    'CN' :0,

                    'X01' :0,
                    'X02' :0,
                    'X03' :0,
                    'X04' :0,
                    'X05' :0,
                    'X06' :0,
                    'X07' :0,
                    'X08' :0,
                    'X09' :0,
                    'X10' :0,
                    'X11' :0,
                    'X12' :0,
                    'X13' :0                    
                }, 
                oem_cijena: 0,
                nab_cijena: 0,
                na_stanju: 0,
                limit: 0,
                polica: ''

            },


            turbinadijelovi: [],
            turbinadiotipovi: [],

            predracun: {
                id: '',
                broj: '',
                datum: '',
                kupac_id: 0,
                komplet_remont: 1,
                rabat: 0,
                nacin_placanja: 1,
                garancija: 0,
                napomena: '',
                
                oem: '',  oem_cijena: 0, 


                cijena: {
                    'CW' :0,
                    'TW' :0,
                    'BH' :0,
                    'BP' :0,
                    'HS' :0,
                    'AC' :0,
                    'NZ' :0,
                    'GK' :0,
                    'RK' :0,
                    'TH' :0,
                    'CN' :0,

                    'X01' :0,
                    'X02' :0,
                    'X03' :0,
                    'X04' :0,
                    'X05' :0,
                    'X06' :0,
                    'X07' :0,
                    'X08' :0,
                    'X09' :0,
                    'X10' :0,
                    'X11' :0,
                    'X12' :0,
                    'X13' :0

                }, 

                kolicina: {
                    'CW' :0,
                    'TW' :0,
                    'BH' :0,
                    'BP' :0,
                    'HS' :0,
                    'AC' :0,
                    'NZ' :0,
                    'GK' :0,
                    'RK' :0,
                    'TH' :0,
                    'CN' :0,

                    'X01' :0,
                    'X02' :0,
                    'X03' :0,
                    'X04' :0,
                    'X05' :0,
                    'X06' :0,
                    'X07' :0,
                    'X08' :0,
                    'X09' :0,
                    'X10' :0,
                    'X11' :0,
                    'X12' :0,
                    'X13' :0                    
                }, 

                model: {
                    'CW' :0,
                    'TW' :0,
                    'BH' :0,
                    'BP' :0,
                    'HS' :0,
                    'AC' :0,
                    'NZ' :0,
                    'GK' :0,
                    'RK' :0,
                    'TH' :0,
                    'CN' :0,

                    'X01' :0,
                    'X02' :0,
                    'X03' :0,
                    'X04' :0,
                    'X05' :0,
                    'X06' :0,
                    'X07' :0,
                    'X08' :0,
                    'X09' :0,
                    'X10' :0,
                    'X11' :0,
                    'X12' :0,
                    'X13' :0                    
                }, 

                model_0: {
                    'CW' :0,
                    'TW' :0,
                    'BH' :0,
                    'BP' :0,
                    'HS' :0,
                    'AC' :0,
                    'NZ' :0,
                    'GK' :0,
                    'RK' :0,
                    'TH' :0,
                    'CN' :0,

                    'X01' :0,
                    'X02' :0,
                    'X03' :0,
                    'X04' :0,
                    'X05' :0,
                    'X06' :0,
                    'X07' :0,
                    'X08' :0,
                    'X09' :0,
                    'X10' :0,
                    'X11' :0,
                    'X12' :0,
                    'X13' :0                    
                },               

                usluga_id: 0,
                usluga_cijena: 0,

                ukupna_cijena: 0,
                status: 0

            } 


        }
    
    },

    computed: {

      filtriraneTurbine: function(){
            return this.turbine.filter((stavka)=> {
                return stavka.oem.toLowerCase().includes(this.pretraga.oem.toLowerCase())
                    
                    && stavka.comp_wheel_oznaka.toLowerCase().includes(this.pretraga.comp_wheel.toLowerCase())
                    && stavka.turbine_wheel_oznaka.toLowerCase().includes(this.pretraga.turbine_wheel.toLowerCase()) 
                    && stavka.bearing_housing_oznaka.toLowerCase().includes(this.pretraga.bearing_housing.toLowerCase()) 
                    && stavka.back_plate_oznaka.toLowerCase().includes(this.pretraga.back_plate.toLowerCase()) 
                    && stavka.heat_shield_oznaka.toLowerCase().includes(this.pretraga.heat_shield.toLowerCase())
                    && stavka.actuator_oznaka.toLowerCase().includes(this.pretraga.actuator.toLowerCase()) 
                    && stavka.noozles_oznaka.toLowerCase().includes(this.pretraga.noozles.toLowerCase()) 
                    && stavka.gasket_kit_oznaka.toLowerCase().includes(this.pretraga.gasket_kit.toLowerCase()) 
                    && stavka.repair_kit_oznaka.toLowerCase().includes(this.pretraga.repair_kit.toLowerCase())
                    && stavka.turbine_housing_oznaka.toLowerCase().includes(this.pretraga.turbine_housing.toLowerCase())
                    && stavka.chra_no_oznaka.toLowerCase().includes(this.pretraga.chra_no.toLowerCase()) 

                    ;
                
                
            });
       },


      podaciDijela(dio_id){
            return this.turbinadijelovi.filter((stavka)=> {
                return stavka.id==dio_id

                    ;
            });
       },


      ukupnaCijena: function(predracun){

        this.predracun.ukupna_cijena=
                     parseFloat((2-this.predracun.komplet_remont)*this.predracun.oem_cijena) 
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['CW']==0?0:this.predracun.cijena['CW']*(100-this.predracun.rabat)*this.predracun.kolicina['CW']/100)//document.getElementById("cijena_CW").innerHTML )
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['TW']==0?0:this.predracun.cijena['TW']*(100-this.predracun.rabat)*this.predracun.kolicina['TW']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['BH']==0?0:this.predracun.cijena['BH']*(100-this.predracun.rabat)*this.predracun.kolicina['BH']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['BP']==0?0:this.predracun.cijena['BP']*(100-this.predracun.rabat)*this.predracun.kolicina['BP']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['HS']==0?0:this.predracun.cijena['HS']*(100-this.predracun.rabat)*this.predracun.kolicina['HS']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['AC']==0?0:this.predracun.cijena['AC']*(100-this.predracun.rabat)*this.predracun.kolicina['AC']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['NZ']==0?0:this.predracun.cijena['NZ']*(100-this.predracun.rabat)*this.predracun.kolicina['NZ']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['GK']==0?0:this.predracun.cijena['GK']*(100-this.predracun.rabat)*this.predracun.kolicina['GK']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['RK']==0?0:this.predracun.cijena['RK']*(100-this.predracun.rabat)*this.predracun.kolicina['RK']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['TH']==0?0:this.predracun.cijena['TH']*(100-this.predracun.rabat)*this.predracun.kolicina['TH']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['CN']==0?0:this.predracun.cijena['CN']*(100-this.predracun.rabat)*this.predracun.kolicina['CN']/100)

                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X01']==0?0:this.predracun.cijena['X01']*(100-this.predracun.rabat)*this.predracun.kolicina['X01']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X02']==0?0:this.predracun.cijena['X02']*(100-this.predracun.rabat)*this.predracun.kolicina['X02']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X03']==0?0:this.predracun.cijena['X03']*(100-this.predracun.rabat)*this.predracun.kolicina['X03']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X04']==0?0:this.predracun.cijena['X04']*(100-this.predracun.rabat)*this.predracun.kolicina['X04']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X05']==0?0:this.predracun.cijena['X05']*(100-this.predracun.rabat)*this.predracun.kolicina['X05']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X06']==0?0:this.predracun.cijena['X06']*(100-this.predracun.rabat)*this.predracun.kolicina['X06']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X07']==0?0:this.predracun.cijena['X07']*(100-this.predracun.rabat)*this.predracun.kolicina['X07']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X08']==0?0:this.predracun.cijena['X08']*(100-this.predracun.rabat)*this.predracun.kolicina['X08']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X09']==0?0:this.predracun.cijena['X09']*(100-this.predracun.rabat)*this.predracun.kolicina['X09']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X10']==0?0:this.predracun.cijena['X10']*(100-this.predracun.rabat)*this.predracun.kolicina['X10']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X11']==0?0:this.predracun.cijena['X11']*(100-this.predracun.rabat)*this.predracun.kolicina['X11']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X12']==0?0:this.predracun.cijena['X12']*(100-this.predracun.rabat)*this.predracun.kolicina['X12']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.model['X13']==0?0:this.predracun.cijena['X13']*(100-this.predracun.rabat)*this.predracun.kolicina['X13']/100)
                   + parseFloat((this.predracun.komplet_remont-1)*this.predracun.usluga_cijena)
                  ;

                  
                  return this.predracun.ukupna_cijena;
      }       




    },

    created() {

        this.ucitajTurbine();

        this.ucitajTurbinadijelovi();
        this.ucitajTurbinadiotipovi();
        this.ucitajKupce();
        this.ucitajUsluge();
    },


    methods: {

        maybeCreate(){
            return false;
        },

        zaokruzi_old(broj, dec) {

            return broj.toFixed(dec);
      
        },//ova funkcija ne valja

        increment(tip_oznaka) {
          this.predracun.kolicina[tip_oznaka]=parseFloat(this.predracun.kolicina[tip_oznaka])+1;
        },

        decrement(tip_oznaka) {
          this.predracun.kolicina[tip_oznaka]= this.predracun.kolicina[tip_oznaka]==0 ? parseFloat(0) : parseFloat(this.predracun.kolicina[tip_oznaka])-1;
        },

        zaokruzi(number, decimals) {
          var x = Math.pow(10, Number(decimals) + 1);
          var y = Math.pow(10, Number(decimals) +2);
          //document.getElementById("demo").innerHTML =(Number(Math.floor(number*(decimals+1))/10) + (1 / x));
          return ((Number(Math.floor(Number(number*x)))/x)+ (1 / y)).toFixed(decimals);
        },


        azuriraj_cijenu(tip_oznaka, dio_id) {
          this.predracun.cijena[tip_oznaka] = dio_id==0?0:this.turbinadijelovi.reduce( (acc, k_dio) => {
          return parseFloat(acc) 
              + parseFloat((dio_id==k_dio.id)?parseFloat(k_dio.cijena)/*parseFloat(this.predracun.kolicina[tip_oznaka])*/:parseFloat(0))

                }, 0)
                
        },

        azuriraj_cijenu_usluge(usluga_id) {
          this.predracun.usluga_cijena = this.usluge.reduce( (acc, k_dio) => {
          return parseFloat(acc) 
              + parseFloat((usluga_id==k_dio.id)?parseFloat(k_dio.cijena/100)/*parseFloat(this.predracun.kolicina[tip_oznaka])*/:parseFloat(0))

                }, 0)
                
        },


    /// kupci  //////////////////////////////
        ucitajKupce() {
            //let vm = this;
            
            //page_url = page_url || 'api/turbinadijelovi'
            fetch('api/kupci')
                .then(res => res.json())
                .then(res => {
                    this.kupci=res.data;
                    //vm.makePagination(res.meta, res.links);

                })
                .catch(err => console.log(err));

        },

    /// usluge  //////////////////////////////
        ucitajUsluge() {
            //let vm = this;
            
            //page_url = page_url || 'api/turbinadijelovi'
            fetch('api/usluge')
                .then(res => res.json())
                .then(res => {
                    this.usluge=res.data;
                    //vm.makePagination(res.meta, res.links);

                })
                .catch(err => console.log(err));

        },

    /// tipovi dijelova turbine  //////////////////////////////

        filtriraniDodatniTipovi: function(){
              return this.turbinadiotipovi.filter((stavka)=> {
                  return stavka.dodatni_dijelovi===1;
              });
        },

        filtriraniTipoviTurbine: function(){
              return this.turbinadiotipovi.filter((stavka)=> {
                  //  ovo e bila verzija koja je prikazivala samo izabrane osnovne i sve dodatne
                  //return this.predracun.model_0[stavka.oznaka]!=0||stavka.dodatni_dijelovi==1;
                  
                  // sada prikazujemo sam o izabrane u modelu bez obzira dal i su osnovni ili dodatni 
                  return this.predracun.model_0[stavka.oznaka]!=0;
              
              });
        },

        sviTipoviTurbine: function(){
              return this.turbinadiotipovi.filter((stavka)=> {
                  //  ovo e bila verzija koja je prikazivala samo izabrane osnovne i sve dodatne
                  //return this.predracun.model_0[stavka.oznaka]!=0||stavka.dodatni_dijelovi==1;
                  
                  // sada prikazujemo sam o izabrane u modelu bez obzira dal i su osnovni ili dodatni 
                  return 1==1;
              
              });
        },

        ucitajTurbinadiotipovi(page_url) {
            //let vm = this;
            
            page_url = page_url || 'api/turbinadiotipovi'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.turbinadiotipovi=res.data;
                    //vm.makePagination(res.meta, res.links);

                })
                .catch(err => console.log(err));

        },



    
    /// Dijelovi turbine  //////////////////////////////

        filtriraniDijelovi: function(oznaka_tipa){
              return this.turbinadijelovi.filter((stavka)=> {
                  return stavka.turbinadiotip_oznaka===oznaka_tipa;
              });
        },


        izabraniDio: function(id_dijela){
              return this.turbinadijelovi.filter((stavka)=> {
                  return stavka.id===id_dijela;
              });
        },

        ucitajTurbinadijelovi(page_url) {
            //let vm = this;
            
            page_url = page_url || 'api/turbinadijelovi'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.turbinadijelovi=res.data;
                    //vm.makePagination(res.meta, res.links);

                })
                .catch(err => console.log(err));

        },

    /// OEM turbine  //////////////////////////////

        ucitajTurbine(page_url) {
            let vm = this;
            
            page_url = page_url || 'api/turbine'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.turbine=res.data;
                    vm.makePagination(res.meta, res.links);

                })
                .catch(err => console.log(err));

        },

        //  pri učitavanju formiraj paginaciju
            makePagination(meta, links){
                let pagination = {
                  current_page: meta.current_page,
                  last_page: meta.last_page,
                  first_page_url: links.first,
                  next_page_url: links.next,
                  prev_page_url: links.prev,
                  last_page_url: links.last
                }

                this.pagination = pagination;
            },

        dodajTurbinu(){
          this.edit = false;
          this.turbina.id              = null;

          this.turbina.oem             = '';

          this.trubina.model['CW'] =  0;       
          this.trubina.model['TW'] =  0;       
          this.trubina.model['BH'] =  0;       
          this.trubina.model['BP'] =  0;        
          this.trubina.model['HS'] =  0;        
          this.trubina.model['AC'] =  0;       
          this.trubina.model['NZ'] =  0;       
          this.trubina.model['GK'] =  0;     
          this.trubina.model['RK'] =  0;       
          this.trubina.model['TH'] =  0;       
          this.trubina.model['CN'] =  0;        
          
          this.turbina.model['X01'] = 0,
          this.turbina.model['X02'] = 0,
          this.turbina.model['X03'] = 0,
          this.turbina.model['X04'] = 0,
          this.turbina.model['X05'] = 0,
          this.turbina.model['X06'] = 0,
          this.turbina.model['X07'] = 0,
          this.turbina.model['X08'] = 0,
          this.turbina.model['X09'] = 0,
          this.turbina.model['X10'] = 0,
          this.turbina.model['X11'] = 0,
          this.turbina.model['X12'] = 0,
          this.turbina.model['X13'] = 0,                    

       this.turbina.s_model['CW'] = null,
       this.turbina.s_model['TW'] = null,
       this.turbina.s_model['BH'] = null,
       this.turbina.s_model['BP'] = null,
       this.turbina.s_model['HS'] = null,
       this.turbina.s_model['AC'] = null,
       this.turbina.s_model['NZ'] = null,
       this.turbina.s_model['GK'] = null,
       this.turbina.s_model['RK'] = null,
       this.turbina.s_model['TH'] = null,
       this.turbina.s_model['CN'] = null,

       this.turbina.s_model['X01'] = null,
       this.turbina.s_model['X02'] = null, //else {this.turbina.s_model['X02'] = {id:  this.izabraniDio(turbina.X02)['0'].id, oznaka: this.izabraniDio(turbina.X02)['0'].oznaka }*/ }
       this.turbina.s_model['X03'] = null,  // this.turbina.s_model.X03['id'] = turbina.X03;
       this.turbina.s_model['X04'] = null,  // this.turbina.s_model.X04['id'] = turbina.X04;
       this.turbina.s_model['X05'] = null,  // this.turbina.s_model.X05['id'] = turbina.X05;
       this.turbina.s_model['X06'] = null,  // this.turbina.s_model.X06['id'] = turbina.X06;
       this.turbina.s_model['X07'] = null,  // this.turbina.s_model.X07['id'] = turbina.X07;
       this.turbina.s_model['X08'] = null,  // this.turbina.s_model.X08['id'] = turbina.X08;
       this.turbina.s_model['X09'] = null,  // this.turbina.s_model.X09['id'] = turbina.X09;
       this.turbina.s_model['X10'] = null,  // this.turbina.s_model.X10['id'] = turbina.X10;
       this.turbina.s_model['X11'] = null,  // this.turbina.s_model.X11['id'] = turbina.X11;
       this.turbina.s_model['X12'] = null,  // this.turbina.s_model.X12['id'] = turbina.X12;
       this.turbina.s_model['X13'] = null,  // this.turbina.s_model.X13['id'] = turbina.X13;


 
          this.turbina.oem_cijena      = 0;  
          this.turbina.na_stanju       = 0; // vjerovatno nepotrebno 
          this.turbina.limit           = 0; // vjerovatno nepotrebno
          this.turbina.nab_cijena      = 0; // vjerovatno nepotrebno  
          this.turbina.polica          = '';  



/*
          //forsiraj prikaz liste

        this.$nextTick(function(){ 
            $('#izbor_comp_wheel').selectpicker("refresh");
            $('#izbor_turbine_wheel').selectpicker("refresh");
            $('#izbor_bearing_housing').selectpicker("refresh");
            $('#izbor_back_plate').selectpicker("refresh");
            $('#izbor_heat_shield').selectpicker("refresh");
            $('#izbor_actuator').selectpicker("refresh");
            $('#izbor_noozles').selectpicker("refresh");
            $('#izbor_gasket_kit').selectpicker("refresh");
            $('#izbor_repair_kit').selectpicker("refresh");
            $('#izbor_turbine_housing').selectpicker("refresh");
            $('#izbor_chra_no').selectpicker("refresh");

            $('#izbor_X01_id').selectpicker("refresh");
            $('#izbor_X02_id').selectpicker("refresh");  
            $('#izbor_X03_id').selectpicker("refresh");
            $('#izbor_X04_id').selectpicker("refresh");
            $('#izbor_X05_id').selectpicker("refresh");
            $('#izbor_X06_id').selectpicker("refresh");
            $('#izbor_X07_id').selectpicker("refresh");
            $('#izbor_X08_id').selectpicker("refresh");
            $('#izbor_X09_id').selectpicker("refresh");
            $('#izbor_X10_id').selectpicker("refresh");
            $('#izbor_X11_id').selectpicker("refresh"); 
            $('#izbor_X12_id').selectpicker("refresh");
            $('#izbor_X13_id').selectpicker("refresh");   

          })
*/
        },

        izmjeniTurbinu(turbina){
          
          
          this.edit=true;
          
          this.turbina.id=turbina.id;
          
          //this.turbina.turbina_id=turbina.id;

          this.turbina.oem             = turbina.oem;

          this.turbina.model['CW'] =  turbina.comp_wheel;
          this.turbina.model['TW'] =  turbina.turbine_wheel;
          this.turbina.model['BH'] =  turbina.bearing_housing;
          this.turbina.model['BP'] =  turbina.back_plate; 
          this.turbina.model['HS'] =  turbina.heat_shield; 
          this.turbina.model['AC'] =  turbina.actuator; 
          this.turbina.model['NZ'] =  turbina.noozles;
          this.turbina.model['GK'] =  turbina.gasket_kit;
          this.turbina.model['RK'] =  turbina.repair_kit;
          this.turbina.model['TH'] =  turbina.turbine_housing;
          this.turbina.model['CN'] =  turbina.chra_no; 

          this.turbina.model['X01'] = turbina.X01;   //model['X01'];
          this.turbina.model['X02'] = turbina.X02;   //model['X02'];
          this.turbina.model['X03'] = turbina.X03;   //model['X03'];
          this.turbina.model['X04'] = turbina.X04;   //model['X04'];
          this.turbina.model['X05'] = turbina.X05;   //model['X05'];
          this.turbina.model['X06'] = turbina.X06;   //model['X06'];
          this.turbina.model['X07'] = turbina.X07;   //model['X07']; 
          this.turbina.model['X08'] = turbina.X08;   //model['X08'];
          this.turbina.model['X09'] = turbina.X09;   //model['X09'];
          this.turbina.model['X10'] = turbina.X10;   //model['X10'];
          this.turbina.model['X11'] = turbina.X11;   //model['X11'];
          this.turbina.model['X12'] = turbina.X12;   //model['X12'];
          this.turbina.model['X13'] = turbina.X13;   //model['X13'];   


      // polja za pretraživu listu
       if (this.turbina.model['CW']!=0) {this.turbina.s_model['CW'] = this.izabraniDio(this.turbina.model['CW'])['0'];}
       if (this.turbina.model['TW']!=0) {this.turbina.s_model['TW'] = this.izabraniDio(this.turbina.model['TW'])['0'];}
       if (this.turbina.model['BH']!=0) {this.turbina.s_model['BH'] = this.izabraniDio(this.turbina.model['BH'])['0'];}
       if (this.turbina.model['BP']!=0) {this.turbina.s_model['BP'] = this.izabraniDio(this.turbina.model['BP'])['0'];}
       if (this.turbina.model['HS']!=0) {this.turbina.s_model['HS'] = this.izabraniDio(this.turbina.model['HS'])['0'];}
       if (this.turbina.model['AC']!=0) {this.turbina.s_model['AC'] = this.izabraniDio(this.turbina.model['AC'])['0'];}
       if (this.turbina.model['NZ']!=0) {this.turbina.s_model['NZ'] = this.izabraniDio(this.turbina.model['NZ'])['0'];}
       if (this.turbina.model['GK']!=0) {this.turbina.s_model['GK'] = this.izabraniDio(this.turbina.model['GK'])['0'];}
       if (this.turbina.model['RK']!=0) {this.turbina.s_model['RK'] = this.izabraniDio(this.turbina.model['RK'])['0'];}
       if (this.turbina.model['TH']!=0) {this.turbina.s_model['TH'] = this.izabraniDio(this.turbina.model['TH'])['0'];}
       if (this.turbina.model['CN']!=0) {this.turbina.s_model['CN'] = this.izabraniDio(this.turbina.model['CN'])['0'];}

       if (turbina.X01!=0) {this.turbina.s_model['X01'] = this.izabraniDio(turbina.X01)['0'];}
       if (turbina.X02!=0) {this.turbina.s_model['X02'] = this.izabraniDio(turbina.X02)['0'];} //else {this.turbina.s_model['X02'] = {id:  this.izabraniDio(turbina.X02)['0'].id, oznaka: this.izabraniDio(turbina.X02)['0'].oznaka }*/ }
       if (turbina.X03!=0) {this.turbina.s_model['X03'] = this.izabraniDio(turbina.X03)['0'];}  // this.turbina.s_model.X03['id'] = turbina.X03;
       if (turbina.X04!=0) {this.turbina.s_model['X04'] = this.izabraniDio(turbina.X04)['0'];}  // this.turbina.s_model.X04['id'] = turbina.X04;
       if (turbina.X05!=0) {this.turbina.s_model['X05'] = this.izabraniDio(turbina.X05)['0'];}  // this.turbina.s_model.X05['id'] = turbina.X05;
       if (turbina.X06!=0) {this.turbina.s_model['X06'] = this.izabraniDio(turbina.X06)['0'];}  // this.turbina.s_model.X06['id'] = turbina.X06;
       if (turbina.X07!=0) {this.turbina.s_model['X07'] = this.izabraniDio(turbina.X07)['0'];}  // this.turbina.s_model.X07['id'] = turbina.X07;
       if (turbina.X08!=0) {this.turbina.s_model['X08'] = this.izabraniDio(turbina.X08)['0'];}  // this.turbina.s_model.X08['id'] = turbina.X08;
       if (turbina.X09!=0) {this.turbina.s_model['X09'] = this.izabraniDio(turbina.X09)['0'];}  // this.turbina.s_model.X09['id'] = turbina.X09;
       if (turbina.X10!=0) {this.turbina.s_model['X10'] = this.izabraniDio(turbina.X10)['0'];}  // this.turbina.s_model.X10['id'] = turbina.X10;
       if (turbina.X11!=0) {this.turbina.s_model['X11'] = this.izabraniDio(turbina.X11)['0'];}  // this.turbina.s_model.X11['id'] = turbina.X11;
       if (turbina.X12!=0) {this.turbina.s_model['X12'] = this.izabraniDio(turbina.X12)['0'];}  // this.turbina.s_model.X12['id'] = turbina.X12;
       if (turbina.X13!=0) {this.turbina.s_model['X13'] = this.izabraniDio(turbina.X13)['0'];}  // this.turbina.s_model.X13['id'] = turbina.X13;


          this.turbina.oem_cijena      = turbina.oem_cijena;  
          this.turbina.na_stanju       = turbina.na_stanju;  
          this.turbina.limit           = turbina.limit;  
          this.turbina.nab_cijena      = turbina.nab_cijena; 

          this.turbina.polica          = turbina.polica;       
          
          // prikaži modalni prozor
          $("#izmjenaTurbine").modal("show");

          /*
          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_comp_wheel').selectpicker("refresh");
            $('#izbor_turbine_wheel').selectpicker("refresh");
            $('#izbor_bearing_housing').selectpicker("refresh");
            $('#izbor_back_plate').selectpicker("refresh");
            $('#izbor_heat_shield').selectpicker("refresh");
            $('#izbor_actuator').selectpicker("refresh");
            $('#izbor_noozles').selectpicker("refresh");
            $('#izbor_gasket_kit').selectpicker("refresh");
            $('#izbor_repair_kit').selectpicker("refresh");
            $('#izbor_turbine_housing').selectpicker("refresh");
            $('#izbor_chra_no').selectpicker("refresh");

            $('#izbor_X01_id').selectpicker("refresh");
            $('#izbor_X02_id').selectpicker("refresh");  
            $('#izbor_X03_id').selectpicker("refresh");
            $('#izbor_X04_id').selectpicker("refresh");
            $('#izbor_X05_id').selectpicker("refresh");
            $('#izbor_X06_id').selectpicker("refresh");
            $('#izbor_X07_id').selectpicker("refresh");
            $('#izbor_X08_id').selectpicker("refresh");
            $('#izbor_X09_id').selectpicker("refresh");
            $('#izbor_X10_id').selectpicker("refresh");
            $('#izbor_X11_id').selectpicker("refresh"); 
            $('#izbor_X12_id').selectpicker("refresh");
            $('#izbor_X13_id').selectpicker("refresh");  

          })

          */
 

        },

        snimiTurbinu(){

                  //pokupi novo stanje
                  this.$forceUpdate();
                    /// uzimamo vrijednost iz dinamičkog selekta
                    
                        this.turbina.model['CW']  = this.turbina.s_model['CW'].id  ? this.turbina.s_model['CW'].id  : 0;
                        this.turbina.model['TW']  = this.turbina.s_model['TW'].id  ? this.turbina.s_model['TW'].id  : 0;
                        this.turbina.model['BH']  = this.turbina.s_model['BH'].id  ? this.turbina.s_model['BH'].id  : 0; 
                        this.turbina.model['BP']  = this.turbina.s_model['BP'].id  ? this.turbina.s_model['BP'].id  : 0; 
                        this.turbina.model['HS']  = this.turbina.s_model['HS'].id  ? this.turbina.s_model['HS'].id  : 0; 
                        this.turbina.model['AC']  = this.turbina.s_model['AC'].id  ? this.turbina.s_model['AC'].id  : 0; 
                        this.turbina.model['NZ']  = this.turbina.s_model['NZ'].id  ? this.turbina.s_model['NZ'].id  : 0; 
                        this.turbina.model['GK']  = this.turbina.s_model['GK'].id  ? this.turbina.s_model['GK'].id  : 0; 
                        this.turbina.model['RK']  = this.turbina.s_model['RK'].id  ? this.turbina.s_model['RK'].id  : 0;
                        this.turbina.model['TH']  = this.turbina.s_model['TH'].id  ? this.turbina.s_model['TH'].id  : 0;         
                        this.turbina.model['CN']  = this.turbina.s_model['CN'].id  ? this.turbina.s_model['CN'].id  : 0; 


                        this.turbina.model['X01'] = this.turbina.s_model['X01'].id ? this.turbina.s_model['X01'].id : 0;
                        this.turbina.model['X02'] = this.turbina.s_model['X02'].id ? this.turbina.s_model['X02'].id : 0;
                        this.turbina.model['X03'] = this.turbina.s_model['X03'].id ? this.turbina.s_model['X03'].id : 0;
                        this.turbina.model['X04'] = this.turbina.s_model['X04'].id ? this.turbina.s_model['X04'].id : 0;
                        this.turbina.model['X05'] = this.turbina.s_model['X05'].id ? this.turbina.s_model['X05'].id : 0;
                        this.turbina.model['X06'] = this.turbina.s_model['X06'].id ? this.turbina.s_model['X06'].id : 0;
                        this.turbina.model['X07'] = this.turbina.s_model['X07'].id ? this.turbina.s_model['X07'].id : 0;
                        this.turbina.model['X08'] = this.turbina.s_model['X08'].id ? this.turbina.s_model['X08'].id : 0;
                        this.turbina.model['X09'] = this.turbina.s_model['X09'].id ? this.turbina.s_model['X09'].id : 0;
                        this.turbina.model['X10'] = this.turbina.s_model['X10'].id ? this.turbina.s_model['X10'].id : 0;
                        this.turbina.model['X11'] = this.turbina.s_model['X11'].id ? this.turbina.s_model['X11'].id : 0;
                        this.turbina.model['X12'] = this.turbina.s_model['X12'].id ? this.turbina.s_model['X12'].id : 0;
                        this.turbina.model['X13'] = this.turbina.s_model['X13'].id ? this.turbina.s_model['X13'].id : 0;


                  if(this.edit===false){
                    // dodaj vrstu
                    fetch('./../../api/turbina', {
                      method: 'post',
                      body: JSON.stringify(this.turbina),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                    .then(response => response.json())
                    .then(data => {
                      this.ucitajTurbine();
                      this.isprazniModal();
                      //this.$forceUpdate();

                    })
                    .catch(err => console.log(err));


                  // alert('dodao pa zatvaram');

                  }else{
                    // izmjeni postojeći turbina
                      fetch('./../../api/turbina', {
                      method: 'put',
                      body: JSON.stringify(this.turbina),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                    .then(response => response.json())
                    .then(data => {
                      
                      this.ucitajTurbine();
                      this.isprazniModal();
                      //this.$forceUpdate();
                      // sakrij modalni prozor
                      //$("#noviElementProizvoda").modal("hide");

                    })
                    .catch(err => console.log(err));

                  // alert('izmjenio turbina pa zatvaram');

                  }
                  

                  //REinit();
                  //this.$forceUpdate();
                  //RefreshTable();
                  this.zatvoriModal();
            
        },

        dodajPredracun(turbina){

          // Podaci za dodavanje novog predračuna

          this.edit_predracun=false;

          this.predracun.id= null;
          
          this.predracun.broj = '';
          this.predracun.datum = new Date().toISOString().substr(0, 10);
          this.predracun.kupac_id = 0;
          this.predracun.napomena = '-';
          this.predracun.nacin_placanja = 1;
          this.predracun.garancija = 0;

          this.predracun.komplet_remont = 2;  //servis turbine (1 - komplet turbina)

          this.predracun.oem            = turbina.oem ;
          this.predracun.oem_cijena     = turbina.oem_cijena;

// modeli ////////////////////////////////////////////////////
                this.predracun.model['CW'] =  turbina.comp_wheel;
                this.predracun.model['TW'] =  turbina.turbine_wheel;
                this.predracun.model['BH'] =  turbina.bearing_housing;
                this.predracun.model['BP'] =  turbina.back_plate; 
                this.predracun.model['HS'] =  turbina.heat_shield; 
                this.predracun.model['AC'] =  turbina.actuator; 
                this.predracun.model['NZ'] =  turbina.noozles;
                this.predracun.model['GK'] =  turbina.gasket_kit;
                this.predracun.model['RK'] =  turbina.repair_kit;
                this.predracun.model['TH'] =  turbina.turbine_housing;
                this.predracun.model['CN'] =  turbina.chra_no; 

                this.predracun.model['X01'] = turbina.X01;
                this.predracun.model['X02'] = turbina.X02;
                this.predracun.model['X03'] = turbina.X03;
                this.predracun.model['X04'] = turbina.X04;
                this.predracun.model['X05'] = turbina.X05;
                this.predracun.model['X06'] = turbina.X06;
                this.predracun.model['X07'] = turbina.X07;
                this.predracun.model['X08'] = turbina.X08;
                this.predracun.model['X09'] = turbina.X09;
                this.predracun.model['X10'] = turbina.X10;
                this.predracun.model['X11'] = turbina.X11;
                this.predracun.model['X12'] = turbina.X12;
                this.predracun.model['X13'] = turbina.X13;                

// količine ///////////////////////////////////////////////////////////////////////////
// samo osnovni imaju početnu količinu, i to ako je određen neki model_id različit od 0
                this.predracun.kolicina['CW'] =  0==turbina.comp_wheel      ? 0 : 1;
                this.predracun.kolicina['TW'] =  0==turbina.turbine_wheel   ? 0 : 1;
                this.predracun.kolicina['BH'] =  0==turbina.bearing_housing ? 0 : 1;
                this.predracun.kolicina['BP'] =  0==turbina.back_plate      ? 0 : 1; 
                this.predracun.kolicina['HS'] =  0==turbina.heat_shield     ? 0 : 1; 
                this.predracun.kolicina['AC'] =  0==turbina.actuator        ? 0 : 1; 
                this.predracun.kolicina['NZ'] =  0==turbina.noozles         ? 0 : 1;
                this.predracun.kolicina['GK'] =  0==turbina.gasket_kit      ? 0 : 1;
                this.predracun.kolicina['RK'] =  0==turbina.repair_kit      ? 0 : 1;
                this.predracun.kolicina['TH'] =  0==turbina.turbine_housing ? 0 : 1;
                this.predracun.kolicina['CN'] =  0==turbina.chra_no         ? 0 : 1; 

                this.predracun.kolicina['X01'] = 0==turbina.X01  ? 0 : 1;
                this.predracun.kolicina['X02'] = 0==turbina.X02  ? 0 : 1; 
                this.predracun.kolicina['X03'] = 0==turbina.X03  ? 0 : 1; 
                this.predracun.kolicina['X04'] = 0==turbina.X04  ? 0 : 1; 
                this.predracun.kolicina['X05'] = 0==turbina.X05  ? 0 : 1; 
                this.predracun.kolicina['X06'] = 0==turbina.X06  ? 0 : 1; 
                this.predracun.kolicina['X07'] = 0==turbina.X07  ? 0 : 1; 
                this.predracun.kolicina['X08'] = 0==turbina.X08  ? 0 : 1; 
                this.predracun.kolicina['X09'] = 0==turbina.X09  ? 0 : 1; 
                this.predracun.kolicina['X10'] = 0==turbina.X10  ? 0 : 1; 
                this.predracun.kolicina['X11'] = 0==turbina.X11  ? 0 : 1; 
                this.predracun.kolicina['X12'] = 0==turbina.X12  ? 0 : 1; 
                this.predracun.kolicina['X13'] = 0==turbina.X13  ? 0 : 1;  

// ovo je vjerovatno višak ???????????????????????????????????????
                this.predracun.model_0['CW'] =  turbina.comp_wheel;
                this.predracun.model_0['TW'] =  turbina.turbine_wheel;
                this.predracun.model_0['BH'] =  turbina.bearing_housing;
                this.predracun.model_0['BP'] =  turbina.back_plate; 
                this.predracun.model_0['HS'] =  turbina.heat_shield; 
                this.predracun.model_0['AC'] =  turbina.actuator; 
                this.predracun.model_0['NZ'] =  turbina.noozles;
                this.predracun.model_0['GK'] =  turbina.gasket_kit;
                this.predracun.model_0['RK'] =  turbina.repair_kit;
                this.predracun.model_0['TH'] =  turbina.turbine_housing;
                this.predracun.model_0['CN'] =  turbina.chra_no; 

                this.predracun.model_0['X01'] = turbina.X01; 
                this.predracun.model_0['X02'] = turbina.X02; 
                this.predracun.model_0['X03'] = turbina.X03; 
                this.predracun.model_0['X04'] = turbina.X04; 
                this.predracun.model_0['X05'] = turbina.X05; 
                this.predracun.model_0['X06'] = turbina.X06; 
                this.predracun.model_0['X07'] = turbina.X07; 
                this.predracun.model_0['X08'] = turbina.X08; 
                this.predracun.model_0['X09'] = turbina.X09; 
                this.predracun.model_0['X10'] = turbina.X10; 
                this.predracun.model_0['X11'] = turbina.X11; 
                this.predracun.model_0['X12'] = turbina.X12; 
                this.predracun.model_0['X13'] = turbina.X13;              
// ovo je vjerovatno višak ???????????????????????????????????????



// cijene /////////////////////////////////////////////////////////////
                this.azuriraj_cijenu('CW', this.predracun.model['CW']);    
                this.azuriraj_cijenu('TW', this.predracun.model['TW']);    
                this.azuriraj_cijenu('BH', this.predracun.model['BH']); 
                this.azuriraj_cijenu('BP', this.predracun.model['BP']); 
                this.azuriraj_cijenu('HS', this.predracun.model['HS']); 
                this.azuriraj_cijenu('AC', this.predracun.model['AC']); 
                this.azuriraj_cijenu('NZ', this.predracun.model['NZ']); 
                this.azuriraj_cijenu('GK', this.predracun.model['GK']); 
                this.azuriraj_cijenu('RK', this.predracun.model['RK']); 
                this.azuriraj_cijenu('TH', this.predracun.model['TH']); 
                this.azuriraj_cijenu('CN', this.predracun.model['CN']); 

                this.azuriraj_cijenu('X01', this.predracun.model['X01']); 
                this.azuriraj_cijenu('X02', this.predracun.model['X02']); 
                this.azuriraj_cijenu('X03', this.predracun.model['X03']); 
                this.azuriraj_cijenu('X04', this.predracun.model['X04']); 
                this.azuriraj_cijenu('X05', this.predracun.model['X05']); 
                this.azuriraj_cijenu('X06', this.predracun.model['X06']); 
                this.azuriraj_cijenu('X07', this.predracun.model['X07']); 
                this.azuriraj_cijenu('X08', this.predracun.model['X08']); 
                this.azuriraj_cijenu('X09', this.predracun.model['X09']); 
                this.azuriraj_cijenu('X10', this.predracun.model['X10']); 
                this.azuriraj_cijenu('X11', this.predracun.model['X11']); 
                this.azuriraj_cijenu('X12', this.predracun.model['X12']); 
                this.azuriraj_cijenu('X13', this.predracun.model['X13']); 




          //this.predracun.usluga_id          = 0; /// ne zadaje se
          this.predracun.usluga_cijena          = 0;
          
          this.predracun.status                  = 0;

          // prikaži modalni prozor
          $("#dodavanjePredracuna").modal("show");

          //forsiraj prikaz liste
          this.$nextTick(function(){ 

            $('#izbor_statusa').selectpicker("refresh");
            
            
            //$('#izbor_kupca').selectpicker("refresh");

                          // polja za pretraživu listu
                          if (this.k_selected){
                              this.k_selected.id     = 0;//this.materijal.mattipoznaka_id;
                              this.k_selected.naziv  = 'izaberite kupca';
                          }else{
                            this.k_selected = {
                              id:    0,
                              naziv: 'izaberite kupca'
                            } 
                          }

            $('#izbor_nacina_placanja').selectpicker("refresh");
            $('#izbor_garancije').selectpicker("refresh");
            $('#izbor_usluge').selectpicker("refresh");
            $('#izbor_komplet_remont').selectpicker("refresh");

            $('#izbor_CW_id').selectpicker("refresh");
            $('#izbor_TW_id').selectpicker("refresh");  
            $('#izbor_BH_id').selectpicker("refresh");
            $('#izbor_BP_id').selectpicker("refresh");
            $('#izbor_HS_id').selectpicker("refresh");
            $('#izbor_AC_id').selectpicker("refresh");
            $('#izbor_NZ_id').selectpicker("refresh");
            $('#izbor_GK_id').selectpicker("refresh");
            $('#izbor_RK_id').selectpicker("refresh");
            $('#izbor_TH_id').selectpicker("refresh");
            $('#izbor_CN_id').selectpicker("refresh");

            $('#izbor_X01_id').selectpicker("refresh");
            $('#izbor_X02_id').selectpicker("refresh");  
            $('#izbor_X03_id').selectpicker("refresh");
            $('#izbor_X04_id').selectpicker("refresh");
            $('#izbor_X05_id').selectpicker("refresh");
            $('#izbor_X06_id').selectpicker("refresh");
            $('#izbor_X07_id').selectpicker("refresh");
            $('#izbor_X08_id').selectpicker("refresh");
            $('#izbor_X09_id').selectpicker("refresh");
            $('#izbor_X10_id').selectpicker("refresh");
            $('#izbor_X11_id').selectpicker("refresh"); 
            $('#izbor_X12_id').selectpicker("refresh");
            $('#izbor_X13_id').selectpicker("refresh");            
          })


        },

        snimiPredracun(){

            if (!this.k_selected || this.k_selected.id==0) {
                alert('Nije izabran kupac!');

            } else{
                  //pokupi novo stanje
                  this.$forceUpdate();
                    /// uzimamo vrijednost iz dinamičkog selekta
                    this.predracun.kupac_id=this.k_selected.id;


                  if(this.edit_predracun===false){
                    // dodaj predracun
                    fetch('./../../api/predracun', {
                      method: 'post',
                      body: JSON.stringify(this.predracun),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                    .then(response => response.json())
                    .then(data => {
                      this.ucitajPredracune();
                      this.isprazniModalPredracun();
                      //this.$forceUpdate();

                    })
                    .catch(err => console.log(err));


                  // alert('dodao pa zatvaram');

                  }else{
                    // izmjeni postojeći predracun
                      fetch('./../../api/predracun', {
                      method: 'put',
                      body: JSON.stringify(this.predracun),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                    .then(response => response.json())
                    .then(data => {
                      
                      this.ucitajPredracune();
                      this.isprazniModalPredracun();
                      //this.$forceUpdate();
                      // sakrij modalni prozor
                      //$("#noviElementProizvoda").modal("hide");

                    })
                    .catch(err => console.log(err));

                  // alert('izmjenio turbinu pa zatvaram');

                  }
                  

                  //REinit();
                  //this.$forceUpdate();
                  //RefreshTable();
                  this.zatvoriModalPredracun();
            }
        },


        isprazniModal(){
          
       // podaci o turbini ///////////////////////////////////

          this.turbina.id              = null;

          this.turbina.oem             = '';
          
          this.turbina.model['CW'] = 0;
          this.turbina.model['TW'] = 0;
          this.turbina.model['BH'] = 0; 
          this.turbina.model['BP'] = 0; 
          this.turbina.model['HS'] = 0; 
          this.turbina.model['AC'] = 0; 
          this.turbina.model['NZ'] = 0; 
          this.turbina.model['GK'] = 0; 
          this.turbina.model['RK'] = 0;
          this.turbina.model['TH'] = 0;         
          this.turbina.model['CN'] = 0; 

          this.turbina.oem_cijena      = 0;  
          this.turbina.na_stanju       = 0;  
          this.turbina.limit           = 0;
          this.turbina.nab_cijena      = 0;             

          this.turbina.model['X01'] = 0;
          this.turbina.model['X02'] = 0;
          this.turbina.model['X03'] = 0;
          this.turbina.model['X04'] = 0;
          this.turbina.model['X05'] = 0;
          this.turbina.model['X06'] = 0;
          this.turbina.model['X07'] = 0;
          this.turbina.model['X08'] = 0;
          this.turbina.model['X09'] = 0;
          this.turbina.model['X10'] = 0;
          this.turbina.model['X11'] = 0;
          this.turbina.model['X12'] = 0;
          this.turbina.model['X13'] = 0;   


          // za pretražive liste
          this.turbina.s_model['X01'] = 0;
          this.turbina.s_model['X02'] = 0;
          this.turbina.s_model['X03'] = 0;
          this.turbina.s_model['X04'] = 0;
          this.turbina.s_model['X05'] = 0;
          this.turbina.s_model['X06'] = 0;
          this.turbina.s_model['X07'] = 0;
          this.turbina.s_model['X08'] = 0;
          this.turbina.s_model['X09'] = 0;
          this.turbina.s_model['X10'] = 0;
          this.turbina.s_model['X11'] = 0;
          this.turbina.s_model['X12'] = 0;
          this.turbina.s_model['X13'] = 0;
                              },

        isprazniModalPredracun(){
          

       // podaci o predracunu ///////////////////////////////////

          this.predracun.id = null;
          
          this.predracun.broj = '';
          this.predracun.datum = new Date().toISOString().substr(0, 10);
          this.predracun.kupac_id = 0;

                          // polja za pretraživu listu
                          if (this.k_selected){
                              this.k_selected.id     = 0;//this.materijal.mattipoznaka_id;
                              this.k_selected.naziv  = '';
                          }else{
                            this.k_selected = {
                              id:    0,
                              naziv: ''
                            } 
                          }

          this.predracun.nacin_placanja = 1;
          this.predracun.garancija = 0;
          this.predracun.napomena = '-';
          this.predracun.oem            = '';
          this.predracun.oem_cijena     = 0;


          this.predracun.cijena['CW'] = 0;   this.predracun.kolicina['CW'] = 0;   
          this.predracun.cijena['TW'] = 0;   this.predracun.kolicina['TW'] = 0;   
          this.predracun.cijena['BH'] = 0;   this.predracun.kolicina['BH'] = 0;
          this.predracun.cijena['BP'] = 0;   this.predracun.kolicina['BP'] = 0;
          this.predracun.cijena['HS'] = 0;   this.predracun.kolicina['HS'] = 0;
          this.predracun.cijena['AC'] = 0;   this.predracun.kolicina['AC'] = 0;
          this.predracun.cijena['NZ'] = 0;   this.predracun.kolicina['NZ'] = 0;
          this.predracun.cijena['GK'] = 0;   this.predracun.kolicina['GK'] = 0;
          this.predracun.cijena['RK'] = 0;   this.predracun.kolicina['RK'] = 0;
          this.predracun.cijena['TH'] = 0;   this.predracun.kolicina['TH'] = 0;
          this.predracun.cijena['CN'] = 0;   this.predracun.kolicina['CN'] = 0;
        
          this.predracun.cijena['X01'] = 0;  this.predracun.kolicina['X01'] = 0;
          this.predracun.cijena['X02'] = 0;  this.predracun.kolicina['X02'] = 0;
          this.predracun.cijena['X03'] = 0;  this.predracun.kolicina['X03'] = 0;
          this.predracun.cijena['X04'] = 0;  this.predracun.kolicina['X04'] = 0;
          this.predracun.cijena['X05'] = 0;  this.predracun.kolicina['X05'] = 0;
          this.predracun.cijena['X06'] = 0;  this.predracun.kolicina['X06'] = 0;
          this.predracun.cijena['X07'] = 0;  this.predracun.kolicina['X07'] = 0;
          this.predracun.cijena['X08'] = 0;  this.predracun.kolicina['X08'] = 0;
          this.predracun.cijena['X09'] = 0;  this.predracun.kolicina['X09'] = 0;
          this.predracun.cijena['X10'] = 0;  this.predracun.kolicina['X10'] = 0;
          this.predracun.cijena['X11'] = 0;  this.predracun.kolicina['X11'] = 0;
          this.predracun.cijena['X12'] = 0;  this.predracun.kolicina['X12'] = 0;
          this.predracun.cijena['X13'] = 0;  this.predracun.kolicina['X13'] = 0;


          this.predracun.model['CW'] = 0; // turbina.comp_wheel;
          this.predracun.model['TW'] = 0; // turbina.turbine_wheel;
          this.predracun.model['BH'] = 0; // turbina.bearing_housing;
          this.predracun.model['BP'] = 0; // turbina.back_plate; 
          this.predracun.model['HS'] = 0; // turbina.heat_shield; 
          this.predracun.model['AC'] = 0; // turbina.actuator; 
          this.predracun.model['NZ'] = 0; // turbina.noozles;
          this.predracun.model['GK'] = 0; // turbina.gasket_kit;
          this.predracun.model['RK'] = 0; // turbina.repair_kit;
          this.predracun.model['TH'] = 0; // turbina.turbine_housing;
          this.predracun.model['CN'] = 0; // turbina.chra_no; 

          this.predracun.model['X01'] = 0;
          this.predracun.model['X02'] = 0;
          this.predracun.model['X03'] = 0;
          this.predracun.model['X04'] = 0;
          this.predracun.model['X05'] = 0;
          this.predracun.model['X06'] = 0;
          this.predracun.model['X07'] = 0;
          this.predracun.model['X08'] = 0;
          this.predracun.model['X09'] = 0;
          this.predracun.model['X10'] = 0;
          this.predracun.model['X11'] = 0;
          this.predracun.model['X12'] = 0;
          this.predracun.model['X13'] = 0;
          
          
          
          this.predracun.model_0['CW'] = 0; // turbina.comp_wheel;
          this.predracun.model_0['TW'] = 0; // turbina.turbine_wheel;
          this.predracun.model_0['BH'] = 0; // turbina.bearing_housing;
          this.predracun.model_0['BP'] = 0; // turbina.back_plate; 
          this.predracun.model_0['HS'] = 0; // turbina.heat_shield; 
          this.predracun.model_0['AC'] = 0; // turbina.actuator; 
          this.predracun.model_0['NZ'] = 0; // turbina.noozles;
          this.predracun.model_0['GK'] = 0; // turbina.gasket_kit;
          this.predracun.model_0['RK'] = 0; // turbina.repair_kit;
          this.predracun.model_0['TH'] = 0; // turbina.turbine_housing;
          this.predracun.model_0['CN'] = 0; // turbina.chra_no;           

          this.predracun.model_0['X01'] = 0;
          this.predracun.model_0['X02'] = 0;
          this.predracun.model_0['X03'] = 0;
          this.predracun.model_0['X04'] = 0;
          this.predracun.model_0['X05'] = 0;
          this.predracun.model_0['X06'] = 0;
          this.predracun.model_0['X07'] = 0;
          this.predracun.model_0['X08'] = 0;
          this.predracun.model_0['X09'] = 0;
          this.predracun.model_0['X10'] = 0;
          this.predracun.model_0['X11'] = 0;
          this.predracun.model_0['X12'] = 0;
          this.predracun.model_0['X13'] = 0;


          this.predracun.usluga_cijena           = 0;
          this.predracun.status                  = 0;
          

        },

        zatvoriModal(){
          // sakrij
          $("#izmjenaTurbine").modal("hide");

          this.isprazniModal();
        },

        zatvoriModalPredracun(){
          // sakrij
          $("#dodavanjePredracuna").modal("hide");

          this.isprazniModalPredracun();
        }      



       
    },

    components: {
      VSelectize
    }

}
</script>