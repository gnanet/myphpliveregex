<?php
/*
 * MyPHPLiveRegex - opensource clone of phpliveregex.com online version
 *
 * @author   Gergely Nagy <gna@r-us.hu> - https://github.com/gnanet
 */

require 'ref.php';

class MyPhpLiveRegex
{

    public function evaluate($posted)
    {
        $this->view        = false;
        $this->layout_name = false;

        $fcts = $this->pregView($posted['regex_1'], $posted['regex_2'], $posted['replacement'], $posted['examples']);

        $ret = array();
        foreach ($fcts as $name => $data)
        {
            // https://github.com/digitalnature/php-ref
            if ( empty($posted['regex_1']) && empty($posted['regex_2']) && empty($posted['replacement']) && empty($posted['examples']) )
            {
            $ret[$name] = '';
            } else {
            $ret[$name] = '<input id="cmd_'.$name.'" class="form-control" type="text" onClick="this.focus();this.select();" value="'.$data['cmd'].'" readonly="">';
                switch($name)
                {
                    case 'preg_match':
                            $ret[$name] .= '<div class="data-structure">'. $data['data']  .'</div>';
                            $ret[$name] .= '<p><strong>note:</strong> preg_match is run on each line of input.</p>';
                            break;
                    case 'preg_replace':
                            $ret[$name] .= '<div class="data-structure">'. @r( $data['data'] ) .'</div>';
                            $ret['regex_2'] = $data['opts'];
                            break;
                    case 'preg_split':
                            $ret[$name] .= '<div class="data-structure">'. $data['data'] .'</div>';
                            $ret[$name] .= '<p><strong>note:</strong> preg_split is run on each line of input.</p>';
                            break;
                    default:
                            $ret[$name] .= '<div class="data-structure">'. @r( $data['data'] ) .'</div>';
                }
            }


        }

        // For debug, uncomment below and examine the response JSON
        // file_put_contents("myplr-tmp.json", json_encode($ret));
        echo json_encode($ret);

    }

    public function pregView($regex, $options, $replace, $data)
    {

        $preg['preg_match']['cmd']     = "preg_match(&quot;/".htmlentities($regex)."/".$options."&quot;, \$input_line, \$output_array);";
        $preg['preg_match_all']['cmd'] = "preg_match_all(&quot;/".htmlentities($regex)."/".$options."&quot;, \$input_lines, \$output_array);";
        $preg['preg_replace']['cmd']   = "preg_replace(&quot;/".htmlentities($regex)."/".( strpos($options,'m') === false  ? $options.'m' : $options )."&quot;, '".htmlentities($replace)."', \$input_lines);";
        $preg['preg_replace']['opts']  = ( strpos($options,'m') === false ) ? $options.'m' : $options;
        $preg['preg_grep']['cmd']      = "preg_grep(&quot;/".htmlentities($regex)."/'".$options."&quot;, explode(&quot;".'\n'."&quot;, \$input_lines));";
        $preg['preg_split']['cmd']     = "preg_split(&quot;/".htmlentities($regex)."/'".$options."&quot;, \$input_line);";

        $lines = explode("\n", $data);

        $preg['preg_match']['data'] = '';
        $preg['preg_split']['data'] = '';

        foreach ($lines as $line)
        {
            $output_array = array();
            preg_match("/".$regex."/".$options, $line, $output_array);
            $pregmatchmapped = array_map("htmlentities", $output_array);
            $preg['preg_match']['data'] .= @r($pregmatchmapped);

            $preg_split_result = array();
            $preg_split_result = preg_split("/".$regex."/".$options, $line);
            $pregsplitmapped = array_map("htmlentities", $preg_split_result);
            $preg['preg_split']['data'] .= @r($pregsplitmapped);

        }

        $output_array = array();
        preg_match_all("/".$regex."/".$options, $data, $output_array);
        $preg['preg_match_all']['data'] = $output_array;

        foreach($preg['preg_match_all']['data'] as $key => $value)
        {
            $preg['preg_match_all']['data'][$key] = array_map("htmlentities", $preg['preg_match_all']['data'][$key]);
        }

        $output_array = array();
        $output_array = preg_grep("/".$regex."/".$options, explode("\n", $data));
        $preg['preg_grep']['data'] = array_map("htmlentities", $output_array);

        $out = preg_replace('/'.$regex.'/'.( strpos($options,'m') === false ? $options.'m' : $options ), $replace, $data);

        $preg['preg_replace']['data'] = htmlentities($out);
        //$preg['preg_replace']['data'] = $out;

        return $preg;
    }
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ( ($_POST) && isset($_GET['task']) && ( $_GET['task'] == 'evaluate' ) )
    {
        $myplrinstance = new MyPhpLiveRegex();
        $myplrinstance->evaluate($_POST);
    }
}
