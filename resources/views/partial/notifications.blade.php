
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>--}}
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

<script>


    @if(Session::has('success'))

    toastr.options = {

        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    }
    toastr.success("{{ Session::get('success') }}");


    @endif
    @php

        Session::forget('success');

    @endphp


    @if(Session::has('info'))

    toastr.options = {

        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    }

    toastr.info("{{ Session::get('info') }}");

    @endif
    @php

        Session::forget('info');

    @endphp


    @if(Session::has('warning'))

    toastr.options = {
        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    }

    toastr.warning("{{ Session::get('warning') }}");

    @endif
    @php

        Session::forget('warning');

    @endphp


    @if(Session::has('error'))
    toastr.options = {
        "timeOut": "7000",
        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    }

    toastr.error("{{ Session::get('error') }}");

    @endif
    @php

        Session::forget('error');

    @endphp

    @if(count($errors) > 0 )
    @foreach($errors->all() as $error)
    toastr.error("{{ $error }}");
    @endforeach
    @endif


</script>
