<?php
$dir = "NetworkTools"; // The folder containing your script
$file = "core_engine.py"; 

if (isset($_POST['request'])) {
    $command = trim($_POST['request']);

    // DEBUG: Check if execution functions exist
    if (!function_exists('shell_exec')) {
        die("[CRITICAL ERROR]: This host (ProFreeHost) has BLOCKED shell execution. You cannot run Python here.");
    }

    if ($command === "run_core") {
        if (!is_dir($dir)) {
            echo "[ERROR]: Directory '$dir' not found.";
        } else {
            $exec = "cd $dir && python3 $file --help 2>&1";
            $output = shell_exec($exec);
            echo $output ? nl2br(htmlspecialchars($output)) : "[SYSTEM]: Python started, but returned no data.";
        }
    } else {
        $output = shell_exec($command . " 2>&1");
        echo $output ? nl2br(htmlspecialchars($output)) : "[SYSTEM]: Command executed with no output.";
    }
}
?>
