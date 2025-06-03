<template>
              
                  <div>
                   <tr v-for="proizvod in proizvodi" v-bind:key="proizvod.id">
                          <td>
                            {{proizvod.naziv}}
                          </td>
                          <td >
                            {{proizvod.sifra_proizvoda}}
                          </td>
                          <td>
                            {{proizvod.opis}}
                          </td>
                          <td class="text-success">
                            <i class="material-icons">check_circle</i>
                          </td>
                          <td>
                            datum
                          </td>
                          
                            <td class="td-actions text-right">
                              <form action="" method="post">
                       
                                
                                
                                  <a rel="tooltip" class="btn btn-success btn-link"  data-original-title="" title="">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                
                                
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('Da li želite obrisati ovaj proizvod?') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">delete</i>
                                      <div class="ripple-container"></div>
                                  </button>
                               
                              </form>
                            </td>
                  
                        </tr>

                      </div>


</template>

<script>
  export default {
    data: function (){
      return {
        proizvodi:[]
      }
    },
    
    mounted(){
        this.ucitajProizvode()
    },

    methods: {
        ucitajProizvode: function() {
          axios.get('api/proizvodi')
          .then((response)=>{
              this.proizvodi=response.data.data;
          })
          .catch(function(error){
              console.log(error);
          });
        }

    }
    

  }
</script>
