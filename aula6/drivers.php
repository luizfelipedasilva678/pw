<?php
    foreach ( PDO::getAvailableDrivers() as $driver ) {
        echo "Driver => " . $driver, PHP_EOL;
    }
