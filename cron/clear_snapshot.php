<?php
/**
 * Mint Scripts - Polymarket Clone Automation Tool
 * Repository Snapshot Cache Cleaner
 * * @package    PolymarketClone
 * @subpackage Automation
 * @author     Mint Scripts Studio
 * @version    1.0.0
 */

// Define absolute path to the prediction market file snapshot
define('SNAPSHOT_FILE', dirname(__DIR__) . '/.file_snapshot.json');

echo "[Mint Scripts] Starting automated snapshot cache cleanup...\n";

if (file_exists(SNAPSHOT_FILE)) {
    // Write empty array to clear the 5MB+ JSON tracking file safely
    $emptyData = json_encode([]);
    if (file_put_contents(SNAPSHOT_FILE, $emptyData) !== false) {
        echo "[Success] Polymarket script snapshot cleared successfully. Size reset to a few bytes.\n";
    } else {
        echo "[Error] Failed to write data to .file_snapshot.json. Check file permissions.\n";
    }
} else {
    echo "[Notice] Snapshot file not found at: " . SNAPSHOT_FILE . ". Nothing to clear.\n";
}
