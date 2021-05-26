				<thead>
					<tr>
						<th>NIP</th>
						<th>Dosen</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Telpon</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$querydosen = "SELECT NIP, Nama_Dosen, DATE_FORMAT(Tanggal_Lahir, '%d-%m-%Y')as Tanggal_Lahir, JK, No_Telp, Alamat FROM dosen";
					$stmt = $konek->prepare($querydosen);
					$stmt->execute();

					if ($querydosen == false) {
						die("Terjadi Kesalahan : ");
					}
					while ($dosen = $stmt->fetch()) {

						echo "
								<tr>
									<td>$dosen[NIP]</td>
									<td>$dosen[Nama_Dosen]</td>
									<td>$dosen[Tanggal_Lahir]</td>
									<td>
								";
						if ($dosen["JK"] == "L") {
							echo "Laki - laki";
						} else {
							echo "Perempuan";
						}
						echo "
									</td>
									<td>$dosen[No_Telp]</td>
									<td>$dosen[Alamat]</td>
									<td>
										<a href='#' class='open_modal' id='$dosen[NIP]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"dosen_delete.php?NIP=$dosen[NIP]\")'>Delete</a>
									</td>
								</tr>";
					}
					?>
				</tbody>