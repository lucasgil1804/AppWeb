<div class="row card-deck mx-3 mb-5">
    <div class="card overview-item overview-item--c3">
        <div class="overview__inner">
            <div class="overview-box clearfix">
                <div class="icon">
                    <i class="zmdi zmdi-account-o"></i>
                </div>
                <div class="text">
                    <h2>{{ Session()->get('tableros')[0] }}</h2>
                    <span>Cantidad de clientes</span>
                </div>
            </div>   
        </div>
    </div>
    
    <div class="card overview-item overview-item--c3">
        <div class="overview__inner">
            <div class="overview-box clearfix">
                <div class="icon">
                    <i class="zmdi zmdi-wrench"></i>
                </div>
                <div class="text">
                    <h2>{{ Session()->get('tableros')[1] }}</h2>
                    <span>Cantidad de reparaciones</span>
                </div>
            </div>  
        </div>
    </div>
   
    <div class="card overview-item overview-item--c3">
        <div class="overview__inner">
            <div class="overview-box clearfix">
                <div class="icon">
                    <i class="zmdi zmdi-alert-circle"></i>
                </div>
                <div class="text">
                    <h2>{{ Session()->get('tableros')[2] }}</h2>
                    <span>Reparaciones Pendientes</span>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card bg-light overview-item overview-item--c3" >
        <div class="overview__inner">
            <div class="overview-box clearfix">
                <div class="icon">
                    <i class="zmdi zmdi-time"></i>
                </div>
                <div class="text">
                    <h2>{{ floor(Session()->get('tableros')[3]) }}</h2>
                    <span>Promedio de tiempo de reparación</span>
                </div>
            </div>
        </div>
    </div>
</div>