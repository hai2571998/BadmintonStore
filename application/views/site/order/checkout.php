<div class="box-center">
	<!-- The box-center register-->
	<div class="tittle-box-center">
		<h2>Thông tin nhận hàng thành viên</h2>
	</div>
	<div class="box-content-center register">
		<!-- The box-content-center -->
		<h1>Thông tin nhận hàng thành viên</h1>
        <form enctype="multipart/form-data" action="<?php echo site_url('order/checkout'); ?>" method="post" class="t-form form_action">
            <div class="form-row">
				<label class="form-label" for="param_email">Tổng số tiền:
				</label>
				<div class="form-item">
					<b><?php echo number_format($total_amount); ?> đ</b>
					<div class="clear"></div>
					<div id="email_error" class="error"><?php echo form_error('email'); ?></div>
				</div>
				<div class="clear"></div>
            </div>
            
			<div class="form-row">
				<label class="form-label" for="param_email">Email:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="email" value="<?php echo isset($user->email) ? $user->email : ''; ?>" name="email" id="email" class="input">
					<div class="clear"></div>
					<div id="email_error" class="error"><?php echo form_error('email'); ?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label" for="param_name">Họ và tên:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="text" value="<?php echo isset($user->name) ? $user->name : ''; ?>" name="name" id="name" class="input">
					<div class="clear"></div>
					<div id="name_error" class="error"><?php echo form_error('name'); ?></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="form-row">
				<label class="form-label" for="param_phone">Số điện thoại:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="text" value="<?php echo isset($user->phone) ? $user->phone : ''; ?>" name="phone" id="phone" class="input">
					<div class="clear"></div>
					<div id="phone_error" class="error"><?php echo form_error('phone'); ?></div>
				</div>
				<div class="clear"></div>
            </div>
            
            <div class="form-row">
				<label class="form-label" for="param_phone">Thanh toán qua:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<select name="payment" id="payment">
                        <option value="offline">Thanh toán khi nhận hàng</option>
                        <option value="nganluong">Ngân Lượng</option>
                        <option value="baokim">Bảo Kim</option>
                    </select>
					<div class="clear"></div>
					<div id="phone_error" class="error"><?php echo form_error('payment'); ?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label" for="param_message">Ghi chú:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<textarea name="message" id="message" class="input"></textarea>
					<div class="clear"></div>
					<div id="message_error" class="error"><?php echo form_error('message'); ?></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label">&nbsp;</label>
				<div class="form-item">
					<input type="submit" name="submit" value="Thanh Toán" class="button">
				</div>
			</div>
		</form>
	</div>
	<!-- End box-content-center register-->
</div>
<!-- End box-center -->
