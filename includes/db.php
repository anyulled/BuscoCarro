<?php
/**
 * Clase para el manejo de la Base de Datos
 * @author Anyul Rivas
 */
Class db {

    /**
     * host
     * @var string Host
     */
    private $host= "localhost";
    /**
     * nombre de usuario
     * @var string usuario
     */
    private $user = "root";
    /**
     * contraseña de acceso
     * @var string contraseña
     */
    private $password ="root"; //"CEP7F5n8YF";
    /**
     * Tabla
     * @var string tabla
     */
    private $db = "buscocarro";
    /**
     * mysqli instance
     * @var msqli sql
     */
    private $mysqli= null;

    /**
     * Debug indica si está en modo debug y muestra en un campo las consultas realizadas;
     */
    private $debug = true;

    function __construct() {

        try {
            $this->mysqli = new mysqli($this->host,$this->user,$this->password,$this->db);
            $this->mysqli->query("SET NAMES 'utf8'");
        } catch (Exception $exc) {
            echo $this->mysqli->connect_errno." ".$this->mysqli->connect-error;
            echo $exc->getTraceAsString();
        }

    }

    function  __destruct() {
        $this->mysqli->close();
    }

    /**
     * Realiza una consulta y devuelve un array con los resultados
     * @param string $query Consulta
     * @return array El array de los resultados
     */
    public function dame_query($query) {
        try {
            $resultado = $this->mysqli->query($query);
            $result = array();
            $r['suceed'] = true;
            if($this->debug) {
                $r['query'] = $query;
            }

            if ($this->mysqli->errno == 0) {
                while($fila =$resultado->fetch_array(MYSQLI_ASSOC)) {
                    $result[] = $fila;
                }
                $r['data'] = $result;
                $r['stats']['affected_rows'] = $this->mysqli->affected_rows;
            }
            else {
                throw new Exception;
            }
        } catch (Exception $exc) {
            $r['suceed'] = false;
            if($this->debug) {
                $r['query'] = $query;
            }
            $r['stats']['errno'] = $this->mysqli->errno;
            $r['stats']['error'] = $this->mysqli->error;
            $r['data'] = $exc->getTraceAsString();
        }

        return $r;
    }

    /**
     * ejecuta una sentencia SQL y devuelve el resultado
     * @param string $query instrucción SQL
     * @return mysqli query
     */
    public function exec_query($query) {
        try {
            $r = array();
            $r['suceed'] = true;
            $r['data'] = $this->mysqli->query($query);
            $r['stats']['affected_rows'] = $this->mysqli->affected_rows;
        } catch (Exception $exc) {
            $r['suceed'] = false;
            $r['stats']['errno'] = $this->mysqli->errno;
            $r['stats']['error'] = $this->mysqli->error;
            $r['data'] = $exc->getTraceAsString();
        }
        return $r;
    }

    /**
     * Realiza una consulta y devuelve los resultados en una matriz asociativa
     * @param array $columnas un arreglo de las columnas a seleccionar ['col1','col2','col3'] o un solo campo
     * @param array $tablas un arreglo de las tablas a seleccionar ['tabla1','tabla2','tabla3'] o una sola tabla
     * @param array $condicion una cadena o un arreglo con las condiciones de la busqueda
     * @param array $join una cadena o un arreglo con los join {por desarrollar}
     * @param array $order una cadena o un arreglo con el orden del select
     * @param array $groupby una cadena o un arreglo con los campos a agrupar
     * @return array el arreglo asociativo con los resultados de la consulta
     */
    public function select($columnas=null,$tablas=null,$condicion=null,$join=null,$order=null,$groupby=null) {
        try {
            $r = array();
            if($columnas!=null && $tablas!=null) {
                $query = "select ";
                if(is_array($columnas)) {
                    for($i=0;$i<count($columnas);$i++) {
                        $query.= $columnas[$i].(($i<(count($columnas)-1))?", " : " ");
                    }
                }
                else {
                    $query.= $columnas;
                }
                $query.= " from ";
                if(is_array($tablas)) {

                }
                else {
                    $query.= $this->db.".".$tablas;
                }

                if($condicion!=null) {
                    if(count(array_keys($condicion))== 1) {
                        $query.= " where ".key($condicion)." = ".$condicion[key($condicion)];
                    }
                    else {
                        $columnasCondicion = array_keys($condicion);
                        $valoresCondicion = array_values($condicion);
                        for($q=0;$q < count($condicion);$q++) {
                            if($q==0) {
                                $query.=' where ';
                            }
                            else {
                                $query.= ' and ';
                            }
                            $query.= $columnasCondicion[$q]." = '".$valoresCondicion[$q]."'";
                        }
                    }
                }
                if($join!=null) {
                    //to do
                }
                if($order!=null) {
                    $query.= " order by ";
                    if(is_array($order)) {
                        foreach($order as $key=>$val) {
                            $query.= $key." ".$val;
                        }
                    }

                }
                if($groupby!=null) {
                    //to do
                }
                $resultado = $this->mysqli->query($query);

                $a = array();
                if ($this->mysqli->errno == 0) {
                    while($fila =$resultado->fetch_array(MYSQLI_ASSOC)) {
                        $a[] = $fila;
                    }
                    if($this->debug) {
                        $r['query'] = $query;
                    }
                    $r['suceed']=true;
                    $r['data'] = $a;
                    $r['stats']['affected_rows'] = $this->mysqli->affected_rows;
                }
                else {
                    throw new Exception;
                }
            }
        } catch (Exception $exc) {
            if($this->debug) {
                $r['query'] = $query;
            }
            $r['suceed'] = false;
            $r['stats']['errno']= $this->mysqli->errno;
            $r['stats']['error']= $this->mysqli->error;
            $r['data'] = $exc->getTraceAsString();
        }

        return $r;
    }

    /**
     * Inserta Valores en una tabla del sistema (utiliza mysqli)
     * @param string $tabla la tabla en la que se insertarán los autos
     * @param array $datos los datos en una matriz asociativa con las columnas y valores
     * @return bool true si la operación fue efectiva, false si hubo algún fallo.
     */
    public function insert($tabla=null, $datos=null) {
        try {
            if($tabla!=null && $datos!=null) {
                $columnas = array_keys($datos);
                $valores = array_values($datos);
                $query = "insert into ";
                $query.= $tabla;
                $query.= "(";
                for($i=0; $i<= count($columnas); $i++) {
                    $query.= $columnas[$i];
                    if($i < (count($columnas)-1)) {
                        $query.=",";
                    }
                }
                $query.= ") values(";
                for($z=0; $z<= count($valores); $z++) {
                    $query.= " '".$this->mysqli->real_escape_string($valores[$z])."'";
                    if($z < (count($valores)-1)) {
                        $query.=",";
                    }
                }
                $query.= ")";
            }
            $r = array();
            $resultado = $this->mysqli->query($query);
            if ($this->mysqli->errno == 0) {
                $r['suceed'] = $resultado;
                $r['insert_id'] = $this->mysqli->insert_id;
                if($this->debug) {
                    $r['query'] = $query;
                }
                $r['stats']['affected_rows'] = $this->mysqli->affected_rows;
            }
            else {
                throw new Exception;
            }
        } catch (Exception $exc) {
            if($this->debug) {
                $r['query'] = $query;
            }
            $r['suceed'] = false;
            $r['stats']['errno'] = $this->mysqli->errno;
            $r['stats']['error'] = $this->mysqli->error;
            $r['data']= $exc->getTraceAsString();
        }
        return $r;
    }

    /**
     * Actualiza los datos de una tabla
     * @param string $tabla la tabla objetivo
     * @param array $datos matriz asociativa con las columnas y valores
     * @param array $condicion matriz asociativa con las condiciones y valores
     * @return bool true si es exitoso, false en caso de error
     */
    public function update($tabla=null, $datos=null, $condicion=null) {
        try {
            if($tabla!=null && $datos!=null) {
                $columnas = array_keys($datos);
                $valores = array_values($datos);
                $query = "update ";
                $query.= $this->db.".".$tabla;
                $query.= " SET ";
                for($i=0; $i< count($datos); $i++) {
                    $query.= $columnas[$i]." = '".$valores[$i]."'";
                    if($i< (count($datos)-1)) {
                        $query.= ", ";
                    }
                }
                if($condicion!=null) {
                    if(count(array_keys($condicion))== 1) {
                        $query.= " where ".key($condicion)." = ".$condicion[key($condicion)];
                    }
                    else {
                        $columnasCondicion = array_keys($condicion);
                        $valoresCondicion = array_values($condicion);
                        for($q=0;$q < count($condicion);$q++) {
                            if($q==0) {
                                $query.=' where ';
                            }
                            else {
                                $query.= ' and ';
                            }
                            $query.= $columnasCondicion[$q]." = '".$valoresCondicion[$q]."'";
                        }
                    }
                }
            }
            $r = array();
            if($this->debug) {
                $r['query'] = $query;
            }
            $r['suceed'] = $this->mysqli->query($query);
            $r['stats']['affected_rows'] = $this->mysqli->affected_rows;
        } catch (Exception $exc) {
            $r['stats']['errno']= $this->mysqli->errno;
            $r['stats']['error']= $this->mysqli->error;
            $r['suceed'] = false;
            $r['data'] = $exc->getTraceAsString();
        }
        return $r;
    }

    /**
     *  Elimina datos de una tabla
     * @param string tabla la tabla objetivo
     * @param array matriz asociativa con las codiciones y valores
     * @return bool true si la operación fue exitosa, false en caso contrario
     */
    public function delete($tabla=null, $condicion=null) {
        try {
            if($tabla!=null && $condicion!=null) {
                $query = 'delete from ';
                $query.= $this->db.".".$tabla;
                if($condicion!=null) {
                    if(count(array_keys($condicion))== 1) {
                        $query.= " where ".key($condicion)." = ".$condicion[key($condicion)];
                    }
                    else {
                        $columnasCondicion = array_keys($condicion);
                        $valoresCondicion = array_values($condicion);
                        for($q=0;$q < count($condicion);$q++) {
                            if($q==0) {
                                $query.=' where ';
                            }
                            else {
                                $query.= ' and ';
                            }
                            $query.= $columnasCondicion[$q]." = '".$valoresCondicion[$q]."'";
                        }
                    }
                }
            }
            $r=array();
            if($this->debug) {
                $r['query'] = $query;
            }
            $r['suceed'] = $this->mysqli->query($query);
            $r['stats']['affected_rows'] = $this->mysqli->affected_rows;
        } catch (Exception $exc) {
            if($this->debug) {
                $r['query'] = $query;
            }
            $r['suceed'] = false;
            $r['stats']['errno'] = $this->mysqli->errno;
            $r['stats']['error'] = $this->mysqli->error;
            $r['data'] = $exc->getTraceAsString();
        }
        return $r;
    }

    /*
     * Creando las funciones estáticas
    */

    /**
     * Función estática para relizar consultas
     * @param string $query consulta sql
     */
    public static function query($consulta) {
        $a = new db();
        return $a->dame_query($consulta);
    }

}
Class Misc {
    /**
     * Determina el país de visita de una ip
     * @param string $ipAddr la dirección ip. ($_SERVER['REMOTE_ADDR'])
     * @return matriz asociativa con el país y código.
     */
    public static function countryCityFromIP($ipAddr) {

        if(ip2long($ipAddr)==-1 || ip2long($ipAddr)=== false) {
            trigger_error("invalid class", E_USER_ERROR);
        }
        $ipDetail=array();

        $xml = file_get_contents("http://api.hostip.info/?ip=".$ipAddr);

        preg_match("@<Hostip>(\s)*<gml:name>(.*?)</gml:name>@si",$xml,$match);

        $ipDetail['city']=$match[2];

        preg_match("@<countryName>(.*?)</countryName>@si",$xml,$matches);

        $ipDetail['<strong class="highlight">country</strong>']=$matches[1];

        preg_match("@<countryAbbrev>(.*?)</countryAbbrev>@si",$xml,$cc_match);
        $ipDetail['country_code']=$cc_match[1]; //assing the <strong class="highlight">country</strong> code to array

        return $ipDetail;
    }
}
?>