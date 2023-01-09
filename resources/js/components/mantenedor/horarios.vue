<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Horarios</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">afp</li>
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
                                            <th>Tipo Horario</th>
                                            <th>Cant. Horas</th>
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

            <!-- Modal Agregar nuevo  -->
            <!-- Modal -->
            <div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="AgregarModal" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <form role="form" @submit.prevent="agregar">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AgregarModal">Agregar Nuevo Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" v-model="horario.nombre" placeholder="Nombres" required>
                            </div>                        

                        </div>

                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="thorario">Tipo de Contrato</label>
                                    <multiselect 
                                        v-model="tipo_horario" 
                                        :options="tipo"                                     
                                        :searchable="false" 
                                        :close-on-select="true"
                                        @input="cambio_tipo"
                                        :show-labels="false" placeholder="Seleccione...">
                                    </multiselect>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="horas">Cantidad de Horas</label>
                                    <input type="number" class="form-control" id="horas" name="horas" 
                                    v-model="horario.cantidad" :disabled="disabled"
                                    min="0" max="45" placeholder="Ingrese Cantidad de Horas">
                                </div>                            

                        </div>                        

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <textarea rows="3" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción." v-model="horario.descripcion">
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
                        <h5 class="modal-title" id="EditarModal">Editar Horario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control" id="nombre" v-model="horario_edit.nombre" placeholder="Nombres" required>
                            </div>
                        

                        </div>

                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="thorario">Tipo de Contrato</label>
                                    <label class="btn btn-block btn-info btn-xs">{{ t_horario }}</label>
                                    <multiselect 
                                        v-model="tipo_horario_edit" 
                                        :options="tipo"                                 
                                        :searchable="false"     
                                        :close-on-select="true"
                                        @input="cambio_tipo"
                                        :show-labels="false" placeholder="Seleccione...">
                                    </multiselect>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="horas">Cantidad de Horas</label>
                                    <input type="number" class="form-control" id="horas" name="horas" 
                                    v-model="horario_edit.cantidad" :disabled="disabled"
                                    min="0" max="45" placeholder="Ingrese Cantidad de Horas">
                                </div>                            

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <textarea rows="3" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción." v-model="horario_edit.descripcion">
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
            console.log('Componente horarios.') 
        },
        
        
        data(){
            return {
                disabled            : true,
                tipo                : [ 'Mensual', 'Por Hora' ],
                tipo_horario        : '',
                tipo_horario_edit   : '',
                horario             : { nombre: '', descripcion: '', cantidad: '' },
                horario_edit        : { nombre: '', descripcion: '', cantidad: '' },
                t_horario           : '',
                id_edit             : '',
                indice              : ''                                    
            }

        },

        created(){           
            this.list();
            this.limpiar();
        },

        methods:{

            cambio_tipo() {
                console.log(this.tipo_horario);

                if( this.tipo_horario === 'Mensual' ){                    
                    this.disabled = true;
                }
                if( this.tipo_horario === 'Por Hora' ){                    
                    this.disabled = false;
                }     
                this.horario.cantidad = '';

                console.log(this.tipo_horario_edit);

                if( this.tipo_horario_edit === 'Mensual' ){                    
                    this.disabled = true;
                }
                if( this.tipo_horario_edit === 'Por Hora' ){                    
                    this.disabled = false;
                }     
                this.horario_edit.cantidad = '';

            },

            list(){
                axios.get(`/horario?id=${''}`)
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
                                { "data"   : "tipo" },
                                { "data"   : "horas" },
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

                                    axios.delete(`/horario/${data}`)
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

                            axios.get(`/horario?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)                                
                                self.editar(res.data, index)
                            })    
                                                           
                        })                        

                    });                
            },

            limpiar(){
                this.horario.nombre = '';
                this.horario.descripcion = '';
                this.horario.cantidad = '';
                this.tipo_horario = '';  

                this.horario_edit.nombre = '';
                this.horario_edit.descripcion = '';     
                this.horario_edit.cantidad = '';
                this.t_horario = '';            
            },
           
            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                console.log(this.horario.nombre, this.horario.descripcion, this.tipo_horario, this.horario.cantidad);
                const params = { nombre : this.horario.nombre, descripcion : this.horario.descripcion, tipo : this.tipo_horario, horas : this.horario.cantidad }
                
                this.limpiar()              

                axios.post('/horario', params)
                    .then( res => {
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()
                    })

            },

            editar: function(item, index){
                console.log('editar')

                this.indice                           = index
                this.id_edit                          = item[0].id
                this.horario_edit.nombre              = item[0].nombre                
                this.horario_edit.descripcion         = item[0].descripcion
                this.t_horario                        = item[0].tipo
                this.horario_edit.cantidad            = item[0].horas 

                console.log(item)

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

                        const params = { nombre: this.horario_edit.nombre, descripcion: this.horario_edit.descripcion, tipo : this.tipo_horario_edit, horas : this.horario_edit.cantidad }
                        console.log(params)

                            axios.put(`/horario/${this.id_edit}`, params)
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