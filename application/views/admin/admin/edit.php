<?php
	$this->load->view('admin/admin/head', $this->data);
?>
	<div class="wrapper">
		<div class="widget">
			<div class="title">
				<h6>Chỉnh sửa thông tin quản trị viên</h6>
			</div>
			<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="formRow">
						<label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value="<?php echo $info->name ?>"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('name'); ?></div>
						</div>
						<div class="clear"></div>
					</div>

                    <!-- <div class="formRow">
						<label class="formLeft" for="param_old_password">Mật khẩu hiện tại:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="old_password" id="param_old_password" _autocheck="true" type="password"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('password'); ?></div>
						</div>
						<div class="clear"></div>
					</div> -->

					<div class="formRow">
						<label class="formLeft" for="param_password">Mật khẩu mới:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo">
								<input name="password" id="param_password" _autocheck="true" type="password">
								<p><strong>Lưu ý: </strong>Nếu thay đổi mật khẩu thì nhập vào!</p>
							</span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('password'); ?></div>
						</div>
						<div class="clear"></div>
					</div>

					<div class="formRow">
						<label class="formLeft" for="param_re_password">Nhập lại mật khẩu mới:<span class="req">*</span></label>
						<div class="formRight">
							<span class="oneTwo"><input name="re_password" id="param_re_password" _autocheck="true" type="password"></span>
							<span name="name_autocheck" class="autocheck"></span>
							<div name="name_error" class="clear error"><?php echo form_error('re_password'); ?></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="formSubmit">
						<input type="submit" value="Cập nhật" class="redB">
					</div>
				</fieldset>
			</form>
		</div>
	</div>