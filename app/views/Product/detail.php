<div class="container mt-5">
	<div class="card" style="width: 30rem;">
	  <div class="card-body">
	    <h5 class="card-title">Product Name : <?= $data['product']['productname']; ?></h5>
	    <h6 class="card-subtitle mb-2 text-muted">Product Code : <?= $data['product']['productcode']; ?></h6>
	    <p class="card-text">Packing : <?= $data['product']['pack']; ?></p>
	    <a href="<?= BASEURL ?>/product" class="card-link">Back</a>
	    
	  </div>
	</div>
</div>