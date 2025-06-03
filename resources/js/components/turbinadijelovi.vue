<template>
    <div class="card-body">
 <div class="row">
          <!-- Button "Štampa zaliha" -->
          <div class="col-6 text-left">
            <button type="button" class="btn btn-warning" @click="prikazi_zalihe_PDF('SZ')">
              Stanje zaliha 
            </button>
            <button type="button" class="btn btn-warning" @click="prikazi_zalihe_PDF('NR')">
              Narudžba robe : {{ukupnaCijena}} KM 
            </button>
          </div>
      
          <!-- Button trigger modal -->
          <div class="col-6 text-right">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#izmjeniTurbinadio" @click="dodajTurbinaepart">
              Dodaj
            </button>
          </div>
 </div>



          <!-- Modal izmjena Oemturbine - pocetak -->
           
          <div class="modal fade" id="izmjeniTurbinadio" tabindex="-1" role="dialog" aria-labelledby="izmjeniTurbinadio" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
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
                                  <h4 class="card-title" v-if="edit">Izmjeni {{turbinadio.turbinadiotip_naziv+': '+turbinadio.oznaka}} </h4>
                                  <h4 class="card-title" v-else>Dodavanje novog dijela za turbine</h4>
                                </div>
                                                              
                                <div class="row">
                                  <div class="col-md-12 text-right">
                                    <button type="button" id="btn-zatvori-modal-a"  class="btn btn-warning" @click="zatvoriModal()">
                                      Odustani
                                    </button>
                                  </div>
                                </div>

                              </div>


                                                      <form  class="form-horizontal" @submit.prevent="snimiTurbinadio">

                                                          <div class="card-body ">


                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Vrsta</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  
                                                                  <select required class="selectpicker col-sm-12 pl-0 pr-0" name="izbor_turbinadiotip" id="izbor_turbinadiotip" v-model="turbinadio.turbinadiotip_id"  data-style="select-with-transition" title="" data-size="5">
                                                                    <option disabled value="0">obavezan unos</option>
                                                                    <option  v-for="listValue in turbinadiotipovi" v-bind:key="listValue.id" v-bind:value="listValue.id">
                                                                            {{listValue.naziv_2}}
                                                                    </option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Oznaka</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="oznaka" v-model="turbinadio.oznaka" type="text" placeholder="" value="" required/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Cijena</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="cijena" v-model="turbinadio.cijena" type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Nabavna cijena</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="nab_cijena" v-model="turbinadio.nab_cijena" type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Na stanju</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="na_stanju_s" v-model="turbinadio.na_stanju_s" type="text" placeholder="" value=""/>
                                                                  servis                                                                    
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-2">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="na_stanju_r" v-model="turbinadio.na_stanju_r" type="text" placeholder="" value=""/>
                                                                radnja
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-2">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="na_stanju_p" v-model="turbinadio.na_stanju_p" type="text" placeholder="" value=""/>
                                                                polovno
                                                                </div>
                                                              </div>
                                                            </div> 

                                                            <div class="row">
                                                              <label class="col-sm-5 col-form-label">Polica</label>
                                                              <div class="col-sm-3">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="polica_s" v-model="turbinadio.polica_s"  type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>
                                                              <div class="col-sm-2">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="polica_r" v-model="turbinadio.polica_r"  type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>  
                                                              <div class="col-sm-2">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="polica_p" v-model="turbinadio.polica_p"  type="text" placeholder="" value=""/>
                                                                </div>
                                                              </div>                                                                   
                                                            </div>    
                                                                                                                                                                                    <div class="row">
                                                            <label class="col-sm-5 col-form-label">Limit</label>
                                                              <div class="col-sm-7">
                                                                <div class="form-group has-danger">
                                                                  <input class="form-control" name="limit" v-model="turbinadio.limit" type="text" placeholder="" value=""/>
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

          <!-- Modal izmjena Oemturbine - kraj -->



        <div class="table-responsive">
            <table id="datatables" class="table table-sm table-bordered table-hover datatable-warning" style="display:blok">
                <tr class="text-warning  table-light">

                    <th rowspan="2">
                        Vrsta dijela
                    </th>
                    <th class="text-center"  rowspan="2">
                        U setu<br> (br. kom.)
                    </th>
                    <th rowspan="2">
                        Oznaka
                    </th>
                    <th class="text-right" rowspan="2">
                        Cijena<br>(KM)
                    </th>
                    <th class="text-center" colspan="2">
                        Servis
                    </th>                    
                    <th class="text-center" colspan="2">
                        Radnja
                    </th>                    
                    <th class="text-center" colspan="2">
                        Polovno
                    </th>                    
                    <th class="text-center"  rowspan="2">
                        Limit
                    </th>
                    <th  class="text-center" rowspan="2">
                        Izmjene<br>dijela
                    </th>
                </tr>
                <tr class="text-warning table-light">
                  

                    <th class="text-center">
                        Na stanju                     
                    </th>                    

                    <th class="text-right"> 
                        Polica
                        
                    </th>                    
                    <th class="text-center bg-light">
                        Na stanju                     
                    </th>                    
                    <th class="text-right"> 
                        Polica
                    </th>                    
                    <th class="text-center bg-light">
                        Na stanju                     
                    </th>                    
                    <th class="text-right"> 
                      Polica
                    </th>                    

                </tr>
                <tbody>
                  <tr class="table-info">
                    <td>
                      <input type="text" v-model="pretraga.turbinadiotip_naziv" placeholder="sve" />
                    </td>
                    <td >
                    </td>
                    <td>
                      <input type="text" v-model="pretraga.oznaka" placeholder="sve" />
                    </td>


                    <td>
                    </td>
                    <td colspan="3">
                    </td>                    
                    <td colspan="3">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>

                  </tr>



                   <!-- <tr v-for="oemturbina in filtriraniOemturbines" v-bind:key="oemturbina.id">   -->
                     
                     <tr v-for="turbinadio in filterTurbinadijelovi" v-bind:key="turbinadio.id">
                        
                        <td>
                          {{turbinadio.turbinadiotip_naziv}}
                        </td>
                        <td class="text-center"> 
                          {{turbinadio.turbinadiotip_u_setu}}
                        </td>
                        <td>
                          {{turbinadio.oznaka}}
                        </td>
                        <td class="text-right">
                          {{turbinadio.cijena}}
                        </td>
                        <td  v-bind:class="turbinadio.na_stanju_s=='0' ? 'text-center text-danger bg-light' : 'text-center text-success bg-light'">
                          {{turbinadio.na_stanju_s}}
                        </td>   
                        <td v-bind:class="turbinadio.na_stanju_s=='0' ? 'text-right text-white' : 'text-right text-success'">
                          {{turbinadio.polica_s}}
                        </td>
                        <td  v-bind:class="turbinadio.na_stanju_r=='0' ? 'text-center text-danger bg-light' : 'text-center text-success bg-light'">
                          {{turbinadio.na_stanju_r}}
                        </td>                        
                        <td v-bind:class="turbinadio.na_stanju_r=='0' ? 'text-right text-white' : 'text-right text-success'">
                          {{turbinadio.polica_r}}
                        </td>                        
                        <td class="text-center  text-gray bg-light">
                          {{turbinadio.na_stanju_p}}
                        </td>
                        <td class="text-right  text-gray">
                          {{turbinadio.polica_p}}
                        </td>                        
                     
                        <td class="text-center">
                          {{turbinadio.limit}}
                        </td>


                        <td class="td-actions text-center">
                            <!-- Button trigger modal -->
                            
                            <!-- Button trigger modal / staro
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".modal_index" data-backdrop="static" data-keyboard="false">
                                <i class="material-icons">edit</i>
                                </button>
                            Button trigger modal / staro -->
                            <button type="button" class="btn btn-success btn-link" data-original-title="" title="" @click="izmjeniTurbinadio(turbinadio)">
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


            turbinadijelovi: [],
            turbinadiotipovi: [],
            pretraga:{
              turbinadiotip_naziv:'',
              oznaka:''

            },

            pagination: {},
            edit: false,
            turbina_id: '',

            turbinadio: {
                id: '',
                oznaka: '',
                turbinadiotip_id: 0,
                turbinadiotip_naziv: '',
                turbinadiotip_dodatni: 0,
                
                cijena: 0,
                nab_cijena: 0,
                na_stanju_s: 0,
                na_stanju_r: 0,
                na_stanju_p: 0,
                limit: 0,
                polica_s: '-',
                polica_r: '-',
                polica_p: '-'



            },



        }
    
    },

    computed: {

  ukupnaCijena: function(){
          
          var vrijednost_narudzbe;

          vrijednost_narudzbe=this.turbinadijelovi.reduce( (acc, k_dio) => {
          return parseFloat(acc) 
              + parseFloat(k_dio.limit>k_dio.na_stanju_s + k_dio.na_stanju_r ? k_dio.nab_cijena*(k_dio.limit-k_dio.na_stanju_s-k_dio.na_stanju_r) : 0)

                }, 0);

          return vrijednost_narudzbe;      
               

  },

      filterTurbinadijelovi: function(){
            return this.turbinadijelovi.filter((turbinadio)=> {
                return turbinadio.turbinadiotip_naziv.toLowerCase().includes(this.pretraga.turbinadiotip_naziv.toLowerCase())
                    && turbinadio.oznaka.toLowerCase().includes(this.pretraga.oznaka.toLowerCase())
                ;
                
                //vrsta.naziv.match(/this.pretraga/i);
            });
       }


    },

    created() {
        this.ucitajTurbinadiotip();
        this.ucitajTurbinadijelovi();

    },


    methods: {





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


        ucitajTurbinadiotip: function(){
          axios.get('./../../api/turbinadiotipovi')
          .then((response)=>{
              this.turbinadiotipovi=response.data.data;
          })
          .catch(function(error){
              console.log(error);
          });
        },
    /// OEM turbine  //////////////////////////////

        ucitajTurbinadijelovi(page_url) {
            let vm = this;
            
            page_url = page_url || 'api/turbinadijelovi'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.turbinadijelovi=res.data;
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





        dodajTurbinaepart(){
        
          this.edit                             = false;
          this.turbinadio.id                    = null; 
          this.turbinadio.oznaka                = '';
          this.turbinadio.turbinadiotip_id      = 0;      
          this.turbinadio.turbinadiotip_naziv   = '';
          this.turbinadio.turbinadiotip_dodatni = 0;
          this.turbinadio.cijena                = 0;
          this.turbinadio.nab_cijena            = 0;
          this.turbinadio.na_stanju_s           = 0;
          this.turbinadio.na_stanju_r           = 0;
          this.turbinadio.na_stanju_p           = 0;
          this.turbinadio.limit                 = 0;
          this.turbinadio.polica_s              = '-';
          this.turbinadio.polica_r              = '-';
          this.turbinadio.polica_p              = '-';

          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_turbinadiotip').selectpicker("refresh");
          });


        },


            

        izmjeniTurbinadio(turbinadio){
       
          
          this.edit=true;
  
  

          this.turbinadio.id                    = turbinadio.id; 
          this.turbinadio.oznaka                = turbinadio.oznaka;
          this.turbinadio.turbinadiotip_id      = turbinadio.turbinadiotip_id;      
          this.turbinadio.turbinadiotip_naziv   = turbinadio.turbinadiotip_naziv;
          this.turbinadio.turbinadiotip_dodatni = turbinadio.turbinadiotip_dodatni;
          this.turbinadio.cijena                = turbinadio.cijena;
          this.turbinadio.nab_cijena            = turbinadio.nab_cijena;
          this.turbinadio.na_stanju_s           = turbinadio.na_stanju_s;
          this.turbinadio.na_stanju_r           = turbinadio.na_stanju_r;
          this.turbinadio.na_stanju_p           = turbinadio.na_stanju_p;
          this.turbinadio.limit                 = turbinadio.limit;
          this.turbinadio.polica_s              = turbinadio.polica_s;
          this.turbinadio.polica_r              = turbinadio.polica_r;
          this.turbinadio.polica_p              = turbinadio.polica_p;

          // prikaži modalni prozor
          $("#izmjeniTurbinadio").modal("show");

          //forsiraj prikaz liste
          this.$nextTick(function(){ 
            $('#izbor_turbinadiotip').selectpicker("refresh");
          });


        },

        snimiTurbinadio(){

              if(this.turbinadio.turbinadiotip_id==0){
                  alert('Niste izabrali tip!');
              }else{

                  if(this.edit===false){
                    // dodaj vrstu
                    fetch('./../../api/turbinadio', {
                      method: 'post',
                      body: JSON.stringify(this.turbinadio),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                    .then(response => response.json())
                    .then(data => {
                      this.ucitajTurbinadijelovi();
                      this.isprazniModal();
                      //this.$forceUpdate();

                    })
                    .catch(err => console.log(err));


                  // alert('dodao pa zatvaram');

                  }else{
                    // izmjeni postojeći oemturbina
                      fetch('./../../api/turbinadio', {
                      method: 'put',
                      body: JSON.stringify(this.turbinadio),
                      headers: {
                        'content-type': 'application/json'
                      }
                    })
                    .then(response => response.json())
                    .then(data => {
                      
                      this.ucitajTurbinadijelovi();
                      this.isprazniModal();
                      //this.$forceUpdate();
                      // sakrij modalni prozor
                      //$("#noviElementProizvoda").modal("hide");

                    })
                    .catch(err => console.log(err));

                  // alert('izmjenio oemturbina pa zatvaram');

                  }
                  

                  //REinit();
                  //this.$forceUpdate();
                  //RefreshTable();
                  this.zatvoriModal();
              }

        },

        snimiPredracun(){
          alert('Radovi u toku...');
        },


        isprazniModal(){
          
          this.turbinadio.id                    = null; 
          this.turbinadio.oznaka                = '';
          this.turbinadio.turbinadiotip_id      = 0;      
          this.turbinadio.turbinadiotip_naziv   = '';
          this.turbinadio.turbinadiotip_dodatni = 0;
          this.turbinadio.cijena                = 0;
          this.turbinadio.nab_cijena            = 0;
          this.turbinadio.na_stanju_s           = 0;
          this.turbinadio.na_stanju_r           = 0;
          this.turbinadio.na_stanju_p           = 0;
          this.turbinadio.limit                 = 0;
          this.turbinadio.polica_s              = '-';
          this.turbinadio.polica_r              = '-';
          this.turbinadio.polica_p              = '-';

        },

        zatvoriModal(){
          // sakrij
          $("#izmjeniTurbinadio").modal("hide");
        },


        prikazi_zalihe_PDF(tip_dokumenta){
       
         // open the page as popup //
         //var page = '/test_pdf';
         
         if (tip_dokumenta=='SZ'){
             var page = '../../../api/zalihe_pdf';

         }else{
             var page = '../../../api/narudzba_pdf';
  
         }

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