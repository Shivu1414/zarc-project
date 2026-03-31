<?php

class storeDeviceData {

    public static function handleDeviceData()
    {
        header('Content-Type: application/json');

        $data = file_get_contents("php://input");
        $event = json_decode($data, true);

        if (!$event) {
            echo json_encode(['status' => false, 'message' => 'Invalid JSON']);
            exit;
        }

        if (empty($event['device_id'])) {
            echo json_encode(['status' => false, 'message' => 'device_id is required']);
            exit;
        }

        if (!isset($event['temperature']) || !is_numeric($event['temperature'])) {
            echo json_encode(['status' => false, 'message' => 'temperature must be numeric']);
            exit;
        }

        if (!isset($event['humidity']) || !is_numeric($event['humidity'])) {
            echo json_encode(['status' => false, 'message' => 'humidity must be numeric']);
            exit;
        }

        $device_id  = $event['device_id'];
        $temperature = $event['temperature'];
        $humidity    = $event['humidity'];

        $result = generalOperations::insertDeviceData($device_id, $temperature, $humidity);

        if ($result) {
            echo json_encode([
                'status' => true,
                'message' => 'Device data stored successfully'
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Failed to store data'
            ]);
        }

        exit;
    }
}