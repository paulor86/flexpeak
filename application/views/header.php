<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>FlexPeak <?php if(isset($title)){ echo " - $title";}?></title>
	<link rel="shortcut icon" href="<?php echo base_url('resources/img/favicon.ico');?>">
	<link rel="stylesheet" href="<?php echo base_url('resources/css/bootstrap.min.css');?>"/>
	<link rel="stylesheet" href="<?php echo base_url('resources/css/open-iconic-bootstrap.css');?>"/>
	<link rel="stylesheet" href="<?php echo base_url('resources/css/style.css');?>"/>
	<script src="<?php echo base_url('resources/js/jquery.js');?>"></script>
	<script src="<?php echo base_url('resources/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('resources/js/mask.min.js');?>"></script>
	
</head>
<body>
	<div class="container  default-margin-top">
		<div class="row">
			<div class="col-sm-3">
				<div class="text-center list-group">
					<a href="<?php echo base_url('alunos');?>" class="list-group-item list-group-item-action">Alunos</a>
					<a href="<?php echo base_url('cursos');?>" class="list-group-item list-group-item-action">Cursos</a>
					<a href="<?php echo base_url('professores');?>" class="list-group-item list-group-item-action">Professores</a>
					<a href="<?php echo base_url('relatorios');?>" class="list-group-item list-group-item-action">Relatórios</a>
				</div>
			</div>
			
		