<?php

namespace MyApp\Core;

class Message {
    
    public static function setFlash($icon, $title, $text)
    {
        $_SESSION['flash'] = [
            'icon' => $icon,
            'title' => $title,
            'text' => $text,
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
        <script>
        Swal.fire({
            title: "' . $_SESSION['flash']['title'] . '",
            text: "' . $_SESSION['flash']['text'] . '",
            icon: "' . $_SESSION['flash']['icon'] . '",
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        })
        </script>
        ';
            unset($_SESSION['flash']);
        }
    }
}
