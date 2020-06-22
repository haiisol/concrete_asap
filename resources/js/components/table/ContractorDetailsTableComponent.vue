<template>    
    <div class="container-fluid">
        <div class="row justify-content-center">       
            <div class="card card-circle-chart w-100" data-background-color="white">
                <div class="card-header text-center">
                    <img :src="row.profile_image" />
                </div>
                <div class="card-content">
                    <div class="order-details px-4">
                        <h5>Profile Details:</h5>
                        <hr/>
                        <p>{{row.first_name}}</p>
                        <p>{{row.last_name}}</p>
                        <p>{{row.phone_number}}</p>
                        <p>{{row.state}}</p>
                        <p>{{row.city}}</p>
                        <p>{{row.abn}}</p>
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
                headers:["Profile Image","First Name","Last Name","Phone Number","State","City","ABN"],
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