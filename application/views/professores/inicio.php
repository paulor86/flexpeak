<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('header');
?>
<div class="col-sm-8 offset-sm-1 default-border bg-light default-padding">
     <h3><a class="btn btn-success" href="<?php echo base_url('professores/cadastrar'); ?>">Novo professor</a> | Professores</h3>
    <?php if(isset($msg)){ echo $msg;}?>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Id<th>
                <th>Nome<th>
                <th>Nascimento<th>
                <th>Opções<th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if($professores){
                    foreach($professores as $professor){
                        echo "<tr>
                        <td>{$professor->id_professor}<td>
                        <td>{$professor->nome}<td>
                        <td>".formata_data($professor->data_nascimento)."<td>
                        <td>
                        <a href=\"".base_url('professores/editar/').$professor->id_professor."\"><span class=\"oi oi-pencil btn btn-success btn-sm\"></span></a>
                        <a href=\"".base_url('professores/deletar/').$professor->id_professor."\"> <span class=\"oi oi-trash btn btn-sm btn-danger \"></span></a>
                        <td><tr>";
                    }
                }
            ?>
        </tbody>
    </table>
</div>