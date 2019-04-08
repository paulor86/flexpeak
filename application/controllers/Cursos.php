<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('CursosModel');
		$this->load->helper('recursos_helper');
		$this->load->model('ProfessoresModel');
	}

	public function index(){
		$temp = $this->CursosModel->getCursos();
		foreach($temp as $curso){
			$curso->id_professor = $this->ProfessoresModel->getProfessores($curso->id_professor) ? ($this->ProfessoresModel->getProfessores($curso->id_professor))->nome : "Sem professor";
			
		}

		$page['cursos'] = $temp;
		$this->load->view('cursos/inicio',$page);
	}


	public function cadastrar(){
		$page['title'] = 'Cadastrar curso';
		
		if($this->input->post()){
			$this->form_validation->set_rules('nome', 'Descrição', 'required|trim');
			$this->form_validation->set_rules('id_professor', 'Id_professor', 'required|trim|numeric');
			if($this->form_validation->run() == FALSE){
				$page['msg'] = "Erro:".validation_errors();
			}else{
				if($this->CursosModel->cadastrar()){
					$page['msg'] = msg_sucesso("Curso cadastrado com sucesso!");
				}else{
					$page['msg'] = msg_erro("Erro ao cadastrar o novo curso");
				}
			}

		}
		$page['professores'] = $this->ProfessoresModel->getProfessores();
		$this->load->view('cursos/cadastrar',$page);
	}

	public function editar(){
		$id_curso = $this->uri->segment(3);
		if(!is_numeric($id_curso)){
			$page['cursos'] = $this->CursosModel->getCursos();
			$page['msg'] = msg_erro("Usuário inválido");
			$this->load->view('cursos/inicio',$page);
		}else{
			$page['cursos'] = $this->CursosModel->getCursos($id_curso);
			if($page['cursos']){
				if($this->input->post()){
					$this->form_validation->set_rules('nome', 'Nome', 'required|trim');
					$this->form_validation->set_rules('id_professor', 'Id_professor', 'required|trim|numeric');
					if($this->form_validation->run() == FALSE){
						$page['msg'] = msg_erro("Erro:".validation_errors());
						$page['professores'] = $this->ProfessoresModel->getProfessores();
						$this->load->view('cursos/editar',$page);
					}else{
						if($this->CursosModel->editar($id_curso)){
							$page['msg'] = msg_sucesso("Curso atualizado com sucesso!");
						}else{
							$page['msg'] = msg_erro("Erro ao atualizar cadastro do curso");	
						}
						$temp = $this->CursosModel->getCursos();
						foreach($temp as $curso){
							$curso->id_professor = $this->ProfessoresModel->getProfessores($curso->id_professor) ? ($this->ProfessoresModel->getProfessores($curso->id_professor))->nome : "Sem professor";
							
						}
						$page['cursos'] = $temp;
						$this->load->view('cursos/inicio',$page);
					}
				}else{
					$page['professores'] = $this->ProfessoresModel->getProfessores();
					$this->load->view('cursos/editar',$page);
				}
				
			}else{
				$page['cursos'] = $this->CursosModel->getCursos();
				$page['msg'] = msg_erro("Curso não encontrado");
				$this->load->view('cursos/inicio',$page);
			}
			
		}
	}

	public function deletar(){
		$id_curso = $this->uri->segment(3);
		if(!is_numeric($id_curso)){
			$page['msg'] = msg_erro("Curso inválido");
		}else{
			if($this->CursosModel->deletar($id_curso)){
				$page['msg'] = msg_sucesso("Curso excluido com sucesso");
			}else{
				$page['msg'] = msg_erro("Erro ao excluir o curso");
			}
		}
		$temp = $this->CursosModel->getCursos();
		foreach($temp as $curso){
			$curso->id_professor = $this->ProfessoresModel->getProfessores($curso->id_professor) ? ($this->ProfessoresModel->getProfessores($curso->id_professor))->nome : "Sem professor";
			
		}
		$page['cursos'] = $temp;
		$this->load->view('cursos/inicio',$page);
	}
}
