	<div class="container pt-5">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>E-mail</th>
						<th>Username</th>
						<th>Telepon</th>
						<th>Alamat</th>
						<th>Pekerjaan</th>
						<th>Pilhan</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($user as $u){ ?>
					<tr>
						<td><?php echo $u->id ?></td>
						<td><?php echo $u->nama ?></td>
						<td><?php echo $u->email ?></td>
						<td><?php echo $u->username ?></td>
						<td><?php echo $u->telepon ?></td>
						<td><?php echo $u->alamat ?></td>
						<td><?php echo $u->pekerjaan ?></td>
						<td>
							<?php echo anchor("admin/hapus_user/".$u->id, "<button class='btn btn-outline-danger'>hapus</button>"); ?>
						</td>

					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>


                          