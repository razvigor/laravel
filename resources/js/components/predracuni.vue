<template>
    <div class="card-body" style="min-height: 2000px;">

          <!-- Modal izmjena Predracuna - pocetak   modal-dialog-scrollable    modal-lg-->
           
          <div class="modal fade"  style="position:absolute; overflow-y:scroll;" 
          id="izmjenaPredracuna" tabindex="-1" role="dialog" aria-labelledby="izmjenaPredracuna" aria-hidden="true"  data-backdrop="true" data-keyboard="false">
            <div class="modal-dialog"  role="document" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 
                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-text">

                                <div class="card-text">
                                  <h4 class="card-title">Izmjena predračuna br.: {{predracun.broj}} </h4>
                                </div>
                                                              
                                <div class="row">
                                  <div v-if="predracun.status==1" class="col-12 text-right">
                                    <button type="button" class="btn btn-success" @click="racun_PDF(predracun.id, 'PR')">
                                      Račun - PDF
                                    </button>
                                    <button type="button" class="btn btn-danger" @click="racun_PDF(predracun.id, 'G')">
                                      Garancija - PDF
                                    </button>                                       
                                    <button type="button" id="btn-zatvori-modal-a"  class="btn btn-warning" @click="zatvoriModal()">
                                      Nazad
                                    </button>                                  
                                  </div>
                                  <div v-else class="col-12 text-right">
                                    <button type="button" class="btn btn-light" @click="racun_PDF(predracun.id, 'PR')">
                                      Predračun - PDF
                                    </button>
                                    <button type="button" id="btn-zatvori-modal-a"  class="btn btn-warning" @click="zatvoriModal()">
                                      Nazad
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
                                                                  <input class="form-control" name="broj" v-model="predracun.broj" type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Datum</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="datum" v-model="predracun.datum" type="date" placeholder="" value=""/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-3 col-form-label">Kupac</label>
                                                              <div class="col-sm-4">
                                                                <div class="form-group has-danger">
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_kupca" id="izbor_kupca" v-model="predracun.kupac_id"  data-style="select-with-transition" title="" data-size="5">
                                                                    <option  v-for="listValue in kupci" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                            {{listValue.naziv}}
                                                                    </option>
                                                                    </select>   
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
                                                              <label class="col-sm-3 col-form-label"></label>
                                                              <div class="col-sm-9">
                                                                <div class="form-group has-danger">
                                                                    <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_garancije_el" id="izbor_garancije_el" v-model="predracun.garancija_el"  data-style="select-with-transition" title="" data-size="5">
                                                                    <option value="0">ne vrijedi za elektroniku turbine</option>
                                                                    <option value="1">vrijedi i za elektroniku turbine</option>
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
                                                              <div class="col-sm-3" v-show="predracun.komplet_remont==1">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control  text-center" name="oem_cijena" v-model="predracun.oem_cijena" type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>                                                              
                                                            </div> 

                                                            <div v-show="predracun.komplet_remont==2" v-for="tipoviValue in filtriraniTipoviTurbine()" v-bind:key="tipoviValue.id" v-bind:value="tipoviValue.id" class="row">
                                                              <label class="col-sm-3 col-form-label">{{tipoviValue.naziv_2}}</label>

                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <select required disabled class="selectpicker col-sm-12 pl-0 pr-0" v-bind:id="'izbor_'+tipoviValue.oznaka+'_id'" @change="azuriraj_cijenu(tipoviValue.oznaka, predracun.model[tipoviValue.oznaka])" v-model="predracun.model[tipoviValue.oznaka]" data-style="select-with-transition" title="" data-size="5">
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
                                                                      v-bind:class="[predracun.model[tipoviValue.oznaka]=='0'||predracun.kolicina[tipoviValue.oznaka]==0 ? 'form-control text-center bg-light': 'form-control text-center ']"
                                                                      >
                                                                    {{predracun.model[tipoviValue.oznaka]=='0'?0:dioCijena.cijena*predracun.kolicina[tipoviValue.oznaka]*(100-predracun.rabat)/100}}
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
                                                              <div class="col-sm-3"  v-show="predracun.komplet_remont==2">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control text-center" v-model="predracun.usluga_cijena"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-9 col-form-label">Ukupno bez PDV</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control text-center" v-model="ukupnaCijena" disabled type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 
                                                            <div class="row">
                                                              <label class="col-sm-9 col-form-label">PDV</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control text-center" v-model="PDV" disabled type="text" placeholder="" value="" required="true" aria-required="true"/>
                                                                </div>
                                                              </div>
                                                            </div> 
                                                            <div class="row">
                                                              <label class="col-sm-9 col-form-label">Ukupno sa PDV</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control text-center" v-model="ukupnoSaPDV" disabled type="text" placeholder="" value="" required="true" aria-required="true"/>
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

          <!-- Modal izmjena Predracuna - kraj -->


        <!-- Pregled PREDRAČUNA -->
        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                <thead class="text-warning">
                    <th>
                        Broj
                    </th>
                    <th>
                        Datum
                    </th>
                    <th>
                        Kupac
                    </th>                    
                    <th>
                        OEM
                    </th>                    
                    <th>
                        Usluga
                    </th>                    
                    <th class="text-right bd-2">
                        Iznos
                    </th>                    
                    <th  class="text-center">
                        Status
                    </th>                    

                    <th  class="text-right">
                        Izmjene<br>predračuna
                    </th>
                    <th  class="text-right">
                        Brisanje<br>predračuna
                    </th>      
                </thead>

                <tbody>
                  <tr class="table-info">
                    <td>
                      <input type="text" v-model="pretraga.broj" placeholder="svi" size="12"/>
                    </td>
                    
                    <td>
                      <input type="text" v-model="pretraga.datum_list" placeholder="svi" size="6"/>
                    </td>

                    <td>
                      <input type="text" v-model="pretraga.kupac_naziv" placeholder="svi" size="12"/>
                    </td>
                    
                    <td>
                      <input type="text" v-model="pretraga.oem" placeholder="svi" size="6" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.napomena" placeholder="sve" size="12" />
                    </td>
                    <td>
                    <td class="text-center">
                      <input type="text"   v-model="pretraga.status_naziv" placeholder="svi" size="6" />
                    </td>
                                     
                    <td colspan="2">
                    </td>

                  </tr>



                   <!-- <tr v-for="turbina in filtriraniTurbine" v-bind:key="turbina.id">   -->
                     
                     <tr v-for="predracun in filtriraniPredracuni" v-bind:key="predracun.id">
                        
                        <td>
                        {{predracun.broj}}
                        </td>
                        <td>


                        {{predracun.datum_list}}
                        </td>
                        <td>
                        {{predracun.kupac_naziv}}
                        </td>                         
                        <td>
                        {{predracun.oem}}
                        </td> 
                        <td>
                        {{predracun.komplet_remont==1?'Remont':'Servis'}}
                        </td> 
                        
                        <td class="text-right  bd-2">
                          {{zaokruzi(parseFloat(predracun.ukupna_cijena),2)}} 
                        </td>
                        <td v-bind:class="predracun.status=='0' ? 'bg-warning text-center': predracun.status=='1' ? 'bg-success text-center': 'bg-danger text-center text-white'"> 
                          {{predracun.status_naziv}}
                        </td>                          
                        
                         

                        <td class="td-actions text-right">
                            <!-- Button trigger modal -->
                            
                            <!-- Button trigger modal / staro
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal_index" data-backdrop="static" data-keyboard="false">
                                <i class="material-icons">edit</i>
                                </button>
                            Button trigger modal / staro -->
                            <button type="button" class="btn btn-warning btn-link" data-original-title="" title="" @click="izmjeniPredracun(predracun)">
                            <i class="material-icons">edit</i>
                                            
                            </button>
                        </td>

                        <td class="td-actions text-right">


                          
                            <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" @click="ukloniPredracun(predracun.id)">
                            <i class="material-icons">delete</i>
                                            
                            </button>
                        </td>                                      
                    </tr>
                                 



                </tbody>
            </table>
        </div>


    </div>
</template>

<script>


export default {
    data() {
        return{

            kupci: [],
            turbine: [],
            usluge: [],

            pretraga:{
              broj: '',
              datum_list: '',
              kupac_naziv: '',
              oem: '', 
              napomena: '', 
              status_naziv: ''

            },

            edit: false,
            predracun_id: '',

            turbinadijelovi: [],
            turbinadiotipovi: [],

            predracuni: [],

            predracun: {
                id: '',
                broj: '',
                datum: '',
                kupac_id: 0,
                komplet_remont: 1,
                rabat: 0,
                nacin_placanja: 1,
                garancija: 0,
                garancija_el: 0,
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
                    'CW' :1,
                    'TW' :1,
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

      filtriraniPredracuni: function(){
            return this.predracuni.filter((stavka)=> {
                return stavka.oem.toLowerCase().includes(this.pretraga.oem.toLowerCase())
                    
                    && stavka.broj.toLowerCase().includes(this.pretraga.broj.toLowerCase())
                    && stavka.datum_list.toLowerCase().includes(this.pretraga.datum_list.toLowerCase()) 
                    && stavka.kupac_naziv.toLowerCase().includes(this.pretraga.kupac_naziv.toLowerCase()) 
                    && (stavka.komplet_remont==1?'remont':'servis').includes(this.pretraga.napomena.toLowerCase()) 
                    && stavka.status_naziv.toLowerCase().includes(this.pretraga.status_naziv.toLowerCase()) 

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
      },

      PDV: function(predracun){
                  return this.zaokruzi(parseFloat(this.predracun.ukupna_cijena*0.17), 2);
      },

      ukupnoSaPDV: function(predracun){
                  return this.zaokruzi(parseFloat(this.predracun.ukupna_cijena*1.17), 2);
      }


    },

    created() {
        this.ucitajPredracune();

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
          var y = Math.pow(10, Number(decimals) + 2);
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


// prkazi samo one koji su bili u pocetnom modelu
        filtriraniTipoviTurbine: function(){
              return this.turbinadiotipovi.filter((stavka)=> {
                  return this.predracun.model_0[stavka.oznaka]!=0;//||stavka.dodatni_dijelovi==1;
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
                  return stavka.turbinadiotip_oznaka==oznaka_tipa;
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

     /// Predračuni  //////////////////////////////

        ucitajPredracune(page_url) {
            //let vm = this;
            
            page_url = page_url || 'api/predracuni'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.predracuni=res.data;
                    //vm.makePagination(res.meta, res.links);

                })
                .catch(err => console.log(err));

        },

        izmjeniPredracun(predracun){
          
          
          this.edit=true;
          
          this.predracun.id=predracun.id;
          
          this.predracun.broj = predracun.broj;
          this.predracun.datum = predracun.datum;
          this.predracun.kupac_id = predracun.kupac_id;
          this.predracun.napomena = predracun.napomena;
          this.predracun.nacin_placanja = predracun.nacin_placanja;
          this.predracun.garancija = predracun.garancija;
          this.predracun.garancija_el = predracun.garancija_el;

          this.predracun.komplet_remont = predracun.komplet_remont;

          this.predracun.oem            = predracun.oem;
          this.predracun.oem_cijena     = predracun.oem_cijena;



// modeli ////////////////////////////////////////////////////
                this.predracun.model['CW'] = predracun.CW_id;
                this.predracun.model['TW'] = predracun.TW_id;
                this.predracun.model['BH'] = predracun.BH_id;
                this.predracun.model['BP'] = predracun.BP_id;
                this.predracun.model['HS'] = predracun.HS_id;
                this.predracun.model['AC'] = predracun.AC_id;
                this.predracun.model['NZ'] = predracun.NZ_id;
                this.predracun.model['GK'] = predracun.GK_id;
                this.predracun.model['RK'] = predracun.RK_id;
                this.predracun.model['TH'] = predracun.TH_id;
                this.predracun.model['CN'] = predracun.CN_id;

                this.predracun.model['X01'] = predracun.X01_id;
                this.predracun.model['X02'] = predracun.X02_id;
                this.predracun.model['X03'] = predracun.X03_id;
                this.predracun.model['X04'] = predracun.X04_id;
                this.predracun.model['X05'] = predracun.X05_id;
                this.predracun.model['X06'] = predracun.X06_id;
                this.predracun.model['X07'] = predracun.X07_id;
                this.predracun.model['X08'] = predracun.X08_id;
                this.predracun.model['X09'] = predracun.X09_id;
                this.predracun.model['X10'] = predracun.X10_id;
                this.predracun.model['X11'] = predracun.X11_id;
                this.predracun.model['X12'] = predracun.X12_id;
                this.predracun.model['X13'] = predracun.X13_id;

/// ovo je potrebno da se ne sklone dijelovi kojima se ukine model
                            this.predracun.model_0['CW'] = predracun.CW_id;
                            this.predracun.model_0['TW'] = predracun.TW_id;
                            this.predracun.model_0['BH'] = predracun.BH_id;
                            this.predracun.model_0['BP'] = predracun.BP_id;
                            this.predracun.model_0['HS'] = predracun.HS_id;
                            this.predracun.model_0['AC'] = predracun.AC_id;
                            this.predracun.model_0['NZ'] = predracun.NZ_id;
                            this.predracun.model_0['GK'] = predracun.GK_id;
                            this.predracun.model_0['RK'] = predracun.RK_id;
                            this.predracun.model_0['TH'] = predracun.TH_id;
                            this.predracun.model_0['CN'] = predracun.CN_id;

                            this.predracun.model_0['X01'] = predracun.X01_id;
                            this.predracun.model_0['X02'] = predracun.X02_id;
                            this.predracun.model_0['X03'] = predracun.X03_id;
                            this.predracun.model_0['X04'] = predracun.X04_id;
                            this.predracun.model_0['X05'] = predracun.X05_id;
                            this.predracun.model_0['X06'] = predracun.X06_id;
                            this.predracun.model_0['X07'] = predracun.X07_id;
                            this.predracun.model_0['X08'] = predracun.X08_id;
                            this.predracun.model_0['X09'] = predracun.X09_id;
                            this.predracun.model_0['X10'] = predracun.X10_id;
                            this.predracun.model_0['X11'] = predracun.X11_id;
                            this.predracun.model_0['X12'] = predracun.X12_id;
                            this.predracun.model_0['X13'] = predracun.X13_id;
/// ovo je potrebno da se ne sklone dijelovi kojima se ukine model



// količine //////////////////////////////////////////////////////////
                this.predracun.kolicina['CW'] = predracun.CW_kolicina;
                this.predracun.kolicina['TW'] = predracun.TW_kolicina;
                this.predracun.kolicina['BH'] = predracun.BH_kolicina;
                this.predracun.kolicina['BP'] = predracun.BP_kolicina; 
                this.predracun.kolicina['HS'] = predracun.HS_kolicina; 
                this.predracun.kolicina['AC'] = predracun.AC_kolicina; 
                this.predracun.kolicina['NZ'] = predracun.NZ_kolicina;
                this.predracun.kolicina['GK'] = predracun.GK_kolicina;
                this.predracun.kolicina['RK'] = predracun.RK_kolicina;
                this.predracun.kolicina['TH'] = predracun.TH_kolicina;
                this.predracun.kolicina['CN'] = predracun.CN_kolicina; 

                this.predracun.kolicina['X01'] = predracun.X01_kolicina;
                this.predracun.kolicina['X02'] = predracun.X02_kolicina;
                this.predracun.kolicina['X03'] = predracun.X03_kolicina;
                this.predracun.kolicina['X04'] = predracun.X04_kolicina;
                this.predracun.kolicina['X05'] = predracun.X05_kolicina;
                this.predracun.kolicina['X06'] = predracun.X06_kolicina;
                this.predracun.kolicina['X07'] = predracun.X07_kolicina;
                this.predracun.kolicina['X08'] = predracun.X08_kolicina;
                this.predracun.kolicina['X09'] = predracun.X09_kolicina;
                this.predracun.kolicina['X10'] = predracun.X10_kolicina;
                this.predracun.kolicina['X11'] = predracun.X11_kolicina;
                this.predracun.kolicina['X12'] = predracun.X12_kolicina;
                this.predracun.kolicina['X13'] = predracun.X13_kolicina;


// cijene ////////////////////////////////////////////////////////
                this.predracun.cijena['CW'] = predracun.CW_cijena;   
                this.predracun.cijena['TW'] = predracun.TW_cijena;   
                this.predracun.cijena['BH'] = predracun.BH_cijena;
                this.predracun.cijena['BP'] = predracun.BP_cijena;
                this.predracun.cijena['HS'] = predracun.HS_cijena;
                this.predracun.cijena['AC'] = predracun.AC_cijena;
                this.predracun.cijena['NZ'] = predracun.NZ_cijena;
                this.predracun.cijena['GK'] = predracun.GK_cijena;
                this.predracun.cijena['RK'] = predracun.RK_cijena;
                this.predracun.cijena['TH'] = predracun.TH_cijena;
                this.predracun.cijena['CN'] = predracun.CN_cijena;
             
                this.predracun.cijena['X01'] = predracun.X01_cijena;
                this.predracun.cijena['X02'] = predracun.X02_cijena;
                this.predracun.cijena['X03'] = predracun.X03_cijena;
                this.predracun.cijena['X04'] = predracun.X04_cijena;
                this.predracun.cijena['X05'] = predracun.X05_cijena;
                this.predracun.cijena['X06'] = predracun.X06_cijena;
                this.predracun.cijena['X07'] = predracun.X07_cijena;
                this.predracun.cijena['X08'] = predracun.X08_cijena;
                this.predracun.cijena['X09'] = predracun.X09_cijena;
                this.predracun.cijena['X10'] = predracun.X10_cijena;
                this.predracun.cijena['X11'] = predracun.X11_cijena;
                this.predracun.cijena['X12'] = predracun.X12_cijena;
                this.predracun.cijena['X13'] = predracun.X13_cijena;


          this.predracun.usluga_id          = predracun.usluga_id;
          this.predracun.usluga_cijena      = predracun.oem_cijena; /// ili je upisana ovde ili je nema uopšte (ne ide direktno iz liste)

          this.predracun.status                  = predracun.status;




          // prikaži modalni prozor
          $("#izmjenaPredracuna").modal("show");


  

          //forsiraj prikaz liste
          this.$nextTick(function(){ 

            $('#izbor_statusa').selectpicker("refresh");
            $('#izbor_kupca').selectpicker("refresh");
            $('#izbor_nacina_placanja').selectpicker("refresh");
            $('#izbor_garancije').selectpicker("refresh");
            $('#izbor_garancije_el').selectpicker("refresh");
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


                  if(this.edit===false){
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
                      this.isprazniModal();
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
                      this.isprazniModal();
                      //this.$forceUpdate();
                      // sakrij modalni prozor
                      //$("#noviElementProizvoda").modal("hide");

                    })
                    .catch(err => console.log(err));

                  // alert('izmjenio predračun pa zatvaram');

                  }
                  

                  //REinit();
                  //this.$forceUpdate();
                  //RefreshTable();
                  this.zatvoriModal();
            
        },

        ukloniPredracun(id){
          if(confirm('Da li želite ukloniti predračun?')){
            fetch(`./../../api/predracun/${id}`,{
              method: 'delete'
            })
            .then(response=>response.json())
            .then(data=>{
              //alert('Predračun uklonjen');
              this.ucitajPredracune();
            })
          }
        },

        isprazniModal(){
                    

       // podaci o predracunu ///////////////////////////////////

          this.predracun.id  = null;

          this.predracun.broj = '';
          this.predracun.datum = new Date().toISOString().substr(0, 10);
          this.predracun.kupac_id = 0;
          this.predracun.nacin_placanja = 1;
          this.predracun.garancija = 0;
          this.predracun.garancija_el = 0;
          this.predracun.napomena = '-';
          this.predracun.oem            = '';
          this.predracun.oem_cijena     = 0;

          this.predracun.model['CW'] = 0; this.predracun.cijena['CW'] = 0,  this.predracun.kolicina['CW'] = 0;   
          this.predracun.model['TW'] = 0; this.predracun.cijena['TW'] = 0,  this.predracun.kolicina['TW'] = 0;   
          this.predracun.model['BH'] = 0; this.predracun.cijena['BH'] = 0,  this.predracun.kolicina['BH'] = 0;   
          this.predracun.model['BP'] = 0; this.predracun.cijena['BP'] = 0,  this.predracun.kolicina['BP'] = 0;   
          this.predracun.model['HS'] = 0; this.predracun.cijena['HS'] = 0,  this.predracun.kolicina['HS'] = 0;   
          this.predracun.model['AC'] = 0; this.predracun.cijena['AC'] = 0,  this.predracun.kolicina['AC'] = 0;   
          this.predracun.model['NZ'] = 0; this.predracun.cijena['NZ'] = 0,  this.predracun.kolicina['NZ'] = 0;   
          this.predracun.model['GK'] = 0; this.predracun.cijena['GK'] = 0,  this.predracun.kolicina['GK'] = 0;   
          this.predracun.model['RK'] = 0; this.predracun.cijena['RK'] = 0,  this.predracun.kolicina['RK'] = 0;  
          this.predracun.model['TH'] = 0; this.predracun.cijena['TH'] = 0,  this.predracun.kolicina['TH'] = 0;  
          this.predracun.model['CN'] = 0; this.predracun.cijena['CN'] = 0,  this.predracun.kolicina['CN'] = 0;   

          this.predracun.model['X01'] = 0; this.predracun.cijena['X01'] = 0, this.predracun.kolicina['X01'] = 0,   
          this.predracun.model['X02'] = 0; this.predracun.cijena['X02'] = 0, this.predracun.kolicina['X02'] = 0,   
          this.predracun.model['X03'] = 0; this.predracun.cijena['X03'] = 0, this.predracun.kolicina['X03'] = 0,   
          this.predracun.model['X04'] = 0; this.predracun.cijena['X04'] = 0, this.predracun.kolicina['X04'] = 0,   
          this.predracun.model['X05'] = 0; this.predracun.cijena['X05'] = 0, this.predracun.kolicina['X05'] = 0,   
          this.predracun.model['X06'] = 0; this.predracun.cijena['X06'] = 0, this.predracun.kolicina['X06'] = 0,   
          this.predracun.model['X07'] = 0; this.predracun.cijena['X07'] = 0, this.predracun.kolicina['X07'] = 0,   
          this.predracun.model['X08'] = 0; this.predracun.cijena['X08'] = 0, this.predracun.kolicina['X08'] = 0,   
          this.predracun.model['X09'] = 0; this.predracun.cijena['X09'] = 0, this.predracun.kolicina['X09'] = 0,  
          this.predracun.model['X10'] = 0; this.predracun.cijena['X10'] = 0, this.predracun.kolicina['X10'] = 0,  
          this.predracun.model['X11'] = 0; this.predracun.cijena['X11'] = 0, this.predracun.kolicina['X11'] = 0,  
          this.predracun.model['X12'] = 0; this.predracun.cijena['X12'] = 0, this.predracun.kolicina['X12'] = 0,  
          this.predracun.model['X13'] = 0; this.predracun.cijena['X13'] = 0, this.predracun.kolicina['X13'] = 0, 

          this.predracun.usluga_cijena = 0;         
          this.predracun.status        = 0;

        },

        zatvoriModal(){
          // sakrij
          $("#izmjenaPredracuna").modal("hide");
        },

        racun_PDF(id_dokumenta, tip){
        // tip G-garancija, PR-Predračun/Račun  

         // open the page as popup //
         var page = '../../../api/predracun_pdf/'+id_dokumenta+'/'+tip;
         //var page = '/test_pdf';
         
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=800,height=1200,top=300");
         
         // focus on the popup //
         myWindow.focus();
         


         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
         
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
        
        },      

    



    }


}

</script>

