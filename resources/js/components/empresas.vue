<style>

</style>

<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Empresas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">empresas</li>
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
                                        Agregar Nuevo Items 
                                    </button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">    

                                 <table id="datatable" class="table table-bordered table-striped text-center">                                    

                                    <thead>
                                        <tr>
                                            <th>Id Reg.</th>
                                            <th>Rut</th>
                                            <th>Razón Social</th>
                                            <th>Rep. Legal</th>
                                            <th>Ciudad</th>
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
                        <h5 class="modal-title" id="AgregarModal">Agregar Nuevo Items</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" @change="carga()" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rut Empresa</label>
                                <input type="text" class="form-control" id="rut" name="rut" v-model="empresa.rut" @change="formatrut()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Razon Social</label>
                                <input type="text" class="form-control" id="razon_social" name="razon_social" v-model="empresa.razon_social" placeholder="Nombre Razon Social" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rut Representante Legal</label>
                                <input type="text" class="form-control" id="rut_legal" name="rut_legal" v-model="empresa.rut_rep_legal" @change="formatrut_rep()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre Representante Legal</label>
                                <input type="text" class="form-control" id="rep_legal" name="rep_legal" v-model="empresa.rep_legal" placeholder="Nombre Representante Legal" required>
                            </div>
                        </div>   

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label >Giro</label>
                                <input type="text" class="form-control" id="giro" name="giro" v-model="empresa.giro" placeholder="Giro de la Empresa" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" v-model="empresa.direccion" placeholder="Dirección Laboral" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label >Comuna</label>
                                <input type="text" class="form-control" id="comuna" name="comuna" v-model="empresa.comuna" placeholder="Ingrese Comuna" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" v-model="empresa.ciudad" placeholder="Ingrese Ciudad" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label >Telefono de Contacto</label>
                                <input type="tel" class="form-control" id="fono" name="fono" v-model="empresa.fono" placeholder="Telefono de Contacto" required>
                            </div>

                            <div class="form-group col-md-2">
                                <label >Gratificación</label>
                                <multiselect 
                                    v-model="gratif" 
                                    :options="gratifs"                                     
                                    :searchable="false" 
                                    :close-on-select="true"
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div> 

                            <div class="form-group col-md-5">
                                <label for="cargo">Caja de Compensación</label>
                                <multiselect 
                                    v-model="cajaval" 
                                    :options="cajas"                                     
                                    :custom-label="LabelCaj"
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

            <!-- Modal Editar nuevo Empleado -->
            <!-- Modal -->
            <div class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="EditarModal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">

                <form role="form" @submit.prevent="edit">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditarModal">Editar Items</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rut Empresa</label>
                                <input type="text" class="form-control" id="rut" name="rut" v-model="empresa_edit.rut" @change="formatrut_edit()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Razon Social</label>
                                <input type="text" class="form-control" id="razon_social" name="razon_social" v-model="empresa_edit.razon_social" placeholder="Nombre Razon Social" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Rut Representante Legal</label>
                                <input type="text" class="form-control" id="rut_legal" name="rut_legal" v-model="empresa_edit.rut_rep_legal" @change="formatrut_rep_edit()" 
                                                placeholder="Ej. 123456789" minlength="8" maxlength="9" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nombre Representante Legal</label>
                                <input type="text" class="form-control" id="rep_legal" name="rep_legal" v-model="empresa_edit.rep_legal" placeholder="Nombre Representante Legal" required>
                            </div>
                        </div>   

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label >Giro</label>
                                <input type="text" class="form-control" id="giro" name="giro" v-model="empresa_edit.giro" placeholder="Giro de la Empresa" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Dirección</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" v-model="empresa_edit.direccion" placeholder="Dirección Laboral" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label >Comuna</label>
                                <input type="text" class="form-control" id="comuna" name="comuna" v-model="empresa_edit.comuna" placeholder="Ingrese Comuna" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label >Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" name="ciudad" v-model="empresa_edit.ciudad" placeholder="Ingrese Ciudad" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label >Telefono de Contacto</label>
                                <input type="tel" class="form-control" id="fono" name="fono" v-model="empresa_edit.fono" placeholder="Telefono de Contacto" required>
                            </div>
                           
                            <div class="form-group col-md-2">
                                <label >Gratificación</label>
                                <label class="btn btn-block btn-info btn-xs">{{ gratif_e }}</label>
                                <multiselect 
                                    v-model="gratif_edit" 
                                    :options="gratifs"                                     
                                    :searchable="false" 
                                    :close-on-select="true"
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                            </div> 

                            <div class="form-group col-md-5">
                                <label for="cargo">Caja de Compensación</label>
                                <label class="btn btn-block btn-info btn-xs">{{ caja_edit }}</label>
                                <multiselect 
                                    v-model="cajaval_edit" 
                                    :options="cajas"                                     
                                    :custom-label="LabelCaj"
                                    :searchable="false" 
                                    :close-on-select="true"
                                    :show-labels="false" placeholder="Seleccione...">
                                </multiselect>
                               
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
    const { validate, clean, format } = require('rut.js')

    Vue.component('multiselect', Multiselect)
    Vue.component('datatables', datatables)
  
    export default {    
        components: { Multiselect },
    
        mounted() {
            console.log('Componente empresas.') 
        },
        
        
        data(){
            return {

                cajas               : [],
                gratifs             : ['Si', 'No'],
                empresa             : { rut: '', razon_social: '', rep_legal: '', rut_rep_legal: '', giro: '', direccion: '', comuna: '', ciudad: '', fono: '' },
                empresa_edit        : { rut: '', razon_social: '', rep_legal: '', rut_rep_legal: '', giro: '', direccion: '', comuna: '', ciudad: '', fono: '' },
                cajaval             : '',
                cajaval_edit        : '',
                caja_edit           : '',
                caja_id_edit        : '',
                gratif              : '',
                gratif_edit         : '',
                gratif_e            : '',

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
                axios.get(`/empresa?id=${''}`)
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
                                { "data"   : "razon_social" },
                                { "data"   : "rep_legal" },
                                { "data"   : "ciudad" },                                
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

                            axios.delete(`/empresa/${data}`)
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

                            axios.get(`/empresa?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                console.log(res.data[0].rut)
                                self.editar(res.data, index)
                            })    
                                                           
                        })

                    });                
            },
            editar: function(item, index){
                console.log( 'editar ', item)
                
                this.carga()
                this.indice                              = index
                this.id_edit                             = item[0].id
                this.empresa_edit.rut                    = item[0].rut                
                this.empresa_edit.razon_social           = item[0].razon_social 
                this.empresa_edit.rut_rep_legal          = item[0].rut_rep_legal 
                this.empresa_edit.rep_legal              = item[0].rep_legal 
                this.empresa_edit.giro                   = item[0].giro 
                this.empresa_edit.direccion              = item[0].direccion 
                this.empresa_edit.comuna                 = item[0].comuna 
                this.empresa_edit.ciudad                 = item[0].ciudad
                this.empresa_edit.fono                   = item[0].fono
                this.caja_edit                           = item[0].nm_caja
                this.caja_id_edit                        = item[0].caja_comp
                this.gratif_e                            = item[0].gratificacion
                           
            },

            limpiar(){

                this.empresa.rut = ""
                this.empresa.razon_social = ""
                this.empresa.rut_rep_legal = ""
                this.empresa.rep_legal = ""
                this.empresa.giro = ""
                this.empresa.direccion = ""
                this.empresa.comuna = ""
                this.empresa.ciudad = ""
                this.empresa.fono = ""
                this.cajas = []
                this.gratifs = []
                this.cajaval = ""
                this.cajaval_edit = ""
                this.caja_edit = ""
                this.caja_id_edit = ""
                this.gratif_edit = ""
                this.gratif = ""
                this.gratif_e = ""

                this.empresa_edit.rut = ""
                this.empresa_edit.razon_social = ""
                this.empresa_edit.rut_rep_legal = ""
                this.empresa_edit.rep_legal = ""
                this.empresa_edit.giro = ""
                this.empresa_edit.direccion = ""
                this.empresa_edit.comuna = ""
                this.empresa_edit.ciudad = ""
                this.empresa_edit.fono = ""
            },

            LabelCaj (option) {
                return `${option.nombre}`
            },

            carga(){

                this.limpiar();

                axios.get(`/cajacompensacion?id=${''}`)
                    .then(res => {
                        this.cajas = res.data;
                    });

                this.gratifs  = ['Si', 'No']   
               
            },
//---------------------------------------------------------------------------------------------------//
//---------- Formato de Rut - Revisión de formato ---------------------------------------------------// 
            formatrut(){
                
                if(this.empresa.rut!=''){                    
                    if(validate(this.empresa.rut)==false){
                        swal('Rut Ingresado Incorrecto', 'Datos Incorrectos', 'error');
                        this.empresa.rut = clean(this.empresa.rut);
                    }else{
                        this.empresa.rut = format(this.empresa.rut);
                    }
                }

            },
            formatrut_edit(){
                
                if(this.empresa_edit.rut!=''){                    
                    if(validate(this.empresa_edit.rut)==false){
                        swal('Rut Ingresado Incorrecto', 'Datos Incorrectos', 'error');
                        this.empresa_edit.rut = clean(this.empresa_edit.rut);
                    }else{
                        this.empresa_edit.rut = format(this.empresa_edit.rut);
                    }
                }

            },            
//---------- Formato de Rut - Revisión de formato ---------------------------------------------------//
            formatrut_rep(){
                
                if(this.empresa.rut_rep_legal!=''){                    
                    if(validate(this.empresa.rut_rep_legal)==false){
                        swal('Rut Ingresado Incorrecto', 'Datos Incorrectos', 'error');
                        this.empresa.rut_rep_legal = clean(this.empresa.rut_rep_legal);
                    }else{
                        this.empresa.rut_rep_legal = format(this.empresa.rut_rep_legal);
                    }
                }

            },            
            formatrut_rep_edit(){
                
                if(this.empresa_edit.rut_rep_legal!=''){                    
                    if(validate(this.empresa_edit.rut_rep_legal)==false){
                        swal('Rut Ingresado Incorrecto', 'Datos Incorrectos', 'error');
                        this.empresa_edit.rut_rep_legal = clean(this.empresa_edit.rut_rep_legal);
                    }else{
                        this.empresa_edit.rut_rep_legal = format(this.empresa_edit.rut_rep_legal);
                    }
                }

            },                  
//---------- Formato de Rut - Revisión de formato ---------------------------------------------------//
//---------------------------------------------------------------------------------------------------//

            agregar(){
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();

                const params = { rut : clean(this.empresa.rut),
                                 razon_social : this.empresa.razon_social,
                                 rep_legal : this.empresa.rep_legal, 
                                 rut_rep_legal : clean(this.empresa.rut_rep_legal),
                                 giro : this.empresa.giro,
                                 direccion : this.empresa.direccion,
                                 comuna : this.empresa.comuna,
                                 ciudad : this.empresa.ciudad,
                                 fono : this.empresa.fono,
                                 caja_comp : this.cajaval.id,
                                 gratif : this.gratif 
                                }

                this.limpiar() 
                
                console.log(params)

                axios.post('/empresa', params)
                    .then( res => {
                                              
                        var table = $('#datatable').DataTable( ) 

                        table.row.add( res.data[0] ).draw()

                    })
                swal('Datos de la Empresa Guardados', 'Formulario Empresa', 'success');   
            },

            edit(){
                console.log('editar')

                $('#EditarModal').modal('toggle');
                $('#EditarModal'+ ' .close').click();

                if(this.cajaval_edit.id != null){
                    this.caja_id_edit = this.cajaval_edit.id
                }
                if(this.gratif_edit == null){
                    this.gratif_edit = this.gratif_e
                }                

                console.log(' Edit -- ' + this.cajaval_edit.id +' '+ this.gratif_edit + ' ' + this.gratif_e)

                const params = { 
                                 rut : clean(this.empresa_edit.rut),
                                 razon_social : this.empresa_edit.razon_social,
                                 rep_legal : this.empresa_edit.rep_legal, 
                                 rut_rep_legal : clean(this.empresa_edit.rut_rep_legal),
                                 giro : this.empresa_edit.giro,
                                 direccion : this.empresa_edit.direccion,
                                 comuna : this.empresa_edit.comuna,
                                 ciudad : this.empresa_edit.ciudad,
                                 fono : this.empresa_edit.fono,
                                 caja_comp : this.caja_id_edit,
                                 gratif : this.gratif_edit                      
                                }

                console.log(params)
                this.limpiar()
                console.log( this.indice )
                console.log( this.id_edit )

                axios.put(`/empresa/${this.id_edit}`, params)
                    .then( res => {                        

                        var table = $('#datatable').DataTable( ) 
                        table.rows( this.indice ).remove().draw()
                        table.row.add( res.data[0] ).draw()

                    })
                swal('Datos de la Empresa Guardados', 'Formulario Empresa', 'success');    

            },
        
        }
    }

</script>