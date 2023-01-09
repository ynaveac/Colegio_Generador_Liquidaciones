<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor Unidad de fomento (UF)</h1>                        
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">uf</li>
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
                                    <button type="button" class="btn btn-outline-success btn-sm right" data-toggle="modal" data-target="#AgregarModal" @click="limpiar()">Agregar UF desde SII</button>
                                    <button type="button" class="btn btn-outline-danger btn-sm right" data-toggle="modal" data-target="#AgregarManualModal" @click="limpiar()">Agregar o Editar UF Manualmente</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">    

                                 <table id="datatable" class="table table-bordered table-striped text-center">                                    

                                    <thead>
                                        <tr>
                                            <th>Id Reg.</th>
                                            <th>Origen</th>
                                            <th>U. Medida</th>
                                            <th>Fecha</th>
                                            <th>Valor</th>
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

                <form role="form" @submit.prevent="descargar">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AgregarModal">Descargar desde SII</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fcinicio">Fecha de Inicio</label>
                                <input type="date" class="form-control" id="fcinicio" name="fcinicio" v-model="sii.fcinicio" placeholder="Fecha de Inicio">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fctermino">Fecha de Termnino</label>
                                <input type="date" class="form-control" id="fctermino" name="fctermino" v-model="sii.fctermino" placeholder="Fecha de Termino">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                Los datos correspondientes serán descargados de acuerdo a las fechas filtradas.<br> Si existen datos en sistema para las fechas filtradas, estas seran actualizadas
                            </div>
                        </div>    

                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Descargar</button>
                        </div>
                    </div>
                </form>    
            </div>
            </div>      
            <!-- ---------------------------------------------------------------->

            <!-- Modal Editar nuevo Empleado -->
            <!-- Modal -->
            <div class="modal fade" id="AgregarManualModal" tabindex="-1" role="dialog" aria-labelledby="AgregarManualModal" aria-hidden="true">
            <div class="modal-dialog" role="document">

                <form role="form" @submit.prevent="agregar">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="AgregarManualModal">Mantenedor Valor de UF</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
               
                    <div class="modal-body">                    
                        
                        <div class="form-row">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fecha">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" v-model="sii_agre.fecha" placeholder="Fecha">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="valor">Valor UF</label>
                                <input type="number" class="form-control" id="valor" name="valor" v-model="sii_agre.valor" min="0" max="999999" placeholder="Valor de UF">
                            </div>
                        </div>

                        <div class="form-row">
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
    var moment = require('moment')
    import datatables from 'datatables'

    Vue.component('datatables', datatables)
  
    export default {    
    
        mounted() {
            console.log('Componente UF.') 
        },
        
        
        data(){
            return {
                ufs         : [],
                uf          : { origen: '', nombre: '', unidad_medida: '', fecha: '', valor: '' },
                sii         : { fcinicio: '', fctermino: '' },
                sii_agre    : { fecha: '', valor: '' },
                id_edit     : '',
                indice      : '',
                fcinicio    : '',
                fctermino   : '',
                usuario     : ''                                    
            }

        },

        created(){           
            this.list();
            this.limpiar();
            
        },

        methods:{

            list(){
                
                axios.get(`/uf?id=${''}`)
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
                                { "data"   : "id_uf" },
                                { "data"   : "origen" },
                                { "data"   : "unidad_medida" },
                                { "data"   : "fecha" },
                                { "data"   : "valor" }                                                                      
                                ]

                        } );
                        table.order( [ 3, 'desc' ] ).draw()             

                        $('#datatable ').on('click', 'button.edit', function (e) {
                            e.preventDefault();    
                            var table = $('#datatable').DataTable();
                            var data = table.row($(this).closest('tr')).data()["id"]
                            var index = table.row($(this).closest('tr')).index()
                            console.log('edit table :' + data)


                            axios.get(`/uf?id=${data}`)
                            .then(res => {                      
                                console.log(res.data)
                                console.log(res.data[0].nombre)
                                self.editar(res.data, index)
                            })    
                                                           
                        })                        

                    });              
            },

            limpiar(){
                this.sii.fcinicio = ''
                this.sii.fctermino = '' 
                this.sii_agre.fecha = ''
                this.sii_agre.valor = ''                 
            },
           
            descargar(){

                var fcini = this.sii.fcinicio
                var fcfin = this.sii.fctermino

                console.log(fcini + ' - ' + fcfin)

                if ( (fcini == '') && (fcfin == '') ){
                    swal("Debe ingresar las fechas solicitadas", "Mantenedor Unidad de fomento (UF)", "warning")
                }
                if ( (fcini != '') && (fcfin == '') ){

                    swal({
                        title       : "Solo ingreso la fecha de inicio.",
                        text        : "Si desea continuar se descargara la fecha ingresada",
                        icon        : "warning",
                        buttons     : true,
                        dangerMode  : true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                swal("Datos descargados!!", {
                                icon: "success",
                                })
                            // --------- consumir API de indicadores ----------------------//                                                           

                                var test = ''
                                let paramFecha = this.sii.fcinicio.split("-");
                                var ini = paramFecha[2]+'-'+paramFecha[1]+'-'+paramFecha[0]
                                console.log(ini)

                                axios.get(`/api?inicio=${(ini)}`)
                                    .then(res => {
                                        var datasource = res.data
                                        var self = this    

                                        test = JSON.parse(datasource)
                                        console.log(test)
                                        console.log(datasource)
                                        //console.log(test['autor'] + ' - ' + test['nombre'] + ' - ' + test['unidad_medida'] + ' - ' + test['serie'][0]['fecha'] + ' - ' + test['serie'][0]['valor'])
                                        self.ingreso_sii_uno(test['autor'], test['nombre'], test['unidad_medida'], test['serie'][0]['fecha'], test['serie'][0]['valor'])
                                    })    
                                                               
                            // ---------FIN consumir API de indicadores ----------------------//

                            } else {
                                swal("Usted ha Cancelado la descarga de datos.", {
                                icon: "info",
                                })
                            }
                        })  

                } else if ( (fcini == '') && (fcfin != '') ){
                    swal("Debe ingresar la fecha de inicio.", {
                    icon: "info",
                    })
                } else if ( (fcini != '') && (fcfin != '') ){

                        swal({
                            title       : "Ha realizado la selección de fechas.",
                            text        : "Si desea continuar se descargara las fechas ingresadas",
                            icon        : "warning",
                            buttons     : true,
                            dangerMode  : true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    // ---- recorrer fechas ingresados en for --------------------------
                                    var a = moment(fcini)
                                    var b = moment(fcfin)

                                        for (var m = moment(a); m.diff(b, 'days') <= 0; m.add(1, 'days')) {
                                            console.log(m.format('DD-MM-YYYY'))
                                            var filtro = m.format('DD-MM-YYYY')
                                            axios.get(`/api?inicio=${(filtro)}`)
                                                .then(res => {
                                                    var datasource = res.data
                                                    var self = this    

                                                    var test = JSON.parse(datasource)
                                                    console.log(test)
                                                    self.ingreso_sii_varios(test['autor'], test['nombre'], test['unidad_medida'], test['serie'][0]['fecha'], test['serie'][0]['valor'], fcfin)
                                                })                                      
                                        }
                                    // ---- recorrer fechas ingresados en for -------------------------- 
                                } else {
                                    swal("Usted ha Cancelado la descarga de datos.", {
                                    icon: "info",
                                    })
                                }
                            }) 

                }                   

            },

            ingreso_sii_uno: function( sii_autor, sii_nombre, sii_unidad, sii_fecha, sii_valor ){
                console.log( sii_autor, sii_nombre, sii_unidad, sii_fecha.substring(0,10), sii_valor )
                $('#AgregarModal').modal('toggle');
                $('#AgregarModal'+ ' .close').click();
                
                const params = { origen : sii_autor,
                                 nombre : sii_nombre,
                                 unidad_medida : sii_unidad, 
                                 fecha : sii_fecha.substring(0, 10),
                                 valor : sii_valor,
                                 opcion: 1
                                }             
                                
                axios.post('/uf', params)
                    .then( res => {
                                              
                        var table = $('#datatable').DataTable( ) 
                        table.clear()
                        table.rows.add( res.data ).order( [ 3, 'desc' ] ).draw()
                        console.log( res.data )
                        
                    })                                
            },

            ingreso_sii_varios: function( sii_autor, sii_nombre, sii_unidad, sii_fecha, sii_valor, fin ){
                console.log( sii_autor, sii_nombre, sii_unidad, sii_fecha.substring(0,10), sii_valor, fin )
                
                const params = { origen : sii_autor,
                                 nombre : sii_nombre,
                                 unidad_medida : sii_unidad, 
                                 fecha : sii_fecha.substring(0, 10),
                                 valor : sii_valor,
                                 opcion: 2
                                }             
                                
                axios.post('/uf', params)
                    .then( res => { })

                    
                if (fin == sii_fecha.substring(0,10)){
                    console.log(fin + ' ' +  sii_fecha.substring(0,10))
                    axios.get(`/uf?id=${''}`)
                    .then(res => {
                        var table = $('#datatable').DataTable( ) 
                        table.clear()
                        table.rows.add( res.data ).order( [ 3, 'desc' ] ).draw()
                        console.log( res.data )

                                swal("Datos descargados!!", {
                                icon: "success",
                                }) 
                                $('#AgregarModal').modal('toggle')
                                $('#AgregarModal'+ ' .close').click()

                    })

                }                    

            },

            agregar(){

                $('#AgregarManualModal').modal('toggle');
                $('#AgregarManualModal'+ ' .close').click();

                console.log( this.sii_agre.fecha, this.sii_agre.valor );
                const params = { fecha : this.sii_agre.fecha, valor : this.sii_agre.valor }
                
                this.limpiar()               

                axios.post('/uf_m', params)
                    .then( res => { })       
                axios.get(`/uf?id=${''}`)
                    .then(res => {
                    var table = $('#datatable').DataTable( ) 
                    table.clear()
                    table.rows.add( res.data ).order( [ 3, 'desc' ] ).draw()
                    console.log( res.data )               
                })

            },        

            editar: function(item, index){
                console.log('editar')

                this.indice                         = index
                this.id_edit                        = item[0].id

            }
        
        }
    }

</script>