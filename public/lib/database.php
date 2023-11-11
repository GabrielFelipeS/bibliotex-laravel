<?php 

/**
 * Cria um registro em uma tabela do banco de dados.
 * @param table: string - nome da tabela
 * @param values: array - valores a serem inseridos em um registro
 * @return boolean - 0 se ocorrer erro
 */
function create($table, array $values) {
    GLOBAL $conn;
    $val = implode("', '", $values);
    $key = implode(", ", array_keys($values));
    $sql = "INSERT INTO $table VALUES ('$val')";

    if(mysqli_query($conn, $sql))
        return $conn->insert_id;
    return 0;
}

/**
 * Lê todos os registros de uma tabela do banco de dados.
 * @param table: string - nome da tabela
 * @return array
 */
function getAll($table) {
    GLOBAL $conn; $aux = [];
    $sql = "SELECT * FROM $table";
    
    $res = mysqli_query($conn, $sql);
    
    
    while($row = mysqli_fetch_assoc($res)){
        $aux[] = $row;
    }
    
    return $aux;
}

/**
 * Lê um registro de uma tabela do banco de dados.
 * @param table: string - nome da tabela
 * @param id: number = identificador do item a ser lido
 * @return array
 */
function get($table, $id) {
    GLOBAL $conn;
    $sql = "SELECT * FROM $table WHERE ".$id;
    $res = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($res);
}

/**
 * Atualiza, possivelmente, algum registro em uma tabela do banco de dados.
 * @param table: string - nome da tabela
 * @param fields: array - pares nome = valor a serem atualizados
 * @param conds: array - pares nome = valor que condicionam a atualização
 * @return boolean
 */
function update($table, $fields, $conds) {
    GLOBAL $conn;
    $fid = []; $cpl = [];
    
    foreach($fields as $key => $value){
        $fid[] = "$key = '$value'";
    }

    
    foreach($conds as $key => $value){
        $cpl[] = "$key = '$value'";
    }

    $sql = "UPDATE TABLE $table SET".implode(', ', $fid)."WHERE ".implode(' AND ', $cpl);
    return mysqli_query($conn, $sql);


}

/**
 * Remove, possivelmente, algum registro em uma tabela do banco de dados.
 * @param table: string - nome da tabela
 * @param conds: array - pares nome = valor que condicionam a atualização
 * @return boolean
 */
function delete($table, array $conds) {
    GLOBAL $conn;
    $cpl = implode(' AND ', $conds);
    $sql = "DELETE FROM $table WHERE $cpl";
    return mysqli_query($conn, $sql);
}


function setValue($key){ 
    return isset($_POST[$key]) ? $_POST[$key]: '';
}

function modificar($table, $fid, $ISBN) {
    GLOBAL $conn;
    $sql = "UPDATE $table SET ".implode(', ', $fid)."WHERE ".$ISBN;
    mysqli_query($conn, $sql);
}