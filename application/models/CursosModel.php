<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursosModel extends CI_Model
{

    //Captura dados de todos os cursos ou de um curso especifico
    public function getCursos($value = null){
        if(!$value){
            return $this->db->query("SELECT nome, id_curso, id_professor FROM curso ")->result();
        }else{
            if(is_numeric($value)){
                return $this->db->query("SELECT * FROM curso WHERE id_curso = $value")->row();
            }else{
                return false;
            }
        }
    }


    //Cadastra curso
	public function cadastrar(){
        $data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
        $data['id_professor']  = $this->input->post('id_professor');
        $data['data_criacao'] = date('Y-m-d');
        return $this->db->query("INSERT INTO curso (nome,id_professor,data_criacao) VALUES (?,?,?)",$data);
    }
    

    //edita curso
    public function editar($value){
        $data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
        $data['id_professor'] = $this->input->post('id_professor');
        return $this->db->query("UPDATE curso SET nome=?,id_professor=? WHERE id_curso = $value",$data);
    }


    //deleta curso
    public function deletar($value){
            if(is_numeric($value)){
                if($this->db->query("SELECT * FROM curso WHERE id_curso = $value")->row()){
                    return $this->db->query("DELETE FROM curso WHERE id_curso = $value");
                }else{
                    return false;
                }
            }else{
                return false;
            }
    }
}
