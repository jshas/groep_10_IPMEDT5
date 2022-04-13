<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/shared/config.php';
require __DIR__ . '/shared/SimpleLogger.php';

use PhpMqtt\Client\Examples\Shared\SimpleLogger;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\MqttClient;
use Psr\Log\LogLevel;


// Create an instance of a PSR-3 compliant logger. For this example, we will also use the logger to log exceptions.
$logger = new SimpleLogger(LogLevel::INFO);

try {


    // Create a new instance of an MQTT client and configure it to use the shared broker host and port.
    $client = new MqttClient(MQTT_BROKER_HOST, MQTT_BROKER_PORT, 'test-subscriber', MqttClient::MQTT_3_1, null, $logger);

    // Connect to the broker without specific connection settings but with a clean session.
    $client->connect(null, true);


    // Subscribe to the topic 'hengseltest' using QoS 0.
    $client->subscribe('hengseltest', function (string $topic, string $message, bool $retained) use ($logger, $client) {
        $logger->info('We received a {typeOfMessage} on topic [{topic}]: {message}', [
            'topic' => $topic,
            'message' => $message,
            'typeOfMessage' => $retained ? 'retained message' : 'message',
        ]);


        $host = "localhost";
        $db_user = "laravel";
        $db_password = "password";
        $db_name = "laravel";

        $sqlconnect = mysqli_connect($host, $db_user, $db_password, $db_name);

        if($sqlconnect->connect_errno!=0){
            echo "Error\n";
        }

        echo "Connected with database!\n";

        // Prepare insert into database
        $stmt = $sqlconnect->prepare("INSERT INTO sensorvalue (name, temperature) VALUES (?, ?)");

        $stmt->bind_param("sd", $roomname, $temperatuur);

        // set parameters and execute
        $roomname = $topic;
        $temperatuur = $message;
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
