<template>
 
    <div class="card-body">
          <!-- Button trigger modal -->
          <div class="col-12 text-right mb-2">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#izmjenaVrste" @click="dodajVrstu">
              Dodaj
            </button>
          </div>

          <!-- Polje pretrage -->
          <div class="col-12 text-right mb-2">
            <input type="text" v-model="pretraga" placeholder="pretraga po nazivu" />
          </div>

          <!-- Modal izmjena Analize - pocetak -->
           
          <div class="modal fade" id="izmjenaVrste" tabindex="-1" role="dialog" aria-labelledby="izmjenaVrste" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 

                          <form  class="form-horizontal" @submit.prevent="snimiVrstu">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                
                                <h4 class="card-title">Podaci o vrsti materijala</h4>

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
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_tipa_materijala" id="izbor_tipa_materijala" v-model="vrsta.mattip_id" @change="ucitajListuKoeficijenata" data-style="select-with-transition" title="" data-size="100">
                                        <option disabled value="0">obavezan unos</option>
                                        <option  v-for="listValue in mattipovi" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.naziv}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row" v-show="vrsta.mattip_id==10">
                                  <label class="col-sm-3 col-form-label">Podtip laka</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_dodatnog_izbora" id="izbor_dodatnog_izbora" v-model="vrsta.dodatni_izbor" @change="ucitajListuKoeficijenata" data-style="select-with-transition" title="" data-size="100">
                                        <option value="0">osnovni tip laka</option>
                                        <option value="10">kontakt za temeljni lak</option>
                                        <option value="11">kontakt za završni lak</option>
                                        <option value="20">razređivač</option>
                                        
                                      </select>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Naziv vrste materijala</label>
                                  <div class="col-sm-7 mr-auto">
                                    <div class="form-group has-danger">
                                      <input class="form-control"  v-model="vrsta.naziv" type="text" placeholder="" value=""/>
                                      <!--  READONLY varijanta
                                      <input readonly class="form-control-plaintext"  v-model="vrsta.naziv" type="text" placeholder="" value=""/>
                                      -->
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">jed. mjere</label>
                                  <div class="col-sm-7 mr-auto">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.jed_mjere"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Teh. koef. / Lokacija utroška</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_lokacije" id="izbor_lokacije" v-model="vrsta.lokacija_id"  data-style="select-with-transition" title="" data-size="100">
                                        <option disabled value="0">obavezan unos</option>
                                        <option  v-for="listValue in masinlokacije" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                {{listValue.koef+' / '+listValue.naziv}}
                                        </option>
                                      </select>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab01 && vrsta.dodatni_izbor==0">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab01}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.k_vm_01"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed01}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab02  && vrsta.dodatni_izbor==0">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab02}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.k_vm_02"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed02}}</label>
                                </div> 

                                <div class="row" v-show="this.vrsta.mattip_id==10  && (vrsta.dodatni_izbor==0 || this.vrsta.mattip_id!==10)">
                                  <label class="col-sm-3 col-form-label">Koeficijent trebovanja laka (smole)</label>
                                  <div class="col-sm-2 bg-info">
                                    <div class="form-group has-danger">
                                      <input class="form-control disabled" v-model="koef_treb_lak"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">kg/m2</label>
                                </div> 



                                <div class="row" v-show="koeficijenti_tipa.klab03  && ((vrsta.dodatni_izbor == 10 || vrsta.dodatni_izbor == 11) || this.vrsta.mattip_id!==10)">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab03}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.k_vm_03"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed03}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab04  && ((vrsta.dodatni_izbor == 10 || vrsta.dodatni_izbor == 11) || this.vrsta.mattip_id!==10)">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab04}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.k_vm_04"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed04}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab05  && (vrsta.dodatni_izbor==20 || this.vrsta.mattip_id!==10)">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab05}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.k_vm_05"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed05}}</label>
                                </div> 

                                <div class="row" v-show="koeficijenti_tipa.klab06  && (vrsta.dodatni_izbor==20 || this.vrsta.mattip_id!==10)">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab06}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.k_vm_06"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed06}}</label>
                                </div> 

                                <div class="row" v-if="koeficijenti_tipa.klab07 &&  this.vrsta.mattip_id!==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab07}}</label>
                                  <div class="col-sm-2">
                                    <div class="form-group has-danger">
                                      <input class="form-control" v-model="vrsta.k_vm_07"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div> 
                                  <label class="col-sm-3 mr-auto col-form-label">{{koeficijenti_tipa.kjed07}}</label>
                                </div>   

                                <div class="row" v-show="koeficijenti_tipa.klab07 && vrsta.dodatni_izbor==0 && this.vrsta.mattip_id==10">
                                  <label class="col-sm-3 col-form-label">{{koeficijenti_tipa.klab07}}</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_dodatka" id="izbor_dodatka" v-model="vrsta.k_vm_07"  data-style="select-with-transition" title="" data-size="100">
                                        <option value="0">nema ništa</option>
                                        <option value="1000">kontakt za temeljni</option>
                                        <option value="1020">kontakt za temeljni + razređivač</option>
                                        <option value="1100">kontakt za završni</option>
                                        <option value="1120">kontakt za završni + razređivač</option>
                                        
                                      </select>
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


                
        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                <thead class="text-warning">
                    <th>
                        Naziv
                    </th>
                    <th class="text-center">
                        Jed. mjere
                    </th>
                    <th class="text-center">
                        Tehnološki koeficijent<br>
                        (po mjestu utroška)
                    </th>
                    <th class="text-right">
                        Obrade
                    </th>
                </thead>

                <tbody>
                    <tr v-for="vrsta in filtriraneVrste" v-bind:key="vrsta.id">
                        <td>
                        {{vrsta.naziv}}
                        </td>
                        <td class="text-center">
                        {{vrsta.jed_mjere}}
                        </td>
                        <td class="text-center">
                        {{vrsta.teh_koef}}
                        </td>

                            
                        <td class="td-actions text-right">
                            <!-- Button trigger modal -->
                            
                            <!-- Button trigger modal / staro
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal_index" data-backdrop="static" data-keyboard="false">
                                <i class="material-icons">edit</i>
                                </button>
                            Button trigger modal / staro -->

                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniVrstu(vrsta)">
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
                @click="ucitajVrste(pagination.first_page_url)">&lt;&lt;</a></li>

                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" 
                class="page-item"><a class="page-link" href="#"
                @click="ucitajVrste(pagination.prev_page_url)">&lt;</a></li>


                <li class="page-item disabled"><a class="page-link  text-dark" href="#">
                    Strana {{pagination.current_page}} od {{pagination.last_page}}
                    </a>
                </li>

                <li v-bind:class="[{disabled: !pagination.next_page_url}]" 
                class="page-item"><a class="page-link" href="#"
                @click="ucitajVrste(pagination.next_page_url)">&gt;</a></li>

                <li v-bind:class="[{disabled: !pagination.last_page_url}]" 
                class="page-item"><a class="page-link" href="#"
                @click="ucitajVrste(pagination.last_page_url)">&gt;&gt;</a></li>
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

            masinlokacije: [],
            mattipovi: [],
            vrste: [],
            pretraga: '',
            
            vrsta: {
                id: '',
                mattip_id: '',
                dodatni_izbor:'',
                naziv: '',
                jed_mjere: '',
                lokacija_id: '',
                k_vm_01: '', 
                k_vm_02: '', 
                k_vm_03: '', 
                k_vm_04: '', 
                k_vm_05: '', 
                k_vm_06: '', 
                k_vm_07: '' 


            },

            koeficijenti_tipa: [],

            vrsta_id: '',
            pagination: {},
            edit: false



        }
    
    },

    computed:{

        filtriraneVrste: function(){
            return this.vrste.filter((vrsta)=> {
                return vrsta.naziv.toLowerCase().includes(this.pretraga.toLowerCase());
                
                //vrsta.naziv.match(/this.pretraga/i);
            });
        },

        koef_treb_lak: function () {
             var numb;
             numb=this.vrsta.k_vm_01*this.vrsta.k_vm_02;
             numb=numb.toFixed(3);
             
             return numb;
        },
        
        koef_treb_smjesa: function () {
             
             var numb;
             var k_kontakt;
             var k_razredjivac;


             k_kontakt=Number(this.vrsta.k_vm_03);
             k_razredjivac=Number(this.vrsta.k_vm_05);
             
             //numb=k_kontakt.toFixed(2)+k_razredjivac.toFixed(2);
             /*
             numb=numb.toFixed(2);
             */
             return ((1+ k_kontakt+k_razredjivac)*this.vrsta.k_vm_01*this.vrsta.k_vm_02).toFixed(3);
        }

    },

    created() {
        this.ucitajMasinlokacije();
        this.ucitajMattipove();
        this.ucitajVrste();
    },



    methods: {

        ucitajMasinlokacije: function() {
          axios.get('./../../api/masinlokacije')
          .then((response)=>{
              this.masinlokacije=response.data.data;
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

        ucitajListuKoeficijenata: function() {
        //prikaži sve koeficijente  za tip
        
        //alert('citam koeficijente za:'+this.vrsta.mattip_id);       
              
            axios.get('./../../api/koeficijenti_tipa/'+this.vrsta.mattip_id)
            .then((response)=>{
                
                console.log(response); 
                this.koeficijenti_tipa=response.data.data;
                this.$forceUpdate();
            })
            .catch(function(error){
                console.log(error);
            });
        },

        ucitajVrste(page_url) {
            let vm = this;
            
            page_url = page_url || 'api/mattipvrste'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.vrste=res.data;
                    vm.makePagination(res.meta, res.links);
                                   


                })
                .catch(err => console.log(err));

        },

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



/*
///////// Varijanta bez paginacije //////////////////

        ucitajVrste: function() {
          axios.get('./../../api/mattipvrste')
          .then((response)=>{
              this.vrste='';
              this.vrste=response.data.data;
              this.$forceUpdate();
              //this.element_ed.proizvod_id=document.getElementById("proizvod_id").value;
              //this.element_ed.sklop=false;
              //this.element_ed.id_nadredjenog=0;
console.log(this.vrste);
              
              //$("#noviElementProizvoda").modal('hide');

          })
          .catch(function(error){
              console.log(error);
          });
        },
*/

        dodajVrstu(){
          this.edit = false;
          this.vrsta.id = null; 
          this.vrsta.mattip_id = 0;
          this.vrsta.dodatni_izbor = '0';
          this.vrsta.naziv ='';
          this.vrsta.jed_mjere ='';
          this.vrsta.lokacija_id = 0;
          this.vrsta.k_vm_01 =0; 
          this.vrsta.k_vm_02 =0; 
          this.vrsta.k_vm_03 =0; 
          this.vrsta.k_vm_04 =0; 
          this.vrsta.k_vm_05 =0; 
          this.vrsta.k_vm_06 =0; 
          this.vrsta.k_vm_07 =0;           

          // dugme dodaj otvara prozor pa ovo ne treba:
          //$("#izmjenaVrste").modal("show");


          // prikaži modalni prozor
          // ovde NE TREBA jer to radi dugme
          //$("#izmjenaVrste").modal("show");

          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_tipa_materijala').selectpicker("refresh");
            $('#izbor_dodatnog_izbora').selectpicker("refresh");
            $('#izbor_lokacije').selectpicker("refresh");
            // ucitaj koeficijente
            this.ucitajListuKoeficijenata();
            $('#izbor_dodatka').selectpicker("refresh");
            
            
          });

        },

        izmjeniVrstu(vrsta){

          this.edit=true;
          this.vrsta.id=vrsta.id;
          
          this.vrsta.vrsta_id=vrsta.id;
          
          this.vrsta.mattip_id=vrsta.mattip_id;
          this.vrsta.dodatni_izbor=vrsta.dodatni_izbor;
          this.vrsta.naziv=vrsta.naziv;
          this.vrsta.jed_mjere=vrsta.jed_mjere;
          this.vrsta.lokacija_id = vrsta.lokacija_id;
          this.vrsta.k_vm_01 = vrsta.k_vm_01; 
          this.vrsta.k_vm_02 = vrsta.k_vm_02; 
          this.vrsta.k_vm_03 = vrsta.k_vm_03; 
          this.vrsta.k_vm_04 = vrsta.k_vm_04; 
          this.vrsta.k_vm_05 = vrsta.k_vm_05; 
          this.vrsta.k_vm_06 = vrsta.k_vm_06; 
          this.vrsta.k_vm_07 = vrsta.k_vm_07;            
          


          // prikaži modalni prozor
          $("#izmjenaVrste").modal("show");

          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_tipa_materijala').selectpicker("refresh");
            $('#izbor_dodatnog_izbora').selectpicker("refresh");
            $('#izbor_lokacije').selectpicker("refresh");
            
            // ucitaj koeficijente
            this.ucitajListuKoeficijenata();
            $('#izbor_dodatka').selectpicker("refresh");
            
          });
        },

        //snimiVrstu(id){
          // brisaje vrste
        //},

        snimiVrstu(){
          if(this.edit===false){
            // dodaj vrstu
            fetch('./../../api/mattipvrsta', {
              method: 'post',
              body: JSON.stringify(this.vrsta),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              this.ucitajVrste();
              this.isprazniModal();
              //this.$forceUpdate();



            })
            .catch(err => console.log(err));


            alert('dodao pa zatvaram');

          }else{
            // izmjeni postojeću vrstu materijala
              fetch('./../../api/mattipvrsta', {
              method: 'put',
              body: JSON.stringify(this.vrsta),
              headers: {
                'content-type': 'application/json'
              }
            })
            .then(response => response.json())
            .then(data => {
              
              this.ucitajVrste();
              
              
              this.isprazniModal();
              //this.$forceUpdate();
              // sakrij modalni prozor
              //$("#noviElementProizvoda").modal("hide");

            })
            .catch(err => console.log(err));

            alert('izmjenio pa zatvaram');
            

          }
          
          this.zatvoriModal();
/*
this.$nextTick(function(){ 

          RefreshTable();
});
*/
        },
        isprazniModal(){
          
          this.vrsta.id='';
          this.vrsta.mattip_id='';
          this.vrsta.naziv='';
          this.vrsta.jed_mjere='';
          this.vrsta.lokacija_id = 0;
          this.vrsta.k_vm_01 = ''; 
          this.vrsta.k_vm_02 = ''; 
          this.vrsta.k_vm_03 = ''; 
          this.vrsta.k_vm_04 = ''; 
          this.vrsta.k_vm_05 = ''; 
          this.vrsta.k_vm_06 = ''; 
          this.vrsta.k_vm_07 = '';  

        },

        zatvoriModal(){
          // sakrij
          $("#izmjenaVrste").modal("hide");
        },

        osvjezi(){
          // funkcija za forsiranje osvježavanja prikaza
          this.componentKey+=1;
          alert('svjeze');
        }


       
    }
}
</script>