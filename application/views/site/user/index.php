<div class="box-center">
	<!-- The box-center register-->
	<div class="tittle-box-center">
		<h2>Đăng nhập thành viên</h2>
	</div>
	<div class="box-content-center register">
        <table>
            <tr>
                <td>Họ tên</td>
                <td><?php echo $user->name; ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $user->email; ?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><?php echo $user->phone; ?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><?php echo $user->address; ?></td>
            </tr>
        </table>
        <a href="<?php echo site_url('user/edit'); ?>" class="button">Sữa thông tin</a>
    </div>
</div>