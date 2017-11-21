<div class="box-center">
	<!-- The box-center product-->
	<div class="tittle-box-center">
		<h2>
			Thông tin giỏ hàng (Có
			<?php echo $total_items; ?> sản phẩm)
		</h2>
	</div>
	<div class="box-content-center product">
		<?php if($total_items > 0): ?>
		<form action="<?php echo base_url('cart/update') ?>" method="post">
			<table border="1">
				<thead>
					<th>Sản phẩm</th>
					<th>Giá bán</th>
					<th>Số lượng</th>
					<th>Tổng số</th>
					<th>Xóa</th>
				</thead>
				<tbody>
					<?php $total_amount = 0; ?>
					<?php foreach($carts as $row): ?>
					<?php $total_amount += $row['price']; ?>
					<tr>
						<td>
							<?php echo $row['name']; ?>
						</td>
						<td>
							<?php echo number_format($row['price']); ?> đ
						</td>
						<td>
							<input name="qty_<?php echo $row['id']; ?>" value="<?php echo $row['qty']; ?>" type="number" size="5">
						</td>
						<td>
							<?php echo $row['subtotal']; ?>
						</td>
						<td>
							<a href="<?php echo base_url('cart/delete/'.$row['id']); ?>">Xóa</a>
						</td>
					</tr>
					<?php endforeach; ?>
					<tr>
						<td colspan="5">Tổng số tiền thanh toán:
							<b style="color: red;">
								<?php echo $total_amount; ?>
							</b> -
							<a href="<?php echo base_url('cart/delete'); ?>">Xóa toàn bộ</a>
						</td>
					</tr>
					<tr>
						<td colspan="5">
							<button type="submit">Cập nhật</button>
						</td>
					</tr>
				</tbody>
			</table>
        </form>
        <?php else: ?>
        <h4>Không có sản phẩm nào trong giỏ hàng!</h4>
        <?php endif; ?>
	</div>
</div>
