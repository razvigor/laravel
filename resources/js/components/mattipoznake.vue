<template>
    <div class="card-body">
          <!-- Button trigger modal -->
          <div class="col-12 text-right mb-2">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#izmjenaMattipoznake" @click="dodajMattipoznaku">
              Dodaj
            </button>
          </div>



          <!-- Modal izmjena oznake materijala - pocetak -->
           
          <div class="modal fade" id="izmjenaMattipoznake" tabindex="-1" role="dialog" aria-labelledby="izmjenaMattipoznake" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 

                          <form  class="form-horizontal" @submit.prevent="snimiMattipoznaku">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                                              
                                <h4 class="card-title" v-if="edit">Izmjena podataka o oznaci materijala</h4>
                                <h4 class="card-title" v-else>Dodavanje nove oznake materijala </h4>

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
                                      
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_tipa_materijala" id="izbor_tipa_materijala" v-model="mattipoznaka.mattip_sifra"  data-style="select-with-transition" title="" data-size="5">
                                        <option disabled value="0">obavezan unos</option>
                                        <option value="700">Presvlaka</option>
                                        <option value="1021">Lak - temeljna</option>
                                        <option value="1020">Lak - bajc</option>
                                        <option value="1025">Lak - završna</option>
                                        
                                      </select>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Oznaka</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="oznaka" v-model="mattipoznaka.oznaka"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Interna šifra</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="internasifra" v-model="mattipoznaka.internasifra"  type="text" placeholder="" value="" required="true" aria-required="true"/>
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

          <!-- Modal izmjena oznake materijala - kraj -->



        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                <thead class="text-warning">
                    <th>
                        Tip materijala
                    </th>
                    <th>
                        Oznaka
                    </th>
                    <th>
                        Interna šifra
                    </th>

                    <th class="text-right">
                        Obrade
                    </th>
                </thead>

                <tbody>
                  <tr class="table-info">
                    <td>
                      <input type="text" v-model="pretraga.naziv_tipa" placeholder="sve tipovi" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.oznaka" placeholder="sve oznake" />
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.internasifra" placeholder="sve interne šifre" />
                    </td>

                    <td class="text-right">
                        
                    </td>


                  </tr>
                    <tr v-for="mattipoznaka in filtriraneOznake" v-bind:key="mattipoznaka.id">
                        <td>
                        {{mattipoznaka.naziv_tipa+(mattipoznaka.mattip_id==10?' - '+mattipoznaka.naziv_podtipa:'')}}
                        </td>
                        <td>
                        {{mattipoznaka.oznaka}}
                        </td>
                        <td>
                        {{mattipoznaka.internasifra}}
                        </td>
                           
                        <td class="td-actions text-right">
                            <!-- Button trigger modal -->
                            
                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniMattipoznaku(mattipoznaka)">
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
export default {
    data() {
        return{


            mattipoznake: [],
            pretraga:{
              naziv_tipa:'',
              oznaka:'',
              internasifra:''

            },


            edit: false,
            //mattipoznaka_id: '',

            mattipoznaka: {
                id: '',
                mattip_id: 7,
                mattip_sifra:'700',
                natpis: 'Kat. ozn.',
                oznaka: '',
                internasifra: ''

            },

        }
    
    },

    computed: {

      filtriraneOznake: function(){
            return this.mattipoznake.filter((mattipoznaka)=> {
                return mattipoznaka.oznaka.toLowerCase().includes(this.pretraga.oznaka.toLowerCase())
                    && mattipoznaka.internasifra.toLowerCase().includes(this.pretraga.internasifra.toLowerCase())
                    && (' '+mattipoznaka.naziv_tipa+' - '+mattipoznaka.naziv_podtipa).toLowerCase().includes(this.pretraga.naziv_tipa.toLowerCase())  
                    && (mattipoznaka.mattip_id==7 || mattipoznaka.mattip_id==10)
                    && mattipoznaka.internasifra!=='0'          
                ;
                
                //vrsta.naziv.match(/this.pretraga/i);
            });
       },

                
        

    },

    created() {

        this.ucitajMattipoznake();
    },

    methods: {

    /// POČETNE POSTAVKE  //////////////////////////////



    /// Oznake materijala  //////////////////////////////

        ucitajMattipoznake(page_url) {
            let vm = this;
            
            page_url = page_url || 'api/mattipoznake'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.mattipoznake=res.data;
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

        dodajMattipoznaku(){
          this.edit = false;

          this.mattipoznaka.id       = null;
          
          //this.mattipoznaka.mattipoznaka_id = mattipoznaka.id;
          
          this.mattipoznaka.mattip_sifra    = '700';
          this.mattipoznaka.natpis          = 'Kat. ozn.';

          this.mattipoznaka.oznaka          = '';
          this.mattipoznaka.internasifra    = '';

          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_tipa_materijala').selectpicker("refresh");
          });



        },

        izmjeniMattipoznaku(mattipoznaka){
          
          
          this.edit=true;
          this.mattipoznaka.id       = mattipoznaka.id;
          
          //this.mattipoznaka.mattipoznaka_id = mattipoznaka.id;
          this.mattipoznaka.mattip_sifra    = mattipoznaka.mattip_id==7?'700':'10'+mattipoznaka.natpis; 
          this.mattipoznaka.mattip_id       = mattipoznaka.mattip_id;
          this.mattipoznaka.natpis          = mattipoznaka.natpis;

          this.mattipoznaka.oznaka          = mattipoznaka.oznaka;
          this.mattipoznaka.internasifra    = mattipoznaka.internasifra;
 

          // prikaži modalni prozor
          $("#izmjenaMattipoznake").modal("show");
          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_tipa_materijala').selectpicker("refresh");
          });
        },

        snimiMattipoznaku(){
          if(this.edit===false){
            // dodaj mattipoznaku 
            fetch('./../../api/mattipoznaka', {
              method: 'post',
              body: JSON.stringify(this.mattipoznaka),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              this.ucitajMattipoznake();
              this.isprazniModal();
              //this.$forceUpdate();

            })
            .catch(err => console.log(err));


           // alert('dodao pa zatvaram');

          }else{
            // izmjeni postojeću mattipoznaku 
              fetch('./../../api/mattipoznaka', {
              method: 'put',
              body: JSON.stringify(this.mattipoznaka),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              
              this.ucitajMattipoznake();
              this.isprazniModal();
              //this.$forceUpdate();
              // sakrij modalni prozor
              //$("#noviElementProizvoda").modal("hide");

            })
            .catch(err => console.log(err));

           // alert('izmjenio mattipoznake  pa zatvaram');

          }
          

          //REinit();
          //this.$forceUpdate();
          //RefreshTable();
          this.zatvoriModal();
          
        },

        isprazniModal(){
          

          this.mattipoznaka.oznaka = '';
          this.mattipoznaka.internasifra = '';

        },

        zatvoriModal(){
          // sakrij
          $("#izmjenaMattipoznake").modal("hide");
        }


    }

}
</script>