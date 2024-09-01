<?php

/**
 * API file for saving data and settings to JSON-files
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = file_get_contents('php://input');

    $data = json_decode($input, true);
    if ($data['file'] === 'settings') {
        $file = 'settings.json';
    } else {
        $file = 'data.json';
    }
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    if (!file_put_contents($file, $jsonData)) {
        $response = [
            'done' => 'false'
        ];
    } else {
        $response = [
            'done' => 'true'
        ];
    }

    header('Content-Type: application/json');
    echo(json_encode($response));
}