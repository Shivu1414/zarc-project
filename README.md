1. Store Device Data API:

curl --location 'http://13.201.37.144/smarty-development/zarc-project/deviceData' \
--header 'Content-Type: application/json' \
--data '{
  "device_id": "D149",
  "temperature": 10.5,
  "humidity": 46
}'
2. Get Latest Device Data API:

curl --location 'http://13.201.37.144/smarty-development/zarc-project/getDeviceData' \
--header 'Content-Type: application/json' \
--data '{
  "device_id": "D149"
}'


Project Vedio:


https://github.com/user-attachments/assets/bc020d2b-ee84-46f7-b964-cb93bda435e6

