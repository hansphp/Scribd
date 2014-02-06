/*******************************************************************************
Programador:        Hans Von Herrera Ortega
Objeto:            	Scribd
Descripción:        Este paquete contiene: Funciones esenciales para manejo de
					colecciones y documentos de Scribd
Historial:          ==========================================================
					Programador-Alias			Acción				Fecha
					==========================================================
					HansPHP						Creación            05/02/2014
Descripción:        Se creó el objeto.
					==========================================================
Versión:            1.0                    
*******************************************************************************/
var Scribd={
		script:'services.php',
		place:'lugar',
		colecciones:function(script, place){
			this.script = (script)?script:this.script;
			this.place = (place)?place:this.place;
			
			var obj = $(this.place);
			
			var myRequest = new Request({
			url: this.script,
			method: 'post',
			onSuccess: function(responseText, responseXML) {  
				$('xmlDOM').set('html',responseText);
				if($('xmlDOM').getElement('rsp').get('stat')=='ok'){
					Scribd.colecciones_callback();
				}else{
					obj.empty();
					obj.set('text', 'Loading...');
				}
			}
			}).send('collections=true');
		},
		colecciones_callback:function(){},
		coleccion:function(id){
			if(id)
			var myRequest = new Request({
			url: this.script,
			method: 'post',
			onSuccess: function(responseText, responseXML) {  
				$('xmlDOM').set('html',responseText);
				if($('xmlDOM').getElement('rsp').get('stat')=='ok'){
					Scribd.coleccion_callback();
				}else{
					obj.empty();
					obj.set('text', 'Loading...');
				}
			}
			}).send('collection_id='+id);
		},
		coleccion_callback:function(){}
};

