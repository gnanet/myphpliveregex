<?php
/*
 * MyPHPLiveRegex - opensource clone of phpliveregex.com online version
 *
 * @author   Gergely Nagy <gna@r-us.hu> - https://github.com/gnanet
 */

$MYPLRURL = '';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My PHP Live Regex</title>
    <meta name="description" content="Test PHP regular expressions live in your browser and generate sample code for preg_match, preg_match_all, preg_replace, preg_grep, and preg_split!">

    <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.1/cosmo/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="<?php echo $MYPLRURL; ?>">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <style>
      body { background: #333; }
      input, textarea { font-family: monospace; }
      .navbar { background: #8892BF; border-color: #4F5B93; border-bottom-width: 4px; }
      a { color: #FFF; } a:hover, a:focus { color: white; }
      code { color: #4F5B93; background-color: #FFF; }
      .nav-pills>li.active>a, .nav-pills>li.active>a:hover, .nav-pills>li.active>a:focus { background-color: #8892BF; color: #FFF; }
      .nav-pills>li>a { color: #333; }
      .data-structure { padding-top: 10px; }
    </style>

    <style>

.ref{
  font: normal normal 12px/18px Consolas, Monaco, Andale Mono, Courier New, monospace;
  color: #333;
}

/* reset default styles for these elements */
.ref i,
.ref span,
.ref a{
  font-style: inherit;
  font-weight: inherit;
  margin: 0;
  padding: 0;
  text-align: left;
  display: inline;
  text-decoration: inherit;
  white-space: normal;
  background: none;
}

/* meta content (used to generate tooltips) */
.ref > div{
  display: none;
}

/* show help cursor when mouse is over an entity with a tooltip */
.ref [data-tip]{
  cursor: help;
}

/* pointer if inside a link */
.ref a > [data-tip]{
  cursor: pointer;
}

/* links */
.ref a{
  color: inherit;
  border-bottom: 1px dotted transparent;
  border-color: inherit;
}

/* tooltip; note that the js overrides top/left properties, this is why we use margin  */
#rTip{
  display: none;
  position: absolute;
  z-index: 99999;
  font-size: 12px;
  white-space: pre;
  text-align: left;
  text-shadow: 0 -1px 0 #191919;
  line-height: 16px;
  background: #222;
  color: #888;
  border: 0;
  border-radius: 4px;
  opacity: 0.90;
  box-shadow:0 0 4px rgba(0,0,0, 0.25);
  -webkit-transition: opacity .25s, margin .25s;
     -moz-transition: opacity .25s, margin .25s;
      -ms-transition: opacity .25s, margin .25s;
          transition: opacity .25s, margin .25s;
}

#rTip.visible{
  display: table;
  margin: 10px 0 0 15px;
}

#rTip.visible.fadingOut{
  opacity: 0;
  margin: 20px 0 0 25px;
}

#rTip [data-cell]{
  padding: 2px 7px;
}

#rTip [data-title], #rTip [data-desc]{
  padding: 8px;
  display: block;
  color: #ccc;
}

#rTip [data-desc]{
  padding-top: 0px;
  color: #777;
}

#rTip [data-cell][data-varType]{
  padding: 10px;
  background: #333;
  box-shadow: inset -1px 0 0 #444;
  border-right:1px solid #111;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}

#rTip [data-cell][data-sub]{
  padding: 8px 10px 10px 10px;
  background: #333;
  box-shadow: inset 0 1px 0 #444;
  border-top:1px solid #111;
  border-bottom-right-radius: 4px;
  border-bottom-left-radius: 4px;
}

#rTip [data-table] [data-cell]:first-child{
  font: bold 11px Helvetica, Arial;
  color: #888;
}

#rTip [data-table] [data-cell]:nth-child(2){
  color: #edd078;
}




/* base entity - can be nested */
.ref span{
  white-space: pre;
  display: inline;
}

/* key-value dividers, property & method modifiers etc. */
.ref i{
  white-space: pre;
  color: #aaa;
}

/* source expression (input) */
.ref [data-input] > *{
  display: none;
}
.ref [data-input]{
  margin: 2px 0 0;
  padding: 2px 7px 3px 4px;
  display: block;
  color: #ccc;
  background-color: #333;
  background-image: -webkit-linear-gradient(top, #444, #333);
  background-image: -moz-linear-gradient(top, #444, #333);
  background-image: -ms-linear-gradient(top, #444, #333);
  background-image: linear-gradient(top, #444, #333);
  border-radius: 4px 4px 0 0;
  border-bottom: 1px solid #fff;
}

.ref [data-backtrace]{
  float: right;
}

.ref [data-output]{
  background: #f9f9f9;
  border: 1px solid #eee;
  border-top: 0;
  border-radius: 0 0 4px 4px;
  box-shadow: inset 0px 4px 4px #f3f3f3, inset 0px -8px 8px #fff;
  padding: 2px 5px;
  margin: 0 0 4px;
  text-shadow: 0 1px 0 #fff;
  display: block;
}

/* expand/collapse toggle link for groups */
.ref [data-toggle]{
  display: inline-block;
  vertical-align: -3px;
  margin-left: 2px;
  width: 0px;
  height: 0px;
  border-style: solid;
  border-width: 7px 0 7px 10px;
  border-color: transparent transparent transparent #8892BF;
  cursor: pointer;
  -webkit-transition: all ease-in .15s;
     -moz-transition: all ease-in .15s;
      -ms-transition: all ease-in .15s;
          transition: all ease-in .15s;
}

/* collapse graphic */
.ref [data-toggle][data-exp]{
  -webkit-transform: rotate(90deg);
     -moz-transform: rotate(90deg);
      -ms-transform: rotate(90deg);
          transform: rotate(90deg);
}

.ref [data-group]{
  display: none;
}

.ref [data-toggle][data-exp] ~ [data-group]{
  display: block;
}

/* group sections */
.ref [data-table]{
  display: table;
}

/* section titles */
.ref [data-tHead]{
  font: bold 11px Helvetica, Arial;
  color: #bcbcbc;
  text-transform: lowercase;
  margin: 12px 0 2px 10px;
  display: block;
}

/* emulate a table for displaying array & object members */
/* section row */
.ref [data-row]{
  display: table-row;
}

/* zebra-like rows */
.ref [data-output] [data-row]:nth-child(odd){background: #f4f4f4;}
.ref [data-output] [data-row]:nth-child(even){background: #f9f9f9;}

/* section cells */
.ref [data-cell]{
  display: table-cell;
  width: auto;
  vertical-align: top;
  padding: 1px 0 1px 10px;
}

/* last cell of a row (forces table to adjust width like we want to) */
.ref [data-output] [data-table],
.ref [data-output] [data-cell]:last-child{
  width: 100%;
}



/* tag-like appearance for boolean, null and resource types */
.ref [data-true],
.ref [data-false],
.ref [data-null],
.ref [data-unknown],
.ref [data-resource],
.ref [data-match]{
  font: bold 11px Helvetica, Arial;
  color: #fff;
  padding: 1px 3px;
  text-transform: lowercase;
  text-shadow: none;
  border-radius: 2px;
  margin-right: 5px;
  background-color: #eee;
  background-image: -webkit-linear-gradient(top, rgba(255,255,255,0.1) 40%,rgba(0,0,0,0.1) 100%);
  background-image: -moz-linear-gradient(top, rgba(255,255,255,0.1) 40%, rgba(0,0,0,0.1) 100%);
  background-image: -ms-linear-gradient(top, rgba(255,255,255,0.1) 40%,rgba(0,0,0,0.1) 100%);
  background-image: linear-gradient(to bottom, rgba(255,255,255,0.1) 40%,rgba(0,0,0,0.1) 100%);
}

/* string matches */
.ref [data-match]{
  background-color: #d78035;
}

/* boolean true */
.ref [data-true]{
  background-color: #339900;
}

/* boolean false */
.ref [data-false]{
  background-color: #8892BF;
  color: #fff;
}

/* null value */
.ref [data-null],
.ref [data-unknown]{
  background-color: #eee;
  color: #999;
  text-shadow: inherit;
}

/* resources */
.ref [data-resource]{
  background-color: #0057ae;
}

.ref [data-resourceProp]{
  font: bold 11px Helvetica, Arial;
  color: #999;
}

/* integer or double values */
.ref [data-integer],
.ref [data-double]{
  color: #0099CC;
}

/* string values */
.ref [data-string]{
  background: #e6e6e6;
  color: #000;
  padding: 3px 1px;
}

.ref [data-string][data-special]{
  background: none;
  padding: 0;
}

.ref [data-string][data-special] i{
  background: #faf3dc;
  color: #d78035;
}

/* arrays & objects */
.ref [data-array],
.ref [data-array] ~ i,
.ref [data-object],
.ref [data-object] ~ i,
.ref [data-resource] ~ i{
  color:#8892BF;
}

.ref [data-method]{
  font-weight: bold;
  color: #0057ae;
}

.ref [data-const][data-inherited],
.ref [data-prop][data-inherited]{
  color: #999;
}

.ref [data-prop][data-private],
.ref [data-method][data-private]{
  color: #8892BF;
}

/* inherited methods */
.ref [data-method][data-inherited]{
  font-weight: bold;
  color: #6da5de;
}

/* method arguments */
.ref [data-param]{
  font-weight: normal;
  color: #333;
}

/* optional method arguments */
.ref [data-param][data-optional]{
  font-style: italic;
  font-weight: normal;
  color: #aaa;
}

/* group info prefix */
.ref [data-gLabel]{
  font: bold 11px Helvetica, Arial;
  padding: 0 3px;
  color: #333;
}

/* tiny bubbles that indicate visibility info or class features */
.ref [data-mod]{
  font: bold 11px Helvetica, Arial;
  text-shadow: none;
  color: #fff;
}

.ref [data-input] [data-mod]{
  color: #444;
}

.ref [data-mod] span{
  display: inline-block;
  margin: 0 2px;
  width: 14px;
  height: 14px;
  text-align: center;
  border-radius: 30px;
  line-height: 15px;
}

.ref [data-mod-interface],
.ref [data-mod-abstract]{
  background: #baed78;
}

.ref [data-mod-protected]{
  background: #edd078;
}

.ref [data-mod-private]{
  background: #eea8b9;
}

.ref [data-mod-iterateable]{
  background: #d5dea5;
}

.ref [data-mod-cloneable]{
  background: #bdd7d1;
}

.ref [data-mod-final]{
  background: #78bded;
}

/* regular expression (colors partially match RegexBuddy and RegexPal) */
.ref [data-regex]{
  font-weight: bold;
  text-shadow: none;
  padding: 1px 0;
  background: #e6e6e6;
  word-wrap: break-word;
}

/* char class */
.ref [data-regex-chr]{
  background: #ffc080;
  color: #694c07;
}

.ref [data-regex-chr-meta]{background: #e0a060;} /* char class: metasequence */
.ref [data-regex-chr-range]{background: #ffcf9b;} /* char class: range-hyphen */

/* metasequence */
.ref [data-regex-meta]{
  background: #80c0ff;
  color: #105f8c;
}

/* group: depth 1 */
.ref [data-regex-g1]{
  background: #00c000;
  color: #fff;
}

/* group: depth 2 */
.ref [data-regex-g2]{
  background: #c3e86c;
  color: #648c1c;
}

/* group: depth 3 */
.ref [data-regex-g3]{
  background: #008000;
  color: #fff;
}

/* group: depth 4 */
.ref [data-regex-g4]{
  background: #6dcb99;
  color: #fff;
}

/* group: depth 5 */
.ref [data-regex-g5]{
  background: #00ff00;
  color: #2c8e24;
}
    </style>

</head>
<body>
<div class="container">
    <div class="row well well-sm" style="padding-bottom: 18px">
        <div class="col-md-6">
            <label>Regex</label>
            <div class="input-group">
                <span class="input-group-addon">/</span>
                <input id="regex_1" type="text" class="form-control" aria-label="regex" value="(.*), (.*)">
                <span class="input-group-addon">/</span>
            </div>
        </div>
        <div class="col-sm-2">
            <label>Regex Options</label>
            <input id="regex_2" class="form-control" id="options" value="" type="text">
        </div>
        <div class="col-sm-4">
            <label>Replacement</label>
            <input id="replacement" class="form-control" id="replacement" value="$0 --&gt; $2 $1" type="text">
        </div>
    </div>
    <div class="row well well-sm">
        <div class="col-md-5">
            <label>Your search string(s)</label>
            <textarea id="examples" class="form-control" rows="20">last_name, first_name
bjorge, philip
kardashian, kim
mercury, freddie</textarea>
<br>
<button id="clear" class="btn btn-danger pull-right" type="button">Clear Form Values</button>
<br>
<br>

        </div>
        <div class="col-md-7">
            <div role="tabpanel">

                <ul class="nav nav-pills" role="tablist">
                    <li role="presentation" class="active"><a href="#preg-match" aria-controls="preg-match" role="tab" data-toggle="pill">preg_match</a></li>
                    <li role="presentation"><a href="#preg-match-all" aria-controls="preg-match-all" role="tab" data-toggle="pill">preg_match_all</a></li>
                    <li role="presentation"><a href="#preg-replace" aria-controls="preg-replace" role="tab" data-toggle="pill">preg_replace</a></li>
                    <li role="presentation"><a href="#preg-grep" aria-controls="preg-grep" role="tab" data-toggle="pill">preg_grep</a></li>
                    <li role="presentation"><a href="#preg-split" aria-controls="preg-split" role="tab" data-toggle="pill">preg_split</a></li>
                </ul>

                <div class="tab-content" style="padding-top: 10px;">
                    <div role="tabpanel" class="tab-pane active" id="preg-match">
                        <input class="form-control" type="text" placeholder="Readonly input here…" readonly>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="preg-match-all"></div>
                    <div role="tabpanel" class="tab-pane" id="preg-replace"></div>
                    <div role="tabpanel" class="tab-pane" id="preg-grep"></div>
                    <div role="tabpanel" class="tab-pane" id="preg-split"></div>
                </div>

            </div>
        </div>
    </div>
    <div class="row well well-sm">
        <div class="col-md-12">
            <strong>Cheat Sheet</strong>
            <br />
            <table style="width:100%">
                <tr>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td><code>[abc]</code></td>
                                    <td>A single character of: a, b or c</td>
                                </tr>
                                <tr>
                                    <td><code>[^abc]</code></td>
                                    <td>Any single character except: a, b, or c</td>
                                </tr>
                                <tr>
                                    <td><code>[a-z]</code></td>
                                    <td>Any single character in the range a-z</td>
                                </tr>
                                <tr>
                                    <td><code>[a-zA-Z]</code></td>
                                    <td>Any single character in the range a-z or A-Z</td>
                                </tr>
                                <tr>
                                    <td><code>^</code></td>
                                    <td>Start of line</td>
                                </tr>
                                <tr>
                                    <td><code>$</code></td>
                                    <td>End of line</td>
                                </tr>
                                <tr>
                                    <td><code>\A</code></td>
                                    <td>Start of string</td>
                                </tr>
                                <tr>
                                    <td><code>\z</code></td>
                                    <td>End of string</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td><code>.</code></td>
                                    <td>Any single character</td>
                                </tr>
                                <tr>
                                    <td><code>\s</code></td>
                                    <td>Any whitespace character</td>
                                </tr>
                                <tr>
                                    <td><code>\S</code></td>
                                    <td>Any non-whitespace character</td>
                                </tr>
                                <tr>
                                    <td><code>\d</code></td>
                                    <td>Any digit</td>
                                </tr>
                                <tr>
                                    <td><code>\D</code></td>
                                    <td>Any non-digit</td>
                                </tr>
                                <tr>
                                    <td><code>\w</code></td>
                                    <td>Any word character (letter, number, underscore)</td>
                                </tr>
                                <tr>
                                    <td><code>\W</code></td>
                                    <td>Any non-word character</td>
                                </tr>
                                <tr>
                                    <td><code>\b</code></td>
                                    <td>Any word boundary</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table>
                            <tbody>
                                <tr>
                                    <td><code>(...)</code></td>
                                    <td>Capture everything enclosed</td>
                                </tr>
                                <tr>
                                    <td><code>(a|b)</code></td>
                                    <td>a or b</td>
                                </tr>
                                <tr>
                                    <td><code>a?</code></td>
                                    <td>Zero or one of a</td>
                                </tr>
                                <tr>
                                    <td><code>a*</code></td>
                                    <td>Zero or more of a</td>
                                </tr>
                                <tr>
                                    <td><code>a+</code></td>
                                    <td>One or more of a</td>
                                </tr>
                                <tr>
                                    <td><code>a{3}</code></td>
                                    <td>Exactly 3 of a</td>
                                </tr>
                                <tr>
                                    <td><code>a{3,}</code></td>
                                    <td>3 or more of a</td>
                                </tr>
                                <tr>
                                    <td><code>a{3,6}</code></td>
                                    <td>Between 3 and 6 of a</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
            </table>
            <br>
            <strong>Options</strong>
            <br />
            <div id="regex_options">
                <p>
                    <span style="display: inline-block"><code>i</code> case insensitive&emsp;</span>
                    <span style="display: inline-block"><code>m</code> treat as multi-line string&emsp;</span>
                    <span style="display: inline-block"><code>s</code> dot matches newline&emsp;</span>
                    <span style="display: inline-block"><code>x</code> ignore whitespace in regex&emsp;</span>
                    <span style="display: inline-block"><code>A</code> matches only at the start of string&emsp;</span>
                    <span style="display: inline-block"><code>D</code> matches only at the end of string&emsp;</span>
                    <span style="display: inline-block"><code>U</code> non-greedy matching by default</span>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 *
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function (b, c) {
    var $ = b.jQuery || b.Cowboy || (b.Cowboy = {}), a;
    $.throttle = a = function (e, f, j, i) {
        var h, d = 0;
        if (typeof f !== "boolean") {
            i = j;
            j = f;
            f = c
        }
        function g() {
            var o = this, m = +new Date() - d, n = arguments;
            function l() {
                d = +new Date();
                j.apply(o, n)
            }
            function k() {
                h = c
            }
            if (i && !h) {
                l()
            }
            h && clearTimeout(h);
            if (i === c && m > e) {
                l()
            } else {
                if (f !== true) {
                    h = setTimeout(i ? k : l, i === c ? e - m : e)
                }
            }
        }
        if ($.guid) {
            g.guid = j.guid = j.guid || $.guid++
        }
        return g
    };
    $.debounce = function (d, e, f) {
        return f === c ? a(d, e, false) : a(d, f, e !== false)
    }
})(this);

PHPREGEX_EVAL = null;
PERMALINK_DIRTY = false;
function evalRegex() {
    PERMALINK_DIRTY = true;
    $(".tab-content").fadeTo(100, 0.5);

    if (PHPREGEX_EVAL !== null) {
        PHPREGEX_EVAL.abort();
    }
    PHPREGEX_EVAL = $.post("./myplr.php?task=evaluate",
            {"regex_1": $("#regex_1").val(),
                "regex_2": $("#regex_2").val(),
                "replacement": $("#replacement").val(),
                "examples": $("#examples").val()},
            function (data) {
                document.getElementById("preg-match").innerHTML = data.preg_match;
                document.getElementById("preg-match-all").innerHTML = data.preg_match_all;
                document.getElementById("preg-replace").innerHTML = data.preg_replace;
                document.getElementById("preg-grep").innerHTML = data.preg_grep;
                document.getElementById("preg-split").innerHTML = data.preg_split;

                (function () {

                    var tip = document.createElement('div'),
                            refs = document.querySelectorAll('.ref');

                    for (var i = 0, m = refs.length; i < m; i++) {
                        var kbds = refs[i].querySelectorAll('[data-toggle]'),
                                tippable = refs[i].querySelectorAll('[data-tip]'),
                                tips = refs[i].querySelectorAll('div');

                        for (var j = 0, n = kbds.length; j < n; j++) {
                            if (kbds[j].parentNode !== refs[i])
                                kbds[j].onclick = function (e) {
                                    ('exp' in this.dataset) ? delete this.dataset.exp : this.dataset.exp = 1;
                                }
                        }

                        [].filter.call(tips, function (node) {
                            return node.parentNode == refs[i];
                        });

                        for (var j = 0, n = tippable.length; j < n; j++) {
                            tippable[j].tipRef = tips[tippable[j].dataset.tip];
                            tippable[j].onmouseover = function () {
                                tip.className = 'ref visible';
                                tip.innerHTML = this.tipRef.innerHTML;
                                window.clearTimeout(tip.fadeOut);
                            };
                            tippable[j].onmouseout = function () {
                                tip.className = 'ref visible fadingOut';
                                tip.fadeOut = window.setTimeout(function () {
                                    tip.innerHTML = '';
                                    tip.className = '';
                                }, 250);
                            };
                        }

                        refs[i].onmousemove = function (e) {
                            if (tip.className.indexOf('visible') < 0)
                                return;
                            tip.style.top = ((document.documentElement.clientHeight - e.clientY) < tip.offsetHeight + 20 ? Math.max(e.pageY - tip.offsetHeight, 0) : e.pageY) + 'px';
                            tip.style.left = ((document.documentElement.clientWidth - e.clientX) < tip.offsetWidth + 20 ? Math.max(e.pageX - tip.offsetWidth, 0) : e.pageX) + 'px';
                        };
                    }

                    tip.id = 'rTip';
                    document.body.appendChild(tip);
                })();

                $(".tab-content").fadeTo(100, 1.0);
            }, "json");
}

evalRegex();

$('#regex_1 , #regex_2 , #examples , #replacement').keyup($.debounce(250, evalRegex));


$('#clear').click(function () {
    $("#regex_1 , #regex_2 , #examples , #replacement").val("");
    evalRegex();
});
</script>
<div id="rTip"></div>
</body>
</html>
