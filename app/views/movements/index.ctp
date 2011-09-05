<table>
<tr>
	<th width="150px">Fecha</th>
	<th width="90px">Tipo</th>
	<th>Motivo</th>
	<th>Monto</th>
	<th>Saldo</th>
	<th width="20px">Eliminar</th>
</tr>
<?php foreach ($movements as $movement): ?>
<? $m = $movement['Movement']; ?>
	<tr class="<?= ($m['what'] == 0) ? "deposito" : "giro" ?>">
		<? $the_date = strftime('%a %d %b, %Y', strtotime($m['mwhen'])) ?>
		<td><?= $the_date ?></td>
		<td><?= ($m['what'] == 0) ? 
			$this->Html->image('in.png') . " Deposito" : 
			$this->Html->image('out.png') . " Giro"; ?>
		</td>
		<td><?= $m['reason'] ?></td>
		<td><?= money_format('%.0n', $m['amount']) ?></td>
		<td><?= money_format('%.0n', $m['fund']) ?></td>
		<td>
			<? 	#echo $this->Html->link('Eliminar', '/movements/delete/'.$m['id'], array('class'=>'button'));
				echo $this->Html->link($this->Html->image('delete.png', array('alt' => 'Eliminar')),
										'/movements/delete/' . $m['id'],
										array('escape' => false),
										'Confime eliminacion del movimiento'
										);
			?>
		</td>
	</tr>
<?php endforeach; ?>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td>Total</td>
		<td><?= money_format('%.0n', $total['Movement']['fund']) ?></td>
		<td></td>
	</tr>
</table>

    <!-- Shows the page numbers -->
    <?php echo $this->Paginator->numbers(); ?>
    <!-- Shows the next and previous links -->
    <?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
    <?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>
    <!-- prints X of Y, where X is current page and Y is number of pages -->
	<br /><br />
    <?php echo $this->Paginator->counter(); ?>

