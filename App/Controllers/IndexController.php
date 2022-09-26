<?php

namespace App\Controllers;
use MF\Controller\Action;
use MF\Model\Container;


class IndexController extends Action  {


    public function index() {
        $despesa = Container::getModel('despesa');
        $this->view->despesas = $despesa->getDespesas();

        $this->render('index.phtml');
    }

    public function deletar() {
        $despesa = Container::getModel('despesa');
        $despesa->__set('id', $_GET['id']);
        $despesa->delDespesa();

        header('Location: /');

    }

    public function inserir_form() {
        $this->render('formulario.phtml');
    }

    public function inserir() {

        $fornecedor = $_POST['fornecedor'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        $centro_custo = $_POST['centro_custo'];
        $nf = $_POST['nf'];
        $descricao = $_POST['descricao'];

        $despesa = Container::getModel('despesa');
        $despesa->__set('nome_fornecedor', $fornecedor);
        $despesa->__set('valor', $valor);
        $despesa->__set('status_pag', $status);
        $despesa->__set('centro_custo', $centro_custo);
        $despesa->__set('nf', $nf);
        $despesa->__set('descricao', $descricao);

        $despesa->insertDespesa();

        header('Location: /');

    }

    public function editar_form() {
        $despesa = Container::getModel('despesa');
        $despesa->__set('id', $_GET['id']);
        $despesa_id = $despesa->getDespesasId();
        $this->view->despesa = $despesa_id;

        $this->render('formulario_editar.phtml');
    }

    public function editar() {
        $despesa = Container::getModel('despesa');

        $fornecedor = $_POST['fornecedor'];
        $valor = $_POST['valor'];
        $status = $_POST['status'];
        $centro_custo = $_POST['centro_custo'];
        $nf = $_POST['nf'];
        $descricao = $_POST['descricao'];
        $id = $_POST['id'];

        $despesa->__set('id', $id);
        $despesa->__set('nome_fornecedor', $fornecedor);
        $despesa->__set('valor', $valor);
        $despesa->__set('status_pag', $status);
        $despesa->__set('centro_custo', $centro_custo);
        $despesa->__set('nf', $nf);
        $despesa->__set('descricao', $descricao);

        $despesa->editDespesa();

        header('Location: /');
    }

}

?>