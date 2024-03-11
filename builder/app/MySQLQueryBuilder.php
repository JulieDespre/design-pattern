<?php

use App\QueryBuilderInterface;

class MySQLQueryBuilder implements QueryBuilderInterface {
    protected array $query;
    protected string $select;
    protected string $from;
    protected string $where;
    protected string $orderBy;

    public function __construct() {
        $this->query = [];
        $this->select = null;
        $this->from = null;
        $this->where = null;
        $this->orderBy = null;
    }

    public function select(string $table, array $fields): MySQLQueryBuilder {
        $this->select = "SELECT " . implode(', ', $fields);
        return $this;
    }

    public function from(string $table): MySQLQueryBuilder {
        $this->from = "FROM $table";
        return $this;
    }

    public function join(string $table, string $first, string $operator, string $second): MySQLQueryBuilder {
        $this->query[] = "JOIN $table ON $first $operator $second";
        return $this;
    }

    public function where(string $field, ?string $value = null, string $operator = '='): MySQLQueryBuilder {
        if ($value !== null) {
            $this->where = "WHERE $field $operator '$value'";
        } else {
            $this->where = "WHERE $field";
        }
        return $this;
    }

    public function orderBy(string $field, string $order = 'ASC'): MySQLQueryBuilder {
        $this->orderBy = "ORDER BY $field $order";
        return $this;
    }

    public function getQuery(): string {
        //concatene les différentes parties de la query
        $query = '';

        if ($this->select !== null) {
            $query .= $this->select . ' ';
        }

        if ($this->from !== null) {
            $query .= $this->from . ' ';
        }

        if ($this->where !== null) {
            $query .= $this->where . ' ';
        }

        if ($this->orderBy !== null) {
            $query .= $this->orderBy . ' ';
        }

        return trim($query);
    }

}
