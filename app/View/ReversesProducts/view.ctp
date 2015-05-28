<div class="reversesProducts view">
<h2><?php echo __('Reverses Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reversesProduct['ReversesProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reverse'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reversesProduct['Reverse']['id'], array('controller' => 'reverses', 'action' => 'view', $reversesProduct['Reverse']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reversesProduct['Product']['id'], array('controller' => 'products', 'action' => 'view', $reversesProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Embalagem'); ?></dt>
		<dd>
			<?php echo h($reversesProduct['ReversesProduct']['embalagem']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reverses Product'), array('action' => 'edit', $reversesProduct['ReversesProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reverses Product'), array('action' => 'delete', $reversesProduct['ReversesProduct']['id']), null, __('Are you sure you want to delete # %s?', $reversesProduct['ReversesProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reverses Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reverses Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reverses'), array('controller' => 'reverses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reverse'), array('controller' => 'reverses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
