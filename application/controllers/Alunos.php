<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller
{

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->model('AlunosModel');
		$this->load->helper('recursos_helper');
		$this->load->model('CursosModel');
	}

	public function index(){
		$temp = $this->AlunosModel->getAlunos();
		foreach($temp as $aluno){
			$aluno->id_curso = $this->CursosModel->getCursos($aluno->id_curso) ? ($this->CursosModel->getCursos($aluno->id_curso))->nome : "Sem curso";
		}
		$page['alunos'] = $temp;
		$this->load->view('alunos/inicio',$page);
	}


	public function cadastrar(){
		$page['title'] = 'Cadastrar aluno';
		
		if($this->input->post()){
			$this->form_validation->set_rules('nome', 'Nome', 'required|trim');
			$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required|trim');
			$this->form_validation->set_rules('logradouro', 'Logradouro', 'required|trim');
			$this->form_validation->set_rules('numero', 'Numero', 'required|trim|numeric');
			$this->form_validation->set_rules('bairro', 'Bairro', 'required|trim');
			$this->form_validation->set_rules('cidade', 'Cidade', 'required|trim');
			$this->form_validation->set_rules('estado', 'Estado', 'required|trim');
			$this->form_validation->set_rules('cep', 'Cep', 'required|trim');
			$this->form_validation->set_rules('id_curso', 'Id_curso', 'required|trim|numeric');
			if($this->form_validation->run() == FALSE){
				$page['msg'] = "Erro:".validation_errors();
			}else{
				if($this->AlunosModel->cadastrar()){
					$page['msg'] = msg_sucesso("Aluno cadastrado com sucesso!");
				}else{
					$page['msg'] = msg_erro("Erro ao cadastrar o novo aluno");
				}
			}

		}
			$page['cursos'] = $this->CursosModel->getCursos();
			$this->load->view('alunos/cadastrar',$page);
	}

	public function editar(){
		$id_aluno = $this->uri->segment(3);
		if(!is_numeric($id_aluno)){
			$page['msg'] = msg_erro("Usuário inválido");
			$temp = $this->AlunosModel->getAlunos();
			foreach($temp as $aluno){
				$aluno->id_curso = $this->CursosModel->getCursos($aluno->id_curso) ? ($this->CursosModel->getCursos($aluno->id_curso))->nome : "Sem curso";
			}
			$page['alunos'] = $temp;
			$this->load->view('alunos/inicio',$page);
		}else{
			$page['alunos'] = $this->AlunosModel->getAlunos($id_aluno);
			if($page['alunos']){
				if($this->input->post()){
					$this->form_validation->set_rules('nome', 'Nome', 'required|trim');
					$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required|trim');
					$this->form_validation->set_rules('logradouro', 'Logradouro', 'required|trim');
					$this->form_validation->set_rules('numero', 'Numero', 'required|trim|numeric');
					$this->form_validation->set_rules('bairro', 'Bairro', 'required|trim');
					$this->form_validation->set_rules('cidade', 'Cidade', 'required|trim');
					$this->form_validation->set_rules('estado', 'Estado', 'required|trim');
					$this->form_validation->set_rules('cep', 'Cep', 'required|trim');
					$this->form_validation->set_rules('id_curso', 'Id_curso', 'required|trim|numeric');
					if($this->form_validation->run() == FALSE){
						$page['msg'] = msg_erro("Erro:".validation_errors());
						$page['cursos'] = $this->CursosModel->getCursos();
						$this->load->view('alunos/editar',$page);
					}else{
						if($this->AlunosModel->editar($id_aluno)){
							$page['msg'] = msg_sucesso("Aluno atualizado com sucesso!");
						}else{
							$page['msg'] = msg_erro("Erro ao atualizar cadastro do aluno");	
						}
						$temp = $this->AlunosModel->getAlunos();
						foreach($temp as $aluno){
							$aluno->id_curso = $this->CursosModel->getCursos($aluno->id_curso) ? ($this->CursosModel->getCursos($aluno->id_curso))->nome : "Sem curso";
						}
						$page['alunos'] = $temp;
						$this->load->view('alunos/inicio',$page);
					}
				}else{
					$page['cursos'] = $this->CursosModel->getCursos();
					$this->load->view('alunos/editar',$page);
				}
				
			}else{
				
				$page['msg'] = msg_erro("Aluno não encontrado");
				$temp = $this->AlunosModel->getAlunos();
				foreach($temp as $aluno){
					$aluno->id_curso = $this->CursosModel->getCursos($aluno->id_curso) ? ($this->CursosModel->getCursos($aluno->id_curso))->nome : "Sem curso";
				}
				$page['alunos'] = $temp;
				$this->load->view('alunos/inicio',$page);
			}
			
		}
		
		
	}

	public function deletar(){
		$id_aluno = $this->uri->segment(3);
		if(!is_numeric($id_aluno)){
			$page['msg'] = msg_erro("Usuário inválido");
		}else{
			if($this->AlunosModel->deletar($id_aluno)){
				$page['msg'] = msg_sucesso("Usuário excluido com sucesso");
			}else{
				$page['msg'] = msg_erro("Erro ao excluir o aluno");
			}
		}
		$temp = $this->AlunosModel->getAlunos();
		foreach($temp as $aluno){
			$aluno->id_curso = $this->CursosModel->getCursos($aluno->id_curso) ? ($this->CursosModel->getCursos($aluno->id_curso))->nome : "Sem curso";
		}
		$page['alunos'] = $temp;
		$this->load->view('alunos/inicio',$page);
	}
}
