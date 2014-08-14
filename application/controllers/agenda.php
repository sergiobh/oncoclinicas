<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class agenda extends CI_Controller {
	public function visualizar() {
		$data = $this->uri->segment ( 3 );
		
		$this->load->model ( 'agendaMod' );
		
		if (! $this->agendaMod->setDataAtual ( $data )) {
			$this->load->helper ( 'url' );
			
			header ( 'Location: ' . base_url () );
		}
		
		$dados ['agenda'] = $this->agendaMod->getAgenda ();
		
		$dados ['View'] = 'agenda/index';
		$this->load->view ( 'body/index', $dados );
	}
	public function cadastrar() {
		$data = $this->uri->segment ( 3 );
		$hora = $this->uri->segment ( 4 );
		
		$this->load->model ( 'agendaMod' );
		
		if (! $this->agendaMod->setDataAtual ( $data ) || ! $this->agendaMod->setHoraAtual ( $hora )) {
			$this->load->helper ( 'url' );
			
			header ( 'Location: ' . base_url () );
		}
		
		$dados ['View'] = 'agenda/cadastrar';
		$this->load->view ( 'body/index', $dados );
	}
	public function salvarCadastro() {
		$data = $this->input->post ( 'data' );
		$hora = $this->input->post ( 'hora' );
		$dtNasc = $this->input->post ( 'dtNasc' );
		$medico = $this->input->post ( 'medico' );
		$nome = $this->input->post ( 'nome' );
		$telefone = $this->input->post ( 'tel' );
		
		$this->load->model ( 'agendaMod' );
		$this->agendaMod->setDataAtual ( $data );
		$this->agendaMod->setHoraAtual ( $hora );
		$this->agendaMod->setNome ( $nome );
		$this->agendaMod->setDtNasc ( $dtNasc );
		$this->agendaMod->setMedico ( $medico );
		$this->agendaMod->setTelefone ( $telefone );
		
		echo json_encode ( $this->agendaMod->setAgenda () );
	}
	public function editar() {
		$periodoId = $this->uri->segment ( 3 );
		
		$this->load->model ( 'agendaMod' );
		$this->agendaMod->setPeriodoId ( $periodoId );
		
		$agenda = $this->agendaMod->getRegistroAgenda ();
		
		if (! $agenda) {
			$this->load->helper ( 'url' );
			
			header ( 'Location: ' . base_url () );
		}
		
		$dados ['agenda'] = $agenda;
		
		$dados ['View'] = 'agenda/editar';
		$this->load->view ( 'body/index', $dados );
	}
	public function salvarEdicao() {
		$agendaId = $this->input->post ( 'agendaId' );
		$medico = $this->input->post ( 'medico' );
		$telefone = $this->input->post ( 'tel' );
		
		$this->load->model ( 'agendaMod' );
		$this->agendaMod->setAgendaId ( $agendaId );
		$this->agendaMod->setMedico ( $medico );
		$this->agendaMod->setTelefone ( $telefone );
			
		echo json_encode ( $this->agendaMod->saveAgenda () );
	}
	public function deletar() {
		$agendaId = $this->input->post ( 'agendaId' );
		
		$this->load->model ( 'agendaMod' );
		$this->agendaMod->setAgendaId ( $agendaId );
		
		echo json_encode ( $this->agendaMod->delete () );
	}
}