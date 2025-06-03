<template>
    <div class="card-body">
          <!-- Button trigger modal -->
          <div class="col-12 text-right mb-2">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#izmjenaKupca" @click="dodajKupca">
              Dodaj
            </button>
          </div>



          <!-- Modal izmjena Materijala - pocetak -->
           
          <div class="modal fade" id="izmjenaKupca" tabindex="-1" role="dialog" aria-labelledby="izmjenaKupca" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
              <div class="modal-content">
                <div class="modal-body">

                  <div class="content">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-md-12"> 

                          <form  class="form-horizontal" @submit.prevent="snimiKupca">

                              
                            <div class="card ">
                              <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">category</i>
                                </div>
                                              
                                                              
                                <h4 class="card-title" v-if="edit">Izmjena podataka o kupcu</h4>
                                <h4 class="card-title" v-else>Dodavanje novog  kupca</h4>

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
                                      <input class="form-control" name="slozeni_naziv" v-model="kupac.naziv"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">JMB/JIB</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="jmb_jib" v-model="kupac.jmb_jib"  type="text" placeholder="" value="" required="true" aria-required="true"/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Ulica i broj</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="ulica_i_broj" v-model="kupac.ulica_i_broj"  type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Pošt.br i mjesto</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="post_br_mjesto" v-model="kupac.post_br_mjesto"  type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Država</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="drzava" v-model="kupac.drzava"  type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Kontakt osoba</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="kontakt_osoba" v-model="kupac.kontakt_osoba"  type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Telefon</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="telefon" v-model="kupac.telefon"  type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <label class="col-sm-3 col-form-label">E-mail</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <input class="form-control" name="mail" v-model="kupac.mail"  type="text" placeholder="" value=""/>
                                    </div>
                                  </div>
                                </div> 



                                <div class="row">
                                  <label class="col-sm-3 col-form-label">Status</label>
                                  <div class="col-sm-7">
                                    <div class="form-group has-danger">
                                      <!--
                                      <v-selectize v-model="t_selected" :options="statusi" key-by="sifra" label="opis" :keys="['opis']"/>

                                      -->
                                      <select required class="selectpicker col-sm-12 pl-0 pr-0" name="status" id="status" v-model="kupac.status" data-style="select-with-transition" title="" data-size="5">
                                        
                                        <option  v-for="listValue in statusi" v-bind:key="listValue.sifra" v-bind:value="listValue.sifra">
                                                {{listValue.opis}}
                                        </option>
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

          <!-- Modal izmjena Kupca - kraj -->



        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:blok">
                <thead class="text-warning">
                    <th>
                        Naziv
                    </th>
                    <th>
                        JMB/JIB
                    </th>                    
                    <th>
                        Adresa
                    </th>
                    <th>
                        Kontakt osoba
                    </th>                     
                    <th>
                        Telefon
                    </th> 
                    <th>
                        Mail
                    </th>                                        
                    <th>
                        Status
                    </th>

                    <th class="text-right">
                        Izmjene<br>kupca
                    </th>
                </thead>

                <tbody>
                  <tr class="table-info">
                    <td>
                      <input type="text" v-model="pretraga.naziv" placeholder="svi kupci" />
                    </td>
                    <td>
                    </td>
                    <td> 
                      <input type="text" v-model="pretraga.adresa" placeholder="sve adrese" size="30"/>
                    </td>
                    <td colspan="3">
                    </td>
                    <td>  
                      <input type="text" v-model="pretraga.naziv_statusa" placeholder="svi statusi" />
                    </td>

                    <td class="text-right">
                        
                    </td>


                  </tr>
                    <tr v-for="kupac in filtriraniKupci" v-bind:key="kupac.id">
                        <td>
                        {{kupac.naziv}}
                        </td>
                        <td>
                        {{kupac.jmb_jib}}
                        </td>
                        <td>
                        {{kupac.ulica_i_broj+", "+kupac.post_br_mjesto+", "+kupac.drzava}}
                        </td>
                        <td>
                        {{kupac.kontakt_osoba}}
                        </td>
                        <td>
                        {{kupac.telefon}}
                        </td>
                        <td>
                        {{kupac.mail}}
                        </td>
                        <td>
                        {{kupac.naziv_statusa}}
                        </td>
                           
                        <td class="td-actions text-right">
                            <!-- Button trigger modal -->
                            
                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniKupca(kupac)">
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

            // promjeniva za izbor iz liste
            t_selected: {

              sifra:0, 
              opis:'neaktivan'
            },

            // promjeniva za izbor iz liste


            statusi: [],

            kupci: [],
            pretraga:{
              naziv:'',
              adresa:'',
              naziv_statusa:''

            },

            edit: false,

            kupac: {
                id: '',
                naziv: '',
                jmb_jib: '',
                ulica_i_broj: '',  
                post_br_mjesto: '', 
                drzava: '',
                kontakt_osoba: '',
                mail: '',
                telefon: '',
                status: '0',
                naziv_statusa: ''

            },

        }
    
    },

    computed: {

      filtriraniKupci: function(){
            return this.kupci.filter((kupac)=> {
                return kupac.naziv.toLowerCase().includes(this.pretraga.naziv.toLowerCase())
                    && (kupac.ulica_i_broj+", "+kupac.post_br_mjesto+", "+kupac.drzava).toLowerCase().includes(this.pretraga.adresa.toLowerCase())
                    && kupac.naziv_statusa.toLowerCase().includes(this.pretraga.naziv_statusa.toLowerCase())
                ;
                
            });
       }



    },

    created() {


        this.ucitajStatuse();
        this.ucitajKupce();
    },

    methods: {

    /// POČETNE POSTAVKE  //////////////////////////////

        ucitajStatuse: function() {
          
          axios.get('./../../api/configsifre_t_p/kupci/status')
          .then((response)=>{
              this.statusi=response.data;
              /* dobijamo:
                 statusi.sifra
                 statusi.opis
              */   
          })
          .catch(function(error){
              console.log(error);
          });
        },



    /// KUPCI  //////////////////////////////

        ucitajKupce(page_url) {
            let vm = this;
            
            page_url = page_url || 'api/kupci'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.kupci=res.data;
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

        dodajKupca(){
          this.edit = false;

        },

        izmjeniKupca(kupac){
          
          this.edit=true;
          
          this.kupac.id             = kupac.id;
          this.kupac.naziv          = kupac.naziv;
          this.kupac.jmb_jib        = kupac.jmb_jib;          
          this.kupac.ulica_i_broj   = kupac.ulica_i_broj;  
          this.kupac.post_br_mjesto = kupac.post_br_mjesto;
          this.kupac.drzava         = kupac.drzava;
          this.kupac.kontakt_osoba  = kupac.kontakt_osoba;
          this.kupac.mail           = kupac.mail;  
          this.kupac.telefon        = kupac.telefon;          
          this.kupac.status         = kupac.status;



          // prikaži modalni prozor
          $("#izmjenaKupca").modal("show");

        },

        snimiKupca(){

            if(this.edit===false){
              // dodaj kupca
              fetch('./../../api/kupac', {
                method: 'post',
                body: JSON.stringify(this.kupac),
                headers: {
                  'content-type': 'application/json'
                }
              })
              .then(response => response.json())
              .then(data => {
                this.ucitajKupce();
                this.isprazniModal();

              })
              .catch(err => console.log(err));

            }else{
              // izmjeni postojećeg kupca
                fetch('./../../api/kupac', {
                method: 'put',
                body: JSON.stringify(this.kupac),
                headers: {
                  'content-type': 'application/json'
                }
              })
              .then(response => response.json())
              .then(data => {
                
                this.ucitajKupce();
                this.isprazniModal();

              })
              .catch(err => console.log(err));

            }

            this.zatvoriModal();
          
        },

        isprazniModal(){
          
          this.kupac.id = null; 
          this.kupac.naziv = '';
          this.kupac.jmb_jib        = '';          
          this.kupac.ulica_i_broj   = '';  
          this.kupac.post_br_mjesto = '';
          this.kupac.drzava         = '';
          this.kupac.kontakt_osoba  = ''; 
          this.kupac.mail           = ''; 
          this.kupac.telefon        = '';  
          this.kupac.status         = '0';




        },

        zatvoriModal(){
          this.isprazniModal(); //mora biti prije zatvaranja
          // sakrij
          $("#izmjenaKupca").modal("hide");
          this.ucitajStatuse();
          
        }


    },



}
</script>