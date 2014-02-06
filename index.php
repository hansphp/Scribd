<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="mootools/mootools-core-1.4.5-full-nocompat-yc.js" type="text/javascript" charset="utf-8"></script>
    <script src="main.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">	
	window.addEvent('domready',function(){
		Scribd.docs();
		Scribd.docs_callback=function(){
			 var sd = $('xmlDOM').getElement('resultset');
			 var sel1 = new Element('select',{'onchange':'Scribd.setThumbs(this.value);'}).grab(new Element('option'));
			sd.getElements('result').each(function(row){
				sel1.grab(new Element('option#doc_'+row.getElement('doc_id').get('text'),{
					'value':row.getElement('doc_id').get('text'),
					'pic':row.getElement('thumbnail_url').get('text'),
					'html':row.getElement('title').get('text')
				}));
				
			});
		sel1.set('value',204970061); //set del valor
		$('lugar').grab(sel1);
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
	<div id="lugar">&nbsp;</div>
    <div><img src="" id="lugar2" height="170px"/></div>
    <div id="xmlDOM">&nbsp;</div>
</body>
</html>