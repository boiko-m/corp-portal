/**
 * notifications plugin
 */

var Notifications = (function(opts) {
    if(!opts.id){
        throw new Error('Notifications: the param id is required.');
    }

    var elem = $('#'+opts.id);

    if(!elem.length){
        throw new Error('Notifications: the element was not found.');
    }

    var options = $.extend({
        pollInterval: 60000,
        xhrTimeout: 2000,
        readLabel: 'read',
        markAsReadLabel: 'mark as read'
    }, opts);

    var getIcon = function(key) {
        switch (key) {
            case "gift_notify_from":
            case "gift_notify":
                return "mdi-gift";
            default:
                return "mdi-information-outline";
        }
    }

    /**
     * Renders a notification row
     *
     * @param object The notification instance
     * @returns {jQuery|HTMLElement|*}
     */
    var renderRow = function (object) {
        var html = '<a href="' + (object.url ? object.url : "javascript:void(0);") + '" class="dropdown-item notify-lbr notify-item" data-id="' + object.id + '">' +
                        '<div class="notify-icon bg-success"><i class="mdi ' + getIcon(object.key) + '"></i></div>' +
                        '<p class="notify-details" title="' + object.message + '" >' + object.message + '<small class="text-muted">' + object.timeago + '</small></p>' +
                    '</a>';
        return $(html);
    };

    var showToastList = function() {
        $.ajax({
            url: options.urlToast,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $.each(data.list, function (index, object) {
                    $.toast({
                        heading: "Новое уведомление!",
                        text: object.message,
                        position: 'top-right',
                        loaderBg: '#3b98b5',
                        icon: 'info',
                        hideAfter: 2000,
                        stack: 999
                    });
                });
            }
        });
    };

    var showList = function() {
        var list = elem.find('.notifications-list');
        $.ajax({
            url: options.urlAll,
            type: "GET",
            dataType: "json",
            timeout: opts.xhrTimeout,
            success: function(data) {
                var seen = 0,
                    cnt = 0;

                $.each(data.list, function (index, object) {
                    if(object.read == "1")
                        return;
                    cnt += 1;
                });

                $.each(data.list, function (index, object) {
                    if(
                        list.find('>a[data-id="' + object.id + '"]').length ||
                        object.read == "1"
                    ){
                        return;
                    }
                    var item = renderRow(object);

                    if(object.seen == '0'){
                        seen += 1;
                    }
                    list.prepend(item);
                });

                switchDisplayByCount(cnt);
                setCount(seen, true);
                startPoll(true);
            }
        });
    };

    elem.find('> a[data-toggle="dropdown"]').on('click', function(e){
        if(!$(this).parent().hasClass('show')){
            showList();
        }
    });

    elem.find('.read-all').on('click', function(e){
        e.stopPropagation();
        $.ajax({
            url: options.readAllUrl,
            type: "GET",
            dataType: "json",
            timeout: opts.xhrTimeout,
            success: function (data) {
                markRead(elem.find('.notify-lbr').remove());
                switchDisplayByCount(0);
                //showList();
            }
        });
    });

    var switchDisplayByCount = function(cnt) {
        if(cnt == 0) {
            elem.find('.empty-row').show();
            return;
        }
        elem.find('.empty-row').hide();
    };

    var markRead = function(mark){
        mark.off('click').on('click', function(){ return false; });
        mark.attr('title', options.readLabel);
        //mark.tooltip('dispose').tooltip();
        mark.closest('.dropdown-item').addClass('read');
    };

    var setCount = function(count, decrement) {
        var badge = elem.find('.notifications-count');
        if(decrement) {
            count = parseInt(badge.data('count')) - count;
        }

        if(count > 0){
            badge.data('count', count).text(count).show();
        }
        else {
            badge.data('count', 0).text(0).hide();
        }
    };

    var updateCount = function() {
        $.ajax({
            url: options.countUrl,
            type: "GET",
            dataType: "json",
            timeout: options.xhrTimeout,
            success: function(data) {
                setCount(data.count);
                showToastList();
            },
            complete: function() {
                startPoll();
            }
        });
    };

    var _updateTimeout;
    var startPoll = function(restart) {
        if (restart && _updateTimeout){
            clearTimeout(_updateTimeout);
        }
        _updateTimeout = setTimeout(function() {
            updateCount();
        }, options.pollInterval);
    };
    // Fire the initial poll
    startPoll();
    showToastList();
});
