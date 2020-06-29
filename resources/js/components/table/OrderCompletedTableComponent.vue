<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="font-bold">Completed Jobs Table</h4>
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
                            <td>{{row.contractor_name}}</td>
                            <td>{{row.status}}</td>
                            <td>{{row.created_at | formatDate }}</td>
                            <td>{{row.completed_at | formatDate }}</td>
                            <td style="text-align:center;">
                                <a :href="'/order/'+row.id">Details</a>
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
                headers:["Job Id","Contractor Name","Status","Job Started","Job Ended","Actions"],
                data:[]
            }
        },
        methods: {
            init: function() {
                var self = this;
                axios.get('api/orders/getCompletedJobs')
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