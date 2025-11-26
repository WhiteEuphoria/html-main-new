<?php

return [
    // Allow previewing of additional mime types during temporary uploads.
    // Livewire defaults exclude PDF; we include it here to enable inline previews
    // when calling $file->temporaryUrl() in components/blade views.
    'temporary_file_upload' => [
        'preview_mimes' => [
            'png', 'gif', 'bmp', 'svg', 'wav', 'mp4',
            'mov', 'avi', 'wmv', 'mp3', 'm4a',
            'jpg', 'jpeg', 'mpga', 'webp', 'wma',
            'pdf',
        ],
    ],
];

