{{-- Fallback show view for exception renderer --}}
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
    @if(isset($exceptionAsMarkdown))
        <div>{!! $exceptionAsMarkdown !!}</div>
    @endif
    <pre>{{ print_r($exception, true) }}</pre>
</body>
</html>
