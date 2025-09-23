
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Application Error</title>
</head>
<body>
    <h1>Application Error</h1>
    <p>
        <?php echo e((is_object($exception) && property_exists($exception, 'message')) ? $exception->message :
            ((is_object($exception) && property_exists($exception, 'detail')) ? $exception->detail :
            (is_string($exception) ? $exception : 'An error occurred.'))); ?>

    </p>
    <pre><?php echo e(print_r($exception, true)); ?></pre>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\ict-serve-2\resources\views/vendor/laravel-exceptions-renderer/markdown.blade.php ENDPATH**/ ?>