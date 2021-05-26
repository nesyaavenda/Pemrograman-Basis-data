				<thead>
					<tr>
						<th>Kode Program Studi</th>
						<th>Nama Program Studi</th>
						<th>Jenjang</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$queryjurusan = "SELECT Kode_Jurusan, Nama_Jurusan, Kode_Jenjang_Jrs, Kode_Jenjang, Nama_Jenjang FROM jurusan INNER JOIN jenjang ON Kode_Jenjang_Jrs = Kode_Jenjang";
					$stmt = $konek->prepare($queryjurusan);
					$stmt->execute();

					if ($queryjurusan == false) {
						die("Terjadi Kesalahan : ");
					}
					while ($jurusan = $stmt->fetch()) {

						echo "
								<tr>
									<td>$jurusan[Kode_Jurusan]</td>
									<td>$jurusan[Nama_Jurusan]</td>
									<td>$jurusan[Nama_Jenjang]</td>
									<td>
										<a href='#' class='open_modal' id='$jurusan[Kode_Jurusan]'>Edit</a> |
										<a href='#' onClick='confirm_delete(\"jurusan_delete.php?Kode_Jurusan=$jurusan[Kode_Jurusan]\")'>Delete</a>
									</td>
								</tr>";
					}
					?>
				</tbody>