<style>
	.error{
		background-color: #FF7200;
		margin-left: 0px;
		padding-top: 0px;
		color: white;
		display: relative;
		width: 30%;
		text-align: center;
	}
</style>
<div class="error">
<?php if (count($errors) > 0): ?>
		<?php foreach ($errors as $error):?>
			<p> <?php echo $error ?> </p>
		<?php endforeach ?>
<?php endif ?>
</div>