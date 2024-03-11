<?php

use App\QueryBuilderInterface;

class MySQLQueryBuilder implements QueryBuilderInterface {
    protected array $query;
    protected string $select;
    protected string $from;
    protected array $where;
    protected string $orderBy;

    public function __construct() {
        $this->query = [];
        $this->select = null;
        $this->from = null;
        $this->where = [];
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

    public function where(array $conditions, string $operator = 'AND'): MySQLQueryBuilder {
        if (!empty($conditions)) {
            $this->where[] = ['conditions' => $conditions, 'operator' => $operator];
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

        if (!empty($this->where)) {
            // Générer la clause WHERE en fonction des conditions
            $whereConditions = [];
            foreach ($this->where as $condition) {
                $whereConditions[] = '(' . implode(' ' . $condition['operator'] . ' ', $condition['conditions']) . ')';
            }
            $query .= 'WHERE ' . implode(' ' . $condition['operator'] . ' ', $whereConditions) . ' ';
        }



        if ($this->orderBy !== null) {
            $query .= $this->orderBy . ' ';
        }

        return trim($query);
    }

}
