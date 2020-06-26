<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="font-bold d-inline-block" >Bids Table</h4>

                <div class="show_button mb-3">
                    <button class="dt-button buttons-csv buttons-html5 d-inline-block mr-2" id="show_all_job">Show All</button>
                    <button class="dt-button buttons-csv buttons-html5 d-inline-block mx-2 " id="canceled_job">Cancelled</button>
                    <button class="dt-button buttons-csv buttons-html5 d-inline-block mx-2" id="complete_job">Complete</button>
                </div>
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
                                'copy','csv', 'print'
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