@if(!is_null($cliente))
<h1>
	@php
     sleep(1);
    @endphp	
	{{$cliente->apeYNom()}}
</h1>
@endif
	
