<?php
session_start();
require_once 'include/config.php';
require_once PRESENTATION_DIR . 'application.php';
require_once BUSINESS_DIR . 'database_handler.php';
require_once PRESENTATION_DIR . 'link.php';
require_once BUSINESS_DIR . 'login.php';
require_once BUSINESS_DIR . 'general_operations.php';
require_once BUSINESS_DIR . 'store_device_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $source = isset($_GET['source']) ? $_GET['source'] : '';

    if ($source === 'deviceData') {
        storeDeviceData::handleDeviceData();
        exit;
    } else if ($source === 'getDeviceData') {
        $data = json_decode(file_get_contents("php://input"), true);
        $device_id = $data['device_id'] ?? "";

        $latestData = GeneralOperations::getLatestDeviceData($device_id);
        header('Content-Type: application/json');
        if ($latestData) {
            echo json_encode([
                'status' => true,
                'data' => $latestData
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'No data found'
            ]);
        }

        exit;
    }
}

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $hashedPassword = login::checkPassword($email);

    if ($hashedPassword !== false) {
        $check = login::checkValidUser($email, $password);
    }

    if ($check) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
    }

    exit;
}


if (isset($_GET['logout'])) {
    unset($_SESSION['agent_id']);
    unset($_SESSION['agent_name']);
    unset($_SESSION['login_type']);
    unset($_SESSION['agent_contact']);

    //unset cookie
    setcookie("agent_id", false, time() - 7200);
    setcookie("agent_name", false, time() - 7200);
    setcookie('login_type', false, time() - 7200);
    setcookie('agent_contact', false, time() - 7200);
}

$application = new Application();
$application->display('entry_file.tpl');
?>