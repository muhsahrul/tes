<?=
$this->extend('layout/template');
$this->section('content');
?>
<div class="card-header">
	<label class="h4"><?= $title; ?></label>
</div>
<form action="/product/save" method="POST">
	<div class="card-body">
		<!-- <?= old('nama_produk'); ?> -->
		<div class="form-group">
			<label>Nama Produk</label>
			<input type="text" name="nama_produk" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_produk'); ?>">
			<div class="invalid-feedback"><?= $validation->getError('nama_produk'); ?></div>
		</div>
		<div class="form-group">
			<label>kategori</label>
			<input type="text" class="form-control" name="kategori" value="<?= old('kategori'); ?>">
		</div>
		<div class="form-group">
			<label>Harga</label>
			<input type="text" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" name="harga" value="<?= old('harga'); ?>">
			<div class="invalid-feedback"><?= $validation->getError('harga'); ?></div>
		</div>
		<div class="form-group">
			<label>status</label>
			<select name="status" class="form-control">
				<option>bisa dijual</option>
				<option>tidak bisa dijual</option>
			</select>
		</div>
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary ">Simpan</button>
		<a href="/" class="btn btn-secondary float-right">Batal</a>
	</div>
</form>

<?= $this->endSection(); ?>