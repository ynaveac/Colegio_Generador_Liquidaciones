<template>
<div>
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Mantenedor de Cargos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                        <router-link to="/home" class="breadcrumb-item">Home</router-link>
                        <li class="breadcrumb-item active">Cargos</li>
                        </ol>
                    </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
             <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">                 
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <div v-if="editarActivo">
                                <div class="card-header">
                                    <h3 class="card-title">Editar Items</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" @submit.prevent="editarcargo(cargo)">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre a definir" v-model="cargo.nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una breve descripción" v-model="cargo.descripcion">
                                        </div>
                                    </div>
                                    <!-- /.card-body --> 
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <button type="submit" class="btn btn-danger" @click="cancelarEdicion()">Cancelar</button>
                                    </div>
                                </form>
                            </div>

                            <div v-else>
                                <div class="card-header">
                                    <h3 class="card-title">Agregar Nuevo Items</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" @submit.prevent="agregar">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre a definir" v-model="cargo.nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="descripcion">Descripción</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una breve descripción" v-model="cargo.descripcion">
                                        </div>
                                    </div>
                                    <!-- /.card-body --> 
                                    <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                    </div>
                                </form>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Listado de Registros</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                <table id="datetable" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr v-for="(item, index) in cargos" :key="index">
                                            <td>{{ item.id }}</td>
                                            <td>{{ item.nombre }}</td>
                                            <td>{{ item.des_cargo }}</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-danger btn-sm" @click="eliminarcargo(item, index)"><i class="fas fa-minus-circle"></i></button>
                                                <button type="button" class="btn btn-outline-warning btn-sm" @click="editarFormulario(item)"><i class="fas fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    
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
</div>            
</template>
<script>

    export default {
               
        mounted() {
            console.log('Componente cargo.');
           
        },
        data(){
            return {
                cargos : [],
                cargo : { nombre: '', descripcion: '' },
                editarActivo: false
            }

        },
        created(){
            axios.get('/cargo')
                .then(res => {
                    this.cargos = res.data;

                });
            
        },
        methods:{

            agregar(){
                console.log(this.cargo.nombre, this.cargo.descripcion);
                const params = { nombre : this.cargo.nombre, descripcion : this.cargo.descripcion }
                this.cargo.nombre = '';
                this.cargo.descripcion= '';                

                axios.post('/cargo', params)
                    .then( res => {
                        this.cargos.push(res.data[0])
                    })

            },
            eliminarcargo(item, index){
                axios.delete(`/cargo/${item.id}`)
                    .then(()=>{
                        this.cargos.splice(index, 1);
                    })
            },
            editarFormulario(item){
                this.editarActivo=true;
                this.cargo.nombre = item.nombre;
                this.cargo.descripcion = item.des_cargo;
                this.cargo.id = item.id;
            },
            editarcargo(cargo){
                const params = { nombre: cargo.nombre, descripcion: cargo.descripcion };

                axios.put(`/cargo/${cargo.id}`, params)
                    .then(res => {
                        this.editarActivo=false;

                        const index = this.cargos.findIndex( cargoBuscar => cargoBuscar.id === res.data[0].id )
                        
                        this.cargos[index] = res.data[0];

                        this.cargo.nombre = "";
                        this.cargo.descripcion = "";                        
                    })
            },
            cancelarEdicion(){
                this.editarActivo = false;
                this.cargo.nombre = "";
                this.cargo.descripcion = "";                  
            }
        }
    }

</script>