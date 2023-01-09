<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor Tabla de Gratificaciones</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">gratificacion</li>
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
                                        Agregar Nuevo Item de Gratificación
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">    

                                 <table id="datatable" class="table table-bordered table-striped text-center">                                    

                                    <thead>
                                        <tr>
                                            <th>Id Reg.</th>
                                            <th>% Gratificación</th>
                                            <th>Tope</th>
                                            <th>Sueldo Minimo</th>
                                            <th>Periodo Inicio</th>
                                            <th>Periodo Termino</th>
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
                        <h5 class="modal-title" id="AgregarModal">Agregar Item de Gratificación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Gratificación</label>
                                <input type="number" class="form-control" step="0.01" min="0.00" max="9.99"
                                       id="gratificacion" name="gratificacion" maxlength="3" size="3" placeholder="Ej: 0.20" v-model="grat.porcentaje" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tope</label>
                                <input type="number" class="form-control" step="0.01" min="0.00" max="9.99"
                                       id="gratificacion" name="gratificacion" maxlength="4" size="4" placeholder="Ej: 1.45" v-model="grat.tope" required>
                            </div>                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fcinicio">Periodo de Inicio</label>
                                <input type="date" class="form-control" id="fcinicio" name="fcinicio" placeholder="Periodo de Inicio" v-model="grat.inicio" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fctermino">Periodo de Termino</label>
                                <input type="date" class="form-control" id="fctermino" name="fctermino"  placeholder="Periodo de Termino" v-model="grat.termino" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Sueldo Minimo del Periodo</label>
                                <input type="number" class="form-control" min="0" max="9999999"
                                       id="sueldo" name="sueldo" maxlength="7" size="7" placeholder="Ej: 301000" v-model="grat.sueldo_m" required>
                            </div>                              
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <textarea rows="3" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción." v-model="grat.descripcion">
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

            <!-- Modal -->
            <div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModal" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <form role="form" @submit.prevent="edit">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditarModal">Editar Item de Gratificación</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Gratificación</label>
                                <input type="number" class="form-control" step="0.01" min="0.00" max="9.99"
                                       id="gratificacion" name="gratificacion" maxlength="3" size="3" placeholder="Ej: 0.20" v-model="grat_edit.porcentaje" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tope</label>
                                <input type="number" class="form-control" step="0.01" min="0.00" max="9.99"
                                       id="gratificacion" name="gratificacion" maxlength="4" size="4" placeholder="Ej: 1.45" v-model="grat_edit.tope" required>
                            </div>                            
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fcinicio">Periodo de Inicio</label>
                                <input type="date" class="form-control" id="fcinicio" name="fcinicio" placeholder="Periodo de Inicio" v-model="grat_edit.inicio" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fctermino">Periodo de Termino</label>
                                <input type="date" class="form-control" id="fctermino" name="fctermino"  placeholder="Periodo de Termino" v-model="grat_edit.termino" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Sueldo Minimo del Periodo</label>
                                <input type="number" class="form-control" min="0" max="9999999"
                                       id="sueldo" name="sueldo" maxlength="7" size="7" placeholder="Ej: 301000" v-model="grat_edit.sueldo_m" required>
                            </div>                              
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="descripcion">Descripción</label>
                                <textarea rows="3" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción." v-model="grat_edit.descripcion">
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
            console.log('Componente Gratificacion.') 
        },
        
        
        data(){
            return {

                grat : { porcentaje : '', tope : '', sueldo_m : '', inicio : '', termino : '', descripcion : '' },
                grat_edit : { porcentaje : '', tope : '', sueldo_m : '', inicio : '', termino : '', descripcion : '' },
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
                axios.get(`/gratificacion?id=${''}`)
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
                                { "data"   : "gratificacion" },
                                { "data"   : "tope" },
                                { "data"   : "sueldo_m" },
                                { "data"   : "periodo_inicio" },
                                { "data"   : "periodo_fin" },
                                { 
                                    "data": "id" ,"render": function (data, type, row, meta) {                                        
                                    return ' <button type="button" class="delete btn btn-outline-danger btn-sm"><i class="fas fa-minus-circle"></i></button> <button type="button" class="edit btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#EditarModal"><i class="fas fa-edit"></i></button> '                                    
                                    }
                                },                                                                      
                                ]

                        } ).order( [ 3, 'desc' ] ).draw()  ;                   

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

                                    axios.delete(`/gratificacion/${data}`)
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

                            axios.get(`/gratificacion?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                self.editar(res.data, index)
                            })    
                                                           
                        })                        
 
                    });               
            },

            limpiar(){
                this.grat.porcentaje = "";
                this.grat.tope = "";   
                this.grat.sueldo_m = "";
                this.grat.inicio = "";     
                this.grat.termino = "";   
                this.grat.descripcion = "";               
            },
           
            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                console.log( this.grat.porcentaje, this.grat.tope, this.grat.sueldo_m, this.grat.inicio, this.grat.termino, this.grat.descripcion );
 
                const params = {
                                porcentaje  : this.grat.porcentaje, 
                                tope        : this.grat.tope, 
                                sueldo_m    : this.grat.sueldo_m, 
                                inicio      : this.grat.inicio, 
                                termino     : this.grat.termino, 
                                descripcion : this.grat.descripcion                                                                 
                                }
                
                this.limpiar()            

                axios.post('/gratificacion', params)
                    .then( res => {
                        var table = $('#datatable').DataTable( ) 
                        table.row.add( res.data[0] ).draw()
                    })

            },

            editar: function(item, index){
                console.log('editar')

                this.indice                     = index
                this.id_edit                    = item[0].id
                this.grat_edit.porcentaje       = item[0].gratificacion  
                this.grat_edit.tope             = item[0].tope 
                this.grat_edit.sueldo_m         = item[0].sueldo_m 
                this.grat_edit.inicio           = item[0].periodo_inicio 
                this.grat_edit.termino          = item[0].periodo_fin 
                this.grat_edit.descripcion      = item[0].descripcion 

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

                        console.log( this.grat_edit.porcentaje, this.grat_edit.tope, this.grat_edit.sueldo_m, this.grat_edit.inicio, this.grat_edit.termino, this.grat_edit.descripcion );
        
                        const params = {
                                        porcentaje  : this.grat_edit.porcentaje, 
                                        tope        : this.grat_edit.tope, 
                                        sueldo_m    : this.grat_edit.sueldo_m, 
                                        inicio      : this.grat_edit.inicio, 
                                        termino     : this.grat_edit.termino, 
                                        descripcion : this.grat_edit.descripcion                                                                 
                                        }

                            axios.put(`/gratificacion/${this.id_edit}`, params)
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