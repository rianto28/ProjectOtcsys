<div class="container mt-3">

	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash(); ?>
		</div>
	</div>

	<div class="row">

		<div class="col-6">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formModal">
			  Add Product
			</button>
			<h3>Daftar Product</h3>
			<ul class="list-group">
				<?php foreach ($data['product'] as $product) : ?>
					
					  <li class="list-group-item ">
					  	<?= $product['productname'] ; ?>
					  	
					  	<a href="<?= BASEURL; ?>/product/delete/<?= $product['productid']; ?>" class="badge badge-danger float-right ml-1" onclick="return confirm('Are You Sure Delete Data Product ?');">Delete</a>

					  	<a href="<?= BASEURL; ?>/product/detail/<?= $product['productid']; ?>" class="badge badge-primary float-right ">Detail</a>
					  </li>
					  					
				<?php endforeach; ?>
			</ul>
		</div>

	</div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Add Data product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      	<form action="<?= BASEURL ?>/product/tambah" method="post">

      	<div class="form-group">
		    <label for="productcode">Product Code</label>
		    <input type="text" class="form-control" id="productcode" name="productcode" >
		</div>

		<div class="form-group">
		    <label for="productname">Product Name</label>
		    <input type="text" class="form-control" id="productname" name="productname" >
		</div>

		<div class="form-group">
		    <label for="packing">Packing</label>
		    <input type="text" class="form-control" id="packing" name="packing">
		</div>

		<div class="form-group">
		    <label for="hna">HNA</label>
		    <input type="number" class="form-control" id="hna" name="hna">
		</div>

		<div class="form-group">
		    <label for="discount">Discount</label>
		    <input type="number" class="form-control" id="discount" name="discount">
		</div>

		<div class="form-group">
	    <label for="principal">Principal</label>
	    <select class="form-control" id="principal" name="principal">
	      <option value='Ni'>Nicholas</option>
	      <option value='inf'>Indofarma</option>
	      <option value='us'>Usamed</option>
	      
	    </select>
	  </div>

	  <div class="form-group">
	    <label for="status">Status</label>
	    <select class="form-control" id="status" name="status">
	      <option value=1>Aktif</option>
	      <option value=0>Non Aktif</option>
	      	      
	    </select>
	  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  		</form>
    </div>
  </div>
</div>