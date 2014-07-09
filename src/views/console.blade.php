@extends('radic/bukkit-console::layout')

@section('styles')
@parent
{{ HTML::style('packages/radic/bukkit-console/bukkit-console.css') }}
@stop

@section('content')
@parent
<div id="bukkit-console"></div>
@stop

@section('scripts')
@parent
{{ HTML::script('packages/radic/bukkit-console/terminal.js') }}
{{ HTML::script('packages/radic/bukkit-console/bukkit-console.js') }}
<script type="text/javascript">
    jQuery(function($, undefined) {
        BukkitConsole.init({
            url: '{{ URL::to(Config::get("radic/bukkit-console::routes.cmd")[0]) }}',
            token: '{{ Session::getToken() }}',
            debug: "{{ Config::get('app.debug') }}",
            js_error: "JS Error",
            //greetings: 'Minecraft Console by Robin Radic',
            //name: 'bukit_server',
            //height: 700,
            //prompt: '$$ > ',
             ele: '#bukkit-console'
        });
    });
</script>
@stop