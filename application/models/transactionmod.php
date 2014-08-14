<?php
class TransactionMod extends CI_Model {
	public function start() {
		$sql = "START TRANSACTION";
		
		$this->db->query ( $sql );
	}
	public function commit() {
		$sql = "COMMIT";
		
		$this->db->query ( $sql );
	}
	public function rollback() {
		$sql = "ROLLBACK";
		
		$this->db->query ( $sql );
	}
}
?>