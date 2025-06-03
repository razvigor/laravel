<template>
    <div class="card-body">
          <!-- Button trigger modal -->
          <div class="col-12 text-right mb-2">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#izmjenaModela" @click="dodajModel">
              Dodaj
            </button>
          </div>



          <!-- Modal izmjena Modela - pocetak -->
           
          <div class="modal fade" id="izmjenaModela" tabindex="-1" role="dialog" aria-labelledby="izmjenaModela" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 

                          <form  class="form-horizontal" @submit.prevent="snimiModel">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                                              
                                <h4 class="card-title" v-if="edit">Izmjena podataka o modelu</h4>
                                <h4 class="card-title" v-else>Dodavanje novog modela</h4>

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
                                  <label class="col-sm-3 col-form-label">Naziv</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="naziv" v-model="model.naziv"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Vrsta</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      
                                      <v-selectize v-model="v_selected" :options="vrste" key-by="id" label="naziv" :keys="['naziv', 'naziv_2']"/>

                                      <!--
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_statusa_kupca" id="izbor_statusa_kupca" v-model="kupac.status" data-style="select-with-transition" title="" data-size="5">
                                        
                                        <option  v-for="listValue in statusi" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
                                      </select>
                                      -->

                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label label-checkbox">Aktivan (da/ne)</label>
                                  <div class="col-sm-9 checkbox-radios">
                                    <div class="togglebutton">
                                      <label>
                                        <input type="checkbox" v-model="model.aktivan" value="false">
                                        <span class="toggle"></span>
                                      </label>
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

          <!-- Modal izmjena Modela - kraj -->



        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                <thead class="text-warning">
                    <th>
                        Vrsta
                    </th>
                    <th>
                        Naziv modela
                    </th>
                    <th>
                        Status
                    </th>

                    <th class="text-right">
                        Obrade
                    </th>
                </thead>

                <tbody>
                  <tr class="table-info">
                    <td>
                      <input type="text" v-model="pretraga.naziv_vrste" placeholder="sve vrste" />
                    </td>                    
                    <td>
                      <input type="text" v-model="pretraga.naziv" placeholder="svi modeli" />
                    </td>
                    <td>
                      
                    </td>

                    <td class="text-right">
                        
                    </td>


                  </tr>
                    <tr v-for="model in filtriraniModeli" v-bind:key="model.id">
                        <td>
                        {{model.vrsta_naziv}}
                        </td>
                        <td>
                        {{model.model_naziv}}
                        </td>
                        
                        
                        <td v-bind:class=" model.aktivan == 1 ? 'text-success' : 'text-danger'">
                            <i class="material-icons">{{ model.aktivan == 1 ? 'check_circle' : 'block' }}</i>
                        </td>
                           
                        <td class="td-actions text-right">
                            <!-- Button trigger modal -->
                            
                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniModel(model)">
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
            v_selected: {

              id :1, 
              naziv:'Stolica'
            },

            // promjeniva za izbor iz liste


            vrste: [],

            modeli: [],
            pretraga:{
              naziv_vrste:'',
              naziv:''

            },

            edit: false,

            model: {
                id: '',
                naziv: '',
                vrsta: 1,
                naziv_vrste: 'Stolica',
                aktivan: 0
                

            },

        }
    
    },

    computed: {

      filtriraniModeli: function(){
            return this.modeli.filter((model)=> {
                return model.vrsta_naziv.toLowerCase().includes(this.pretraga.naziv_vrste.toLowerCase())
                    && model.model_naziv.toLowerCase().includes(this.pretraga.naziv.toLowerCase())
                    
                ;
                
            });
       }



    },

    created() {


        this.ucitajVrste();
        this.ucitajModele();
    },

    methods: {

    /// POČETNE POSTAVKE  //////////////////////////////

        ucitajVrste: function() {
          
          axios.get('./../../api/proiztipvrste')
          .then((response)=>{
              this.vrste=response.data.data;
              /* dobijamo:
                 statusi.sifra
                 statusi.opis
              */   
          })
          .catch(function(error){
              console.log(error);
          });
        },



    /// Modeli  //////////////////////////////

        ucitajModele(page_url) {
            let vm = this;
            
            page_url = page_url || 'api/proizvrstamodeli'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.modeli=res.data;
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

        dodajModel(){
          this.edit = false;

        },

        izmjeniModel(model){
          
          this.edit=true;
          
          this.model.id             = model.model_id;
          this.model.naziv          = model.model_naziv;
          this.model.vrsta          = model.vrsta_id;
          this.model.naziv_vrste    = model.vrsta_naziv;
          this.model.aktivan        = model.aktivan;
          /// podaci za pretraživu listu
          this.v_selected.id = model.vrsta_id;
          this.v_selected.naziv  = model.vrsta_naziv;

          // prikaži modalni prozor
          $("#izmjenaModela").modal("show");

        },

        snimiModel(){
          if (!this.v_selected.id){

          } else{
            /// uzimamo vrijednost iz dinamičkog selekta
            this.model.vrsta=this.v_selected.id;

            if(this.edit===false){
              // dodaj kupca
              fetch('./../../api/model', {
                method: 'post',
                body: JSON.stringify(this.model),
                headers: {
                  'content-type': 'application/json'
                }
              })
              .then(response => response.json())
              .then(data => {
                this.ucitajModele();
                this.isprazniModal();

              })
              .catch(err => console.log(err));

            }else{
              // izmjeni postojećeg kupca
                fetch('./../../api/model', {
                method: 'put',
                body: JSON.stringify(this.model),
                headers: {
                  'content-type': 'application/json'
                }
              })
              .then(response => response.json())
              .then(data => {
                
                this.ucitajModele();
                this.isprazniModal();

              })
              .catch(err => console.log(err));

            }

            this.zatvoriModal();
          }
        },

        isprazniModal(){
          
          this.model.id = null; 
          this.model.naziv = '';
          
          this.model.aktivan = 0;

          this.v_selected.id = this.model.vrsta;
          this.v_selected.naziv  = this.model.naziv_vrste;

        },

        zatvoriModal(){
          this.isprazniModal(); //mora biti prije zatvaranja
          // sakrij
          $("#izmjenaModela").modal("hide");
          this.ucitajVrste();
          
        }


    },

    components: {
      VSelectize
    }

}
</script>