{{-- Fallback error view for exception renderer --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Error</title>
</head>
<body>
    <h1>Application Error</h1>
    <p>
        {{
            (is_object($exception) && property_exists($exception, 'message')) ? $exception->message :
            ((is_object($exception) && property_exists($exception, 'detail')) ? $exception->detail :
            (is_string($exception) ? $exception : 'An error occurred.'))
        }}
    </p>
        <pre>
            <?php
                if (is_object($exception)) {
                    echo 'Message: ' . (property_exists($exception, 'message') ? $exception->message : 'N/A') . "\n";
                    echo 'Code: ' . (property_exists($exception, 'code') ? $exception->code : 'N/A') . "\n";
                    echo 'File: ' . (property_exists($exception, 'file') ? $exception->file : 'N/A') . "\n";
                    echo 'Line: ' . (property_exists($exception, 'line') ? $exception->line : 'N/A') . "\n";
                } elseif (is_string($exception)) {
                    echo $exception;
                } else {
                    echo 'An error occurred.';
                }
            ?>
        </pre>
</body>
</html>
