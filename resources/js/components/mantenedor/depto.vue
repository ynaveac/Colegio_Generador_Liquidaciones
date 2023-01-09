<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Departamentos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">departamento</li>
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
                                        Agregar Nuevo Departamento 
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">    

                                 <table id="datatable" class="table table-bordered table-striped text-center">                                    

                                    <thead>
                                        <tr>
                                            <th>Id Reg.</th>
                                            <th>Nombre</th>
                                            <th>nombre Corto</th>
                                            <th>Codigo Depto</th>
                                            <th>Descripción</th>
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
                        <h5 class="modal-title" id="AgregarModal">Agregar Nuevo Departamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre a definir" v-model="depto.nombre">
                            </div>
                        </div>    
                        <div class="form-row">    
                            <div class="form-group">
                                <label for="descripcion">Nombre Corto</label>
                                <input type="text" class="form-control" id="nomb_corto" name="nomb_corto" placeholder="Ingrese nombre corto" v-model="depto.nombre_corto">
                            </div>
                        </div>    
                        <div class="form-row">       
                            <div class="form-group">
                                <label for="descripcion">Codigo Depto.</label>
                                <input type="text" class="form-control" id="cod_depto" name="cod_depto" placeholder="Ingrese una codigo" v-model="depto.cod_depto">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <textarea rows="3" class="form-control" id="descripcion" name="descripcion" v-model="depto.des_depto" placeholder="Ingrese una descripción.">
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
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre a definir" v-model="depto_edit.nombre">
                            </div>
                        </div>    
                        <div class="form-row">    
                            <div class="form-group">
                                <label for="descripcion">Nombre Corto</label>
                                <input type="text" class="form-control" id="nomb_corto" name="nomb_corto" placeholder="Ingrese nombre corto" v-model="depto_edit.nombre_corto">
                            </div>
                        </div>    
                        <div class="form-row">       
                            <div class="form-group">
                                <label for="descripcion">Codigo Depto.</label>
                                <input type="text" class="form-control" id="cod_depto" name="cod_depto" placeholder="Ingrese una codigo" v-model="depto_edit.cod_depto">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <textarea rows="3" class="form-control" id="descripcion" name="descripcion" v-model="depto_edit.des_depto" placeholder="Ingrese una descripción.">
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

</div>            
</template>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<script>
    import datatables from 'datatables'

    Vue.component('datatables', datatables)
  
    export default {    
    
        mounted() {
            console.log('Componente depto.') 
        },
        
        
        data(){
            return {
                deptos              : [],
                depto               : { nombre: '', nombre_corto: '', cod_depto: '', des_depto: '' },
                depto_edit          : { nombre: '', nombre_corto: '', cod_depto: '', des_depto: '' },
                id_edit             : '',
                indice              : ''                                    
            }

        },

        created(){           
            this.list();
            this.limpiar();
        },

        methods:{

            list(){
                axios.get(`/depto?id=${''}`)
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
                                { "data"   : "nombre_corto" },
                                { "data"   : "cod_depto" },
                                { "data"   : "des_depto" },
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

                                    axios.delete(`/depto/${data}`)
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

                            axios.get(`/depto?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                console.log(res.data[0].nombre)
                                self.editar(res.data, index)
                            })    
                                                           
                        })                        

                    });                
            },

            limpiar(){
 
                this.depto.nombre = "";
                this.depto.nombre_corto = "";  
                this.depto.cod_depto = "";  
                this.depto.des_depto = "";  
                
                this.depto_edit.nombre = "";
                this.depto_edit.nombre_corto = "";  
                this.depto_edit.cod_depto = "";  
                this.depto_edit.des_depto = "";                 
             
            },
           
            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                const params = { nombre : this.depto.nombre,
                                 nombre_corto : this.depto.nombre_corto,
                                 cod_depto : this.depto.cod_depto, 
                                 des_depto : this.depto.des_depto }                        

                this.limpiar()

                axios.post('/depto', params)
                    .then( res => {
                        //this.cargos.push(res.data[0])
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()
                    })

            },

            editar: function(item, index){
                console.log('editar')

                this.indice             = index
                this.id_edit            = item[0].id
                this.depto_edit.nombre       = item[0].nombre;
                this.depto_edit.nombre_corto = item[0].nombre_corto;
                this.depto_edit.cod_depto    = item[0].cod_depto;
                this.depto_edit.des_depto    = item[0].des_depto;

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

                        const params = { nombre         : this.depto_edit.nombre,
                                         nombre_corto   : this.depto_edit.nombre_corto,
                                         cod_depto      : this.depto_edit.cod_depto, 
                                         des_depto      : this.depto_edit.des_depto }

                        console.log(params)

                            axios.put(`/depto/${this.id_edit}`, params)
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