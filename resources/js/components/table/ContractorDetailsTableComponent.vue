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
                            <td><img :src="row.profile_image" /></td>
                            <td>{{row.first_name}}</td>
                            <td>{{row.last_name}}</td>
                            <td>{{row.phone_number}}</td>
                            <td>{{row.state}}</td>
                            <td>{{row.city}}</td>
                            <td>{{row.abn}}</td>
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