<?php
/**
* Configuration page
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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Digitales Türschild</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: #f5f5f5">
<div class="container my-5">
    <!-- Notification Toast Message -->
    <div class="position-fixed top-0 start-50 translate-middle-x mt-5 p-3">
        <div class="toast align-items-center text-white bg-success border-0" id="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div id="toastText" class="toast-body">
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <h1 class="text-center mb-4">Digitales Türschild-Dashboard</h1>
    <div class="d-flex justify-content-end mb-3">
        <div class="btn-group" role="group">
            <button type="button" id="openGitHub" class="btn btn-outline-secondary"><i class="bi bi-github"></i></button>
            <button type="button" id="openDoorsign" class="btn btn-outline-secondary"><i class="bi bi-box-arrow-up-right"></i></button>
            <button type="button" id="openSettingsModal" class="btn btn-outline-secondary"><i class="bi bi-gear"></i></i></button>
            <button type="button" id="saveDashboard" class="btn btn-primary"><i class="bi bi-check-all"></i> Speichern</button>
        </div>
    </div>
    <hr>
    <div class="form-group mb-4">
        <p>Modus auswählen:</p>
        <div class="d-flex justify-content-start mb-3">
            <div class="btn-group" role="group">
                <button type="button" id="modus1Button" class="btn btn-outline-secondary modusButton"></button>
                <button type="button" id="modus2Button" class="btn btn-outline-secondary modusButton"></button>
                <button type="button" id="modus3Button" class="btn btn-outline-secondary modusButton"></button>
                <button type="button" id="modus4Button" class="btn btn-outline-secondary modusButton"></button>
                <button type="button" id="modus5Button" class="btn btn-outline-secondary modusButton"></button>
            </div>
        </div>
    </div>
    <div class="form-group mb-4">
        <p>Status auswählen:</p>
        <div class="d-flex align-items-center">
            <div class="btn-group me-3" role="group">
                <button type="button" id="buttonGreen" class="btn btn-lg btn-outline-success">
                    <i class="bi bi-door-open"></i>
                </button>
                <button type="button" id="buttonOrange" class="btn btn-lg btn-outline-warning">
                    <i class="bi bi-exclamation-triangle"></i>
                </button>
                <button type="button" id="buttonRed" class="btn btn-lg btn-outline-danger">
                    <i class="bi bi-sign-stop"></i>
                </button>
            </div>
            <div class="alert alert-info mb-0">
                <span id="selectedStatusPre" style="display: none">Ausgewählt:
                    <strong>
                        <span data-status="" id="selectedStatusText"></span>
                    </strong>;
                </span>
                <span>Aktueller Status: <strong><span id="currentStatus"></span></strong></span>
            </div>
        </div>
    </div>
    <div class="form-group mb-4">
        <label class="mb-1" for="bigText">Überschrift:</label>
        <input type="text" class="form-control" id="bigText" placeholder="Geben Sie hier eine Überschrift ein.">
    </div>
    <div class="form-group mb-4">
        <label class="mb-1" for="editor">Beschreibung:</label>
        <textarea class="form-control" id="smallText" rows="3" placeholder="Geben Sie hier eine Beschreibung ein."></textarea>
        </div>
    </div>
</div>
<!-- Modal Settings -->
<div class="modal fade" id="settings" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Einstellungen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-1">
                    <div class="container mt-3">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="modusTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="modus1-tab" data-bs-toggle="tab" data-bs-target="#modus1" type="button" role="tab" aria-controls="modus1" aria-selected="true">Modus 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="modus2-tab" data-bs-toggle="tab" data-bs-target="#modus2" type="button" role="tab" aria-controls="modus2" aria-selected="false">Modus 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="modus3-tab" data-bs-toggle="tab" data-bs-target="#modus3" type="button" role="tab" aria-controls="modus3" aria-selected="false">Modus 3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="modus4-tab" data-bs-toggle="tab" data-bs-target="#modus4" type="button" role="tab" aria-controls="modus4" aria-selected="false">Modus 4</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="modus5-tab" data-bs-toggle="tab" data-bs-target="#modus5" type="button" role="tab" aria-controls="modus5" aria-selected="false">Modus 5</button>
                            </li>
                        </ul>
                    <div class="tab-content" id="modusTabsContent">
                        <!-- Modus 1 -->
                        <div class="tab-pane fade active show" id="modus1" role="tabpanel">
                            <div class="p-4">
                                <div class="mb-4 mt-2">
                                    <label for="bigText" class="form-label">System-Name:</label>
                                    <input maxlength="20" data-hint-id="hint20Characters1" type="text" class="form-control" id="systemName" placeholder="Geben Sie Ihrem Modus einen Namen.">
                                    <small class="mt-1" id="hint20Characters1" style="color: red; display: none">Es sind maximal 20 Zeichen möglich.</small>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus1" type="radio" id="statusGreen">
                                            <label class="form-check-label" for="statusGreen">
                                                <i style="color: green; font-size: 25px" class="bi bi-door-open"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="orange" name="statusModus1" type="radio" id="statusOrange">
                                            <label class="form-check-label" for="statusOrange">
                                                <i style="color: orange; font-size: 25px" class="bi bi-exclamation-triangle"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus1" type="radio" id="statusRed">
                                            <label class="form-check-label" for="statusRed">
                                                <i style="color: red; font-size: 25px" class="bi bi-sign-stop"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bigText" class="form-label">Überschrift:</label>
                                    <input type="text" class="form-control" id="bigText" placeholder="Geben Sie hier eine Überschrift ein.">
                                </div>
                                <div class="mb-3">
                                    <label for="smallText" class="form-label">Beschreibung:</label>
                                    <textarea class="form-control" id="smallText" rows="3" placeholder="Geben Sie hier eine Beschreibung ein."></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="button" id="resetModus" data-modus="1" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Modus zurücksetzen</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modus 2 -->
                        <div class="tab-pane fade" id="modus2" role="tabpanel">
                            <div class="p-4">
                                <div class="mb-4 mt-2">
                                    <label for="bigText" class="form-label">System-Name:</label>
                                    <input maxlength="20" data-hint-id="hint20Characters2" type="text" class="form-control" id="systemName" placeholder="Geben Sie Ihrem Modus einen Namen.">
                                    <small class="mt-1" id="hint20Characters2" style="color: red; display: none">Es sind maximal 20 Zeichen möglich.</small>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus2" type="radio" id="statusGreen">
                                            <label class="form-check-label" for="statusGreen">
                                                <i style="color: green; font-size: 25px" class="bi bi-door-open"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="orange" name="statusModus2" type="radio" id="statusOrange">
                                            <label class="form-check-label" for="statusOrange">
                                                <i style="color: orange; font-size: 25px" class="bi bi-exclamation-triangle"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus2" type="radio" id="statusRed">
                                            <label class="form-check-label" for="statusRed">
                                                <i style="color: red; font-size: 25px" class="bi bi-sign-stop"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bigText" class="form-label">Überschrift:</label>
                                    <input type="text" class="form-control" id="bigText" placeholder="Geben Sie hier eine Überschrift ein.">
                                </div>
                                <div class="mb-3">
                                    <label for="smallText" class="form-label">Beschreibung:</label>
                                    <textarea class="form-control" id="smallText" rows="3" placeholder="Geben Sie hier eine Beschreibung ein."></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="button" id="resetModus" data-modus="2" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Modus zurücksetzen</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modus 3 -->
                        <div class="tab-pane fade" id="modus3" role="tabpanel">
                            <div class="p-4">
                                <div class="mb-4 mt-2">
                                    <label for="bigText" class="form-label">System-Name:</label>
                                    <input maxlength="20" data-hint-id="hint20Characters3" type="text" class="form-control" id="systemName" placeholder="Geben Sie Ihrem Modus einen Namen.">
                                    <small class="mt-1" id="hint20Characters3" style="color: red; display: none">Es sind maximal 20 Zeichen möglich.</small>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus3" type="radio" id="statusGreen">
                                            <label class="form-check-label" for="statusGreen">
                                                <i style="color: green; font-size: 25px" class="bi bi-door-open"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="orange" name="statusModus3" type="radio" id="statusOrange">
                                            <label class="form-check-label" for="statusOrange">
                                                <i style="color: orange; font-size: 25px" class="bi bi-exclamation-triangle"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus3" type="radio" id="statusRed">
                                            <label class="form-check-label" for="statusRed">
                                                <i style="color: red; font-size: 25px" class="bi bi-sign-stop"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bigText" class="form-label">Überschrift:</label>
                                    <input type="text" class="form-control" id="bigText" placeholder="Geben Sie hier eine Überschrift ein.">
                                </div>
                                <div class="mb-3">
                                    <label for="smallText" class="form-label">Beschreibung:</label>
                                    <textarea class="form-control" id="smallText" rows="3" placeholder="Geben Sie hier eine Beschreibung ein."></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="button" id="resetModus" data-modus="3" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Modus zurücksetzen</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modus 4 -->
                        <div class="tab-pane fade" id="modus4" role="tabpanel">
                            <div class="p-4">
                                <div class="mb-4 mt-2">
                                    <label for="bigText" class="form-label">System-Name:</label>
                                    <input maxlength="20" type="text" data-hint-id="hint20Characters4" class="form-control" id="systemName" placeholder="Geben Sie Ihrem Modus einen Namen.">
                                    <small class="mt-1" id="hint20Characters4" style="color: red; display: none">Es sind maximal 20 Zeichen möglich.</small>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus4" type="radio" id="statusGreen">
                                            <label class="form-check-label" for="statusGreen">
                                                <i style="color: green; font-size: 25px" class="bi bi-door-open"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="orange" name="statusModus4" type="radio" id="statusOrange">
                                            <label class="form-check-label" for="statusOrange">
                                                <i style="color: orange; font-size: 25px" class="bi bi-exclamation-triangle"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus4" type="radio" id="statusRed">
                                            <label class="form-check-label" for="statusRed">
                                                <i style="color: red; font-size: 25px" class="bi bi-sign-stop"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bigText" class="form-label">Überschrift:</label>
                                    <input type="text" class="form-control" id="bigText" placeholder="Geben Sie hier eine Überschrift ein.">
                                </div>
                                <div class="mb-3">
                                    <label for="smallText" class="form-label">Beschreibung:</label>
                                    <textarea class="form-control" id="smallText" rows="3" placeholder="Geben Sie hier eine Beschreibung ein."></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="button" id="resetModus" data-modus="4" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Modus zurücksetzen</button>
                                </div>
                            </div>
                        </div>
                        <!-- Modus 5 -->
                        <div class="tab-pane fade" id="modus5" role="tabpanel">
                            <div class="p-4">
                                <div class="mb-4 mt-2">
                                    <label for="bigText" class="form-label">System-Name:</label>
                                    <input maxlength="20" data-hint-id="hint20Characters5" type="text" class="form-control" id="systemName" placeholder="Geben Sie Ihrem Modus einen Namen.">
                                    <small class="mt-1" id="hint20Characters5" style="color: red; display: none">Es sind maximal 20 Zeichen möglich.</small>
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-around">
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus5" type="radio" id="statusGreen">
                                            <label class="form-check-label" for="statusGreen">
                                                <i style="color: green; font-size: 25px" class="bi bi-door-open"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="orange" name="statusModus5" type="radio" id="statusOrange">
                                            <label class="form-check-label" for="statusOrange">
                                                <i style="color: orange; font-size: 25px" class="bi bi-exclamation-triangle"></i>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input statusRatio" data-status="red" name="statusModus5" type="radio" id="statusRed">
                                            <label class="form-check-label" for="statusRed">
                                                <i style="color: red; font-size: 25px" class="bi bi-sign-stop"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bigText" class="form-label">Überschrift:</label>
                                    <input type="text" class="form-control" id="bigText" placeholder="Geben Sie hier eine Überschrift ein.">
                                </div>
                                <div class="mb-3">
                                    <label for="smallText" class="form-label">Beschreibung:</label>
                                    <textarea class="form-control" id="smallText" rows="3" placeholder="Geben Sie hier eine Beschreibung ein."></textarea>
                                </div>
                                <div class="mb-3">
                                    <button type="button" id="resetModus" data-modus="5" class="btn btn-outline-danger"><i class="bi bi-x-circle"></i> Modus zurücksetzen</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="container">
                        <p>
                            Dieses Projekt ist quelloffen und unter der <a target="_blank" href="https://www.mozilla.org/en-US/MPL/2.0/">Mozilla Public License Version 2.0</a> lizensiert.
                            Der Source Code und eine kleine Dokumentation zur Bedienung und Installation ist auf <a target="_blank" href="https://github.com/modelrailroader/digital-doorsign">GitHub</a> abrufbar.
                            Hier können auch Issues gemeldet werden.
                            <br>Created with ❤ by Jan Harms
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Schließen</button>
                <button type="button" id="saveSettings" class="btn btn-primary" data-bs-dismiss="modal">Speichern</button>
            </div>
        </div>
      </div>
    </div>
</div>
</body>
<footer>
    <p class="text-center">Created by Jan Harms | <?php echo(date('Y')) ?></p>
</footer>
<script>
    const buttonGreen = document.getElementById('buttonGreen');
    const buttonOrange = document.getElementById('buttonOrange');
    const buttonRed = document.getElementById('buttonRed');
    const selectedStatusPre = document.getElementById('selectedStatusPre');
    const selectedStatusText = document.getElementById('selectedStatusText');
    const openDoorsign = document.getElementById('openDoorsign');
    const saveDashboard = document.getElementById('saveDashboard');
    const bigText = document.getElementById('bigText');
    const smallText = document.getElementById('smallText');
    const openSettings = document.getElementById('openSettingsModal');
    const saveSettings = document.getElementById('saveSettings');
    const openGitHub = document.getElementById('openGitHub');

    // Show selected status
    buttonGreen.addEventListener('click', (event) => {
        event.preventDefault();
        selectedStatusPre.style.display = 'block';
        selectedStatusText.style.color = 'green';
        selectedStatusText.innerText = 'Tür offen';
        selectedStatusText.setAttribute('data-status', 'green');
    });
    buttonOrange.addEventListener('click', (event) => {
        event.preventDefault();
        selectedStatusPre.style.display = 'block';
        selectedStatusText.style.color = 'orange';
        selectedStatusText.innerText = 'Eingeschränkt';
        selectedStatusText.setAttribute('data-status', 'orange');
    });
    buttonRed.addEventListener('click', (event) => {
        event.preventDefault();
        selectedStatusPre.style.display = 'block';
        selectedStatusText.style.color = 'red';
        selectedStatusText.innerText = 'Stopp';
        selectedStatusText.setAttribute('data-status', 'red');
    });

    // Open link to doorsign in new tab
    openDoorsign.addEventListener('click', (event) => {
        event.preventDefault();
        window.open('index.php', '_blank');
    });

    // Open source code on GitHub in new tab
    openGitHub.addEventListener('click', (event) => {
        event.preventDefault();
        window.open('https://github.com/modelrailroader/digital-doorsign', '_blank');
    });

    // Save data
    saveDashboard.addEventListener('click', async (event) => {
        const randomParameter = Math.round(Math.random() * 100000);
        const status = selectedStatusText.getAttribute('data-status');
        const currentStatus = document.getElementById('currentStatus');
        try {
            const response = await fetch('api.php?cache=' + randomParameter, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    'file': 'data',
                    'status': status,
                    'bigText': bigText.value,
                    'smallText': smallText.value
                })
            })

            if (response.ok) {
                const result = await response.json();
                pushNotificaton('Das Speichern des Türschildes war erfolgreich.')
            } else {
                console.error('Error while receiving the response:', response.statusText);
            }
        } catch (error) {
            console.error('Error while sending the request:', error);
        }

        selectedStatusPre.style.display = 'none';
        if (status === 'green') {
            currentStatus.style.color = 'green';
            currentStatus.innerText = 'Tür offen';
        }
        if (status === 'orange') {
            currentStatus.style.color = 'orange';
            currentStatus.innerText = 'Eingeschränkt';
        }
        if (status === 'red') {
            currentStatus.style.color = 'red';
            currentStatus.innerText = 'Stopp';
        }
    });

    // Open settings modal
    openSettings.addEventListener('click', (event) => {
        event.preventDefault();
        const modal = new bootstrap.Modal(document.getElementById('settings'));
        modal.show();
    });

    // Save settings
    saveSettings.addEventListener('click', async () => {
        const randomParameter = Math.round(Math.random() * 100000);
        let allTabData = {};
        document.querySelectorAll('.tab-pane').forEach((tab) => {
            let tabData = {};
            tab.querySelectorAll('input, textarea').forEach((input) => {
                if (input.type === 'radio') {
                    if (input.checked) {
                        tabData['status'] = input.getAttribute('data-status');
                    }
                } else {
                    tabData[input.id] = input.value;
                }
            });
            allTabData[tab.id] = tabData;
        });
        try {
            const response = await fetch('api.php?cache=' + randomParameter, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    'file': 'settings',
                    'data': allTabData
                })
            });

            if (response.ok) {
                const result = await response.json();
                pushNotificaton('Das Speichern der Einstellungen war erfolgreich.');
                start();
            } else {
                console.error('Error while receiving the response:', response.statusText);
            }
        } catch (error) {
            console.error('Error while sending the request:', error);
        }
    });

    // Select modus
    document.querySelectorAll('.modusButton').forEach((button) => {
        button.addEventListener('click', () => {
            if (!button.disabled) {
                smallText.value = button.getAttribute('data-smalltext');
                bigText.value = button.getAttribute('data-bigtext');
                if (button.getAttribute('data-status') === 'green') {
                    buttonGreen.click();
                }
                if (button.getAttribute('data-status') === 'orange') {
                    buttonOrange.click();
                }
                if (button.getAttribute('data-status') === 'red') {
                    buttonRed.click();
                }
            }
        });
    });

    // Reset modis
    document.querySelectorAll('#resetModus').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const tab = document.querySelector('#modus' + button.getAttribute('data-modus'));
            tab.querySelectorAll('input, textarea').forEach((input) => {
                if (input.type === 'radio') {
                    input.checked = false;
                }
                input.value = '';
            });
        });
    });

    // Show hint that systemName is just allowed to have at least 20 characters
    document.querySelectorAll('#systemName').forEach((systemName) => {
        systemName.addEventListener('keyup', (event) => {
            const hint = document.getElementById(systemName.getAttribute('data-hint-id'));
            if (systemName.value.length === 20) {
                hint.style.display = 'block';
            } else {
                hint.style.display = 'none';
            }
        });
    });

    // Push Bootstrap Toast notification
    const pushNotificaton = async (text) => {
        const toast = new bootstrap.Toast(document.getElementById('toast'));
        document.getElementById('toastText').innerText = text;
        toast.show();
    }

    // Initialize page
    const start = async () => {
        const randomParameter = Math.round(Math.random() * 100000);
        const currentStatus = document.getElementById('currentStatus');
        const smallText = document.getElementById('smallText');
        const bigText = document.getElementById('bigText');
        const selectedStatusText = document.getElementById('selectedStatusText');

        try {
            const response = await fetch('data.json?cache=' + randomParameter);
            if (response.ok) {
                const data = await response.json();

                // Status handling
                if (data.status === 'green') {
                    currentStatus.innerText = 'Tür offen';
                }
                if (data.status === 'orange') {
                    currentStatus.innerText = 'Eingeschränkt';
                }
                if (data.status === 'red') {
                    currentStatus.innerText = 'Stopp';
                }
                currentStatus.style.color = data.status;
                selectedStatusText.setAttribute('data-status', data.status);

                bigText.value = data.bigText;
                smallText.value = data.smallText;
            } else {
                console.error('Error while parsing the json data:', response.statusText);
            }
        } catch (error) {
            console.error('Error while parsing the json data:', error);
        }
        try {
            const response = await fetch('settings.json?cache=' + randomParameter);
            if (response.ok) {
                const data = await response.json();
                const modi = data.data;

                // Modus handling
                let i = 1;
                Object.values(modi).forEach((modus) => {
                    const button = document.getElementById('modus' + i + 'Button');
                    if (modus.systemName) {
                        button.innerText = modus.systemName;
                        button.disabled = false;
                        button.setAttribute('data-status', modus.status);
                        button.setAttribute('data-bigtext', modus.bigText);
                        button.setAttribute('data-smalltext', modus.smallText);
                        const tab = document.getElementById('modus' + i);
                        tab.querySelector('#systemName').value = modus.systemName;
                        tab.querySelector('#bigText').value = modus.bigText;
                        tab.querySelector('#smallText').value = modus.smallText;
                        if (modus.status === 'green') {
                            tab.querySelector('#statusGreen').checked = true;
                        }
                        if (modus.status === 'orange') {
                            tab.querySelector('#statusOrange').checked = true;
                        }
                        if (modus.status === 'red') {
                            tab.querySelector('#statusRed').checked = true;
                        }
                    } else {
                        button.innerText = 'Modus ' + i;
                        button.disabled = true;
                    }
                    i++;
                });
            } else {
                console.error('Error while parsing the json data:', response.statusText);
            }
        } catch (error) {
            console.error('Error while parsing the json data:', error);
        }
    }

    start();
</script>
</html>
