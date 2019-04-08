<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlunosModel extends CI_Model
{

    //Captura dados de todos os usuarios ou de um usuário especifico   
    public function getAlunos($value = null){
        if(!$value){
          return $this->db->query("SELECT * FROM aluno")->result();
       
        }else{
            if(is_numeric($value)){
                return $this->db->query("SELECT * FROM aluno WHERE id_aluno = $value")->row();
            }else{
                return false;
            }
        }
    }

    //Cadastra aluno
	public function cadastrar(){
        $data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
        $data['data_nascimento'] = $this->input->post('data_nascimento');
        $data['logradouro'] = ucwords(mb_strtolower($this->input->post('logradouro')));
        $data['numero'] = $this->input->post('numero');
        $data['bairro'] = ucwords(mb_strtolower($this->input->post('bairro')));
        $data['cidade'] = ucwords(mb_strtolower($this->input->post('cidade')));
        $data['estado'] = ucwords(mb_strtolower($this->input->post('estado')));
        $data['data_criacao'] = date('Y-m-d');
        $data['cep'] = $this->input->post('cep');
        $data['id_curso']  = $this->input->post('id_curso');
        return $this->db->query("INSERT INTO aluno (nome,data_nascimento,logradouro,numero,bairro,cidade,estado,data_criacao,cep,id_curso) VALUES (?,?,?,?,?,?,?,?,?,?)",$data);
    }


    //edita aluno
    public function editar($value){
        $data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
        $data['data_nascimento'] = $this->input->post('data_nascimento');
        $data['logradouro'] = ucwords(mb_strtolower($this->input->post('logradouro')));
        $data['numero'] = $this->input->post('numero');
        $data['bairro'] = ucwords(mb_strtolower($this->input->post('bairro')));
        $data['cidade'] = ucwords(mb_strtolower($this->input->post('cidade')));
        $data['estado'] = ucwords(mb_strtolower($this->input->post('estado')));
        $data['cep'] = $this->input->post('cep');
        $data['id_curso']  = $this->input->post('id_curso');
        return $this->db->query("UPDATE aluno SET nome=?,data_nascimento=?,logradouro=?,numero=?,bairro=?,cidade=?,estado=?,cep=?,id_curso=? WHERE id_aluno = $value",$data);
    }


    //deleta aluno
    public function deletar($value){
            if(is_numeric($value)){
                if($this->db->query("SELECT * FROM aluno WHERE id_aluno = $value")->row()){
                    return $this->db->query("DELETE FROM aluno WHERE id_aluno = $value");
                }else{
                    return false;
                }
            }else{
                return false;
            }
    }
    


}
