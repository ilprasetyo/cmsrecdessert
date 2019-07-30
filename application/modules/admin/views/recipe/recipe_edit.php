<div class="row">
  <div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Recipe</h4>
            <form class="form-material m-t-40" method="post" action="<?php echo base_url().$action ?>">
	  <!-- <div class="form-group">
                    <label>id_recipe</label>
                    <input type="text" name="id_recipe" class="form-control" placeholder="" value="<?php echo $dataedit->id_recipe?>" readonly>
            </div> -->
	  <div class="form-group">
            <label>Nama Dessert</label>
            <input type="text" name="nama_dessert" class="form-control" value="<?php echo $dataedit->nama_dessert?>">
    </div>
	  <div class="form-group">
            <label>Bahan</label>
            <textarea class="form-control" name="bahan" rows="5" required><?php echo $dataedit->bahan?></textarea>
            <!-- <input type="text" name="bahan" class="form-control" value="<?php echo $dataedit->bahan?>"> -->
    </div>
	  <div class="form-group">
            <label>Cara</label>
            <textarea class="form-control" name="cara" rows="5" required><?php echo $dataedit->cara?></textarea>
            <!-- <input type="text" name="cara" class="form-control" value="<?php echo $dataedit->cara?>"> -->
    </div>
	  <div class="form-group">
            <label>Gambar</label>
            <input type="text" name="gambar_dessert" class="form-control" value="<?php echo $dataedit->gambar_dessert?>">
    </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
