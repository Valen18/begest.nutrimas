@extends('layout')

@section('contenido')

<div class="mt-3 border-0 card">
  			<div class="card-body">
				<h1 class="display-5">Sección de Contacto</h1>
  			</div>
</div>

<div class="m-4 chat-container">
    <div class="row h-100">
        <div class="col-3 border-chat-lightgray px-0" id="sidebar">
            <div id="sidebar-content" class="w-100 h-100">
                <div class="input-group p-0 d-xs-none" id="search-group">
                    <input type="text" class="form-control border-0" placeholder="Buscar..." id="search">
                    <span class="input-group-addon">
                        <button class="btn border-0 bg-white text-primary hover-color-darkblue" type="button">
                           <span class="oi oi-magnifying-glass" title="magnifying-glass" aria-hidden="true"></span>
                        </button>
                    </span>
                </div>
                <div class="sidebar-scroll" id="list-group">
                    <ul class="list-group w-100" id="friend-list">
	                    
	                    <li class="list-group-item p-1 active hover-bg-lightgray">
	                        <img src="//placehold.it/50x50" class="rounded-circle">
	                        <span class="d-xs-none username">StanIsLove</span>
	                    </li>
	                    
	                    <li class="list-group-item p-1 hover-bg-lightgray">
	                        <img src="//placehold.it/50x50" class="rounded-circle">
	                        <span class="d-xs-none username">Joe</span>
	                    </li>
                   
                	</ul>
                </div>
            </div>
        </div>
        <div class="col-8 p-0">
            <div class="card">
                
                <div class="card-header bg-darkblue text-white py-1 px-2">
                    <div class="d-flex flex-row justify-content-start">
                        
                        <div class="col">
                            <div class="my-0">
                                <b>StanIslove</b>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div  class="card-body bg-lightgrey d-flex flex-column p-0">
                    
                    <div id="msgs" class="container message-scroll">
                        <div id="msgPaciente" class="row">
                            <div class="card message-card m-1">
                                <div class="card-body p-2">
                                    <span class="mx-2">Hi, Dave</span>
                                    <span class="float-right mx-1"><small>14:13<i class="fas fa-eye fa-fw" style="color:#e64980"></i></small></span>
                                </div>
                            </div>
                        </div>
                        <div id="msgEmpleado" class="row justify-content-end">
                            <div class="card message-card bg-lightblue m-1">
                                <div class="card-body p-2">
                                    <span class="mx-2">Hello, Stan</span>
                                    <span class="float-right mx-1"><small>14:14<i class="fas fa-eye fa-fw" style="color:#e64980"></i></small></span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="input-group">
                        <input id="msg" type="text" class="form-control border-0" placeholder="Escribe aquí...">
                        <span class="input-group-addon">
                            <button id="btnEnviar" class="btn btn-success border-0" type="button">
                               Enviar
                            </button>
                            <button id="btnPac" class="btn btn-info border-0" type="button">
                               Paciente
                            </button>
                        </span>
                    </div>
            </div>
        </div>
    </div>
    <!-- row -->
</div>
<!-- container -->
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function () {
    $('.card-header').on('click', '[data-fa-i2svg]', function () {
        $("#sidebar-content")
                .removeClass("w-100")
                .width($("#sidebar").width());
        $("#sidebar").css({"flex" : "none"});
        $("#sidebar").animate({
            width: "toggle"
            }, 600, function() {
                    $("#sidebar").css({"flex" : '', "width" : ''});
                    $("#sidebar-content")
                                .css("width", "")
                                .addClass("w-100");
            });
    });
    
    // Función para determinar que tipo de mensaje añadir en el cuadro de chat. Recibe por parametro "empleado" u otro.
    function putMsg(tipo)
    {
    	if(tipo == "empleado"){
    		msg = '<div id="msgEmpleado" class="row justify-content-end"><div class="card message-card bg-lightblue m-1"><div class="card-body p-2"><span class="mx-2">'+$("#msg").val()+'</span><span class="float-right mx-1"><small>14:14<i class="fas fa-eye fa-fw" style="color:#e64980"></i></small></span></div></div></div>';
    	}else{
    		msg = '<div id="msgPaciente" class="row"><div class="card message-card m-1"><div class="card-body p-2">'+$("#msg").val()+'</span><span class="float-right mx-1"><small>14:13<i class="fas fa-eye fa-fw" style="color:#e64980"></i></small></span></div></div></div>';
        }
    	
    	return msg;
    }
    // Marco como activo en el sidebar la conversacíon al pulsar
    $("#friend-list li").click(function(){
    	$("#friend-list li").removeClass('active');
    	$(this).addClass('active');
    })

    // Añado el mensaje al cuadro de chat
    $("#btnEnviar").click(function(){
    	$("#msgs").append(putMsg("empleado"));
    });

     $("#btnPac").click(function(){
    	$("#msgs").append(putMsg("paciente"));
    });

    //Formulario de búsqueda
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#friend-list li .username").filter(function() {
             $(this).parent().toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
    
});
</script>
@stop