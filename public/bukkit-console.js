var BukkitConsole = function(){
    var config = {
        url: '/',
        token: '',
        debug: true,
        js_error: 'Has been an error. FFS!',
        greetings: 'Minecraft Console by Robin Radic',
        name: 'bukit_server',
        height: 700,
        prompt: '$$ > ',
        ele: '#bukkit-console'
    };

    var $console;


    var init = function(options){
        $.extend(config, options);

        var $console = $(config.ele);

        var errorHandler = function(command, term){
            try {
                var result = window.eval(command);
                if (result !== undefined) {
                    term.echo(new String(result));
                }
            } catch(e) {
                term.error(new String(e));
            }
        };

        $console.terminal(function(command, term) {
            if (command !== '') {
                term.pause();
                $.ajax({
                    url: config.url,
                    data: {
                        command: command,
                        _token: config.token
                    },
                    type: 'POST',
                    success: function(data, status){
                        console.log(data);
                        if(data.success){
                            $.each(data.messages, function(index, message){
                                //console.log(message);
                                var date = new Date(message.timestamp);
                                term.echo(new String(date.getHours() + ':' + date.getMinutes() + ':' + date.getSeconds() + ' [' + message.level + '] ' + message.message));
                            });
                        } else {
                            errorHandler(command, term);
                        }
                        term.resume();
                        term.scroll(term.height());
                    },
                    error: function() {
                        errorHandler(command, term);
                        term.resume();
                        term.scroll(term.height());
                    }
                });

            } else {
                term.echo('');
            }
        }, {
            greetings: config.greetings,
            name: config.name,
            height: config.height,
            prompt: config.prompt
        });


    };

    return {
        init: init,
        console: $console
    };
}();