<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>

table.first {
        font-family: Arial;
        font-size: 12pt;
        border:3px solid #333;
    }
</style>
<h1>RELATÓRIOS</h1>
<table border="1" class="first" cellpadding="3" cellspacing="3">
    <thead>
        <tr>
            <th align="center"><b>ALUNO</b></th>
            <th align="center"><b>CURSO</b></th>
            <th align="center"><b>PROFESSOR</b></th>
        </tr>
    </thead>
    <hr>
    <tbody>
        <?php
            foreach($relatorios as $relatorio){
                echo "<tr><td>{$relatorio->aluno}</td><td>{$relatorio->curso}</td><td>{$relatorio->professor}</td></tr>";
            }
        ?>
    
    </tbody>
</table>