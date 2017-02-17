<?php


        $htmltabla = "<table id='latabla'>";
        // encabezado.
        $rngtabla = "<tr>";
        foreach($colsvt as $col){
            $rngtabla .= "<th>$col</th>";
        }
        $rngtabla .= "</tr>";
        $htmltabla .= $rngtabla;
        // datos.
        foreach($Proyectos as $regproy){
            $rngtabla = "<tr>";
            foreach($colsdb as $kc){
                $rngtabla .= "<td>".$regproy[$kc]."</td>";
            }
            $rngtabla .= "</tr>";
            $htmltabla .= $rngtabla;
            
        }
        $htmltabla .= "</table>";
        // este echo se va al template, quitando el autoRender
        echo $htmltabla;
?>