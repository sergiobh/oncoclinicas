<?php
class CalendarioMod extends CI_Model {
	private $data;
	private $hora;
	
	public function setData($data) {
		$this->data = $data;
	}
	public function getData() {
		return $this->data;
	}
	public function setHora($hora) {
		$this->hora = $hora;
	}
	public function getHora() {
		return $this->hora;
	}
	public function getCalendario() {
		$sql = '
				SELECT
					id
				FROM
					calendario
				WHERE
					data = "' . $this->data->format('Y-m-d') . '"
					AND hora = "' . $this->hora . '"
				';

		$query = $this->db->query ( $sql );
		
		$dados = $query->row ();
		
		if (is_object ( $dados )) {
			return $dados->id;
		} else {
			return false;
		}
	}
	public function setCalendario() {
		if ($id = $this->getCalendario ()) {
			return $id;
		}
		
		$sql = '
				INSERT INTO
				calendario(
					data,
					hora
				)
				VALUES(
					"' . $this->data->format('Y-m-d') . '",
					"' . $this->hora . '"
				)
				';

		$this->db->query ( $sql );
		
		if ($this->db->affected_rows () > 0) {
			return $this->db->insert_id ();
		} else {
			return false;
		}
	}
}
?>