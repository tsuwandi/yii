<?php $this->beginContent('/layouts/main'); ?>
<div class="span-22">
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
        <div style="padding: 0 10px 0 10px">
			<?php echo $content; ?>
        </div>
    </div>
</div>

<div class="span-5 last">
    <div id="sidebar">
        <div class="well" style="max-width: 340px; padding: 8px 0; background: #fff; margin-top: 20px;">
			<?php
			$this->widget('bootstrap.widgets.TbNav', array(
				'type' => TbHtml::NAV_TYPE_LIST,
				'items' => $this->menu
			));
			?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>