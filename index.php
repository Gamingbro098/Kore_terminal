<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KØRE HACKING COMMUNITY</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <span class="glitch" data-text="KØRE HACKING COMMUNITY">KØRE HACKING COMMUNITY</span>
        <span id="clock">SYSTEM TIME: --:--:--</span>
    </header>

    <div id="log-container">
        <div class="system-response">
            [!] KØRE NETWORK INITIALIZED...<br>
            [!] TYPE 'run_core' TO START THE ENGINE.<br>
            -------------------------------------------
        </div>
    </div>

    <div class="input-wrapper">
        <span class="prompt">kore@admin:~$</span>
        <input type="text" id="cmd" autofocus spellcheck="false" autocomplete="off">
    </div>

    <script>
        const input = document.getElementById('cmd');
        const log = document.getElementById('log-container');

        // Clock Update
        setInterval(() => {
            document.getElementById('clock').innerText = "SYSTEM TIME: " + new Date().toLocaleTimeString();
        }, 1000);

        input.addEventListener('keydown', async (e) => {
            if (e.key === 'Enter') {
                const command = input.value;
                if (!command) return;

                log.innerHTML += `<div class="user-input">kore@admin:~$ ${command}</div>`;
                input.value = '';

                const response = await fetch('system_core.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'request=' + encodeURIComponent(command)
                });
                
                const result = await response.text();
                log.innerHTML += `<div class="system-response">${result}</div>`;
                log.scrollTop = log.scrollHeight;
            }
        });
    </script>
</body>
</html>
