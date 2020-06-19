<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="font-bold">Contractor Table</h4>
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-bordered" id="dataTableDisplayVue" style="width:100%">
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
                            <td>{{row.status}}</td>
                            <td>{{row.created_at}}</td>
                            <td style="text-align:center;">
                                <a :href="'contractor/'+row.id">Detail</a>
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
                headers:["Job Id","Status","Created At","Actions"],
                data:[]
            }
        },
        methods: {
            init: function() {
                var self = this;
                var slug_id = parseInt(window.location.pathname.split("/").pop());

                axios.get('api/contractor/getOrderDetails/' + slug_id)
                .then(response => {
                    //console.log(response.data);
                    this.data=response.data;
                    self.isFirstDataLoaded = true;
                    Vue.nextTick(function(){
                        self.dataTable = jQuery('#dataTableDisplayVue').DataTable({
                            "paging": true,
                            "pageLength": 10,
                            "info": false,
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