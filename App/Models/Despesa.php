<?php

namespace App\Models;
use MF\Model\Model;

class Despesa extends Model {
    private $id;
    private $dt_lancamento;
    private $descricao;
    private $valor;
    private $nome_fornecedor;
    private $centro_custo;
    private $nf;
    private $status_pag;

    public function __get($attr) {
        return $this->$attr;
    }

    public function __set($attr, $valor) {
        $this->$attr = $valor;
    }

    //recuperando todos os dados do BD
    public function getDespesas($limit, $offset) {
        $query = "select id, DATE_FORMAT(dt_lancamento, '%d/%m/%Y') as dt_lancamento, descricao, valor, nome_fornecedor, centro_custo, nf, status_pag 
        from despesas ORDER BY id DESC limit $limit offset $offset";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getDespesasExport() {
        $query = "select id, DATE_FORMAT(dt_lancamento, '%d/%m/%Y') as dt_lancamento, descricao, valor, nome_fornecedor, centro_custo, nf, status_pag 
        from despesas ORDER BY id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }    

    //contando registros para a paginação
    public function getTotalDespesas() {
        $query='select count(*) as total from despesas';
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    //recuperando despesa por id do BD
    public function getDespesasId() {
        $query = 'select * from despesas where id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }    

    //deletar despesa no BD
    public function delDespesa() {
        $query = 'delete from despesas where id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    //criando despesa no BD
    public function insertDespesa() {
        $query= 'insert into despesas(descricao, valor, nome_fornecedor, centro_custo, nf, status_pag)values(
            :descricao, :valor, :fornecedor, :centro_custo, :nf, :status
        )';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':valor', $this->__get('valor'));
        $stmt->bindValue(':fornecedor', $this->__get('nome_fornecedor'));
        $stmt->bindValue(':centro_custo', $this->__get('centro_custo'));
        $stmt->bindValue(':nf', $this->__get('nf'));
        $stmt->bindValue(':status', $this->__get('status_pag'));
        $stmt->execute();

        return $this;
    }

    //editando despesa no BD
    public function editDespesa() {
        $query='update despesas set descricao=:descricao, valor=:valor, nome_fornecedor=:fornecedor, centro_custo=:centro_custo, nf=:nf, status_pag=:status where id=:id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':valor', $this->__get('valor'));
        $stmt->bindValue(':fornecedor', $this->__get('nome_fornecedor'));
        $stmt->bindValue(':centro_custo', $this->__get('centro_custo'));
        $stmt->bindValue(':nf', $this->__get('nf'));
        $stmt->bindValue(':status', $this->__get('status_pag'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $this;
    }

    public function search() {
        $query = "select id, DATE_FORMAT(dt_lancamento, '%d/%m/%Y') as dt_lancamento, descricao, valor, nome_fornecedor, centro_custo, nf, status_pag
         from despesas where dt_lancamento like :data or centro_custo = :centro_custo or nome_fornecedor like :fornecedor or status_pag = :status or descricao like :descricao or id=:id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':descricao', $this->__get('descricao'));
        $stmt->bindValue(':fornecedor', $this->__get('nome_fornecedor'));
        $stmt->bindValue(':centro_custo', $this->__get('centro_custo'));
        $stmt->bindValue(':data', $this->__get('dt_lancamento'));
        $stmt->bindValue(':status', $this->__get('status_pag'));
        $stmt->bindValue(':id', $this->__get('id'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>