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
		doc_place:'lugar2',
		docs:function(script, place, doc_place){
			this.script = (script)?script:this.script;
			this.place = (place)?place:this.place;
			this.doc_place = (doc_place)?doc_place:this.doc_place;
			var obj = $(this.place);
			
			var myRequest = new Request({
			url: this.script,
			method: 'post',
			onSuccess: function(responseText, responseXML) {  
				$('xmlDOM').set('html',responseText);
				if($('xmlDOM').getElement('rsp').get('stat')=='ok'){
					Scribd.docs_callback();
				}else{
					obj.empty();
					obj.set('text', 'Loading...');
				}
			}
			}).send('collections=true');
		},
		docs_callback:function(){},
		setThumbs:function(id){
			$(this.doc_place).src = ($('doc_'+id).getElement('thumbnail_url').get('text'));
			$('doc_page_count').set('html','<b>'+$('doc_'+id).getElement('page_count').get('text')+'</b> páginas');
			$('doc_title').set('text', $('doc_'+id).getElement('title').get('text'));
			$('doc_reads').set('html',' visto <b>'+$('doc_'+id).getElement('reads').get('text')+'</b> veces');
			$('doc_when_updated').set('html','Última actualización: <b>'+$('doc_'+id).getElement('when_updated').get('text').substr(0,10)+'</b>');
			$('doc_when_uploaded').set('html','Subido el día: <b>'+$('doc_'+id).getElement('when_uploaded').get('text').substr(0,10)+'</b>');
		}
};
