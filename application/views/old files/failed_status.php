<?php include 'header.php';?>
<?php include 'menu_bar.php';?>

	<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="alert alert-danger">
                        <span class="glyphicon glyphicon-hand-right"></span> <strong> Message</strong>
                        <hr class="message-inner-separator">
                        <p>Your Order has been failed. <a href="<?=base_url('products')?>">Try Again</a></p>
                        <?php $this->cart->destroy(); ?>
                    </div>
                </div>
            </div>
        </div>
	</section>

<?php include 'footer.php';?>
