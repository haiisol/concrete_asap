<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h4 class="font-bold">Order Table</h4>
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
                            <td>{{row.order_type}}</td>
                            <td>{{row.status}}</td>
                            <td>{{row.created_at}}</td>
                            <td>
                                <a :href="'order/'+row.id">View</a>
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
                headers:["Job Id","Order Type","Status","Created At","Actions"],
                data:[]
            }
        },
        methods: {
            init: function() {
                this.orders = getOrders();
                this.dataTable =  jQuery('#dataTableDisplayVue').DataTable();
            },
            getOrders() {
                axios.get('api/orders/getAll')
                .then(response => {
                    console.log(response.data);
                    this.data=response.data;
                });
            }
        },
        created: function(){
            this.dataTable = null;
            this.orders = [];
            this.init();
        },
        mounted() {
           
        }
    }
</script>