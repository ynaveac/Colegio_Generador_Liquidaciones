<style>

</style>

<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Nomina</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">empleados</li>
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
                                    <h3 class="card-title">Listado de Registros</h3>
                                    <button type="button" class="btn btn-outline-success btn-sm float-right" data-toggle="modal" data-target="#AgregarModal" @click="carga()"> 
                                        Agregar Nuevo Empleado 
                                    </button>
                                    <!--
                                    <router-link :to="{ path: '/genero', query: { id : '4'}}" replace>test</router-link>
                                    -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">    

                                 <table id="datatable" class="table table-bordered table-striped text-center">                                    

                                    <thead>
                                        <tr>
                                            <th>Id Reg.</th>
                                            <th>Rut</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Cargo</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                
                                </table>                  

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->        
                                                
                        </div>
                        <!-- /.card -->
                    </div>    
                </div>        
            </div>   

            <!-- Modal Agregar nuevo Empleado -->
            <!-- Modal -->
            <div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="AgregarModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <form role="form" @submit.prevent="agregar">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AgregarModal">Agregar Nuevo Empleado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rut</label>
                                <input type="text" class="form-control" id="rut" name="rut" v-model="empleado.rut" @change="formatrut()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" >
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="" v-model="empleado.nombre" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="apellidop">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidop" name="apellidop" v-model="empleado.apellido_p" placeholder="Apellido Paterno">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellidom">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidom" name="apellidom" v-model="empleado.apellido_m" placeholder="Apellido Materno">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fono">Fono</label>
                                <input type="text" class="form-control" id="fono" name="fono" v-model="empleado.fono" placeholder="Telefono de Contacto">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fcnacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fcnacimiento" name="fcnacimiento" v-model="empleado.fecha_nacimiento" placeholder="Fecha de Nacimiento">
                            </div>
                        </div>
                        
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="cargo">Nacionalidad</label>
                                <multiselect 
                                    v-model="nacval" 
                                    :options="naciones"                                     
                                    :custom-label="Labelnac"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cargo">Genero</label>
                                <multiselect 
                                    v-model="genval" 
                                    :options="generos"                                     
                                    :custom-label="LabelGen"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                               
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cargo">Cargos</label>
                                <multiselect 
                                    v-model="carval" 
                                    :options="cargos"                                     
                                    :custom-label="LabelCar"                                    
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="depto">Horario</label>
                                <multiselect 
                                    v-model="horarioval" 
                                    :options="horarios"
                                    :custom-label="Labelhorario" 
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div>  

                            <div class="form-group col-md-6">
                                <label for="depto">Departamentos</label>
                                <multiselect 
                                    v-model="deptoval" 
                                    :options="deptos"
                                    :custom-label="Labeldepto" 
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div>                                                        
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="direccion">Descripción</label>
                                <textarea rows="3" class="form-control" id="direccion" name="direccion" v-model="empleado.direccion" placeholder="Ingrese la dirección del empleado.">
                                </textarea>                                
                            </div>                            
                        </div>

                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </div>
                    </div>
                </form>    
            </div>
            </div>      
            <!-- ---------------------------------------------------------------->

            <!-- Modal Agregar nuevo Empleado -->
            <!-- Modal -->
            <div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModal" aria-hidden="true">
            <div class="modal-dialog  modal-lg" role="document">

                <form role="form" @submit.prevent="edit">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditarModal">Editar Empleado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rut</label>
                                <input type="text" class="form-control" id="rut" name="rut" v-model="empleado_edit.rut" @change="formatrut()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="" v-model="empleado_edit.nombre" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="apellidop">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidop" name="apellidop" v-model="empleado_edit.apellido_p" placeholder="Apellido Paterno">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellidom">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidom" name="apellidom" v-model="empleado_edit.apellido_m" placeholder="Apellido Materno">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fono">Fono</label>
                                <input type="text" class="form-control" id="fono" name="fono" v-model="empleado_edit.fono" placeholder="Telefono de Contacto">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fcnacimiento">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fcnacimiento" name="fcnacimiento" v-model="empleado_edit.fecha_nacimiento" placeholder="Fecha de Nacimiento">
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label for="cargo">Nacionalidad</label>
                                <label class="btn btn-block btn-info btn-xs">{{ nacval_edit }}</label>
                                <multiselect 
                                    v-model="nacval_e" 
                                    :options="naciones"                                     
                                    :custom-label="Labelnac"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cargo">Genero</label>
                                <label class="btn btn-block btn-info btn-xs">{{ genval_edit }}</label>
                                <multiselect 
                                    v-model="genval_e" 
                                    :options="generos"                                     
                                    :custom-label="LabelGen"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cargo">Cargos</label>
                                <label class="btn btn-block btn-info btn-xs">{{ carval_edit }}</label>
                                <multiselect 
                                    v-model="carval_e" 
                                    :options="cargos"                                     
                                    :custom-label="LabelCar"                                    
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                
                                <label for="depto">Horario</label>
                                <label class="btn btn-block btn-info btn-xs">{{ horarioval_edit }}</label>
                                <multiselect 
                                    v-model="horario_e" 
                                    :options="horarios"
                                    :custom-label="Labelhorario" 
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div>  

                            <div class="form-group col-md-6">
                                <label for="depto">Departamentos</label>
                                <label class="btn btn-block btn-info btn-xs">{{ deptoval_edit }}</label>
                                <multiselect 
                                    v-model="deptoval_e" 
                                    :options="deptos"
                                    :custom-label="Labeldepto" 
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div>                                                        
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="direccion">Descripción</label>
                                <textarea rows="3" class="form-control" id="direccion" name="direccion" v-model="empleado_edit.direccion" placeholder="Ingrese la dirección del empleado.">
                                </textarea>                                
                            </div>                            
                        </div>

                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>    
            </div>
            </div>      
            <!-- ---------------------------------------------------------------->

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
            console.log('Componente empleado.')
            let self = this
        },
        
        
        data(){
            return {

                empleados           : [],
                generos             : [],
                cargos              : [],
                naciones            : [],
                deptos              : [],
                horarios            : [],
                empleado            : { rut: '', nombre: '', apellido_p: '', apellido_m: '', fono: '', direccion: '', fecha_nacimiento: '', idgenero: '', idcargo: '', iddepto: '' },
                empleado_edit       : { rut: '', nombre: '', apellido_p: '', apellido_m: '', fono: '', direccion: '', fecha_nacimiento: '', idgenero: '', idcargo: '', iddepto: '' },
                editarActivo        : false,
                genval              : '',
                nacval              : '',
                carval              : '',
                deptoval            : '',
                horarioval          : '',
                genval_e            : '',
                nacval_e            : '',
                carval_e            : '',
                deptoval_e          : '',
                horario_e           : '',                
                //-----------------------
                genval_edit         : '',
                nacval_edit         : '',
                carval_edit         : '',
                deptoval_edit       : '',
                horarioval_edit     : '', 
                genval_id_edit      : '',
                nacval_id_edit      : '',
                carval_id_edit      : '',
                deptoval_id_edit    : '',
                horario_id_edit     : '',
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

            listemp(){
                axios.get(`/empleados?id=${''}`)
                    .then(res => {
                        var datasource = res.data                        
                        console.log(res.data)
                        var self = this
                        var table = $('#datatable').DataTable( {                    

                            "language": {
                                "decimal":        ".",
                                "emptyTable":     "No hay datos para mostrar",
                                "info":           "del _START_ al _END_ (_TOTAL_ total)",
                                "infoEmpty":      "del 0 al 0 (0 total)",
                                "infoFiltered":   "(filtrado de todas las _MAX_ entradas)",
                                "infoPostFix":    "",
                                "thousands":      "'",
                                "lengthMenu":     "Mostrar _MENU_ entradas",
                                "loadingRecords": "Cargando...",
                                "processing":     "Procesando...",
                                "search":         "Buscar:",
                                "zeroRecords":    "No hay resultados",
                                "paginate": {
                                "first":      "Primero",
                                "last":       "Último",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                                },
                                "aria": {
                                "sortAscending":  ": ordenar de manera Ascendente",
                                "sortDescending": ": ordenar de manera Descendente ",
                                }
                            },

                            "data" : datasource,
                            
                            "columns": [
                                { "data"   : "id" },
                                { "data"   : "rut" },
                                { "data"   : "nombre" },
                                { "data"   : "apellidos" },
                                { "data"   : "nm_cargo" },
                                { 
                                    "data": "id" ,"render": function (data, type, row, meta) {                                        
                                    if(type === 'display'){
                                        
                                        data = ` <button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fas fa-minus-circle"></i></button> `
                                        + ` <button type="button" class="edit btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#EditarModal"><i class="fas fa-edit"></i></button> `
                                        + ` <button type="button" class="contrato btn btn-outline-success btn-sm"><i class="fas fa-file-contract"></i></button> `                                    
                                    }
                                    
                                    return data
                                    }
                                },                                                                      
                                ]

                        } );      
                        // -----------------------------------------------------------------------------------------
                        $('#datatable ').on('click', 'button.contrato', function (e) {
                            e.preventDefault()                            
                            
                            //this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
                            //console.log('contrato ' + this.csrfToken)
                            
                            var table = $('#datatable').DataTable();
                            var data = table.row($(this).closest('tr')).data()["id"]

                            self.$router.push('/contrato?id=' + data)
                                                           
                        })
                        // -----------------------------------------------------------------------------------------                         

                        $('#datatable ').on('click', 'button.delete', function (e) {
                            e.preventDefault();    
                            var table = $('#datatable').DataTable();
                            var data = table.row($(this).closest('tr')).data()["id"]
                            var index = table.row($(this).closest('tr')).index()
                            console.log('delete table :' + data)

                            var rows = table.rows( index ).remove().draw()    
                            console.log('index tabla :' + index)                        

                            axios.delete(`/empleados/${data}`)
                                .then(()=>{
                                    console.log('delete base: ' + data)
                                })    
                                                           
                        }) 

                        $('#datatable ').on('click', 'button.edit', function (e) {
                            e.preventDefault();    
                            var table = $('#datatable').DataTable();
                            var data = table.row($(this).closest('tr')).data()["id"]
                            var index = table.row($(this).closest('tr')).index()
                            console.log('edit table :' + data)

                            axios.get(`/empleados?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                console.log(res.data[0].rut)
                                //$("#rut_edit").val(res.data[0].rut)
                                self.editar(res.data, index)
                            })    
                                                           
                        })

                    });                
            },
            editar: function(item, index){
                this.limpiar()
                console.log(item)
                this.carga()
                this.indice                         = index
                this.id_edit                        = item[0].id
                this.empleado_edit.rut              = item[0].rut                //this.empleado_edit.rut = item.rut
                this.empleado_edit.nombre           = item[0].nombre 
                this.empleado_edit.apellido_p       = item[0].apellido_p 
                this.empleado_edit.apellido_m       = item[0].apellido_m 
                this.empleado_edit.fono             = item[0].fono 
                this.empleado_edit.direccion        = item[0].direccion 
                this.empleado_edit.fecha_nacimiento = item[0].fecha_nacimiento 
                this.genval_edit                    = item[0].nm_genero 
                this.nacval_edit                    = item[0].nm_nacion 
                this.carval_edit                    = item[0].nm_cargo
                this.deptoval_edit                  = item[0].nm_depto
                this.horarioval_edit                = item[0].nm_horario
                this.genval_id_edit                 = item[0].idgenero 
                this.nacval_id_edit                 = item[0].idnacion
                this.carval_id_edit                 = item[0].idcargo
                this.deptoval_id_edit               = item[0].iddepto     
                this.horario_id_edit                = item[0].idhorario             
            },

            limpiar(){
                this.empleado.rut = "";
                this.empleado.nombre = "";
                this.empleado.apellido_p = "";
                this.empleado.apellido_m = "";
                this.empleado.fono = "";
                this.empleado.direccion = "";
                this.empleado.fecha_nacimiento = "";
                this.generos = [];
                this.cargos = [];
                this.deptos = [];
                this.naciones = [];
                this.horarios = [];
            },

            LabelGen (option) {
                return `${option.nombre}`
            },
            LabelCar (option) {
                return `${option.nombre}`
            },         
            Labeldepto (option) {
                return `${option.nombre}`
            },
            Labelnac (option) {
                return `${option.nombre}`
            },
            Labelhorario (option){
                return `${option.nombre}`
            },              
            /*
            SelectGen(value) {
                return (this.genval.id);
            },
            */

            carga(){

                this.limpiar();

                axios.get(`/genero?id=${''}`)
                    .then(res => {
                        this.generos = res.data;
                    });

                axios.get(`/cargo?id=${''}`)
                    .then(res => {
                        this.cargos = res.data;
                    });   

                axios.get(`/depto?id=${''}`)
                    .then(res => {
                        this.deptos = res.data;
                    }); 
                axios.get(`/nacionalidad?id=${''}`)
                    .then(res => {
                        this.naciones = res.data;
                    });  
                axios.get(`/horario?id=${''}`)
                    .then(res => {
                        this.horarios = res.data;
                    });                                                        
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
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                const params = { rut : clean(this.empleado.rut),
                                 nombre : this.empleado.nombre,
                                 apellido_p : this.empleado.apellido_p, 
                                 apellido_m : this.empleado.apellido_m,
                                 fono : this.empleado.fono,
                                 direccion : this.empleado.direccion,
                                 fecha_nacimiento : this.empleado.fecha_nacimiento,
                                 idgenero : this.genval.id,
                                 idnacion : this.nacval.id,
                                 idcargo : this.carval.id,
                                 iddepto : this.deptoval.id,  
                                 idhorario : this.horarioval.id
                                }

                this.limpiar()                              

                axios.post('/empleados', params)
                    .then( res => {
                                              
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()

                    })
                    .catch((error)=> {
                        //alert(error.message)
                        swal('Rut Ingresado Incorrecto', 'Datos Duplicados, Imposible Guardar.', 'error');
                    })

            },

            edit(){
                console.log('editar')

                $('#EditarModal').modal('toggle');
                $('#EditarModal'+ ' .close').click();

                if(this.genval_e.id != null){
                    this.genval_id_edit = this.genval_e.id
                }
                if(this.nacval_e.id != null){
                    this.nacval_id_edit = this.nacval_e.id
                }                
                if(this.carval_e.id != null){
                    this.carval_id_edit = this.carval_e.id
                }
                if(this.deptoval_e.id != null){
                    this.deptoval_id_edit = this.deptoval_e.id
                } 
                if(this.horario_e.id != null){
                    this.horario_id_edit = this.horario_e.id 
                } 

                console.log(' -- ' + this.genval_e.id +' '+ this.carval_e.id +' '+ this.deptoval_e.id  +' '+ this.nacval_e.id)

                const params = { rut : clean(this.empleado_edit.rut),
                                 nombre : this.empleado_edit.nombre,
                                 apellido_p : this.empleado_edit.apellido_p, 
                                 apellido_m : this.empleado_edit.apellido_m,
                                 fono : this.empleado_edit.fono,
                                 direccion : this.empleado_edit.direccion,
                                 fecha_nacimiento : this.empleado_edit.fecha_nacimiento,
                                 idgenero : this.genval_id_edit,
                                 idnacion : this.nacval_id_edit,
                                 idcargo : this.carval_id_edit,
                                 iddepto : this.deptoval_id_edit,
                                 idhorario : this.horario_id_edit  
                                }
                              
                console.log(params)
                this.limpiar()
                console.log( this.indice )
                console.log( this.id_edit )

                axios.put(`/empleados/${this.id_edit}`, params)
                    .then( res => {                        

                        var table = $('#datatable').DataTable( ) 
                        table.rows( this.indice ).remove().draw()
                        table.row.add( res.data[0] ).draw()

                    })

            },
        
        }
    }

</script>