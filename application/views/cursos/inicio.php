<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('header');
?>
<div class="col-sm-8 offset-sm-1 default-border bg-light default-padding">
     <h3><a class="btn btn-success" href="<?php echo base_url('cursos/cadastrar'); ?>">Novo curso</a> | Cursos</h3>
    <?php if(isset($msg)){ echo $msg;}?>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Id<th>
                <th>Curso<th>
                <th>Professor<th>
                <th>Opções<th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($cursos){
                    foreach($cursos as $curso){
                        echo "<tr>
                        <td>{$curso->id_curso}<td>
                        <td>{$curso->nome}<td>
                        <td>{$curso->id_professor}<td>
                        <td>
                        <a href=\"".base_url('cursos/editar/').$curso->id_curso."\"><span class=\"oi oi-pencil btn btn-success btn-sm\"></span></a>
                        <a href=\"".base_url('cursos/deletar/').$curso->id_curso."\"> <span class=\"oi oi-trash btn btn-sm btn-danger \"></span></a>
                        <td><tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>