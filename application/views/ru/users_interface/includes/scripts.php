<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=$baseurl;?>js/libs/jquery-1.7.2.min.js"><\/script>')</script>
<script src="<?=$baseurl;?>js/scripts.js"></script>
<script type="text/javascript">
<?php if($this->uri->uri_string() == ''):?>
	$("li[class='home']").addClass('active');
<?php else:?>
	$("li[class='<?=$this->uri->segment(1);?>']").addClass('active');
<?php endif;?>
	$(".backpath").click(function(){backpath("<?=$this->session->userdata('backpath');?>")})
</script>