<?=
$this->extend('layout/template');
$this->section('content');
?>
<div class="card-header">
	<label class="h4">Tabel Produk</label>
	<a href="/product/getJSON" class="btn btn-primary btn-sm">Get JSON</a>
	<a href="/product/create" class="btn btn-outline-primary float-right btn-sm">Tambah</a>
</div>
<div class="card-body">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama_Produk</th>
				<th>Kategori</th>
				<th>Harga</th>
				<th>Status</th>
				<th width="15%">Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($produk as $item) { ?>
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $item['nama_produk']; ?></td>
					<td><?= $item['kategori']; ?></td>
					<td><?= 'Rp. ' . number_format($item['harga'], 0, ',', '.'); ?></td>
					<td><?= $item['status']; ?></td>
					<td><a href="/product/edit/<?= $item['id_produk']; ?>" class="btn btn-outline-success btn-sm">Edit</a> <a href="/product/delete/<?= $item['id_produk']; ?>" onclick="return confirm('Yakin ingin hapus?')" class="btn btn-outline-danger btn-sm">Hapus</a></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?= $this->endSection(); ?>