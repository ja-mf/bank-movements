<?php
echo $this->Form->create('Movement');
echo $this->Form->input('reason', array('label' => 'Razon'));
echo $this->Form->input('amount', array('label' => 'Monto'));
echo $this->Form->input('mwhen', array('type' => 'text','label' => 'Fecha y hora','id' => 'dp'));
#echo $datePicker->picker('mwhen', array('label' => 'Fecha');
echo $ajax->datepicker('dp', array('dateFormat' => 'yy-mm-dd', 'firstDay' => '1'));
echo $this->Form->radio('what', array('Deposito','Giro'), array('legend' => false));
echo $this->Form->input('fund', array('value' => 0, 'type' => 'hidden'));
echo $this->Form->end('Guardar');
?>

