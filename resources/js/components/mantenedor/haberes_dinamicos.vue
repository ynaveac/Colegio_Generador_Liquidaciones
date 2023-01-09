<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Haberes y Descuentos Dinamicos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">Periodos</li>
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
                                    <button type="button" class="btn btn-outline-success btn-sm float-right" data-toggle="modal" data-target="#AgregarModal"> 
                                        Agregar Nuevo Items 
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">    

                                 <table id="datatable" class="table table-bordered table-striped text-center">                                    

                                    <thead>
                                        <tr>
                                            <th>Id Reg.</th>
                                            <th>Nombre Glosa</th>
                                            <th>Empleado</th>
                                            <th>Valor</th>
                                            <th>Periodo</th>
                                            <th>Todos los Periodos</th>
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
                        <h5 class="modal-title" id="AgregarModal">Agregar Nuevo Items</h5>
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
                                <label for="cargo">Haberes</label>
                                <multiselect 
                                    v-model="haber_val" 
                                    :options="haberes"                                     
                                    :custom-label="Labelhaber"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
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

                            <div class="form-group col-md-6">
                                <label for="cargo">Todos los Periodos</label>
                                <multiselect 
                                    v-model="todos_val" 
                                    :options="todos"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-6">
                                <label for="renta">Valor</label>
                                <input type="number" class="form-control" id="valor" name="valor" v-model="valor" 
                                min="0" max="999999999" placeholder="Ingrese Valor">
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
                        <h5 class="modal-title" id="EditarModal">Editar Departamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">    

                        <div class="form-row">                   
                        
                            <div class="form-group col-md-6">
                                <label for="descripcion">Empleado</label>
                                <input type="text" class="form-control" id="" v-model="this.empleado_edit" disabled>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cargo">Haberes</label>
                                <label class="btn btn-block btn-info btn-xs">{{ haber_val_edit }}</label>
                                <multiselect 
                                    v-model="haber_val" 
                                    :options="haberes"                                     
                                    :custom-label="Labelhaber"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-6">
                                <label for="cargo">Periodos</label>
                                <label class="btn btn-block btn-info btn-xs">{{ periodos_val_edit }}</label>
                                <multiselect 
                                    v-model="periodos_val" 
                                    :options="periodos"                                     
                                    :custom-label="Labelperiodo"
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div> 

                            <div class="form-group col-md-6">
                                <label for="cargo">Todos los Periodos</label>
                                <label class="btn btn-block btn-info btn-xs">{{ todos_val_edit }}</label>
                                <multiselect 
                                    v-model="todos_val" 
                                    :options="todos"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-6">
                                <label for="renta">Valor</label>
                                <input type="number" class="form-control" id="valor" name="valor" v-model="valor_edit" 
                                min="0" max="999999999" placeholder="Ingrese Valor">
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

    const { validate, clean, format } = require('rut.js')  

    Vue.component('datatables', datatables)
  
    export default {    
    
        mounted() {
            console.log('Componente Haberes dinamicos.') 
        },
        
        
        data(){
            return {
                rut                  : '',
                haberes              : [],
                haber_val            : '',
                periodos             : [],
                periodos_val         : '',     
                todos                : ['Si', 'No'],
                todos_val            : '',           
                valor                : '',
                id_empleado          : '',

                idhaber_edit         : '',
                haber_val_edit       : '',
                periodos_val_edit    : '',
                todos_val_edit       : '',
                valor_edit           : '',
                id_empleado_edit     : '',
                empleado_edit        : '',

                id_edit              : '',
                indice               : ''                                    
            }

        },

        created(){           
            this.list();
            this.limpiar();
            this.carga();
        },

        methods:{

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
                       // console.log( res.data[0] )   

                        this.id_empleado            =   res.data[0].id_empleado
                        swal("Empleado Existente.","Nombre : "+res.data[0].nombre+" "+res.data[0].apellido_p+".", "success")

                    })
                    .catch(error => {   
                            swal("Rut no Encontrado.","Rut ingresado No existe o No Cuenta con Contrato Vigente.", "error")
                            $('#AgregarModal').modal('toggle')
                            $('#AgregarModal'+ ' .close').click()
                            this.limpiar();
                    })  
  
                //---------------------------------------------------------

            },

            carga(){

                this.limpiar();

                axios.get(`/haberes?id=${''}`)
                    .then(res => {
                        this.haberes = res.data;
                    });
                axios.get(`/periodo_liq?id=${''}`)
                    .then(res => {
                        this.periodos = res.data;
                    });                    
            },        

            Labelperiodo (option){
                return `${option.mes}`
            },  
            Labelhaber (option){
                return `${option.tipo}` + " - " + `${option.glosa}`
            },            

            list(){
                axios.get(`/haberesdinamicos?id=${''}`)
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
                                { "data"   : "idhaberes_dinamicos" },
                                { "data"   : "haber" },
                                { "data"   : "empleado" },
                                { "data"   : "valor_haber" },
                                { "data"   : "periodo" },
                                { "data"   : "todos_periodos" },
                                { 
                                    "data": "idhaberes_dinamicos" ,"render": function (data, type, row, meta) {                                        
                                    return ' <button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fas fa-minus-circle"></i></button> <button type="button" class="edit btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#EditarModal"><i class="fas fa-edit"></i></button> '                                    
                                    }
                                },                                                                      
                                ]

                        } );                   

                        $('#datatable ').on('click', 'button.delete', function (e) {
                            e.preventDefault();    
                            var table = $('#datatable').DataTable();
                            var data = table.row($(this).closest('tr')).data()["idhaberes_dinamicos"]
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

                                    axios.delete(`/haberesdinamicos/${data}`)
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
                            var data = table.row($(this).closest('tr')).data()["idhaberes_dinamicos"]
                            var index = table.row($(this).closest('tr')).index()
                            console.log('edit table :' + data)

                            axios.get(`/haberesdinamicos?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                console.log(res.data[0].haber)
                                self.editar(res.data, index)
                            })    
                                                           
                        })                        

                    });                
            },

            limpiar(){
                this.rut                 = ''
                this.haber_val           = ''
                this.periodos_val        = ''     
                this.todos_val           = ''
                this.valor               = ''
                this.id_empleado         = ''

                this.haber_val_edit      = ''
                this.periodos_val_edit   = ''
                this.todos_val_edit      = ''
                this.valor_edit          = ''
                this.id_empleado_edit    = ''
                this.empleado_edit       = ''
                
                this.idhaber_edit        = ''        
            },
           
            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                const params = { id_empleado : this.id_empleado,
                                          haber_val : this.haber_val.id,
                                          periodos_val : this.periodos_val.mes,
                                          todos_val : this.todos_val,
                                          valor : this.valor
                                        }                        

                this.limpiar()        
                
                //console.log(params)

                axios.post('/haberesdinamicos', params)
                    .then( res => {
                        //this.cargos.push(res.data[0])
                         swal("Dato Guardado.","Dato guardado Correctamente.", "success")
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()
                    })

            },

            editar: function(item, index){
                console.log('editar')

                this.indice              = index
                this.id_edit             = item[0].idhaberes_dinamicos

                this.idhaber_edit        = item[0].id_haberes
                this.haber_val_edit      = item[0].haber
                this.periodos_val_edit   = item[0].periodo
                this.todos_val_edit      = item[0].todos_periodos
                this.valor_edit          = item[0].valor_haber
                this.id_empleado_edit    = item[0].id_empleado
                this.empleado_edit       = item[0].empleado
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

                        if (this.haber_val != '') {

                            let hab = this.haber_val.tipo.concat( " - ", this.haber_val.glosa )
                        
                            if ( hab != this.haber_val_edit) {
                                this.idhaber_edit = this.haber_val.id
                            }
                        }
                        
                        if (this.periodos_val != '') {
                          if ( this.periodos_val.mes != this.periodos_val_edit) {
                               this.periodos_val_edit = this.periodos_val.mes
                            } 
                        }     
                        
                        if (this.todos_val != '') {
                          if ( this.todos_val != this.todos_val_edit) {
                               this.todos_val_edit = this.todos_val
                            } 
                        }
                        
                        const params =  { 
                                         idhaberes  : this.idhaber_edit,
                                         valor      : this.valor_edit,
                                         idempleado : this.id_empleado_edit,
                                         periodo    : this.periodos_val_edit,
                                         todosp     : this.todos_val_edit
                                        }

                        console.log(params)

                            axios.put(`/haberesdinamicos/${this.id_edit}`, params)
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