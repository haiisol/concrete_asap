<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="font-bold">Rep Table</h4>
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
                            <td>{{row.first_name}}</td>
                            <td>{{row.email}}</td>
                            <td>{{row.company}}</td>
                            <td>{{row.created_at}}</td>
                            <td style="text-align:center;">
                                <a :href="'/rep/'+row.id">Detail</a>
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
                headers:["First Name","Email","Company","Created At","Actions"],
                data:[]
            }
        },
        methods: {
            init: function() {
                var self = this;
                axios.get('api/rep/getAllRep')
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
                                'csv', 'excel'
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