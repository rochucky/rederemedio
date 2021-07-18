<?php 

class Database {

  private $db = false;

  function __construct() {
    $this->db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($this->mysql -> connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
      exit();
    }
  }
  
  public function getListaRemedios($search, $sort = false){
    $search = str_replace(' ', '%', $search);
    $query = sprintf("
      select 
        s.*,
        e.nome as farmacia,
        e.lat,
        e.long
      from 
        sites s 
      inner join empresas e on e.codigo = s.farmacia
      where 
        s.description like '%%%s%%' or
        s.class like '%%%s%%' or
        e.nome like '%%%s%%'", $search, $search, $search);
    $db_data = $this->db->query($query);
    
    $results = [];

    while($row = $db_data->fetch_array()){
      $results[] = array_map(array($this, 'decode'), $row);
    }
    
    return $results;


  }

  public function getRemedio($id){
    $search = str_replace(' ', '%', $search);
    $query = sprintf("
      select 
        s.*,
        e.nome as farmacia
      from 
        sites s 
      inner join empresas e on e.codigo = s.farmacia
      where 
        s.id = %s", $id);
    $db_data = $this->db->query($query);
    
    if($row = $db_data->fetch_array()){
      return array_map(array($this, 'decode'), $row);
    }
    else{
      return false;
    }
  }

  protected function decode($string){
    return utf8_decode($string);
  }

  public function logInUser ($username, $password) {
    $username = str_replace("'", '', $username);
    $password = str_replace("'", '', $password);

    $query = sprintf("
      select
        *
      from
        users
      where
        username = '%s' and
        password = '%s'
    ", $username, $password);
    $db_data = $this->db->query($query);
    
    $results = [];

    while($row = $db_data->fetch_array()){
      $results[] = array_map(array($this, 'decode'), $row);
    }
    
    return $results[0];
  }

  public function createUser ($username, $password, $user_type_id) {
    $username = str_replace("'", '', $username);
    $password = str_replace("'", '', $password);
    $user_type_id = str_replace("'", '', $user_type_id);

    $query = sprintf("
      insert into
        users
      values
        (
          '',
          '%s',
          '%s',
          %d,
          ''
        )
    ", $username, $password, $user_type_id);
    $this->db->query($query);

    return $this->db->insert_id;

  }

  public function createClient ($id, $name) {
    $id = str_replace("'", '', $id);
    $name = str_replace("'", '', $name);

    $query = sprintf("
      insert into
        clients
        (
          id,
          name
        )
      values
        (
          '%s',
          '%s'
        )
    ", $id, $name);
    $db_data = $this->db->query($query);

    return ['success' => $db_data, 'message' => $this->db->error];
  }

  public function createDrugstore ($id, $name, $cnpj) {
    $id = str_replace("'", '', $id);
    $name = str_replace("'", '', $name);
    $cnpj = str_replace("'", '', $cnpj);

        $query = sprintf("
      insert into
        drugstores
        (
          id,
          name,
          cnpj
        )
      values
        (
          '%s',
          '%s',
          '%s'
        )
    ", $id, $name, $cnpj);
    $db_data = $this->db->query($query);

    return ['success' => $db_data, 'message' => $this->db->error];
  }
  
  public function getUserByUsername ($username) {
    $username = str_replace("'", '', $username);

    $query = sprintf("
      select
        *
      from
        users
      where
        username = '%s'
    ", $username);
    $db_data = $this->db->query($query);
    
    $results = [];
    
    while($row = $db_data->fetch_array()){
      $results[] = array_map(array($this, 'decode'), $row);
    }

    return $results;
  }

  public function getClient ($id) {
    $id = str_replace("'", '', $id);

    $query = sprintf("
            select
        *
      from
        clients
      where
        id = '%s'
    ", $id);
    $db_data = $this->db->query($query);
    
    $results = [];

    while($row = $db_data->fetch_array()){
      $results[] = array_map(array($this, 'decode'), $row);
    }

    return $results[0];
  }

  function getDrugstore ($id) {
    $id = str_replace("'", '', $id);

    $query = sprintf("
      select
        *
      from
        drugstores
      where
        id = '%s'
    ", $id);
    $db_data = $this->db->query($query);
    
    $results = [];

    while($row = $db_data->fetch_array()){
      $results[] = array_map(array($this, 'decode'), $row);
    }

    return $results[0];
  }

  function getClientData ($id) {
    $id = str_replace("'", '', $id);

    $query = sprintf("
      select
        u.username,
        c.*
      from
        users u
      inner join clients c on c.id = u.id
      where
        u.id = '%s'
    ", $id);
    $db_data = $this->db->query($query);
    
    $results = [];

    while($row = $db_data->fetch_array()){
      $results[] = $row;
    }

    return $results[0];
  }

  function getDrugstoreData ($id) {
    $id = str_replace("'", '', $id);

    $query = sprintf("
      select
        u.username,
        d.*
      from
        users u
      inner join drugstores d on d.id = u.id
      where
        u.id = '%s'
    ", $id);
    $db_data = $this->db->query($query);
    
    $results = [];

    while($row = $db_data->fetch_array()){
      $results[] = $row;
    }

    return $results[0];
  }

  function query ($query, $decode = true) {
    $db_data = $this->db->query($query);
    $results = [];

    while($row = $db_data->fetch_array()){
      if($decode){
        $results[] = array_map(array($this, 'decode'), $row);
      }
      else{
        $results[] = $row;
      }
    }
    if($this->db->error) {
      return $this->db->error;
    }
    return $results;
  }

  function update ($table, $data, $id) {
    $id = str_replace("'", '', $id);

    $update_data = [];
    foreach($data as $key => $value){
      $update_data[] = sprintf("%s = '%s'", $key, $value);
    }

    $query = sprintf("
      update
        %s
      set
        %s
      where
        id = '%s'
    ", $table, implode(', ', $update_data), $id);

    $db_data = $this->db->query($query);

    return ['success' => $db_data, 'message' => $this->db->error];
  }

}

?>