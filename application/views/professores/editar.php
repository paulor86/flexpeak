<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->load->view('header');
?>
    <div class="col-sm-8 offset-sm-1 default-border bg-light default-padding">
    <h3>Professores | Editar</h3>
    <form  method="post" action="">
            <?php if(isset($msg)){ echo $msg;}?>
            <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input class="form-control" name="nome" value="<?php if($this->input->post()){ echo $this->input->post('nome');} else{ echo $professores->nome;}?>" id="nome" required="" type="text"/>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="nascimento">Data de nascimento</label>
                    <input class="form-control"  name="data_nascimento" value="<?php if($this->input->post()){ echo $this->input->post('data_nascimento');} else{ echo $professores->data_nascimento;}?>" required="" id="nascimento" type="date"/>
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


