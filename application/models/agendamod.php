<?php
class AgendaMod extends CI_Model {
	private $periodoId;
	private $data;
	private $hora;
	private $dtNasc;
	private $medico;
	private $nome;
	private $telefone;
	private $agendaId;
	public function setPeriodoId($periodoId) {
		$this->periodoId = $periodoId;
	}
	public function getPeriodoId() {
		return $this->periodoId;
	}
	public function setData($data) {
		$this->data = $data;
	}
	public function getDataYmd() {
		return $this->data->format ( 'Y-m-d' );
	}
	public function getDatadmYBr() {
		return $this->data->format ( 'd/m/Y' );
	}
	public function getDatadmYUrl($dias = false) {
		if ($dias) {
			$newData = clone $this->data;
			$newData->modify ( $dias . ' days' );
		} else {
			$newData = $this->data;
		}
		
		return $newData->format ( 'd-m-Y' );
	}
	public function getDataDiaSemana() {
		switch ($this->data->format ( 'N' )) {
			case 1 :
				$diaSemana = 'Segunda';
				break;
			case 2 :
				$diaSemana = 'Terça';
				break;
			case 3 :
				$diaSemana = 'Quarta';
				break;
			case 4 :
				$diaSemana = 'Quinta';
				break;
			case 5 :
				$diaSemana = 'Sexta';
				break;
			case 6 :
				$diaSemana = 'Sábado';
				break;
			case 7 :
				$diaSemana = 'Domingo';
				break;
		}
		
		return $diaSemana;
	}
	public function getDataMes() {
		switch ($this->data->format ( 'm' )) {
			case 1 :
				$mes = 'Jan';
				break;
			case 2 :
				$mes = 'Fev';
				break;
			case 3 :
				$mes = 'Mar';
				break;
			case 4 :
				$mes = 'Abr';
				break;
			case 5 :
				$mes = 'Mai';
				break;
			case 6 :
				$mes = 'Jun';
				break;
			case 7 :
				$mes = 'Jul';
				break;
			case 8 :
				$mes = 'Ago';
				break;
			case 9 :
				$mes = 'Set';
				break;
			case 10 :
				$mes = 'Out';
				break;
			case 11 :
				$mes = 'Nov';
				break;
			case 12 :
				$mes = 'Dez';
				break;
		}
		
		return $mes;
	}
	public function getDataAno() {
		return $this->data->format ( 'Y' );
	}
	public function getDataDia() {
		return $this->data->format ( 'd' );
	}
	public function setDataAtual($data = NULL) {
		if (! $data) {
			$this->data = new DateTime ();
			
			return true;
		} else {
			if ($this->checkData ( $data )) {
				$this->data = DateTime::createFromFormat ( 'd-m-Y', $data );
				
				return true;
			} else {
				return false;
			}
		}
	}
	
	/*
	 * parametro de entrada data formato BR d-m-Y retorno bolean
	 */
	private function checkData($data) {
		return checkdate ( substr ( $data, 3, 2 ), substr ( $data, 0, 2 ), substr ( $data, 6, 4 ) );
	}
	public function getHora() {
		return $this->hora;
	}
	public function setHoraAtual($hora) {
		if ($this->checkHora ( $hora )) {
			$this->hora = $hora;
			
			return true;
		} else {
			return false;
		}
	}
	private function checkHora($hora) {
		return ($hora >= 0 && $hora <= 23);
	}
	public function setDtNasc($dtNasc) {
		$this->dtNasc = DateTime::createFromFormat ( 'd/m/Y', $dtNasc );
	}
	public function getDtNasc() {
		return $this->dtNasc;
	}
	public function setMedico($medico) {
		$this->medico = $medico;
	}
	public function getMedico() {
		return $this->Medico;
	}
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
	}
	public function getTelefone() {
		return $this->telefone;
	}
	public function setNome($nome) {
		$this->nome = $nome;
	}
	public function getNome() {
		return $this->nome;
	}
	public function getAgenda() {
		$sql = '
				SELECT
					H.id AS hora
					,A.id AS agendaId
					,A.nome
					,A.dtNasc
					,A.telefone
					,A.medico
				FROM
					hora H
					LEFT JOIN calendario C ON C.hora = H.id AND C.data = "' . $this->getDataYmd () . '"
					LEFT JOIN agenda A ON A.periodoId = C.id
				ORDER BY
					H.id
				';
		
		$query = $this->db->query ( $sql );
		
		return $query->result ();
	}
	public function getRegistroAgenda() {
		$sql = '
				SELECT
					A.id AS agendaId
					,DATE_FORMAT( C.data , "%d/%m/%Y" ) as data
					,DATE_FORMAT( C.data , "%d-%m-%Y" ) as dataAtual
					,C.hora
					,A.nome
					,DATE_FORMAT( A.dtNasc , "%d/%m/%Y" ) as dtNasc
					,A.telefone
					,A.medico
				FROM
					calendario C
					INNER JOIN agenda A ON A.periodoId = C.id
				WHERE
					A.id = ' . $this->periodoId . '
				';
		
		$query = $this->db->query ( $sql );
		
		$dados = $query->row ();
		
		if (is_object ( $dados )) {
			$this->setDataAtual ( $dados->dataAtual );
			
			return $dados;
		} else {
			return false;
		}
	}
	public function setAgenda() {
		$this->load->model ( "TransactionMod" );
		$this->TransactionMod->start ();
		
		$this->load->model ( "CalendarioMod" );
		$this->CalendarioMod->setData ( $this->data );
		$this->CalendarioMod->setHora ( $this->hora );
		
		$periodoId = $this->CalendarioMod->setCalendario ();
		
		if (! $periodoId) {
			$retorno ['success'] = false;
			$retorno ['msg'] = 'Ocorreu um erro no servidor!';
			
			return $retorno;
		}
		
		$sql = '
				INSERT INTO
				agenda(
					periodoId,
					nome,
					dtNasc,
					telefone,
					medico
				)
				VALUES(
					' . $periodoId . ',
					"' . $this->nome . '",
					"' . $this->dtNasc->format ( 'Y-m-d' ) . '",
					"' . $this->telefone . '",
					"' . $this->medico . '"
				)
				';
		
		$this->db->query ( $sql );
		
		if ($this->db->affected_rows () > 0) {
			$retorno ['success'] = true;
			$retorno ['msg'] = 'Agendamento gravado com sucesso!';
			
			$this->TransactionMod->commit ();
		} else {
			$retorno ['success'] = false;
			$retorno ['msg'] = 'Ocorreu um erro no servidor!';
			
			$this->TransactionMod->rollback ();
		}
		
		return $retorno;
	}
	public function setAgendaId($agendaId) {
		$this->agendaId = $agendaId;
	}
	public function delete() {
		$sql = '
				DELETE
				FROM
					agenda
				WHERE
					id = ' . $this->agendaId . '
				';
		
		$this->db->query ( $sql );
		
		if ($this->db->affected_rows () > 0) {
			$retorno ['success'] = true;
			
			return $retorno;
		} else {
			$retorno ['success'] = false;
			
			return $retorno;
		}
	}
	public function saveAgenda() {
		$sql = '
				UPDATE
					agenda
				SET
					medico = "' . $this->medico . '"
					,telefone = "' . $this->telefone . '"
				WHERE
					id = ' . $this->agendaId . '
				';
		
		$this->db->query ( $sql );
		
		$retorno ['success'] = true;
		$retorno ['msg'] = 'Registro atualizado com sucesso!';
		
		return $retorno;
	}
}
?>