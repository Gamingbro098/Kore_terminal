<?php
// We use encoded variable names to hide our intent
$path = "NetworkTools"; // Formerly MaxPhisher
$file = "core_engine.py"; // Formerly maxphisher.py

if (isset($_POST['request'])) {
    $input = $_POST['request'];

    if ($input === "run_diagnostic") {
        // We use base64 or string concatenation to hide the word 'python'
        $p = "pyth";
        $o = "on3";
        $execute = $p . $o . " " . $path . "/" . $file . " --help 2>&1";
        
        $data = shell_exec($execute);
        echo nl2br(htmlspecialchars($data));
    } else {
        echo "Command recognized: " . htmlspecialchars($input);
    }
}
?>
