<script>
    window.APP = {
        config: {
            baseUrl: "<?php echo URL::route('home')?>api"
        }

    };

</script>
<script src="{{ URL::asset('components/jquery-2.0.2.min.js') }}"></script>
<script src="{{ URL::asset('components/moment.js') }}"></script>
<script src="{{ URL::asset('components/underscore.js') }}"></script>
<script src="{{ URL::asset('components/angular-1.1.5/angular.js') }}"></script>
<script src="{{ URL::asset('components/angular-1.1.5/angular-resource.js') }}"></script>
<script src="{{ URL::asset('components/angular-1.1.5/angular-cookies.js') }}"></script>
<script src="{{ URL::asset('components/angular-1.1.5/angular-sanitize.js') }}"></script>
<script src="{{ URL::asset('components/bootstrap.min.js') }}"></script>

<script src="{{ URL::asset('components/angular-ui-0.0.4.js') }}"></script>
<script src="{{ URL::asset('components/toastr.js') }}"></script>


<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{ URL::asset('js/controllers/controllers.js') }}"></script>
<script src="{{ URL::asset('js/directives/directives.js') }}"></script>
<script src="{{ URL::asset('js/services/services.js') }}"></script>
<script src="{{ URL::asset('js/filters/filters.js') }}"></script>
<script src="{{ URL::asset('js/providers/providers.js') }}"></script>


