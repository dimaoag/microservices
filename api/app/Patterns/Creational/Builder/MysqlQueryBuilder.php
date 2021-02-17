<?php

declare(strict_types=1);

namespace App\Patterns\Creational\Builder;

/**
 * Каждый Конкретный Строитель соответствует определённому диалекту SQL и может
 * реализовать шаги построения немного иначе, чем остальные.
 *
 * Этот Конкретный Строитель может создавать SQL-запросы, совместимые с MySQL.
 */
class MysqlQueryBuilder implements SQLQueryBuilder
{
    protected $query;

    protected function reset(): void
    {
        $this->query = new \stdClass();
    }

    /**
     * Построение базового запроса SELECT.
     * @param string $table
     * @param array  $fields
     * @return SQLQueryBuilder
     */
    public function select(string $table, array $fields): SQLQueryBuilder
    {
        $this->reset();
        $this->query->base = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $this->query->type = 'select';

        return $this;
    }

    /**
     * Добавление условия WHERE.
     * @param string $field
     * @param string $value
     * @param string $operator
     * @return SQLQueryBuilder
     * @throws \Exception
     */
    public function where(string $field, string $value, string $operator = '='): SQLQueryBuilder
    {
        if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
            throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
        }
        $this->query->where[] = "$field $operator '$value'";

        return $this;
    }

    /**
     * Добавление ограничения LIMIT.
     * @param int $start
     * @param int $offset
     * @return SQLQueryBuilder
     * @throws \Exception
     */
    public function limit(int $start, int $offset): SQLQueryBuilder
    {
        if ($this->query->type !== 'select') {
            throw new \Exception("LIMIT can only be added to SELECT");
        }
        $this->query->limit = " LIMIT " . $start . ", " . $offset;

        return $this;
    }

    /**
     * Получение окончательной строки запроса.
     */
    public function getSQL(): string
    {
        $query = $this->query;
        $sql = $query->base;
        if (!empty($query->where)) {
            $sql .= " WHERE " . implode(' AND ', $query->where);
        }
        if (isset($query->limit)) {
            $sql .= $query->limit;
        }
        $sql .= ";";
        return $sql;
    }
}