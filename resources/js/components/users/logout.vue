<template>

<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cerrar Sesión</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <router-link to="/home" class="breadcrumb-item">Home</router-link>
              <li class="breadcrumb-item active">Cerrar Sesión</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5 text-center">
                <div class="card">
                    <div class="card-header">¿Preparado para irse?</div>
  
                    <div class="card-body">
                        A continuación si está listo para finalizar <br/>
                        seleccione "Cerrar sesión" para finalizar su sesión.
                        <br/>
                        <p></p>

                        <button type="button" @click="cancelar()" class="btn btn-secondary">Cancelar</button>     
                        <button type="button" @click="cerrarSesion()" class="btn btn-primary">Cerrar Sesión</button>                        
                        <!--
                        <router-link to="/">Go to Home</router-link>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>    
</template>
  
<script>
import Axios from "axios";

    export default {
        mounted() {
            console.log('Componente Cerrar Sesión.')
        },
        methods: {

            cerrarSesion: function() {

            Axios.post('cerrar-Sesion').then( select => {
                        if ( select ){
                        location.href='/';
                        }
                    });
            },
            cancelar: function() {

            Axios.get('home').then( select => {
                        if ( select ){
                        location.href='/home';
                        }
                    });
            }            

        }        
    }
</script>