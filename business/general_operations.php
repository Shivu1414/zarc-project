<?php

class generalOperations
{
    public static function insertDeviceData($device_id, $temperature, $humidity)
    {
        $sql = "INSERT INTO device_data (device_id, temperature, humidity) VALUES (?, ?, ?)";
        $params = [$device_id, $temperature, $humidity];
        return DatabaseHandler::Execute($sql, $params);
    }

    public static function getLatestDeviceData($device_id)
    {
        $device_id = addslashes($device_id);

        $sql = "SELECT * FROM device_data 
                WHERE device_id = '$device_id' 
                ORDER BY created_at DESC 
                LIMIT 1";
    
        return DatabaseHandler::GetRow($sql);
    }

    public static function getAllDeviceData()
    {
        $sql = "SELECT * FROM device_data ORDER BY created_at DESC";
    
        return DatabaseHandler::GetAll($sql);
    }

    public static function checkUserType($email, $hashedPassword)
    {
        $sql = "SELECT `login_type` FROM crm_agents WHERE agent_email = ? AND agent_pass = ?";
        $params = [$email, $hashedPassword];
        return Databasehandler::GetAll($sql, $params);
    }

    public static function getUserDetails($email)
    {
        $sql = "SELECT * FROM crm_agents WHERE agent_email = ?";
        $params = [$email];
        return DatabaseHandler::GetAll($sql, $params);
    }
}