<div class="box-center">
	<!-- The box-center register-->
	<div class="tittle-box-center">
		<h2>Đăng ký thành viên</h2>
	</div>
	<div class="box-content-center register">
		<!-- The box-content-center -->
		<h1>Đăng ký thành viên</h1>
		<form enctype="multipart/form-data" action="<?php echo site_url('user/register'); ?>" method="post" class="t-form form_action">
			<div class="form-row">
				<label class="form-label" for="param_email">Email:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="text" value="" name="email" id="email" class="input">
					<div class="clear"></div>
					<div id="email_error" class="error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label" for="param_password">Mật khẩu:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="password" name="password" id="password" class="input">
					<div class="clear"></div>
					<div id="password_error" class="error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label" for="param_re_password">Gõ lại mật khẩu:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="password" name="re_password" id="re_password" class="input">
					<div class="clear"></div>
					<div id="re_password_error" class="error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="form-row">
				<label class="form-label" for="param_name">Họ và tên:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="text" value="" name="name" id="name" class="input">
					<div class="clear"></div>
					<div id="name_error" class="error"></div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="form-row">
				<label class="form-label" for="param_phone">Số điện thoại:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<input type="text" value="" name="phone" id="phone" class="input">
					<div class="clear"></div>
					<div id="phone_error" class="error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label" for="param_address">Địa chỉ:
					<span class="req">*</span>
				</label>
				<div class="form-item">
					<textarea name="address" id="address" class="input"></textarea>
					<div class="clear"></div>
					<div id="address_error" class="error"></div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="form-row">
				<label class="form-label">&nbsp;</label>
				<div class="form-item">
					<input type="submit" name="submit" value="Đăng ký" class="button">
				</div>
			</div>
		</form>
	</div>
	<!-- End box-content-center register-->
</div>
<!-- End box-center -->
