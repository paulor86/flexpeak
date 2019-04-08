<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('header');
?>
    <div class="col-sm-8 offset-sm-1 default-border bg-light default-padding">
    <h3>Alunos | Editar</h3>
    <form  method="post" action="">
            <?php if(isset($msg)){ echo $msg;}?>
            <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" name="nome" value="<?php if($this->input->post()){ echo $this->input->post('nome');} else{ echo $alunos->nome;}?>" id="nome" required="" type="text"/>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nascimento">Data de nascimento</label>
                    <input class="form-control"  name="data_nascimento" value="<?php if($this->input->post()){ echo $this->input->post('data_nascimento');} else{ echo $alunos->data_nascimento;}?>" required="" id="nascimento" type="date"/>
                  </div>
                </div>
              </div>
            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="cep">CEP</label>
                    <input class="form-control" id="cep" name="cep" value="<?php if($this->input->post()){ echo $this->input->post('cep');} else{ echo $alunos->cep;}?>" required="" type="text"/>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label for="inputLogradouro">Logradouro</label>
                    <input class="form-control" id="inputLogradouro"  name="logradouro" value="<?php if($this->input->post()){ echo $this->input->post('logradouro');} else{ echo $alunos->logradouro;}?>" type="text"/>
                  </div>
                </div>
              </div>
              <div class="row">
            <div class="col-md-9">
              <div class="form-group">
              <label for="bairro">Bairro</label>
              <input class="form-control" id="bairro" name="bairro" value="<?php if($this->input->post()){ echo $this->input->post('bairro');} else{ echo $alunos->bairro;}?>" type="text"/>
              </div>
            </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="numero">Número</label>
                    <input class="form-control" name="numero" id="numero" value="<?php if($this->input->post()){ echo $this->input->post('numero');} else{ echo $alunos->numero;}?>" type="number"/>
                  </div>
                </div>
                
              </div>
              
          <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input class="form-control" name="cidade" id="cidade" value="<?php if($this->input->post()){ echo $this->input->post('cidade');} else{ echo $alunos->cidade;}?>" type="text"/>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="estado">Estado</label>
                    <input class="form-control" id="estado" name="estado" value="<?php if($this->input->post()){ echo $this->input->post('estado');} else{ echo $alunos->estado;}?>" type="text" maxlength="2"/>
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
                    <input class="form-control btn btn-danger" type="submit" value="Atualizar"/>
                  </div>
                </div>
              </div>
            </form>
    </div>

<?php
    $this->load->view('footer');
?>


