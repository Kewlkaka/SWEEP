@if (session()->has('message'))
    <div class="fixed">
        <p>{{ session('message') }}</p>
    </div>
@endif
