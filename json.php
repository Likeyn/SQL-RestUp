<?php

/**
 * PHP REST SQL JSON renderer class
 * This class renders the REST response data as JSON.
 */
class PHPRestSQLRenderer {
   
    /**
     * @var PHPRestSQL PHPRestSQL
     */
    var $PHPRestSQL;
   
    /**
     * Constructor.
     * @param PHPRestSQL PHPRestSQL
     */
    function render($PHPRestSQL) {
        $this->PHPRestSQL = $PHPRestSQL;
        switch($PHPRestSQL->display) {
            case 'database':
                $this->database();
                break;
            case 'table':
                $this->table();
                break;
            case 'row':
                $this->row();
                break;
        }
    }
    
    /**
     * Output the top level table listing.
     */
    function database() {
         if (isset($this->PHPRestSQL->output['database'])) {
            foreach ($this->PHPRestSQL->output['database'] as $table) {
                $arr[] = htmlspecialchars($table['value']);
            }
        }
        echo json_encode($arr);
    }
    
    /**
     * Output the rows within a table.
     */
    function table() {
         if (isset($this->PHPRestSQL->output['table'])) {
            foreach ($this->PHPRestSQL->output['table'] as $row) {
                $arr[] = htmlspecialchars($row['value']);
            }
        }
        echo json_encode($arr);
    }
    
    /**
     * Output the entry in a table row.
     */
    function row() {
         if (isset($this->PHPRestSQL->output['row'])) {
            foreach ($this->PHPRestSQL->output['row'] as $field) {
                $arr[$field['field']] = htmlspecialchars($field['value']) ;
              }
        }
        echo json_encode($arr);
    }

}
