<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="font-bold" style="inline-block">Bids Table</h4>
                <h4 class="font-bold" style="inline-block" id="canceled_job">Canceled</h4>
                <h4 class="font-bold" style="inline-block" id="complete_job">Complete</h4>
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
                                'copy', 'csv', 'excel', 'pdf', 'print'
                            ]
                        });

                        jQuery("#canceled_job").click(function(){
                            jQuery('#dataTableDisplayVue_wrapper input[type="search"]').val("cancel")
                        });        
                        jQuery("#complete_job").click(function(){
                            jQuery('#dataTableDisplayVue_wrapper input[type="search"]').val("complete")
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