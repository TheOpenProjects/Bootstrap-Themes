/* http://prismjs.com/download.html?themes=prism&languages=markup+css+clike+javascript+ruby+css-extras+git+jade+json+php+php-extras+sass+scss+sql&plugins=line-highlight+line-numbers+show-invisibles+autolinker+file-highlight+show-language+jsonp-highlight+highlight-keywords+remove-initial-line-feed+autoloader+unescaped-markup+command-line+normalize-whitespace+keep-markup */
var _self = "undefined" != typeof window ? window : "undefined" != typeof WorkerGlobalScope && self instanceof WorkerGlobalScope ? self : {},
    Prism = function() {
        var e = /\blang(?:uage)?-(\w+)\b/i,
            t = 0,
            n = _self.Prism = { util: { encode: function(e) {
                        return e instanceof a ? new a(e.type, n.util.encode(e.content), e.alias) : "Array" === n.util.type(e) ? e.map(n.util.encode) : e.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/\u00a0/g, " ") }, type: function(e) {
                        return Object.prototype.toString.call(e).match(/\[object (\w+)\]/)[1] }, objId: function(e) {
                        return e.__id || Object.defineProperty(e, "__id", { value: ++t }), e.__id }, clone: function(e) {
                        var t = n.util.type(e);
                        switch (t) {
                            case "Object":
                                var a = {};
                                for (var r in e) e.hasOwnProperty(r) && (a[r] = n.util.clone(e[r]));
                                return a;
                            case "Array":
                                return e.map && e.map(function(e) {
                                    return n.util.clone(e) }) }
                        return e } }, languages: { extend: function(e, t) {
                        var a = n.util.clone(n.languages[e]);
                        for (var r in t) a[r] = t[r];
                        return a }, insertBefore: function(e, t, a, r) { r = r || n.languages;
                        var l = r[e];
                        if (2 == arguments.length) { a = arguments[1];
                            for (var i in a) a.hasOwnProperty(i) && (l[i] = a[i]);
                            return l }
                        var o = {};
                        for (var s in l)
                            if (l.hasOwnProperty(s)) {
                                if (s == t)
                                    for (var i in a) a.hasOwnProperty(i) && (o[i] = a[i]);
                                o[s] = l[s] }
                        return n.languages.DFS(n.languages, function(t, n) { n === r[e] && t != e && (this[t] = o) }), r[e] = o }, DFS: function(e, t, a, r) { r = r || {};
                        for (var l in e) e.hasOwnProperty(l) && (t.call(e, l, e[l], a || l), "Object" !== n.util.type(e[l]) || r[n.util.objId(e[l])] ? "Array" !== n.util.type(e[l]) || r[n.util.objId(e[l])] || (r[n.util.objId(e[l])] = !0, n.languages.DFS(e[l], t, l, r)) : (r[n.util.objId(e[l])] = !0, n.languages.DFS(e[l], t, null, r))) } }, plugins: {}, highlightAll: function(e, t) {
                    var a = { callback: t, selector: 'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code' };
                    n.hooks.run("before-highlightall", a);
                    for (var r, l = a.elements || document.querySelectorAll(a.selector), i = 0; r = l[i++];) n.highlightElement(r, e === !0, a.callback) }, highlightElement: function(t, a, r) {
                    for (var l, i, o = t; o && !e.test(o.className);) o = o.parentNode;
                    o && (l = (o.className.match(e) || [, ""])[1].toLowerCase(), i = n.languages[l]), t.className = t.className.replace(e, "").replace(/\s+/g, " ") + " language-" + l, o = t.parentNode, /pre/i.test(o.nodeName) && (o.className = o.className.replace(e, "").replace(/\s+/g, " ") + " language-" + l);
                    var s = t.textContent,
                        u = { element: t, language: l, grammar: i, code: s };
                    if (n.hooks.run("before-sanity-check", u), !u.code || !u.grammar) return n.hooks.run("complete", u), void 0;
                    if (n.hooks.run("before-highlight", u), a && _self.Worker) {
                        var c = new Worker(n.filename);
                        c.onmessage = function(e) { u.highlightedCode = e.data, n.hooks.run("before-insert", u), u.element.innerHTML = u.highlightedCode, r && r.call(u.element), n.hooks.run("after-highlight", u), n.hooks.run("complete", u) }, c.postMessage(JSON.stringify({ language: u.language, code: u.code, immediateClose: !0 })) } else u.highlightedCode = n.highlight(u.code, u.grammar, u.language), n.hooks.run("before-insert", u), u.element.innerHTML = u.highlightedCode, r && r.call(t), n.hooks.run("after-highlight", u), n.hooks.run("complete", u) }, highlight: function(e, t, r) {
                    var l = n.tokenize(e, t);
                    return a.stringify(n.util.encode(l), r) }, tokenize: function(e, t) {
                    var a = n.Token,
                        r = [e],
                        l = t.rest;
                    if (l) {
                        for (var i in l) t[i] = l[i];
                        delete t.rest }
                    e: for (var i in t)
                        if (t.hasOwnProperty(i) && t[i]) {
                            var o = t[i];
                            o = "Array" === n.util.type(o) ? o : [o];
                            for (var s = 0; s < o.length; ++s) {
                                var u = o[s],
                                    c = u.inside,
                                    g = !!u.lookbehind,
                                    h = !!u.greedy,
                                    f = 0,
                                    d = u.alias;
                                u = u.pattern || u;
                                for (var p = 0; p < r.length; p++) {
                                    var m = r[p];
                                    if (r.length > e.length) break e;
                                    if (!(m instanceof a)) { u.lastIndex = 0;
                                        var y = u.exec(m),
                                            v = 1;
                                        if (!y && h && p != r.length - 1) {
                                            var b = r[p + 1].matchedStr || r[p + 1],
                                                k = m + b;
                                            if (p < r.length - 2 && (k += r[p + 2].matchedStr || r[p + 2]), u.lastIndex = 0, y = u.exec(k), !y) continue;
                                            var w = y.index + (g ? y[1].length : 0);
                                            if (w >= m.length) continue;
                                            var _ = y.index + y[0].length,
                                                P = m.length + b.length;
                                            if (v = 3, P >= _) {
                                                if (r[p + 1].greedy) continue;
                                                v = 2, k = k.slice(0, P) }
                                            m = k }
                                        if (y) { g && (f = y[1].length);
                                            var w = y.index + f,
                                                y = y[0].slice(f),
                                                _ = w + y.length,
                                                S = m.slice(0, w),
                                                O = m.slice(_),
                                                j = [p, v];
                                            S && j.push(S);
                                            var A = new a(i, c ? n.tokenize(y, c) : y, d, y, h);
                                            j.push(A), O && j.push(O), Array.prototype.splice.apply(r, j) } } } } }
                    return r }, hooks: { all: {}, add: function(e, t) {
                        var a = n.hooks.all;
                        a[e] = a[e] || [], a[e].push(t) }, run: function(e, t) {
                        var a = n.hooks.all[e];
                        if (a && a.length)
                            for (var r, l = 0; r = a[l++];) r(t) } } },
            a = n.Token = function(e, t, n, a, r) { this.type = e, this.content = t, this.alias = n, this.matchedStr = a || null, this.greedy = !!r };
        if (a.stringify = function(e, t, r) {
                if ("string" == typeof e) return e;
                if ("Array" === n.util.type(e)) return e.map(function(n) {
                    return a.stringify(n, t, e) }).join("");
                var l = { type: e.type, content: a.stringify(e.content, t, r), tag: "span", classes: ["token", e.type], attributes: {}, language: t, parent: r };
                if ("comment" == l.type && (l.attributes.spellcheck = "true"), e.alias) {
                    var i = "Array" === n.util.type(e.alias) ? e.alias : [e.alias];
                    Array.prototype.push.apply(l.classes, i) }
                n.hooks.run("wrap", l);
                var o = "";
                for (var s in l.attributes) o += (o ? " " : "") + s + '="' + (l.attributes[s] || "") + '"';
                return "<" + l.tag + ' class="' + l.classes.join(" ") + '" ' + o + ">" + l.content + "</" + l.tag + ">" }, !_self.document) return _self.addEventListener ? (_self.addEventListener("message", function(e) {
            var t = JSON.parse(e.data),
                a = t.language,
                r = t.code,
                l = t.immediateClose;
            _self.postMessage(n.highlight(r, n.languages[a], a)), l && _self.close() }, !1), _self.Prism) : _self.Prism;
        var r = document.currentScript || [].slice.call(document.getElementsByTagName("script")).pop();
        return r && (n.filename = r.src, document.addEventListener && !r.hasAttribute("data-manual") && document.addEventListener("DOMContentLoaded", n.highlightAll)), _self.Prism }();
"undefined" != typeof module && module.exports && (module.exports = Prism), "undefined" != typeof global && (global.Prism = Prism);
Prism.languages.markup = { comment: /<!--[\w\W]*?-->/, prolog: /<\?[\w\W]+?\?>/, doctype: /<!DOCTYPE[\w\W]+?>/, cdata: /<!\[CDATA\[[\w\W]*?]]>/i, tag: { pattern: /<\/?(?!\d)[^\s>\/=.$<]+(?:\s+[^\s>\/=]+(?:=(?:("|')(?:\\\1|\\?(?!\1)[\w\W])*\1|[^\s'">=]+))?)*\s*\/?>/i, inside: { tag: { pattern: /^<\/?[^\s>\/]+/i, inside: { punctuation: /^<\/?/, namespace: /^[^\s>\/:]+:/ } }, "attr-value": { pattern: /=(?:('|")[\w\W]*?(\1)|[^\s>]+)/i, inside: { punctuation: /[=>"']/ } }, punctuation: /\/?>/, "attr-name": { pattern: /[^\s>\/]+/, inside: { namespace: /^[^\s>\/:]+:/ } } } }, entity: /&#?[\da-z]{1,8};/i }, Prism.hooks.add("wrap", function(a) { "entity" === a.type && (a.attributes.title = a.content.replace(/&amp;/, "&")) }), Prism.languages.xml = Prism.languages.markup, Prism.languages.html = Prism.languages.markup, Prism.languages.mathml = Prism.languages.markup, Prism.languages.svg = Prism.languages.markup;
Prism.languages.css = { comment: /\/\*[\w\W]*?\*\//, atrule: { pattern: /@[\w-]+?.*?(;|(?=\s*\{))/i, inside: { rule: /@[\w-]+/ } }, url: /url\((?:(["'])(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1|.*?)\)/i, selector: /[^\{\}\s][^\{\};]*?(?=\s*\{)/, string: /("|')(\\(?:\r\n|[\w\W])|(?!\1)[^\\\r\n])*\1/, property: /(\b|\B)[\w-]+(?=\s*:)/i, important: /\B!important\b/i, "function": /[-a-z0-9]+(?=\()/i, punctuation: /[(){};:]/ }, Prism.languages.css.atrule.inside.rest = Prism.util.clone(Prism.languages.css), Prism.languages.markup && (Prism.languages.insertBefore("markup", "tag", { style: { pattern: /(<style[\w\W]*?>)[\w\W]*?(?=<\/style>)/i, lookbehind: !0, inside: Prism.languages.css, alias: "language-css" } }), Prism.languages.insertBefore("inside", "attr-value", { "style-attr": { pattern: /\s*style=("|').*?\1/i, inside: { "attr-name": { pattern: /^\s*style/i, inside: Prism.languages.markup.tag.inside }, punctuation: /^\s*=\s*['"]|['"]\s*$/, "attr-value": { pattern: /.+/i, inside: Prism.languages.css } }, alias: "language-css" } }, Prism.languages.markup.tag));
Prism.languages.clike = { comment: [{ pattern: /(^|[^\\])\/\*[\w\W]*?\*\//, lookbehind: !0 }, { pattern: /(^|[^\\:])\/\/.*/, lookbehind: !0 }], string: { pattern: /(["'])(\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/, greedy: !0 }, "class-name": { pattern: /((?:\b(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[a-z0-9_\.\\]+/i, lookbehind: !0, inside: { punctuation: /(\.|\\)/ } }, keyword: /\b(if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/, "boolean": /\b(true|false)\b/, "function": /[a-z0-9_]+(?=\()/i, number: /\b-?(?:0x[\da-f]+|\d*\.?\d+(?:e[+-]?\d+)?)\b/i, operator: /--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/, punctuation: /[{}[\];(),.:]/ };
Prism.languages.javascript = Prism.languages.extend("clike", { keyword: /\b(as|async|await|break|case|catch|class|const|continue|debugger|default|delete|do|else|enum|export|extends|finally|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|var|void|while|with|yield)\b/, number: /\b-?(0x[\dA-Fa-f]+|0b[01]+|0o[0-7]+|\d*\.?\d+([Ee][+-]?\d+)?|NaN|Infinity)\b/, "function": /[_$a-zA-Z\xA0-\uFFFF][_$a-zA-Z0-9\xA0-\uFFFF]*(?=\()/i }), Prism.languages.insertBefore("javascript", "keyword", { regex: { pattern: /(^|[^\/])\/(?!\/)(\[.+?]|\\.|[^\/\\\r\n])+\/[gimyu]{0,5}(?=\s*($|[\r\n,.;})]))/, lookbehind: !0, greedy: !0 } }), Prism.languages.insertBefore("javascript", "class-name", { "template-string": { pattern: /`(?:\\\\|\\?[^\\])*?`/, greedy: !0, inside: { interpolation: { pattern: /\$\{[^}]+\}/, inside: { "interpolation-punctuation": { pattern: /^\$\{|\}$/, alias: "punctuation" }, rest: Prism.languages.javascript } }, string: /[\s\S]+/ } } }), Prism.languages.markup && Prism.languages.insertBefore("markup", "tag", { script: { pattern: /(<script[\w\W]*?>)[\w\W]*?(?=<\/script>)/i, lookbehind: !0, inside: Prism.languages.javascript, alias: "language-javascript" } }), Prism.languages.js = Prism.languages.javascript;
! function(e) { e.languages.ruby = e.languages.extend("clike", { comment: /#(?!\{[^\r\n]*?\}).*/, keyword: /\b(alias|and|BEGIN|begin|break|case|class|def|define_method|defined|do|each|else|elsif|END|end|ensure|false|for|if|in|module|new|next|nil|not|or|raise|redo|require|rescue|retry|return|self|super|then|throw|true|undef|unless|until|when|while|yield)\b/ });
    var n = { pattern: /#\{[^}]+\}/, inside: { delimiter: { pattern: /^#\{|\}$/, alias: "tag" }, rest: e.util.clone(e.languages.ruby) } };
    e.languages.insertBefore("ruby", "keyword", { regex: [{ pattern: /%r([^a-zA-Z0-9\s\{\(\[<])(?:[^\\]|\\[\s\S])*?\1[gim]{0,3}/, inside: { interpolation: n } }, { pattern: /%r\((?:[^()\\]|\\[\s\S])*\)[gim]{0,3}/, inside: { interpolation: n } }, { pattern: /%r\{(?:[^#{}\\]|#(?:\{[^}]+\})?|\\[\s\S])*\}[gim]{0,3}/, inside: { interpolation: n } }, { pattern: /%r\[(?:[^\[\]\\]|\\[\s\S])*\][gim]{0,3}/, inside: { interpolation: n } }, { pattern: /%r<(?:[^<>\\]|\\[\s\S])*>[gim]{0,3}/, inside: { interpolation: n } }, { pattern: /(^|[^\/])\/(?!\/)(\[.+?]|\\.|[^\/\r\n])+\/[gim]{0,3}(?=\s*($|[\r\n,.;})]))/, lookbehind: !0 }], variable: /[@$]+[a-zA-Z_][a-zA-Z_0-9]*(?:[?!]|\b)/, symbol: /:[a-zA-Z_][a-zA-Z_0-9]*(?:[?!]|\b)/ }), e.languages.insertBefore("ruby", "number", { builtin: /\b(Array|Bignum|Binding|Class|Continuation|Dir|Exception|FalseClass|File|Stat|File|Fixnum|Fload|Hash|Integer|IO|MatchData|Method|Module|NilClass|Numeric|Object|Proc|Range|Regexp|String|Struct|TMS|Symbol|ThreadGroup|Thread|Time|TrueClass)\b/, constant: /\b[A-Z][a-zA-Z_0-9]*(?:[?!]|\b)/ }), e.languages.ruby.string = [{ pattern: /%[qQiIwWxs]?([^a-zA-Z0-9\s\{\(\[<])(?:[^\\]|\\[\s\S])*?\1/, inside: { interpolation: n } }, { pattern: /%[qQiIwWxs]?\((?:[^()\\]|\\[\s\S])*\)/, inside: { interpolation: n } }, { pattern: /%[qQiIwWxs]?\{(?:[^#{}\\]|#(?:\{[^}]+\})?|\\[\s\S])*\}/, inside: { interpolation: n } }, { pattern: /%[qQiIwWxs]?\[(?:[^\[\]\\]|\\[\s\S])*\]/, inside: { interpolation: n } }, { pattern: /%[qQiIwWxs]?<(?:[^<>\\]|\\[\s\S])*>/, inside: { interpolation: n } }, { pattern: /("|')(#\{[^}]+\}|\\(?:\r?\n|\r)|\\?.)*?\1/, inside: { interpolation: n } }] }(Prism);
Prism.languages.css.selector = { pattern: /[^\{\}\s][^\{\}]*(?=\s*\{)/, inside: { "pseudo-element": /:(?:after|before|first-letter|first-line|selection)|::[-\w]+/, "pseudo-class": /:[-\w]+(?:\(.*\))?/, "class": /\.[-:\.\w]+/, id: /#[-:\.\w]+/ } }, Prism.languages.insertBefore("css", "function", { hexcode: /#[\da-f]{3,6}/i, entity: /\\[\da-f]{1,8}/i, number: /[\d%\.]+/ });
Prism.languages.git = { comment: /^#.*/m, deleted: /^[-–].*/m, inserted: /^\+.*/m, string: /("|')(\\?.)*?\1/m, command: { pattern: /^.*\$ git .*$/m, inside: { parameter: /\s(--|-)\w+/m } }, coord: /^@@.*@@$/m, commit_sha1: /^commit \w{40}$/m };
! function(e) { e.languages.jade = { comment: { pattern: /(^([\t ]*))\/\/.*((?:\r?\n|\r)\2[\t ]+.+)*/m, lookbehind: !0 }, "multiline-script": { pattern: /(^([\t ]*)script\b.*\.[\t ]*)((?:\r?\n|\r(?!\n))(?:\2[\t ]+.+|\s*?(?=\r?\n|\r)))+/m, lookbehind: !0, inside: { rest: e.languages.javascript } }, filter: { pattern: /(^([\t ]*)):.+((?:\r?\n|\r(?!\n))(?:\2[\t ]+.+|\s*?(?=\r?\n|\r)))+/m, lookbehind: !0, inside: { "filter-name": { pattern: /^:[\w-]+/, alias: "variable" } } }, "multiline-plain-text": { pattern: /(^([\t ]*)[\w\-#.]+\.[\t ]*)((?:\r?\n|\r(?!\n))(?:\2[\t ]+.+|\s*?(?=\r?\n|\r)))+/m, lookbehind: !0 }, markup: { pattern: /(^[\t ]*)<.+/m, lookbehind: !0, inside: { rest: e.languages.markup } }, doctype: { pattern: /((?:^|\n)[\t ]*)doctype(?: .+)?/, lookbehind: !0 }, "flow-control": { pattern: /(^[\t ]*)(?:if|unless|else|case|when|default|each|while)\b(?: .+)?/m, lookbehind: !0, inside: { each: { pattern: /^each .+? in\b/, inside: { keyword: /\b(?:each|in)\b/, punctuation: /,/ } }, branch: { pattern: /^(?:if|unless|else|case|when|default|while)\b/, alias: "keyword" }, rest: e.languages.javascript } }, keyword: { pattern: /(^[\t ]*)(?:block|extends|include|append|prepend)\b.+/m, lookbehind: !0 }, mixin: [{ pattern: /(^[\t ]*)mixin .+/m, lookbehind: !0, inside: { keyword: /^mixin/, "function": /\w+(?=\s*\(|\s*$)/, punctuation: /[(),.]/ } }, { pattern: /(^[\t ]*)\+.+/m, lookbehind: !0, inside: { name: { pattern: /^\+\w+/, alias: "function" }, rest: e.languages.javascript } }], script: { pattern: /(^[\t ]*script(?:(?:&[^(]+)?\([^)]+\))*[\t ]+).+/m, lookbehind: !0, inside: { rest: e.languages.javascript } }, "plain-text": { pattern: /(^[\t ]*(?!-)[\w\-#.]*[\w\-](?:(?:&[^(]+)?\([^)]+\))*\/?[\t ]+).+/m, lookbehind: !0 }, tag: { pattern: /(^[\t ]*)(?!-)[\w\-#.]*[\w\-](?:(?:&[^(]+)?\([^)]+\))*\/?:?/m, lookbehind: !0, inside: { attributes: [{ pattern: /&[^(]+\([^)]+\)/, inside: { rest: e.languages.javascript } }, { pattern: /\([^)]+\)/, inside: { "attr-value": { pattern: /(=\s*)(?:\{[^}]*\}|[^,)\r\n]+)/, lookbehind: !0, inside: { rest: e.languages.javascript } }, "attr-name": /[\w-]+(?=\s*!?=|\s*[,)])/, punctuation: /[!=(),]+/ } }], punctuation: /:/ } }, code: [{ pattern: /(^[\t ]*(?:-|!?=)).+/m, lookbehind: !0, inside: { rest: e.languages.javascript } }], punctuation: /[.\-!=|]+/ };
    for (var t = "(^([\\t ]*)):{{filter_name}}((?:\\r?\\n|\\r(?!\\n))(?:\\2[\\t ]+.+|\\s*?(?=\\r?\\n|\\r)))+", n = [{ filter: "atpl", language: "twig" }, { filter: "coffee", language: "coffeescript" }, "ejs", "handlebars", "hogan", "less", "livescript", "markdown", "mustache", "plates", { filter: "sass", language: "scss" }, "stylus", "swig"], a = {}, i = 0, r = n.length; r > i; i++) {
        var s = n[i];
        s = "string" == typeof s ? { filter: s, language: s } : s, e.languages[s.language] && (a["filter-" + s.filter] = { pattern: RegExp(t.replace("{{filter_name}}", s.filter), "m"), lookbehind: !0, inside: { "filter-name": { pattern: /^:[\w-]+/, alias: "variable" }, rest: e.languages[s.language] } }) }
    e.languages.insertBefore("jade", "filter", a) }(Prism);
Prism.languages.json = { property: /".*?"(?=\s*:)/gi, string: /"(?!:)(\\?[^"])*?"(?!:)/g, number: /\b-?(0x[\dA-Fa-f]+|\d*\.?\d+([Ee]-?\d+)?)\b/g, punctuation: /[{}[\]);,]/g, operator: /:/g, "boolean": /\b(true|false)\b/gi, "null": /\bnull\b/gi }, Prism.languages.jsonp = Prism.languages.json;
Prism.languages.php = Prism.languages.extend("clike", { keyword: /\b(and|or|xor|array|as|break|case|cfunction|class|const|continue|declare|default|die|do|else|elseif|enddeclare|endfor|endforeach|endif|endswitch|endwhile|extends|for|foreach|function|include|include_once|global|if|new|return|static|switch|use|require|require_once|var|while|abstract|interface|public|implements|private|protected|parent|throw|null|echo|print|trait|namespace|final|yield|goto|instanceof|finally|try|catch)\b/i, constant: /\b[A-Z0-9_]{2,}\b/, comment: { pattern: /(^|[^\\])(?:\/\*[\w\W]*?\*\/|\/\/.*)/, lookbehind: !0 } }), Prism.languages.insertBefore("php", "class-name", { "shell-comment": { pattern: /(^|[^\\])#.*/, lookbehind: !0, alias: "comment" } }), Prism.languages.insertBefore("php", "keyword", { delimiter: /\?>|<\?(?:php)?/i, variable: /\$\w+\b/i, "package": { pattern: /(\\|namespace\s+|use\s+)[\w\\]+/, lookbehind: !0, inside: { punctuation: /\\/ } } }), Prism.languages.insertBefore("php", "operator", { property: { pattern: /(->)[\w]+/, lookbehind: !0 } }), Prism.languages.markup && (Prism.hooks.add("before-highlight", function(e) { "php" === e.language && (e.tokenStack = [], e.backupCode = e.code, e.code = e.code.replace(/(?:<\?php|<\?)[\w\W]*?(?:\?>)/gi, function(a) {
        return e.tokenStack.push(a), "{{{PHP" + e.tokenStack.length + "}}}" })) }), Prism.hooks.add("before-insert", function(e) { "php" === e.language && (e.code = e.backupCode, delete e.backupCode) }), Prism.hooks.add("after-highlight", function(e) {
    if ("php" === e.language) {
        for (var a, n = 0; a = e.tokenStack[n]; n++) e.highlightedCode = e.highlightedCode.replace("{{{PHP" + (n + 1) + "}}}", Prism.highlight(a, e.grammar, "php").replace(/\$/g, "$$$$"));
        e.element.innerHTML = e.highlightedCode } }), Prism.hooks.add("wrap", function(e) { "php" === e.language && "markup" === e.type && (e.content = e.content.replace(/(\{\{\{PHP[0-9]+\}\}\})/g, '<span class="token php">$1</span>')) }), Prism.languages.insertBefore("php", "comment", { markup: { pattern: /<[^?]\/?(.*?)>/, inside: Prism.languages.markup }, php: /\{\{\{PHP[0-9]+\}\}\}/ }));
Prism.languages.insertBefore("php", "variable", { "this": /\$this\b/, global: /\$(?:_(?:SERVER|GET|POST|FILES|REQUEST|SESSION|ENV|COOKIE)|GLOBALS|HTTP_RAW_POST_DATA|argc|argv|php_errormsg|http_response_header)/, scope: { pattern: /\b[\w\\]+::/, inside: { keyword: /(static|self|parent)/, punctuation: /(::|\\)/ } } });
! function(e) { e.languages.sass = e.languages.extend("css", { comment: { pattern: /^([ \t]*)\/[\/*].*(?:(?:\r?\n|\r)\1[ \t]+.+)*/m, lookbehind: !0 } }), e.languages.insertBefore("sass", "atrule", { "atrule-line": { pattern: /^(?:[ \t]*)[@+=].+/m, inside: { atrule: /(?:@[\w-]+|[+=])/m } } }), delete e.languages.sass.atrule;
    var a = /((\$[-_\w]+)|(#\{\$[-_\w]+\}))/i,
        t = [/[+*\/%]|[=!]=|<=?|>=?|\b(?:and|or|not)\b/, { pattern: /(\s+)-(?=\s)/, lookbehind: !0 }];
    e.languages.insertBefore("sass", "property", { "variable-line": { pattern: /^[ \t]*\$.+/m, inside: { punctuation: /:/, variable: a, operator: t } }, "property-line": { pattern: /^[ \t]*(?:[^:\s]+ *:.*|:[^:\s]+.*)/m, inside: { property: [/[^:\s]+(?=\s*:)/, { pattern: /(:)[^:\s]+/, lookbehind: !0 }], punctuation: /:/, variable: a, operator: t, important: e.languages.sass.important } } }), delete e.languages.sass.property, delete e.languages.sass.important, delete e.languages.sass.selector, e.languages.insertBefore("sass", "punctuation", { selector: { pattern: /([ \t]*)\S(?:,?[^,\r\n]+)*(?:,(?:\r?\n|\r)\1[ \t]+\S(?:,?[^,\r\n]+)*)*/, lookbehind: !0 } }) }(Prism);
Prism.languages.scss = Prism.languages.extend("css", { comment: { pattern: /(^|[^\\])(?:\/\*[\w\W]*?\*\/|\/\/.*)/, lookbehind: !0 }, atrule: { pattern: /@[\w-]+(?:\([^()]+\)|[^(])*?(?=\s+[{;])/, inside: { rule: /@[\w-]+/ } }, url: /(?:[-a-z]+-)*url(?=\()/i, selector: { pattern: /(?=\S)[^@;\{\}\(\)]?([^@;\{\}\(\)]|&|#\{\$[-_\w]+\})+(?=\s*\{(\}|\s|[^\}]+(:|\{)[^\}]+))/m, inside: { placeholder: /%[-_\w]+/ } } }), Prism.languages.insertBefore("scss", "atrule", { keyword: [/@(?:if|else(?: if)?|for|each|while|import|extend|debug|warn|mixin|include|function|return|content)/i, { pattern: /( +)(?:from|through)(?= )/, lookbehind: !0 }] }), Prism.languages.insertBefore("scss", "property", { variable: /\$[-_\w]+|#\{\$[-_\w]+\}/ }), Prism.languages.insertBefore("scss", "function", { placeholder: { pattern: /%[-_\w]+/, alias: "selector" }, statement: /\B!(?:default|optional)\b/i, "boolean": /\b(?:true|false)\b/, "null": /\bnull\b/, operator: { pattern: /(\s)(?:[-+*\/%]|[=!]=|<=?|>=?|and|or|not)(?=\s)/, lookbehind: !0 } }), Prism.languages.scss.atrule.inside.rest = Prism.util.clone(Prism.languages.scss);
Prism.languages.sql = { comment: { pattern: /(^|[^\\])(?:\/\*[\w\W]*?\*\/|(?:--|\/\/|#).*)/, lookbehind: !0 }, string: { pattern: /(^|[^@\\])("|')(?:\\?[\s\S])*?\2/, lookbehind: !0 }, variable: /@[\w.$]+|@("|'|`)(?:\\?[\s\S])+?\1/, "function": /\b(?:COUNT|SUM|AVG|MIN|MAX|FIRST|LAST|UCASE|LCASE|MID|LEN|ROUND|NOW|FORMAT)(?=\s*\()/i, keyword: /\b(?:ACTION|ADD|AFTER|ALGORITHM|ALL|ALTER|ANALYZE|ANY|APPLY|AS|ASC|AUTHORIZATION|BACKUP|BDB|BEGIN|BERKELEYDB|BIGINT|BINARY|BIT|BLOB|BOOL|BOOLEAN|BREAK|BROWSE|BTREE|BULK|BY|CALL|CASCADED?|CASE|CHAIN|CHAR VARYING|CHARACTER (?:SET|VARYING)|CHARSET|CHECK|CHECKPOINT|CLOSE|CLUSTERED|COALESCE|COLLATE|COLUMN|COLUMNS|COMMENT|COMMIT|COMMITTED|COMPUTE|CONNECT|CONSISTENT|CONSTRAINT|CONTAINS|CONTAINSTABLE|CONTINUE|CONVERT|CREATE|CROSS|CURRENT(?:_DATE|_TIME|_TIMESTAMP|_USER)?|CURSOR|DATA(?:BASES?)?|DATETIME|DBCC|DEALLOCATE|DEC|DECIMAL|DECLARE|DEFAULT|DEFINER|DELAYED|DELETE|DENY|DESC|DESCRIBE|DETERMINISTIC|DISABLE|DISCARD|DISK|DISTINCT|DISTINCTROW|DISTRIBUTED|DO|DOUBLE(?: PRECISION)?|DROP|DUMMY|DUMP(?:FILE)?|DUPLICATE KEY|ELSE|ENABLE|ENCLOSED BY|END|ENGINE|ENUM|ERRLVL|ERRORS|ESCAPE(?:D BY)?|EXCEPT|EXEC(?:UTE)?|EXISTS|EXIT|EXPLAIN|EXTENDED|FETCH|FIELDS|FILE|FILLFACTOR|FIRST|FIXED|FLOAT|FOLLOWING|FOR(?: EACH ROW)?|FORCE|FOREIGN|FREETEXT(?:TABLE)?|FROM|FULL|FUNCTION|GEOMETRY(?:COLLECTION)?|GLOBAL|GOTO|GRANT|GROUP|HANDLER|HASH|HAVING|HOLDLOCK|IDENTITY(?:_INSERT|COL)?|IF|IGNORE|IMPORT|INDEX|INFILE|INNER|INNODB|INOUT|INSERT|INT|INTEGER|INTERSECT|INTO|INVOKER|ISOLATION LEVEL|JOIN|KEYS?|KILL|LANGUAGE SQL|LAST|LEFT|LIMIT|LINENO|LINES|LINESTRING|LOAD|LOCAL|LOCK|LONG(?:BLOB|TEXT)|MATCH(?:ED)?|MEDIUM(?:BLOB|INT|TEXT)|MERGE|MIDDLEINT|MODIFIES SQL DATA|MODIFY|MULTI(?:LINESTRING|POINT|POLYGON)|NATIONAL(?: CHAR VARYING| CHARACTER(?: VARYING)?| VARCHAR)?|NATURAL|NCHAR(?: VARCHAR)?|NEXT|NO(?: SQL|CHECK|CYCLE)?|NONCLUSTERED|NULLIF|NUMERIC|OFF?|OFFSETS?|ON|OPEN(?:DATASOURCE|QUERY|ROWSET)?|OPTIMIZE|OPTION(?:ALLY)?|ORDER|OUT(?:ER|FILE)?|OVER|PARTIAL|PARTITION|PERCENT|PIVOT|PLAN|POINT|POLYGON|PRECEDING|PRECISION|PREV|PRIMARY|PRINT|PRIVILEGES|PROC(?:EDURE)?|PUBLIC|PURGE|QUICK|RAISERROR|READ(?:S SQL DATA|TEXT)?|REAL|RECONFIGURE|REFERENCES|RELEASE|RENAME|REPEATABLE|REPLICATION|REQUIRE|RESTORE|RESTRICT|RETURNS?|REVOKE|RIGHT|ROLLBACK|ROUTINE|ROW(?:COUNT|GUIDCOL|S)?|RTREE|RULE|SAVE(?:POINT)?|SCHEMA|SELECT|SERIAL(?:IZABLE)?|SESSION(?:_USER)?|SET(?:USER)?|SHARE MODE|SHOW|SHUTDOWN|SIMPLE|SMALLINT|SNAPSHOT|SOME|SONAME|START(?:ING BY)?|STATISTICS|STATUS|STRIPED|SYSTEM_USER|TABLES?|TABLESPACE|TEMP(?:ORARY|TABLE)?|TERMINATED BY|TEXT(?:SIZE)?|THEN|TIMESTAMP|TINY(?:BLOB|INT|TEXT)|TOP?|TRAN(?:SACTIONS?)?|TRIGGER|TRUNCATE|TSEQUAL|TYPES?|UNBOUNDED|UNCOMMITTED|UNDEFINED|UNION|UNIQUE|UNPIVOT|UPDATE(?:TEXT)?|USAGE|USE|USER|USING|VALUES?|VAR(?:BINARY|CHAR|CHARACTER|YING)|VIEW|WAITFOR|WARNINGS|WHEN|WHERE|WHILE|WITH(?: ROLLUP|IN)?|WORK|WRITE(?:TEXT)?)\b/i, "boolean": /\b(?:TRUE|FALSE|NULL)\b/i, number: /\b-?(?:0x)?\d*\.?[\da-f]+\b/, operator: /[-+*\/=%^~]|&&?|\|?\||!=?|<(?:=>?|<|>)?|>[>=]?|\b(?:AND|BETWEEN|IN|LIKE|NOT|OR|IS|DIV|REGEXP|RLIKE|SOUNDS LIKE|XOR)\b/i, punctuation: /[;[\]()`,.]/ };
! function() {
    function e(e, t) {
        return Array.prototype.slice.call((t || document).querySelectorAll(e)) }

    function t(e, t) {
        return t = " " + t + " ", (" " + e.className + " ").replace(/[\n\t]/g, " ").indexOf(t) > -1 }

    function n(e, n, i) {
        for (var o, a = n.replace(/\s+/g, "").split(","), l = +e.getAttribute("data-line-offset") || 0, d = r() ? parseInt : parseFloat, c = d(getComputedStyle(e).lineHeight), s = 0; o = a[s++];) { o = o.split("-");
            var u = +o[0],
                m = +o[1] || u,
                h = document.createElement("div");
            h.textContent = Array(m - u + 2).join(" \n"), h.className = (i || "") + " line-highlight", t(e, "line-numbers") || (h.setAttribute("data-start", u), m > u && h.setAttribute("data-end", m)), h.style.top = (u - l - 1) * c + "px", t(e, "line-numbers") ? e.appendChild(h) : (e.querySelector("code") || e).appendChild(h) } }

    function i() {
        var t = location.hash.slice(1);
        e(".temporary.line-highlight").forEach(function(e) { e.parentNode.removeChild(e) });
        var i = (t.match(/\.([\d,-]+)$/) || [, ""])[1];
        if (i && !document.getElementById(t)) {
            var r = t.slice(0, t.lastIndexOf(".")),
                o = document.getElementById(r);
            o && (o.hasAttribute("data-line") || o.setAttribute("data-line", ""), n(o, i, "temporary "), document.querySelector(".temporary.line-highlight").scrollIntoView()) } }
    if ("undefined" != typeof self && self.Prism && self.document && document.querySelector) {
        var r = function() {
                var e;
                return function() {
                    if ("undefined" == typeof e) {
                        var t = document.createElement("div");
                        t.style.fontSize = "13px", t.style.lineHeight = "1.5", t.style.padding = 0, t.style.border = 0, t.innerHTML = "&nbsp;<br />&nbsp;", document.body.appendChild(t), e = 38 === t.offsetHeight, document.body.removeChild(t) }
                    return e } }(),
            o = 0;
        Prism.hooks.add("complete", function(t) {
            var r = t.element.parentNode,
                a = r && r.getAttribute("data-line");
            r && a && /pre/i.test(r.nodeName) && (clearTimeout(o), e(".line-highlight", r).forEach(function(e) { e.parentNode.removeChild(e) }), n(r, a), o = setTimeout(i, 1)) }), window.addEventListener && window.addEventListener("hashchange", i) } }();
! function() { "undefined" != typeof self && self.Prism && self.document && Prism.hooks.add("complete", function(e) {
        if (e.code) {
            var t = e.element.parentNode,
                s = /\s*\bline-numbers\b\s*/;
            if (t && /pre/i.test(t.nodeName) && (s.test(t.className) || s.test(e.element.className)) && !e.element.querySelector(".line-numbers-rows")) { s.test(e.element.className) && (e.element.className = e.element.className.replace(s, "")), s.test(t.className) || (t.className += " line-numbers");
                var n, a = e.code.match(/\n(?!$)/g),
                    l = a ? a.length + 1 : 1,
                    m = new Array(l + 1);
                m = m.join("<span></span>"), n = document.createElement("span"), n.className = "line-numbers-rows", n.innerHTML = m, t.hasAttribute("data-start") && (t.style.counterReset = "linenumber " + (parseInt(t.getAttribute("data-start"), 10) - 1)), e.element.appendChild(n) } } }) }();
! function() { "undefined" != typeof self && !self.Prism || "undefined" != typeof global && !global.Prism || Prism.hooks.add("before-highlight", function(e) {
        var f = e.grammar;
        f.tab = /\t/g, f.crlf = /\r\n/g, f.lf = /\n/g, f.cr = /\r/g, f.space = / /g }) }();
! function() {
    if (("undefined" == typeof self || self.Prism) && ("undefined" == typeof global || global.Prism)) {
        var i = /\b([a-z]{3,7}:\/\/|tel:)[\w\-+%~\/.:#=?&amp;]+/,
            n = /\b\S+@[\w.]+[a-z]{2}/,
            e = /\[([^\]]+)]\(([^)]+)\)/,
            t = ["comment", "url", "attr-value", "string"];
        Prism.hooks.add("before-highlight", function(a) { a.grammar && !a.grammar["url-link"] && (Prism.languages.DFS(a.grammar, function(a, r, l) { t.indexOf(l) > -1 && "Array" !== Prism.util.type(r) && (r.pattern || (r = this[a] = { pattern: r }), r.inside = r.inside || {}, "comment" == l && (r.inside["md-link"] = e), "attr-value" == l ? Prism.languages.insertBefore("inside", "punctuation", { "url-link": i }, r) : r.inside["url-link"] = i, r.inside["email-link"] = n) }), a.grammar["url-link"] = i, a.grammar["email-link"] = n) }), Prism.hooks.add("wrap", function(i) {
            if (/-link$/.test(i.type)) { i.tag = "a";
                var n = i.content;
                if ("email-link" == i.type && 0 != n.indexOf("mailto:")) n = "mailto:" + n;
                else if ("md-link" == i.type) {
                    var t = i.content.match(e);
                    n = t[2], i.content = t[1] }
                i.attributes.href = n } }) } }();
! function() { "undefined" != typeof self && self.Prism && self.document && document.querySelector && (self.Prism.fileHighlight = function() {
        var e = { js: "javascript", py: "python", rb: "ruby", ps1: "powershell", psm1: "powershell", sh: "bash", bat: "batch", h: "c", tex: "latex" };
        Array.prototype.forEach && Array.prototype.slice.call(document.querySelectorAll("pre[data-src]")).forEach(function(t) {
            for (var a, s = t.getAttribute("data-src"), n = t, r = /\blang(?:uage)?-(?!\*)(\w+)\b/i; n && !r.test(n.className);) n = n.parentNode;
            if (n && (a = (t.className.match(r) || [, ""])[1]), !a) {
                var o = (s.match(/\.(\w+)$/) || [, ""])[1];
                a = e[o] || o }
            var l = document.createElement("code");
            l.className = "language-" + a, t.textContent = "", l.textContent = "Loading…", t.appendChild(l);
            var i = new XMLHttpRequest;
            i.open("GET", s, !0), i.onreadystatechange = function() { 4 == i.readyState && (i.status < 400 && i.responseText ? (l.textContent = i.responseText, Prism.highlightElement(l)) : l.textContent = i.status >= 400 ? "✖ Error " + i.status + " while fetching file: " + i.statusText : "✖ Error: File does not exist or is empty") }, i.send(null) }) }, document.addEventListener("DOMContentLoaded", self.Prism.fileHighlight)) }();
! function() {
    if ("undefined" != typeof self && self.Prism && self.document) {
        var e = { html: "HTML", xml: "XML", svg: "SVG", mathml: "MathML", css: "CSS", clike: "C-like", javascript: "JavaScript", abap: "ABAP", actionscript: "ActionScript", apacheconf: "Apache Configuration", apl: "APL", applescript: "AppleScript", asciidoc: "AsciiDoc", aspnet: "ASP.NET (C#)", autoit: "AutoIt", autohotkey: "AutoHotkey", basic: "BASIC", csharp: "C#", cpp: "C++", coffeescript: "CoffeeScript", "css-extras": "CSS Extras", fsharp: "F#", glsl: "GLSL", http: "HTTP", inform7: "Inform 7", json: "JSON", latex: "LaTeX", lolcode: "LOLCODE", matlab: "MATLAB", mel: "MEL", nasm: "NASM", nginx: "nginx", nsis: "NSIS", objectivec: "Objective-C", ocaml: "OCaml", parigp: "PARI/GP", php: "PHP", "php-extras": "PHP Extras", powershell: "PowerShell", protobuf: "Protocol Buffers", jsx: "React JSX", rest: "reST (reStructuredText)", sas: "SAS", sass: "Sass (Sass)", scss: "Sass (Scss)", sql: "SQL", typescript: "TypeScript", vhdl: "VHDL", vim: "vim", wiki: "Wiki markup", yaml: "YAML" };
        Prism.hooks.add("before-highlight", function(s) {
            var a = s.element.parentNode;
            if (a && /pre/i.test(a.nodeName)) {
                var t, i, r = a.getAttribute("data-language") || e[s.language] || s.language.substring(0, 1).toUpperCase() + s.language.substring(1),
                    l = a.previousSibling;
                l && /\s*\bprism-show-language\b\s*/.test(l.className) && l.firstChild && /\s*\bprism-show-language-label\b\s*/.test(l.firstChild.className) ? i = l.firstChild : (t = document.createElement("div"), i = document.createElement("div"), i.className = "prism-show-language-label", t.className = "prism-show-language", t.appendChild(i), a.parentNode.insertBefore(t, a)), i.innerHTML = r } }) } }();
! function() {
    function t(t) { "function" != typeof t || e(t) || r.push(t) }

    function e(t) {
        return "function" == typeof t ? r.filter(function(e) {
            return e.valueOf() === t.valueOf() })[0] : "string" == typeof t && t.length > 0 ? r.filter(function(e) {
            return e.name === t })[0] : null }

    function n(t) {
        if ("string" == typeof t && (t = e(t)), "function" == typeof t) {
            var n = r.indexOf(t);
            n >= 0 && r.splice(n, 1) } }

    function a() { Array.prototype.slice.call(document.querySelectorAll("pre[data-jsonp]")).forEach(function(t) { t.textContent = "";
            var e = document.createElement("code");
            e.textContent = i, t.appendChild(e);
            var n = t.getAttribute("data-adapter"),
                a = null;
            if (n) {
                if ("function" != typeof window[n]) return e.textContent = "JSONP adapter function '" + n + "' doesn't exist", void 0;
                a = window[n] }
            var u = "prismjsonp" + o++,
                f = document.createElement("a"),
                l = f.href = t.getAttribute("data-jsonp");
            f.href += (f.search ? "&" : "?") + (t.getAttribute("data-callback") || "callback") + "=" + u;
            var s = setTimeout(function() { e.textContent === i && (e.textContent = "Timeout loading '" + l + "'") }, 5e3),
                d = document.createElement("script");
            d.src = f.href, window[u] = function(n) { document.head.removeChild(d), clearTimeout(s), delete window[u];
                var o = "";
                if (a) o = a(n, t);
                else
                    for (var i in r)
                        if (o = r[i](n, t), null !== o) break;
                null === o ? e.textContent = "Cannot parse response (perhaps you need an adapter function?)" : (e.textContent = o, Prism.highlightElement(e)) }, document.head.appendChild(d) }) }
    if (self.Prism && self.document && document.querySelectorAll && [].filter) {
        var r = [];
        Prism.plugins.jsonphighlight = { registerAdapter: t, removeAdapter: n, highlight: a }, t(function(t) {
            if (t && t.meta && t.data) {
                if (t.meta.status && t.meta.status >= 400) return "Error: " + (t.data.message || t.meta.status);
                if ("string" == typeof t.data.content) return "function" == typeof atob ? atob(t.data.content.replace(/\s/g, "")) : "Your browser cannot decode base64" }
            return null }), t(function(t, e) {
            if (t && t.meta && t.data && t.data.files) {
                if (t.meta.status && t.meta.status >= 400) return "Error: " + (t.data.message || t.meta.status);
                var n = e.getAttribute("data-filename");
                if (null == n)
                    for (var a in t.data.files)
                        if (t.data.files.hasOwnProperty(a)) { n = a;
                            break }
                return void 0 !== t.data.files[n] ? t.data.files[n].content : "Error: unknown or missing gist file " + n }
            return null }), t(function(t) {
            return t && t.node && "string" == typeof t.data ? t.data : null });
        var o = 0,
            i = "Loading…";
        a() } }();
! function() { "undefined" != typeof self && !self.Prism || "undefined" != typeof global && !global.Prism || Prism.hooks.add("wrap", function(e) { "keyword" === e.type && e.classes.push("keyword-" + e.content) }) }();
! function() { "undefined" != typeof self && self.Prism && self.document && Prism.hooks.add("before-highlight", function(e) {
        if (e.code) {
            var s = e.element.parentNode,
                n = /\s*\bkeep-initial-line-feed\b\s*/;!s || "pre" !== s.nodeName.toLowerCase() || n.test(s.className) || n.test(e.element.className) || (e.code = e.code.replace(/^(?:\r?\n|\r)/, "")) } }) }();
! function() {
    if ("undefined" != typeof self && self.Prism && self.document && document.createElement) {
        var e = { javascript: "clike", actionscript: "javascript", aspnet: "markup", bison: "c", c: "clike", csharp: "clike", cpp: "c", coffeescript: "javascript", crystal: "ruby", "css-extras": "css", d: "clike", dart: "clike", fsharp: "clike", glsl: "clike", go: "clike", groovy: "clike", haml: "ruby", handlebars: "markup", haxe: "clike", jade: "javascript", java: "clike", kotlin: "clike", less: "css", markdown: "markup", nginx: "clike", objectivec: "c", parser: "markup", php: "clike", "php-extras": "php", processing: "clike", protobuf: "clike", qore: "clike", jsx: ["markup", "javascript"], ruby: "clike", sass: "css", scss: "css", scala: "java", smarty: "markup", swift: "clike", textile: "markup", twig: "markup", typescript: "javascript", wiki: "markup" },
            c = {},
            a = Prism.plugins.autoloader = { languages_path: "components/", use_minified: !0 },
            s = function(e, c, a) {
                var s = document.createElement("script");
                s.src = e, s.async = !0, s.onload = function() { document.body.removeChild(s), c && c() }, s.onerror = function() { document.body.removeChild(s), a && a() }, document.body.appendChild(s) },
            r = function(e) {
                return a.languages_path + "prism-" + e + (a.use_minified ? ".min" : "") + ".js" },
            n = function(e, a) {
                var s = c[e];
                s || (s = c[e] = {});
                var r = a.getAttribute("data-dependencies");!r && a.parentNode && "pre" === a.parentNode.tagName.toLowerCase() && (r = a.parentNode.getAttribute("data-dependencies")), r = r ? r.split(/\s*,\s*/g) : [], i(r, function() { t(e, function() { Prism.highlightElement(a) }) }) },
            i = function(e, c, a) { "string" == typeof e && (e = [e]);
                var s = 0,
                    r = e.length,
                    n = function() { r > s ? t(e[s], function() { s++, n() }, function() { a && a(e[s]) }) : s === r && c && c(e) };
                n() },
            t = function(a, n, t) {
                var u = function() {
                        var e = !1;
                        a.indexOf("!") >= 0 && (e = !0, a = a.replace("!", ""));
                        var i = c[a];
                        if (i || (i = c[a] = {}), n && (i.success_callbacks || (i.success_callbacks = []), i.success_callbacks.push(n)), t && (i.error_callbacks || (i.error_callbacks = []), i.error_callbacks.push(t)), !e && Prism.languages[a]) l(a);
                        else if (!e && i.error) o(a);
                        else if (e || !i.loading) { i.loading = !0;
                            var u = r(a);
                            s(u, function() { i.loading = !1, l(a) }, function() { i.loading = !1, i.error = !0, o(a) }) } },
                    p = e[a];
                p && p.length ? i(p, u) : u() },
            l = function(e) { c[e] && c[e].success_callbacks && c[e].success_callbacks.length && c[e].success_callbacks.forEach(function(c) { c(e) }) },
            o = function(e) { c[e] && c[e].error_callbacks && c[e].error_callbacks.length && c[e].error_callbacks.forEach(function(c) { c(e) }) };
        Prism.hooks.add("complete", function(e) { e.element && e.language && !e.grammar && n(e.language, e.element) }) } }();
! function() { "undefined" != typeof self && self.Prism && self.document && Prism.languages.markup && (Prism.plugins.UnescapedMarkup = !0, Prism.hooks.add("before-highlightall", function(e) { e.selector += ", .lang-markup script[type='text/plain'], .language-markup script[type='text/plain'], script[type='text/plain'].lang-markup, script[type='text/plain'].language-markup" }), Prism.hooks.add("before-sanity-check", function(e) {
        if ("markup" == e.language) {
            if (e.element.matches("script[type='text/plain']")) {
                var t = document.createElement("code"),
                    n = document.createElement("pre");
                return n.className = t.className = e.element.className, e.code = e.code.replace(/&lt;\/script(>|&gt;)/gi, "</script>"), t.textContent = e.code, n.appendChild(t), e.element.parentNode.replaceChild(n, e.element), e.element = t, void 0 }
            var n = e.element.parentNode;!e.code && n && "pre" == n.nodeName.toLowerCase() && e.element.childNodes.length && "#comment" == e.element.childNodes[0].nodeName && (e.element.textContent = e.code = e.element.childNodes[0].textContent) } })) }();
! function() { "undefined" != typeof self && self.Prism && self.document && Prism.hooks.add("complete", function(e) {
        if (e.code) {
            var t = e.element.parentNode,
                a = /\s*\bcommand-line\b\s*/;
            if (t && /pre/i.test(t.nodeName) && (a.test(t.className) || a.test(e.element.className)) && !e.element.querySelector(".command-line-prompt")) { a.test(e.element.className) && (e.element.className = e.element.className.replace(a, "")), a.test(t.className) || (t.className += " command-line");
                var n = new Array(1 + e.code.split("\n").length),
                    s = t.getAttribute("data-prompt") || "";
                if ("" !== s) n = n.join('<span data-prompt="' + s + '"></span>');
                else {
                    var r = t.getAttribute("data-user") || "user",
                        l = t.getAttribute("data-host") || "localhost";
                    n = n.join('<span data-user="' + r + '" data-host="' + l + '"></span>') }
                var m = document.createElement("span");
                m.className = "command-line-prompt", m.innerHTML = n;
                var o = t.getAttribute("data-output") || "";
                o = o.split(",");
                for (var i = 0; i < o.length; i++) {
                    var d = o[i].split("-"),
                        p = parseInt(d[0]),
                        c = p;
                    if (2 === d.length && (c = parseInt(d[1])), !isNaN(p) && !isNaN(c))
                        for (var u = p; c >= u && u <= m.children.length; u++) {
                            var N = m.children[u - 1];
                            N.removeAttribute("data-user"), N.removeAttribute("data-host"), N.removeAttribute("data-prompt") } }
                e.element.innerHTML = m.outerHTML + e.element.innerHTML } } }) }();
! function() {
    function e(e) { this.defaults = r({}, e) }

    function n(e) {
        return e.replace(/-(\w)/g, function(e, n) {
            return n.toUpperCase() }) }

    function t(e) {
        for (var n = 0, t = 0; t < e.length; ++t) e.charCodeAt(t) == "  ".charCodeAt(0) && (n += 3);
        return e.length + n }
    if ("undefined" != typeof self && self.Prism && self.document) {
        var r = Object.assign || function(e, n) {
            for (var t in n) n.hasOwnProperty(t) && (e[t] = n[t]);
            return e };
        e.prototype = { setDefaults: function(e) { this.defaults = r(this.defaults, e) }, normalize: function(e, t) { t = r(this.defaults, t);
                for (var i in t) {
                    var o = n(i); "normalize" !== i && "setDefaults" !== o && t[i] && this[o] && (e = this[o].call(this, e, t[i])) }
                return e }, leftTrim: function(e) {
                return e.replace(/^\s+/, "") }, rightTrim: function(e) {
                return e.replace(/\s+$/, "") }, tabsToSpaces: function(e, n) {
                return n = 0 | n || 4, e.replace(/\t/g, new Array(++n).join(" ")) }, spacesToTabs: function(e, n) {
                return n = 0 | n || 4, e.replace(new RegExp(" {" + n + "}", "g"), " ") }, removeTrailing: function(e) {
                return e.replace(/\s*?$/gm, "") }, removeInitialLineFeed: function(e) {
                return e.replace(/^(?:\r?\n|\r)/, "") }, removeIndent: function(e) {
                var n = e.match(/^[^\S\n\r]*(?=\S)/gm);
                return n && n[0].length ? (n.sort(function(e, n) {
                    return e.length - n.length }), n[0].length ? e.replace(new RegExp("^" + n[0], "gm"), "") : e) : e }, indent: function(e, n) {
                return e.replace(/^[^\S\n\r]*(?=\S)/gm, new Array(++n).join("   ") + "$&") }, breakLines: function(e, n) { n = n === !0 ? 80 : 0 | n || 80;
                for (var r = e.split("\n"), i = 0; i < r.length; ++i)
                    if (!(t(r[i]) <= n)) {
                        for (var o = r[i].split(/(\s+)/g), a = 0, l = 0; l < o.length; ++l) {
                            var s = t(o[l]);
                            a += s, a > n && (o[l] = "\n" + o[l], a = s) }
                        r[i] = o.join("") }
                return r.join("\n") } }, Prism.plugins.NormalizeWhitespace = new e({ "remove-trailing": !0, "remove-indent": !0, "left-trim": !0, "right-trim": !0 }), Prism.hooks.add("before-highlight", function(e) {
            var n = e.element.parentNode;
            if (e.code && n && "pre" === n.nodeName.toLowerCase() && (!e.settings || e.settings["whitespace-normalization"] !== !1)) {
                for (var t = n.childNodes, r = "", i = "", o = !1, a = Prism.plugins.NormalizeWhitespace, l = 0; l < t.length; ++l) {
                    var s = t[l];
                    s == e.element ? o = !0 : "#text" === s.nodeName && (o ? i += s.nodeValue : r += s.nodeValue, n.removeChild(s), --l) }
                if (e.element.children.length && Prism.plugins.KeepMarkup) {
                    var u = r + e.element.innerHTML + i;
                    e.element.innerHTML = a.normalize(u, e.settings), e.code = e.element.textContent } else e.code = r + e.code + i, e.code = a.normalize(e.code, e.settings) } }) } }();
! function() { "undefined" != typeof self && self.Prism && self.document && document.createRange && (Prism.plugins.KeepMarkup = !0, Prism.hooks.add("before-highlight", function(e) {
        if (e.element.children.length) {
            var n = 0,
                o = [],
                t = function(e, d) {
                    var r = {};
                    d || (r.clone = e.cloneNode(!1), r.posOpen = n, o.push(r));
                    for (var a = 0, s = e.childNodes.length; s > a; a++) {
                        var p = e.childNodes[a];
                        1 === p.nodeType ? t(p) : 3 === p.nodeType && (n += p.data.length) }
                    d || (r.posClose = n) };
            t(e.element, !0), o && o.length && (e.keepMarkup = o) } }), Prism.hooks.add("after-highlight", function(e) {
        if (e.keepMarkup && e.keepMarkup.length) {
            var n = function(e, o) {
                for (var t = 0, d = e.childNodes.length; d > t; t++) {
                    var r = e.childNodes[t];
                    if (1 === r.nodeType) {
                        if (!n(r, o)) return !1 } else 3 === r.nodeType && (!o.nodeStart && o.pos + r.data.length > o.node.posOpen && (o.nodeStart = r, o.nodeStartPos = o.node.posOpen - o.pos), o.nodeStart && o.pos + r.data.length >= o.node.posClose && (o.nodeEnd = r, o.nodeEndPos = o.node.posClose - o.pos), o.pos += r.data.length);
                    if (o.nodeStart && o.nodeEnd) {
                        var a = document.createRange();
                        return a.setStart(o.nodeStart, o.nodeStartPos), a.setEnd(o.nodeEnd, o.nodeEndPos), o.node.clone.appendChild(a.extractContents()), a.insertNode(o.node.clone), a.detach(), !1 } }
                return !0 };
            e.keepMarkup.forEach(function(o) { n(e.element, { node: o, pos: 0 }) }) } })) }();
