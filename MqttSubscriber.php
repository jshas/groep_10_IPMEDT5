<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/shared/config.php';
require __DIR__ . '/shared/SimpleLogger.php';

use PhpMqtt\Client\ConnectionSettings;
use PhpMqtt\Client\Examples\Shared\SimpleLogger;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;
use Psr\Log\LogLevel;

define('SQL_HOST','localhost');
define('DB_USER',"laravel_user");
define('DB_PASSWORD',"firstuser");
define('DB_NAME','IPMEDT5_FD');


// Create an instance of a PSR-3 compliant logger. For this example, we will also use the logger to log exceptions.
$logger = new SimpleLogger(LogLevel::INFO);

try {
    // Create a new instance of an MQTT client and configure it to use the shared broker host and port.
    $client = new MqttClient(MQTT_BROKER_HOST, MQTT_BROKER_PORT, 'MqttSubscriber', MqttClient::MQTT_3_1, null, $logger);

    $connectionSettings = (new ConnectionSettings)
        ->setUsername(AUTHORIZATION_USERNAME)
        ->setPassword(AUTHORIZATION_PASSWORD);

    // Connect to the broker without specific connection settings but with a clean session.
    $client->connect($connectionSettings, true);


    // Subscribe to the topic 'livingroom/t1' using QoS 0.
    $client->subscribe('livingroom/t1', function (string $topic, string $message, bool $retained) use ($logger, $client) {
        $logger->info('We received a {typeOfMessage} on topic [{topic}]: {message}', [
            'topic' => $topic,
            'message' => $message,
            'typeOfMessage' => $retained ? 'retained message' : 'message',
        ]);

        $sqlconnect = mysqli_connect(SQL_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($sqlconnect->connect_errno!=0){
            echo "Error\n";
        }

        echo "Connected with database!\n";

        // P     repare insert into database
        $stmt = $sqlconnect->prepare("INSERT INTO sensor_messages (room_topic, sensor_topic,  ir_value, temp_value) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdd", $roomname, $sensorname, $IRvalue, $TEMPvalue);

        // set parameters and execute
        $topicslice = explode("/",$topic);
        $roomname = $topicslice[0];
        $sensorname = $topicslice[1];

        $values = explode("/",$message);
        $IRvalue = $values[0];
        $TEMPvalue = $values[1];

        $stmt->execute();

        // Close connection
        mysqli_stmt_close($stmt);

        // After receiving the first message on the subscribed topic, we want the client to stop listening for messages.
        // $client->interrupt();
    }, MqttClient::QOS_AT_MOST_ONCE);

    // Subscribe to the topic 'livingroom/t2' using QoS 0.
    $client->subscribe('livingroom/t2', function (string $topic, string $message, bool $retained) use ($logger, $client) {
        $logger->info('We received a {typeOfMessage} on topic [{topic}]: {message}', [
            'topic' => $topic,
            'message' => $message,
            'typeOfMessage' => $retained ? 'retained message' : 'message',
        ]);

        $sqlconnect = mysqli_connect(SQL_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        if($sqlconnect->connect_errno!=0){
            echo "Error\n";
        }

        echo "Connected with database!\n";

        // Prepare insert into database
        $stmt = $sqlconnect->prepare("INSERT INTO sensor_messages (room_topic, sensor_topic, ir_value, temp_value) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdd", $roomname, $sensorname, $IRvalue, $TEMPvalue);

        // set parameters and execute
        $topicslice = explode("/",$topic);
        $roomname = $topicslice[0];
        $sensorname = $topicslice[1];

        $values = explode("/",$message);
        $IRvalue = $values[0];
        $TEMPvalue = $values[1];

        $stmt->execute();

        // Close connection
        mysqli_stmt_close($stmt);

        // After receiving the first message on the subscribed topic, we want the client to stop listening for messages.
        // $client->interrupt();
    }, MqttClient::QOS_AT_MOST_ONCE);

    

    // Since subscribing requires to wait for messages, we need to start the client loop which takes care of receiving,
    // parsing and delivering messages to the registered callbacks. The loop will run indefinitely, until a message
    // is received, which will interrupt the loop.

    $client->loop(true);


    // Gracefully terminate the connection to the broker.
    $client->disconnect();
} catch (MqttClientException $e) {
    // MqttClientException is the base exception of all exceptions in the library. Catching it will catch all MQTT related exceptions.
    $logger->error('Subscribing to a topic using QoS 0 failed. An exception occurred.', ['exception' => $e]);
}
