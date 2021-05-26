				<thead>
					<tr>
						<th>NPM</th>
						<th>Nama Mahasiswa</th>
						<th>Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Telpon</th>
						<th>Alamat</th>
						<th>Program Studi</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$querymhs = "SELECT NIM, Nama_Mahasiswa, DATE_FORMAT(Tanggal_Lahir, '%d-%m-%Y')as Tanggal_Lahir, JK, No_Telp, Alamat, Kode_Jurusan_Mhs, Nama_Jurusan FROM mahasiswa INNER JOIN jurusan ON Kode_Jurusan_Mhs = Kode_Jurusan";
					$stmt = $konek->prepare($querymhs);
					$stmt->execute();

					if ($querymhs == false) {
						die("Terjadi Kesalahan : ");
					}
					while ($mhs = $stmt->fetch()) {

						echo "
								<tr>
									<td>$mhs[NIM]</td>
									<td>$mhs[Nama_Mahasiswa]</td>
									<td>$mhs[Tanggal_Lahir]</td>
									<td>
								";
						if ($mhs["JK"] == "L") {
							echo "Laki - laki";
						} else {
							echo "Perempuan";
						}
						echo "
									</td>
									<td>$mhs[No_Telp]</td>
									<td>$mhs[Alamat]</td>
									<td>$mhs[Nama_Jurusan]</td>
									
								</tr>";
					}
					?>
				</tbody>