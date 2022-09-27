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
        //validação de formulário e insersão do registro
        if($_POST['fornecedor'] != '' && $_POST['valor'] != '' && is_numeric(str_replace(',', '.', $_POST['valor'])) && $_POST['status'] != '' && $_POST['centro_custo'] != '' && $_POST['descricao'] != '' && $_POST['nf'] != '') {
            $fornecedor = $_POST['fornecedor'];
            $valor = str_replace(',', '.', $_POST['valor']);
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
        } else {
            header('Location: /inserir_form?fornecedor='.$_POST['fornecedor'].'&valor='.$_POST['valor'].'&status='.$_POST['status'].'&centro_custo='.$_POST['centro_custo'].'&nf='.$_POST['nf'].'&descricao='.$_POST['descricao']);
        }

    }

    public function editar_form() {
        $despesa = Container::getModel('despesa');
        session_start();
        if (!empty($_GET['id']) && isset($_GET['id'])) {
            $_SESSION['id'] = $_GET['id'];
        }
        $despesa->__set('id', $_SESSION['id']);
        $despesa_id = $despesa->getDespesasId();
        $this->view->despesa = $despesa_id;

        $this->render('formulario_editar.phtml');
    }

    public function editar() {
        $despesa = Container::getModel('despesa');

        $fornecedor = $_POST['fornecedor'];
        $valor = str_replace(',', '.', $_POST['valor']);
        $status = $_POST['status'];
        $centro_custo = $_POST['centro_custo'];
        $nf = $_POST['nf'];
        $descricao = $_POST['descricao'];
        $id = $_POST['id'];

        //validação de formulário e insersão do registro
        if($_POST['fornecedor'] != '' && $_POST['valor'] != '' && is_numeric(str_replace(',', '.', $_POST['valor'])) && $_POST['status'] != '' && $_POST['centro_custo'] != '' && $_POST['descricao'] != '' && $_POST['nf'] != '') {
            //destruindo sessão anterior
            session_start();
            session_destroy();
            $despesa->__set('id', $id);
            $despesa->__set('nome_fornecedor', $fornecedor);
            $despesa->__set('valor', $valor);
            $despesa->__set('status_pag', $status);
            $despesa->__set('centro_custo', $centro_custo);
            $despesa->__set('nf', $nf);
            $despesa->__set('descricao', $descricao);

            $despesa->editDespesa();

            header('Location: /');

        } else {

            header('Location: /editar_form?fornecedor='.$_POST['fornecedor'].'&valor='.$_POST['valor'].'&status='.$_POST['status'].'&centro_custo='.$_POST['centro_custo'].'&nf='.$_POST['nf'].'&descricao='.$_POST['descricao']);
        }
        
    }

    public function busca() {
        $despesa = Container::getModel('despesa');
        
        $id = $_POST['id'];
        $fornecedor = $_POST['fornecedor'];
        $status = $_POST['status'];
        $centro_custo = $_POST['centro_custo'];
        if (!empty($_POST['descricao'])) {
            $descricao = '%' . $_POST['descricao'] . '%';
        } else {
            $descricao = $_POST['descricao'];
        }

        if (!empty($_POST['data'])) {
            $data = $_POST['data'] . '%';
        } else {
            $data = $_POST['data'];
        }        

        $despesa->__set('id', $id);
        $despesa->__set('nome_fornecedor', $fornecedor);
        $despesa->__set('status_pag', $status);
        $despesa->__set('centro_custo', $centro_custo);
        $despesa->__set('descricao', $descricao);
        $despesa->__set('dt_lancamento', $data);

        $this->view->despesas = $despesa->search();

        $this->render('busca.phtml');

    }

    public function detalhes() {
        $despesa = Container::getModel('despesa');
        $despesa->__set('id', $_GET['id']);
        $this->view->despesas = $despesa->getDespesasId();

        $this->render('detalhes.phtml');
    }

}

?>