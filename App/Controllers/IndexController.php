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
        if($_POST['fornecedor'] != '' && $_POST['valor'] != '' && is_numeric(str_replace(',', '.', $_POST['valor'])) && $_POST['status'] != '' && $_POST['centro_custo'] != '' && $_POST['descricao'] != '' && $_FILES['nf']['name'] != '') {
            $fornecedor = $_POST['fornecedor'];
            $valor = str_replace(',', '.', $_POST['valor']);
            $status = $_POST['status'];
            $centro_custo = $_POST['centro_custo'];
            $descricao = $_POST['descricao'];

            //Armazenando imagem no public
            if(isset($_FILES['nf']))
            {
              $ext = strtolower(substr($_FILES['nf']['name'],-4)); //Pegando extensão do arquivo
              $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
              $dir = './assets/notas_fiscais/'; //Diretório para uploads
         
              move_uploaded_file($_FILES['nf']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            }
            $nf = $new_name;

            //set no model
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
            header('Location: /inserir_form?fornecedor='.$_POST['fornecedor'].'&valor='.$_POST['valor'].'&status='.$_POST['status'].'&centro_custo='.$_POST['centro_custo'].'&descricao='.$_POST['descricao'].'&nf='.$_FILES['nf']['name']);
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
        $descricao = $_POST['descricao'];
        $id = $_POST['id'];

        //validação de formulário e insersão do registro
        if($_POST['fornecedor'] != '' && $_POST['valor'] != '' && is_numeric(str_replace(',', '.', $_POST['valor'])) && $_POST['status'] != '' && $_POST['centro_custo'] != '' && $_POST['descricao'] != '' && $_FILES['nf']['name'] != '') {
            //destruindo sessão anterior
            session_start();
            session_destroy();

            //Armazenando imagem no public
            if(isset($_FILES['nf']))
            {
              $ext = strtolower(substr($_FILES['nf']['name'],-4)); //Pegando extensão do arquivo
              $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
              $dir = './assets/notas_fiscais/'; //Diretório para uploads
         
              move_uploaded_file($_FILES['nf']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
            }
            $nf = $new_name;

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

            header('Location: /editar_form?fornecedor='.$_POST['fornecedor'].'&valor='.$_POST['valor'].'&status='.$_POST['status'].'&centro_custo='.$_POST['centro_custo'].'&nf='.$_FILES['nf']['name'].'&descricao='.$_POST['descricao']);
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

    public function exportar() {
        $despesas_obj = Container::getModel('despesa');
        $despesas = $despesas_obj->getDespesas();
        $arquivo = 'despesas.xls';

        $table = '<table border="1">';
        $table .= '<tr>';
        $table .= '<td colspan="7" align="center"><strong>Controle de Despesas</strong></td>';
        $table .= '</tr>';
        $table .='<tr>';
        $table .= '<td>ID</td>';
        $table .= '<td>Data</td>';
        $table .= '<td>Centro de custo</td>';
        $table .= '<td>Fornecedor</td>';
        $table .= '<td>Valor</td>';
        $table .= '<td>Status</td>';
        $table .= '<td>Nota Fiscal</td>';
        $table .= '</tr>';

        foreach($despesas as $key => $despesa) {
            $table .= '<tr>';
            $table .= '<td>'. $despesa['id'] .'</td>';
            $table .= '<td>'. $despesa['dt_lancamento'] .'</td>';
            $table .= '<td>'. $despesa['centro_custo'] .'</td>';
            $table .= '<td>'. $despesa['nome_fornecedor'] .'</td>';
            $table .= '<td>'. $despesa['valor'] .'</td>';

            if ($despesa['status_pag'] == 1) {
            $table .= '<td>Pago</td>';
            } else if ($despesa['status_pag'] == 2) {
            $table .= '<td>Pendente</td>';
            } else if ($despesa['status_pag'] == 3) {
            $table .= '<td>Agendado</td>';
            } else if ($despesa['status_pag'] == 4) {
            $table .= '<td>Realizado acordo</td>';
            }

            $table .= '<td>'. $despesa['nf'] .'</td>';
            $table .= '</tr>';
        }

        $table .= '</table>';

        header('Cache-Control: no-cache, must-revalidate');
        header('Pragma: no-cache');
        header('Content-Type: application/x-msexcel');
        header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
        
    }

}

?>