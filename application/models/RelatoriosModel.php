<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RelatoriosModel extends CI_Model {
	public function __construct(){
		parent::__construct();
    }

    public function getRelatorios(){
        return $this->db->query("SELECT aluno.nome as aluno, curso.nome as curso, professor.nome as professor FROM aluno INNER JOIN curso ON aluno.id_curso = curso.id_curso INNER JOIN professor ON curso.id_professor = professor.id_professor")->result();
    }
}