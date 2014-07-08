


<script type="text/javascript">
    base_url = '{{ Request::getSchemeAndHttpHost() }}{{ Request::server('REQUEST_URI') }}/';
    token = '{{ Session::getToken() }}';
    debug = '{{ Config::get('app.debug') }}';
    js_error = '{{ str_replace('\'', '\\\'', Lang::get('minecraft/server::console.terminal.js_error')) }}';

    jQuery(function($, undefined) {
        BukkitConsole.init({
            url: '{{ Request::getSchemeAndHttpHost() }}{{ Request::server('REQUEST_URI') }}/' + '/',
            token: '{{ Session::getToken() }}',
            debug: "{{ Config::get('app.debug') }}",
            js_error: "{{ str_replace('\'', '\\\'', Lang::get('minecraft/server::console.terminal.js_error')) }}",
            //greetings: 'Minecraft Console by Robin Radic',
            //name: 'bukit_server',
            //height: 700,
            //prompt: '$$ > ',
            //ele: '#bukkit-console'
        });
    });
</script>