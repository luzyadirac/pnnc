<div id="header"> 
       
 </div>
    </hr>
    <div id="menu"> 
      <ul>
        @if(Auth::user()->role=='Admin'||Auth::user()->role=='Afin'|| Auth::user()->role=='Ages' )
          <div class="card">  
            <div class="card-body"><a href="{{url('/gestionar-cdp')}}" target="formularios" accesskey="2" title="">Gestión CDP</a></div>
          </div>
          <div class="card" >
            <div class="card-body">
            <a href="{{ url('/gestionar-proceso') }}" target="formularios" accesskey="3" title="">Gestión de procesos</a>
            </div>
          </div>
           @endif
          <div class="card" >
            <div class="card-body">
              <a href="{{ url('/gestionar-contrato') }}" accesskey="4" title="">Gestión de contratos</a>
            </div>
          </div>
           @if(Auth::user()->role=='Admin'||Auth::user()->role=='Aper'|| Auth::user()->role=='Ages' || Auth::user()->role=='Agar')
          <div class="card" >
            <div class="card-body">
              <a href="{{ url('/gestionar-persona') }}" target="formularios" accesskey="5" title="">Gestión de contratistas</a>
            </div>
          </div>
          @endif
        @if(Auth::user()->role=='Admin'||Auth::user()->role=='Agar'|| Auth::user()->role=='Ages' )
          <div class="card" >
            <div class="card-body">
              <a href="{{ url('/gestionar-garantia') }}" target="formularios" accesskey="5" title="">Gestión de garantías</a>
            </div>
          </div>   
          @endif       
        @if(Auth::user()->role=='Admin'||Auth::user()->role=='Afin'|| Auth::user()->role=='Ages' )
          <div class="card" >
            <div class="card-body">
              <a href="{{ url('/gestionar-pago') }}" target="formularios" accesskey="5" title="">Gestión de pagos</a>
            </div>
          </div>
          @endif
          <div class="card" >
            <div class="card-body">
              <a href="{{ url('/gestionar-report/1') }}" target="formularios" accesskey="5" title="">Gestión de reportes</a>
            </div>
          </div>
      </ul>
    </div>
    
  </div>
 