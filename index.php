<?php
/**
* Digital doorsign startpage
*
* This Source Code Form is subject to the terms of the Mozilla Public License,
* v. 2.0. If a copy of the MPL was not distributed with this file, You can
* obtain one at https://mozilla.org/MPL/2.0/.
*
* @package   digital-doorsign
* @author    Jan Harms <model_railroader@gmx-topmail.de
* @copyright 2024 Jan Harms
* @license   https://www.mozilla.org/MPL/2.0/ Mozilla Public License Version 2.0
* @since     2024-09-01
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Digitales Türschild">
    <title>Digitales Türschild</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #f5f5f5">

<div class="container-fluid d-flex flex-column justify-content-center align-items-center text-center">
    <div class="mb-4">
        <i id="statusIcon" class="bi bi-door-open" style="color: green; font-size: 250px;"></i>
    </div>
    <div class="h2 mb-2">
        <strong><span id="bigText">Hello world!</span></strong>
    </div>
    <p id="smallText" class="h4 mb-8">Hello world!</p>

    <div class="container px-3 pt-4">
        <div class="alert alert-warning text-start mt-auto" role="alert">
            <h4 class="alert-heading"><i class="bi bi-exclamation-triangle"></i> Optional Alert Heading</h4>
            <hr>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.</p>
            <p>You can remove or edit this alert by removing the lines in the index.html or replace it with some else additional information.</p>
        </div>
    </div>
</div>
</body>
<script>
    // Update doorsign every second
    const updateDoorsign = async () => {
        const randomParameter = Math.round(Math.random() * 100000);
        const statusIcon = document.getElementById('statusIcon');
        const bigText = document.getElementById('bigText');
        const smallText = document.getElementById('smallText');

        // Fetching JSON Data
        try {
            const response = await fetch('data.json?cache=' + randomParameter);
            if (response.ok) {
                const data = await response.json();

                // Status handling
                if (data.status === 'green') {
                    statusIcon.classList = '';
                    statusIcon.classList = 'bi bi-door-open';
                }
                if (data.status === 'orange') {
                    statusIcon.classList = '';
                    statusIcon.classList = 'bi bi-exclamation-triangle';
                }
                if (data.status === 'red') {
                    statusIcon.classList = '';
                    statusIcon.classList = 'bi bi-sign-stop';
                }
                statusIcon.style.color = data.status;

                bigText.innerText = data.bigText;
                smallText.innerText = data.smallText;
            } else {
                console.error('Error while parsing the json data:', response.statusText);
            }
        } catch (error) {
            console.error('Error while parsing the json data:', error);
        }
    }

    // Reload and clear cache every 10 minutes
    const reloadDoorsign = async () => {
        location.reload();
    }

    updateDoorsign();
    setInterval(updateDoorsign, 1000);
    setInterval(reloadDoorsign, 300000);
</script>
</html>