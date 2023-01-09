<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Haberes y Descuentos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">Haberes - Descuentos</li>
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
                                            <th>Glosa</th>
                                            <th>Tipo</th>
                                            <th>Cabecera</th>
                                            <th>Imponible</th>
                                            <th>Fijo</th>
                                            <th>Estado</th>
                                            <th>Accion</th>
                                            
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
                        <h5 class="modal-title" id="AgregarModal">Agregar Nuevo Items</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">    

                            <div class="form-group col-md-4">
                                <label for="glosa">Glosa</label>
                                <input type="text" class="form-control" id="glosa" name="glosa" placeholder="Ingrese glosa" v-model="glosa">
                            </div>
    
                            <div class="form-group col-md-4">
                                <label for="tipo">Tipo</label>
                                <multiselect 
                                    v-model="tipo_val" 
                                    :options="tipos"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cabecera">Cabecera</label>
                                <multiselect 
                                    v-model="cabeceras_val" 
                                    :options="cabeceras"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                        </div>

                        <div class="form-row">    
   
                            <div class="form-group col-md-4">
                                <label for="imponible">Imponible</label>
                                <multiselect 
                                    v-model="imponible_val" 
                                    :options="imponible"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="fijo">Item Fijo</label>
                                <multiselect 
                                    v-model="fijo_val" 
                                    :options="fijo"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="estado">Estado Glosa</label>
                                <multiselect 
                                    v-model="estado_val" 
                                    :options="estado"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
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

                            <div class="form-group col-md-4">
                                <label for="glosa">Glosa</label>
                                <input type="text" class="form-control" id="glosa" name="glosa" placeholder="Ingrese glosa" v-model="glosa_e">
                            </div>
    
                            <div class="form-group col-md-4">
                                <label for="tipo">Tipo</label>
                                <multiselect 
                                    v-model="tipo_e_val" 
                                    :options="tipos"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="cabecera">Cabecera</label>
                                <multiselect 
                                    v-model="cabeceras_e_val" 
                                    :options="cabeceras"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                        </div>

                        <div class="form-row">    
   
                            <div class="form-group col-md-4">
                                <label for="imponible">Imponible</label>
                                <multiselect 
                                    v-model="imponible_e_val" 
                                    :options="imponible"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="fijo">Item Fijo</label>
                                <multiselect 
                                    v-model="fijo_e_val" 
                                    :options="fijo"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
                            </div>

                            <div class="form-group col-md-4">
                                <label for="estado">Estado Glosa</label>
                                <multiselect 
                                    v-model="estado_e_val" 
                                    :options="estado"                                                                         
                                    :searchable="false" 
                                    :close-on-select="true" 
                                    :show-labels="false" placeholder="Seleccione...">                                                                      
                                </multiselect>
                               
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

    Vue.component('datatables', datatables)
  
    export default {    
    
        mounted() {
            console.log('Componente Haberes y Descuentos.') 
        },
        
        
        data(){
            return {
                tipos                : [ 'Haber', 'Descuento'],
                tipo_val            : '',
                cabeceras         : [ 'Haberes Imponibles', 'Haberes No Imponibles', 'Descuentos', 'Otros Descuentos'],
                cabeceras_val   : '',
                imponible         : [ 'Si', 'No'],
                imponible_val    : '',        
                fijo                  : [ 'Si', 'No'],
                fijo_val             : '',  
                estado             : [ 'Vigente', 'No Vigente'],
                estado_val        : '',                                         
                glosa               : '',

                tipo_e_val          : '',
                cabeceras_e_val : '',  
                imponible_e_val : '',  
                fijo_e_val          : '',   
                estado_e_val     : '',
                glosa_e             : '',                                                          

                id_edit             : '',
                indice              : ''                                    
            }

        },

        created(){           
            this.list();
            this.limpiar();
        },

        methods:{

            limpiar(){
 
                this.glosa              = ''
                this.tipo_val           = ''
                this.cabeceras_val  = ''
                this.imponible_val  = ''
                this.fijo_val           = ''
                this.estado_val      = ''

                this.glosa_e              = ''
                this.tipo_e_val           = ''
                this.cabeceras_e_val  = ''
                this.imponible_e_val  = ''
                this.fijo_e_val           = ''
                this.estado_e_val      = ''            

            },

            list(){
                axios.get(`/haberes?id=${''}`)
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
                                { "data"   : "glosa" },
                                { "data"   : "tipo" },
                                { "data"   : "cabecera" },
                                { "data"   : "imponible" },
                                { "data"   : "fijo" },
                                { "data"   : "estado" },
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

                                    axios.delete(`/haberes/${data}`)
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

                            axios.get(`/haberes?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                console.log(res.data[0].glosa)
                                self.editar(res.data, index)
                            })    
                                                           
                        })                        

                    });                
            },
          
            editar: function(item, index){
                console.log('editar')

                this.indice                 = index
                this.id_edit                = item[0].id
                this.glosa_e              = item[0].glosa;
                this.tipo_e_val           = item[0].tipo;
                this.cabeceras_e_val  = item[0].cabecera;
                this.imponible_e_val  = item[0].imponible;
                this.fijo_e_val            = item[0].fijo;
                this.estado_e_val       = item[0].estado;

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
                                                    glosa           :    this.glosa_e,
                                                    tipo             :    this.tipo_e_val,
                                                    cabeceras     :   this.cabeceras_e_val,
                                                    imponible     :   this.imponible_e_val,
                                                    fijo              :   this.fijo_e_val,
                                                    estado         :   this.estado_e_val,
                                                }

                        console.log(params)

                            axios.put(`/haberes/${ this.id_edit }`, params)
                                .then(res => {
                                   
                                    var table = $('#datatable').DataTable( ) 
                                    table.rows( this.indice ).remove().draw()
                                    table.row.add( res.data[0] ).draw()
                                
                                }) 

                    } else {
                        swal("Usted ha Cancelado la Modificación de datos.")
                    }
                })       
                          
            },

            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                const params = {                                         
                                        glosa           :    this.glosa,
                                        tipo             :    this.tipo_val,
                                        cabeceras     :   this.cabeceras_val,
                                        imponible     :   this.imponible_val,
                                        fijo              :   this.fijo_val,
                                        estado         :   this.estado_val
                                       }                        

                this.limpiar()               

                axios.post('/haberes', params)
                    .then( res => {
                        //this.cargos.push(res.data[0])
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()
                    })

            }           
        }
    }

</script>