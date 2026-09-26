<?php

/**
 * Delete old duplicate media imports (IDs 36-42 with ".Replace" in title).
 */
$duplicate_ids = array(36, 37, 38, 39, 40, 41, 42);
$deleted = 0;

foreach ($duplicate_ids as $id) {
    $att = get_post($id);
    if ($att && $att->post_type === 'attachment') {
        $file = basename(wp_get_attachment_url($id));
        $title = $att->post_title;
        // Only delete if it has ".Replace" in the title (old import artifacts)
        if (strpos($title, 'Replace') !== false) {
            wp_delete_attachment($id, true);
            echo "Deleted: ID $id — $title ($file)\n";
            $deleted++;
        } else {
            echo "Skipped: ID $id — $title (no .Replace marker)\n";
        }
    } else {
        echo "Skipped: ID $id — not found or not an attachment\n";
    }
}

echo "\nCleaned up $deleted duplicate attachments.\n";
