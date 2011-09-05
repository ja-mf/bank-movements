<?php

class MovementsController extends AppController {
	var $helpers = array ('Html', 'Form', 'Javascript','Ajax');
	var $name = 'Movements';
	# this would set the global layout (for all methods, in the controller i suppose)
	var $layout = 'generic';
	var $paginate = array(
		'limit' => 5,
		'order' => array(
			'Movement.mwhen' => 'asc'
		)
	);
	

	function index() {
		Configure::write('Config.language','es');
		$this->updateFunds();
		$mov = $this->paginate('Movement');
#		$this->set('movements', $this->Movement->find('all'));
		$this->set('movements', $mov);
		$this->set('total', $this->Movement->read('fund', $this->Movement->getLastInsertID()));
	}
/*
	function plist() {
		$this->set('posts', $this->Post->find('all'));
		# this would set the "minimal" layout only for the index
		#$this->layout = 'minimal';
	}
	
	function view($id = null) {
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
	}
*/
	function add() {
		if (!empty($this->data)) {
			if ($this->Movement->save($this->data)) {
				if ($this->updateFunds()) {
					$this->Session->setFlash('Movimiento guardado');
					$this->redirect(array('action' => 'index'));
				}
			}
		}
	}

	function updateFunds($initFund = 0) {
		$idByDate = $this->Movement->query("SELECT id FROM movements ORDER BY mwhen ASC");
		$p = $this->Movement->read(array('what','amount','fund'), $idByDate[0]['movements']['id']);
		if ($p['Movement']['what'] == 0) {
			$this->Movement->set('fund', $initFund + $p['Movement']['amount']);
		} else {
			$this->Movement->set('fund', $initFund - $p['Movement']['amount']);
		}
		
		$this->Movement->save();

		for ($i = 1; $i < count($idByDate); $i++) {
			$o = $this->Movement->read('fund', $idByDate[$i-1]['movements']['id']);
			$p = $this->Movement->read(array('what','amount', 'fund'), $idByDate[$i]['movements']['id']);
			
			if ($p['Movement']['what'] == 0) {
				$this->Movement->set('fund', $o['Movement']['fund'] + $p['Movement']['amount']);
			} else {
				$this->Movement->set('fund', $o['Movement']['fund'] - $p['Movement']['amount']);
			}
			$this->Movement->save();	
		}

		return 1;
	}

	function delete($id) {
		if ($this->Movement->delete($id)) {
			if ($this->updateFunds()) {
				$this->Session->setFlash('El movimiento bancario N#' . $id . ' ha sido eliminado.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
/*	
	function edit($id = null) {
		$this->Post->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Post->read();
		} else {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash('Your post has been updated.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
*/
}

?>
