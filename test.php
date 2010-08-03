<?php
include_once 'includes/db.php';
include_once 'includes/class.krumo.php';
$db = new db();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>Pruebas Clase PHP DB</title>
        <style type="text/css" media="all">
            body{
                font-family: Trebuchet-Ms;
                font-size: 12px;
                color:#f0f0f0;
                background: #333333;
            }
            code, strong, em, a, li div{
                color:#000;
            }
            h2{
                font-size: 16px;
                font-family: sans-serif;
                color: gold;
                padding-left: 20px;
                text-transform: capitalize;
                text-shadow:1px 1px 1px gold;
                -moz-text-shadow:1px 1px 1px gold;
                -webkit-text-shadow:1px 1px 1px gold;
            }
            th{
                font-family:sans-serif;
                font-size: 18px;
                color:white;
                background-color: #666;
                border-bottom: 1px solid #999;
            }
            th:first-child{
                -moz-border-radius:20px 0 0 0;
            }
            th:last-child{
                -moz-border-radius:0 20px 0 0;
            }
            table{
                -moz-border-radius:20px;
                -webkit-border-radius:20px;
                border:1px solid buttonhighlight;
            }
        </style>
    </head>
    <body>
        <table cellpadding="0" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Consultas</th>
                    <th>Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td valign="top">
                        <?php
                        // <editor-fold defaultstate="collapsed" desc="script">
                        echo "<h2>query: static query</h2>";
                        krumo::dump(db::query("select * from test.autos"));
                        echo "<h2>query 2: dame query</h2>";
                        krumo::dump($db->dame_query("select id, color, fecha from test.autos where id=14 and color='azul' order by color ASC"));
                        echo "<h2>query 3: select</h2>";
                        krumo::dump($db->select(array('id','color','fecha'), 'autos', array(id=>'82'), null, array('color'=>'ASC')));
                        //// </editor-fold>
                        ?>
                    </td>
                    <td valign="top">
                        <?php
                        // <editor-fold defaultstate="collapsed" desc="script">
                        echo "<h2>Insert </h2";
                        krumo::dump($db->insert('autos', array(id=>'80',color=>'naranja',fecha=>'1914')));
                        echo "<h2>Delete </h2";
                        krumo::dump($db->delete('autos', array(id=>'81',color=>'naranja',fecha=>'1914')));
                        echo "<h2>Update</h2>";
                        krumo::dump($db->update('autos', array(id=>'81',color=>'tornasol'), array(id=>'82')) );
                        //// </editor-fold>
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
