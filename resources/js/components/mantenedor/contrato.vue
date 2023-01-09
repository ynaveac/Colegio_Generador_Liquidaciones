<style>

</style>

<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Contrato</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">contrato</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
             <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">                 
                            
                            <div class="card">
                                <div class="card-header text-white bg-secondary mb-3">
                                    <h3 class="card-title">Información del Empleado</h3>
                                    
                                </div>
                                <!-- /.card-header -->
            
                                <div class="card-body">                    
                                                        
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label>Rut</label>
                                            <input type="text" class="form-control" id="rut" name="rut" v-model="empleado.rut" disabled>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" id="" v-model="empleado.nombre" disabled>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="apellidop">Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellidop" name="apellidop" v-model="empleado.apellido_p" disabled>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="apellidom">Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellidom" name="apellidom" v-model="empleado.apellido_m" disabled>
                                        </div> 
                                        <div class="form-group col-md-2">
                                            <label for="fono">Fono</label>
                                            <input type="text" class="form-control" id="fono" name="fono" v-model="empleado.fono" disabled>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="fcnacimiento">Fecha de Nacimiento</label>
                                            <input type="text" class="form-control" id="fcnacimiento" name="fcnacimiento" v-model="empleado.fecha_nacimiento" disabled>
                                        </div>                                                                                       
                                    </div>
                                                   
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="nm_genero">Genero</label>
                                            <input type="text" class="form-control" id="nm_genero" name="nm_genero" v-model="empleado.nm_genero" disabled>
                                        </div>                                             
                                        <div class="form-group col-md-4">
                                            <label for="nm_cargo">Cargo</label>
                                            <input type="text" class="form-control" id="nm_cargo" name="nm_cargo" v-model="empleado.nm_cargo" disabled>
                                        </div>  
                                        <div class="form-group col-md-6">
                                            <label for="nm_depto">Departamento</label>
                                            <input type="text" class="form-control" id="nm_depto" name="nm_depto" v-model="empleado.nm_depto" disabled>
                                        </div> 

                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="nm_nacion">Nacionalidad</label>
                                            <input type="text" class="form-control" id="nm_nacion" name="nm_nacion" v-model="empleado.nm_nacion" disabled>
                                        </div>                                             
                                        <div class="form-group col-md-3">
                                            <label for="nm_horario">Horario</label>
                                            <input type="text" class="form-control" id="nm_horario" name="nm_horario" v-model="empleado.nm_horario" disabled>
                                        </div>  
                                        <div class="form-group col-md-3">
                                            <label for="nm_tipo">Tipo Horario</label>
                                            <input type="text" class="form-control" id="nm_tipo" name="nm_tipo" v-model="empleado.tipo" disabled>
                                        </div> 
                                        <div class="form-group col-md-3">
                                            <label for="nm_horas">Cantidad de Horas</label>
                                            <input type="text" class="form-control" id="nm_horas" name="nm_horas" v-model="empleado.horas" disabled>
                                        </div> 

                                    </div>

                                </div>
                            </div>


                            <form role="form" @submit.prevent="agregar">

                                <div class="card">
                                    <div class="card-header text-white bg-info mb-3">
                                        <h3 class="card-title">Información Contractual</h3>
                                        
                                    </div>     

                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="empresa">Empresa</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.empresa }}</label>
                                                <multiselect 
                                                    v-model="empval" 
                                                    :options="empresas"                                     
                                                    :custom-label="Labelemp"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>
                                            </div> 

                                            <div class="form-group col-md-2" v-if=" empleado.horas > 0 ">
                                                <label for="v_hora">Valor Hora</label>
                                                <input type="number" class="form-control" id="v_hora" name="v_hora" v-model="contrato.v_hora" 
                                                min="0" max="999999999" placeholder="Ingrese Valor Hora">
                                            </div>

                                            <div class="form-group col-md-2" v-if=" empleado.horas === null ">
                                                <label for="renta">Renta</label>
                                                <input type="number" class="form-control" id="renta" name="renta" v-model="contrato.renta" 
                                                min="0" max="999999999" placeholder="Ingrese Renta">
                                            </div>
                                            
                                            <div class="form-group col-md-2">
                                                <label for="tcontrato">Tipo de Contrato</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.pc_nm }}</label>
                                                <multiselect 
                                                    v-model="tcontval" 
                                                    :options="tipcontratos"                                     
                                                    :custom-label="Labeltcont"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="desde">Desde</label>
                                                <input type="date" class="form-control" id="desde" name="desde" v-model="contrato.desde">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="hasta">Hasta</label>
                                                <input type="date" class="form-control" id="hasta" name="hasta" v-model="contrato.hasta">
                                            </div>                                                                         
                                        </div>  

                                        <div class="form-row">

                                            <div class="form-group col-md-4">
                                                <label for="colacion">Colación</label>
                                                <input type="number" class="form-control" id="colacion" name="colacion" v-model="contrato.colacion" 
                                                min="0" max="9999999" placeholder="Ingrese Valor">
                                            </div>                                           
                                        
                                            <div class="form-group col-md-4">
                                                <label for="movilizacion">Movilización</label>
                                                <input type="number" class="form-control" id="movilizacion" name="movilizacion" v-model="contrato.movilizacion" 
                                                min="0" max="9999999" placeholder="Ingrese Valor">
                                            </div>                                           
                                        
                                            <div class="form-group col-md-4">
                                                <label for="vacaciones">Vacaciones</label>
                                                <input type="number" class="form-control" id="vacaciones" name="vacaciones" v-model="contrato.vacaciones" 
                                                min="0" max="9999999" placeholder="Ingrese Valor">
                                            </div>                                           
                                        
                                        </div>                                   

                                        <div class="form-row">

                                            <div class="form-group col-md-12">
                                                <label for="Laboral">Domicilio Laboral</label>
                                                <textarea rows="2" class="form-control" id="Laboral" name="Laboral" placeholder="Ingrese domicilio laboral." v-model="contrato.Laboral">
                                                </textarea>                                
                                            </div>                                                 

                                        </div>
                                    </div>                               

                                    <div class="card-header text-white bg-info mb-3">
                                        <h3 class="card-title">Información Previsional</h3>                                        
                                    </div> 

                                    <div class="card-body">

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                
                                                <label for="afp">AFP</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.nm_afp }}</label>
                                                <multiselect 
                                                    v-model="afpval" 
                                                    :options="afps"                                     
                                                    :custom-label="Labelafp"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>                                                

                                            </div> 

                                            <div class="form-group col-md-6">
                                                <label for="prevision">Previsión</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.nm_salud }}</label>
                                                <multiselect 
                                                    v-model="salud_val" 
                                                    :options="salud"                                     
                                                    :custom-label="Labelsalud"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>                                            
                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="cesantia">Seguro Cesantia</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.porc_cesantia }}</label>
                                                <multiselect 
                                                    v-model="seguro_val" 
                                                    :options="seguro"                                     
                                                    :custom-label="Labelseguro"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>                                            
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="cesantia">Caja compensación</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.caja_comp }}</label>
                                                <multiselect 
                                                    v-model="caja_val" 
                                                    :options="caja"                                     
                                                    :custom-label="Labelcaja"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>                                            
                                            </div>

                                        </div>    

                                    </div>                                    


                                    <div class="card-header text-white bg-info mb-3">
                                        <h3 class="card-title">Modo de Pago</h3>                                        
                                    </div> 

                                    <div class="card-body">

                                        <div class="form-row">

                                            <div class="form-group col-md-3">
                                                <label for="mpago">Medio de Pago</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.nm_mediopago }}</label>
                                                <multiselect 
                                                    v-model="medio_val" 
                                                    :options="medio"                                     
                                                    :custom-label="Labelmedio"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>                                            
                                            </div>       

                                            <div class="form-group col-md-3">
                                                <label for="banco">Banco</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.nm_banco }}</label>
                                                <multiselect 
                                                    v-model="banco_val" 
                                                    :options="banco"                                     
                                                    :custom-label="Labelbanco"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>                                            
                                            </div>  

                                            <div class="form-group col-md-3">
                                                <label for="cuenta">Tipo de Cuenta</label>
                                                <label class="btn btn-block btn-primary btn-xs">{{ empleado.nm_tcuenta }}</label>
                                                <multiselect 
                                                    v-model="tcuenta_val" 
                                                    :options="tcuenta"                                     
                                                    :custom-label="Labeltcuenta"
                                                    :searchable="false" 
                                                    :close-on-select="true" 
                                                    :show-labels="false" placeholder="Seleccione...">
                                                </multiselect>                                            
                                            </div>  

                                            <div class="form-group col-md-3">
                                                <label for="ncuenta">Nro Cuenta</label>
                                                <input type="text" class="form-control" id="ncuenta" name="ncuenta" v-model="contrato.nr_cuenta" 
                                                placeholder="Ingrese nro de Cuenta">
                                            </div>  

                                        </div>    

                                    </div> 

                                    <div class="form-row text-center">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary">  Crear Contrato  </button>
                                        </div>
                                    </div>

                                </div>

                            </form>              


                    </div>    
                </div>        
            </div>   

</div>            
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
    import datatables from 'datatables'
//    import Datasource from 'vue-datasource'
    import Multiselect from 'vue-multiselect'

    import VueRouter from 'vue-router'

    const { validate, clean, format } = require('rut.js')

    Vue.component('multiselect', Multiselect)
    Vue.component('datatables', datatables)
  
    export default {    
        components: { Multiselect },
    
        mounted() {
            console.log('Componente contrato.')
            let self = this
        },
        
        
        data(){
            return {
                empresas            : [],
                empval              : '',
                afps                : [],
                afpval              : '',
                tipcontratos        : [],
                tcontval            : '',
                salud               : [],
                salud_val           : '',
                seguro              : [],
                seguro_val          : '',       
                medio               : [],
                medio_val           : '',     
                banco               : [],
                banco_val           : '', 
                tcuenta             : [],
                tcuenta_val         : '',     
                caja                : [],
                caja_val            : '',                                                                   
                empleado            : { rut: '', nombre: '', apellido_p: '', apellido_m: '', fono: '', fecha_nacimiento: '', direccion: '', nm_genero: '', nm_cargo: '', nm_dapto: '', nm_nacion: '', nm_horario: '', tipo : '', horas : '', empresa_id : '', empresa : '', renta : '', v_hora : '' , pc_id : '', pc_nm : '', desde : '', hasta : '', colacion : '', movilizacion : '', vacaciones : '', domicilio_laboral : '', id_afp : '', nm_afp : '', id_salud : '', nm_salud : '', cesantia : '', porc_cesantia : '', medio_pago : '', nm_mediopago : '', banco_id : '', nm_banco : '', tc_id : '', nm_tcuenta : '', nro_cuenta : '', caja_comp : '', caja_id : '' },
                contrato            : { v_hora: '', renta : '', desde : '', hasta : '', colacion : '', movilizacion : '', vacaciones : '', Laboral : '', nr_cuenta : '', empresa : '', tcontrato : '', afp : '', psalud : '', cesantia : '', mpago : '', bbanco : '', tipo_cuenta : '', caja : '' },
                id_edit             : '',
                indice              : ''            
                //-----------------------                                      
            }

        },

        created(){           
            this.carga();
            this.listemp();

        },

        methods:{

            Labelemp (option) {
                return `${option.razon_social}`
            },
            Labeltcont (option) {
                return `${option.nombre}`
            },
            Labelafp (option) {
                return `${option.nombre}` + ` - ` +  `${option.descuento}` + ` %`
            },      
            Labelsalud (option) {
                return `${option.nombre}` + ` - ` +  `${option.porcentaje}` + ` %`
            },    
            Labelseguro (option) {
                return `${option.descuento}` + ` %`
            },                              
            Labelmedio (option) {
                return `${option.nombre}`
            }, 
            Labelbanco (option) {
                return `${option.nombre}`
            },      
            Labeltcuenta (option) {
                return `${option.nombre}`
            },    
            Labelcaja (option) {
                return `${option.nombre}` + ` - ` +  `${option.descuento}` + ` %`
            },                                

            carga(){

                axios.get(`/empresa?id=${''}`)
                    .then(res => {
                        this.empresas = res.data;
                    });
                axios.get(`/plazocontrato?id=${''}`)
                    .then(res => {
                        this.tipcontratos = res.data;
                    });
                axios.get(`/afp?id=${''}`)
                    .then(res => {
                        this.afps = res.data;
                    });
                axios.get(`/salud?id=${''}`)
                    .then(res => {
                        this.salud = res.data;
                    });    
                axios.get(`/cesantia?id=${''}`)
                    .then(res => {
                        this.seguro = res.data;
                    });  
                axios.get(`/modopago?id=${''}`)
                    .then(res => {
                        this.medio = res.data;
                    });     
                axios.get(`/banco?id=${''}`)
                    .then(res => {
                        this.banco = res.data;
                    });   
                axios.get(`/tipocuenta?id=${''}`)
                    .then(res => {
                        this.tcuenta = res.data;
                    });      
                axios.get(`/cajacompensacion?id=${''}`)
                    .then(res => {
                        this.caja = res.data;
                    });                                                                                                            

            },

            listemp(){

                var query = window.location.href

                var bandera = (query.indexOf("?"))
                var filtro = ''

                if (bandera > 0) {
                    var vars = query.split("?")
                    var pair = vars[1].split("=") 
                    filtro = pair[1]
                }

                axios.get(`/contratos?id=${filtro}`)
                    .then(res => {
                     
                        console.log(res.data)

                        this.id_edit                   = res.data[0].id
                        this.empleado.rut              = format(res.data[0].rut) 
                        this.empleado.nombre           = res.data[0].nombre 
                        this.empleado.apellido_p       = res.data[0].apellido_p 
                        this.empleado.apellido_m       = res.data[0].apellido_m 
                        this.empleado.fono             = res.data[0].fono 
                        this.empleado.direccion        = res.data[0].direccion 
                        this.empleado.fecha_nacimiento = res.data[0].fecha_nacimiento 
                        this.empleado.nm_genero        = res.data[0].nm_genero
                        this.empleado.nm_cargo         = res.data[0].nm_cargo
                        this.empleado.nm_depto         = res.data[0].nm_depto 
                        this.empleado.nm_nacion        = res.data[0].nm_nacion 
                        this.empleado.nm_horario       = res.data[0].nm_horario
                        this.empleado.tipo             = res.data[0].tipo 
                        this.empleado.horas            = res.data[0].horas 

                        this.empleado.empresa_id       = res.data[0].empresa
                        this.empleado.empresa          = res.data[0].razon_social 
                        this.empleado.renta            = res.data[0].renta  
                        this.empleado.v_hora           = res.data[0].v_hora 
                        this.empleado.pc_id            = res.data[0].pc_id 
                        this.empleado.pc_nm            = res.data[0].pc_nm 
                        this.empleado.desde            = res.data[0].desde 
                        this.empleado.hasta            = res.data[0].hasta
                        this.empleado.colacion         = res.data[0].colacion
                        this.empleado.movilizacion     = res.data[0].movilizacion
                        this.empleado.vacaciones       = res.data[0].vacaciones
                        this.empleado.domicilio_laboral= res.data[0].domicilio_laboral
                        this.empleado.id_afp           = res.data[0].id_afp
                        this.empleado.nm_afp           = res.data[0].nm_afp
                        this.empleado.id_salud         = res.data[0].id_salud
                        this.empleado.nm_salud         = res.data[0].nm_salud
                        this.empleado.cesantia         = res.data[0].cesantia
                        this.empleado.porc_cesantia    = res.data[0].porc_cesantia
                        this.empleado.medio_pago       = res.data[0].medio_pago
                        this.empleado.nm_mediopago     = res.data[0].nm_mediopago
                        this.empleado.banco_id         = res.data[0].banco_id
                        this.empleado.nm_banco         = res.data[0].nm_banco
                        this.empleado.tc_id            = res.data[0].tc_id
                        this.empleado.nm_tcuenta       = res.data[0].nm_tcuenta
                        this.empleado.nro_cuenta       = res.data[0].nro_cuenta
                        this.empleado.caja_id          = res.data[0].caja
                        this.empleado.caja_comp        = res.data[0].caja_comp

                        /*---------------------------------------------*/
                        this.contrato.v_hora            =   this.empleado.v_hora
                        this.contrato.renta             =   this.empleado.renta
                        this.contrato.desde             =   this.empleado.desde 
                        this.contrato.hasta             =   this.empleado.hasta
                        this.contrato.colacion          =   this.empleado.colacion  
                        this.contrato.movilizacion      =   this.empleado.movilizacion
                        this.contrato.vacaciones        =   this.empleado.vacaciones
                        this.contrato.Laboral           =   this.empleado.domicilio_laboral
                        this.contrato.nr_cuenta         =   this.empleado.nro_cuenta     
                        this.contrato.caja              =   this.empleado.caja_id                   
                        /*---------------------------------------------*/
                    })
            },

            formatrut(){
                
                if(this.empleado.rut!=''){                    
                    if(validate(this.empleado.rut)==false){
                        swal('Rut Ingresado Incorrecto', 'Datos Incorrectos', 'error');
                        this.empleado.rut = clean(this.empleado.rut);
                    }else{
                        this.empleado.rut = format(this.empleado.rut);
                    }
                }

            },
            
            agregar(){     

                if ( this.empval.id         == null )   { this.contrato.empresa     =   this.empleado.empresa_id    } else { this.contrato.empresa      =   this.empval.id      }
                if ( this.tcontval.id       == null )   { this.contrato.tcontrato   =   this.empleado.pc_id         } else { this.contrato.tcontrato    =   this.tcontval.id    }
                if ( this.afpval.id         == null )   { this.contrato.afp         =   this.empleado.id_afp        } else { this.contrato.afp          =   this.afpval.id      }
                if ( this.salud_val.id      == null )   { this.contrato.psalud      =   this.empleado.id_salud      } else { this.contrato.psalud       =   this.salud_val.id   }
                if ( this.seguro_val.id     == null )   { this.contrato.cesantia    =   this.empleado.cesantia      } else { this.contrato.cesantia     =   this.seguro_val.id  }
                if ( this.medio_val.id      == null )   { this.contrato.mpago       =   this.empleado.medio_pago    } else { this.contrato.mpago        =   this.medio_val.id   }
                if ( this.banco_val.id      == null )   { this.contrato.bbanco      =   this.empleado.banco_id      } else { this.contrato.bbanco       =   this.banco_val.id   }
                if ( this.tcuenta_val.id    == null )   { this.contrato.tipo_cuenta =   this.empleado.tc_id         } else { this.contrato.tipo_cuenta  =   this.tcuenta_val.id }     
                if ( this.caja_val.id       == null )   { this.contrato.caja        =   this.empleado.caja_id       } else { this.contrato.caja         =   this.caja_val.id    }               
                       
                const params = { 

                                idemp               :   this.id_edit ,
                                empresa             :   this.contrato.empresa,
                                renta               :   this.contrato.renta,
                                v_hora              :   this.contrato.v_hora,
                                id_plazocontrato    :   this.contrato.tcontrato,
                                desde               :   this.contrato.desde,
                                hasta               :   this.contrato.hasta,
                                colacion            :   this.contrato.colacion,
                                movilizacion        :   this.contrato.movilizacion,
                                vacaciones          :   this.contrato.vacaciones,
                                domicilio_laboral   :   this.contrato.Laboral,

                                afp                 :   this.contrato.afp,
                                salud               :   this.contrato.psalud,
                                cesantia            :   this.contrato.cesantia,
                                caja                :   this.contrato.caja, 
                                
                                medio_pago          :   this.contrato.mpago,
                                banco               :   this.contrato.bbanco,
                                tipo_cuenta         :   this.contrato.tipo_cuenta,
                                nr_cuenta           :   this.contrato.nr_cuenta
                                
                                }                         
                                console.log(params)

                axios.post('/contratos', params)
                    .then( res => {
                                              
                        swal('Ingreso Correcto', 'Contrato Creado.', 'success');

                    })
                    .catch((error)=> {
                        //alert(error.message)
                        swal('Ingresado Incorrecto', 'Datos Duplicados, Imposible Guardar.', 'error');
                    })

            }
        
        }
    }

</script>