<?php

# TODO: Créer une classe QueryBuilder en utilisant le design pattern Builder

namespace App;

interface QueryBuilderInterface
{
    public function select(string $table, array $fields): self;
    public function from(string $table): self;
    public function where(string $field, string $value, string $operator = '='): self;
    public function orderBy(string $field, string $order = 'ASC'): self;
    public function join(string $table, string $first, string $operator, string $second): self;
    public function getQuery(): string;

}