<?php function help()
{
    echo '<pre style="background-color: #000; color: #fff; padding: 10px;">';
    echo '-------------------' .
        PHP_EOL;
    echo 'debug(); - Display all POST, GET, SESSION, and ERROR variables' . PHP_EOL;
    echo 'autoRefresh($seconds); - Automatically refresh the page every $seconds seconds' . PHP_EOL;
    echo 'resend(); - Resend all POST and GET variables' . PHP_EOL;
    echo 'plog($message); - Log a message to the console (Named plog to avoid conflict with PHP log function)' . PHP_EOL;
}

function debug()
{
    echo '<pre style="background-color: #000; color: #fff; padding: 10px;">';
    if (!empty($_POST)) {
        echo '-- POST VARIABLES --' . PHP_EOL;
        foreach ($_POST as $key => $value) {
            print_r("{$key}: {$value}" . PHP_EOL);
        }
        echo '-------------------' . PHP_EOL;
    }
    if (!empty($_GET)) {
        echo '-- GET VARIABLES --' . PHP_EOL;
        foreach ($_GET as $key => $value) {
            print_r("{$key}: {$value}" . PHP_EOL);
        }
        echo '-------------------' . PHP_EOL;
    }
    if (!empty($_SESSION)) {
        echo '-- SESSION VARIABLES --' . PHP_EOL;
        foreach ($_SESSION as $key => $value) {
            print_r("{$key}: {$value}" . PHP_EOL);
        }
        echo '-------------------' . PHP_EOL;
    }
    if (!empty(error_get_last())) {
        echo '-- ERRORS --' . PHP_EOL;
        foreach (error_get_last() as $key => $value) {
            print_r("{$key}: {$value}" . PHP_EOL);
        }
        echo '-------------------' . PHP_EOL;
    }
    echo '-- INCLUDES --' . PHP_EOL;
    foreach (get_included_files() as $filename) {
        print_r($filename . PHP_EOL);
    }
    echo '-------------------' . PHP_EOL;
}

function autoRefresh($seconds = "")
{
    if (!is_numeric($seconds)) {
        $trace = debug_backtrace();
        $caller = $trace[0];
        $line = $caller['line'];
        phpToolsModalError('Error', "Line $line: autoRefresh() requires a numeric value");
        return;
    }
    echo '<meta http-equiv="refresh" content="' . $seconds . '">';
}

function resend()
{
    $data = array_merge($_GET, $_POST);
    echo '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '" style="margin-top: 20px;">';
    foreach ($data as $key => $value) {
        echo '<input type="hidden" name="' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($value, ENT_QUOTES, 'UTF-8') . '">';
    }
    echo '<button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease;">Resend</button>';
    echo '</form>';
}

function plog($message = null)
{
    if (!is_string($message)) {
        $trace = debug_backtrace();
        $caller = $trace[0];
        $line = $caller['line'];
        phpToolsModalError('Error', "Line $line: plog() requires a value");
        return;
    }
    echo '<script>console.log("' . $message . '");</script>';
}

function phpToolsModalError($title, $error)
{
    echo ' <style> .modal-background { display: flex; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999; } .modal-dialog { display: inline-block; background-color: #fff; padding: 15px; border-radius: 4px; text-align: center; max-width: 90%; } .PHPTOOLS_modal-button { background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s ease; } </style> <div class="modal-background"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" style="margin: 0; text-align: center; text-transform: uppercase; font-size: 1.5em; color: red; font-family: Arial, sans-serif;">' . $title . '</h5> </div> <div class="modal-body"> <p style="margin: 5px; text-align: center; font-size: 1.2em; font-family: Arial, sans-serif;">' . $error . '</p> </div> <div class="modal-footer"> <button type="button" class="PHPTOOLS_modal-button" data-dismiss="modal" onclick="this.closest(\'.modal-background\').style.display = \'none\';">Close</button> </div> </div> </div> </div>';
} ?>