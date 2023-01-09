<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor Periodos de Asistencia</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">Asistencia</li>
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
                                    <h3 class="card-title">Listado de Asistencia</h3>
                                    <button type="button" class="btn btn-outline-success btn-sm float-right" data-toggle="modal" data-target="#AgregarModal"> 
                                        Agregar Nuevo Registro 
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">    

                                 <table id="datatable" class="table table-bordered table-striped text-center">                                    

                                    <thead>
                                        <tr>
                                            <th>Id Reg.</th>
                                            <th>Periodo</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>   
                                            <th>Asistencia</th>                                         
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
            <div class="modal-dialog" role="document">

                <form role="form" @submit.prevent="agregar">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AgregarModal">Agregar Registro de Asistencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">    

                            <div class="form-group col-md-6">
                                <label for="descripcion">Rut Empleado</label>
                                <input type="text" class="form-control" id="rut" name="rut" v-model="rut" @change="formatrut()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" >
                            </div>
    
                            <div class="form-group col-md-6">
                                <label for="cargo">Periodos</label>
                                <multiselect 
                                    v-model="periodos_val" 
                                    :options="periodos"                                     
                                    :custom-label="Labelperiodo"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="" v-model="empleado.nombre" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidop">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidop" name="apellidop" v-model="empleado.apellido_p" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidom">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidom" name="apellidom" v-model="empleado.apellido_m" disabled>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Tipo de Horario</label>
                                <input type="text" class="form-control" id="" v-model="horario" disabled>
                            </div>

                            <div class="form-group col-md-3"  v-if=" empleado.horario == 'Por Hora' ">
                                <label>Tope Mes</label>
                                <input type="text" class="form-control" id="" v-model="tope_mes " disabled>
                            </div>

                            <div class="form-group col-md-3" v-if=" empleado.horario == 'Por Hora' ">
                                <label for="v_hora">HH Trabajadas</label>
                                <input type="number" class="form-control" id="v_hora" name="v_hora" v-model="asistencia.horas" 
                                min="0" max="999999999" placeholder="Ingrese las Horas Trabajadas">
                            </div>

                            <div class="form-group col-md-6" v-if=" empleado.horario === 'Mensual' ">
                                <label for="renta">Días de Asistencia</label>
                                <input type="number" class="form-control" id="renta" name="renta" v-model="asistencia.dias" 
                                min="0" max="999999999" placeholder="Ingrese los días Trabajados">
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
            <div class="modal-dialog" role="document">

                <form role="form" @submit.prevent="edit">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditarModal">Editar Registro de Asistencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
<div class="form-row">    

                            <div class="form-group col-md-6">
                                <label for="descripcion">Rut Empleado</label>
                                <input type="text" class="form-control" id="rut" name="rut" v-model="this.empleado_edit.rut" @change="formatrut()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" disabled>
                            </div>
    
                            <div class="form-group col-md-6">
                                <label>Mes Periodo</label>
                                <input type="text" class="form-control" id="" v-model="asistencia_edit.mes_periodo" disabled>
                               
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="" v-model="empleado_edit.nombre" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidop">Apellido Paterno</label>
                                <input type="text" class="form-control" id="apellidop" name="apellidop" v-model="empleado_edit.apellido_p" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellidom">Apellido Materno</label>
                                <input type="text" class="form-control" id="apellidom" name="apellidom" v-model="empleado_edit.apellido_m" disabled>
                            </div>

                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label>Tipo de Horario</label>
                                <input type="text" class="form-control" id="" v-model="horario" disabled>
                            </div>

                            <div class="form-group col-md-3"  v-if=" empleado_edit.horario == 'Por Hora' ">
                                <label>Tope Mes</label>
                                <input type="text" class="form-control" id="" v-model="tope_mes " disabled>
                            </div>

                            <div class="form-group col-md-3" v-if=" empleado_edit.horario == 'Por Hora' ">
                                <label for="v_hora">HH Trabajadas</label>
                                <input type="number" class="form-control" id="v_hora" name="v_hora" v-model="asistencia_edit.horas" 
                                min="0" max="999999999" placeholder="Ingrese las Horas Trabajadas">
                            </div>

                            <div class="form-group col-md-6" v-if=" empleado_edit.horario === 'Mensual' ">
                                <label for="renta">Días de Asistencia</label>
                                <input type="number" class="form-control" id="renta" name="renta" v-model="asistencia_edit.dias" 
                                min="0" max="999999999" placeholder="Ingrese los días Trabajados">
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
            console.log('Componente Periodo de Asistencia.') 
        },
        
        data(){
            return {
                rut                      : '',
                periodos              : [],
                periodos_val        : '',
                horario                : '',
                tope_mes            : 0,
                empleado            : { rut : '', nombre : '', apellido_p : '', apellido_m : '', horario : '', id_contrato : '', id_empleado : '', hh_pactadas : '' },
                empleado_edit     : { rut : '', nombre : '', apellido_p : '', apellido_m : '', horario : '', id_contrato : '', id_empleado : '', hh_pactadas : '' },
                
                asistencia            : {  dias: '', horas: '' },
                asistencia_edit     : {  dias: '', horas: '', id_periodo: '', mes_periodo: '' },
                
                id_edit                 : '',
                indice                  : ''                                    
            }

        },

        created(){           
            this.list();
            this.carga();
            this.limpiar();
        },

        methods:{

            limpiar(){

                this.rut                    = ''
                this.empleado.id_contrato   = ''
                this.empleado.id_empleado   = ''
                this.empleado.rut           = ''
                this.empleado.nombre        = ''
                this.empleado.apellido_p    = ''
                this.empleado.apellido_m    = ''
                this.empleado.horario       = ''
                this.horario                   = ''   
                this.tope_mes                = ''     
             
            },            

            carga(){

                this.limpiar();

                axios.get(`/periodo_liq?id=${''}`)
                    .then(res => {
                        this.periodos = res.data;
                    });
            },        

            Labelperiodo (option){
                return `${option.mes}`
            },  

            formatrut(){
                    
                if(this.rut!=''){                    
                    if(validate(this.rut)==false){
                        swal('Rut Ingresado Incorrecto', 'Datos Incorrectos', 'error');
                        this.rut = clean(this.rut);
                    }else{
                        this.rut = format(this.rut);
                    }
                }

                //-------------- Levanta datos de empleado ----------------
                console.log('query')
                let dato = clean(this.rut)
                axios.get(`/asistencia_rut?rut=${dato}`)
                    .then(res => {                
                        console.log( res.data[0] )   
                        this.empleado.id_contrato       =   res.data[0].id
                        this.empleado.id_empleado    =   res.data[0].id_empleado
                        this.empleado.rut                  =   res.data[0].rut
                        this.empleado.nombre            =   res.data[0].nombre
                        this.empleado.apellido_p        =   res.data[0].apellido_p
                        this.empleado.apellido_m        =   res.data[0].apellido_m
                        this.empleado.horario           =   res.data[0].tipo_horario 
                        this.empleado.hh_pactadas   =   res.data[0].horas                        
                        this.tope_mes = this.empleado.hh_pactadas  * 4

                        console.log(this.empleado.hh_pactadas)

                        if ( this.empleado.hh_pactadas > 0 ){                
                            this.horario                =   this.empleado.horario + '  (HH. Pactadas ' + this.empleado.hh_pactadas + ' hrs.)'
                        } else {
                            this.horario                =   this.empleado.horario
                        }  

                    })
                    .catch(error => {   
                            swal("Rut no Encontrado.","Rut ingresado No existe o No Cuenta con Contrato Vigente.", "error")
                            $('#AgregarModal').modal('toggle')
                            $('#AgregarModal'+ ' .close').click()
                            this.limpiar();
                    })  
  
                //---------------------------------------------------------

            },

            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                const params = { id_empleado : this.empleado.id_empleado,
                                        id_contrato : this.empleado.id_contrato,
                                        dias        : this.asistencia.dias,
                                        horas       : this.asistencia.horas,
                                        id_periodo  : this.periodos_val.id,
                                        mes_periodo : this.periodos_val.mes
                                        }    

                axios.post('/asistencia', params)
                    .then( res => {
                        //this.cargos.push(res.data[0])
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()
                    })

                this.limpiar()  

            },

            list(){
                axios.get(`/asistencia?id=${''}`)
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
                                { "data"   : "mes_periodo" },
                                { "data"   : "nombre" },
                                { "data"   : "apellido_p" },
                                { "data"   : "asistencia" },
                                { 
                                    "data": "id" ,"render": function (data, type, row, meta) {                                        
                                    return ' <button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fas fa-minus-circle"></i></button> <button type="button" class="edit btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#EditarModal"><i class="fas fa-edit"></i></button> '                                    
                                    }
                                },                                                                      
                                ]

                        } );                   

                        $('#datatable ').on('click', 'button.delete', function (e) {
                            e.preventDefault();    
                            var table = $('#datatable').DataTable();
                            var data = table.row($(this).closest('tr')).data()["id"]
                            var index = table.row($(this).closest('tr')).index()
                            console.log('delete table :' + data)                      
                                
                            swal({
                            title: "Eliminar",
                            text: "Desea eliminar el registro seleccionado?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    swal("Registro eliminado!!", {
                                    icon: "success",
                                    })

                                    var rows = table.rows( index ).remove().draw()    
                                    console.log('index tabla :' + index) 

                                    axios.delete(`/asistencia/${data}`)
                                        .then(()=>{
                                            console.log('delete base: ' + data)
                                        })

                                } else {
                                    swal("Usted ha Cancelado la eliminación del registro.")
                                }
                            })                                  
                                
                        })

                        $('#datatable ').on('click', 'button.edit', function (e) {
                            e.preventDefault();    
                            var table = $('#datatable').DataTable();
                            var data = table.row($(this).closest('tr')).data()["id"]
                            var index = table.row($(this).closest('tr')).index()
                            console.log('edit table :' + data)

                            axios.get(`/asistencia?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                console.log(res.data[0].nombre)
                                self.editar(res.data, index)
                            })    
                                                           
                        })                        

                    });                
            },
          
            editar: function(item, index){
                console.log('editar')

                this.indice                             = index
                this.id_edit                            = item[0].id

                this.empleado_edit.id_contrato       =   item[0].id_contrato
                this.empleado_edit.id_empleado     =  item[0].id_empleado
                this.empleado_edit.rut                   =  item[0].rut
                this.empleado_edit.nombre            =  item[0].nombre
                this.empleado_edit.apellido_p         =  item[0].apellido_p
                this.empleado_edit.apellido_m        =  item[0].apellido_m
                this.empleado_edit.horario             =   item[0].tipo_horario 
                this.empleado_edit.hh_pactadas     =   item[0].horas
                this.tope_mes                               =  this.empleado_edit.hh_pactadas  * 4

                if ( this.empleado_edit.hh_pactadas > 0 ){                
                    this.horario                =   this.empleado_edit.horario + '  (HH. Pactadas ' + this.empleado_edit.hh_pactadas + ' hrs.)'
                } else {
                    this.horario                =   this.empleado_edit.horario
                }  

                this.asistencia_edit.dias              =   item[0].dias_asistencia
                this.asistencia_edit.horas            =   item[0].horas_asistencia
                this.asistencia_edit.id_periodo     =   item[0].id_periodo
                this.asistencia_edit.mes_periodo =   item[0].mes_periodo                
                
            },
        
            edit(){

                swal({
                title: "Modificar",
                text: "Desea guardar los cambios realizados?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Datos guardados!!", {
                        icon: "success",
                        })

                        $('#EditarModal').modal('toggle');
                        $('#EditarModal'+ ' .close').click();

                        const params = {   
                                                    dias               : this.asistencia_edit.dias,
                                                    horas             : this.asistencia_edit.horas
                                                }

                        console.log(params)

                            axios.put(`/asistencia/${this.id_edit}`, params)
                                .then(res => {
                                    
                                    var table = $('#datatable').DataTable( ) 
                                    table.rows( this.indice ).remove().draw()
                                    table.row.add( res.data[0] ).draw()
                                
                                }) 

                    } else {
                        swal("Usted ha Cancelado la Modificación de datos.")
                    }
                })       
                          
            }
        }
    }

</script>