<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('header');
?>
    <div class="col-sm-8 offset-sm-1 default-border bg-light default-padding">
        <h3>Alunos</h3>
        <form  method="post" action="">
                <?php if(isset($msg)){ echo $msg;}?>
                <div class="row">
                    <div class="col-md-8">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input class="form-control" name="nome" id="nome" required="" type="text"/>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="nascimento">Data de nascimento</label>
                        <input class="form-control"  name="data_nascimento" required="" id="nascimento" type="date"/>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="cep">CEP</label>
                        <input class="form-control" id="cep" name="cep" required="" type="text"/><a href="#" id="btn_src_cep">Buscar endereço</a>
                    </div>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
                        <label for="inputLogradouro">Logradouro</label>
                        <input class="form-control" id="inputLogradouro"  name="logradouro" type="text"/>
                    </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-9">
                <div class="form-group">
                <label for="bairro">Bairro</label>
                <input class="form-control" id="bairro" name="bairro" type="text"/>
                </div>
                </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input class="form-control" name="numero" id="numero" value="" type="number"/>
                    </div>
                    </div>
                    
                </div>
                
            <div class="row">
                    <div class="col-md-5">
                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input class="form-control" name="cidade" id="cidade" type="text"/>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input class="form-control" id="estado" name="estado" type="text" maxlength="2"/>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_curso">Curso</label>
                        <select class="form-control" id="id_curso" name="id_curso" type="text">
                            <?php 
                                if($cursos){
                                    foreach($cursos as $curso){
                                        echo "<option value=\"{$curso->id_curso}\">{$curso->nome}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    </div>
                    </div>
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control btn btn-danger" type="submit" value="Cadastrar"/>
                    </div>
                    </div>
                </div>
            </form>
    </div>
    <script>
    $( document ).ready(function() {
        $("#cep").mask("00.000-000");
    });
        $("#btn_src_cep").click(function(){

            if (/^[0-9]{2}.[0-9]{3}-[0-9]{3}$/.test($("#cep").val())) {
                $.getJSON("https://viacep.com.br/ws/" +$("#cep").val().replace('.','')+ "/json/", function (endereco) {
                    if (endereco.erro) {
                        alert("Erro: CEP não encontrado");
                        return false;
                    }else{
                        $("#inputLogradouro").val(endereco.logradouro);
                        $("#bairro").val(endereco.bairro);
                        $("#cidade").val(endereco.localidade);
                        $("#estado").val(endereco.uf);
                        $("#numero").focus();
                    }
                });
            }
        });
    </script>
<?php
    $this->load->view('footer');
?>


