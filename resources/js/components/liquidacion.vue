<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Generador de Liquidaciones</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">Liquidaciones</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
             <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">                 
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div class="card text-center">
                                <div class="card-header">
                                    <h3 class="card-title">Ficha de Liquidaciones</h3>

                                </div>



                            </div>
                            <!-- /.card -->        
                                                
                        </div>
                        <!-- /.card -->
                    </div>    
                </div>        
            </div>   
      
            <!-- ---------------------------------------------------------------->

</div>            
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
    import datatables from 'datatables'
    import Multiselect from 'vue-multiselect'
    import { isNull } from 'util'

    const { validate, clean, format } = require('rut.js')   

    Vue.component('datatables', datatables)
    Vue.component('multiselect', Multiselect)
  
    export default {    
    
        mounted() {
            console.log('Componente Generador de Liquidaciones.') 
        },
        
        data(){
            return {
                rut                 : ''                                
            }

        },

        created(){           
            
        },

        methods:{

        }
    }    

</script>