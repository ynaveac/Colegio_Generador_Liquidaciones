  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

      <li class="nav-item ">
        <router-link to="/empresas" class="nav-link">          
          <i class="nav-icon fas fa-university"></i>
          <p>
            Empresa
          </p>
        </router-link>
      </li>           

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Ajustes de Sistema
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item small">
            <router-link to="/nacionalidad" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Nacionalidad</p>
            </router-link>
          </li>           
          
          <li class="nav-item small">
            <router-link to="/genero" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Género</p>
            </router-link>
          </li>

          <li class="nav-item small">
            <router-link to="/modopago" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Modo Pago</p>
            </router-link>
          </li>

          <li class="nav-item small">
            <router-link to="/banco" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Bancos</p>
            </router-link>
          </li> 
          
          <li class="nav-item small">
            <router-link to="/tipocuenta" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tipo Cuenta</p>
            </router-link>
          </li>           

          <li class="nav-item small">
            <router-link to="/cajacomp" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Caja Compensación</p>
            </router-link>
          </li>

          <li class="nav-item small">
            <router-link to="/cesantia" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Seguro Cesantia</p>
            </router-link>
          </li>

          <li class="nav-item small">
            <router-link to="/afp" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Listado AFPs</p>
            </router-link>
          </li>           

          <li class="nav-item small">
            <router-link to="/gratificacion" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Gratificación Legal</p>
            </router-link>
          </li>           
     
          <li class="nav-item small">
            <router-link to="/uf" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Unidad Fomento</p>
            </router-link>
          </li>  

          <li class="nav-item small">
            <router-link to="/impuesto_unico" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Impuesto Unico</p>
            </router-link>
          </li>

          <li class="nav-item small">
            <router-link to="/salud" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tipo Salud</p>
            </router-link>
          </li> 
          <li class="nav-item small">
            <router-link to="/plazocontrato" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Plazo Contrato</p>
            </router-link>
          </li> 
        
        </ul>
      </li>
          
      <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Administración
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">    

              <li class="nav-item small">
                <router-link to="/horarios" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Horarios</p>
                </router-link>
              </li> 
              
              <li class="nav-item small">
                <router-link to="/cargo" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cargos</p>
                </router-link> 
              </li>               

              <li class="nav-item small">
                  <router-link to="/depto" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Departamentos</p>
                  </router-link>
              </li>

              <li class="nav-item small">
                <router-link to="/haberes" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Haberes y Desc.</p>
                </router-link>
              </li>  

              <li class="nav-item small">
                <router-link to="/haberes_dinamicos" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Hab. y Desc. Dinamicos</p>
                </router-link>
              </li>                

              <li class="nav-item small">
                <router-link to="/liquidacion" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liquidaciones.</p>
                </router-link>
              </li>
              
              <li class="nav-item small">
                <router-link to="/empleados" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nomina</p>
                </router-link>
              </li>     

              <li class="nav-item small">
                <router-link to="/per_liq" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Periodo. Liquidación</p>
                </router-link>
              </li>  

              <li class="nav-item small">
                <router-link to="/asistencia" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Asistencia Mensual</p>
                </router-link>
              </li>  

          </ul>
      </li>    


  </nav>

