<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">GLORIA-FINANZAS</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="{{url('/')}}" class="sidebar-link">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-user text-info"></i>
                    </span>
                    Panel
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{url('/dashboard')}}" class="sidebar-link">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-gauge text-primary"></i>
                    </span>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-header">
                Estado Financiero
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#cuentas" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-file-invoice text-info"></i>
                    </span>
                    Cuentas
                </a>
                <ul id="cuentas" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('admin/account/add')}}" class="sidebar-link ms-4">
                            <i class="fa-solid fa-arrow-right me-3"></i>Crear Cuenta
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('admin/account/list')}}" class="sidebar-link ms-4">
                            <i class="fa-solid fa-arrow-right me-3"></i>Ver Cuentas
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('admin/detail/add')}}" class="sidebar-link ms-4">
                            <i class="fa-solid fa-arrow-right me-3"></i>Crear Detalle
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#activos" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-sack-dollar text-success"></i>
                    </span>
                    Activos
                </a>
                <ul id="activos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('/admin/activo/corriente')}}" class="sidebar-link ms-4"><i class="fa-solid fa-arrow-right me-3"></i>Activo Corriente</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin/activo/no_corriente')}}" class="sidebar-link ms-4"><i class="fa-solid fa-arrow-right me-3"></i>Activo No Corriente</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#pasivos" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-ban text-danger"></i>
                    </span>
                    Pasivos
                </a>
                <ul id="pasivos" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('admin/pasivo/corriente')}}" class="sidebar-link ms-4">
                            <i class="fa-solid fa-arrow-right me-3"></i>Pasivo Corriente
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('admin/pasivo/no_corriente')}}" class="sidebar-link ms-4">
                            <i class="fa-solid fa-arrow-right me-3"></i>Pasivo No Corriente
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="{{url('admin/patrimonio')}}" class="sidebar-link">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-building text-warning"></i>
                    </span>
                    Patrimonio
                </a>
            </li>
            <li class="sidebar-header">
                Estado Resultado
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#accountresults" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-file-invoice text-info"></i>
                    </span>
                    Cuentas
                </a>
                <ul id="accountresults" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('/admin/result/account/list')}}" class="sidebar-link ms-4">
                            <i class="fa-solid fa-arrow-right me-3"></i>Crear y Ver
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('admin/result/detail/add')}}" class="sidebar-link ms-4">
                            <i class="fa-solid fa-arrow-right me-3"></i>Crear Detalle
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="{{url('admin/result')}}" class="sidebar-link">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-square-poll-vertical text-success"></i>
                    </span>
                    Rultados
                </a>
            </li>
            <li class="sidebar-header">
                Ratios
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#liquidez" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-flask text-primary"></i>
                    </span>
                    Liquidez
                </a>
                <ul id="liquidez" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/liquidez/corriente')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> Corriente
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/liquidez/acidez')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> Acidez
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/liquidez/efectivo')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> Efectivo
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/liquidez/capital_trabajo')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> Capital de Trabajo
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#endeudamiento" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-circle-xmark text-danger"></i>
                    </span>
                    Endeudamiento
                </a>
                <ul id="endeudamiento" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/endeudamiento/apalancamiento')}}" class="sidebar-link ms-3">
                            <i class="fa-solid fa-arrow-right me-1"></i> Apalancamiento Financiero
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/endeudamiento/solvencia_patrimonial_largo_plazo')}}" class="sidebar-link ms-3">
                            <i class="fa-solid fa-arrow-right me-1"></i> Solvencia Patrimonial a Largo Plazo
                        </a> 
                    </li>
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/endeudamiento/solvencia_patrimonial')}}" class="sidebar-link ms-3">
                            <i class="fa-solid fa-arrow-right me-1"></i> Solvencia Patrimonial
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#rentabilidad" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-sack-dollar text-success"></i>
                    </span>
                    Rentabilidad
                </a>
                <ul id="rentabilidad" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/rentabilidad/mub')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> MUB
                        </a>
                        <a href="{{url('/admin/ratio/rentabilidad/mun')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> MUN
                        </a>
                        <a href="{{url('/admin/ratio/rentabilidad/rp')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> RP
                        </a>
                        <a href="{{url('/admin/ratio/rentabilidad/roa')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> ROA
                        </a>
                        <a href="{{url('/admin/ratio/rentabilidad/roe')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> ROE
                        </a>
                    </li>
                </ul>
            </li> 
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#gestion" data-bs-toggle="collapse"
                    aria-expanded="false">
                    <span class="d-inline-block bg-light rounded-circle text-center me-2" style="width: 30px; height: 30px; line-height: 30px;">
                        <i class="fa-solid fa-list-check text-info"></i>
                    </span>
                    Gestión
                </a>
                <ul id="gestion" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="{{url('/admin/ratio/gestion/existencia')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> R. Existencias
                        </a>
                        <a href="{{url('/admin/ratio/gestion/cuentas_por_cobrar')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> R. Cuentas por Cobrar
                        </a>
                        <a href="{{url('/admin/ratio/gestion/cuentas_por_pagar')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> R. Cuentas por Pagar
                        </a>
                        <a href="{{url('/admin/ratio/gestion/activo_fijo')}}" class="sidebar-link ms-5">
                            <i class="fa-solid fa-arrow-right me-3"></i> R. Activo fijo
                        </a>
                    </li>
                </ul>
            </li>           
        </ul>
    </div>
</aside>