<?php 

error_reporting(0);
include_once 'library.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['link'])) {
    $autoplay = ($_POST['autoplay'] ?? 'false') === 'true' ? 'true' : 'false';  // Convert to boolean string
        $link = (!empty($_POST['link'])) ? $_POST['link'] : '';
        $poster = (!empty($_POST['poster'])) ? $_POST['poster'] : '';
        $logourl = (!empty($_POST['logo_url'])) ? $_POST['logo_url'] : '';
        $logolink = (!empty($_POST['logo_link'])) ? $_POST['logo_link'] : '';
        $subtitles = (!empty($_POST['sub'])) ? $_POST['sub'] : [];
        $labels = (!empty($_POST['label'])) ? $_POST['label'] : [];
        $autoplayText = $_POST['autoplayText'];

        $sub = array();
        foreach ($subtitles as $key => $value) {
            if (!empty($value)) {
                $sub[$labels[$key]] = $value;
            }
        }

        $data = array(
        'link' => $link,
        'poster' => $poster,
        'sub' => $sub,
        'autoplayText' => $autoplayText,
        'logourl' => $logourl,
        'logolink' => $logolink
        );

        echo encode(json_encode($data));

    } else {
        echo 'Error: Missing parameters!';
    }
} else {
    echo 'Error: Invalid request method!';
}

?>
