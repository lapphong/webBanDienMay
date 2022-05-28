<?php 

	$sp_tungtrang=10;
	if(!isset($_GET['trang'])){
		$trang=1;
	}else {
		$trang=$_GET['trang'];
	}
	$tung_trang=($trang-1)*10;

 ?>

<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<h3 style="padding-right: 200px;" class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Danh mục sản phẩm</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div style="padding-left: 100px;" class="agileinfo-ads-display col-lg-9">
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4"> 
						<div class="wrapper">
						<?php
						$sql_cate_home = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY category_id DESC");
						while($row_cate_home = mysqli_fetch_array($sql_cate_home)){
							$id_category = $row_cate_home['category_id'];
						?>
						<!-- first section -->
					 		 
				 		 	<div>
							 <h3 class="heading-tittle text-center font-italic"></h3>
							<div class="row" style="padding:relative;padding-right: 100px;">
								<?php
									$sql_product = mysqli_query($con,"SELECT * FROM tbl_sanpham ORDER BY sanpham_id DESC LIMIT $tung_trang,$sp_tungtrang");
								while($row_sanpham = mysqli_fetch_array($sql_product)){ 
									if($row_sanpham['category_id']==$id_category){
								?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="images/<?php echo $row_sanpham['sanpham_image'] ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>" class="link-product-add-cart">Xem sản phẩm</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="?quanly=chitietsp&id=<?php echo $row_sanpham['sanpham_id'] ?>"><?php echo $row_sanpham['sanpham_name'] ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']).'vnđ' ?></span>
												<del><?php echo number_format($row_sanpham['sanpham_gia']).'vnđ' ?></del>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<form action="?quanly=giohang" method="post">
												<fieldset>
													<input type="hidden" name="tensanpham" value="<?php echo $row_sanpham['sanpham_name'] ?>" />
													<input type="hidden" name="sanpham_id" value="<?php echo $row_sanpham['sanpham_id'] ?>" />
													<input type="hidden" name="giasanpham" value="<?php echo $row_sanpham['sanpham_gia'] ?>" />
													<input type="hidden" name="hinhanh" value="<?php echo $row_sanpham['sanpham_image'] ?>" />
													<input type="hidden" name="soluong" value="1" />			
													<input type="submit" name="themgiohang" value="Thêm giỏ hàng" class="button" />
												</fieldset>
											</form>
											</div>
										</div>
									</div>
								</div>
								<?php
									}
								} 
								?>
							</div>
						</div>
						<!-- //first section -->
							<?php
							} 
							?>
						
					</div>
					<div style="padding-left: 250px;padding-top: 100px;">Trang
						<?php 
							$produc_all=mysqli_query($con,"SELECT * FROM tbl_sanpham ");
							$product_count=mysqli_num_rows($produc_all);
							$product_button=ceil($product_count/10);
							$i=1;
							// echo '<p>Trang: </p>';
							for($i=1;$i<=$product_button;$i++){
								echo '<a style="margin:0 20px" href="index.php?trang='.$i.'">' .$i. '</a>';
							}

						 ?>

					</div>
				</div>
				
				<!-- //product left -->

				<!-- product right -->
				<!-- <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">

						
					<!-- //product right -->
				</div>
			</div> 
		</div>
	</div>
	<!-- //top products -->
