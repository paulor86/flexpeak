<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('header');
?>
<div class="col-sm-8 offset-sm-1 default-border bg-light default-padding">
     <h3><a class="btn btn-success" href="<?php echo base_url('alunos/cadastrar'); ?>">Novo aluno</a> | Alunos</h3>
    <?php if(isset($msg)){ echo $msg;}?>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Nome<th>
                <th>Nascimento<th>
                <th>Curso<th>
                <th>Opções<th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($alunos){
                    foreach($alunos as $aluno){
                        echo "<tr>
                        <td>{$aluno->nome}<td>
                        <td>".formata_data($aluno->data_nascimento)."<td>
                        <td>{$aluno->id_curso}<td>
                        <td>
                        <a href=\"".base_url('alunos/editar/').$aluno->id_aluno."\"><span class=\"oi oi-pencil btn btn-success btn-sm\"></span></a>
                        <a href=\"".base_url('alunos/deletar/').$aluno->id_aluno."\"> <span class=\"oi oi-trash btn btn-sm btn-danger \"></span></a>
                        <td><tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>