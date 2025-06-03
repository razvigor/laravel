<template>
    <div class="card-body">
          <!-- Button trigger modal -->
          <div class="col-12 text-right mb-2">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#izmjenaMaterijala" @click="dodajMaterijal">
              Dodaj
            </button>
          </div>



          <!-- Modal izmjena Materijala - pocetak -->
           
          <div class="modal fade" id="izmjenaMaterijala" tabindex="-1" role="dialog" aria-labelledby="izmjenaMaterijala" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 

                          <form  class="form-horizontal" @submit.prevent="snimiMaterijal">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                                              
                                <h4 class="card-title" v-if="edit">Izmjena podataka o materijalu</h4>
                                <h4 class="card-title" v-else>Dodavanje novog  materijala</h4>

                              </div>
                              <div class="card-body ">
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <button type="button" id="btn-zatvori-modal-a"  class="btn btn-warning" @click="zatvoriModal()">
                                      Odustani
                                    </button>

                                  </div>
                                </div>

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Tip materijala</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_tipa_materijala" id="izbor_tipa_materijala" v-model="materijal.mattip_id" @change="promjena_mattip_id" data-style="select-with-transition" title="" data-size="5">
                                        <option disabled value="0">obavezan unos</option>
                                        <option  v-for="listValue in mattipovi" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.naziv}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div> 
                                
                                <div class="row">
                                <label class="col-sm-3 col-form-label">Vrsta materijala</label>
                                <div class="col-sm-7">
                                  <div class="form-group has-danger">
                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_vrste_materijala" id="izbor_vrste_materijala" v-model="materijal.mattipvrsta_id" @change="promjena_mattipvrsta_id" data-style="select-with-transition" title="" data-size="5">
                                      <option value="0" disabled>obavezan unos</option>
                                      <option  v-for="listValue in mattipvrste" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                              {{listValue.naziv}}
                                      </option>
                                    </select>
                                  </div>
                                </div>
                                </div>
                                  
                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Dodatni opis (neobavezno)</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="dodatni_opis" v-model="materijal.dodatni_opis" v-on:keyup="promjena_dodatnog_opisa" type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Naziv</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control disabled" name="slozeni_naziv" v-model="materijal.slozeni_naziv"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row" v-show="materijal.mattip_id == 11">
                                  <label class="col-sm-3 col-form-label">Vrsta podloge</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_vrste_podloge" id="izbor_vrste_podloge" v-model="materijal.vrsta_podloge" @change="promjena_vrste_podloge" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in vrste_podloge" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>



                                <div class="row" v-show="materijal.mattip_id == 9">
                                  <label class="col-sm-3 col-form-label">Proizvođač</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_proizvodjaca" id="izbor_proizvodjaca" v-model="materijal.proizvodjac" @change="promjena_proizvodjaca" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in proizvodjaci" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <!--namijenjeno na 4 tipa ali postepeno se odustalo od svih (tip=0)-->
                                <div class="row" v-show="materijal.mattip_id == 0">
                                  <label class="col-sm-3 col-form-label">Namjena</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_namjene" id="izbor_namjene" v-model="materijal.namjena" @change="promjena_namjene" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in namjene" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 4">
                                  <label class="col-sm-3 col-form-label">Forma/oblik</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_forme_oblika" id="izbor_forme_oblika" v-model="materijal.forma_oblik" @change="promjena_forme_oblika" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in forme_oblici" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 5">
                                  <label class="col-sm-3 col-form-label">Specifična težina (kg/m2)</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_sp_tezine" id="izbor_sp_tezine" v-model="materijal.sp_tezina" @change="promjena_sp_tezine" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in sp_tezine" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 6">
                                  <label class="col-sm-3 col-form-label">Gustina (kg/m3)</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_gustine" id="izbor_gustine" v-model="materijal.gustina" @change="promjena_gustine" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in gustine" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 6">
                                  <label class="col-sm-3 col-form-label">Tvrdoća</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_tvrdoce" id="izbor_tvrdoce" v-model="materijal.tvrdoca" @change="promjena_tvrdoce" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in tvrdoce" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 1 ||
                                                         materijal.mattip_id == 2 ||
                                                         materijal.mattip_id == 4 ||
                                                         materijal.mattip_id == 5 ||
                                                         materijal.mattip_id == 6 
                                                         ">
                                  <label class="col-sm-3 col-form-label">Klasa</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_klase" id="izbor_klase" v-model="materijal.klasa" @change="promjena_klase" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in klase" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 3">
                                  <label class="col-sm-3 col-form-label">Broj linija</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_broja_linija" id="izbor_broja_linija" v-model="materijal.br_linija" @change="promjena_broja_linija" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in brojevi_linija" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 4">
                                  <label class="col-sm-3 col-form-label">Broj slojeva / debljina</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_broja_slojeva" id="izbor_broja_slojeva" v-model="materijal.br_slojeva" @change="promjena_broja_slojeva" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in brojevi_slojeva" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 1 ||
                                                         materijal.mattip_id == 2 ||
                                                         materijal.mattip_id == 5
                                                         ">
                                  <label class="col-sm-3 col-form-label">Debljina (mm)</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_debljine" id="izbor_debljine" v-model="materijal.debljina" @change="promjena_debljine" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in debljine" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 3">
                                <label class="col-sm-3 col-form-label">Širina (mm)</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0"  name="izbor_sirine" id="izbor_sirine" v-model="materijal.sirina" @change="promjena_sirine" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in sirine" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 1">
                                  <label class="col-sm-3 col-form-label">Dužinski razred (mm)</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_duz_razreda" id="izbor_duz_razreda" v-model="materijal.duz_razred" @change="promjena_duz_razreda" data-style="select-with-transition" title="" data-size="5">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in duz_razredi" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <div class="row" v-show="materijal.mattip_id == 7 ||
                                                         
                                                         materijal.mattip_id == 10">
                                  <label class="col-sm-3 col-form-label">Oznaka/boja</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_mattipoznaka_id" id="izbor_mattipoznaka_id" v-model="materijal.mattipoznaka_id" @change="promjena_mattipoznaka_id" data-style="select-with-transition" title="" data-size="7">
                                        <option value="0" disabled>obavezan unos</option>
                                        <option  v-for="listValue in mattipoznake_t" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{materijal.mattip_id == 7 ? listValue.natpis+': ' : ''}}{{listValue.oznaka}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div>                                

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Cijena (KM/{{materijal.jed_mjere}})</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.cijena"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab01 && materijal.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab01}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.kmat_01"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed01}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab02 && materijal.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab02}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.kmat_02"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed02}}</label>
                                </div> 



                                <div class="row" v-show="koeficijenti_tipa.klab03 && materijal.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab03}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.kmat_03"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed03}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab04 && materijal.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab04}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.kmat_04"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed04}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab05 && materijal.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab05}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.kmat_05"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed05}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab06 && materijal.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab06}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.kmat_06"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed06}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab07 && materijal.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab07}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="materijal.kmat_07"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed07}}</label>
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

          <!-- Modal izmjena Materijala - kraj -->



        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                <thead class="text-warning">
                    <th>
                        Tip
                    </th>
                    <th>
                        Vrsta
                    </th>
                    <th>
                        Naziv
                    </th>
                    <th class="text-right">
                        Cijena <br>(KM/jm)
                    </th>

                    <th class="text-right">
                        Obrade
                    </th>
                </thead>

                <tbody>
                  <tr class="table-info">
                    <td>
                      <input type="text" v-model="pretraga.tip" placeholder="svi tipovi" />
                        
                    </td>
                    <td>
                        
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.naziv" placeholder="svi nazivi" />
                    </td>
                    <td class="text-right">
                    
                    </td>

                    <td class="text-right">
                                           
                        
                    </td>


                  </tr>
                    <tr v-for="materijal in filtriraniMaterijali" v-bind:key="materijal.id">
                        <td>
                        {{materijal.naziv_tipa}}
                        </td>
                        <td>
                        {{materijal.naziv_vrste}}
                        </td>
                        <td>
                        {{materijal.naziv}}
                        </td>

                        <td class="text-right">
                        {{materijal.cijena}}
                        </td>
                            
                        <td class="td-actions text-right">
                            <!-- Button trigger modal -->
                            
                            <!-- Button trigger modal / staro
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal_index" data-backdrop="static" data-keyboard="false">
                                <i class="material-icons">edit</i>
                                </button>
                            Button trigger modal / staro -->

                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniMaterijal(materijal)">
                            <i class="material-icons">edit</i>
                                            
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    <!-- paginacija- start -->
    <!--
      <div class="col-12 text-right">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">

                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" 
                class="page-item"><a class="page-link" href="#"
                @click="ucitajMaterijale(pagination.first_page_url)">&lt;&lt;</a></li>

                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" 
                class="page-item"><a class="page-link" href="#"
                @click="ucitajMaterijale(pagination.prev_page_url)">&lt;</a></li>


                <li class="page-item disabled"><a class="page-link  text-dark" href="#">
                    Strana {{pagination.current_page}} od {{pagination.last_page}}
                    </a>
                </li>


                <li v-bind:class="[{disabled: !pagination.next_page_url}]" 
                class="page-item"><a class="page-link" href="#"
                @click="ucitajMaterijale(pagination.next_page_url)">&gt;</a></li>

                <li v-bind:class="[{disabled: !pagination.last_page_url}]" 
                class="page-item"><a class="page-link" href="#"
                @click="ucitajMaterijale(pagination.last_page_url)">&gt;&gt;</a></li>
            </ul>
        </nav>   
      </div> 
                         -->
    <!-- paginacija kraj -->

    </div>
</template>

<script>
export default {
    data() {
        return{
            mattipovi: [],
            mattipvrste: [],
            materijali: [],
            pretraga:{
              tip:'',
              naziv:''

            },

            pagination: {},
            edit: false,
            materijal_id: '',

            materijal: {
                id: '',
                mattip_id: 0,
                mattipvrsta_id: 0,
                naziv: '',         // ne koristi se

                dodatni_opis:'',           //  ulazi u složeni naziv ako ga ima
                slozeni_naziv: '',         //  koristi se umjesto naziv

                vrsta_podloge: 0,
                vrsta_okova: '',
                proizvodjac: 0,
                namjena: 0,
                forma_oblik: 0,
                sp_tezina: 0,
                gustina: 0,
                tvrdoca: 0,

                klasa: 0,
                br_linija: 0,
                br_slojeva: 0,
                debljina: 0,
                sirina: 0,

                duz_razred: 0,
                mattipoznaka_id: 0,
                matipoznaka_id:0,

                cijena: 0,

                //koef1: '',
                kmat_01: 0, 
                kmat_02: 0, 
                kmat_03: 0, 
                kmat_04: 0, 
                kmat_05: 0, 
                kmat_06: 0, 
                kmat_07: 0 

            },

            koeficijenti_tipa: [],
            opcije_u_listama: [],
            mattipoznake: []

        }
    
    },

    computed: {

      filtriraniMaterijali: function(){
            return this.materijali.filter((materijal)=> {
                return materijal.naziv_tipa.toLowerCase().includes(this.pretraga.tip.toLowerCase())
                    && materijal.naziv.toLowerCase().includes(this.pretraga.naziv.toLowerCase())
                ;
                
                //vrsta.naziv.match(/this.pretraga/i);
            });
       },

      vrste_podloge: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='vrsta_podloge' 
        })
      },

      proizvodjaci: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='proizvodjac' 
        })
      },

      namjene: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='namjena' 
        })
      },

      forme_oblici: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='forma_oblik' 
        })
      },

      sp_tezine: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='sp_tezina' 
        })
      },

      gustine: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='gustina' 
        })
      },

      tvrdoce: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='tvrdoca' 
        })
      },

      klase: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='klasa' 
        })
      },
 
      brojevi_linija: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='br_linija' 
        })
      },

      brojevi_slojeva: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='br_slojeva' 
        })
      },

      debljine: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='debljina' 
        })
      },

      sirine: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='sirina' 
        })
      },

      duz_razredi: function () {
        var tip;
        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }
        return this.opcije_u_listama.filter(function (opcija) {
          return opcija.mattip_id === tip  && opcija.polje ==='duz_razred' 
        })
      },   
      
      mattipoznake_t: function () {
        var tip;
        var vrsta;

        if (this.materijal.mattip_id!==0) {
          tip=this.materijal.mattip_id;
        }else{
          tip=1;  /// ako nije definisan stavi 1 da ne puca 
        }

        if (this.materijal.mattipvrsta_id!==0) {
          vrsta=''+this.materijal.mattipvrsta_id;
        }else{
          vrsta='1';  /// ako nije definisan stavi 1 da ne puca 
        }

//alert('aa'+vrsta+'bb');
        return this.mattipoznake.filter(function (opcija) {
          if (tip!==10){
           
              return opcija.mattip_id === tip
          }else{

              return opcija.natpis===vrsta
              
          }
        })
      }    

    },

    created() {

        this.ucitajOpcijeUListama();
        this.ucitajMattipove();
        this.ucitajMattipoznake();
        this.ucitajMaterijale();
    },

    methods: {

    /// POČETNE POSTAVKE  //////////////////////////////
        ucitajOpcijeUListama: function() {
          axios.get('./../../api/configsifre_t/materijali')
          .then((response)=>{
              this.opcije_u_listama=response.data; /// ima jedan data manje
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

        ucitajMattipoznake: function() {
        //prikaži sve materijale tipa         
              axios.get('./../../api/mattipoznake')
              .then((response)=>{
                  this.mattipoznake=response.data.data;
              })
              .catch(function(error){
                  console.log(error);
              });

        },

    /// MATERIJALI  //////////////////////////////

        ucitajMaterijale(page_url) {
            let vm = this;
            
            page_url = page_url || 'api/materijali'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.materijali=res.data;
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

        dodajMaterijal(){
          this.edit = false;
          this.materijal.id = null; 
          this.materijal.mattip_id = 0;
          this.materijal.mattipvrsta_id = 0;
          this.materijal.naziv ='-';
          this.materijal.dodatni_opis='';
          this.materijal.slozeni_naziv ='_';

          this.materijal.vrsta_podloge = 0;
          //this.materijal.vrsta_okova = '-';
          this.materijal.proizvodjac = 0; 
          this.materijal.namjena = 0; 
          this.materijal.forma_oblik = 0; 

          this.materijal.sp_tezina = 0; 
          this.materijal.gustina = 0; 
          this.materijal.tvrdoca = 0;                               

          this.materijal.klasa = 0;
          this.materijal.br_linija = 0;
          this.materijal.br_slojeva = 0;           
          this.materijal.debljina = 0;
          this.materijal.sirina = 0;
          this.materijal.duz_razred = 0;  
          this.materijal.mattipoznaka_id = 0; 

          this.materijal.cijena = 0;  


          //this.materijal.koef1 = 0;
          this.materijal.kmat_01 =0; 
          this.materijal.kmat_02 =0; 
          this.materijal.kmat_03 =0; 
          this.materijal.kmat_04 =0; 
          this.materijal.kmat_05 =0; 
          this.materijal.kmat_06 =0; 
          this.materijal.kmat_07 =0;    
          // dugme dodaj otvara prozor pa ovo ne treba:
          //$("#izmjenaVrste").modal("show");


          // prikaži modalni prozor
          // ovde NE TREBA jer to radi dugme
          //$("#izmjenaVrste").modal("show");

          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_tipa_materijala').selectpicker("refresh");
            $('#izbor_vrste_materijala').selectpicker("refresh");

            // a sad za svaku listu opcija osobina
            $('#izbor_vrste_podloge').selectpicker("refresh");
            $('#izbor_proizvodjaca').selectpicker("refresh");
            $('#izbor_namjene').selectpicker("refresh");             
            $('#izbor_forme_oblika').selectpicker("refresh"); 
            
            $('#izbor_sp_tezine').selectpicker("refresh");
            $('#izbor_gustine').selectpicker("refresh");  
            $('#izbor_tvrdoce').selectpicker("refresh");       

            $('#izbor_klase').selectpicker("refresh");
            $('#izbor_broja_linija').selectpicker("refresh");
            $('#izbor_broja_slojeva').selectpicker("refresh");             
            $('#izbor_debljine').selectpicker("refresh");
            $('#izbor_sirine').selectpicker("refresh");
            $('#izbor_duz_razreda').selectpicker("refresh");           
            $('#izbor_mattipoznaka_id').selectpicker("refresh");      

          });

        },

        izmjeniMaterijal(materijal){
          
          
          this.edit=true;
          this.materijal.id=materijal.id;
          
          this.materijal.materijal_id=materijal.id;
          
           
          this.materijal.mattip_id      = materijal.mattip_id;
          this.ucitajListuKoeficijenata();
          this.ucitajMattipvrste();

          this.materijal.mattipvrsta_id = materijal.mattipvrsta_id; 
          this.materijal.jed_mjere      = materijal.jed_mjere; 
          this.materijal.naziv          = materijal.naziv;
          this.materijal.dodatni_opis   = materijal.dodatni_opis;
          this.materijal.slozeni_naziv  = materijal.slozeni_naziv;   /// pripremljen u materijaliRES


          this.materijal.vrsta_podloge  = materijal.vrsta_podloge;
          //this.materijal.vrsta_okova    = materijal.vrsta_okova;
          this.materijal.proizvodjac    = materijal.proizvodjac;     
          this.materijal.namjena        = materijal.namjena;      
          this.materijal.forma_oblik    = materijal.forma_oblik;  

          this.materijal.sp_tezina      = materijal.sp_tezina; 
          this.materijal.gustina        = materijal.gustina; 
          this.materijal.tvrdoca        = materijal.tvrdoca;  

          this.materijal.klasa          = materijal.klasa;     
          this.materijal.br_linija      = materijal.br_linija;
          this.materijal.br_slojeva     = materijal.br_slojeva;          
          this.materijal.debljina       = materijal.debljina;
          this.materijal.sirina         = materijal.sirina;
          this.materijal.duz_razred     = materijal.duz_razred;   

          this.materijal.mattipoznaka_id = materijal.mattipoznaka_id; 

          this.materijal.cijena         = materijal.cijena;  
      
          
          //this.materijal.koef1 = materijal.koef1;
          this.materijal.kmat_01 = materijal.kmat_01; 
          this.materijal.kmat_02 = materijal.kmat_02; 
          this.materijal.kmat_03 = materijal.kmat_03; 
          this.materijal.kmat_04 = materijal.kmat_04; 
          this.materijal.kmat_05 = materijal.kmat_05; 
          this.materijal.kmat_06 = materijal.kmat_06; 
          this.materijal.kmat_07 = materijal.kmat_07;  

          // prikaži modalni prozor
          $("#izmjenaMaterijala").modal("show");

          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_tipa_materijala').selectpicker("refresh");
            $('#izbor_vrste_materijala').selectpicker("refresh");
            
            // a sad za svaku listu opcija osobina
            $('#izbor_vrste_podloge').selectpicker("refresh");
            $('#izbor_proizvodjaca').selectpicker("refresh");
            $('#izbor_namjene').selectpicker("refresh");             
            $('#izbor_forme_oblika').selectpicker("refresh");
            
            $('#izbor_sp_tezine').selectpicker("refresh");
            $('#izbor_gustine').selectpicker("refresh");  
            $('#izbor_tvrdoce').selectpicker("refresh");                   

            $('#izbor_klase').selectpicker("refresh");
            $('#izbor_broja_linija').selectpicker("refresh");
            $('#izbor_broja_slojeva').selectpicker("refresh");             
            $('#izbor_debljine').selectpicker("refresh");
            $('#izbor_sirine').selectpicker("refresh");
            $('#izbor_duz_razreda').selectpicker("refresh");
            $('#izbor_mattipoznaka_id').selectpicker("refresh");            
            
          });
        },

            ucitajListuKoeficijenata: function() {

            //alert('citam koeficijente za:'+this.vrsta.mattip_id);       
                  
                axios.get('./../../api/koeficijenti_tipa/'+this.materijal.mattip_id)
                .then((response)=>{
                    
                    console.log(response); 
                    this.koeficijenti_tipa=response.data.data;
                    this.$forceUpdate();
                })
                .catch(function(error){
                    console.log(error);
                });
            },

            ucitajMattipvrste: function() {
            //prikaži sve materijale tipa         
                  axios.get('./../../api/mattipvrste_t/'+this.materijal.mattip_id)
                  .then((response)=>{
                      this.mattipvrste=response.data.data;
                      this.$nextTick(function(){ 
                        $('#izbor_vrste_materijala').selectpicker("refresh");


                      });
                  })
                  .catch(function(error){
                      console.log(error);
                  });

            },

        snimiMaterijal(){
          if(this.edit===false){
            // dodaj vrstu
            fetch('./../../api/materijal', {
              method: 'post',
              body: JSON.stringify(this.materijal),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              this.ucitajMaterijale();
              this.isprazniModal();
              //this.$forceUpdate();

            })
            .catch(err => console.log(err));


           // alert('dodao pa zatvaram');

          }else{
            // izmjeni postojeći materijal
              fetch('./../../api/materijal', {
              method: 'put',
              body: JSON.stringify(this.materijal),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              
              this.ucitajMaterijale();
              this.isprazniModal();
              //this.$forceUpdate();
              // sakrij modalni prozor
              //$("#noviElementProizvoda").modal("hide");

            })
            .catch(err => console.log(err));

           // alert('izmjenio materijal pa zatvaram');

          }
          

          //REinit();
          //this.$forceUpdate();
          //RefreshTable();
          this.zatvoriModal();
          
        },

        isprazniModal(){
          
          this.materijal.id = 0; 
          this.materijal.mattip_id = 0;
          this.materijal.mattipvrsta_id = 0;
          this.materijal.naziv ='-';

          this.materijal.vrsta_podloge =0;
          this.materijal.vrsta_okova = '-';
          this.materijal.proizvodjac = 0; 
          this.materijal.namjena = 0; 
          this.materijal.forma_oblik = 0; 

          this.materijal.sp_tezina = 0; 
          this.materijal.gustina = 0; 
          this.materijal.tvrdoca = 0;  

          this.materijal.klasa =0;
          this.materijal.br_linija =0;
          this.materijal.br_slojeva = 0; 
          this.materijal.debljina =0;
          this.materijal.sirina =0;                    
          this.materijal.duz_razred =0;

          this.materijal.mattipoznaka_id=0;

        },

        zatvoriModal(){
          // sakrij
          $("#izmjenaMaterijala").modal("hide");
        },

    /// MATERIJALI - pomoćne funkcije //////////////////////////////

    /// izvršava se pri promjeni TIPA materijala u listi
        promjena_mattip_id: function(){
          
          this.ucitajListuKoeficijenata();
          this.ucitajMattipvrste();
          this.$nextTick(function(){ 
            $('#izbor_tipa_materijala').selectpicker("refresh");
            $('#izbor_vrste_materijala').selectpicker("refresh");


            $('#izbor_vrste_podloge').selectpicker("refresh");
            $('#izbor_proizvodjaca').selectpicker("refresh");
            $('#izbor_namjene').selectpicker("refresh");             
            $('#izbor_forme_oblika').selectpicker("refresh");

            $('#izbor_sp_tezine').selectpicker("refresh");
            $('#izbor_gustine').selectpicker("refresh");  
            $('#izbor_tvrdoce').selectpicker("refresh");                                        
            
            $('#izbor_klase').selectpicker("refresh");
            $('#izbor_broja_linija').selectpicker("refresh");
            $('#izbor_broja_slojeva').selectpicker("refresh");             
            $('#izbor_debljine').selectpicker("refresh");
            $('#izbor_sirine').selectpicker("refresh");
            $('#izbor_duz_razreda').selectpicker("refresh");
            $('#izbor_mattipoznaka_id').selectpicker("refresh");      

           
          });
          
          this.f_azuriraj_slozeni_naziv();        

        },

    /// izvršava se pri promjeni VRSTE materijala u listi
        promjena_mattipvrsta_id: function(){
          
          this.f_azuriraj_slozeni_naziv(); 

          // pronađi podatke izabrane vrste
          var myStringArray = this.mattipvrste;
          var arrayLength = myStringArray.length;
          var izabrana_vrsta;
          for (var i = 0; i < arrayLength; i++) {
            if (myStringArray[i].id==this.materijal.mattipvrsta_id){
              izabrana_vrsta=myStringArray[i];
            }
              //console.log(myStringArray[i]);
          }
          
          // promijeni jedinicu mjere zavisno od vrste
          this.materijal.jed_mjere=izabrana_vrsta.jed_mjere;//'doraditi';

          // promijeni i koeficijente zavisno od vrste
          this.materijal.kmat_01 =izabrana_vrsta.k_vm_01; 
          this.materijal.kmat_02 =izabrana_vrsta.k_vm_02; 
          this.materijal.kmat_03 =izabrana_vrsta.k_vm_03; 
          this.materijal.kmat_04 =izabrana_vrsta.k_vm_04; 
          this.materijal.kmat_05 =izabrana_vrsta.k_vm_05; 
          this.materijal.kmat_06 =izabrana_vrsta.k_vm_06; 
          this.materijal.kmat_07 =izabrana_vrsta.k_vm_07;  
          
          this.$nextTick(function(){ 
            $('#izbor_mattipoznaka_id').selectpicker("refresh"); 
          }); 
        },

    /// izvršava se pri promjeni TIPA,VRSTE ili OSOBINE materijala u listi
        f_azuriraj_slozeni_naziv: function() {
            var v_naziv;
            
            v_naziv=$("#izbor_tipa_materijala option:selected").text().trim();
            
            if (this.materijal.mattipvrsta_id!=0){
              v_naziv = v_naziv + ', '+$("#izbor_vrste_materijala option:selected").text().trim();



            }

            if (this.materijal.dodatni_opis!==''){
                v_naziv=v_naziv + ', '+this.materijal.dodatni_opis;
            }

            if (this.materijal.vrsta_podloge!=0){
              v_naziv = v_naziv + ', '+$("#izbor_vrste_podloge option:selected").text().trim();
            }  
            if (this.materijal.proizvodjac!=0){
              v_naziv = v_naziv + ', '+$("#izbor_proizvodjaca option:selected").text().trim();            
            }
            if (this.materijal.namjena!=0){
              v_naziv = v_naziv + ', '+$("#izbor_namjene option:selected").text().trim();            
            }
            if (this.materijal.forma_oblik!=0){
              v_naziv = v_naziv + ', '+$("#izbor_forme_oblika option:selected").text().trim();            
            }

            if (this.materijal.sp_tezina!=0){
              v_naziv = v_naziv + ', '+$("#izbor_sp_tezine option:selected").text().trim();            
            }
            if (this.materijal.gustina!=0){
              v_naziv = v_naziv + ', '+$("#izbor_gustine option:selected").text().trim();            
            }            
            if (this.materijal.tvrdoca!=0){
              v_naziv = v_naziv + ', '+$("#izbor_tvrdoce option:selected").text().trim();            
            }



            if (this.materijal.klasa!=0){
              v_naziv = v_naziv + ', '+$("#izbor_klase option:selected").text().trim();
            }
            if (this.materijal.br_linija!=0){
              v_naziv = v_naziv + ', '+$("#izbor_broja_linija option:selected").text().trim();
            }
            if (this.materijal.br_slojeva!=0){
              v_naziv = v_naziv + ', '+$("#izbor_broja_slojeva option:selected").text().trim();
            }            
            if (this.materijal.debljina!=0){
              v_naziv = v_naziv + ', '+$("#izbor_debljine option:selected").text().trim();
            }
            if (this.materijal.sirina!=0){
              v_naziv = v_naziv + ', '+$("#izbor_sirine option:selected").text().trim();
            }            
            if (this.materijal.duz_razred!=0){
              v_naziv = v_naziv + ', '+$("#izbor_duz_razreda option:selected").text().trim();
            }

            if (this.materijal.mattipoznaka_id!=0){
              v_naziv = v_naziv + ', '+$("#izbor_mattipoznaka_id option:selected").text().trim();
            }
            ;


            //alert(this.materijal.klasa);
            //alert(v_naziv);
            
            this.materijal.slozeni_naziv=v_naziv;

        },

           // promjene složenog naziva materijala ///////////////////////
              promjena_dodatnog_opisa: function(){
                this.f_azuriraj_slozeni_naziv();
              },
              
              promjena_vrste_podloge: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_proizvodjaca: function(){
                this.f_azuriraj_slozeni_naziv();
              },
            
              promjena_namjene: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_forme_oblika: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_sp_tezine: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_gustine: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_tvrdoce: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_klase: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_broja_linija: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_broja_slojeva: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_debljine: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_sirine: function(){
                this.f_azuriraj_slozeni_naziv();
              },

              promjena_duz_razreda: function(){
                this.f_azuriraj_slozeni_naziv();
              },  
              
              promjena_mattipoznaka_id: function(){
                this.f_azuriraj_slozeni_naziv();
              },   

           // promjene složenog naziva materijala ///////////////////////////////
       
    }

}
</script>