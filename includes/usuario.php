<?php
include_once 'db.php';
include_once 'Auto.php';

/**
 * Description of usuario
 *
 * @author anyul
 */
class usuario {

    public $nombre='';
    public $apellido='';
    public $login;

    function crearUsuario($nombre, $apellido, $tipoid, $numeroid,$telefono,$telefono2,$estado,$ciudad,$direccion,$usuario,$password) {
        $dbCrear = new db();
        $resultado = $dbCrear->insert('usuarios', array(
                'nombre'=>$nombre,
                'apellido'=>$apellido,
//                'tipoid'=>$tipoid,
                'cedularif'=>$numeroid,
                'telefono1'=>$telefono,
                'telefono2'=>$telefono2,
                'Estado_idEstado'=>$estado,
                'ciudad_idciudad'=>$ciudad,
                'direccion'=>$direccion,
                'login'=>$usuario,
                'password'=>$password));
        krumo::dump($resultado);
        if($resultado['suceed']=='true') {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    function editarUsuario($params, $condicion) {
        $db = new db();
        $result = $db->update('usuarios', $params, $condicion);
        if($result['suceed']== 'true') {
            return true;
        }
        else {
            return false;
        }
    }

    function eliminarUsuario($id) {
        $db = new db();
        $result = $db->delete('usuarios', $id);
        if($result['succed']=='true') {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

    /**
     * funcion que retorna una matriz de datos de un usuario determinado
     * @param int $id id del usuario
     * @return array arreglo de datos
     */
    function mostrarUsuario($id) {
        $db = new db();
        $result = $db->select('*', 'usuarios', array('id'=>$id));
        if ($result['suceed']=='true') {
            return $result['data'];
        }
        else {
            return array('data'=>array('nombre'=>'n/a'));
        }
    }

    /**
     * funcion que retorna un arreglo de usuarios
     * @return Array
     */
    function listarUsuarios() {
        $db = new db();
        $usuarios = $db->select('*', 'usuarios');
        if ($usuarios['suceed']=='true') {
            return $usuarios['data'];
        }
        else {
            return array('data'=>array('nombre'=>'n/a'));
        }
    }
}
?>
