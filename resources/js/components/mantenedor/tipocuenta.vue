<style>

</style>

<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Tipo de Cuenta</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">Tipo de Cuenta</li>
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
                                            <th>Nombre</th>
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
                        
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="tcuenta" v-model="tipocuenta" placeholder="Ingrese tipo de cuenta" required>
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
                            <h5 class="modal-title" id="EditarModal">Editar Items</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                
                        <div class="modal-body">                    
                            
                            <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="tcuenta" v-model="tipocuenta_edit" placeholder="Ingrese nombre banco" required>
                                </div>

                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
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
            console.log('Componente tipo cuenta.') 
        },
        
        
        data(){
            return {

                tipocuenta          : '',
                tipocuenta_edit     : '',
                id_edit             : '',
                indice              : ''                    
                //-----------------------                                      
            }

        },

        created(){           

            this.listemp();

        },

        methods:{

            listemp(){
                axios.get(`/tipocuenta?id=${''}`)
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
                                { "data"   : "nombre" },
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

                            var rows = table.rows( index ).remove().draw()    
                            console.log('index tabla :' + index)                        

                            axios.delete(`/tipocuenta/${data}`)
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

                            axios.get(`/tipocuenta?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                self.editar(res.data, index)
                            })    
                                                           
                        })

                    });                
            },
            editar: function(item, index){
                console.log(item)
       
                this.indice                      = index
                this.id_edit                     = item[0].id
                this.tipocuenta_edit             = item[0].nombre                //this.empleado_edit.rut = item.rut            
            },

            limpiar(){
                this.tipocuenta         = ""
                this.btipocuenta_edit   = ""
            },
           
            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                const params = { 
                                 nombre : this.tipocuenta                                  
                                }

                this.limpiar()                              

                axios.post('/tipocuenta', params)  
                    .then( res => {
                                              
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()

                    })

            },

            edit(){
                console.log('editar')

                $('#EditarModal').modal('toggle');
                $('#EditarModal'+ ' .close').click();


                const params = { 
                                 nombre : this.tipocuenta_edit
                                }
                              
                this.limpiar()
                console.log( this.indice )
                console.log( this.id_edit )

                axios.put(`/tipocuenta/${this.id_edit}`, params)
                    .then( res => {                        

                        var table = $('#datatable').DataTable( ) 
                        table.rows( this.indice ).remove().draw()
                        table.row.add( res.data[0] ).draw()

                    })

            },
        
        }
    }

</script>