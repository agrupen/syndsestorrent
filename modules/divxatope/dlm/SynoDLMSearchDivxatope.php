<?php

/*
  This file is part of SynDsEsTorrent.

  SynDsEsTorrent is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 3 of the License, or
  (at your option) any later version.

  SynDsEsTorrent is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with SynDsEsTorrent.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace modules\divxatope\dlm;

class SynoDLMSearchDivxatope
{

    private $qurl = 'http://www.divxatope.com/newtemp/include/ajax/ajax.search.php?search=%s';
    private $purl = 'http://divxatope.com/';

    public function __construct()
    {
        
    }

    /**
     * @param curl   $curl  objeto curl
     * @param string $query cadena a buscar
     */
    public function prepare($curl, $query)
    {
        curl_setopt($curl, CURLOPT_COOKIE, "language=es_ES");
        curl_setopt($curl, CURLOPT_FAILONERROR, 1);
        curl_setopt($curl, CURLOPT_REFERER, $this->purl);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 20);
        curl_setopt($curl, CURLOPT_URL, sprintf($this->qurl, iconv('ISO-8859-1', 'UTF-8', $query)));
    }

    /**
     *
     * @param  plugin $plugin   contendrá los resultados ya extraídos de la página
     * @param  string $response respuesta html de la página
     * @return int    número de resultados
     */
    public function parse($plugin, $response)
    {
        // Definimos las cadenas REGEXP hasta llegar a los torrent
        $regexpFila = "<li.*>(.*)<\/li>";
        $res = 0;

        $resFilas = array();
        if (preg_match_all("/$regexpFila/siU", $response, $resFilas, PREG_SET_ORDER)) {
            $res = $this->procesarFilas($resFilas, $plugin);
        }

        return $res;
    }

    private function procesarFilas($filas, $plugin)
    {
        $res = 0;
        
        for ($i = 0; isset($filas[$i][1]); $i++) {
            $info = $this->procesarMultiple($filas[$i][1]);
            $hash = md5($info['titulo']);
            $plugin->addResult(
                    $info['titulo'], $info['urlPagina'], 0, 'Desconocido', $info['urlPagina'], $hash, -1, -1, "Sin clasificar"
            );
            $res++;
        }

        return $res;
    }

    private function procesarMultiple($fila)
    {
        $resInfo = $this->regexp("<a.*href\s*=\s*\"(?<url>.*)\".*>(?<contenido>.*)<\/a>", $fila, true);
        $info = array(
            'urlPagina' => $resInfo[0]['url']
        );
        
        $titulo = $this->regexp("<img.*alt=\"(.*)\"", $fila, true);

        $info['titulo'] = $titulo[0][1];
        return $info;
    }

    private function regexp($regexp, $texto, $global = false)
    {
        $res = array();
        if ($global) {
            if (!preg_match_all("/$regexp/siU", $texto, $res, PREG_SET_ORDER)) {
                $res = null;
            }
        } else {
            if (!preg_match("/$regexp/siU", $texto, $res)) {
                $res = null;
            }
        }

        return $res;
    }
}
