@if(isset($message))
    <div class="alert alert-{{ $message['type'] }}" role="alert">
        <p>
            {{ $message['content'] }}
        </p>
    </div>
@endif