<template>    
    <div class="bids-details-section"> 
        <div class="container-fluid">
            <div class="row justify-content-center">       
                <div class="card card-circle-chart w-100" data-background-color="white" v-for="row in data">
                    <div class="card-content">
                        <div class="order-details px-4">
                            <h5>Bids Details:</h5>
                            <hr/>
                            <p>Date Delivery:<span>{{row.date_delivery}}</span></p>
                            <p>Time Delivery:<span>{{row.time_delivery}}</span></p>
                            <p>Rep Price:<span>{{row.time_delivery}}</span></p>
                            <p>Price:<span>{{row.time_delivery}}</span></p>
                            <p>Payment Type:<span>{{row.payment_type}}</span></p>
                            <p>Released:<span>{{row.released == "1" ? "Released" : "-"}}</span></p>
                            <p>Status:<span>{{row.status}}</span></p>
                        </div>              
                    </div>
                </div>
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
                var slug_id = parseInt(window.location.pathname.split("/").pop());

                axios.get('api/bids/getBids'+ slug_id)
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