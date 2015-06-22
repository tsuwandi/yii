<?php $this->beginContent('/layouts/main'); ?>
<div style="width: 1110px; padding: 0 20px 0 30px;" class="last">
    <div id="content">
		<?php if (isset($this->breadcrumbs)): ?>
			<div style="margin-top: 20px;">
			<?php
			$this->widget('bootstrap.widgets.TbBreadcrumb', array(
				'links' => $this->breadcrumbs,
				'homeLabel' => 'Home',
			));
			?>
			</div>
		<?php endif ?>
        <div style="padding: 0 10px 50px 10px;">
			<?php echo $content; ?>
        </div>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>