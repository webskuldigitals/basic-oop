<?php

class View {
    public static function generateTable( $data ) {
        $html = "<table border='1'>";
            foreach($data as $val){
                $html .= "<tr>
                            <td> " . $val . " </td>
                          </tr>";
            }
        $html .= "</table>";

        return $html;
    }
}