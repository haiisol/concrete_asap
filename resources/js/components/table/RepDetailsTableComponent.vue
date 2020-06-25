<template>    
    <div class="rep-details-section">
        <div class="container-fluid">
            <div class="row justify-content-center">       
                <div class="card card-circle-chart w-100" data-background-color="white" v-for="row in data">
                    <div class="card-header text-center">
                        <img :src="row.profile_image" class="profile-detail-image"/>
                    </div>
                    <div class="card-content">
                        <div class="order-details px-4">
                            <h5>Profile Details:</h5>
                            <hr/>
                            <p>First Name:<span>{{row.first_name}}</span></p>
                            <p>Last Name:<span>{{row.last_name}}</span></p>
                            <p>Phone Number:<span>{{row.phone_number}}</span></p>
                            <p>State:<span>{{row.state}}</span></p>
                            <p>City:<span>{{row.city}}</span></p>
                            <p>ABN:<span>{{row.abn}}</span></p>
                        </div>              
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4 class="font-bold">Bids</h4>
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
                            <tr v-for="row in data_bids">
                                <td>{{row.payment_type}}</td>
                                <td>{{row.status}}</td>
                                <td>{{row.created_at}}</td>
                                <td style="text-align:center;">
                                    <a :href="'/bids/'+row.id">Detail</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
                headers:["Payment Type","Status","Created At","Actions"],
                data_bids:[],
                data:[]
            }
        },
        methods: {
            init: function() {
                var self = this;
                var slug_id = parseInt(window.location.pathname.split("/").pop());

                axios.get('/api/rep/getRepDetails/' + slug_id)
                .then(response => {
                    this.data=response.data;  
                });

                axios.get('/api/rep/getRepBids/' + slug_id)
                .then(response => {
                    this.data_bids=response.data;
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