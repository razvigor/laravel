<template>
    
        <div class="table-responsive">
            <table id="datatables" class="table table-striped table-no-bordered table-hover datatable-warning" style="display:none">
                <thead class="text-warning">
                    <th>
                        Naziv
                    </th>
                    <th>
                        Jed. mjere
                    </th>
                    <th>
                        Koeficijent
                    </th>
                    <th class="text-right">
                        Obrade
                    </th>
                </thead>

                <tbody>
                    <tr v-for="vrsta in vrste" v-bind:key="vrsta.id">
                        <td>
                        {{vrsta.naziv}}
                        </td>
                        <td>
                        {{vrsta.jed_mjere}}
                        </td>
                        <td>
                        {{vrsta.koef1}}
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

</template>
