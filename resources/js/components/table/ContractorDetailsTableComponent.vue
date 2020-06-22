<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">       
            <div class="card card-circle-chart w-100" data-background-color="white" v-for="row in data">
                <div class="card-header text-center">
                    <img :src="row.profile_image" />
                </div>
                <div class="card-content">
                    <div class="order-details px-4">
                        <h5>Profile Details:</h5>
                        <hr/>
                        <p>First Name:<span>{{row.first_name}}</span></p>
                        <p>Last Name:<span>{{row.last_name}}</span></p>
                        <p>Company:<span>{{row.company}}</span></p>
                        <p>Phone Number:<span>{{row.phone_number}}</span></p>
                        <p>State:<span>{{row.state}}</span></p>
                        <p>City:<span>{{row.city}}</span></p>
                        <p>ABN:<span>{{row.abn}}</span></p>
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
                data:[]
            }
        },
        methods: {
            init: function() {
                var self = this;
                var slug_id = parseInt(window.location.pathname.split("/").pop());

                axios.get('/api/contractor/getContractorDetails/' + slug_id)
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