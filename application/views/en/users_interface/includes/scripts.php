<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=$baseurl;?>js/libs/jquery-1.7.2.min.js"><\/script>')</script>
<script src="<?=$baseurl;?>js/libs/cufon-yui.js" type="text/javascript"></script>
<script src="<?=$baseurl;?>js/libs/ScotchModern.font.js" type="text/javascript"></script>
<script type="text/javascript">
	Cufon.replace('h1'); // Works without a selector engine
	Cufon.replace('p.caption'); // Requires a selector engine for IE 6-7, see above
	Cufon.replace('section.company-page h2');
	Cufon.replace('section > div.column h3');
</script>
<script src="<?=$baseurl;?>js/scripts.js"></script>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
<?php if($this->uri->uri_string() == ''):?>
	$("li[class='home']").addClass('active');
<?php else:?>
	$("li[class='<?=$this->uri->segment(1);?>']").addClass('active');
<?php endif;?>
	$(".backpath").click(function(){backpath("<?=$this->session->userdata('backpath');?>")})
</script>