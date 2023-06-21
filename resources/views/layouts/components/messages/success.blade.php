@if (session()->has('message'))
    <script>
        $.notify('{{session()->get('message')}}', 'success');
    </script>
@endif
