<?php 
use Elementor\Icons_Manager;
	
$has_icon = ! empty( $item['selected_icon']['value']); 

?>

<?php if($settings['style'] == 'style-1'): ?>
	<div class="item icon-box-item style-1 <?php echo ($item['active'] == 'yes' ? 'active' : ''); ?>">
			<div class="item-box">
				<div class="item-box-content">
					<?php if ( $has_icon ){ ?>
						<div class="box-icon">
							<?php if ( $has_icon ){ ?>
								<span class="icon-inner">
									<?php Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								</span>
							<?php } ?>
						</div>
					<?php } ?>

					<div class="box-content">
						<?php if($item['title']){ ?>
							<h4 class="title"><?php echo $item['title'] ?></h4>
						<?php } ?>
						<?php if($item['desc']){ ?>
							<div class="desc"><?php echo $item['desc'] ?></div>
						<?php } ?>
					</div>	
				</div>	
		   	<?php $this->gva_render_link_html('', $item['link'], 'link-overlay'); ?>
			</div>	
	</div>	   
<?php endif; ?>	

<?php if($settings['style'] == 'style-2'): ?>
	<?php if ( $has_icon ){ ?>
		<div class="icon-inner">
			<span class="box-icon">
				<?php Icons_Manager::render_icon( $item['selected_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</span>
		</div>
	<?php } ?>

	<?php if($item['title']){ ?>
		<h3 class="title"><?php echo $item['title'] ?></h3>
	<?php } ?>
<?php endif; ?>	