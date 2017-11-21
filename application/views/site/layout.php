<!doctype html>

<html>

<head>
	<?php
		$this->load->view('site/head', $this->data);
	?>
</head>

<body>
	<a href="#" id="back_to_top">
		<img src="<?php echo public_url(); ?>/site/images/top.png">
	</a>

	<div class="wraper">
		<div class="header">
			<?php
				$this->load->view('site/header');
			?>
		</div>
		<div id="container">
			<div class="left">
				<?php 
					$this->load->view('site/left', $this->data); 
				?>
			</div>
			<div class="content">
				<?php if(isset($message)): ?>
				
				<?php endif; ?>
				<?php $this->load->view($temp, $this->data);?>
			</div>
			<div class="right">
				<?php 
					$this->load->view('site/right', $this->data); 
				?>
			</div>
			<div class="clear"></div>
		</div>
		<center>
			<img src="<?php echo public_url(); ?>/site/images/bank.png">
		</center>
		<div class="footer">
			<?php
				$this->load->view('site/footer');
			?>
		</div>
	</div>
</body>

</html>
