<?php
require_once 'DB.php';

class DBFun extends DB {

    public function fetchAll($table, $fields = "*", $options = NULL, $statement = NULL)
    {
        if ($fields == "" || $fields == null) {$fields = "*";}
        $options != null ? $mode = 1 : $mode = null;
        switch ($mode) {
            case 1:
            $query = "SELECT $fields FROM $table $options $statement";
            break;
            default:
            $query = "SELECT $fields FROM $table";
            break;
        }
        // echo $query;
        $query = $this->query($query);
        $query = $this->resultset();
        return $query;
    }

    //Przykład: $db -> insert("test", "", "first_name, last_name, tekst", "Mike, Szo, Tesktdfgdfds");
    public function insert($table, $options = NULL, $fields, $values = NULL)
    {
        $fields = explode(',', $fields);
        $values = explode(',', $values);
        //Sprawdzenie czy liczba $fields == $values
        if (count($fields) == count($values)) {
            $query = "INSERT INTO $table ";
            $i = 0;
            foreach ($fields as $key => $field) {
                if ($i == 0) {
                    $query .= "($field";
                    $i++;} else {
                    $query .= ", ";
                    $query .= "$field";
                }
            }
            $query .= ")";
            $query .= " VALUES ";
            $j = 0;
            foreach ($values as $key => $value) {
                if ($j == 0) {
                    $query .= "('$value'";
                    $j++;} else {
                    $query .= ", ";
                    $query .= "'$value'";
                }
            }
            $query .= ")";
            $query .= " $options";
            $query = $this->query($query);
            $query = $this->execute();
            return $query;
        } else {
            echo "Niepoprawna ilość pól";
            exit();
        }
    }

    //Przykład $db -> update("test", "last_name = 'Mikele'", "WHERE id = 3");
    //TODO dodać auto ''
    public function update($table, $fields, $options)
    {
        if ($fields == "" || $fields == null) {$fields = "*";}
        $options != null ? $mode = 1 : $mode = null;

        switch ($mode) {
            case 1:
                $query = "UPDATE $table SET $fields $options";
                break;
            default:
                $query = "UPDATE $table SET $fields";
                break;
        }
        echo $query;
        $query = $this->query($query);
        $query = $this->resultSet();
        return $query;
    }

    public function myQuery($query)
    {
        echo $query;
        $query = $this->query($query);
        $query = $this->resultSet();
        return $query;
    }

    //TODO napisać wg konwencji
     public function delete($table, $id)
    {
        $query = "DELETE FROM $table WHERE id = $id";
        echo $query;
        $query = $this->query($query);
        $query = $this->resultSet();
        return $query;
    }
}