<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="mootools/mootools-core-1.4.5-full-nocompat-yc.js" type="text/javascript" charset="utf-8"></script>
    <script src="main.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">	
	window.addEvent('domready',function(){
		Scribd.colecciones();
		Scribd.colecciones_callback=function(){
			 var sd = $('xmlDOM').getElement('resultset');
			 var sel1 = new Element('select',{'onchange':'Scribd.coleccion(this.value);'}).grab(new Element('option'));
			sd.getElements('result').each(function(row){
				sel1.grab(new Element('option',{
					'value':row.getElement('collection_id').get('text'),
					'html':row.getElement('collection_name').get('text')+' ('+row.getElement('doc_count').get('text')+')'
				}));
			});
		//sel1.set('value',4439827); //set del valor
		$('lugar').grab(sel1);
		}	
		
		Scribd.coleccion_callback=function(){
			 var sd = $('xmlDOM').getElement('resultset');
			 sd.getElements('result').each(function(row){
				$('lugar2').grab(new Element('img',{'src':row.getElement('thumbnail_url').get('text')}));
			});
		}	
			
	});
    </script>
    <style type="text/css">
		#xmlDOM{
			display:none;
		}
	</style>
    <title>Scribd</title>
</head>
<body>
	<div id="lugar">---</div>
    <div id="lugar2">---</div>
    <div id="xmlDOM">&nbsp;</div>
</body>
</html>