/*globals $*/

/**
 * Check A Box v0.1.3
 * http://immobilienscout24.github.io/CheckABox/
 * 
 */

/* !!!!!!!!!!!!!!!! This script was edited to comply with Bootstrap specific needs and up-to-date Font Awesome usage !!!!!!!!!!!!!!!! */

$.fn.checkABox = function (action, options) {
    "use strict";

    var defaultOptions = {
            baseClass: "fa",
            checkedClass: "fa fa-check",
            uncheckedClass: "fa fa-check empty",
            iconClass: "my-ui-icon icon-ok",
            iconHtml: '<span></span>'
        },
        $attachedElements = $(this),
        iconPropertyName = "relatedIcon";

    function getRelatedIconFrom(checkbox) {
        return checkbox.prop(iconPropertyName);
    }

    function isInputChecked(input) {
        return input.is(":checked");
    }

    function handleInputState(checkbox, checked) {
        checkbox.prop("checked", checked);
        checkbox.trigger("change");
    }

    function setIconClass(checkbox, state) {
        var currentIcon = getRelatedIconFrom(checkbox);

        if (!checkbox.is(':disabled')) {
            currentIcon.toggleClass(defaultOptions.checkedClass, state);
            currentIcon.toggleClass(defaultOptions.uncheckedClass, !state);
            currentIcon.addClass("fa").addClass("fa-check");
        }
    }

    function syncButtonGroup() {
        $attachedElements.each(function (index, input) {
            input = $(input);
            setIconClass(input, isInputChecked(input));
        });
    }

    function setChecked(input, action) {
        handleInputState(input, action);
        setIconClass(input, action);
    }

    function toggleCheckState(input) {
        setChecked(input, !isInputChecked(input));
    }

    function syncInputIconClass(input) {
        return (isInputChecked(input) ? defaultOptions.checkedClass : defaultOptions.uncheckedClass);
    }

    function stopLabelEvents(event) {
        if ($(event.currentTarget).is('label')) {
            event.stopPropagation();
        }
    }

    function isCheckedRadio(el) {
        return (el.is("input[type='radio']") && isInputChecked(el));
    }

    function createClickEventCallback($input) {
        return function (event) {
            stopLabelEvents(event);
            event.preventDefault();

            //radio buttons have always one element checked, so we filter them
            if (!isCheckedRadio($input)) {
                toggleCheckState($input);
                syncButtonGroup();
            }
        };
    }
    
    function isTouchDevice() {
        return "ontouchstart" in document.documentElement;
    }

    function attachEventListener(el) {
        var event = isTouchDevice() ? "touchstart" : "click";
        
        el.each(function (index, input) {
            var icon, parent, $input = $(input);

            if (!$input.prop("checkABoxEnabled")) {
                $input.prop("checkABoxEnabled", true);

                icon = $(defaultOptions.iconHtml);
                icon.addClass(syncInputIconClass($input) + ' ' + defaultOptions.iconClass);
                $input.prop(iconPropertyName, icon);
                parent = $input.parent();

                parent.on(event, createClickEventCallback($input));
                icon.insertBefore($input);
            }
        });
    }

    function apply(action) {
        options = options || {};
        $.extend(defaultOptions, options);

        if (typeof action === "boolean") {
            setChecked($attachedElements, action);
        } else if (action === "toggle") {
            toggleCheckState($attachedElements);
        } else if (action === "bind") {
            attachEventListener($attachedElements);
        } else if (action === "refresh") {
            syncButtonGroup();
        }
    }

    apply(action);

    return $attachedElements;
};