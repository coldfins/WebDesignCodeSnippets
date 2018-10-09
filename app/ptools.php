<?php
$GLOBALS['ptools']['apiurl'] = 'https://ptoolscs2ch.dev5.cs2.ch/api/'; // caterpillar / c4t3rp1ll4r
$GLOBALS['ptools']['apikey'] = 'e038e799-a96d-4b70-a5b9-cf0d2540432d';

function _ptr($key, $default)
{
    $file_paths = debug_backtrace();
    if (isset($file_paths[0]) && isset($file_paths[0]['file'])) {
        $info = pathinfo($file_paths[0]['file']);
        $prefix = strtolower(basename($file_paths[0]['file'], "." . $info['extension']));
    } else {
        $prefix = 'nopath';
    }

    if ($_GET['showPtOriginals'] == 1) {
        return $default;
    }
    if ($_GET['showPtKeys'] == 1) {
        return $prefix . " > " . $key;
    }
    $key = $prefix . "." . $key;
    if ($key) {
        $configuration = array(
            'apiurl' => $GLOBALS['ptools']['apiurl'],
            'apikey' => $GLOBALS['ptools']['apikey'],
        );
        if ($configuration['apiurl']) {
            // get texts and set them global to prevent useless calls
            if (!isset($GLOBALS['allPtTexts'])) {
                $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                $service_url = $configuration['apiurl'] . 'getAllPrototypeTexts?api_key=' . $configuration['apikey'].'&iframeIdent='.$_COOKIE['iframeIdent'].'&currentUrl='.$actual_link;
                $curl = curl_init($service_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $curl_response = curl_exec($curl);
                if ($curl_response === false) {
                    $info = curl_getinfo($curl);
                    curl_close($curl);
                    die('error occured during curl exec. Additional info: ' . var_export($info));
                }
                curl_close($curl);
                $allPtTexts = sanitize(json_decode($curl_response));
                $GLOBALS['allPtTexts'] = $allPtTexts;
                if (isset($allPtTexts->response->status) && $allPtTexts->response->status == 'ERROR') {
                    die('error occured: ' . $allPtTexts->response->errormessage);
                }
            }

            // if key does not exists, call the api again to be set...
            if (isset($GLOBALS['allPtTexts']) && is_array($GLOBALS['allPtTexts']) && array_key_exists($key, $GLOBALS['allPtTexts'])) {
                if ($GLOBALS['allPtTexts'][$key]) {
                    return $GLOBALS['allPtTexts'][$key];
                } else {
                    return $default;
                }
            } else {
                $service_url = $configuration['apiurl'] . 'addPrototypeTextkey?api_key=' . $configuration['apikey'] . '&text=' . urlencode($default) . '&key=' . urlencode($key);
                $curl = curl_init($service_url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $curl_response = curl_exec($curl);
                if ($curl_response === false) {
                    $info = curl_getinfo($curl);
                    curl_close($curl);
                    die('error occured during curl exec. Additional info: ' . var_export($info));
                }
                curl_close($curl);
                $onServer = sanitize(json_decode($curl_response));
                if (isset($onServer->response->status) && $onServer->response->status == 'ERROR') {
                    die('error occured: ' . $onServer->response->errormessage);
                }
            }
        }
    }
    return $default;
}

function _pt($key, $default) {
  echo _ptr($key, $default);
}

function sanitize($in, $nobreak = 1)
{
    if (is_object($in) || is_array($in)) {
        $new = array();
        foreach ($in as $key => $val) {
            if (is_object($val)) {
                $newVal = sanitize($val, $nobreak);
            } else {
                $newVal = $nobreak ? str_replace(array('/', '\\'), array('', ''), $val) : $val;
            }
            if ($nobreak) {
                $new[str_replace(array('/', '\\'), array('', ''), $key)] = $newVal;
            } else {
                $new[$key] = $newVal;
            }
        }
    } else {
        $new = $nobreak ? str_replace(array('/', '\\'), array('', ''), $in) : $in;
    }
    return $new;
}

if (isset($_GET['iframeIdent'])) {
    setcookie('iframeIdent', $_GET['iframeIdent']);
}

function renderMenu($menu, $menuStructure, $level = 0) {
  $part = '';
  foreach ($menu as $key => $item)  {
    $part .= $menuStructure[$level]['item']['openTag'];
    $part .= $menuStructure[$level]['link']['openTag'];
    $part .= $item->text;
    $part .= $menuStructure[$level]['link']['closeTag'];

    if (isset($item->children) && is_array($item->children)) {
      $part .= $menuStructure[$level]['children']['openTag'];
      $part .= renderMenu($item->children, $menuStructure, $level + 1);
      $part .= $menuStructure[$level]['children']['closeTag'];
    }

    $part .= $menuStructure[$level]['item']['closeTag'];

    $part = str_replace('###ID###', ($item->id ? 'id="' . $item->id . '"' : ''), $part);
    $part = str_replace('###HREF###', ($item->url ? 'href="' . $item->url . '"' : ''), $part);
  }

  return $part;
}

?>
