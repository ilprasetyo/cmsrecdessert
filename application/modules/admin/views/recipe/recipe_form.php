<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Recipe</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <div class="form-group">
            <label>Nama Dessert</label>
            <input type="text" name="nama_dessert" class="form-control" placeholder="">
    </div>
	  <div class="form-group">
            <label>Bahan</label>
            <textarea class="form-control" name="bahan" rows="5" required></textarea>
    </div>
	  <div class="form-group">
            <label>Cara</label>
            <textarea class="form-control" name="cara" rows="5" required></textarea>
    </div>
	  <div class="form-group">
            <label>Gambar</label>
            <input type="text" name="gambar_dessert" class="form-control" placeholder="">
    </div>
	    <input type="hidden" name="id_recipe" />

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
