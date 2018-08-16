<!-- /** CSS begins **/ -->
<style>
    html, body {
        padding: 0px;
        margin: 0px;
        height: 100%;
        border: none;
    }

    body {
        background: #edeef0;
        color: #000;
        margin: 0;
        padding: 0;
        direction: ltr;
        font-size: 12px;
        font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif;
        line-height: 1.154;
        font-weight: 400;
        -webkit-font-smoothing: subpixel-antialiased;
        -moz-osx-font-smoothing: auto;
    }

    .docs_panel_wrap {
        height: 50px;
    }

    .docs_panel {
        background: #F1F1F1;
        position: fixed;
        width: 100%;
        -webkit-box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
    }

    .clear_fix {
        display: block;
    }

    .fl_r {
        float: right;
    }

    .docs_panel .fl_r + .fl_r {
        margin-right: 10px;
    }

    .button_blue button, .button_gray button, .button_light_gray button, .flat_button {
        padding: 6px 16px 7px;
        margin: 0;
        font-size: 11px;
        display: inline-block;
        zoom: 1;
        cursor: pointer;
        white-space: nowrap;
        outline: none;
        font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica Neue,sans-serif;
        vertical-align: top;
        line-height: 15px;
        text-align: center;
        text-decoration: none;
        background: none;
        background-color: #5181b8;
        color: #fff;
        border: 0;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .flat_button.secondary_dark {
        background-color: #dae2eb;
        color: #F9FCFC;
    }

    .docs_info {
        padding: 7px 10px 0px;
        color: #939699;
    }

    .docs_name {
        display: block;
        padding-top: 7px;
    }

    a {
        color: #2a5885;
        text-decoration: none;
        cursor: pointer;
    }

    a b, b a {
        color: #42648b;
    }

    b, strong {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .iframe {
        border: none;
        display: block;
        box-sizing: border-box;
        padding-top: 50px;
        margin-top: -50px;
    }
</style>