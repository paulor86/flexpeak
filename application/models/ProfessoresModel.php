<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfessoresModel extends CI_Model
{

    //Captura dados de todos os usuarios ou de um usuário especifico
    public function getProfessores($value = null){
        if(!$value){
            return $this->db->query("SELECT * FROM professor")->result();
        }else{
            if(is_numeric($value)){
                return $this->db->query("SELECT * FROM professor WHERE id_professor = $value")->row();
            }else{
                return false;
            }
        }
    }

    //Cadastra professor
	public function cadastrar(){
        $data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
        $data['data_nascimento']  = $this->input->post('data_nascimento');
        $data['data_criacao'] = date('Y-m-d');
        return $this->db->query("INSERT INTO professor (nome,data_nascimento,data_criacao) VALUES (?,?,?)",$data);
    }
    

    //edita professor
    public function editar($value){
        $data['nome'] = ucwords(mb_strtolower($this->input->post('nome')));
        $data['data_nascimento'] = $this->input->post('data_nascimento');
        return $this->db->query("UPDATE professor SET nome=?,data_nascimento=? WHERE id_professor = $value",$data);
    }


    //deleta professor
    public function deletar($value){
            if(is_numeric($value)){
                if($this->db->query("SELECT * FROM professor WHERE id_professor = $value")->row()){
                    return $this->db->query("DELETE FROM professor WHERE id_professor = $value");
                }else{
                    return false;
                }
            }else{
                return false;
            }
    }
}
