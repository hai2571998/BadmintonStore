<div class="box-center">
	<!-- The box-center product-->
	<div class="tittle-box-center">
		<h2>
			Kết quả tìm kiếm với giá từ <?php echo number_format($price_from).'đ đến '.number_format($price_to).'đ'; ?>
		</h2>
	</div>
	<div class="box-content-center product">
		<?php foreach($list as $row):  ?>
		<!-- The box-content-center -->
		<div class='product_item'>
			<h3>
				<a href="<?php echo base_url('product/view/'.$row->id); ?>" title="<?php echo $row->name; ?>" title="<?php echo $row->name; ?>">
					<?php echo $row->name; ?>
				</a>
			</h3>
			<div class='product_img'>
				<a href="<?php echo base_url('product/view/'.$row->id); ?>" title="<?php echo $row->name; ?>">
					<img src="<?php echo base_url(); ?>upload/product/<?php echo $row->image_link; ?>" alt='' />
				</a>
			</div>
			<p class="price">
				<?php if($row->discount > 0 ): ?>
				<?php $price_new = $row->price - $row->discount; ?>
				<?php echo number_format($price_new); ?> đ
				<span class="price_old">
					<?php echo number_format($row->price); ?> đ</span>
				<?php else: ?>
				<?php echo number_format($row->price); ?> đ
				<?php endif; ?>
			</p>
			<center>
				<div class='raty' style='margin:10px 0px' id='9' data-score='4'></div>
			</center>
			<div class='action'>
				<p style='float:left;margin-left:10px'>Lượt xem:
					<b>
						<?php echo $row->view; ?>
					</b>
				</p>
				<a class='button' href="them-vao-gio-9.html" title='Mua ngay'>Mua ngay</a>
				<div class='clear'></div>
			</div>
		</div>
		<?php endforeach; ?>
		<div class='clear'></div>
	</div>
	<!-- End box-content-center -->
</div>
