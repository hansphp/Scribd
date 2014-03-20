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
				row.set('id','doc_'+row.getElement('doc_id').get('text'));
				sel1.grab(new Element('option',{
					'value':row.getElement('doc_id').get('text'),
					'html':row.getElement('title').get('text')
				}));
			});
		sel1.set('value',204970061); //set default
		Scribd.setThumbs(204970061); //set default
		$('lugar').grab(sel1);
		}	
	});
    </script>
    <style type="text/css">
		#xmlDOM{
			display:none;
		}
		#doc{
			background: #999;
			padding:5px;
			width:344px;
			height:141px;
		}
		#doc img{
			float:left;
			box-shadow: 2px 2px 5px #999;
		}
		#doc_page_count, #doc_title, #doc_reads, #doc_when_updated, #doc_when_uploaded{
			float:left;
			padding:2px;
			width:215px;
			margin-left:5px;
		}
		#doc_title{
			padding:5px;
			background: #CCC;
		}
	</style>
    <title>Scribd</title>
</head>
<body>
	<div id="lugar">&nbsp;</div>
    <div id="doc">
        <img src="" id="lugar2" height="142px" width="111px"/>
        <div id="doc_title">&nbsp;</div>
        <div id="doc_page_count">&nbsp;</div>
        <div id="doc_reads">&nbsp;</div>
        <div id="doc_when_updated">&nbsp;</div>
        <div id="doc_when_uploaded">&nbsp;</div>
    </div>
    <div id="xmlDOM">&nbsp;</div>
</body>
</html>