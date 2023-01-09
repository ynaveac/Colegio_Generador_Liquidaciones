<template>

<div class="container">
    <div class="col-md-4 offset-md-4 mt-5">
        <h1 class="my-3 text-center">Inicio de Sesión</h1>
        <div class="card">
            <div class="card-body">

            <form>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" v-model="email" placeholder="Ingrese Email">

                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" v-model="clave" placeholder="Clave">

                </div>
                <button type="button" @click="iniciarSesion()" class="btn btn-primary">Enviar</button>
                
            </form>

            </div>
        </div>

    </div>
</div>

</template>
   
<script>
import Axios from "axios";

    export default {
        data(){
            return{
                email:'',
                clave:''
            }
        },
        
        methods: {

            iniciarSesion: function() {
            //  console.log( this.usuario, this.clave);

            Axios.post('/iniciar-sesion', {
                email : this.email,
                clave : this.clave
            })
            .then( response => {
                    swal('Has iniciado sesión', 'Datos Correctos', 'success');
                    swal({
                    title :   'Has Iniciado Sesión',
                    text:     'Datos Correctos',
                    icon:     'success',
                    closeOnClickOutside : false,
                    closeOnEsc: false
                    }).then( select => {
                        if ( select ){
                        //location.reload();
                        location.href='/home';
                        }
                    });
            })
            .catch( error => {
                //console.log( error.response.data );
                let er = error.response.data.errors;
                let mensaje = "Error no Identificado";

                if(er.hasOwnProperty('email') ){
                    
                    mensaje = er.email[0];

                } else if( er.hasOwnProperty('clave') )
                {
                    mensaje = er.clave[0];

                } else if( er.hasOwnProperty('login') )
                {
                    mensaje = er.login[0];
                }

                swal('Error', mensaje, 'error');

            });
            }

        }

    }
</script>