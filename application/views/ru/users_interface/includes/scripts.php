<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=$baseurl;?>js/libs/jquery-1.7.2.min.js"><\/script>')</script>
<script src="<?=$baseurl;?>js/libs/cufon-yui.js" type="text/javascript"></script>
<script src="<?=$baseurl;?>js/libs/ScotchModern.font.js" type="text/javascript"></script>
<script src="<?=$baseurl;?>js/scripts.js"></script>
<script type="text/javascript">
<?php if(!$this->session->userdata('validation_age')):?>
	$(".container").hide();
	$("#overlay-18").show();
	$("#censor-yes").click(function(){
		$.post("<?=$baseurl;?>set-21age",{'age':21},
			function(data){
				if(data.status){
					$("#overlay-18").remove();
					$(".container").show();
				}
		},"json");
	});
	$("#censor-no").click(function(){
		$(".container").remove();
		$(".censor").remove();
		$(".spline").eq(1).after('<span class="censor">Ничего страшного, возвращайтесь к нам на сайт позже</span>');
	});
<?php else:?>
	$("#overlay-18").remove();
<?php endif;?>
	Cufon.replace('h1'); // Works without a selector engine
	Cufon.replace('p.caption'); // Requires a selector engine for IE 6-7, see above
	Cufon.replace('section.company-page h2');
	Cufon.replace('section > div.column h3');
</script>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript">
<?php if($this->uri->uri_string() == ''):?>
	$("li[class='home']").addClass('active');
<?php else:?>
	$("li[class='<?=$this->uri->segment(1);?>']").addClass('active');
<?php endif;?>
	$(".backpath").click(function(){backpath("<?=$this->session->userdata('backpath');?>")})
</script>