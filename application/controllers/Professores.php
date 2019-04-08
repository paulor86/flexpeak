<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professores extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('ProfessoresModel');
		$this->load->helper('recursos_helper');
	}

	public function index(){
		$page['professores'] = $this->ProfessoresModel->getProfessores();
		$this->load->view('professores/inicio',$page);
	}


	public function cadastrar(){
		$page['title'] = 'Cadastrar professor';
		
		if($this->input->post()){
			$this->form_validation->set_rules('nome', 'Nome', 'required|trim');
			$this->form_validation->set_rules('data_nascimento', 'Data_nascimento', 'required|trim');
			if($this->form_validation->run() == FALSE){
				$page['msg'] = "Erro:".validation_errors();
			}else{
				if($this->ProfessoresModel->cadastrar()){
					$page['msg'] = msg_sucesso("Professor cadastrado com sucesso!");
				}else{
					$page['msg'] = msg_erro("Erro ao cadastrar o novo professor");
				}
			}

		}
			$this->load->view('professores/cadastrar',$page);
	}

	public function editar(){
		$id_professor = $this->uri->segment(3);
		if(!is_numeric($id_professor)){
			$page['professores'] = $this->ProfessoresModel->getProfessores();
			$page['msg'] = msg_erro("Usuário inválido");
			$this->load->view('professores/inicio',$page);
		}else{
			$page['professores'] = $this->ProfessoresModel->getProfessores($id_professor);
			if($page['professores']){
				if($this->input->post()){
					$this->form_validation->set_rules('nome', 'Nome', 'required|trim');
					$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required|trim');
					if($this->form_validation->run() == FALSE){
						$page['msg'] = msg_erro("Erro:".validation_errors());
						$this->load->view('professores/editar',$page);
					}else{
						if($this->ProfessoresModel->editar($id_professor)){
							$page['msg'] = msg_sucesso("Professor atualizado com sucesso!");
						}else{
							$page['msg'] = msg_erro("Erro ao atualizar cadastro do professor");	
						}
						$page['professores'] = $this->ProfessoresModel->getProfessores();
						$this->load->view('professores/inicio',$page);
					}
				}else{
					$this->load->view('professores/editar',$page);
				}
				
			}else{
				$page['professores'] = $this->ProfessoresModel->getProfessores();
				$page['msg'] = msg_erro("Professor não encontrado");
				$this->load->view('professores/inicio',$page);
			}
			
		}
		
		
	}

	public function deletar(){
		$id_professor = $this->uri->segment(3);
		if(!is_numeric($id_professor)){
			$page['msg'] = msg_erro("Usuário inválido");
		}else{
			if($this->ProfessoresModel->deletar($id_professor)){
				$page['msg'] = msg_sucesso("Usuário excluido com sucesso");
			}else{
				$page['msg'] = msg_erro("Erro ao excluir o aluno");
			}
		}
		$page['professores'] =  $this->ProfessoresModel->getProfessores();
		$this->load->view('professores/inicio',$page);
	}
}
