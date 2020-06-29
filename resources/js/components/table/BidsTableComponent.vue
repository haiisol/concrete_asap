<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="font-bold d-inline-block" >Bids Table</h4>
                <ul class="nav nav-tabs mb-3">
                  <li class="nav-item">
                    <a class="nav-link active" href="javascript:;" id="show_all_job">Show All</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:;" id="canceled_job">Cancelled</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="javascript:;" id="complete_job">Complete</a>
                  </li>
                </ul>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-responsive-sm" id="dataTableDisplayVue" style="width:100%">
                    <thead>
                        <tr>
                            <th v-for="header in headers">
                                {{header}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in data">
                            <td>{{row.job_id}}</td>
                            <td>{{row.rep_name}}</td>
                            <td>{{row.contractor_name}}</td>
                            <td>{{row.status}}</td>
                            <td>{{row.created_at}}</td>
                            <td style="text-align:center;">
                                <a :href="'/bids/'+row.bids_id">Details</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data:function(){
            return {
                isFirstDataLoaded: false,
                headers:["Job Id","Rep Name","Contractor Name","Status","Created At","Actions"],
                data:[]
            }
        },
        methods: {
            init: function() {
                var self = this;
                axios.get('api/bids/getAllBids')
                .then(response => {
                    //console.log(response.data);
                    this.data=response.data;
                    self.isFirstDataLoaded = true;
                    Vue.nextTick(function(){
                        self.dataTable = jQuery('#dataTableDisplayVue').DataTable({
                            "paging": true,
                            "pageLength": 10,
                            "info": false,
                            "order":[],
                            "dom": "Bfrtip",
                            "buttons": [
                                {
                                    extend: 'copy',
                                    exportOptions: {
                                        columns: "thead th:not(:last-child)"
                                    }
                                },
                                {
                                    extend: 'csv',
                                    exportOptions: {
                                        columns: "thead th:not(:last-child)"
                                    }
                                },
                                {
                                    extend: 'print',
                                    exportOptions: {
                                        columns: "thead th:not(:last-child)"
                                    }
                                },
                                {
                                    extend: 'pdf',
                                    exportOptions: {
                                        columns: "thead th:not(:last-child)"
                                    }
                                }
                            ]
                        });


                        jQuery("#show_all_job").click(function(){
                            var table = $('#dataTableDisplayVue').DataTable();
                            table.columns(3).search("").draw();
                        }); 
                        jQuery("#canceled_job").click(function(){
                            var table = $('#dataTableDisplayVue').DataTable();
                            table.columns(3).search("Cancelled").draw();
                        });        
                        jQuery("#complete_job").click(function(){
                            var table = $('#dataTableDisplayVue').DataTable();
                            table.columns(3).search("Complete").draw();
                        });
                    });
                });
            }
        },
        created: function(){
            this.dataTable = null;
            this.init();
        }
    }
</script>